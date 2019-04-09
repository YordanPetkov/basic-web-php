<?php
	$dblink =new mysqli("localhost","root","123456");
	if(mysql_select_db("students",$dblink))
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
	$res = mysql_query($query);
	
	$row = mysql_fetch_array($res);
	if($row)
		echo $row;
	else	
		echo "No results";
	
	mysql_close();

?>