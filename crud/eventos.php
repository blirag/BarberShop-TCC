<?php

require_once 'conexaoDB.php';

$sql = mysqli_query($conexao, "SELECT idAgendamento, procedimento, dataAgendamento, horaInicio, horaFim, funcionario FROM tb_agendamento");

$eventos = [];

while($dados = mysqli_fetch_array($sql)){
    $id = $dados['idAgendamento'];
    $procedimento = $dados['procedimento'];
    $horaInicio = $dados['horaInicio'];
    $horaFim = $dados['horaFim'];
    $profissional = $dados['funcionario']
    $data = $dados['dataAgendamento'];

    $eventos[] = ['id' => $id, 
                'data' => $data,
                'procedimento' => $procedimento, 'horaInicio' => $horaInicio, 'horaFim' => $horaFim, 'profissional' => $profissional];
}

echo json_encode($eventos);
?>