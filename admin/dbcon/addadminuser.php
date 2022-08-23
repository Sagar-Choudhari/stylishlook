<?php

require('../dbcon/dbconnect.php');
require('../dbcon/function.php');

error_reporting(0);

$desi 	='';
$fn   	='';
$ln   	='';
$gen	='';
$age	='';
$pn		='';
$mail	='';
$img 	='';
$p1		='';
$p2		='';

if(isset($_POST['submit']))
{

$desi	=get_safe_value($con,$_POST['desi']);
$fn		=get_safe_value($con,$_POST['fn']);
$ln		=get_safe_value($con,$_POST['ln']);
$gen	=get_safe_value($con,$_POST['gen']);
$age	=get_safe_value($con,$_POST['age']);
$pn		=get_safe_value($con,$_POST['pn']);
$mail	=get_safe_value($con,$_POST['mail']);
$files 	=$_FILES['img'];
$p1		=get_safe_value($con,$_POST['p1']);
$p2		=get_safe_value($con,$_POST['p2']);



// echo $desi." / ".$fn." / ".$ln." / ".$gen." / ".$age." / ".$pn." / ".$mail." / ".$img." / ".$p1." / ".$p2; 

$filename = $files['name'];
$fileerror = $files['error'];
$filetmp = $files['tmp_name'];

$fileext = explode('.', $filename);
$filecheck = strtolower(end($fileext));
$fileextstored = array('png','jpg','jpeg');


if(in_array($filecheck,$fileextstored)){


$destinationfile = '../assets/images/faces/'.$filename; 

$destination = 'assets/images/faces/'.$filename; 
move_uploaded_file($filetmp,$destinationfile);

$pass = md5($p1); //this will encrypt the password

$sql="INSERT INTO `admin_users` (`designation`,`fname`,`lname`,`gender`,`photo`,`phone`,`email`,`age`,`pass`) VALUES ('$desi','$fn','$ln','$gen','$destination','$pn','$mail','$age','$pass')";
$res=mysqli_query($con,$sql);

}
// else{
// 	echo "not submitted";
// }

}

 header("location: ../users.php");

?>