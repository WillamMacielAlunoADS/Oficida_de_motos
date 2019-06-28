<?php
$id = $_POST['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];

require_once 'conexao.php';
require_once 'ClienteDAO.php';
require_once 'Cliente.php';


$cliente = new ClienteDAO();
$ct = new Cliente();

$ct -> setNome($nome);
$ct -> setCpf($cpf);
$ct -> setTelefone($telefone);
$ct -> setEmail($email);
$ct -> setEndereco($endereco);

$cliente -> alterar_cliente($conn, $id, $ct->getNome(), $ct->getCpf(), $ct->getTelefone(), $ct->getEmail(), $ct->getEndereco());
?>
