<?php

$conexao = mysqli_connect("localhost", "root", "","barbershopbd");


if(!$conexao){
	die("Falha na conexão : ->".mysqli_error());
}

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

//$conexao = mysqli_connect("localhost", "root","", "barbershopbd", "3308"); 



?>


