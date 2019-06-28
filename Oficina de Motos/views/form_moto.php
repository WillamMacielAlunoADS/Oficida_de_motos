<!DOCTYPE html>
<html>
	<head>
		<title>Fomulário Moto</title>
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
	<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)

  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
}
</script>
    <div class="container">
<div class="form-group">
      <h3>Cadastro de Veiculo</h3>
  		<form method="POST" action="../controllers/salvar_moto.php">
  			<label>Nome</label><br>
  			<input type="text" name="nome" class="form-control" required><br>
        <label>Montadora</label><br>
  			<input type="text" name="montadora" class="form-control" required><br>
        <label>Placa</label><br>
  			<input type="text" name="placa" maxlength="8" OnKeyPress="formatar('###-####', this)" class="form-control" required><br>
        <label>Ano-Fabricação</label><br>
  			<input type="text" name="ano" class="form-control" required><br>
        <label>Cliente</label><br>
        <select class="form-control" name="idCliente">
  <?php
  	require_once '../controllers/conexao.php';
  	require_once '../controllers/ClienteDAO.php';
  	$cliente = new ClienteDAO();
  	$result = $cliente -> listar_cliente($conn);
  	foreach ($result as $key => $value) {
  		echo "<option value=".$value['idcliente'].">".$value['idcliente']." - ".$value['nome']."</option>";

  	}
  ?>

</select>
   <br>
   <div>
     <input class="btn btn-primary" type="submit"  value="Enviar">
   </div>
  		</form>


    </div>

   </div>
	</body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
