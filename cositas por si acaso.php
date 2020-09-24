<?php  
session_start();
if(!isset($_SESSION['username'])){
  header('location:index.php');
}
?>

//codigo para hacer que sea 100% necesario logearse para iniciar