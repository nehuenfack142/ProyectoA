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
    <title>Account settings</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://naxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
    <script src="~/Scripts/jquery-2.2.1.min.js"></script>    
	<script src="~/Scripts/bootstrap.min.js"></script>
</head>
<body>
	<div class="row">
		<div class="col-sm-2"></div>
	
	<?php  
		$user = $_SESSION['user_email'];
		$get_user ="select * from users where user_email = '$user'";
		$run_user = mysqli_query($con, $get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['user_name'];
		$user_pass = $row['user_pass'];
		$user_email = $row['user_email'];
		$user_profile = $row['user_profile'];
		$user_country = $row['user_country'];
		$user_gender = $row['user_gender'];
	?>
	<div class="col-sm-8">
		<form action="" method="post" enctype="multipart/form-data">
			<table class="table table-bordered table-hover">
				<tr align="center">
					<td colspan="6" class="active"><h2>Change Account Settings</h2></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Cambia Nombre de Usuario</td>
					<td>
						<input type="text" name="u_name" class="form-control" required value="<?php echo $user_name;?>" />
					</td>
				</tr>

				<tr><td></td><td><a class="btn btn-default" style="text-decoration: none; font-size: 15px;" href="upload.php"><i class="fa fa-user" aria-hidden="true"></i> Foto de perfil</a></td></tr>
				<tr>
					<td style="font-weight: bold;">Cambia tu Pais</td>
					<td>
						<select class="form-control" name="u_country">
							<option><?php echo $user_country;?></option>
							<option>Argentina</option>
							<option>Uruguay</option>
							<option>Paraguay</option>
							<option>Chile</option>
							<option>Brasil</option>
							<option>Peru</option>
							<option>Equador</option>
							<option>Colombia</option>
							<option>Venezuela</option>
							<option>Bolivia</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Cambia tu Genero</td>
					<td>
						<select class="form-control" name="u_gender">
							<option><?php echo $user_gender;?></option>
							<option>Mujer</option>
							<option>Hombre</option>
							<option>Otros</option>
						</select>
					</td>
				</tr>

				
				
				<tr><td></td><td><a class="btn btn-default" style="text-decoration:none; font-size: 15px;" href="change_password.php"><i class="fa fa-key fa-fw" aria-hidden="true"></i>Cambiar Contraseña</td></tr>

				<tr align="center">
					<td colspan="6">
						<input type="submit" value="Update" name="update" class="btn btn-info">
					</td>
				</tr>
			</table>
		</form>
		<?php  
			if(isset($_POST['update'])){
				$user_name = htmlentities($_POST['u_name']);
				$u_country = htmlentities($_POST['u_country']);
				$u_gender = htmlentities($_POST['u_gender']);

				$update = "update users set user_name = '$user_name', user_country = '$u_country', user_gender = '$u_gender' where user_email = '$user'";

				$run = mysqli_query($con,$update);

				if($run){
					echo "<script>window.open('account_settings.php','_self')</script>";
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