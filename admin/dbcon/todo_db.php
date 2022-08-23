<?php 

	require('dbcon/dbconnect.php');
    require('dbcon/function.php');


    $text = "";
    $timestamp = "";
    $done = "";


    if(isset($_POST['submit'])){

    	$text = $_POST['todo'];

    	date_default_timezone_set('Asia/Kolkata');  
		$timestamp =   date('Y/m/d H:i:s', time());

		// $sql="INSERT INTO todo (`what`,`dt`) VALUES ('$text','$timestamp')";
  //       $res=mysqli_query($con,$sql);

        $con->query("INSERT INTO todo (`what`,`dt`) VALUES ('$text','$timestamp')") or 
			die($con->error);
    }

 ?>