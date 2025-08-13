<?php
// Database connection parameters - update as needed
$servername = "localhost";
$username = "root";
$password = "your_mysql_password";  // Replace with your MySQL password
$dbname = "kalia_hospital_db";     // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$title = isset($_POST['title']) ? $conn->real_escape_string($_POST['title']) : '';
$description = isset($_POST['description']) ? $conn->real_escape_string($_POST['description']) : '';

if (empty($title) || empty($description)) {
    die("Title and Description are required.");
}

// Insert into admin_info table
$sql = "INSERT INTO admin_info (title, description, created_at) VALUES ('$title', '$description', NOW())";

if ($conn->query($sql) === TRUE) {
    // Redirect back to admin page with success message
    header("Location: admin.html?success=1");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
