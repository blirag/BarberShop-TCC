<?php
require_once 'conexaoDB.php';

if(isset($_POST['btn-adicionar'])){
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];

    $insert = "INSERT INTO tb_gastosvariaveis (tipo, valor) VALUES ('$tipo', '$valor')";

    if(mysqli_query($conexao, $insert)){
        echo"<script language='javascript' type = 'text/javascript' > alert('Adicionado com sucesso!');window.location.href = '../financas/painelfinancas.php'; </script>";
	}
	else {
		echo"<script language='javascript' type = 'text/javascript' > alert('Erro ao adicionar!');window.location.href = '../financas/painelfinancas.php'; </script>";
	}
}