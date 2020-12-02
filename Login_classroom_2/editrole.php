<?php
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>User Result</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="tbuser">
<center>
<p><a href="homepage.php">Trang chủ</a></p>
<h2>All users</h2>
<table class="tableuser" width="100%" border="1">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>UserName</strong></th>
<th td colspan="2"><strong>Role</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from users where role!='admin';";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["Username"]; ?></td>
<td align="center"><?php echo $row["Role"]; ?></td>
<td align="center"><a href="changerole.php?id=<?php echo $row["Username"];?>">Change</a></td>
</tr>
<?php $_SESSION['ID']=($count++)-1; } ?>
</tbody>
</table>
</center>
</div>
</body>
</html>