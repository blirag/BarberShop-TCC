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
    <title>Minhas Finanças</title>
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
                <li><a href="../perfis/perfilproprietario.php">Voltar</a></li>
                <li><a href="../crud/logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h3>Finanças</h3>
        <hr><br>
        <?php 
            date_default_timezone_set('America/Sao_Paulo');
            $mes = idate('m');
            $sql = mysqli_query($conexao, "SELECT lucrototal FROM tb_financas WHERE mes = '$mes'");
            $result = mysqli_fetch_array($sql);

            if($result['lucrototal'] < 0){
        ?>
            <h4>NÃO HÁ GRÁFICO DESSE MÊS, POIS, SEU SALDO FOI NEGATIVO: <?php echo $result['lucrototal']; ?></h4>
        <?php
            }
            else{
                require_once 'grafico.php';
            }
        ?>
        <a href="../crud/create-financas.php" name="btn-financas">Atualizar Finanças</a>
        <a href="historico.php" name="btn-historico">Histórico Finanças</a>
    </section>

    <section>
    <h3>Lucros</h3>
    <hr><br>
    <table>
        <thead>
            <tr>
                <th>Lucro com Serviços</th>
                <th>Lucro Total</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = mysqli_query($conexao, "SELECT SUM(valor) FROM tb_agendamento");
            $lucroservico = mysqli_fetch_array($sql);

            date_default_timezone_set('America/Sao_Paulo');
            $mes = idate('m');
            $sql = mysqli_query($conexao, "SELECT lucrototal FROM tb_financas WHERE mes = '$mes'");
            $lucrototal = mysqli_fetch_array($sql);
        ?>
            <tr>
                <td>R$ <?php echo $lucroservico[0];?></td>
                <td>R$ <?php echo $lucrototal[0];?></td>
            </tr>
        </tbody>
    </table>
    </section>

    <section>
        <h3>Total em Gastos</h3>
        <hr><br>
        <table>
        <thead>
            <tr>
                <th>Variáveis</th>
                <th>Fixos</th>
                <th>Salários</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = mysqli_query($conexao, "SELECT SUM(salario) FROM tb_funcionario");
            $salarios = mysqli_fetch_array($sql);

            $sql = mysqli_query($conexao, "SELECT SUM(valor) FROM tb_gastosfixos");
            $gastosfixos = mysqli_fetch_array($sql);

            $sql = mysqli_query($conexao, "SELECT SUM(valor) FROM tb_gastosvariaveis");
            $gastosvar = mysqli_fetch_array($sql);

            $total = $salarios[0] + $gastosfixos[0] + $gastosvar[0];
        ?>
            <tr>
                <td>R$ <?php echo $gastosvar[0]; ?></td>
                <td>R$ <?php echo $gastosfixos[0]; ?></td>
                <td>R$ <?php echo $salarios[0]; ?></td>
                <td>R$ <?php echo $total; ?></td>
            </tr>
        </tbody>
        </table>
    </section>

    <section class="gastos">
        <h3>Gastos fixos</h3>
        <hr><br>
        <form action="">
            <table>
                <thead>
                    <tr>
                    <th><label for="tipo">Tipo</label></th>
                    <th><label for="valor">Valor</label></th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = mysqli_query($conexao, "SELECT * FROM tb_gastosfixos");

                        if(mysqli_num_rows($sql) > 0){
                            while($dados = mysqli_fetch_array($sql)){
                    ?>
                    <tr>
                        <td><input type="text" name="tipo" value="<?php echo $dados['tipo']; ?>"></td>
                        <td><input type="text" name="valor" value="R$ <?php echo $dados['valor']; ?>"></td>
                        <td><a href="../crud/editargasto.php?id=<?php echo $dados['idGastosFixos'];?>"><i class="fas fa-edit"></i></a></td>
                    </tr>
                    <?php
                       }
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </section>

    <?php

    ?>
    
    <section>
        <h3>Gastos variáveis</h3>
        <hr><br>
        <form action="">
            <table>
                <thead>
                    <tr>
                        <th><label for="tipo">Tipo</label></th>
                        <th><label for="valor">Valor</label></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = mysqli_query($conexao, "SELECT * FROM tb_gastosvariaveis");

                        if(mysqli_num_rows($sql) > 0){
                            while($dados = mysqli_fetch_array($sql)){
                    ?>
                    <tr>
                        <td><input type="text" name="tipo" value="<?php echo $dados['tipo']; ?>" readonly></td>
                        <td><input type="text" name="valor" value="R$ <?php echo $dados['valor']; ?>" readonly></td>
                        <td><a href="../crud/delete-gasto.php?id=<?php echo $dados['idGastosVariaveis'];?>"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    <?php
                        }
                    } 
                    ?>
                </tbody>
            </table>
        </form>
    </section>

    <section class="adicionargasto">
        <h3>Adicionar gasto</h3>
        <hr><br>
        <form action="../crud/adicionargasto.php" method="POST">
            <label for="tipo">Tipo de gasto</label><br>
            <input type="text" name="tipo" placeholder="ex: produto, equipamento, etc"><br><br>
            <label for="valor">Valor</label><br>
            <input type="text" name="valor" placeholder="R$"><br><br>
            <button name="btn-adicionar">Adicionar</button>
        </form>
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