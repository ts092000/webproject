<?php
//include auth.php file on all secure pages
include("auth.php");
$id_lop = $_REQUEST['id'];
?>

<!DOCTYPE html>  
<html>
<head>
    <title>Thêm bài viết</title>
    <meta charset="utf-8">
	<title>Lớp học</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<center>
<div class="formclass">
<form action="posts_xuly.php" method="post" enctype="multipart/form-data" >
    <table width="990px" >
        <tr>
            <td colspan="2" ><b style="color:red;font-size:20px" >Thêm bài viết</b><br><br> </td>
        <tr>
            <td width="150px" >Tiêu đề: </td>
            <td width="840px">
				<input name="id_lop" type="hidden" value="<?php echo htmlspecialchars($id_lop);?>">
                <input style="color:red;width:400px;margin-top:3px;margin-bottom:3px;" name="title" id="title" value="">
            </td>
            <tr>
            <td width="150px" >Chú thích : </td>
            <td width="840px">
                <input style="color:red;width:400px;margin-top:3px;margin-bottom:3px;" name="url" id="url" value="" >
            </td>
            </tr>
            <tr>
            <td width="150px" >Nội dung : </td>
            <td width="840px">
                <textarea name="content" id="content" placeholder="Điền nội dung..." rows="10" cols="52"></textarea>
            </td>
            </tr>
            <tr>
            <td >Tải file(hình ảnh) : </td>
            <td>
                <input style="color:red;" type="file" id="image" name="image" >
            </td>
            <tr>
            <td>&nbsp;</td>
            <td>
                <br>
                <input type="submit" name="form_add_baiviet" value="Thêm bài viết" style="color:white;background-color:green;width:150px;height:40px;font-size:20px" >
                </td>
            </tr>
        </tr>
    </table>
<center>
</form>
<div class="formclass">
</body>
</html>