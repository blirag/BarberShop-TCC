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

$semana = date("N", strtotime($data));




$dia_agendamento = idate("d", strtotime($data));
$mes_agendamento = idate("m", strtotime($data));
$ano_agendamento = idate("Y", strtotime($data));

$dia_atual = idate('d');
$mes_atual = idate('m');
$ano_atual = idate('Y');


if($semana == 7){
    echo "<script language='javascript' type='text/javascript'> alert('Não abrimos de domingo, tente outro dia da semana!');window.location = '../servicos-agendamento/agendamento.php'</script>";
}
else if($ano_agendamento < $ano_atual || $mes_agendamento < $mes_atual || $dia_agendamento<$dia_atual){
    echo "<script language='javascript' type='text/javascript'> alert('Impossível agendar! A data escolhida já passou.');window.location = '../servicos-agendamento/agendamento.php'</script>";
}

else if($horario > $dados['horaFim'] && $horario != $dados['horaInicio']  && $ano_agendamento >= $ano_atual && $mes_agendamento >= $mes_atual){

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
}






?>