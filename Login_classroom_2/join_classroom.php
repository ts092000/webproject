<?php
//include auth.php file on all secure pages
include("auth.php");
require("db.php");
$code = $_POST['code'];
$username = $_SESSION['username'];
$sql = "SELECT id, id_giaovien, ten_lop, ten_mon, phong_hoc, hinh_anh, ma_lop FROM class where ma_lop='$code'";
$sql_1 = mysqli_query($con,$sql);
$rows = mysqli_num_rows($sql_1);
if($rows==1)
{
	$sql_2 = "SELECT * FROM join_class where ma_lop='$code'";
	$sq_2 = mysqli_query($con,$sql_2);
	$row1 = mysqli_num_rows($sq_2);
	if ($row1!=0)
	{
		print ('Bạn đã tham gia lớp học này');
		echo "<p><a href='homepage.php'>Trở về trang chủ</a></p>";
	}
	else
	{
		while($sql_2 = mysqli_fetch_array($sql_1))
		{
			print('Tham gia lớp thành công');
			echo "<p><a href='homepage.php'>Trở về trang chủ</a></p>";
			$id_lop = $sql_2['id'];
			$ma_lop = $sql_2['ma_lop'];
			$query = "INSERT into `join_class` (id, username, id_lop, ma_lop)
						VALUES (NULL,'$username','$id_lop','$ma_lop')";
			$result = mysqli_query($con,$query);
		}
	}
}
else{
	print('Mã lớp không tồn tại');
	echo "<p><a href='homepage.php'>Trở về trang chủ</a></p>";
}
?>
