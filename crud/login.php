<?php 

require_once 'conexaoDB.php';

if(isset($_POST['btn-entrar'])){
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    if(empty($email) || empty($senha)){
        echo "Todos os campos precisam ser preenchidos";
    }
    else{
        $sql = "SELECT email_cliente, email_proprietario, email_funcionario FROM tb_cliente, tb_proprietario, tb_funcionario WHERE email_cliente = '$email' OR email_proprietario = '$email' OR email_funcionario = '$email'";
        $result = mysqli_query($conexao, $sql);
        
        if(mysqli_num_rows($result) > 0){
            $senha = md5($senha);
            $sql = "SELECT * FROM tb_cliente, tb_proprietario, tb_funcionario WHERE email_cliente = '$email' AND senha_cliente = '$senha' OR email_proprietario = '$email' AND senha_proprietario = '$senha' OR email_funcionario = '$email' AND senha_funcionario = '$senha'";
            $result = mysqli_query($conexao, $sql);

            if(mysqli_num_rows($result) == 1){
                $dados = mysqli_fetch_array($result);

                if($dados['email_cliente'] == $email){
                    $_SESSION['cliente_logado'] = true;
                    $_SESSION['id_cliente'] = $dados['idCliente'];
                    header ('location: ../perfis/perfilcliente.php');
                }
                else if($dados['email_proprietario'] == $email){
                    $_SESSION['proprietario_logado'] = true;
                    $_SESSION['id_proprietario'] = $dados['idProprietario'];
                    header ('location: ../perfis/perfilproprietario.php');
                }
                else {
                    $_SESSION['funcionario_logado'] = true;
                    $_SESSION['id_funcionario'] = $dados['idFuncionario'];
                    header ('location: ../perfis/perfilfuncionario.php');
                }
            }
            else {
                echo "Usuário e senha não conferem";
            }
        }
        else {
            echo "Usuário inexistente";
        }
    } 
}