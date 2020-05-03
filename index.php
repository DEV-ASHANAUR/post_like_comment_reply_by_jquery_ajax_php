
<?php
	session_start();
	   include "message/Flash_data.php";
	   if(isset($_SESSION['user'])){
		header("location:profile.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/w3.css" />
	<link rel="stylesheet" type="text/css" href="css/w2.css" />
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="css/sweetalert2.css">
	<script src="js/sweetalert2.js"></script>

	<title>login</title>
</head>
<body style="background-color: #ddd;">
		<!-- message Area -->
	<?php
		if(isset($_SESSION['msg']['user_in'])){
				?>
				<script type="text/javascript">
					Swal.fire(
							'Submitted!',
							'<?php echo Flass_data::show_error();?>',
							'success'
							);
				</script>
				<?php
		}
	?>

	<?php
		if(isset($_SESSION['msg']['log_error'])){
			?>
				<script type="text/javascript">
					Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: '<?php echo Flass_data::show_error();?>'
						})
				</script>
			<?php
		}
	?>
	<!-- message Area -->

	<div class="w3-bar w3-center" style="background-color: #DC3545;">
		<h1 class="text-white">Login & Registation Here</h1>
	</div>
	<div class="container mt-4">
		<div class="row">
			<div class="col-md-5">
				<div class="bg-white p-3 for_border">
					<h3>Login Below</h3>
					<form action="auth.php" method="POST">
						<input type= "email" class="w3-input" name="email" placeholder="Email" required  /><br>
						<input type= "password" class="w3-input" name="pass" placeholder="Password" required /><br>
						<input type= "submit" class="w3-btn w3-blue" name="submit" value="Login" />
					</form>
				</div>
				
			</div>
			<div class="col-md-7 bg-white for_border">
				<div class="bg-white p-3 ">
					<h3 class=>Registation Below</h3>
					<form action="user_reg.php" method="post">
						<input type= "text" class="w3-input" name="name" placeholder="Enter Full Name" required  /><br>

						<input type= "email" class="w3-input" name="email" placeholder="Email" required  /><br>

						<input type= "date" class="w3-input" name="date" required  /><br> 

						<input type= "password" class="w3-input" name="pass" placeholder="Password" required /><br>

						<input type= "submit" class="w3-btn w3-blue" name="submit" value="Submit" />
					</form>
				</div>
				
			</div>
		</div>
	</div>




	<!-- script here -->
	

	
</body>
</html>