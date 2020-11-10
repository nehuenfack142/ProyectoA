<!DOCTYPE html>
<html>
<head>
	<title>Login to your account</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/signin2.css">
	<meta htpp-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="signin-form">
		<form action="" method="post">
			<div>
				<h2>Forgot Password</h2>
				<p>ChatLook</p>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="unemial@sitio.com" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Nombre de tu mejor amigo</label>
				<input type="password" class="form-control" name="bf" placeholder="Alguien..." autocomplete="off" required>
			</div>
	
			<div class="form-group">
				<button type="submit" class="btn btn primary btn-primary btn-block btn-lg" name="submit">Submit</button>
			</div>

		<div class="text-center small" style="color: #67428B;">Quieres volver a loggearte ? <a href="signin.php">Click Aqui</a></div>
	</div>
	<?php
    session_start();
    include("include/connection.php");

    if(isset($_POST['submit']))
    {

    $email=htmlentities(mysqli_real_escape_string($con, $_POST['email']));
    $recovery_acount=htmlentities(mysqli_real_escape_string($con, $_POST['bf']));

    $select_user = "select* from users where user_email = '$email' AND forgotten_answer='$recovery_acount'";


    $query = mysqli_query($con, $select_user);

    $check_user = mysqli_num_rows($query);

    if ($check_user == 1)
        {
            $_SESSION['user_email']=$email;

            echo"<script>window.open('create_passsword.php', '_self')</script>";



        }else {
            echo"<script>alert('Your email or Bestfriend name is incorrect')</script>";
            echo"<script>window.open('forgot_pass.php', '_self')</script>";


        }



    }

    ?>
</body>
</html>
