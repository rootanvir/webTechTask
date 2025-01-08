<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $isbn = $_POST['isbn'];
    $book = $_POST['bookName'];
    $author = $_POST['authorName'];
    $quantity = (int) $_POST['quantity'];
    $fic = $_POST['isFictional'];

    $sql = "INSERT INTO book_borrowing_system (isbn, book_title, author_name, quantity, is_fiction) 
            VALUES ('$isbn', '$book', '$author', $quantity, '$fic')";

    if ($conn->query($sql) === TRUE) {
        echo  $isbn,"<br>" ;
        echo  $book,"<br>" ;
        echo  $author,"<br>" ;
        echo  $quantity,"<br>" ;
        echo  $fic,"<br>" ;
        echo  "successfully inserted into database";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>