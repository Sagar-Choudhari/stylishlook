<?php require 'include/logvalidation.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="" method="get" accept-charset="utf-8">
		<input type="text" name="" value="" placeholder="">
		<input type="checkbox" id="myCheck" onclick="myFunction()">
		<input type="button" name="Submit" value="Submit">
		<button type="submit">Submit</button>
	</form>
	<p id="text" style="display: none;">checked</p>
	<script>
		function myFunction(){
			var checkBox = document.getElementById("myCheck");
			// var text = document.getElementById("text");

			if(checkBox.checked == true){
				window.location.href='sagar';
				// text.style.display="block";
			}else{
				text.style.display="none";
			}
		}

	</script>


	<div>
		<div class="row w-auto">
							<div class="">
								<label for="pwd">Password :</label>
								<input type="password" id="pwd" placeholder="Enter password" name="pwd" autocomplete="off" required>
							</div>
							<div class="">
								<label for="pwd2">Re-enter Password :</label>
								<input type="password" id="pwd2" placeholder="Re-enter password" name="pwd2" autocomplete="off" required>
							</div>
						</div>
						<div id="showErrorPwd"></div>	
						<script src="assets/js/jquery-3.4.1.min.js"></script>
						<script>
							$(document).ready(function(){
									
								$('#pwd2').keyup(function(){
									var pwd = $('#pwd').val();
									var pwd2 = $('#pwd2').val();

									if (pwd2!=pwd||pwd!=pwd2) {
										$('#showErrorPwd').html('**Password does not match.');
										$('#showErrorPwd').css('color','red');
									}
									else {
										$('#showErrorPwd').html('**Password matched.');
										$('#showErrorPwd').css('color','#28A745');
									}
								});
							});
							</script>

	<script src="vendor/jquery/jquery.min.js"></script>

	</div>
</body>
</html>