<?php

session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'database');

$name = $_POST['user'];
$pass = $_POST['password'];

$s = "select * from users where name = '$name'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
	echo "Username Already taken";
}else{
	$reg = "insert into users(name, password) values ('$name','$pass')";
	mysqli_query($con, $reg);
	echo "User registration succesful";
}
?>