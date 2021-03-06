<?php
session_start();
require_once 'crud/conexaoDB.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barbershop</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/4da5630a36.js" crossorigin="anonymous"></script>
    <script 
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
</head>
<body>
    <header>
     <a href="#"><img src="img/banner.png" title="Barber Shop"></a>
     <nav>
        <ul>
            <li><a href="servicos-agendamento/servicos.php">Serviços</a></li>
            <li><a href="servicos-agendamento/agendamento.php">Agendamento</a></li>
            <li><a href="#localizacao">Localização</a></li>
            <li><a href="#contato">Contato</a></li>
        </ul>
    </nav>

    <?php
    if(isset($_SESSION['cliente'])){
        ?>
        <a href="perfis/perfilcliente.php" id="login"><i class="fas fa-user"></i></a>
        <?php
    }
    else if(isset($_SESSION['funcionario'])){
        ?>
        <a href="perfis/perfilfuncionario.php" id="login"><i class="fas fa-user"></i></a>
        <?php
    }
    else if(isset($_SESSION['proprietario'])){
        ?>
        <a href="perfis/perfilproprietario.php" id="login"><i class="fas fa-user"></i></a>
        <?php
    }
    else{
        ?>
        <a href="cadastro-login/login.html" id="login"><i class="fas fa-user"></i></a>
        <?php
    }
    ?>
    

    <button class="btn-menu">
        <i class="fas fa-angle-down"></i> 
    </button>
    <section class="menu">
        <a class="btn-close"> <i class="fa fa-times"></i></a>
        <ul>
            <li><a href="servicos-agendamento/servicos.php"> Serviços </a></li>
            <li><a href="servicos-agendamento/agendamento.php"> Agendamento </a></li>
            <li><a href="#localizacao"> Localização </i></a></li>
            <li><a href="#contato"> Contato </a></li>
            <li><a href="cadastro-login/cadastro.html"> Cadastro </a></li>
            <li><a href="cadastro-login/login.html"> Login </a></li>
        </ul>
    </section>
</header>

<main>
    <h3>Sobre nós</h3>
    <hr>
    <p>Nossa barbearia fundada em 2009 é referência por ter um espaço exclusivamente aconchegante, para cuidar da barba, do cabelo e do bigode, inspirado no lifestyle de Los Angeles do passado.
        O ambiente tradicional e intimista é perfeito para o resgate desse antigo e charmoso hábito, onde o conceito old-school de atendimento, de cortes de cabelo e barba, da navalha, com direito a toalha  e espuma aquecidas são a marca registrada.
        Bom papo, boa música e cerveja gelada harmonizam-se a essa experiência. <br>
    Sejam muito bem-vindos!</p>
    <ul class="grid-sobrenos">
        <li class="first" style="background-image: url(img/grid-sobrenos.jpg);"></li>
        <li class="large" style="background-image: url(img/grid-sobrenos2.jpg);"></li>
        <li class="large" style="background-image: url(img/grid-sobrenos3.jpg);"></li>
    </ul>    
</main>

<section class="sobre-agendamento">
    <h3>Agende já seu horário</h3>
    <p>Buscando sempre o melhor para o cliente disponibilizamos o agendamento online onde você poderá escolher o melhor horário com o profissional de sua preferência</p>
    <hr>
    <a class="btn-agendar" href="servicos-agendamento/agendamento.php">Agendar</a>
    <ul class="grid">
        <li class="small" style="background-image: url(img/grid1.jpg);"></li>
        <li class="large" style="background-image: url(img/grid2.jpg);"></li>
        <li class="large" style="background-image: url(img/grid3.jpg);"></li>
        <li class="small" style="background-image: url(img/grid4.jpg);"></li>
    </ul>
</section>

<section class="onde-estamos" id="localizacao">
    <h3>Onde estamos</h3>
    <p>Rua Oscar Freire, 1102, Jardim Paulista – São Paulo</p>
    <hr>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.1886353058326!2d-46.67249138502226!3d-23.56166768468276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59d55e6767b9%3A0x4402220e5c65404e!2sRua%20Oscar%20Freire%2C%201102%20-%20Jardim%20Paulista%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2001417-060!5e0!3m2!1spt-BR!2sbr!4v1582996270104!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section>

<section class="contato" id="contato">
    <h3>Contate-nos</h3>
    <p>Em caso de dúvidas, sugestões, elogios ou reclamações entre em contato conosco por um dos meios abaixo</p>
    <hr>
    <ul class="buttons">
        <li><a href=""><i class="fa fa-phone fa-lg"></i> (11) 29460706 </a></li>
        <li><a href=""><i class="fab fa-whatsapp fa-lg"></i> (11) 988141970 </a></li>
        <li><a href=""><i class="fab fa-instagram fa-lg"></i> barbershop.oficial </a></li>
        <li><a href=""><i class="fa fa-envelope fa-lg"></i> barbershop@gmail.com </a></li>
    </ul>
</section>

<i class="fas fa-angle-up" id="btntop"></i>

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

    $('header nav a #localizacao').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('href'),
        targetOffset = $(id).offset().top;
        $('html, body').animate({
            scrollTop: targetOffset
        }, 500);
    });

    // função para o botão voltar ao topo
    $(function() {
        $('#btntop').hide()
        $(window).scroll(function() {
            if($(this).scrollTop() > 500){
                $('#btntop').fadeIn()
            }
            else {
                $('#btntop').fadeOut()
            }
        });
        $('#btntop').click(function(){
            $('html, body').animate({
                scrollTop: 0
            });
        });
    });
</script>
</body>
</html>