<?php

    require_once 'conexao.php';
    require_once 'Cliente.php';
    require_once 'ClienteDAO.php';

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];

    require_once 'conexao.php';
    require_once 'Cliente.php';
    require_once 'ClienteDAO.php';


    $cliente = new Cliente();
    $cs = new ClienteDAO();

    $cliente -> setNome($nome);
    $cliente-> setCpf($cpf);
    $cliente-> setTelefone($telefone);
    $cliente-> setEmail($email);
    $cliente-> setEndereco($endereco);

    $cs -> inserir_cliente($conn, $cliente->getNome(), $cliente->getCpf(), $cliente->getTelefone(), $cliente->getEmail(), $cliente->getEndereco());


?>
