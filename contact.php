<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Debugging: Check if form data is being received correctly
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phoneno = isset($_POST['phoneno']) ? $_POST['phoneno'] : '';
    $destination = isset($_POST['subject']) ? $_POST['subject'] : '';
    $arrival = isset($_POST['message']) ? $_POST['message'] : '';

    // Check if values are empty (for debugging)
    if (empty($name) || empty($email) || empty($phoneno) || empty($destination) || empty($arrival)) {
        echo "Some fields are empty!";
        exit;
    }

    // SQL query to insert data into the booking table
    $sql = "INSERT INTO contact (name, email, phoneno, subject, message)
            VALUES ('$name', '$email', '$phoneno', '$destination', '$arrival')";

    if ($conn->query($sql) === TRUE) {
        echo "New contact record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    echo "No form data submitted!";
}
?>
