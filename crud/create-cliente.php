<?php


include"conexaoDB.php";

$nome = $_POST['frm_nome'];
$telefone = $_POST['frm_telefone'];
$email = $_POST['frm_email'];
$senha = $_POST['frm_senha'];

$sql = "insert into `tb_cliente` (`idCliente`, `idProprietario`, `nome`, `telefone`, `email_cliente`, `senha_cliente`) VALUES (NULL, '3', '$nome', '$telefone', '$email', '$senha')";

if ($conexao->query($sql) === TRUE) {

   echo"<script language='javascript' type = 'text/javascript' > alert('Cadastrado com sucesso!');window.location.href = '../cadastro-login/login.html'; </script> " ;



} else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
}

$conexao->close();




?>