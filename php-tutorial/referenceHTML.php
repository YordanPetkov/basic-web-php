<?php
	define("Greetings","Hello guys , this is a simple web page. (PHP,HTML,CSS,JavaScript)");
	$age = 15;
	$color = "red";
	echo $age . $color;
	
	
	function myFunc()
	{
		echo $GLOBALS['age'];
	}
	
	myFunc();

	var_dump($age);
	$cars = array("Volvo","Fiat","Mercedes");
	
	echo "<br>";
	foreach($cars as $car)
	{
		echo "-" . $car . "<br>";
	}
	echo Greetings;
	
	$c;
	$c = "ONE";
	echo "<br>";
	switch($c)
	{
		case 3 :
		echo "This is number three";
		break;
		
		case 2 :
		echo "This is number two";
		break;
		
		case "ONE" :
		echo "This is number one";
		break;
		
		default :
		echo "I don't know this number";
		break;
	}
	
	
	echo "<br>";
	$n = 10;
	while ($n != 1)
	{
		echo $n-- . " ";
	}		
	echo $n--;
	echo "<br>";
	$p = 31241;
	do
	{
		$p/=2;
	}while($p%2==0);
	echo $p . "<br>";
	
	
	$a = 10;
	$b = 2;
	
	function Sum($x,$y)
	{
		return $x+$y;
	}
	
	echo Sum($a,$b);
	?>
	<form  action = ""method = "post">
	<input type = "text" name = "name">
	<input type = "submit" value = "OK">
	</form>

	<?php
	include 'footer.php';
	footer();
	?>