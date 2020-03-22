<?php 

require_once 'conexaoDB.php';

if(isset($_POST['btn-entrar'])){
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    if(empty($email) || empty($senha)){
        echo "Todos os campos precisam ser preenchidos";
    }
    else{
        $sql = "SELECT email_cliente FROM tb_cliente WHERE email_cliente = '$email'";
        $result = mysqli_query($conexao, $sql);
        
        if(mysqli_num_rows($result) > 0){
            $senha = md5($senha);
            $sql = "SELECT * FROM tb_cliente WHERE email_cliente = '$email' AND senha_cliente = '$senha'";
            $result = mysqli_query($conexao, $sql);

            if(mysqli_num_rows($result) == 1){
                $dados = mysqli_fetch_array($result);

                $_SESSION['cliente_logado'] = true;
                $_SESSION['id_cliente'] = $dados['idCliente'];
                header ('location: ../perfis/perfilcliente.php');
            }
            else {
                echo "<script language='javascript' type='text/javascript'> alert('Usuário e senha não conferem');</script>";
            }
        }
        else {
            echo "<script language='javascript' type='text/javascript'> alert('Usuário inexistente'); 
            </script>";
        }
    } 
}