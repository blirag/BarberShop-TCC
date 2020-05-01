<html>
  <head>
    <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>       
    <script type = "text/javascript">    
      google.charts.load ("current", {packages: ["corechart"]});
      google.charts.setOnLoadCallback (drawChart);

      function drawChart () {
        <?php
            require_once '../crud/conexaoDB.php';

            date_default_timezone_set('America/Sao_Paulo');
            $mes_atual = idate('m'); 

            $sql = mysqli_query($conexao, "SELECT * FROM tb_financas WHERE mes = '$mes_atual'");
          
            while($dados = mysqli_fetch_array($sql)){
                $salarios = $dados['salarios'];
                $gastosfixos = $dados['gastosfixos'];
                $gastosvar = $dados['gastosvariaveis'];
                $lucro = $dados['lucroservicos'];
                $lucrototal = $dados['lucrototal'];   
        ?>
        var data = google.visualization.arrayToDataTable ([
          ['Tipo', 'Valor'],
          ['Total de Salários', <?php echo $salarios;?>],
          ['Total de Gastos Fixos', <?php echo $gastosfixos;?>],
          ['Total de Gastos Variáveis', <?php echo $gastosvar;?>],
          ['Total de Lucros de Serviços', <?php echo $lucro;?>],
          ['Lucro Total', <?php echo $lucrototal;?>]
          
          <?php } ?>
        ]);

        var options = {
          title: 'Porcentagens Totais de Lucros e Gastos'
        };

        var chart = new google.visualization.PieChart (document.getElementById ('piechart'));
        chart.draw (data, options);
      }
    </script>
  </head>
  <body>
    <div id = "piechart" style = " width : 900px ; height : 500px ; " > </div>          
  </body>
</html>