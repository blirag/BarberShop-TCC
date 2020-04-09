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

$sql = "SELECT * FROM tb_agendamento WHERE funcionario = '$profissional'";
$result = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($result);

// condição está errada, não está funcionando esse primeiro if
    if($dados['horaInicio'] == $horario && $dados['horaFim'] == $horario_final){
        echo "<script language='javascript' type='text/javascript'> alert('Horário indisponível, tente com outro profissional ou altere o horário');window.location = '../servicos-agendamento/agendamento.php'</script>";
    }
    else {
        $insert = "INSERT INTO tb_agendamento (idProprietario, dataAgendamento, horaInicio, procedimento, funcionario, horaFim, IdFuncionario, IdServicos) VALUES ('3', '$data', '$horario', '$procedimento', '$profissional', '$horario_final', NULL, NULL)";

        if(mysqli_query($conexao, $insert)){
                echo "<script language='javascript' type='text/javascript'> alert('Agendado com sucesso!');window.location = '../index.php'</script>";
        }
        else {
            echo "<script language='javascript' type='text/javascript'> alert('Erro ao agendar, tente novamente!');window.location = '../servicos-agendamento/agendamento.php'</script>";
        }
    }

