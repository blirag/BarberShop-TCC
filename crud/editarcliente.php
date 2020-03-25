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
        <p class="name">Beatriz Lira</p>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../crud/editarconta.php">Editar conta</a></li>
                <li><a href="../crud/logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <form method="POST" action="../crud/update-cliente.php">
            <h1>Editar Dados</h1>
            <hr><br>
            <label for="nome">Nome</label><br>
            <input type="text" placeholder=" Primeiro e segundo nome"><br><br>
            <label for="telefone">Telefone</label><br>
            <input type="text" placeholder=" (00) 00000-0000"><br><br>
            <label for="email">Email</label><br>
            <input type="email" placeholder=" seuemail@exemplo.com"><br><br>
            <label for="senha">Senha</label><br>
            <input type="password" placeholder=" ********"><br><br>
            <button type="submit">Atualizar</button>
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