<?php
    require("db.php");
    $ten_lop = $_POST['ten_lop'];
    $ten_mon = $_POST['ten_mon'];
    $phong_hoc = $_POST['phong_hoc'];
    $ma_lop = $_POST['ma_lop'];
    $ten_file_anh_upload=$_FILES['hinh_anh']['name'];
    if($ten_file_anh_upload!="")
    {
        $ten_file_anh=$ten_file_anh_upload;
    }
    else
    {
        $ten_file_anh=$_POST['ten_anh'];
    }
    $id=$_POST['id'];
    if($ten_lop != "" && $ten_mon != "" && $phong_hoc != "")
    {
        $sql_k="select count(*) from class where hinh_anh='$ten_file_anh' ";
        $sql_k_1=mysqli_query($con,$sql_k);
        $sql_k_2=mysqli_fetch_array($sql_k_1);
        if($sql_k_2[0]==0 or $ten_file_anh!="")
        {
            $sql =" UPDATE class SET 
            ten_lop = '$ten_lop', 
            ten_mon = '$ten_mon' , 
            phong_hoc = '$phong_hoc' , 
            hinh_anh = '$ten_file_anh' , 
            ma_lop = '$ma_lop' WHERE id =$id";
            mysqli_query($con,$sql);
            if($ten_file_anh_upload!="")
            {             
                $image_link="image_php/".$ten_file_anh;
                move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$image_link);
                $old_image_link="image_php/".$_POST['ten_file_anh'];
                unlink($old_image_link);
            }    
        }
        else
        {
            echo "Chưa chọn ảnh";
        }
    }
    else
    {
        echo "Vui lòng điền đầy đủ thông tin";
    }
    header("Location: editclass.php");
?>