<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="style.css">

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
                    <p style="font-size:50px;font-weight:bold:font-family:Sans-Serif;">Book Borrowing System </p>
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
                <div style="background-color: rgb(155, 239, 183);" class="row4"></div>
            </div>
            <div class="right"></div>

        </div>
        <div class="bottom">
            <div class="bt1left"></div>
            <div class="bt11" ;>
                <div id="ob1" style="background-color: palegoldenrod;" class="bt2">

                    <form action="process.php" method="POST">

                        <label for="username">Name</label><br>
                        <input class="pd-5" class="w-b" type="text" name="username" placeholder="Enter your name"><br>
                        <label for="userid">Id:</label><br>
                        <input class="pd-5" type="text" name="userid" placeholder="Enter user ID"><br>
                        <label for="useremail">Email</label><br>
                        <input class="pd-5" type="text" name="useremail" placeholder="Enter email address">
                        <br>
                        <label for="science_books">Title of the book</label><br>
                        <select class="pd-5" style="height : 30px;" name="science_books" id="science_books">
                            <option value="" disabled selected>Title of the book</option>
                            <option value="a_brief_history_of_time">A Brief History of Time</option>
                            <option value="the_selfish_gene">The Selfish Gene</option>
                            <option value="cosmos">Cosmos</option>
                            <option value="the_elegant_universe">The Elegant Universe</option>
                            <option value="surely_you_re_joking_mr_feynman">Surely You’re Joking, Mr. Feynman!</option>
                            <option value="the_gene">The Gene: An Intimate History</option>
                            <option value="on_the_origin_of_species">On the Origin of Species</option>
                            <option value="the_emperor_of_all_maladies">The Emperor of All Maladies</option>
                            <option value="sapiens">Sapiens: A Brief History of Humankind</option>
                            <option value="thinking_fast_and_slow">Thinking, Fast and Slow</option>
                        </select>

                        <br>
                        <label for="curtime">Borrowing Time :</label><br>
                        <input class="pd-5" name="curtime" type="date" ><br>

                        
                        
                        <label for="token">Token Number</label><br>
                        <?php
                            $token = rand(1000000,9999999);
                        
                        echo "<input name=\"token\" class=\"pd-5\" type=\"text\" placeholder=\"TOKEN_NUMER\" value=$token>";
                    
                        ?>
                   
                        <br>
                        <label for="returndate">Return Date</label><br>
                        <input class="pd-5" name="returndate" type="date">
                        <br><br>
                        <input class="pd-5" style="background-color:darksalmon" type="submit" name="submit" value="submit">
                    </form>










                </div>
                <div id="ob2" style="background-color: rgb(165, 93, 42);" class="bt3">
                </div>
            </div>
            <div class="bt111right"></div>
        </div>

    </div>
    <script src="script.js"></script>
</body>

</html>