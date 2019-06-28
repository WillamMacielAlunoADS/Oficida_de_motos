<?php
class PagamentoDAO{
  public function inserir_pagamento($conn, $pagamento){
     require_once 'ServicoDAO.php';
     $sb = new ServicoDAO();
     $sb_id = $sb->buscar_servico_id($conn, $pagamento-> idservico);
     $valor = $sb_id->fetch(PDO::FETCH_OBJ);

     $pagamento = $valor -> valor;

     $result = $conn->exec("INSERT INTO pagamento (lucro) VALUES ('{$pagamento}')");
     if ($result) {
       if ($pagamento -> idservico != 1) {
        $result = $conn->exec("UPDATE pagamento set lucro= lucro + {$pagamento} where idpagamento = '1'");
        echo "Pagamento Realizado com suscesso!";
        header("Location: ../views/listar_servico.php");
       }
       header("Location: ../views/listar_servico.php");
     }

  }
  public function buscar_pagamento_id($conn, $id){
    $result = $conn -> query("SELECT * from pagamento where idpagamento = '{$id}'");
    return $result;
  }
}
?>
