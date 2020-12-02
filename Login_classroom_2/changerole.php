<?php
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT role FROM `users` WHERE Username='$id'";
$result = mysqli_query($con,$query) or die(mysql_error());
while($rs = mysqli_fetch_assoc($result))
{
	$role = $rs['role'];
}
if ($role=="student")
{
	$ins_query="UPDATE users SET Role='teacher'
						WHERE Username='$id'";
	if ($con->query($ins_query) === TRUE) 
	{
		header("Location: editrole.php");
	} 
}
else
{
	$ins_query="UPDATE users SET Role='student'
						WHERE Username='$id'";
	if ($con->query($ins_query) === TRUE) 
	{
		header("Location: editrole.php");
	} 
}
?>

