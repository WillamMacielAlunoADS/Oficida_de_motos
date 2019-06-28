<?php
  $id = $_POST['id'];
	$nome_usuario = $_POST['nome_usuario'];
  $senha = $_POST['senha'];
  $nome = $_POST['nome'];

	require_once 'conexao.php';
	require_once 'UsuarioDAO.php';
	require_once 'Usuario.php';

	$usuario = new UsuarioDAO();
	$ut = new Usuario();

	$ut -> setNomeUsuario($nome_usuario);
  $ut -> setSenha($senha);
  $ut -> setNome($nome);
	$usuario -> alterar_usuario($conn, $id, $ut->getNomeUsuario(), $ut->getSenha(), $ut->getNome());
 ?>
