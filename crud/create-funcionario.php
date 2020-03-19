<?php


include"conexaoDB.php";

$nome = $_POST['nome'];
$dataNascimento = $_POST['datanasc'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$salario = $_POST['salario'];

$sql = "INSERT INTO `tb_funcionario` (`idFuncionario`, `idProprietario`, `nome`, `rg`, `cpf`, `dataNascimento`, `telefone`, `salario`, `email_funcionario`, `senha_funcionario`) VALUES (NULL, '3', '$nome', '$rg', '$cpf', '$dataNascimento', '$telefone', '$salario', '$email', '$senha')";

if ($conexao->query($sql) === TRUE) {

   echo"<script language='javascript' type = 'text/javascript' > alert('Cadastrado com sucesso!');window.location.href = '../cadastro-login/login-funcionario.html'; </script> " ;



} else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
}

$conexao->close();




?>