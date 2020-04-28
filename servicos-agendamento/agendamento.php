<?php
session_start();

require_once '../crud/conexaoDB.php';

if(!isset($_SESSION['cliente'])){
    echo "<script language='javascript' type='text/javascript'> alert('Faça o login ou cadastre-se para agendar!');window.location = '../cadastro-login/login.html'</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento - Barber Shop</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4da5630a36.js" crossorigin="anonymous"></script>
    <script 
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/agendamento.css">
</head>
<body>
    <header>
        <a href="../index.php"><img src="../img/banner.png" title="Barber Shop"></a>
        <nav>
           <ul>
               <li><a href="servicos.php">Serviços</a></li>
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
               <li><a href="servicos.html"> Serviços </a></li>
               <li><a href="agendamento.html"> Agendamento </a></li>
               <li><a href="../index.php"> Localização </i></a></li>
               <li><a href="../index.php"> Contato </a></li>
               <li><a href="../cadastro-login/cadastro.html"> Cadastro </a></li>
               <li><a href="../cadastro-login/login.html"> Login </a></li>
           </ul>
       </section>
   </header>

   <section>
    <form method="POST" action="../crud/agendar.php">
        <h1>Novo Agendamento</h1>
        <hr><br>
        <label for="procedimento">Procedimento</label><br>
        <select name="procedimento" id="procedimento">
            <?php
            $sql = "SELECT procedimento, valor FROM tb_servicos";
            $result = mysqli_query($conexao, $sql);

            if(mysqli_num_rows($result)){
                while($dados = mysqli_fetch_array($result)){
                    ?>

                    <option name="procedimento"><?php echo $dados['procedimento']?></option>

                    <?php
                }
            }
            ?>
            
        </select><br><br>
        <label for="dataagenda">Data</label><br>
        <input type="date" name="dataagenda" id="dataagenda"><br><br>
        <label for="hora">Horário</label><br>
        <input type="time" name="hora" id="hora"><br><br>
        <label for="profissional">Profissional</label><br>
        <select name="funcionario" id="funcionario">
            <?php
            $sql = "SELECT nome FROM tb_funcionario";
            $result = mysqli_query($conexao, $sql);

            if(mysqli_num_rows($result)){
                while($dados = mysqli_fetch_array($result)){
                    ?>

                    <option name="funcionario"><?php echo $dados['nome']; ?></option>

                    <?php
                }
            }
            ?>
        </select><br><br>
        <button type="submit">Agendar</button>
    </form>
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
