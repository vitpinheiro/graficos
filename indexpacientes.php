<?php

namespace teste;

include_once("pegarregistro.php");

$puxardados = new PuxarDados;
$mostrarmulheres = $puxardados->pegarmulheres();


$labels = array_column($mostrarmulheres, 'genero');

// $data = array_column($mostrarbanco, 'plano_saude');
// Converta os dados para JSON para uso no JavaScript
$labels_json = json_encode($labels);
// $datajan_json = json_encode($datajan);

?>
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>




</head>
<body>


<div>
  <div class="container">
    <div class="row">
  
    <h4>Gráfico de barras </h4>
    <div class="col-sm-12 col-md-6 ">
        <canvas id="myChart" width="400" height="440" ></canvas>
    </div>
   
   


<script src="chart.js"></script>

<script>
  //Gráfico de barras
  // const nova_barra_data = php echo json_encode($nova_barra); ?>;
  // const nova_barra2_data = php echo json_encode($nova_barra2); ?>;
  const ctx = document.getElementById('myChart');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo $labels_json;?>,
      datasets: [{
        label: 'Mulheres',
        data: <?php echo $datajan_json;?>,
        borderWidth: 1
      },
    
    ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

</script>



</body>
</html>