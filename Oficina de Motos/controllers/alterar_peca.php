<?php
  $id = $_POST['id'];
	$nome = $_POST['nome'];
  $estoque = $_POST['estoque'];
  $preco = $_POST['preco'];

	require_once 'conexao.php';
	require_once 'PecaDAO.php';
	require_once 'Peca.php';


	$peca = new PecaDAO();
	$pt = new Peca();

	$pt -> setNome($nome);
  $pt -> setPreco($preco);

	$peca -> alterar_peca($conn, $id, $pt->getNome(), $estoque, $pt->getPreco());
 ?>
