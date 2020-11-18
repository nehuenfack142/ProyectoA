<?php
session_start();

include("include/connection.php");

    if(isset($_POST['sign_in'])){
        $email=htmlentities(mysqli_real_escape_string($con, $_POST['email']));
        $pass=htmlentities(mysqli_real_escape_string($con, $_POST['pass']));
        $sql="SELECT * from user";
        $result=mysqli_query($con,$q);
        $user_hora=$result['user_hora'];

        echo " <div class='alert alert-danger'>
                <span>$user_hora</span>
            </div>";

        $select_user = "select * from users where user_email='$email' AND user_pass='$pass'";

        $query = mysqli_query($con, $select_user);
        $check_user = mysqli_num_rows($query);
        
        if($check_user == 1){
            $_SESSION['user_email']=$email;

            $update_msg = mysqli_query($con, "UPDATE users SET log_in='Online' WHERE user_email='$email'");

            $user = $_SESSION['user_email'];
            $get_user = "select * from users where user_email='$user'";
            $run_user = mysqli_query($con, $get_user);
            $row = mysqli_fetch_array($run_user);

            $user_name = $row['user_name'];

            echo "<script>window.open('home.php?user_name=$user_name', '_self')</script>";
        }else if ($check_user == 3){

            echo"
            <div class='alert alert-danger'>
                <strong>Te has quedado sin horas para chatear.</strong>
            </div>";


        }
        else{
        echo"
            <div class='alert alert-danger'>
                <strong>Check your email and password.</strong>
            </div>";


        }
    }
 ?>