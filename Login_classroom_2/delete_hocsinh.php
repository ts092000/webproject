<?php
	require('db.php');
	include("auth.php");								
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>User Result:</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="tbuser">
			<center>
				<p><a href="homepage.php">Turn back</a></p>
				<h2>All users</h2>
				<table class="tableuser" width="100%" border="1">
					<thead>
						<tr>
						<th><strong>S.No</strong></th>
						<th><strong>UserName</strong></th>
						<th td colspan="2"><strong>Class Name</strong></th>
						<!-- them edit -->
						<!-- <th><strong>Edit</strong></th> -->
						</tr>
					</thead>
					<tbody>
						<?php
							$count=1;
							$sel_query="SELECT u.Username,u.Role,c.ten_lop, c.id,j.id_lop  from users u,class c, join_class j WHERE role ='student' and c.id = j.id_lop and u.Username = j.username;";
							// $sel_query_lop = "Select ten_lop from class where id_giaovien = _SESSION['username'];";
							$result = mysqli_query($con,$sel_query);
							while($row = mysqli_fetch_assoc($result)) { ?>
								<tr><td align="center"><?php echo $count; ?></td>
								<td align="center"><?php echo $row["Username"]; ?></td>
								<td align="center"><?php echo $row["ten_lop"]; ?></td>
								<!-- <td align="center"><a style="color:black;" href="changerole.php?id=<?php echo $row["Username"];?>">Kick</a></td> -->
								<td align="center"><button type="button" onclick=kickStudent(id); ?>Kick</button></td>
								</tr>
							<?php $_SESSION['ID']=($count++)-1; } 

						?>
					</tbody>
				</table>
			</center>
		</div>
	</body>
</html>