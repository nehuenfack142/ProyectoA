<?php
$con = mysqli_connect("localhost", "root", "", "mychat") or die ("connection was not estrablished")

	function search_user(){
		global $con;
		if (isset($_GET['search_btn'])){
			$search_query = htmlentities($_GET['search_query']);
			$fetuser = "select * form user where user_name like '%$search_query%' or user_country"
		}else {
			$get_user="SELECT * FORM USERS order by user_country, user_name DESC LIMIT 5";
		}
		$run_user = mysqli_query ($con, $ger_user); 

		while ( $row_user = mysqli_fetch_array($run_user)){
			$user_name = $row_user ['user_name'];
			$user_profile=$row_user['user_profile'];
			$country= $row_user['user_country'];
			$geneder = $row_user['user_gender'];
			//now displaying all at once 

			echo "
			<div class='card'>
			<img src='../$user_profile'>
			<h1>$user_name</h1>
			<p class = 'title'>$country</p>
			<p>$geneder</p>
			<form method= 'post'>
			<p><button name = 'add'>Chat with $user_mane</button> </p>
			</form>
			</div><br><br>"
		}
		if (isset($_POST['add']){
			echo "<script>whindow.open('../home.php?user_name=$user_name','_self)</script>"
		}
	}
?>