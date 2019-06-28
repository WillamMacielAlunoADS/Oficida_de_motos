<?php
class Servico{
  private $descricao;
  private $valor;

  public function setDescricao($descricao){
	  if (is_string($descricao)) {
			$this -> descricao = $descricao;
		}else{
			echo "verifique a descrição";
		}
	}
	public function getDescricao(){
		return $this -> descricao;
	}
  public function setValor($valor){
    if (is_string($valor)) {
      $this -> valor = $valor;
    }else{
      echo "verifique o valor";
    }
  }
  public function getValor(){
    return $this -> valor;
  }

}
?>
