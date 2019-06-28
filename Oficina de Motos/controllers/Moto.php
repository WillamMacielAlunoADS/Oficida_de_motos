<?php
  class Moto{
    private $nome;
    private $montadora;
    private $placa;
    private $ano;

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
  public function setMontadora($montadora){
    if (is_string($montadora)) {
      $this -> montadora = $montadora;
    }else{
      echo "verifique a montadora";
    }
  }
  public function getMontadora(){
    return $this -> montadora;
  }
  public function setPlaca($placa){
    if (is_string($placa)) {
      $this -> placa = $placa;
    }else{
      echo "verifique a placa";
    }
  }
  public function getPlaca(){
    return $this -> placa;
  }
  public function setAno($ano){
    if (is_string($ano)) {
      $this -> ano = $ano;
    }else{
      echo "verifique o Ano";
    }
  }
  public function getAno(){
    return $this -> ano;
  }

  }
 ?>
