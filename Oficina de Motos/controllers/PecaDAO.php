<?php
class PecaDAO {

    public function inserir_peca($conn, $nome, $estoque, $preco){
   //exeuta uma série de instruções SQL
     $result = $conn->exec("INSERT INTO peca (nome, estoque, preco) VALUES ('{$nome}','{$estoque}','{$preco}')");
     if ($result) {
     echo "Preca cadastrada com sucesso!";
     header("Location: ../views/listar_peca.php");
   }
  }
  public function listar_peca($conn){
    $result = $conn -> query("SELECT * FROM peca");
   return $result;
  }
  public function deletar_peca($conn, $id){
  if ($id != 1) {
  $result = $conn -> query("DELETE FROM peca WHERE idpeca = '{$id}'");
  if($result){
    $msg = "Deletado com sucesso!";
    header("Location: ../views/listar_peca.php?msg=$msg");
  }else{
    $msg_erro = "Erro ao deletar.";
    header("Location: ../views/listar_peca.php?msg_erro=$msg_erro");
  }
 }else {
    echo "Impossivel apagar valor padão";
    header("Location: ../views/listar_peca.php");
  }
 }
 public function alterar_peca($conn, $id, $nome, $estoque, $preco){
    if ($id != 1) {
   $result = $conn -> query("UPDATE peca SET
 								nome = '{$nome}', estoque='{$estoque}', preco='{$preco}'
 								WHERE idpeca = '{$id}'");
 		if ($result) {
       echo "Alterado com sucesso!";
 			 header("Location: ../views/listar_peca.php");
 		}else{
 			echo "Erro ao atualizar!";
 		}
  }else{
    echo "Impossivel Alterar valor padão!";
    header("Location: ../views/listar_peca.php");
  }
 }
 public function buscar_peca_id($conn, $id){
  $result = $conn -> query("SELECT * from peca where idpeca = '{$id}'");
  return $result;
}
public function buscar_peca_nome($conn, $nome){
  $result = $conn -> query("SELECT * from peca where nome = '{$nome}'");
  return $result;
}
public function buscar_peca_indice($conn, $peca){

require_once 'PecaDAO.php';

$p_n = new PecaDAO();
$pn = $p_n->buscar_peca_nome($conn, $peca['peca']);
$peca_nome = $pn->fetch(PDO::FETCH_OBJ);
$peca_nome = $peca['peca'];

$p_id = new PecaDAO();
$pid = $p_id->buscar_peca_id($conn, $peca['peca']);
$peca_id = $pid->fetch(PDO::FETCH_OBJ);
$peca_id = $peca['peca'];

$result = $conn -> query("SELECT * FROM peca WHERE idpeca = '{$peca_id}' OR nome LIKE '%{$peca_nome}%'");
return $result;
}
}
?>
