<?php
$nome = $_POST['nome'];
$estoque = $_POST['estoque'];
$preco = $_POST['preco'];

require_once 'conexao.php';
require_once 'Peca.php';
require_once 'PecaDAO.php';


$peca = new Peca();
$ps = new PecaDAO();

$peca -> setNome($nome);
$peca -> setPreco($preco);

$ps -> inserir_peca($conn, $peca->getNome(), $estoque, $peca->getPreco());
?>
