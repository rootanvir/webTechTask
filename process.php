<?php
try {
    if (!isset($_POST["science_books"])) {
        throw new Exception("Invalid Data fomat");
    }

    $check = true;
    if (isset($_POST["submit"])) {
        if (preg_match("/^[A-Za-z .]+$/", $_POST["username"]) && $check) {
            $user_name = htmlspecialchars($_POST["username"]);
        } else {
            $check = false;
        }

        if (preg_match("/^\d{2}-\d{5}-\d{1}$/", $_POST["userid"]) && $check) {
            $user_id = htmlspecialchars($_POST["userid"]);
        } else {
            $check = false;
        }

        if (preg_match("/^\d{2}-\d{5}-\d{1}@student\.aiub\.edu$/", $_POST["useremail"]) && $check) {
            $user_email = htmlspecialchars($_POST["useremail"]);
        } else {
            $check = false;
        }

        $returnDate = htmlspecialchars($_POST["returndate"]);
        $time = htmlspecialchars($_POST["curtime"]);

        // if ($returnDate > $time) {
        // } else {
        //     $check = false;
        // }

        $returnTimestamp = strtotime($returnDate);
        $currentTimestamp = strtotime($time);

        if (($returnTimestamp - $currentTimestamp) >= 10 * 24 * 60 * 60) {
        } else {
            $check = false;
        }
        $bookname = htmlspecialchars($_POST["science_books"]);

        $usedFilePath = "resource/used.json";
        $filePath = "resource/token.json";

        $token = htmlspecialchars($_POST["token"]);

        if (file_exists($filePath)) {
            $read = file_get_contents($filePath);
            $arr = json_decode($read, true);
            $array = $arr[0]['token'];
        } else {
            die("Token file not found.");
        }

        $usedTokens = [];
        if (file_exists($usedFilePath)) {
            $usedRead = file_get_contents($usedFilePath);
            $usedTokens = json_decode($usedRead, true) ?? [];

            if (in_array($token, $usedTokens)) {
                $check = false;
            }
        }

        if (in_array($token, $array) && $check) {
            if (!in_array($token, $usedTokens)) {
                $usedTokens[] = $token;
                file_put_contents($usedFilePath, json_encode($usedTokens, JSON_PRETTY_PRINT));
            }
        } else {
            $check = false;
        }



        if (isset($_POST["submit"]) && $check) {
            if (!isset($_COOKIE[$bookname])) {
                setcookie($bookname, $user_name, time() + 10);
            } else {
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
    //header("Refresh: 2; url=index.php");
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

<body style="background-color:darkgray">
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
                echo "<button style=\"margin-top:100px;margin-left:300px\"onclick=\"window.print()\">Print Receipt</button>";
                ?>
            </div>
        </div>

    </div>
</body>

</html>