<?php

$conexao = mysqli_connect("localhost", "root", "","barbershopbd");

//$conexao = mysqli_connect("localhost", "root", "","barbershopbd");

$conexao->close();

if(session_start(['cliente']) && session_start(['funcionario']) && session_start(['proprietario'])){
	session_unset();
	session_destroy();
	header("location: ../index.php");
}
?>