<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Random Shit</title>
    <link rel="stylesheet" type="text/css" href="random-shit.css">
    <script src="random-shit.js"></script>
</head>
<body>
<header>
    <div class="header-block">
        <img src="title.jpg" class="header-title" alt="Random Shit">
        <button class="play-btn" onclick="LoggedIn()">Play</button>
    </div>

</header>

<div class="page-view">
    <div class="login-form">
        <h3 id="form-title" class="form-title">Login</h3>

        <form class="form-input" method="post" id="form-input">
            <div class="form-nickname">
                <label  for="nickname">Nickname:</label>
                <input type="text" id="nickname" name="user" required>
            </div>
            <div class="form-password">
                <label for="pass">Password:</label>
                <input type="password" id="pass" name="pass" required>
            </div>

            <div class="form-btns">
                <input type="submit" name="action" value="Login" class="act-btn">
            </div>
        </form>
        <div class="form-btns">
            <form class="form-registration" action="registration.php" method="post">
                <input type="submit" name="action" value="Register" class="act-btn">
            </form>
        </div>


    </div>


    <section class="video-page">
        <p class="video-page-text" id="video-page-log-text"><strong>Click on the button to watch some RandomShit.</strong></p>
    </section>



</div>
<footer>
    We do NOT own video clips in the site &copy; G B Y
</footer>


</body>
</html>



<?php

    if(isset($_POST["user"]) && (isset($_POST["pass"])))
    {
        $name = $_POST["user"];
        $pass = $_POST["pass"];
        $nocryptpass = strrev($pass);
        $nocryptpass = str_rot13($nocryptpass);
        $nocryptpass = md5($nocryptpass);
        $nocryptname = strrev($name);
        $nocryptname = sha1($nocryptname);

        $mycryptpass =  crypt ( $nocryptpass , $nocryptname  );
        $mycryptname =  crypt ( $nocryptname,  $nocryptpass  );
        if(!preg_match("/^[a-zA-Z0-9]*$/",$name) || (!preg_match("/^[a-zA-Z0-9]*$/",$pass)))
        {
            echo "<script type='text/javascript'>alert('Only letters and numbers allowed!');</script>";
        }

        else
        {
            $link =new mysqli("localhost" , "exlogin" , "123456" , "randomshit");

            if($link === false)
            {
                die("ERROR: Could not connect. " . mysql_connect_error());
            }

            $query = "select * from members";
            $result = $link -> query($query);

            //echo empty($result);


            if(!empty($result))
            {
                while($row = mysqli_fetch_row($result))
                {

                        if($row[0] == $mycryptname && $row[1] == $mycryptpass)
                    {

                        header('Location: login.php?username=' . $name);
                        $link -> close();
                        exit();
                    }

                }

            }
            else
            {
                echo "<script type='text/javascript'>alert('Wrong nickname or password');</script>";
            }
            echo "<script type='text/javascript'>alert('Wrong nickname or password');</script>";
            $link -> close();
        }
    }



?>

