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

</head>
<body>
	<div>
		<a href="include/find_friends.php"><button class="btn btn-default search-icon" name="search_user" type="submit">Add new user</button></a>
					<ul>
						<?php include("include/get_user_data.php"); ?>
					</ul>
					<!-- getting the user information who is logged in -->
					<?php
						$user = $_SESSION['user_email'];
						$get_user = "select * from users where user_email = '$user'";
						$run_user = mysqli_query($con, $get_user);
						$row = mysqli_fetch_array($run_user);
						$user_id = $row['user_id'];
						$user_name = $row['user_name'];  
					?>
					<!-- getting the user data on which user click -->
					
							
								<button name="logout" class="btn btn-danger">Logout</button>
						
							<?php
								if(isset($_POST['logout'])){
								$update_msg = mysqli_query($con, "UPDATE users SET log_in = 'Offline' WHERE user_name = '$user_name'");
								header("Location:logout.php");
								exit();
								} 
							?>
						<?php
							$update_msg = mysqli_query($con, "UPDATE users_chat SET msg_status = 'read' WHERE sender_username='$username' AND recelver_username= '$user_name'");
							$sel_msg = "select * from users_chat where (sender_username='$user_name' AND recelver_username='$username') OR (recelver_username='$user_name' AND sender_username='$username') ORDER by 1 ASC";
							$run_msg = mysqli_query($con, $sel_msg);

							while ($row = mysqli_fetch_array($run_msg)){
								$sender_username = $row['sender_username'];
								$recelver_username = $row['recelver_username'];
								$mdg_content = $row['mdg_content'];
								$msg_date = $row['msg_date'];
							?>
							<ul>
								<?php
									if($user_name == $sender_username AND $username == $recelver_username){
										echo "
											<li>
												<div class = 'rightside-right-chat'>
													<span>$username <small>$msg_date</small></span>
													<p>$mdg_content</p>
													<br>
												</div>
											</li>
										";
									}
									else if($user_name == $recelver_username AND $username == $sender_username){
										echo "
											<li>
												<div class = 'rightside-left-chat'>
													<span>$username <small>$msg_date</small></span>
													<p>$mdg_content</p>
													<br>
												</div>
											</li>
										";
										}
								?>
							</ul>
							<?php  
								}
							?>
						<form method="post">
							<input autocomplete="off" type="text" name="mdg_content" placeholder="Write your message......">
							<button class="btn" name="submit"><i class="fa fa-telegrame" aria-hidden = "true"></i></button>
						</form>
	<?php
		if (isset($_POST['submit'])) {
			$msg = htmlentities($_POST['mdg_content']);
			if($msg == ""){
				echo"
					<div class= 'alert alert-danger'>
						<strong><center>Message was unable to send</center></strong>
					</div>
				";
			}
			else if(strlen($msg) >100){
				echo "
					<div class='alert alert-danger'>
						<strong><center>Message is Too long. Use only 100 characters</center></strong>
					</div>
				";
			}
			else{
				$insert = "insert into users_chat(sender_username, recelver_username, mdg_content, msg_status,msg_date) values ('$user_name','$username','$msg','unread', NOW())";
				$run_insert = mysqli_query($con, $insert);
			}
		}
	?>
</body>
</html>
<?php } ?>