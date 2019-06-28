<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Formulário de Login e Registro com HTML5 e CSS3</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/login.css" />
</head>
<body>
  <div class="container" >
    <a class="links" id="paracadastro"></a>
    <a class="links" id="paralogin"></a>

    <div class="content">
      <!--FORMULÁRIO DE LOGIN-->
      <div id="login">
        <form method="post" action="../controllers/login.php">
          <h1>Login</h1>
          <?php if(isset($_GET['resu']))
            echo '<p slyte="font-size: 20px"> usuario ou senha incorrento!</p>';
          ?>
          <p>
            <label for="nome_login">Usuário</label>
            <input id="nome_login" name="nome_usuario" required="required" type="text" placeholder="usuario"/>
          </p>

          <p>
            <label for="email_login">Senha</label>
            <input id="email_login" name="senha" required="required" type="password" placeholder="senha" />
          </p>
          
          <p>
            <input type="submit" value="Logar" />
          </p>

        </form>
      </div>

    </div>
  </div>
</body>
</html>
