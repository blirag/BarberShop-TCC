<?php

$conexao = mysqli_connect("localhost", "root", "","barbershopbd", "3308");

$conexao->close();

if(session_start(['cliente']) && session_start(['funcionario']) && session_start(['proprietario'])){
	session_unset();
	session_destroy();
	header("location: ../index.php");
}
?>