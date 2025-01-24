<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="resource/design.css">

</head>

<body>
    <div id="img_id">
        <img width="100%" src="resource/user.png" alt="Student id">
    </div>
    <div class="tableTop">
        <div id="img_id">
            <img width="100%" src="resource/user.png" alt="Student id">
        </div>
        <div class="table">

            <div class="left">
                <div class="data-container" id="jsonDataContainer">
                    <?php
                    // Load JSON file
                    $jsonFile = 'resource/used.json'; // Path to your JSON file
                    
                    // Check if the file exists
                    if (file_exists($jsonFile)) {
                        // Read and decode the JSON data
                        $jsonData = file_get_contents($jsonFile);
                        $data = json_decode($jsonData, true);

                        if ($data) {
                            // Output the data as a scrollable list
                            echo '<div>';
                            echo '<ul>';
                            foreach ($data as $item) {
                                echo '<li>' . htmlspecialchars($item) . '</li>';
                            }
                            echo '</ul>';
                            echo '</div>';
                        } else {
                            echo 'Invalid JSON data.';
                        }
                    } else {
                        echo 'JSON file not found.';
                    }
                    ?>

                </div>
            </div>
            <div class="col2">
                <div style="background-color: rgb(221, 151, 93);" class="row1">
                    <div class="row11">
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "test";

                        // Establish the connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        } else {
                            // Query to fetch books
                            $sql = "SELECT isbn, book_title, author_name, quantity, is_fiction FROM book_borrowing_system";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "";
                                echo "<div style='max-height: 400px; overflow-y: auto; border: 1px solid #ddd; width: 98%; margin: auto;'>";
                                echo "<table border='1' style='border-collapse: collapse; width: 100%; text-align: left;'>";
                                echo "<tr style='background-color: #f2f2f2;'>";
                                echo "<th>ISBN</th>";
                                echo "<th>Title</th>";
                                echo "<th>Author</th>";
                                echo "<th>Quantity</th>";
                                echo "<th>Fiction</th>";
                                echo "</tr>";

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['isbn']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['book_title']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['author_name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['is_fiction']) . "</td>";
                                    echo "</tr>";
                                }

                                echo "</table>";
                                echo "</div>";
                            } else {
                                echo "<p style='text-align: center;'>No books found in the database.</p>";
                            }

                            $conn->close();
                        }
                        ?>
                    </div>

                </div>
                <div style="background-color: rgb(209, 172, 243);" class="row2">
                    <div class="form-container">
                        <form action="dbUpdate.php" method="POST">
                            <div id="update" class="form-fields">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input name="isbn" id="isbn" type="text" placeholder="Enter ISBN" required
                                    class="form-input">

                                <label for="bookName" class="form-label">Book Name</label>
                                <input name="bookName" id="bookName" type="text" placeholder="Enter Book Name" required
                                    class="form-input">

                                <label for="authorName" class="form-label">Author Name</label>
                                <input name="authorName" id="authorName" type="text" placeholder="Enter Author Name"
                                    required class="form-input">

                                <label for="quantity" class="form-label">Quantity</label>
                                <input name="quantity" id="quantity" type="number" placeholder="Enter Quantity" required
                                    class="form-input">

                                <label for="isFictional" class="form-label">Fictional?</label>
                                <select name="isFictional" id="isFictional" required class="form-input">
                                    <option value="" disabled selected>Is it Fictional</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>

                                <input type="submit" value="Update Book" class="submit-btn">
                            </div>
                        </form>
                    </div>

                </div>
                <div class="row3">
                    <div style="background-color: rgb(136, 92, 240);" class="cc1">
                        <img class="img-book" src="resource/book.png" alt="book image">
                    </div>
                    <div style="background-color: rgb(103, 157, 250);" class="cc2">
                        <img class="img-book" src="resource/book.png" alt="book image">
                    </div>
                    <div style="background-color: rgb(18, 246, 140);" class="cc3">
                        <img class="img-book" src="resource/book.png" alt="book image">
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
            <div class="bt11">
                <div id="ob1" class="bt2">
                    <div class="borrow-section">
                        <form action="process.php" method="POST">

                            <label for="username">Name</label><br>
                            <input class="pd-5" class="w-b" type="text" name="username"
                                placeholder="Enter your name"><br>

                            <label for="userid">Id:</label><br>
                            <input class="pd-5" type="text" name="userid" placeholder="Enter user ID"><br>
                            <label for="useremail">Email</label><br>
                            <input class="pd-5" type="text" name="useremail" placeholder="Enter email address">
                            <br>
                            <label for="science_books">Title of the book</label><br>
                            <select class="pd-5" style="height : 30px;" name="science_books" id="science_books"
                                required>
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


</body>

</html>