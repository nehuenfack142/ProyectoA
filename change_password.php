<!DOCTYPE html>
<?php 
session_start();
include("include/connection.php");
include("include/header.php");

if (!isset($_SESSION['user_email'])){
  header("location: signin.php");
}
else { ?>
<html>
<head>
    <title>Change Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://naxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
</head>
<style >
body{
	overflow-x: hidden;
}
</style>
<body>
	<div class="row">
		<div class="col-sm-2">
		</div>
		<div class="col-sm-8">
			<form action="" method="post" enctype="multipart/form-dta">
				<table class="table table-bordered table-hover">
					<tr align="center">
						<td colspan="6" class="active"><h2>Change Password</h2></td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Contraseña Actual</td>
						<td>
							<input type="password" name="current_pass" id="mypass" class="form-control" required placeholder="quenosea123" />
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Nueva Contraseña</td>
						<td>
							<input type="password" name="u_pass1" id="mypass" class="form-control" required placeholder="quenosea1234" />
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Confirmar Contraseña</td>
						<td>
							<input type="password" name="u_pass2" id="mypass" class="form-control" required placeholder="Confirmar quenosea1234" />
						</td>
					</tr>
					<tr align="center">
						<td colspan="6">
							<input type="submit" name="change" value="Change" class="btn btn-info" />
						</td>
					</tr>
				</table>
			</form>
			<?php
				if(isset($_POST['change'])){
				
				$c_pass = $_POST['current_pass'];
				$pass1 = $_POST['u_pass1'];
				$pass2 = $_POST['u_pass2'];

				$user = $_SESSION['user_email'];
				$get_user ="select * from users where user_email = '$user'";
				$run_user = mysqli_query($con, $get_user);
				$row = mysqli_fetch_array($run_user);

				$user_password = $row['user_pass'];

					if($c_pass !== $user_password){
						echo"
							<div class='alert alert-danger'>
								<strong>Tu Contraseña Actual no coincide</strong>
							</div>
						";
					}

					if($pass1 != $pass2){
						echo"
							<div class='alert alert-danger'>
								<strong>Las Contraseñas no coinciden</strong>
							</div>
						";
					}

					if($pass1 == $pass2 AND $c_pass == $user_password){
						$update_pass = mysqli_query($con, "UPDATE users SET user_pass = '$pass1' WHERE user_email='$user'");
						echo"
							<div class='alert alert-danger'>
								<strong>Tu Contraseña se a Cambiado</strong>
							</div>
						";
					}
				}
			?>
		</div>
		<div class="col-sm-2">
		</div>
	</div>
</body>
</html>

<?php } ?>