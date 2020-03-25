<?php
    require_once 'conexaoDB.php';

    if(isset($_GET['idFuncionario'])){
        $idFuncionario = mysqli_escape_string($conexao, $_GET['idFuncionario']);
        $sql = "DELETE FROM tb_funcionario WHERE idFuncionario = '$idFuncionario'";

        if(mysqli_query($conexao, $sql)){
            echo "<script language='javascript' type='text/javascript'> alert('Funcionário deletado com sucesso!'); window.location = '../perfis/perfilproprietario.php'</script>";
        }
        else {
            echo "<script language='javascript' type='text/javascript'> alert('Erro ao deletar, tente novamente...'); window.location = '../perfis/perfilproprietario.php'</script>";
        }
    }

?>