<?php 
include("include/connection.php");
	if(isset($_POST['sign_up'])){
		$name=htmlentities(mysqli_real_escape_string($con, $_POST['user_name']));
		$pass=htmlentities(mysqli_real_escape_string($con, $_POST['user_pass']));
		$email=htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));
		$conutry=htmlentities(mysqli_real_escape_string($con, $_POST['user_country']));
		$gender=htmlentities(mysqli_real_escape_string($con, $_POST['user_gender']));
		$bf=htmlentities(mysqli_real_escape_string($con, $_POST['forgotten_answer']));
		$user_hora=htmlentities(mysqli_real_escape_string($con, $_POST['user_hora']));
		$rand=rand(1,2);

		if($name==''){
			echo"<script>alert('No podemos verificar su nombre')</script>";
		}
		
		$check_email="select * from users where user_email ='$email'";
		$run_email=mysqli_query($con,$check,$email);

		$check= mysqli_num_rows($run_email);

		if($check==1){
			echo"<script>alert('Este mail ya existe, por favor ingresar otro!'</script>";
			echo"<script>window.open('signup.php','_self')</script>";
			exit();
		}

		if($rand ==1)
			$profile_pic = "images/imagen2.jpg";
		else if ($rand == 2)
			$profile_pic = "images/imagen3.jpg";

		$insert = "insert into users(user_name, user_pass, user_email, user_profile, user_country, user_gender, forgotten_answer, user_hora) values('$name', '$pass','$email','$profile_pic', '$conutry', '$gender', '$bf', '$user_hora')";

		$query = mysqli_query($con, $insert);

		if($query){
			echo"<script>alert('Congratulations $name, your account has been created successfully')</script>";
			echo"<script>window.open('signin.php', '_self')</script>";
		}
		else{
			echo"<script>alert('Registration failed, try again!')</script>";
			echo"<script>window.open('signup.php', '_self')</script>";
		}
	}
 ?>