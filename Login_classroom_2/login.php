<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Class Room</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require('db.php');
session_start();
if (isset($_POST['username']))
{
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
    $query = "SELECT role FROM `users` WHERE Username='$username' and Password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	while($rs = mysqli_fetch_assoc($result))
	{
		$role = $rs['role'];
	}
	$rows = mysqli_num_rows($result);
        if($rows==1)
		{
			$_SESSION['username'] = $username;
			$_SESSION['role'] = $role;
			header("Location: homepage.php");
        }else
		{
			echo "<div class='form'>Username or password is incorrect.</font>
			<br/>Click here to <a href='login.php'>Login</a>!!</div>";
		}
}
else
{
?>
<center>
<div class="formlogin">
<form action="" method="post" name="login">
<center>
<table cellspacing=10 border=0>
	<tr>
		<td colspan="2" class="tdlogin"><h2>Log In</h2><hr></td>
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
		<td colspan="2"><center><input name="submit" type="submit" class="btnlogin" value="Login" />
		<input name="reset" type="reset" class="btnregis" value="Reset"/></center></td>
	</tr>
	<tr>
		<td colspan="2"><p>Not registered yet? <a href='registration.php'>Register Here</a></p><a href='forgotpass.php'>Forgot password!</a></td>
	</tr>
</table>
</center>
</form>
</div>
</center>
<?php } ?>
</body>
</html>