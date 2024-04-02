<?php 
namespace teste;

$puxardados = new PuxarDados();
class PuxarDados {
    private $pdo;
    public function __construct(){
        //ARRUMAR UM JEITO DE DIMINUIR ISSO
        $dbhost = 'localhost';
        $dbname = 'registros';
        $dbuser = 'root';
        $dbpass = '';

        // Conexão com o banco de dados usando PDO
        $this->pdo = new \PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    }


function pegarregistro() {

try {

    //SELECT * FROM registros selecionando todas as colunas necessárias
    // $sql_planos = "SELECT plano_saude FROM registros_hospital";
    $sql= "SELECT plano_saude, quantidade_jan, quantidade_fev, quantidade_mar FROM registros_hospital ";
    $stmt = $this->pdo->prepare($sql);
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

public function pegarmulheres (){

    try{
        $sql = "SELECT genero FROM pacientes WHERE genero = 'Feminino'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $resultados;
    } catch (\PDOException $e) {
        // Lidar com exceções aqui
        throw $e;
}

}

}
// <?php
// namespace teste;

// $puxardados = new PuxarDados();

// class PuxarDados {
//     private $pdo;

//     public function __construct() {
//         //ARRUMAR UM JEITO DE DIMINUIR ISSO
//         $dbhost = 'localhost';
//         $dbname = 'registros';
//         $dbuser = 'root';
//         $dbpass = '';

//         // Conexão com o banco de dados usando PDO
//         $this->pdo = new \PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
//         $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
//     }

//     public function pegarregistro() {
//         try {
//             $sql= "SELECT plano_saude, quantidade_jan, quantidade_fev, quantidade_mar FROM registros_hospital ";
//             $stmt = $this->pdo->prepare($sql);
//             $stmt->execute();
//             $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
//             return $resultados;
//         } catch (\PDOException $e) {
//             throw $e;
//         }
//     }

//     public function pegarGenero() {
//         try {
//             $sql = "SELECT genero, COUNT(*) AS quantidade FROM pacientes GROUP BY genero";
//             $stmt = $this->pdo->prepare($sql);
//             $stmt->execute();
//             $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
//             return $resultados;
//         } catch (\PDOException $e) {
//             throw $e;
//         }
//     }

//     public function pegarestado() {
//         try {
//             $sql = "SELECT estado, COUNT(*) AS quantidade FROM pacientes GROUP BY estado";
//             $stmt = $this->pdo->prepare($sql);
//             $stmt->execute();
//             $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
//             return $resultados;
//         } catch (\PDOException $e) {
//             throw $e;
//         }
//     }
// }
