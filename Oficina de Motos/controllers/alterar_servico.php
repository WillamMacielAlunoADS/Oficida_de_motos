<?php
$id = $_POST['id'];
$idmoto = $_POST['idMoto'];
$idcliente = $_POST['idCliente'];
$descricao = $_POST['descricao'];
$idpeca = $_POST['idPeca'];
$valor = $_POST['valor'];

require_once 'conexao.php';
require_once 'ServicoDAO.php';
require_once 'Servico.php';


$servico = new ServicoDAO();
$st = new Servico();

$st -> setDescricao($descricao);
$st -> setValor($valor);

$servico -> alterar_servico($conn, $id, $idmoto, $idcliente, $st->getDescricao(), $idpeca, $st->getValor());
?>
