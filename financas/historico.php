<?php
session_start();

require_once '../crud/conexaoDB.php';

if(!isset($_SESSION['proprietario'])){
    header ('location: ../cadastro-login/login-funcionario.html');
}
else{
    $idProprietario = $_SESSION['id_proprietario'];
    $sql = "SELECT * FROM tb_proprietario WHERE idProprietario = '$idProprietario'";
    $result = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($result);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Finanças</title>
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
                <li><a href="painelfinancas.php">Voltar</a></li>
                <li><a href="../crud/logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>
        <section>
            <h3>Histórico de Finanças</h3>
            <hr><br>
                <table>
                    <thead>
                        <tr>
                            <th>Mês</th>
                            <th>Total de Salários</th>
                            <th>Gastos Fixos</th>
                            <th>Gastos Variáveis</th>
                            <th>Lucro com Serviços</th>
                            <th>Lucro Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = mysqli_query($conexao, "SELECT * FROM tb_financas");

                        while($dados = mysqli_fetch_array($sql)){
                    ?>
                        <tr>
                            <td><?php echo $dados['mes'];?></td>
                            <td>R$ <?php echo $dados['salarios'];?></td>
                            <td>R$ <?php echo $dados['gastosfixos'];?></td>
                            <td>R$ <?php echo $dados['gastosvariaveis'];?></td>
                            <td>R$ <?php echo $dados['lucroservicos'];?></td>
                            <td>R$ <?php echo $dados['lucrototal'];?></td>
                        </tr>
                    <?php
                        }
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

        $('header nav a #funcionario').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('href'),
            targetOffset = $(id).offset().top;
            $('html, body').animate({
                scrollTop: targetOffset
            }, 50);
        });
    </script>
</body>
</html>