<?php 

require_once 'conexaoDB.php';

if(isset($_POST['btn-entrar'])){
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    if(empty($email) || empty($senha)){
        echo "<script language='javascript' type='text/javascript'> alert('Todos os campos precisam ser preenchidos!');window.location = '../cadastro-login/login-funcionario.html'</script>";
    }
    else{
        $sql = "SELECT email_cliente FROM tb_cliente WHERE email_cliente = '$email'";
        $result = mysqli_query($conexao, $sql);
        
        if(mysqli_num_rows($result) > 0){
            $senha = md5($senha);
            $sql = "SELECT * FROM tb_cliente WHERE email_cliente = '$email' AND senha_cliente = '$senha'";
            $result = mysqli_query($conexao, $sql);

            if(mysqli_num_rows($result) == 1){

                session_start();

                $dados = mysqli_fetch_array($result);
                $_SESSION['cliente'] = true;
                $_SESSION['cliente'] = $dados['idCliente'];
                header ('location: ../perfis/perfilcliente.php');
            }
            else {
                echo "<script language='javascript' type='text/javascript'> alert('Usuário ou senha não conferem, por favor tente novamente...');window.location = '../cadastro-login/login.html'</script>";
            }
        }
        else {
            echo "<script language='javascript' type='text/javascript'> alert('Usuário inexistente, cadastre-se ou tente novamente...');window.location = '../cadastro-login/login.html'
            </script>";
        }
    } 
}
?>