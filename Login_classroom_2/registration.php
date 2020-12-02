<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
        $query = "INSERT into `users` (Username, Password, Email)
VALUES ('$username', '".md5($password)."', '$email')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<font color='#8e1b0e' size='+2'>You are registered successfully.</font>
<br/>Click here to <a href='login.php'>Login</a>!!</div>";
        }
    }else{
?>
<center>
<div class="formlogin">
<form name="registration" action="" method="post">
<center>
<table cellspacing=10 border=0>
	<tr>
		<td colspan="2" class="tdlogin"><h2>Register</h2><hr></td>
	</tr>
	<tr>
		<td>User Name:</td>
		<td><input type="text" name="username" placeholder="Username" required /></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="password" placeholder="Password" required /></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="text" name="email" placeholder="Email" required /></td>
	</tr>
	<tr>
		<td colspan="2"><center><input name="submit" type="submit" class="btnlogin" value="Register"/>
		<input name="reset" type="reset" class="btnregis" value="Reset"/></center></td>
	</tr>
</center>
</form>
</div>
</center>
<?php } ?>
</body>
</html>