<?php
$servico = $_POST;

require_once 'ServicoDAO.php';
require_once 'conexao.php';

$ss = new ServicoDAO();

$ss -> inserir_servico($conn, $servico);
?>
