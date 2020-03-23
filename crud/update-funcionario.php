<?php
require_once 'conexaoDB.php';

if(isset($_POST['btn-atualizar'])){
    $idFuncionario = mysqli_escape_string($conexao, $_POST['id']);
    $nome = mysqli_escape_string($conexao, $_POST['nome']);
    $dataNascimento = mysqli_escape_string($conexao, $_POST['datanasc']);
    $rg = mysqli_escape_string($conexao, $_POST['rg']);
    $cpf = mysqli_escape_string($conexao, $_POST['cpf']);
    $telefone = mysqli_escape_string($conexao, $_POST['telefone']);
    $email = mysqli_escape_string($conexao, $_POST['email']);
    $salario = mysqli_escape_string($conexao, $_POST['salario']);

    $sql = "UPDATE tb_funcionario SET nome = '$nome', dataNascimento = '$dataNascimento', rg = '$rg', cpf = '$cpf', telefone = '$telefone', email_funcionario = '$email', salario = '$salario' WHERE idFuncionario = '$idFuncionario'";

    if(mysqli_query($conexao, $sql)){
        echo "<script language='javascript' type='text/javascript'> alert('Funcionário atualizado com sucesso!');window.location = '../perfis/perfilproprietario.php'
            </script>";
    }
    else {
        echo "<script language='javascript' type='text/javascript'> alert('Erro ao atualizar, tente novamente...');window.location = '../perfis/editarfuncionario.php'
            </script>";
    }
}