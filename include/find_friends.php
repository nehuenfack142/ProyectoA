<!DOCTYPE html>
<?php 
session_start();
include ("include/find_friends_function.php");

if (!isset($_SESSION['user_email'])){
  header("location: signin.php");
}
else { ?>
<html>
<head>
  <title>Search For Friends</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.booststrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.booststrapcdn.com/font-awesome/4.7.0/css/font-awesome.mim.css">

  <script scr="https://ajax.googleapis.com/ajas/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
    <nav class="navbar-brand" href="#">
      <a class="navbar-brand" href="#">
       <?php 
        $user = $_SESSION['user_email'];
        $get_user = "select * form users where user_email='$user'";
        $run_user = mysqli_query($con, $get_user);
        $row  = mysqli_fetch_array($run_user);

        $user_name=$row['user_name'];
        echo" <a class='navbar-brand' href='../home.php?user_name=$user_name'>MyChat</a>";
        
        ?>
        <ul class ="navbar-nav">
          <li><a style="color: white;text-decoration: none;font-size: 20px;"href="../account-settings.php" >Settings</a></li>
        </ul>
    </nav><br>
    <div class="row">
      <div class="col-sm-4">
      </div>
      <div class="col-sm4">
        <form class="search_form" action="">
          <input type="text" name="sarch_query" placeholder="Search Friends" autocomplete="off"required>
          <button class="btn" type="submit" name="search_btn">Search</button>
          
        </form>
      </div>
      <div class="col-sm--4"></div>
    </div><br><br>
    <?php serch_user(); ?>

  </body>
  </html>
  <?php  }?>



