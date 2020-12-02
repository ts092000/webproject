<?php
include('db.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'D:\xamp\PHPMailer\src\Exception.php';
require 'D:\xamp\PHPMailer\src\PHPMailer.php';
require 'D:\xamp\PHPMailer\src\SMTP.php';

if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
$error="";
if (!$email) {
   $error ="<p>Invalid email address please type a valid email address!</p>";
   }else{
		$sel_query = "SELECT * FROM `users` WHERE Email='".$email."'";
		$results = mysqli_query($con,$sel_query);
		$row = mysqli_num_rows($results);
		if ($row==""){
			$error = "<p>No user is registered with this email address!</p>";
		}
   }
   if($error!=""){
   echo "<div class='error'>".$error."</div>
   <br /><a href='login.php'>Go Back</a>";
   }else{
   $expFormat = mktime(
   date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
   );
   $expDate = date("Y-m-d H:i:s",$expFormat);
   $key = md5(2418*2, $email);
   $addKey = substr(md5(uniqid(rand(),1)),3,10);
   $key = $key . $addKey;
// Insert Temp Table
mysqli_query($con,
"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");
 
$output='<p>Dear user,</p>';
$output.='<p>Please click on the following link to reset your password.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="https://www.localhost/reset-password.php?
key=<?.$key.'&email='.$email.'&action=reset" target="_blank">
https://www.localhost/reset-password.php
?key='.$key.'&email='.$email.'&action=reset</a></p>'; 
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
$output.='<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';   
$output.='<p>Thanks,</p>';
$output.='<p>AllPHPTricks Team</p>';
$body = $output; 
$subject = "Password Recovery";
 
$email_to = $email;
$fromserver = "toumachikaido1@gmail.com"; 
$mail = new PHPMailer(TRUE);
$mail->IsSMTP();
$mail->Host = "mail.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "toumachikaido1@gmail.com";
$mail->Password = "0362645245";
$mail->Port = 587;
$mail->IsHTML(true);
$mail->From = "toumachikaido1@gmail.com";
$mail->FromName = "Classroom";
$mail->Sender = $fromserver;
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{
echo "<div class='error'>
<p>An email has been sent to you with instructions on how to reset your password.</p>
</div><br /><br /><br />";
 }
   }
}else{
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Class Room</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<center>
<div class="formlogin">
<form action="" method="post" name="reset">
<center>
<table cellspacing=10 border=0>
	<tr>
		<td colspan="2" class="tdlogin"><h2>Enter Your Email Address:</h2><hr></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="text" name="email" placeholder="abc@email.com" required /></td>
	</tr>
	<tr>
		<td colspan="2"><center><input name="submit" type="submit" class="btnlogin" value="Submit" />
		<input name="reset" type="reset" class="btnregis" value="Reset"/></center></td>
	</tr>
</table>
</center>
</form>
</div>
</center>
</body>
</html>
<?php } ?>

