<?php
  require_once '../crud/conexaoDB.php';

  $querysalarios = mysqli_query($conexao, "SELECT SUM(salario) FROM tb_funcionario");

  $querygastosfixos = mysqli_query($conexao, "SELECT SUM(valor) FROM tb_gastosfixos");
          
  $querygastosvar = mysqli_query($conexao, "SELECT SUM(valor) FROM tb_gastosvariaveis");
         
  $querylucro = mysqli_query($conexao, "SELECT SUM(valor) FROM tb_lucros");       
  
  $dadoS = mysqli_fetch_array($querysalarios);
  $dadoGF = mysqli_fetch_array($querygastosfixos); 
  $dadoGV = mysqli_fetch_array($querygastosvar);
  $dadoL = mysqli_fetch_array($querylucro);

    $salarios = $dadoS[0];
    $gastosfixos = $dadoGF[0];
    $gastosvar = $dadoGV[0];
    $lucro = $dadoL[0];
    
    $totalgastos = $salarios + $gastosfixos + $gastosvar;
    $totallucro = $lucro - $totalgastos;

    date_default_timezone_set('America/Sao_Paulo');
    $mes = idate('m');
    
    $delete = "DELETE FROM tb_financas WHERE mes = '$mes'";
    
    if(mysqli_query($conexao, $delete)){
      $insert = "INSERT INTO tb_financas (salarios, gastosfixos, gastosvariaveis, lucroservicos, lucrototal, mes) VALUES ('$salarios', '$gastosfixos', '$gastosvar', '$lucro', '$totallucro', '$mes')";

      if(mysqli_query($conexao, $insert)){
        echo "<script language='javascript' type='text/javascript'> alert('Finanças atualizadas!'); window.location = '../financas/painelfinancas.php';</script>";
      }
      else{
        echo "<script language='javascript' type='text/javascript'> alert('Erro ao atualizar, tente novamente...'); window.location = '../financas/painelfinancas.php';</script>";
      }
    }   
?>