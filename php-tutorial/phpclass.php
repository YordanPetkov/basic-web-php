<?php
	class People
	{
		protected $name;
		protected $age;
		
		public function __construct($name,$age)
		{
			$this->name = $name;
			$this->age = $age;
		}
		
		public function setName($name)
		{
			$this->name = $name;
		}
		
		public function setAge($age)
		{
			$this-> age = $age;
		}
		
		public function getName()
		{
			return $this->name;
		}
		
		public function getAge()
		{
			return $this->age;
		}
		
		public function __toString()
		{
			echo "Name : $this->name <br>Age : $this->age";
		}
	}
	
	
	class Student extends People
	{
		private $grades;
		
		function __construct($name,$age,array $grades)
		{
			parent::__construct($name,$age);
			$this->grades = $grades;
		}
		
		function addGrade($grade)
		{
			$this->grades[] = $grade;
		}
		
		function getGrades()
		{
			return $this->grades;
		}
		
		
	}
	
	
	class Senior extends People
	{
		private $salary;
		private $tax;
		
		function __construct($name,$age,$salary,$tax)
		{
			parent::__construct($name,$age);
			$this->salary = $salary;
			$this->tax = $tax;
		}
		
		function getMoney()
		{
			return $this->salary - $this->tax;
		}
		
		
		
	}
	
	$myStudent = new Student("Ivan",16,[6,5,4,6,5,4]);
	$myDad = new Senior("Pesho",46,1450,680);
	
	
	foreach($myStudent->getGrades() as $grade)
	{
		echo $grade . " ";
	}
	echo "<br>";
	echo $myDad->getMoney();
	
	echo $myDad;
?>