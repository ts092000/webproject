<?php
//include auth.php file on all secure pages
include("auth.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quản lý chi tiết lớp học</title>
</head>
<body>
<?php
    include("db.php");
    $id_giaovien=$_SESSION['username'];
    $sql = "SELECT id,title,url,content,image FROM class_detail WHERE id_giaovien='$id_giaovien'";
    $sql_1 = mysqli_query($con,$sql);
?>
<center>
<table width="990px" class="tb_a1" >
    <tr class="tr_a1" style="background:#CCFFFF;height:40px;" >
        <td align="center" width="140px" ><b>Title</b></td>
        <td align="center" width="140px" ><b>Chú ý</b></td>
        <td align="center" width="450px" ><b><text>Content</text></b></td>
        <td align="center" width="150px" ><b>Ảnh (hoặc file)</b>
        <td align="center" width="120px" ><b>Update</b></td>
        <td align="center" width="120px" ><b>Delete</b></td>
    </tr>
    <?php
        while($sql_2 = mysqli_fetch_array($sql_1))
        {
            $id = $sql_2['id'];
            $title = $sql_2['title'];
            $url = $sql_2['url'];
            $content = $sql_2['content'];
            $file_upload="image_php/".$sql_2['image'];
            ?>
                <tr class="a_1" >
                    <td>
                        <a class="lk_a1" ><?php echo $title; ?></a>
                    </td>
                    <td align="center" >
                        <a class="lk_a1" ><?php echo $url; ?></a>
                    </td>
                    <td>
                        <a class="lk_a1" ><?php echo $content; ?></a>
                    </td>
                    <td align="center" >
                        <img src="<?php echo $file_upload; ?>" style="width:100px;margin-top:10px;margin-bottom:10px;" border="0" >
                    </td>
                    <td align="center" >
                        <a href="update_class_detail.php?id=<?php echo $id ?>" class="lk_a1" >Sửa</a>
                    </td>
                    <td align="center" >
                        <a href="delete_class_detail.php?id=<?php echo $id ?>" class="lk_a1" >Xóa</a>
                    </td>
                </tr>
            <?php
        }
    ?>
</table>
</center>