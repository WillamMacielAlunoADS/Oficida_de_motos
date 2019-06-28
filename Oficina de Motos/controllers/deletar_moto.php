<?php
$id = $_GET['id'];

require_once 'conexao.php';
require_once 'MotoDAO.php';

$md = new MotoDAO();

$md -> deletar_moto($conn, $id);
 ?>
