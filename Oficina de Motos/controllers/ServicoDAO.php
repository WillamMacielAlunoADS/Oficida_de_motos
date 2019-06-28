<?php
  class ServicoDAO{
    public function inserir_servico($conn, $servico){
      require_once 'PecaDAO.php';
      $pb = new PecaDAO();
      $v_p = $pb->buscar_peca_id($conn, $servico['idPeca']);
      $valor_total = $v_p->fetch(PDO::FETCH_OBJ);
      $valor_total = $valor_total -> preco + $servico['valor'];

        $result = $conn->exec("INSERT INTO servico (idmoto, idcliente, descricao, idpeca, valor) VALUES
 				('{$servico['idMoto']}', '{$servico['idCliente']}','{$servico['descricao']}','{$servico['idPeca']}', '{$valor_total}')");
 			if ($result) {
           $result = $conn->exec("UPDATE peca set estoque= estoque - 1 where idpeca = {$servico['idPeca']} AND estoque > 0");
           echo "Serviço Concluido!";
           header("Location: ../views/listar_servico.php");
      }
    }
    public function listar_servico($conn){
      $result = $conn->query("SELECT * FROM servico");
      return $result;
     }
    public function deletar_servico($conn, $id){

      $result = $conn -> query("DELETE FROM servico WHERE idservico = '{$id}'");
      if($result){
       $msg = "Deletado com sucesso!";
       header("Location: ../views/listar_servico.php?msg=$msg");
     }else{
       $msg_erro = "Erro ao deletar.";
       header("Location: ../views/listar_servico.php?msg_erro=$msg_erro");
     }
   }

  public function alterar_servico($conn, $id, $idmoto, $idcliente, $descricao, $idpeca, $valor){
    require_once 'PecaDAO.php';
    $pb = new PecaDAO();
    $v_p = $pb->buscar_peca_id($conn, $idpeca);
    $valor_total = $v_p->fetch(PDO::FETCH_OBJ);

    $valor_total = $valor_total -> preco + $valor;

  $result = $conn -> query("UPDATE servico SET
               idmoto = '{$idmoto}', idcliente ='{$idcliente}', descricao='{$descricao}', idpeca='{$idpeca}', valor='{$valor_total}'
               WHERE idservico = '{$id}'");
   if ($result) {
      $result = $conn->exec("UPDATE peca set estoque = estoque where idpeca = {$idpeca} AND estoque > 0");
     echo "Dados Atualizados!";
     header("Location: ../views/listar_servico.php");
   }else{
     echo "Erro ao atualizar!";
   }
}
public function buscar_servico_id($conn, $id){
  $result = $conn -> query("SELECT * from servico where idservico = '{$id}'");
  return $result;
}
  }
?>
