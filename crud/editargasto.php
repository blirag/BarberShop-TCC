<?php
session_start();
require_once '../crud/conexaoDB.php';

if(isset($_GET['id'])){
    $idGastosFixos = mysqli_escape_string($conexao, $_GET['id']);
    $sql = "SELECT * FROM tb_gastosfixos WHERE idGastosFixos = '$idGastosFixos'";
    $result = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($result);

    $sqlp = mysqli_query($conexao, "SELECT nome FROM tb_proprietario");
    $proprietario = mysqli_fetch_array($sqlp);
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Gasto Fixo</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4da5630a36.js" crossorigin="anonymous"></script>
    <script 
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/editarconta.css">
</head>
<body>
    <header>
        <p class="name"><?php echo $proprietario[0]; ?></p>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../perfis/perfilproprietario.php">Voltar</a></li>
                <li><a href="../crud/logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <form method="POST" action="../crud/update-gastofixo.php">
            <h1>Editar Gasto Fixo</h1>
            <hr><br>
            <input type="hidden" name="id" value="<?php echo $dados['idGastosFixos'];?>">

            <label for="tipo">Tipo</label><br>
            <input type="text" name="tipo" value="<?php echo $dados['tipo'] ?>"><br><br>

            <label for="valor">Valor</label><br>
            <input type="text" name="valor" value="<?php echo $dados['valor'] ?>"> <br><br>
            <button type="submit" name="btn-atualizar">Atualizar</button>
        </form>
    </section>

    <footer>    
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