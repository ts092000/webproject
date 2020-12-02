<?php 
    require("db.php");
    $id=$_REQUEST['id'];
    $title=$_POST['title'];
    $url=$_POST['url'];
    $content=$_POST['content'];
    $image_file_name_upload=$_FILES['image']['name'];
    if($image_file_name_upload!="")
    {
        $image_file_name=$image_file_name_upload;
    }
    else
    {
        $image_file_name=$_POST['image_name'];
    }
    $id=$_POST['id'];
    $sql_k="select count(*) from class_detail where image='$image_file_name' ";
    $sql_k_1=mysqli_query($con,$sql_k);
    $sql_k_2=mysqli_fetch_array($sql_k_1);
    if($sql_k_2[0]==0 or $ten_file_anh!="")
    {
        $sql =" UPDATE class_detail SET 
        title = '$title', 
        url = '$url' , 
        content = '$content' , 
        image = '$image_file_name' WHERE id =$id";
        mysqli_query($con,$sql);
        if($image_file_name_upload!="")
        {             
            $image_link="image_php/".$image_file_name;
            move_uploaded_file($_FILES['image']['tmp_name'],$image_link);
            $old_image_link="image_php/".$_POST['image_file_name'];
            unlink($old_image_link);
        }    
    }
    else
    {
        echo "Chưa chọn ảnh";
    }
    header("Location: manage_class_detail.php")
?>
