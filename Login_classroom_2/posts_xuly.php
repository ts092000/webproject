<?php
//include auth.php file on all secure pages
include("auth.php");
?>

<head>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <?php 
        require("db.php");
        if (isset($_POST['form_add_baiviet'])) {
            $title = $_POST['title'];
            $url = $_POST['url'];
            $content = $_POST['content'];
            $image = $_FILES['image']['name'];
            $id_giaovien = $_SESSION['username'];
			$id_lop = $_POST['id_lop'];
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $target = "image_php/".basename($image);
            $sql = "INSERT INTO class_detail( id,id_giaovien,id_lop,title,url,content,image ) VALUES ( NULL,'$id_giaovien','$id_lop','$title','$url', '$content', '$image' )";
            if (mysqli_query($con, $sql) && move_uploaded_file($_FILES['image']['tmp_name'], $target) && empty($errors)==true) 
        }
        header("Location: detail_class.php")
    ?>
</body>