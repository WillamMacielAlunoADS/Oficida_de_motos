<?php
$id = $_GET['id'];

require_once 'conexao.php';
require_once 'PecaDAO.php';

$pd = new PecaDAO();

$pd -> deletar_peca($conn, $id);
?>
