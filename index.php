<?php

    include("database.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OFPPT</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <header>
        <div>
            <a href="#"><img src="OFPPT.png" alt="logo"></a>
             
        </div>
        <nav>
            <ul>
                <li><a href="#">CONTACT US</a></li>
                <li><a href="#">MORE INFO</a></li>
                <li><a href="#">SERVICES</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <div class="content">
            <h1>EFM Exam Breakdown</h1>
                <div class="label">
                    <i class="material-icons">person</i>
                    <label for="fname"> First name</label><br>
                </div>

                <input type="text" name="fname" id="fname" placeholder="First Name" required>
                <div class="label">
                    <i class="material-icons">person</i>
                    <label for="lname">last name</label><br>

                </div>
                <input type="text" name="lname" id="lname" placeholder="Last Name" required><br>
                <div class="label">
                    <i class="material-icons">group</i>
                    <label for="gr"> your group</label> <br>
                </div>
                <input type="text" id="gr" name="group" placeholder="Your group" required> <br>
                <div class="label">
                    <i class="material-icons">live_help</i>
                    <label for="review">How was the exam?</label><br>

                </div>
                <textarea name="review" id="review" placeholder="Share Your Review on EFMR CMC-RSK!"></textarea><br>
                <div class="label">
                    <i class="material-icons">message</i> 
                    <label for="improve">Help Us Improve!</label><br>
                </div>
                <textarea name="msg" id="msg" placeholder="Share Your Feedback to Help Us Improve!"></textarea><br>
                <div class="label">
                    <input type="submit" value="Submit Review">
                    <input type="reset" value="Reset Form">
                </div>
                


            </div>
        </form>
    </section>
    

</body>
</html>



<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $fname = filter_input(INPUT_POST,"fname", FILTER_SANITIZE_SPECIAL_CHARS);
        $lname = filter_input(INPUT_POST,"lname", FILTER_SANITIZE_SPECIAL_CHARS);
        $group = filter_input(INPUT_POST,"group", FILTER_SANITIZE_SPECIAL_CHARS);
        $review = filter_input(INPUT_POST,"review", FILTER_SANITIZE_SPECIAL_CHARS);
        $msg = filter_input(INPUT_POST,"msg", FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($fname)){
            echo "please enter the fname";

        }elseif (empty($lname)){
            echo "please enter the lname";

        }if(empty($group)){
            echo "please enter the group";

        }elseif (empty($review)){
            echo "please enter the review";

        }if(empty($msg)){
            echo "please enter the message";

        }else{
            try{
                $sql = "insert into datagroupe (first_name , last_name, group_stu, review, message)
                values('$fname' , '$lname', '$group', '$review', '$msg')";
                mysqli_query($conn, $sql);
                echo"you are now regester!";
            }
            catch(mysqli_sql_exception){
                echo "invalid!";
           
            }
        }

    }
    mysqli_close($conn);
?>