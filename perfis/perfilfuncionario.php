<?php
session_start();

require_once '../crud/conexaoDB.php';

if(!isset($_SESSION['funcionario'])){
    header ('location: ../cadastro-login/login-funcionario.html');
}
else {
    $idFuncionario = $_SESSION['id_funcionario'];
    $sql = "SELECT * FROM tb_funcionario WHERE idFuncionario = '$idFuncionario'";
    $result = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($result);
    $nome = $dados['nome'];
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
    <style>img{height: 45px};</style>
</head>
<body>
    <header>
        <p class="name"><?php echo $nome; ?></p>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
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
                    <th>Situação</th>
                    <th>Procedimento</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = "SELECT idAgendamento, procedimento, dataAgendamento, horaInicio, situacao FROM tb_agendamento WHERE funcionario = '$nome'";
                $result = mysqli_query($conexao, $select);

                if(mysqli_num_rows($result)){
                    while($dados = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                           <?php
                           if ($dados['situacao'] == "1") {
                            $ext = ".svg";
                            $img = "../img/check-circle-solid";
                        }
                        else{
                            $ext = ".gif";
                            $img = "../img/spinner";
                        }
                        ?>
                        <td><a href="../crud/confirmarAgendamentoFuncionario.php?id=<?php echo $dados['idAgendamento'];?>"><img src=
                            "<?php echo $img.$ext; ?>"></a></td>

                            <td><?php echo $dados['procedimento'];?></td>
                            <td><?php echo date("d/m/Y", strtotime($dados['dataAgendamento']));?></td>
                            <td><?php echo date("H:i", strtotime($dados['horaInicio']));?></td>
                            <td><a href="../crud/delete-agendamento.php?id=<?php echo $dados['idAgendamento'];?>"><i class="fas fa-trash"></i></a></td>
                        </tr>
                    <?php }
                }
                else { ?>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                <?php   } 
                ?>
            </tbody>
        </table>
    </section>

    <footer>
        <h2 class="title">Atendimento</h2>
        <ul class="infos">
            <li><i class="far fa-clock"></i> Ter à sex das 09h00 às 20h00 </li>
            <li><i class="far fa-clock"></i>  Sáb das 09h00 às 19h00 </li>
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