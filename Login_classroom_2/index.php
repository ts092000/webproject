<?php
include ("auth.php");
include ("db.php");
$id_post=$_REQUEST['id'];
$id_gv=$_REQUEST['gv'];
?>
<script type="text/javascript" src="main.js"></script>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Comments System</title>
		<link href="style.css" rel="stylesheet">
	</head>
	<body>
	<center><?php 	echo "<p><a href='homepage.php'>Trở về trang chủ</a> | 
					<a href='javascript:history.go(-1)'>Trở về lớp học</a></p></p>"; ?>
	</center>
		<div class="content">
                <?php
                    $id_giaovien=$_SESSION['username'];
                    $sql = "SELECT id,title,url,content,image FROM class_detail WHERE id = '$id_post'";
                    $sql_1 = mysqli_query($con,$sql);
					if($sql_1==TRUE)
					{
						while($sql_2 = mysqli_fetch_array($sql_1))
						{
							$image_link="image_php/".$sql_2['image'];
							echo "<table>";
								echo "<tr>";
									echo "<td width='220px' align='center' >";
										echo "<img src='$image_link' width='150px' >";echo "<br>";
									echo "</td>";
									echo "<td valign='top'>";
									echo "Người đăng: ";
									echo $id_gv;
									echo "<br>";
									echo "Tựa đề: ";
									echo $sql_2['title'];
									echo "<br>";
									echo "Chú thích: ";
										$url=$sql_2['url'];
									echo $url;
									echo "<br>";
									echo "Nội dung: ";
									echo $sql_2['content'];
									echo "<br>";
								echo "</tr>";
								echo "<br>";
							echo "</table>";
						}
					}
                ?>
		</div>
		<div class="comments">
			<script>
				var id = "<?php echo $id_post ?>";
				$varr = index(id);
			</script>
		</div>
	</body>
</html>