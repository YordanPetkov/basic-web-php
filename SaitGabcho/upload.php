
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
            <button class="play-btn" onclick="Upload()">Play</button>
        </div>

    </header>
    <div class="page-view">
        <div class="login-form">
            <h3 id="form-title" class="form-title">Upload</h3>
            <form class="form-input" method="post" enctype="multipart/form-data">
                File :<input type="file" name="my-file" value="my-file">
                Name :<input type="text" name="video-name" required>
                <div class="form-btns">
                    <input class="act-btn" type="submit" name="upload" value="Upload">
                </div>
            </form>
            <div class="form-btns">
                <form class="form-btns-login" action='login.php?username=<?php echo $_GET["username"]?>' method="post">
                    <input type="submit" name="action" value="Watch" class="act-btn">
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
    //var_dump($_FILES);
    $link =new mysqli("localhost" , "exlogin" , "123456" ,"randomshit" );

    if($link === false)
    {
        die("ERROR: Could not connect. " . mysql_connect_error());
    }

    if(isset($_POST['upload']))
    {

        $file = rand(1000,100000)."-".$_FILES['my-file']['name'];
        $file_loc = $_FILES['my-file']['tmp_name'];
        $file_size = $_FILES['my-file']['size'];
        $file_type = $_FILES['my-file']['type'];
        $folder=__DIR__ . "/" ;//."\\uploads\\"
        $new_size = $file_size/1024;
        $new_file_name = strtolower($file);
        $final_file=str_replace(' ','-',$new_file_name);

        if(move_uploaded_file($file_loc,$folder.$final_file)) {
            $query = "INSERT INTO videos(file,type,size) VALUES('$final_file','$file_type','$new_size')";
            mysqli_query($link,$query);
            //echo $file_loc . " " . $folder.$final_file;
        }
        else
        {
            ?>
            <script>
                alert('error while uploading file');
            </script>
            <?php
        }
        $link -> close();
    }
?>