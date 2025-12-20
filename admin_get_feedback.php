<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.html");
    exit;
}

// Database configuration
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "course_feedback";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed']));
}

// Get filter parameters
$rating_filter = isset($_GET['rating']) && !empty($_GET['rating']) ? (int)$_GET['rating'] : null;
$date_from = isset($_GET['date_from']) && !empty($_GET['date_from']) ? $_GET['date_from'] : null;
$date_to = isset($_GET['date_to']) && !empty($_GET['date_to']) ? $_GET['date_to'] : null;

// Build query based on filters
$where_clauses = array();
$params = array();
$types = "";

if ($rating_filter !== null) {
    $where_clauses[] = "rating = ?";
    $params[] = $rating_filter;
    $types .= "i";
}

if ($date_from !== null) {
    $where_clauses[] = "DATE(submitted_at) >= ?";
    $params[] = $date_from;
    $types .= "s";
}

if ($date_to !== null) {
    $where_clauses[] = "DATE(submitted_at) <= ?";
    $params[] = $date_to;
    $types .= "s";
}

$where_sql = count($where_clauses) > 0 ? " WHERE " . implode(" AND ", $where_clauses) : "";

// Fetch all feedback for stats
$all_feedback_query = "SELECT rating FROM feedback";
$all_feedback_result = $conn->query($all_feedback_query);
$all_ratings = array();
$total_feedback = 0;

if ($all_feedback_result->num_rows > 0) {
    while ($row = $all_feedback_result->fetch_assoc()) {
        $all_ratings[] = $row['rating'];
        $total_feedback++;
    }
}

// Calculate statistics
$avg_rating = count($all_ratings) > 0 ? array_sum($all_ratings) / count($all_ratings) : 0;
sort($all_ratings);
$median_rating = count($all_ratings) > 0 ? $all_ratings[intdiv(count($all_ratings), 2)] : 0;
$five_star_count = count(array_filter($all_ratings, function($r) { return $r == 5; }));

// Fetch filtered feedback
$feedback_query = "SELECT id, name, email, rating, feedback, submitted_at FROM feedback" . $where_sql . " ORDER BY submitted_at DESC";
$stmt = $conn->prepare($feedback_query);

if (count($params) > 0) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$feedback_result = $stmt->get_result();
$feedback_list = array();

if ($feedback_result->num_rows > 0) {
    while ($row = $feedback_result->fetch_assoc()) {
        $feedback_list[] = $row;
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode([
    'stats' => [
        'total_feedback' => $total_feedback,
        'avg_rating' => round($avg_rating, 2),
        'median_rating' => $median_rating,
        'five_star_count' => $five_star_count
    ],
    'feedback' => $feedback_list,
    'admin_username' => $_SESSION['admin_username']
]);

$stmt->close();
$conn->close();
?>