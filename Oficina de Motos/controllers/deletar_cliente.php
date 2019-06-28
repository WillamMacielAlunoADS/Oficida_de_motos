<?php
$id = $_GET['id'];

require_once 'conexao.php';
require_once 'ClienteDAO.php';

$cd = new ClienteDAO();

$cd -> deletar_cliente($conn, $id);

 ?>
