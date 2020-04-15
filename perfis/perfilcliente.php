<?php

session_start();

require_once '../crud/conexaoDB.php';

if(!isset($_SESSION['cliente'])){
    header ('location: ../cadastro-login/login.html');
}
else {
    $idCliente = $_SESSION['cliente'];
    $sql = "SELECT * FROM tb_cliente WHERE idCliente = '$idCliente'";
    $result = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($result);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4da5630a36.js" crossorigin="anonymous"></script>
    <script 
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/perfis.css">
</head>
<body>
    <header>
        <p class="name"><?php echo $dados['nome']; ?></p>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../crud/editarcliente.php?idCliente=<?php echo $dados['idCliente'] ?>">Editar conta </a> </li>
                <li><a href="../crud/logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h3>Histórico de Agendamento</h3>
        <hr><br>
        <table>
            <thead>
                <tr>
                    <th>Procedimento</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Funcionário</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = mysqli_query($conexao, "SELECT procedimento, dataAgendamento, horaInicio, funcionario FROM tb_agendamento WHERE idCliente = '$idCliente'");

                    if(mysqli_num_rows($sql)){
                        while($dados = mysqli_fetch_array($sql)){
                ?>
                <tr>
                    <td><?php echo $dados['procedimento'];?></td>
                    <td><?php echo date("d/m/Y", strtotime($dados['dataAgendamento']));?></td>
                    <td><?php echo date("H:i", strtotime($dados['horaInicio']));?></td>
                    <td><?php echo $dados['funcionario'];?></td>
                    <td><i class="fas fa-trash"></i></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <a href="../servicos-agendamento/agendamento.php">Novo agendamento</a>
    </section>

    <footer>
        <h2 class="title">Atendimento</h2>
        <ul class="infos">
            <li><i class="far fa-clock"></i> Ter à sex das 10h00 às 20h00 </li>
            <li><i class="far fa-clock"></i>  Sáb das 10h00 às 19h00 </li>
        </ul>
        
        <h2 class="title">Contato</h2>
        <ul class="infos">
            <li><i class="fas fa-map-marker-alt"></i> Rua Oscar Freire, 1102, Jardim Paulista – São Paulo </li>
            <li><i class="fa fa-phone fa-lg"></i> (11) 29460706 </li>
        </ul>
        
        <p>© Barber Shop 2020 | Todos os direitos reservados</p>
    </footer>
    
    <script>
        // função para o menu
        $(".btn-menu").click(function (){$(".menu").show()});
        $(".btn-close").click(function(){$(".menu").hide()});
    </script>
</body>
</html>