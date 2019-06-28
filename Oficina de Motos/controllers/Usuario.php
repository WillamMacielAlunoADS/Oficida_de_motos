<?php
class Usuario{
  private $nome_usuario;
  private $senha;
  private $nome;

  public function setNomeUsuario($nome_usuario){
    if (is_string($nome_usuario)) {
      $this -> nome_usuario = $nome_usuario;
    }else{
      echo "verifique o nome de usuário";
    }
  }
  public function getNomeUsuario(){
    return $this -> nome_usuario;
  }
  public function setSenha($senha){
    if (is_string($senha)) {
      $this -> senha = $senha;
    }else{
      echo "verifique a senha!";
    }
  }
  public function getSenha(){
    return $this -> senha;
  }

  public function setNome($nome){
    if (is_string($nome)) {
      $this -> nome = $nome;
    }else{
      echo "verifique a senha!";
    }
  }
  public function getNome(){
    return $this -> nome;
  }


}
 ?>
