<?php
    session_start();
    require_once '../crud/conexaoDB.php';
    
    if(isset($_GET['idFuncionario'])){
        $idFuncionario = mysqli_escape_string($conexao, $_GET['idFuncionario']);
        $sql = "SELECT * FROM tb_funcionario WHERE idFuncionario = '$idFuncionario'";
        $result = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_array($result);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastrologin.css">
    <script src="https://kit.fontawesome.com/4da5630a36.js" crossorigin="anonymous"></script>
    <title>Editar Funcionário</title>
</head>
<body>
    <header>
        <a href="../index.php"><img src="../img/banner.png" alt="Barber Shop"></a>
        <nav>
         <ul>
             <a href="../servicos-agendamento/servicos.html"><li>Serviços</li></a>
             <a href="../servicos-agendamento/agendamento.html"><li>Agendamento</li></a>
             <a href="../index.php"><li>Contato</li></a>
             <a href="../index.php"><li>Sobre</li></a>
         </ul>
         </nav>

         <button class="btn-menu">
            <i class="fas fa-angle-down"></i> 
        </button>
        <section class="menu">
            <a class="btn-close"> <i class="fa fa-times"></i></a>
            <ul>
                <li><a href="../servicos-agendamento/servicos.html"> Serviços </a></li>
                <li><a href="../servicos-agendamento/agendamento.html"> Agendamento </a></li>
                <li><a href="../index.html"> Contato </i></a></li>
                <li><a href="../index.html"> Sobre </a></li>
                 <li><a href="cadastro.html"> Cadastro </a></li>
                 <li><a href="login.html"> Login </a></li>
            </ul>
        </section>
     </header>
<section>
     <form method="POST" action="../crud/update-funcionario.php">
        <h2>Editar Funcionário</h2>
        <hr style="width: 350px; margin-left: 70px"><br>
        <input type="hidden" name="id" value="<?php echo $dados['idFuncionario'];?>">
        <label for="nome">Nome</label><br>
        <input type="text" name="nome" value="<?php echo $dados['nome']; ?>"><br><br>
        <label for="datanasc">Data de Nascimento</label><br>
        <input type="date" name="datanasc" value="<?php echo $dados['dataNascimento']; ?>"><br><br>
        <label for="rg">RG</label><br>
        <input type="text" name="rg" value="<?php echo $dados['rg']; ?>"><br><br>
        <label for="cpf">Cpf</label><br>
        <input type="text" name="cpf" value="<?php echo $dados['cpf']; ?>"><br><br>
        <label for="telefone">Telefone</label><br>
        <input type="text" name="telefone" value="<?php echo $dados['telefone']; ?>"><br><br>
        <label for="email">Email</label><br>
        <input type="email" name="email" value="<?php echo $dados['email_funcionario']; ?>"><br><br>
        <label for="salario">Salário</label><br>
        <input type="text" name="salario" value="<?php echo $dados['salario']; ?>"><br><br>
        <button type="submit" name="btn-atualizar">Atualizar</button>
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