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
                <li><a href="#funcionario">Funcionários</a></li>
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
                <tr>
                    <td><i class="fas fa-spinner"></i></td>
                    <td>Barba completa</td>
                    <td>14/03/2020</td>
                    <td>10:30</td>
                    <td><i class="fas fa-trash"></i></td>
                </tr>
                <tr>
                    <td><i class="fas fa-spinner"></i></td>
                    <td>Barba completa</td>
                    <td>14/03/2020</td>
                    <td>10:30</td>
                    <td><i class="fas fa-trash"></i></td>
                </tr>
                <tr>
                    <td><i class="fas fa-spinner"></i></td>
                    <td>Barba completa</td>
                    <td>14/03/2020</td>
                    <td>10:30</td>
                </tr>
                <tr>
                    <td><i class="fas fa-spinner"></i></td>
                    <td>Barba completa</td>
                    <td>14/03/2020</td>
                    <td>10:30</td>
                </tr>
                <tr>
                    <td><i class="fas fa-spinner"></i></td>
                    <td>Barba completa</td>
                    <td>14/03/2020</td>
                    <td>10:30</td>
                </tr>
                <tr>
                    <td><i class="fas fa-spinner"></i></td>
                    <td>Barba completa</td>
                    <td>14/03/2020</td>
                    <td>10:30</td>
                </tr>
                <tr>
                    <td><i class="fas fa-spinner"></i></td>
                    <td>Barba completa</td>
                    <td>14/03/2020</td>
                    <td>10:30</td>
                </tr>
                <tr>
                    <td><i class="fas fa-check-circle"></i></td>
                    <td>Barba completa</td>
                    <td>14/03/2020</td>
                    <td>10:30</td>
                </tr>
            </tbody>
        </table>
        <a href="../servicos-agendamento/agendamento.php">Novo agendamento</a>
    </section>

    <section>
        <h3 id="funcionario">Lista de Funcionários</h3>
        <hr><br>
        <table>
            <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Email</th>
                <th>Salário</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tb_funcionario";
                $result = mysqli_query($conexao, $sql);

                if(mysqli_num_rows($result) > 0){
                    while($dados = mysqli_fetch_array($result)){
                ?>

                <tr>
                    <td><a href="../crud/editarfuncionario.php?idFuncionario=<?php echo $dados['idFuncionario'] ?>" id="icon"><i class="fas fa-edit"></i></a></td>
                    <td><?php echo $dados['nome']; ?></td>
                    <td><?php echo $dados['email_funcionario'] ?></td>
                    <td><?php echo $dados['salario']; ?></td>
                    <td><a href="../crud/delete-funcionario.php?idFuncionario=<?php echo $dados['idFuncionario'] ?>" id="icon"><i class="fas fa-trash"></i></td>

                    
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
                    <?php    }
                    ?>
            </tbody>
        </table>
        <a href="../cadastro-login/cadastro-funcionario.html">Novo Funcionário</a>
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