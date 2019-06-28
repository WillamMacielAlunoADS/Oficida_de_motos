<?php
$id = $_GET['id'];

require_once 'conexao.php';
require_once 'ServicoDAO.php';

$sd = new ServicoDAO();

$sd -> deletar_servico($conn, $id);
?>
