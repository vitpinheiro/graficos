<?php

// $arr =array[1,2,3,4];
// echo $arr[0];
// echo $arr[1];
// echo $arr[2];
// echo $arr[3];
// echo "<br>";
// $array =array["zero", "um", "dois", "tres",];
// echo $array[0];
// $arraycompl= array_merge($arr, $array);
// echo "<br>";
// print_r($arraycompl);

//definindo os arrays
// $nomeconvenio = array("Unimed", "Humana", "Hapvida");
// $quant = array(5, 6, 7);



// array_push($nomeconvenio, "Amil");
// array_push($quant, 8);

// foreach ($quant as &$valor){
//     $valor = $valor * 2 ;
// }


// // Verificando se os arrays têm o mesmo comprimento
// if(count($nomeconvenio) == count($quant)){
//     $arraycompl=array();
// // Combinação dos arrays
//     for($i=0; $i < count($nomeconvenio); $i++){
//         $arraycompl[] = array($nomeconvenio[$i], $quant[$i]);
// }
// print_r($arraycompl);
// print_r($nomeconvenio);
// // Exibindo o array resultante
// print_r($arraycompl);
// }else{
//     echo "Os arrays não tem o mesmo comprimento";
// }

// Exibindo o array resultante em uma tabela HTML
    // echo "<table border='1'>";
    // echo "<tr><th>Convênio</th><th>Quant</th></tr>";
    // foreach ($arraycompl as $item) {
    //     echo "<tr><td>{$item[0]}</td><td>{$item[1]}</td></tr>";
    // }
    // echo "</table>";

namespace teste;

include_once("pegarregistro.php");

$puxardados = new PuxarDados();
$mostrarbanco = $puxardados->pegarregistro();
// Extraia as informações do banco de dados para uso no gráfico
$labels = array_column($mostrarbanco, 'plano_saude');
$datajan = array_column($mostrarbanco, 'quantidade_jan');
$datafev = array_column($mostrarbanco, 'quantidade_fev');
$datamar = array_column($mostrarbanco, 'quantidade_mar');
// $data = array_column($mostrarbanco, 'plano_saude');
// Converta os dados para JSON para uso no JavaScript
$labels_json = json_encode($labels);
$datajan_json = json_encode($datajan);
$datafev_json = json_encode($datafev);
$datamar_json = json_encode($datamar);
// $data_json = json_encode($data);
// echo ($mostrarbanco);

// // Juntando os arrays
// $arrayjunto = array_merge($nomeconvenio, $quant);
// $nova_linha = [3, 5, 4, 6, 8, 9, 10, 12];
// $nova_barra = [3, 5, 4, 6, 8, 9, 10, 12];
// $nova_barra2 = [4, 6, 5, 7, 9, 11, 13,14];
// $nova_linha2 = [6, 8, 6, 8, 9, 12, 14,15];
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


<style>
h4{
  color: grey ;
  font-family: Arial, Helvetica, sans-serif;
}
  
h5{
  text-align: right;
  color: grey;
}

h1{
  text-align: center;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
</style>


</head>
<body>

<h1>GRÁFICOS</h1>

<div>
  <div class="container">
    <div class="row">
  
    <h4>Gráfico de barras </h4>
    <div class="col-sm-12 col-md-6 ">
        <canvas id="myChart" width="400" height="440" ></canvas>
    </div>
   
   
  
    <div  class="col-sm-12  col-md-6 ">
      <canvas id="myChart2" width="400" height="380"></canvas>
      </div>
    <h5>Gráfico de pizza</h5>
    
    <h4>Gráfico de linhas</h4>
    <div class="col-sm-12  col-md-6  ">
      <canvas id="myChart3" width="400" height="400"></canvas>
    </div>
 
 
</div>
  </div>
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
        label: 'quant janeiro',
        data: <?php echo $datajan_json;?>,
        borderWidth: 1
      },
      {
        label: 'quant fevereiro ',
        data: <?php echo $datafev_json;?>,
        borderWidth: 1
      
      },
      {
        label: 'quant março ',
        data: <?php echo $datamar_json;?>,
        borderWidth: 1
      
      }
    
    
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
  
  //Gráfico de pizza
  const ctx2 = document.getElementById('myChart2');
  new Chart(ctx2, {
    type: 'pie',
    data: {
      labels: <?php echo $labels_json;?>,
      datasets: [{
        label: 'quant janeiro',
        data: <?php echo $datajan_json;?>,
        borderWidth: 1
      },
      {
        label: 'quant fevereiro ',
        data: <?php echo $datafev_json;?>,
        borderWidth: 1
      
      },
      {
        label: 'quant março ',
        data: <?php echo $datamar_json;?>,
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

  //Gráfico de linha
  // const nova_linha_data = php echo json_encode($nova_linha); ?>;
  // const nova_linha2_data = php echo json_encode($nova_linha2); ?>;

  const ctx3 = document.getElementById('myChart3');
  new Chart(ctx3, {
    type: 'line',
    data: {
      labels: <?php echo $labels_json;?>,
      datasets: [
        {
        label: ' quant janeiro',
        data: <?php echo $datajan_json;?>,
        borderWidth: 1
     
      },
      {
        label: ' quant fevereiro',
        data: <?php echo $datafev_json;?>,
        borderWidth: 1
     
      },
      {
        label: ' quant março',
        data:  <?php echo $datamar_json;?>,
        borderWidth: 1
     
      }
    
    
    
    
    
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