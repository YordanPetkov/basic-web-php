<?php
	
$powerOf = $_POST["power"];



$myNumber = $_POST["n1"];
$myAns = $myNumber;

while($myAns > $powerOf)
{
	$myAns/=$powerOf;
	if($myAns % $powerOf != 0){echo $myNumber . " is not power of 2.";return;}
}

if($myAns == $powerOf)echo $myNumber . " is power of $powerOf.";
else echo $myNumber . " is not power of $powerOf.";
?>