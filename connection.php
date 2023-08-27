<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "shanti";
    $port = 3306;


try{
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname,$user,$pass);
    // echo "Conexão com banco de Dados realizado com sucesso!";
} catch (Exception $ex) {
    // echo "Erro: Falha de Conexão";
    die("Erro: Tente novamente. Caso persista, entre em contato com o administrador<br>");
}

?>