<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ISBN from the URL parameter
$isbn = $_GET['isbn'];

// Query the database for the book details
$sql = "SELECT book_title, author_name, quantity, is_fiction FROM book_borrowing_system WHERE isbn = '$isbn'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the data and send it as JSON
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(null);
}

// Close the connection
$conn->close();
?>
