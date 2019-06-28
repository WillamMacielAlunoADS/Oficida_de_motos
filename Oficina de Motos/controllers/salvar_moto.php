<?php
$moto = $_POST;

require_once 'MotoDAO.php';
require_once 'conexao.php';

$ms = new MotoDAO();

$ms -> inserir_moto($conn, $moto);
 ?>
