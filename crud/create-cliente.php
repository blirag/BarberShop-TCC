<?php


include"conexaoDB.php";

$nome = $_POST['frm_nome'];
$telefone = $_POST['frm_telefone'];
$email = $_POST['frm_email'];
$senha = $_POST['frm_senha'];

$sql = "INSERT INTO `tb_cliente` (`idCliente`, `idProprietario`, `nome`, `telefone`, `email`, `senha`) VALUES (NULL, '2', '$nome', '$telefone', '$email', '$senha');";

if ($conexao->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
}

$conexao->close();

?>