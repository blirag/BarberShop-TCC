<?php
session_start();
require_once 'conexaoDB.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = mysqli_query($conexao, "SELECT valor, dataAgendamento FROM tb_agendamento WHERE idAgendamento = '$id'");
    $dados = mysqli_fetch_array($sql);
    $data = $dados['dataAgendamento'];
    $mes_agendamento = idate('m', strtotime($data));
    date_default_timezone_set('America/Sao_Paulo');
    $mes_atual = idate('m');
    $valor = $dados['valor'];
    
    if($mes_agendamento == $mes_atual){
        $insert = "INSERT INTO tb_lucros (valor) VALUES ('$valor')";

        if(mysqli_query($conexao, $insert)){
            if($_SESSION['funcionario']){
                header ('location: ../perfis/perfilfuncionario');
            }
            else if($_SESSION['proprietario']){
                header ('location: ../perfis/perfilproprietario');
            }
        }
        else{
        echo "<script language='javascript' type='text/javascript'> alert('Erro, não foi possível realizar está ação!');window.location = '../perfis/perfilfuncionario.php'</script>";
        }
    }
}