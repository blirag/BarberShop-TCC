<?php
session_start();

require_once '../crud/conexaoDB.php';

$sql = "SELECT nome FROM tb_funcionario";
$result = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços - Barbershop</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4da5630a36.js" crossorigin="anonymous"></script>
    <script 
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/servicos.css">
</head>
<body>
    <header>
        <a href="../index.php"><img src="../img/banner.png" title="Barber Shop"></a>
        <nav>
           <ul>
               <li><a href="../servicos-agendamento/servicos.php">Serviços</a></li>
               <li><a href="../servicos-agendamento/agendamento.php">Agendamento</a></li>
               <li><a href="../index.php#localizacao">Localização</a></li>
               <li><a href="../index.php#contato">Contato</a></li>
           </ul>
       </nav>
       <?php
    if(isset($_SESSION['cliente'])){
        ?>
        <a href="../perfis/perfilcliente.php" id="login"><i class="fas fa-user"></i></a>
        <?php
    }
    else if(isset($_SESSION['funcionario'])){
        ?>
        <a href="../perfis/perfilfuncionario.php" id="login"><i class="fas fa-user"></i></a>
        <?php
    }
    else if(isset($_SESSION['proprietario'])){
        ?>
        <a href="../perfis/perfilproprietario.php" id="login"><i class="fas fa-user"></i></a>
        <?php
    }
    else{
        ?>
        <a href="../cadastro-login/login.html" id="login"><i class="fas fa-user"></i></a>
        <?php
    }
    ?>
       
       <button class="btn-menu">
           <i class="fas fa-angle-down"></i> 
       </button>
       <section class="menu">
           <a class="btn-close"> <i class="fa fa-times"></i></a>
           <ul>
               <li><a href="servicos.php"> Serviços </a></li>
               <li><a href="agendamento.php"> Agendamento </a></li>
               <li><a href="../index.html#localizacao"> Localização </i></a></li>
               <li><a href="../index.html#contato"> Contato </a></li>
               <li><a href="../cadastro-login/cadastro.html"> Cadastro </a></li>
               <li><a href="../cadastro-login/login.html"> Login </a></li>
           </ul>
       </section>
   </header>

   <section class="servicos">
    <h3>Conheça nossos serviços</h3>
    <hr>
    <ul class="grid1">
        <li style="background-image: url(../img/servico1.jpeg);">
            <h4>Cabelo simples</h4>
            <hr>
            <h5>R$ 32,00</h5>
            <p>Máquina + acabamento <br><br>
                <i class="fas fa-stopwatch"></i> 20 minutos
            </p>
            <a href="agendamento.php" class="btn-agendar">Agendar</a>
        </li>
        <li style="background-image: url(../img/servico2.jpg);">
            <h4>Barba simples</h4>
            <hr>
            <h5>R$ 22,00</h5>
            <p>Navalha + máquina <br><br>
                <i class="fas fa-stopwatch"></i> 20 minutos
            </p>
            <a href="agendamento.php" class="btn-agendar">Agendar</a>
        </li>
        <li style="background-image: url(../img/servico3.jpeg);">
            <h4>Cabelo completo</h4>
            <hr>
            <h5>R$ 45,00</h5>
            <p>Lavagem + tesoura + máquina + acabamento <br>
                <i class="fas fa-stopwatch"></i> 30 minutos
            </p>
            <a href="agendamento.php" class="btn-agendar">Agendar</a>
        </li>
    </ul>
    <ul class="grid1">
        <li style="background-image: url(../img/servico4.jpeg);">
            <h4>Barba completa</h4>
            <hr>
            <h5>R$ 35,00</h5>
            <p>Toalha quente + navalha + máquina + pós barba <br>
                <i class="fas fa-stopwatch"></i> 30 minutos
            </p>
            <a href="agendamento.php" class="btn-agendar">Agendar</a>
        </li>
        <li style="background-image: url(../img/servico6.jpeg);">
            <h4>Cabelo e barba simples</h4>
            <hr>
            <h5>R$ 47,00</h5>
            <p>Cabelo simples + barba simples <br><br>
                <i class="fas fa-stopwatch"></i> 40 minutos
            </p>
            <a href="agendamento.php" class="btn-agendar">Agendar</a>
        </li>
        <li style="background-image: url(../img/servico5.jpeg);">
            <h4>Cabelo e barba completo</h4>
            <hr>
            <h5>R$ 70,00</h5>
            <p>Cabelo completo + barba completo <br><br>
                <i class="fas fa-stopwatch"></i> 60 minutos
            </p>
            <a href="agendamento.php" class="btn-agendar">Agendar</a>
        </li>
    </ul>
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