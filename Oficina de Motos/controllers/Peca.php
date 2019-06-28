<?php

class Peca{
  private $nome;
  private $preco;

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
  public function setPreco($preco){
    if (is_string($preco)) {
      $this -> preco = $preco;
    }else{
      echo "verifique o preco!";
    }
  }
  public function getPreco(){
    return $this -> preco;
  }

}

?>
