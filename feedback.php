<?php
// Database configuration
$servername = "localhost:3307";
$username = "root"; 
$password = ""; 
$dbname = "course_feedback";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $rating = (int)$_POST['rating'];
    $feedback = trim($_POST['feedback']);

    // Validate inputs
    if (empty($name) || empty($email) || $rating < 1 || $rating > 5) {
        echo "Invalid input. Please fill all fields correctly.";
        exit;
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, rating, feedback) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $email, $rating, $feedback);

    if ($stmt->execute()) {
        echo "Feedback submitted successfully! Thank you for your feedback.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>