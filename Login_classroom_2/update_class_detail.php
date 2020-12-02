<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit bài viết </title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
    $id = $_GET['id'];
    require("db.php");
    $sql="select * from class_detail where id='$id'";
    $sql_1=mysqli_query($con,$sql);
    $sql_2=mysqli_fetch_array($sql_1);
    $id = $sql_2['id'];
    $title = $sql_2['title'];
    $url = $sql_2['url'];
    $content = $sql_2['content'];
    $image_name=$sql_2['image'];
    $image_link="image_php/".$sql_2['image'];
?>

<center>
<div class="formclass">
<form action="posts_xuly_update.php" method="post" enctype="multipart/form-data" >
<input type="hidden" name="id" value="<?php echo $id ?>">
    <table width="990px" >
        <tr>
            <td colspan="2" ><b style="color:red;font-size:20px" >Sửa bài viết</b><br><br> </td>
        <tr>
            <td width="150px" >Tiêu đề: </td>
            <td width="840px">
                <input style="color:red;width:400px;margin-top:3px;margin-bottom:3px;" name="title" id="title" value="<?php echo $title; ?>">
            </td>
            <tr>
            <td width="150px" >Chú thích : </td>
            <td width="840px">
                <input style="color:red;width:400px;margin-top:3px;margin-bottom:3px;" name="url" id="url" value="<?php echo $url; ?>" >
            </td>
            </tr>
            <tr>
            <td width="150px" >Nội dung : </td>
            <td width="840px">
                <textarea name="content" id="content" placeholder="Điền nội dung..." rows="10" cols="52"><?php echo $content; ?></textarea>
            </td>
            </tr>
            <tr>
            <td >Tải file(hình ảnh) : </td>
            <td>
                <img src='<?php echo $image_link; ?>' style='width:180px' >
                <br><br>
                <input type="file" id="image" name="image" >
                <input type="hidden" name="image_name" value="<?php echo $image_name; ?>" >
            </td>
            <tr>
            <td>&nbsp;</td>
            <td>
                <br>
                <input type="submit" name="form_update_baiviet" value="Sửa bài viết" style="color:white;background-color:green;width:150px;height:40px;font-size:20px" >
                </td>
            </tr>
        </tr>
    </table>
<div class="formclass">
<center>
</form>
</body>