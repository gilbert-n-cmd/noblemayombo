<?php
// Database connection parameters - update as needed
$servername = "localhost";
$username = "root";
$password = "your_mysql_password";  // Replace with your MySQL password
$dbname = "kalia_hospital_db";     // Updated database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data and sanitize
$email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
$username = isset($_POST['username']) ? $conn->real_escape_string($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (empty($email) || empty($username) || empty($password)) {
    die("Email, Username, and Password are required.");
}

// Check if username or email already exists
$sql_check = "SELECT * FROM admin_users WHERE username='$username' OR email='$email'";
$result = $conn->query($sql_check);
if ($result->num_rows > 0) {
    die("Username or Email already exists.");
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert new admin user
$sql = "INSERT INTO admin_users (email, username, password) VALUES ('$email', '$username', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    // Redirect back to admin page with registration success
    header("Location: admin.html?registered=1");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
