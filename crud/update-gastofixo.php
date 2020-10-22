<?php
require_once 'conexaoDB.php';

if(isset($_POST['btn-atualizar'])){
    $idGastosFixos = $_POST['id'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];

    $sql = "UPDATE tb_gastosfixos SET tipo = '$tipo', valor = '$valor' WHERE idGastosFixos = '$idGastosFixos'";

    if(mysqli_query($conexao, $sql)){
        echo "<script language='javascript' type='text/javascript'> alert('Atualizado com sucesso!');window.location = '../financas/painelfinancas.php'
        </script>";
    }
    else{
        echo "<script language='javascript' type='text/javascript'> alert('Erro ao atualizar, tente novamente...');window.location = '../financas/painelfinancas.php'
        </script>";
    }
}