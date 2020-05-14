<?php
session_start();
require_once 'conexaoDB.php';

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = mysqli_query($conexao, "SELECT valor, situacao FROM tb_agendamento WHERE idAgendamento = '$id'");
  $dados = mysqli_fetch_array($sql);
  $valor = $dados['valor'];

  $insertLucro = "INSERT INTO tb_lucros (valor) VALUES ('$valor')";
  $upSituacao = "UPDATE `tb_agendamento` SET `situacao` = '1' WHERE `tb_agendamento`.`idAgendamento` = '$id';";

  if($dados['situacao'] == 0){

    if(mysqli_query($conexao, $insertLucro)){

      mysqli_query($conexao, $upSituacao);

      if($_SESSION['proprietario']){
        header ('location: ../perfis/perfilproprietario.php');
      }
      else{
       echo "<script language='javascript' type='text/javascript'> alert('Erro de sessão, tente novamente mais tarde!');window.location = '../perfis/perfilproprietario.php'</script>";
      }
    }
   else{
    echo "<script language='javascript' type='text/javascript'> alert('Erro, não foi possível realizar está ação!');window.location = '../perfis/perfilproprietario.php'</script>";
  }
}
  else if($dados['situacao'] == 1){
    echo "<script language='javascript' type='text/javascript'> alert('Agendamento ja concluído, por favor verifique atentamente os agendamentos...');window.location = '../perfis/perfilproprietario.php'</script>"; 
  }
  else{
    echo "<script language='javascript' type='text/javascript'> alert('Erro inesperado!')";
    header("location: ../perfis/perfilproprietario.php");
  }
}

