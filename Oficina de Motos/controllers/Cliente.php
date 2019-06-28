<?php
class Cliente{
	private $nome;
  private $cpf;
  private $telefone;
  private $email;
  private $endereco;

	public function setNome($nome){
		if (is_string($nome)) {
			$this -> nome = $nome;
		}else{
			echo "verifique o nome";
		}
	}
	public function getNome(){
		return $this -> nome;
	}
  public function setCpf($cpf){
    if (is_string($cpf)) {
      $this -> cpf = $cpf;
    }else{
      echo "verifique o cpf";
    }
  }
  public function getCpf(){
    return $this -> cpf;
  }
  public function setTelefone($telefone){
    if (is_string($telefone)) {
      $this -> telefone = $telefone;
    }else{
      echo "verifique o telefone";
    }
  }
  public function getTelefone(){
    return $this -> telefone;
  }
  public function setEmail($email){
    if (is_string($email)) {
      $this -> email = $email;
    }else{
      echo "verifique o email";
    }
  }
  public function getEmail(){
    return $this -> email;
  }
  public function setEndereco($endereco){
    if (is_string($endereco)) {
      $this -> endereco = $endereco;
    }else{
      echo "verifique o endereco";
    }
  }
  public function getEndereco(){
    return $this -> endereco;
  }
}
?>
