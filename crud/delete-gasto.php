<?php
require_once 'conexaoDB.php';

if(isset($_GET['id'])){
    $idGastosVariaveis = mysqli_escape_string($conexao, $_GET['id']);
    $sql = "DELETE FROM tb_gastosvariaveis WHERE idGastosVariaveis = '$idGastosVariaveis'";

    if(mysqli_query($conexao, $sql)){
        echo "<script language='javascript' type='text/javascript'> alert('Gasto deletado com sucesso!'); window.location = '../financas/painelfinancas.php'</script>";
    }
    else {
        echo "<script language='javascript' type='text/javascript'> alert('Erro ao deletar, tente novamente...'); window.location = '../financas/painelfinancas.php'</script>";
    }
}

?>