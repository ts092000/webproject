<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit lớp (Admin)</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    $id = $_GET['id'];
    require("db.php");
    $sql="select * from class where id='$id' ";
    $sql_1=mysqli_query($con,$sql);
    $sql_2=mysqli_fetch_array($sql_1);
    $ten_lop = $sql_2['ten_lop'];
    $ten_mon = $sql_2['ten_mon'];
    $phong_hoc = $sql_2['phong_hoc'];
    $ma_lop = $sql_2['ma_lop'];
    $ten_anh=$sql_2['hinh_anh'];
    $image_link="image_php/".$sql_2['hinh_anh'];
?>

<center>
<form class="formclass" action="update_classroom_teacher_into_database.php" method="post" enctype="multipart/form-data" >
<input type="hidden" name="id" value="<?php echo $id ?>">
    <table width="990px" >
        <tr>
            <td colspan="2" ><b class="fixclass">Sửa lớp học</b><br><br> </td>
        <tr>
            <td width="150px" >Tên lớp học : </td>
            <td width="840px">
                <input class="inputupdate" name="ten_lop" id="ten_lop" value="<?php echo $ten_lop; ?>">
            </td>
            <tr>
            <td width="150px" >Môn học : </td>
            <td width="840px">
                <input class="inputupdate" name="ten_mon" id="ten_mon" value="<?php echo $ten_mon; ?>" >
            </td>
            </tr>
            <tr>
            <td width="150px" >Phòng học : </td>
            <td width="840px">
                <input class="inputupdate" name="phong_hoc" id="phong_hoc" value="<?php echo $phong_hoc; ?>">
            </td>
            </tr>
            <tr>
            <td >Ảnh lớp : </td>
            <td>
                <img src='<?php echo $image_link; ?>' class="imgupdate" >
                <br><br>
                <input type="file" name="hinh_anh" >
                <input type="hidden" name="ten_anh" value="<?php echo $ten_anh; ?>" >
                <br><br>
            </td>
            </tr>
            <tr>
            <td>&nbsp;</td>
    <input type="hidden" name="ma_lop" value="<?php echo $ma_lop; ?>" required >
            <td>
                <br>
                <input type="submit" name="form_update_class" value="Sửa lớp học" class="btnclass">
                <input type="submit" name="form_update_class" value="Đóng form" class="btnclass">
            </td>
            </tr>
        </tr>
    </table>
</form>
</center>