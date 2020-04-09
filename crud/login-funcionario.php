<?php 
session_start();
require_once 'conexaoDB.php';

if(isset($_POST['btn-entrar'])){
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    if(empty($email) || empty($senha)){
        echo "<script language='javascript' type='text/javascript'> alert('Todos os campos precisam ser preenchidos!');window.location = '../cadastro-login/login-funcionario.html'</script>";
    }
    else{
        $sql = "SELECT email_proprietario from tb_proprietario WHERE email_proprietario = '$email'";
        $result = mysqli_query($conexao, $sql);

        if(mysqli_num_rows($result) > 0){
            $senha = md5($senha);
            $sql = "SELECT * FROM tb_proprietario WHERE email_proprietario = '$email' AND senha_proprietario = '$senha'";
            $result = mysqli_query($conexao, $sql);

            if(mysqli_num_rows($result) == 1){
                $dados = mysqli_fetch_array($result);
                
                $_SESSION['proprietario'] = true;
                $_SESSION['id_proprietario'] = $dados['idProprietario'];
                header ('location: ../perfis/perfilproprietario.php');
            }
            else {
                echo "<script language='javascript' type='text/javascript'> alert('Usuário ou senha não conferem, por favor tente novamente...');window.location = '../cadastro-login/login-funcionario.html'</script>";
            }
        }
        else {
            $sql = "SELECT email_funcionario FROM tb_funcionario WHERE email_funcionario = '$email'";
            $result = mysqli_query($conexao, $sql);
            
            if(mysqli_num_rows($result) > 0){
                $senha = md5($senha);
                $sql = "SELECT * FROM tb_funcionario WHERE email_funcionario = '$email' AND senha_funcionario = '$senha'";
                $result = mysqli_query($conexao, $sql);

                if(mysqli_num_rows($result) == 1){
                    $dados = mysqli_fetch_array($result);

                    $_SESSION['funcionario'] = true;
                    $_SESSION['id_funcionario'] = $dados['idFuncionario'];
                    header ('location: ../perfis/perfilfuncionario.php');
                }
                else {
                    echo "<script language='javascript' type='text/javascript'> alert('Usuário ou senha não conferem, por favor tente novamente...');window.location = '../cadastro-login/login-funcionario.html'</script>";
                }
            }
            else {
                echo "<script language='javascript' type='text/javascript'> alert('Usuário inexistente, cadastre-se ou tente novamente...');window.location = '../cadastro-login/login-funcionario.html'
                </script>";
                
            }
        }
    } 
}
?>