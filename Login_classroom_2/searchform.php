<?php
//include auth.php file on all secure pages
include("auth.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tìm kiếm</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
Tìm kiếm lớp học <br>
<form action="searchclass.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="parameters" value="searching" >
    <input type="text" name="keywords" id="keywords" value="">
    <p><input type="submit" value="Tìm" >
	<input type="button" name="form_add_class" value="Trở về trang chủ" onclick="window.location.href='homepage.php'"></p> 
</form>
</body>
</html>