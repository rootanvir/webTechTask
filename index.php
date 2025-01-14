<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="resource/design.css">

</head>

<body>
    <div class="tableTop">
        <div id="img_id">
            <img width="100%" src="resource/user.png" alt="Student id">
        </div>
        <div class="table">

            <div class="left">
            </div>
            <div class="col2">
                <div style="background-color: rgb(241, 188, 144);" class="row1">
                    <p style="font-size:50px;font-weight:bold;font-family:Sans-Serif">Book Borrowing System </p>
                </div>
                <div style="background-color: rgb(209, 172, 243);" class="row2"></div>
                <div class="row3">
                    <div style="background-color: rgb(136, 92, 240);" class="cc1">

                    </div>
                    <div style="background-color: rgb(103, 157, 250);" class="cc2">

                    </div>
                    <div style="background-color: rgb(18, 246, 140);" class="cc3">


                    </div>
                </div>
                <div style="background-color:rgb(155, 239, 183);" class="row4">
                    <form action="database.php" method="POST">
                        <div id="book">
                            <span>ISBM</span>
                            <input name="isbn" type="text" placeholder="Enter ISBM" required>
                            <span>Book Name</span>
                            <input name="bookName" type="text" placeholder="Enter Book Name" required>
                            <span>Author Name</span>
                            <input name="authorName" type="text" placeholder="Enter Author Name" required>
                            <span>Quantity</span>
                            <input name="quantity" type="number" placeholder="Enter Quantity" required>
                            <span>Fictional ?</span>
                            <select name="isFictional" required>
                                <option value="" disabled selected>Is it Fictional</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>

                            </select><br>
                            <input style="margin-inline:25%" type="submit">
                            <br>

                        </div>
                    </form>
                </div>
            </div>
            <div class="right"></div>

        </div>
        <div class="bottom">
            <div class="bt1left"></div>
            <div class="bt11" >
                <div id="ob1" class="bt2">

                    <form action="process.php" method="POST">

                        <label for="username">Name</label><br>
                        <input class="pd-5" class="w-b" type="text" name="username" placeholder="Enter your name"><br>

                        <label for="userid">Id:</label><br>
                        <input class="pd-5" type="text" name="userid" placeholder="Enter user ID"><br>
                        <label for="useremail">Email</label><br>
                        <input class="pd-5" type="text" name="useremail" placeholder="Enter email address">
                        <br>
                        <label for="science_books">Title of the book</label><br>
                        <select class="pd-5" style="height : 30px;" name="science_books" id="science_books" required>
                            <option value="" disabled selected>Title of the book</option>
                            <?php
                            // Database connection
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "test"; // Replace with your database name
                            
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Fetch book titles
                            $sql = "SELECT book_title FROM book_borrowing_system"; // Replace 'books' with your table name
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . htmlspecialchars($row['book_title']) . "'>" . htmlspecialchars($row['book_title']) . "</option>";
                                }
                            } else {
                                echo "<option value='' disabled>No books available</option>";
                            }

                            $conn->close();
                            ?>
                        </select>


                        <br>
                        <label for="curtime">Borrow Date</label><br>
                        <input class="pd-5" name="curtime" type="date"><br>



                        <label for="token">Token Number</label><br>
                        <?php
                        //$token = rand(1000000,9999999);
                        
                        echo "<input name=\"token\" class=\"pd-5\" type=\"text\" placeholder=\"TOKEN_NUMER\" >";

                        ?>

                        <br>
                        <label for="returndate">Return Date</label><br>
                        <input class="pd-5" name="returndate" type="date">
                        <br><br>
                        <input class="pd-5" style="background-color:darksalmon" type="submit" name="submit"
                            value="submit">
                    </form>

                </div>
                <div id="ob2" style="background-color:khaki " class="bt3">
                    <div style="text-align: center; margin: 0 auto; width: 50%; padding: 10px;">
                        <div>
                            <h1>TOKENS</h1>
                        </div>
                        <?php
                        $filePath = "resource/token.json";
                        $read = file_get_contents($filePath);
                        $arr = json_decode($read, true);
                        $array = $arr[0]['token'];
                        for ($i = 0; $i < sizeof($array); $i++) {
                            echo "<table style='border: 1px solid black; margin: 5px auto;'>";
                            echo "<tr><td style='width : 150px; text-align:center '>" . $array[$i] . "</td></tr>";
                            echo "</table>";
                        }
                        ?>
                    </div>
                </div>

            </div>
            <div class="bt111right"></div>
        </div>

    </div>
    <script src="script.js"></script>
</body>

</html>