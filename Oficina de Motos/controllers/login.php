<?php
  //require_once 'conexao.php';
  $nome_usuario = $_POST['nome_usuario'];
  $senha = $_POST['senha'];

  require_once 'conexao.php';
  $result = $conn->query("SELECT * FROM usuario");
  while ($row = $result->fetch(PDO::FETCH_OBJ)) {
     if($row-> nome_usuario == $nome_usuario && $row-> senha == $senha){
        session_start();
        $_SESSION['nome'] = $nome_usuario;
        $_SESSION['senha'] = $senha;
        header("Location: ../views/_index.htm");
     }else {
          header("Location: ../views/form_login.php?resu=Error");
     }
  }

  ?>
