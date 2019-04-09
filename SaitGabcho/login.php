<?php

        $nickname = $_GET['username'];
    ?>

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
            <button class="play-btn" onclick="PlayVideo()">Play</button>
        </div>

    </header>

    <div class="page-view">
        <div class="login-form">
            <?php
                 echo ' <h3 id="form-title" class="random-shit-lover">Hello ' . $nickname . '</h3>';
            ?>
            <form action="logout.php" class="form-logout">
                <input class="logout-act-btn" type="submit" value="Logout">
            </form>
            <div class="form-btns">
                <form class="form-btns-upload" action='upload.php?username=<?php echo $_GET["username"]?>' method="post">
                    <input type="submit" name="action" value="Upload" class="act-btn">
                </form>
            </div>
        </div>


        <section class="video-page">
            <p class="video-page-text" id="video-page-text"><strong>Click on the button to watch some RandomShit.</strong></p>
            <div  class="video">
                <button onclick="playPause()">Play/Pause</button>
                <button onclick="makeBig()">Big</button>
                <button onclick="makeSmall()">Small</button>
                <button onclick="makeNormal()">Normal</button>
                <br><br>

                <video id="video1" width="320" height="240" controls>
                    <source src="" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <img id="picture1" src="background.jpg" alt="picture" width="40" height="60">

                <?php
                $link =new mysqli("localhost" , "exlogin" , "123456" , "randomshit");

                if($link === false)
                {
                    die("ERROR: Could not connect. " . mysql_connect_error());
                }


                $query = "select * from videos";
                $result = $link -> query($query);
                $row_count = mysqli_num_rows($result);
                //var_dump($result);
                $random_video = rand(0,$row_count-1);
                //echo empty($result);


                if(!empty($result)) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        $array_rows [] = $row;

                    }
                    //var_dump($array_rows);"uploads/" .
                    $my_video_src = $array_rows[$random_video][1];

                    var_dump($my_video_src);
                    echo $my_video_src;

                   ?>

                    <script>
                        function PlayVideo() {
                            alert("dada");
                            document.getElementById("picture1").src = ;

                            var s = document.getElementById("picture1").src;
                            var i =0;
                            i = <?php echo "background.jpg" ;?>;
                            alert("DA");
                        }
                    </script>
                    <?php
                }

                else{
                    echo "not now";
                }
                $link -> close();
                ?>



            </div>
        </section>

    </div>
    <footer>
        We do NOT own video clips in the site &copy; G B Y
    </footer>
</body>
</html>

