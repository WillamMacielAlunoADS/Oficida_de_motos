<?php
 $id = $_POST['id'];
 $nome = $_POST['nome'];
 $montadora = $_POST['montadora'];
 $placa = $_POST['placa'];
 $ano = $_POST['ano'];
 $idcliente = $_POST['idCliente'];

 require_once 'conexao.php';
 require_once 'MotoDAO.php';
 require_once 'Moto.php';


 $moto = new MotoDAO();
 $mt = new Moto();

 $mt -> setNome($nome);
 $mt -> setMontadora($montadora);
 $mt -> setPlaca($placa);
 $mt -> setAno($ano);

 $moto -> alterar_moto($conn, $id, $mt->getNome(), $mt->getMontadora(), $mt->getPlaca(), $mt->getAno(), $idcliente);
 ?>
