<?php
class UsuarioDAO{

  public function buscar_usuario($conn, $nome_usuario, $senha){
   $result = $conn -> query("SELECT * FROM usuario WHERE nome_usuario = $nome_usuario AND senha = $senha");
  // return $result;
 }
 public function listar_usuario($conn){
  $result = $conn -> query("SELECT * FROM usuario");
  return $result;
}
public function buscar_usuario_id($conn, $id){
    $result = $conn->query("SELECT * FROM usuario WHERE idusuario = '{$id}'");
    return $result;
}
public function alterar_usuario($conn, $id, $nome_usuario, $senha, $nome){
  $result = $conn -> query("UPDATE usuario SET
               nome_usuario = '{$nome_usuario}', senha ='{$senha}', nome='{$nome}'
               WHERE idusuario = '{$id}'");
   if ($result) {
     echo "Dados Atualizados!";
     header("Location: ../views/listar_usuario.php");
   }else{
     echo "Erro ao atualizar!";
   }
}
}


?>
