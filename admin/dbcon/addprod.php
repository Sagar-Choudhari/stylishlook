<?php

require('../dbcon/dbconnect.php');
require('../dbcon/function.php');

error_reporting(0);

$id ='';
$code ='';
$title ='';
$desc ='';
$price ='';
$oldprice ='';
$cat ='';
$quan ='';
$unquan ='';
$pic ='';
$mpic ='';

if(isset($_POST['submit']))
{

$code	=get_safe_value($con,$_POST['code']);
$title	=get_safe_value($con,$_POST['title']);
$desc	=get_safe_value($con,$_POST['desc']);
$price	=get_safe_value($con,$_POST['price']);
$oldprice	=get_safe_value($con,$_POST['oldprice']);
$cat	=get_safe_value($con,$_POST['cat']);
$quan	=get_safe_value($con,$_POST['quan']);
$unquan	=get_safe_value($con,$_POST['unquan']);
$pic	=$_FILES['pic'];
$mpic	=$_FILES['mpic'];

if ($unquan !='') {
	$setquantity = 'unlimited';
} else {
	$setquantity = $quan;
}


$filename = $pic['name'];
$mfilename = $mpic['name'];

$fileerror = $pic['error'];
$mfileerror = $mpic['error'];

$filetmp = $pic['tmp_name'];
$mfiletmp = $mpic['tmp_name'];

$fileext = explode('.', $filename);
$mfileext = explode('.', $mfilename);

$filecheck = strtolower(end($fileext));
$mfilecheck = strtolower(end($mfileext));

$fileextstored = array('png','jpg','jpeg');
$mfileextstored = array('png','jpg','jpeg');



if(in_array($filecheck,$fileextstored)){


$destinationfile = '../prod_img/'.$filename; 
$mdestinationfile = '../prod_img/'.$mfilename; 

$destination = 'prod_img/'.$filename; 
$mdestination = 'prod_img/'.$mfilename; 

move_uploaded_file($filetmp,$destinationfile);
move_uploaded_file($mfiletmp,$mdestinationfile);


// echo $code." - - ".$title." - - ".$desc." - - ".$price." - - ".$oldprice." - - ".$cat." - - ".$setquantity." - - ".$pic." - - ".$mpic;


$sql="INSERT INTO `products` (`code`,`title`,`description`,`price`,`old_price`,`category`,`quantity`,`cover`,`more_images`) VALUES ('$code','$title','$desc','$price','$oldprice','$cat','$setquantity','$destination','$mdestination')";
$res=mysqli_query($con,$sql);

echo "done";
}else{


echo "not done";

}


//  echo "submitted";
}
 // else{
 // 	echo "not submitted";
 // }


?>