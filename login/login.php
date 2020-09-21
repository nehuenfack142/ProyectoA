<?php
	$conectar=@mysql_connect('localhost','root','');
	if(!$conectar){
		echo "No se pudo conectar";
	}else{
		$base=mysql_select_db('Login');
		if(!$base){
			echo"No se encontro la base de datos";
		}
	}
	$nombre=$_POST['name'];
	$password=$_POST['pass'];

	$sql="INSERT INTO datos VALUES('$nombre','$password')";

	$ejecutar=mysql_query($sql);

	if(!$ejecutar){
		echo"Error";
	}else{
		echo"todo piola";
	}
?>