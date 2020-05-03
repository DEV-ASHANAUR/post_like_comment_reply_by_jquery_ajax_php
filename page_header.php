<?php
	session_start();
	include "message/Flash_data.php";
    include "function/main.php";
	$obj = new Main();
	$data = $obj->show_post();
	if(!isset($_SESSION['user'])){
		header("location:index.php");
	}
	$user_id = $_SESSION['user'];
	$user_in = $obj->get_user($user_id);
	if($user_in->num_rows>0){
		while($user_row = $user_in->fetch_object()){
			$name = $user_row->user_name;
			$db_id = $user_row->user_id;
			$db_photo = $user_row->user_photo;
			$db_about = $user_row->user_about;
			$time_user = $user_row->created_at;
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css"/>
		<link rel="stylesheet" href="css/emojionearea.css">
		
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="css/sweetalert2.css">
		<script src="js/sweetalert2.js"></script>
		<script src="js/emojionearea.min.js"></script>
		


	</head>
	<body>	
		<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
				<div class="container">
					<a class="navbar-brand" href="#">AR</a>
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn my-2 my-sm-0" type="submit">Search</button>
					</form>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav m-auto">
							<li class="nav-item active">
								<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Dropdown
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="#">Disabled</a>
						</li>
					</ul>
					<div class="nav-item dropdown">
						<a class="nav-link dropdown-toggle drop text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="rounded-circle ddd m-auto" src="<?php if(!empty($db_photo)){echo "upload/".$db_photo;}else{echo 'img/default.jpg';}?>" alt="photo" width="30px" height="30px"><?php 
							if(isset($name)){
							$len = strlen($name);
							if($len>10){
								echo substr($name,0,12);
							}else{
								echo $name;
							}
						}
						?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="setting.php?id=<?php echo $db_id;?>">Setting</a>
							<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</div>
				</div>
			</div>
		</nav>