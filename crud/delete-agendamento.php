<?php
session_start();
require_once 'conexaoDB.php';

if(isset($_GET['id'])){
    $id = mysqli_escape_string($conexao, $_GET['id']);
    $sql = "DELETE FROM tb_agendamento WHERE idAgendamento = '$id'";

    if(mysqli_query($conexao, $sql)){
        if(isset($_SESSION['cliente'])){
            echo "<script language='javascript' type='text/javascript'> alert('Agendamento deletado!');window.location = '../perfis/perfilcliente.php'</script>";
        }
        else if(isset($_SESSION['proprietario'])){
            echo "<script language='javascript' type='text/javascript'> alert('Agendamento deletado!');window.location = '../perfis/perfilproprietario.php'</script>";
        }
        else{
            echo "<script language='javascript' type='text/javascript'> alert('Agendamento deletado!');window.location = '../perfis/perfilfuncionario.php'</script>";
        }
    }
    else {
        echo "<script language='javascript' type='text/javascript'> alert('Erro ao deletar!');window.location = '../index.php'</script>";
    }
}