<?php

function pr($arr) {
	echo '<pre>';
	print_r($arr);
}

function prx($arr) {
	echo '<pre>';
	print_r($arr);
	die();
}

function pre_r($array) {
		echo '<pre>';
		print_r($array);
		echo '</pre>';
}



function get_safe_value($con,$str) {
	if($str!=''){
		return mysqli_real_escape_string($con,$str);
	}
}
 ?>
