<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<title>Welcome Home</title>
</head>
<body>
<center>
<?php
	if ($_SESSION['role']=="admin")
	{
		echo "<div class='formhomepage'>
				<p><a href='editrole.php'>Edit role</a></p>
				<p><a href='add_classroom.php'>Add class</a></p>
				<p><a href='ht_classroomadmin.php'>All class</a></p>
				<p><a href='editclass.php'>Edit class</a></p>
				<p><a href='searchform.php'>Search class</a></p>
				<p><a href='logout.php'>Logout</a></p>
			  </div>";
	}
	else if ($_SESSION['role']=="teacher")
	{
		echo "<div class='formhomepage'>
				<form action='add_classroom.php' method='post' name='Creating Class'>
					<input name='submit' type='submit' class='btnlogin' value='Creating Class'/></p>
					<p><a href='ht_classroom_teacher.php'>My class</a></p>
					<p><a href='manage_classroom.php'>Manage my class</a></p>
					<p><a href='searchform.php'>Search class</a></p>
					<p><a href='logout.php'>Logout</a></p>
				</form>
			  </div>";
	}
	else
	{
		echo "<div class='formhomepage'>
				<form action='join_classroom.php' method='post' name='Joining'>
					<p><input type='text' name='code' placeholder='code'/>
					<input name='submit' type='submit' class='btnlogin' value='Joining'/></p>
					<p><a href='searchform.php'>Search class</a></p>
					<p><a href='ht_classroom.php'>Show class</a></p>
					<p><a href='logout.php'>Logout</a></p>
				</form>
			  </div>";
	}
?>
</center>
</body>
</html>