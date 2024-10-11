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
    // Collect input data
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM userinfo WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        // User found, redirect to another page
        //echo "Found";
        header("Location: http://localhost/tourism/home.html"); // Change this to your target page
        exit();
    } else {
        echo "Invalid username or password!";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
