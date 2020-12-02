<?php
    require("db.php");
    $id=$_REQUEST['id'];
    $sql = "DELETE FROM class WHERE id = $id";
    mysqli_query($con,$sql);
    header("Location: editclass.php")
?>
