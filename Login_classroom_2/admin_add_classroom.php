<?php
//include auth.php file on all secure pages
include("auth.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thêm lớp</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
 
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  
    function generate_string($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
  
        return $random_string;
    }
?>
<center>
<div class="formclass">
<form action="add_classroom_into_database.php" method="post" enctype="multipart/form-data" >
<input type="hidden" name="id" value="<?php echo $id ?>">
    <table width="990px" >
        <tr>
            <td colspan="2" ><b class="headerclass">Thêm lớp học</b><br><br> </td>
        <tr>
            <td width="150px" >Tên lớp học : </td>
            <td width="840px">
                <input class="inputclass" name="ten_lop" id="ten_lop" value="">
            </td>
            <tr>
            <td width="150px" >Môn học : </td>
            <td width="840px">
                <input class="inputclass" name="ten_mon" id="ten_mon" value="" >
            </td>
            </tr>
            <tr>
            <td width="150px" >Phòng học : </td>
            <td width="840px">
                <input class="inputclass" name="phong_hoc" id="phong_hoc" value="">
            </td>
            </tr>
			<tr>
            <td width="150px" >Mã giáo viên : </td>
            <td width="840px">
                <input class="inputclass" name="id_giaovien" id="id_giaovien" value="">
            </td>
            </tr>
            <tr>
            <td >Ảnh lớp : </td>
            <td>
                <input type="file" id="hinh_anh" name="hinh_anh" >
            </td>
            </tr>
            <tr>
            <td>&nbsp;</td>
    <input type="hidden" name="ma_lop" value="<?php echo generate_string($permitted_chars, 6); ?>" required >
            <td>
                <br>
                <input type="submit" name="form_add_class" class="btnclass" value="Thêm lớp học">
                <input type="button" name="form_add_class" class="btnclass" value="Thoát form" onclick="window.location.href='homepage.php'">
            </td>
            </tr>
        </tr>
    </table>
</form>
</div>
</center>