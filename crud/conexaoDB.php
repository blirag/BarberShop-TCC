<?php

$conexao = mysqli_connect("localhost", "root", "","barbershopbd");


if(!$conexao){
	die("Falha na conexão : ->".mysqli_error());
}


//$conexao = mysqli_connect("localhost", "root","", "barbershopbd", "3308");



?>


