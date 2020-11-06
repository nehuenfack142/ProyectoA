<!DOCTYPE html>
<?php  
session_start();
include("include/connection.php");

if(!isset($_SESSION['user_email'])){
	header("location: signin.php");
}
else{ ?>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/intentohomecss.css">
</head>
<body>
	<div>
		<a href="include/find_friends.php"><button class="btn btn-default search-icon" name="search_user" type="submit">Agregar amigos</button></a>

		<!-- Informacion del usuario que se logeo -->
			<?php
				$user = $_SESSION['user_email'];
				$get_user = "select * from users where user_email = '$user'";
				$run_user = mysqli_query($con, $get_user);
				$row = mysqli_fetch_array($run_user);
				$user_id = $row['user_id'];
				$user_name = $row['user_name'];  
			?>

			<img src=<?php echo "$user_profile_image"; ?>>
	</div>
</body>
</html>