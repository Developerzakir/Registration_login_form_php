
<?php 

session_start();

$database = new mysqli('localhost', 'root', '', 'registration_form');

if(isset($_POST['sign_up'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];


	$query = "INSERT INTO information (username, password, email)
	VALUES('$username', '$password', '$email')";

	$run = mysqli_query($database, $query);

	if($run){
		echo "<script type='text/javascript'>alert('registered successfully')</script>";
	}else{
		echo "error".mysql_error($database);
	}
}


//login process

if(isset($_POST['login'])){

	$lusername = $_POST['lusername'];
	$lpassword = $_POST['lpassword'];

	$mysql = new mysqli('localhost', 'root', '', 'registration_form');

	$result = $mysql->query("SELECT * FROM information where username='$lusername' AND password='$lpassword' ");
	$row = $result->fetch_assoc();

	if($row['username'] == $lusername AND $row['password'] == $lpassword  ){
		$message = 'login successfully done';
		echo "<script  type='text/javascript'>alert('$message')</script>";
	}else{
		$message1 = 'login not successfully';
		echo "<script  type='text/javascript'>alert('$message1')</script>";

	}

}

 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registration Form With Php Mysql</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>


	<div class="login_page">
		<div class="form">
			<form action="index.php" method="POST" class="sign_up">
				<input type="text" name="username" placeholder="User Name">
				<input type="password" name="password" placeholder="Password">
				<input type="text" name="email" placeholder="Email">
				<button type="submit" name="sign_up">Create</button>
				<p class="message">Already Registered? <a href="#">Login</a></p>
			</form>

			<form action="index.php" method="POST" class="login">
				<input type="text" name="lusername" placeholder="User Name">
				<input type="password" name="lpassword" placeholder="Password">
				<button type="submit" name="login">Login</button>
				<p class="message">Not Registered? <a href="#">Register</a></p>
			</form>
		</div>
	</div>





	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>

	<script>
		$('.message a').click(function(){

			$('form').animate({height: "toggle", opacity:"toggle"}, "slow");

		});
	</script>
	
</body>
</html>