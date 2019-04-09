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
            <button class="play-btn" onclick="Register()">Play</button>
        </div>

    </header>
    <div class="page-view">
        <div class="login-form">
            <h3 id="form-title" class="form-title">Registration</h3>
            <form class="form-input" method="post">
                Nickname : <input type="text" name="user" placeholder="nickname" required>
                Password : <input type="password" name="pass" placeholder="password" required>
                Confirm Password : <input type="password" name="confpass" placeholder="confirm password" required>
                <div class="form-btns">
                    <input class="act-btn" type="submit" name="register" value="Register">
                </div>
            </form>
            <div class="form-btns">
                <form class="form-btns-login" action="random-shit.php" method="post">
                    <input type="submit" name="action" value="Login" class="act-btn">
                </form>
            </div>
        </div>
        <section class="video-page">
            <p class="video-page-text" id="video-page-reg-text"><strong>In our site you can watch, appreciates, upload videos.</strong></p>
        </section>
    </div>
    <footer>
        We do NOT own video clips in the site &copy; G B Y
    </footer>
</body>

<?php
    if(isset($_POST["user"]) && (isset($_POST["pass"])))
    {
        $name = $_POST["user"];
        $pass = $_POST["pass"];
        $confpass = $_POST["confpass"];
        $nocryptpass = strrev($pass);
        $nocryptpass = str_rot13($nocryptpass);
        $nocryptpass = md5($nocryptpass);

        $nocryptname = strrev($name);
        $nocryptname = sha1($nocryptname);

        $mycryptpass =  crypt ( $nocryptpass , $nocryptname  );
        $mycryptname =  crypt ( $nocryptname,  $nocryptpass  );

        if($pass != $confpass)
        {
            echo "<script type='text/javascript'>alert('Passwords are different!');</script>";
        }
        else if(!preg_match("/^[a-zA-Z0-9]*$/",$name) || (!preg_match("/^[a-zA-Z0-9]*$/",$pass)))
        {
            echo "<script type='text/javascript'>alert('Only letters and numbers allowed!');</script>";
        }
        else if(strlen($pass) < 6 || strlen($name) < 6)
        {
            echo "<script type='text/javascript'>alert('Minimum 6 characters!');</script>";
        }

        else
        {

                $link =new mysqli("localhost" , "exlogin" , "123456" ,"randomshit" );

                if($link === false)
                {
                    die("ERROR: Could not connect. " . mysql_connect_error());
                }

                $query = "select * from members";
                $result = $link -> query($query);
                //echo empty($result);

                $isUsed = false;
                if(!empty($result))
                {
                    while($row = mysqli_fetch_row($result))
                    {

                        if($row[0] == $name)
                        {
                            echo "<script type='text/javascript'>alert('Username is already used!');</script>";
                            $isUsed = true;
                        }

                    }
                }

                else
                {
                    //echo "<script type='text/javascript'>alert('Yon can not registered now!');</script>";
                    //die();
                }

                if($isUsed == false)
                {
                    $query =
                        "
								INSERT INTO members
								VALUES ('$mycryptname','$mycryptpass')
							";
                    if(mysqli_query($link, $query)){

                        //echo "Records inserted successfully.";

                    } else
                    {
                        echo "ERROR: Could not able to execute $query. " . mysqli_error($link);
                    }
                    $link -> close();
                    header('Location: random-shit.php');
                }



                $link -> close();

        }



    }

?>