<?php

echo "Hello ".$_POST["nickname"]."<br>";
echo "your email is ".$_POST["mail"]."<br>";
echo "You are ".$_POST["gender"]."<br>";
echo "and you are born on ".$_POST["birthdate"].".";

echo "<a href=\"http://localhost/php-tutorial/page1.php\">Go to page";

$dblink = mysql_connect("localhost","root","");
if(!mysql_select_db("members",dblink)){
	echo "ERROR";
	return ;
}

$query = "select * from"
?>