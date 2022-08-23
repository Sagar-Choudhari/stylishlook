<?php

require('../dbcon/dbconnect.php');
require('../dbcon/function.php');

error_reporting(0);

$name ='';
$parent ='';


if(isset($_POST['submit']))
{

$name	=get_safe_value($con,$_POST['name']);
$parent		=get_safe_value($con,$_POST['parent']);



$sql="INSERT INTO `shop_cat` (`name`,`for_id`) VALUES ('$name','$parent')";
$res=mysqli_query($con,$sql);

// echo "submitted";
}
// else{
// 	echo "not submitted";
// }

 header("location: ../cat.php");

?>