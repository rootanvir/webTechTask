<?php
// Database connection (replace with your actual database connection details)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data (no sanitization or validation here)
$isbn = $_POST['isbn'];
$bookName = $_POST['bookName'];
$authorName = $_POST['authorName'];
$quantity = $_POST['quantity'];
$isFictional = $_POST['isFictional'];

// Update the record in the database using ISBN
$sql = "UPDATE book_borrowing_system 
        SET book_title = '$bookName', author_name = '$authorName', quantity = $quantity, is_fiction = '$isFictional' 
        WHERE isbn = '$isbn'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the connection
$conn->close();
?>
