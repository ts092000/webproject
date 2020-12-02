<?php
    include("auth.php");
	require('db.php');
	if ($_SESSION['username']=='admin')
	{
		$ten_lop = $_POST['ten_lop'];
		$ten_mon = $_POST['ten_mon'];
		$phong_hoc = $_POST['phong_hoc'];
		$ten_file_anh = $_FILES['hinh_anh']['name'];
		$ma_lop = $_POST['ma_lop'];
		$id_giaovien = $_SESSION['username'];
		$sql0="select * from users where Username='$id_giaovien'";
		$result=mysqli_query($con, $sql0);
		if ($result)
		{
			if (mysqli_num_rows($result) > 0) {
				if($ten_lop != "" && $ten_mon != "" && $phong_hoc != "")
				{
					if($ten_file_anh!="")
					{
						$sql =" INSERT INTO class (id,id_giaovien,ten_lop,ten_mon,phong_hoc,hinh_anh,ma_lop)
							VALUES (NULL ,'$id_giaovien' , '$ten_lop' , '$ten_mon' , '$phong_hoc' , '$ten_file_anh' , '$ma_lop'); ";
						mysqli_query($con,$sql);
					}
					else
					{
						echo "Chưa chọn ảnh";
						echo "<a href='javascript:history.go(-1)'>Trở về</a>";
					}
				}
				else
				{
					echo "Vui lòng điền đầy đủ thông tin";
					echo "<a href='javascript:history.go(-1)'>Trở về</a>";
				}
				header("Location: ht_classroom.php");
			}
			else
			{
				echo "Mã giáo viên không tôn tại";
				echo "<a href='javascript:history.go(-1)'>Trở về</a>";
			}
		}
	}
	else{
		$ten_lop = $_POST['ten_lop'];
		$ten_mon = $_POST['ten_mon'];
		$phong_hoc = $_POST['phong_hoc'];
		$ten_file_anh = $_FILES['hinh_anh']['name'];
		$ma_lop = $_POST['ma_lop'];
		$id_giaovien = $_SESSION['username'];
		if($ten_lop != "" && $ten_mon != "" && $phong_hoc != "")
		{
			if($ten_file_anh!="")
			{
				$sql =" INSERT INTO class (id,id_giaovien,ten_lop,ten_mon,phong_hoc,hinh_anh,ma_lop)
					VALUES (NULL ,'$id_giaovien' , '$ten_lop' , '$ten_mon' , '$phong_hoc' , '$ten_file_anh' , '$ma_lop'); ";
				mysqli_query($con,$sql);
			}
			else
			{
				echo "Chưa chọn ảnh";
				echo "<a href='javascript:history.go(-1)'>Trở về</a>";
			}
		}
		else
		{
			echo "Vui lòng điền đầy đủ thông tin";
			echo "<a href='javascript:history.go(-1)'>Trở về</a>";
		}
		header("Location: ht_classroom_teacher.php");
	}
?>