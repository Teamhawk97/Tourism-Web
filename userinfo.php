<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root"; // Change if you have set a password
$password = ""; // Leave empty if no password
$dbname = "tourism"; // Make sure this database exists

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';

    // Prepare and bind
    $sql = "INSERT INTO userinfo (email, password, username)
            VALUES ('$email', '$password', '$username')";

if ($conn->query($sql) === TRUE) {
    //echo "New contact record created successfully!";
    header("Location: http://localhost/tourism/signup.html"); // Change this to your target page
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
} else {
echo "No form data submitted!";
}
?>
