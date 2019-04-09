<?php
	$dblink =new mysqli("localhost","root");
	if($dblink -> connect_error)
	{
		echo "Connected";
	}
	else
	{
		echo "ERROR";
		return;
	}
	
	$query = 
			"
				select * from students;
			";
	if($result =($dblink -> query($query)) === true)
	{
		echo "YES";
	}
	else echo "NO";
	
	$table = $result->fetch_assoc();
	echo $table[0] . " " . $table[1] . " " . $table[2] ;
	$dblink -> close();

?>