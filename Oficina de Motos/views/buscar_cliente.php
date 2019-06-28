<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title></title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Pagina Inicial</title>
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/function.js"></script>
  </head>
  <body>
    <div style="background:#E0EEEE; font-size:22px; text-align:center; color:#363636; font-weight:bold; height:100px; padding-top:10px;">
    <h1 class="display-4">Oficína de Motos</h1>
    </div>

  <div id="wrap">
    <header>
      <div class="inner relative">
        <a class="logo" href="_index.htm"><img  src="images/moto.png" width="200" height="100" alt="fresh design web"></a>
        <a id="menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
        <nav id="navigation">
          <ul id="main-menu">
            <li class="current-menu-item"><a href="_index.htm">Home</a></li>
            <li class="parent">
              <a>Cadastros</a>
              <ul class="sub-menu">
                <li><a href="form_cliente.php"><i class="icon-user"></i> Cliente</a></li>
                <li><a href="form_moto.php"><i class="fas fa-motorcycle"></i> Moto</a></li>
                <li><a href="form_servico.php"><i class="icon-wrench"></i> Orden de Serviço</a></li>
                <li><a href="form_peca.php"><i class="fas fa-cog"></i> Peça</a></li>
              </ul>
            </li>
            <li class="parent">
              <a>Listas</a>
              <ul class="sub-menu">
                <li><a href="listar_cliente.php"><i class="icon-user"></i> Clientes</a></li>
                <li><a href="listar_moto.php"><i class="fas fa-motorcycle"></i> Motos</a></li>
                <li><a href="listar_servico.php"><i class="icon-wrench"></i> Ordens de Serviços</a></li>
                <li><a href="listar_peca.php"><i class="fas fa-cog"></i> Peças</a></li>
              </ul>
            </li>
            <li><a href="listar_pagamento.php">Lucro</a></li>
            <li class="parent">
              <a>ADM</a>
              <ul class="sub-menu">
                 <li><a href="listar_usuario.php">Gerencia</a></li>
              </ul>
            </li>
          </ul>
        </nav>
        <div class="clear"></div>
      </div>
    </header>
  </div>
  <br>
  <div class="container">
    <h3>Pesquisar Cliente</h3>
 <form class="form-inline" action="buscar_cliente.php" method="post">
  <div class="form-group">
    <input type="text" class="form-control" name="cliente" required>
    <input class="btn btn-primary" type="submit" value="Pesquisar">
  </div>
 </form>
</div>
<br>
    <?php

    include_once '../controllers/conexao.php';
  	include_once '../controllers/ClienteDAO.php';

    $cliente_b = $_POST;
    $cliente = new ClienteDAO();

    $resultado = $cliente-> buscar_cliente_indice($conn, $cliente_b);
    echo '
     <div class="container">
     <h3>Clientes</h3><br>
			<table class="table table">
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Nome</th>
          <th scope="col">CPF</th>
          <th scope="col">Telefone</th>
          <th scope="col">E-mail</th>
          <th scope="col">Endereço</th>
					<th scope="col">Alterar</th>
					<th scope="col">Deletar</th>
				</tr>
        </div>';
  if($resultado) {
    while($reseber = $resultado->fetch(PDO::FETCH_OBJ)) {
      echo '<tr>';
      echo 	'<td>'.$reseber -> idcliente .'</td>'.
          '<td>'.$reseber -> nome .'</td>'.
          '<td>'.$reseber -> cpf .'</td>'.
          '<td>'.$reseber -> telefone .'</td>'.
          '<td>'.$reseber -> email .'</td>'.
          '<td>'. $reseber -> endereco .'</td>
          <td> <a class="btn btn-primary" href="form_alterar_cliente.php?id='.
           $reseber -> idcliente.'" role="Controler/button">Alterar</a>'.'</td>
          <td><a class="btn btn-danger" href="../controllers/deletar_cliente.php?id='.
           $reseber -> idcliente.'" role="button">Deletar</a></td>';
    echo '</tr>';
    }
   }
      $conn = null;
			echo "</table>";
     ?>
  </body>
</html>
