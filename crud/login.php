<?php 

require_once 'conexaoDB.php';

if(isset($_POST['btn-entrar'])):
    $email = mysqli_escape_string($conexao, $_POST['email']);
    $senha = mysqli_escape_string($conexao, $_POST['senha']);

    if(empty($email) || empty($senha)):
        echo "Todos os campos precisam ser preenchidos";
    else:
        $sql_cliente = "SELECT email FROM tb_cliente WHERE email = '$email'";
        $sql_funcionario = "SELECT email FROM tb_funcionario WHERE email = '$email'";
        $sql_proprietario = "SELECT email FROM tb_proprietario WHERE email = '$email'";

        if($sql_cliente == true):
            $result = mysqli_query($conexao, $sql_cliente);
            if(mysli_num_rows($result) > 0):
                $senha = md5($senha);
                $sql = "SELECT * FROM tb_cliente WHERE email = '$email' AND senha = '$senha'";
                $result = mysqli_query($conexao, $sql);
                
                if(mysqli_num_rows($result) == 1):
                    $dados = mysqli_fetch_array($result);
                    $_SESSION['cliente_login'] = true;
                    $_SESSION['id_cliente'] = $dados['idCliente'];
                    header ('location: ../perfis/perfilcliente.html');
                
                else:
                    echo "Email e senha não conferem";
                endif;
            else:
                echo "Usuário inexistente";
            endif;

        else if ($sql_funcionario == true):
            $result = mysqli_query($conexao, $sql_funcionario);
            if(mysli_num_rows($result) > 0):
                $senha = md5($senha);
                $sql = "SELECT * FROM tb_funcionario WHERE email = '$email' AND senha = '$senha'";
                $result = mysqli_query($conexao, $sql);
                
                if(mysqli_num_rows($result) == 1):
                    $dados = mysqli_fetch_array($result);
                    $_SESSION['funcionario_login'] = true;
                    $_SESSION['id_funcionario'] = $dados['idFuncionario'];
                    header ('location: ../perfis/perfilfuncionario.html');
                
                else:
                    echo "Email e senha não conferem";
                endif;
            else:
                echo "Usuário inexistente";
            endif;

        else:
            $result = mysqli_query($conexao, $sql_proprietario);
            if(mysli_num_rows($result) > 0):
                $senha = md5($senha);
                $sql = "SELECT * FROM tb_proprietario WHERE email = '$email' AND senha = '$senha'";
                $result = mysqli_query($conexao, $sql);
                
                if(mysqli_num_rows($result) == 1):
                    $dados = mysqli_fetch_array($result);
                    $_SESSION['proprietario_login'] = true;
                    $_SESSION['id_proprietario'] = $dados['idProprietario'];
                    header ('location: ../perfis/perfilproprietario.html');

                else:
                    echo "Email e senha não conferem";
                endif;
            else:
                echo "Usuário inexistente";
            endif;
        endif;
    endif;
endif;
        