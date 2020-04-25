<?php
include"conexaoDB.php";

$nome = $_POST['frm_nome'];
$telefone = $_POST['frm_telefone'];
$email = $_POST['frm_email'];
$senha = $_POST['frm_senha'];

$sql = mysqli_query($conexao, "SELECT * FROM tb_cliente WHERE email_cliente = '$email'");

if(empty($nome) || empty($telefone) || empty($email) || empty($senha)){
	echo "<script language='javascript' type='text/javascript'> alert('Todos os campos precisam ser preenchidos!');window.location = '../cadastro-login/cadastro.html'</script>";
	$conexao->close();
}
else if(mysqli_num_rows($sql) > 0){
	echo "<script language='javascript' type='text/javascript'> alert('Email já cadastrado, tente outro!');window.location = '../cadastro-login/cadastro.html'</script>";
}
else{	
	$senha = md5($senha);
	$insert = "insert into `tb_cliente` (`idCliente`, `idProprietario`, `nome`, `telefone`, `email_cliente`, `senha_cliente`) VALUES (NULL, '3', '$nome', '$telefone', '$email', '$senha')";

	if ($conexao->query($insert) === TRUE) {
		echo"<script language='javascript' type = 'text/javascript' > alert('Cadastrado com sucesso!');window.location.href = '../cadastro-login/login.html'; </script> " ;
	}
	else {
		echo "Error: " . $sql . "<br>" . $conexao->error;
	}
}
$conexao->close();
?>