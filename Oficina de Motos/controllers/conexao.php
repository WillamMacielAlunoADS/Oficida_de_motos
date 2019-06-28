<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "oficina2";

try {
	  //instancia objeto PDO, conectando no MySQL
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // apresenta o erro PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexao realizada com sucesso!";
}catch(PDOException $e){
    echo "Conexao falhou: " . $e->getMessage();
}
