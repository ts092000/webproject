<?php
//include auth.php file on all secure pages
include("auth.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quản lý lớp học (Admin)</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    include("db.php");
    $sql = "SELECT id,ten_lop,ten_mon,phong_hoc,hinh_anh,ma_lop FROM class";
    $sql_1 = mysqli_query($con,$sql);
?>
<center>
<p><a href='homepage.php'>Trở về trang chủ</a></p>
<table width="990px" class="tb_a1" >
    <tr>
        <td width="120px" ><b>Hình ảnh</b></td>
        <td width="450px" ><b>Tên lớp học</b></td>
        <td align="center" width="140px" ><b>Môn học</b></td>
        <td align="center" width="140px" ><b>Phòng học</b></td>
        <td align="center" width="140px" ><b>Mã lớp học</b></td>
        <td align="center" width="120px" ><b>Update</b></td>
        <td align="center" width="120px" ><b>Delete</b></td>
        </td>
    </tr>
    <?php
        while($sql_2 = mysqli_fetch_array($sql_1))
        {
            $id = $sql_2['id'];
            $ten_lop = $sql_2['ten_lop'];
            $ten_mon = $sql_2['ten_mon'];
            $phong_hoc = $sql_2['phong_hoc'];
            $ma_lop = $sql_2['ma_lop'];
            $image_link="image_php/".$sql_2['hinh_anh'];
            ?>
                <tr class="a_1" >
                    <td align="center" >
                        <img src="<?php echo $image_link; ?>" class="img_link" border="0" >
                    </td>
                    <td>
                        <a class="lk_a1" ><?php echo $ten_lop; ?></a>
                    </td>
                    <td align="center" >
                        <a class="lk_a1"><?php echo $ten_mon; ?></a>
                    </td>
                    <td>
                        <a class="lk_a1"><?php echo $phong_hoc; ?></a>
                    </td>
                    <td align="center" >
                        <a class="lk_a1"><?php echo $ma_lop; ?></a>
                    </td>
                    <td align="center" >
                        <a href="update_classroom.php?id=<?php echo $sql_2["id"] ?>" class="lk_a1" >Sửa</a>
                    </td>
                    <td align="center" >
                        <a href="delete_classroom.php?id=<?php echo $sql_2["id"] ?>" class="lk_a1" >Xóa</a>
                    </td>
                </tr>
            <?php
        }
    ?>
</table>
</center>