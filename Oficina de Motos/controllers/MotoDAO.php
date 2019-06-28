<?php

  class MotoDAO{

    public function inserir_moto($conn, $moto){
      $placa_compara = $conn->query("SELECT * FROM moto WHERE placa = '{$moto['placa']}'");
      $placa_compara->execute();
      $count = $placa_compara->rowCount();

      if($count > 0){
         echo "Placa já cadastrado";
         return header("Location: ../views/form_moto.php");
      }else {
        $result = $conn->exec("INSERT INTO moto (nome, montadora, placa, ano, idcliente) values
   				('{$moto['nome']}', '{$moto['montadora']}', '{$moto['placa']}', '{$moto['ano']}', '{$moto['idCliente']}')");
   			if ($result) {
   				echo "Veículo salvo!";
          header("Location: ../views/listar_moto.php");
   			}
      }

    }
  public function listar_moto($conn){
     $result = $conn->query("SELECT * FROM moto");
     return $result;

    }
  public function deletar_moto($conn, $id){
    try {
        $result = $conn -> query("DELETE FROM moto WHERE idmoto = '{$id}'");
 } catch (PDOException $e) {
    if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1451') {
       print 'mensagem';
    }
  }
    if($result){
     $msg = "Deletado com sucesso!";
     header("Location: ../views/listar_moto.php?msg=$msg");
   }else{
     $msg_erro = "Erro ao deletar! Veículo vinculado com cliente ou serviço!";
     header("Location: ../views/listar_moto.php?msg_erro=$msg_erro");
   }
  }
  public function alterar_moto($conn, $id, $nome, $montadora, $placa, $ano, $idcliente){
    $result = $conn -> query("UPDATE moto SET
                 nome = '{$nome}', montadora ='{$montadora}', placa='{$placa}', ano='{$ano}', idcliente='{$idcliente}'
                 WHERE idmoto = '{$id}'");
     if ($result) {
       echo "Dados Atualizados!";
       header("Location: ../views/listar_moto.php");
     }else{
       echo "Erro ao atualizar!";
     }
  }
  public function buscar_moto_id($conn, $id){
    $result = $conn -> query("SELECT * from moto where idmoto = '{$id}'");
    return $result;
  }
  }

 ?>
