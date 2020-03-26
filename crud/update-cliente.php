<?php
require_once 'conexaoDB.php';

if(isset($_POST['btn-atualizar'])){
    $idCliente = mysqli_escape_string($conexao, $_POST['id']);
    $nome = mysqli_escape_string($conexao, $_POST['nome']);
    $telefone = mysqli_escape_string($conexao, $_POST['telefone']);
    $email = mysqli_escape_string($conexao, $_POST['email']);
    $senha = mysqli_escape_string($conexao, $_POST['senha']);

    $sql = "UPDATE tb_cliente SET nome = '$nome', telefone = '$telefone', email_cliente = '$email', senha_cliente = '$senha' WHERE idCliente = '$idCliente'";

    if(mysqli_query($conexao, $sql)){
        echo "<script language='javascript' type='text/javascript'> alert('Funcionário atualizado com sucesso!');window.location = '../perfis/perfilcliente.php'
            </script>";
    }
    else {
        echo "<script language='javascript' type='text/javascript'> alert('Erro ao atualizar, tente novamente...');window.location = '../perfis/editarcliente.php'
            </script>";
    }
}
?>