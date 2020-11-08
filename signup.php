<!DOCTYPE html>
<html>
<head>
	<title>Create New Account</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<meta htpp-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="signup-form">
		<form action="" method="post">
			<div>
				<h2>Sign Up</h2>
				<p>Fill out this form and start chating with your friends</p>
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="user_name" placeholder="Ejemplo: josue" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="user_pass" placeholder="Password" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Email Address</label>
				<input type="email" class="form-control" name="user_email" placeholder="unemial@sitio.com" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Country</label>
				<select class="form-control" name="user_country" required>
					<option disabled="">Select a Country</option>
					<option>Argentina</option>
					<option>Uruguay</option>
					<option>Paraguay</option>
					<option>Chile</option>
					<option>Brasil</option>
					<option>Peru</option>
					<option>Equador</option>
					<option>Colombia</option>
					<option>Venezuela</option>
				</select>
			</div>
			<div class="form-group">
				<label>Gender</label>
				<select class="form-control" name="user_gender" required>
					<option disabled="">Select a Gender</option>
					<option>Female</option>
					<option>Male</option>
					<option>Others</option>
				</select>
			</div>


			<div class="form-group">
				<label>Best Friend</label>
				<input type="text" class="form-control" name="forgotten_answer" placeholder="ELPEPE" autocomplete="off" required>
			</div>


			<div class="form-group">
				<label class="checkbox-inline"><input type="checkbox" required>I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn primary btn-primary btn-block btn-lg" name="sign_up">Sign Up</button>
			</div>
			<?php include("signup_user.php"); ?>
		</form>
		<div class="text-center small" style="color: #67428B;">Already have an account? <a href="signin.php">Signin Here</a></div>
	</div>
</body>
</html>