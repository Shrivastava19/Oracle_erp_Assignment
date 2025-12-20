<?php
session_start();

// Database configuration
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "course_feedback";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = trim($_POST['username']);
    $input_password = trim($_POST['password']);

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT id, password FROM admin_users WHERE username = ?");
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Verify password using bcrypt
        if (password_verify($input_password, $row['password'])) {
            // Set session variables
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_username'] = $input_username;
            $_SESSION['login_time'] = time();
            
            header("Location: admin_dashboard.html");
            exit;
        } else {
            $error = "Invalid username or password!";
        }
    } else {
        $error = "Invalid username or password!";
    }

    $stmt->close();
}

$conn->close();

if (isset($error)) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
        <div class="login-container">
            <div class="login-box">
                <h1>Admin Panel</h1>
                <div class="error-message"><?php echo $error; ?></div>
                <p class="back-link"><a href="admin_login.html">← Try again</a></p>
            </div>
        </div>
    </body>
    </html>
    <?php
}
?>