<?php
session_start();
require_once 'conexaoDB.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = mysqli_query($conexao, "SELECT valor FROM tb_agendamento WHERE idAgendamento = '$id'");
    $dados = mysqli_fetch_array($sql);
    $valor = $dados['valor'];

    $insertLucro = "INSERT INTO tb_lucros (valor) VALUES ('$valor')";
    $upSituacao = "UPDATE `tb_agendamento` SET `situacao` = '1' WHERE `tb_agendamento`.`idAgendamento` = '$id';";


    if(mysqli_query($conexao, $insertLucro)){

        mysqli_query($conexao, $upSituacao);

        if($_SESSION['funcionario']){
            header ('location: ../perfis/perfilfuncionario');
        }
        else if($_SESSION['proprietario']){
            header ('location: ../perfis/perfilproprietario');
        }
        else{

             echo "<script language='javascript' type='text/javascript'> alert('Erro de sessão, tente novamente mais tarde!');window.location = '../perfis/perfilfuncionario.php'</script>";
        }
    }
    else{
        echo "<script language='javascript' type='text/javascript'> alert('Erro, não foi possível realizar está ação!');window.location = '../perfis/perfilfuncionario.php'</script>";
    }
}