<?php



$conexao = mysqli_connect("localhost", "root", "");
$bancoSelect = mysqli_select_db($conexao, "barbershopbd");

if($conexao){
	echo"Conexão realizada com sucesso";

}
else{
	die("Falha na conexão : ->".mysqli_error());
}







?>