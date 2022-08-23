<?php
    require('dbcon/dbconnect.php');
    require('dbcon/function.php');
    if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){
    }else{
      header('location:login.php');
      die();
    } 
?>