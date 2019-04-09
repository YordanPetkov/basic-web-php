<html>
	<head>
		<title>Hi</title>
	</head>
	<body>
	<t1> one php program </t1>
	<p> Hello </p>

	<?php
	class student
	{
		
		public $name;
		public $age;
		public $course;
		
		public function _construct($name1,$age1,$course1)
		{
			$this-> name = $name1;
			$this-> age = $age1;
			$this -> course = $course1;
		}
		
	}
		echo "Hello World!" ;
		$a = 5;
		echo "<br>";
		echo $a;
		
		echo "<br>";
		
		$pescho = new student;
		
		$pescho->_construct("Pescho Hristov Ivanov","15","PHP/HTML/JavaScript");
		
		//$pescho.$age="15";
		//$pescho.$name="Pescho Hristov Ivanov";
		//$pescho.$course="PHP/HTML/JavaScript";
	
		echo "Name    Age     Course";
		echo "<br>";
		echo "$pescho.name      $pescho.age   $pescho.course ";
	?>
	</body>
	

</html>