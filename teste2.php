<?php
//definindo os arrays
$nomeconvenio = array("Unimed", "Humana", "Hapvida");
$quant = array(5, 6, 7);



array_push($nomeconvenio, "Amil");
array_push($quant, 8);

foreach ($quant as &$valor){
    $valor = $valor * 2 ;
}


// Verificando se os arrays têm o mesmo comprimento
if(count($nomeconvenio) == count($quant)){
    $arraycompl=array();
// Combinação dos arrays
    for($i=0; $i < count($nomeconvenio); $i++){
        $arraycompl[] = array($nomeconvenio[$i], $quant[$i]);
}

//  Exibindo o array resultante
 print_r($arraycompl);
}else{
    echo "Os arrays não tem o mesmo comprimento";
 }

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

?>