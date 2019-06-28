<?php
$pagamento = $_GET;

require_once 'conexao.php';
require_once 'PagamentoDAO.php';
require_once 'ServicoDAO.php';
$sb = new ServicoDAO();
$sb_id = $sb->buscar_servico_id($conn, $pagamento['id']);
$valor = $sb_id->fetch(PDO::FETCH_OBJ);

$p = new PagamentoDAO();
$pagamento = $valor;
$p -> inserir_pagamento($conn, $pagamento);
?>
