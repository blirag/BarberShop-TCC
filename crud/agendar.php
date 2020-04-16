<?php 
session_start();
require_once 'conexaoDB.php';

$procedimento = $_POST['procedimento'];
$profissional = $_POST['funcionario'];
$data = $_POST['dataagenda'];
$horario = $_POST['hora'];

$sql = mysqli_query($conexao, "SELECT tempo FROM tb_servicos WHERE procedimento = '$procedimento'");
$row = mysqli_fetch_array($sql);
$tempo = $row['tempo'];
$horario_final = strtotime($tempo) + strtotime($horario);
$horario_final = date("H:i", strtotime('+15 minutes', $horario_final));

$sql = "SELECT horaInicio,horaFim, funcionario FROM tb_agendamento WHERE funcionario = '$profissional' AND dataAgendamento = '$data'";
$result = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($result);


/* devemos colocar condicional de data para que agendamentos com mesmo horário porém em datas diferentes funcionem
e para que não seja possivel agendar em uma data menor q a atual */

if($horario > $dados['horaFim'] && $horario != $dados['horaInicio']){

     $idCliente = $_SESSION['cliente'];
     $insert = "INSERT INTO tb_agendamento (idProprietario, dataAgendamento, horaInicio, procedimento, funcionario, horaFim, idFuncionario, idServicos, idCliente) VALUES ('3', '$data', '$horario', '$procedimento', '$profissional', '$horario_final', NULL, NULL, '$idCliente')";

         if(mysqli_query($conexao, $insert)){
            echo "<script language='javascript' type='text/javascript'> alert('Agendado com sucesso!');window.location = '../perfis/perfilcliente.php'</script>";
        }
        else {
            echo "<script language='javascript' type='text/javascript'> alert('Erro ao agendar, tente novamente!');window.location = '../servicos-agendamento/agendamento.php'</script>";
        }

}


else {

    
    if($horario == $dados['horaInicio'] or $horario < $dados['horaFim']){

        echo "<script language='javascript' type='text/javascript'> alert('Horário indisponível, verifique e tente novamente');window.location = '../servicos-agendamento/agendamento.php'</script>";
    }

    else if($horario > $dados['horaFim'] && $horario != $dados['horaInicio'] && $profissional != $dados['funcionario']  ){


        if(mysqli_query($conexao, $insert)){
            echo "<script language='javascript' type='text/javascript'> alert('Agendado com sucesso!');window.location = '../perfis/perfilcliente.php'</script>";
        }
        else {
            echo "<script language='javascript' type='text/javascript'> alert('Erro ao agendar, tente novamente!');window.location = '../servicos-agendamento/agendamento.php'</script>";
        }


    }


}






?>