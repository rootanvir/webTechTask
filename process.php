<?php
try {
    if (!isset($_POST["science_books"])) {
        throw new Exception("Invalid Data fomat");
    }

    $check = true;
    if (isset($_POST["submit"])) {
        // Validate username (only letters and spaces allowed)
        if (preg_match("/^[A-Za-z .]+$/", $_POST["username"]) && $check) {
            $user_name = htmlspecialchars($_POST["username"]); // Sanitize input
        } else {
            $check = false;
        }

        // Validate user ID (format: XX-XXXXX-X)
        if (preg_match("/^\d{2}-\d{5}-\d{1}$/", $_POST["userid"]) && $check) {
            $user_id = htmlspecialchars($_POST["userid"]); // Sanitize input
        } else {
            $check = false;
        }

        // Validate email (AIUB email format)
        if (preg_match("/^\d{2}-\d{5}-\d{1}@student\.aiub\.edu$/", $_POST["useremail"]) && $check) {
            $user_email = htmlspecialchars($_POST["useremail"]); // Sanitize input
        } else {
            $check = false;
        }

        $returnDate = htmlspecialchars($_POST["returndate"]);
        $time = htmlspecialchars($_POST["curtime"]);

        $bookname = htmlspecialchars($_POST["science_books"]);
        $token = htmlspecialchars($_POST["token"]);

        

        if (isset($_POST["submit"]) && $check) {
            if (!isset($_COOKIE[$bookname])) {
                // here: Output data securely
                setcookie($bookname, $user_name, time() + 5); // Set a cookie for the book

                // over
            } else {
                // Display message if the book is already borrowed
                echo "<h1>This book is Not available right now. 
                You can borrow it after <span style='color:red;'>$returnDate</span>.</h1>";
                return;
            }
        } else {
            throw new Exception("Invalid Data Format");

        }
    }
} catch (Exception $e) {
    echo "<h1 style=color:red> ", $e->getMessage(), "</h1>";
    return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="resource/style2.css">
</head>

<body>
    <div class="full">

        <div class="recpt">
            <div class="in">
                <?php
                echo "<p> Name : $user_name </p>";
                echo "<p> Id : $user_id </p>";
                echo "<p> Email : $user_email </p>";
                echo "<p> Book name : $bookname </p>";
                echo "<p> Borrowing Date :$time </p> ";
                echo "<p> Return Date : $returnDate </p>";
                echo "<p> token number : $token </p>";
                ?>
            </div>
        </div>

    </div>
</body>

</html>