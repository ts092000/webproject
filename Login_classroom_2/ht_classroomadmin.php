<?php
//include auth.php file on all secure pages
include("auth.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lớp học</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<center>
<?php
    include("db.php");
    // $username = $_SESSION['username'];
    // sql for class
	$user = $_SESSION['username'];
    $sql = "SELECT * FROM class";
    $sql_1 = mysqli_query($con,$sql);
    // sql for join
    // $sql_joinclass = "SELECT id, username, id_lop, ma_lop FROM join_class";
    // $sql_joinclass1 = mysqli_fetch_array(mysqli_query($con,$sql_joinclass));


    // $id_hs = $sql_joinclass1['username'];
    // $ma_lop = $sql_joinclass1['ma_lop'];
    //check
//     if (!$sql_1) {
//     printf("Error: %s\n", mysqli_error($con));
//     exit();
// }
	echo "<p class='turnback'><a href='homepage.php'>Trang chủ</a></p>";
    echo "<table>";
    while ($sql_2 = mysqli_fetch_array($sql_1))
    {
        echo "<tr>";
        for($i=1;$i<6;$i++)
        {
            echo "<td align='center' width='195px' >";
            if ($sql_2 != false)
            {
                $image_link = "image_php/".$sql_2['hinh_anh'];
                echo "<img src='$image_link'width='150px'>";echo"<br>";
                echo  $sql_2['ten_lop'];echo "<br>";
                echo $sql_2['ten_mon'];echo "<br>";
                echo $sql_2['phong_hoc'];echo "<br>";
				$temp = $sql_2['ma_lop'];
				$tenlop=$sql_2['ten_lop'];
				echo '<a href="class_detailhs.php?id='.$temp.'&lop='.$tenlop.'">join</a>';
            }
            else
            {
                echo "&nbsp;";
            }
            echo "</td>";
            if($i!=5)
            {
                $sql_2=mysqli_fetch_array($sql_1);
            }
        }            
        echo "</tr>";
    }
    echo "</table>";
?>
</center>
</body>
</html>