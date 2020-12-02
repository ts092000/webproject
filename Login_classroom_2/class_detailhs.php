<?php
//include auth.php file on all secure pages
include("auth.php");
include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lớp học</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    $id_giaovien=$_SESSION['username'];
	$id_lop = $_REQUEST['id'];
    $sql = "SELECT * FROM class WHERE ma_lop='$id_lop'";
    $sql_1 = mysqli_query($con,$sql);
    $sql_2 = mysqli_fetch_array($sql_1);
?>
    <center>
        <table width="800px">
            <tr>
                <td colspan="2">
                    <nav class="navbar navbar-inverse">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="homepage.php">Classroom</a>
                            </div>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="homepage.php"><span class="glyphicon glyphicon-log-in"></span>Trang chủ</a></li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#"><?php $image_link = "image_php/".$sql_2['hinh_anh'];
                                                                    echo "<img src='$image_link'width='400px'>";echo"<br>";?></a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Danh sách sinh viên</a></li>
                            </ul>
                        </div>
                    </nav>
                </td>
            </tr>
            <tr>
                <td width="550px" valign="top" >
                <?php
                    $sql = "SELECT id, id_giaovien, title,url,content,image FROM class_detail WHERE id_lop = '$id_lop'";
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
									echo "Title: ";
									echo $sql_2['title'];
									echo "<br>";
									echo "Chú thích: ";
										$url=$sql_2['url'];
									echo $url;
									echo "<br>";
									echo "Nội dung: ";
									echo $sql_2['content'];
									echo "<br>";
									$id_post=$sql_2['id'];
									$id_giaovien=$sql_2['id_giaovien'];
									echo '<a href="index.php?id='.$id_post.'&gv='.$id_giaovien.'">Bình luận</a>';
								echo "</tr>";
								echo "<br>";
							echo "</table>";
						}
					}
                ?>
                </td>
                <td width="250px" valign="top" >
                </td>
            </tr>
            <tr>
            </tr>
        </table>
    </center>
</body>
</html>