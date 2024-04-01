<?php 
namespace teste;

$puxardados = new PuxarDados();

class PuxarDados {

function pegarregistro() {

try {

    //ARRUMAR UM JEITO DE DIMINUIR ISSO
    $dbhost = 'localhost';
        $dbname = 'registros';
        $dbuser = 'root';
    $dbpass = '';

    // Conexão com o banco de dados usando PDO
    $pdo = new \PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    //SELECT * FROM registros selecionando todas as colunas necessárias
    // $sql_planos = "SELECT plano_saude FROM registros_hospital";
    // $sql_quantidade_jan = "SELECT quantidade_jan FROM registros_hospital";
    // $sql_quantidade_fev = "SELECT quantidade_fev FROM registros_hospital";
    // $sql_quantidade_mar = "SELECT quantidade_mar FROM registros_hospital";
    $sql= "SELECT plano_saude, quantidade_jan, quantidade_fev, quantidade_mar FROM registros_hospital ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // $stmt_quantidade_jan = $pdo->prepare($sql_quantidade_jan);
    // $stmt_quantidade_jan ->execute();

    // $stmt_quantidade_fev = $pdo->prepare($sql_quantidade_fev);
    // $stmt_quantidade_fev ->execute();

    // $stmt_quantidade_mar = $pdo->prepare($sql_quantidade_mar);
    // $stmt_quantidade_mar ->execute();


    // print_r($sql);
    // Retorna os resultados como um array associativo
    $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    // print_r($resultados[0]["plano_saude"]);

    
    // $temp= [];
    // for( $i=0; $i > count($resultados); $i++){
    //     $temp.array_push($resultados[$i]["plano_saude"]);
    //     print_r($resultados[$i]["plano_saude"]);
    // }

    $temp = [];
    for ($i = 0; $i < count($resultados); $i++) {
         $temp[] = $resultados[$i]["plano_saude"];
       }
        //  print_r($temp);

    return $resultados;
} catch (\PDOException $e) {
    throw $e;
}
}
}

?>
