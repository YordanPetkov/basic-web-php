<!DOCTYPE html> 
<html>
	<head>
		<title> Page 1 </title>
		<meta charset="UTF-8">
		
		<style>
			h1
			{
				color : red;
				text-align: center;
			}
			
			form
			{
				text-align : center;
			}
			
		</style>
		
		
		
	</head>
	<body>
		<h1> Register </h1>
		
		<form	action="page1php.php" method="post">
			<input type = "email" name = "mail" placeholder = "your_mail@gmail.com"required >Email<br>
			<input type = "text" name = "nickname" placeholder = "Nickname" required>Nickname<br>
			<input type = "password" name="password" placeholder = "Password" required>Password<br>
			<input type = "radio" name="gender" value="male" checked>Male<br>
			<input type = "radio" name="gender" value="female" >Female<br>
			<input type = "radio" name="gender" value="other" >Other<br>
			<input id="BirthDate" type = "date" name="birthdate" >Birth Date <br>
			<input type="submit" value="registration"><br>
		</form>
	</body>
</html>
