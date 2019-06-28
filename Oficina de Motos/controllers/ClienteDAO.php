<?php
 class ClienteDAO{
   public function inserir_cliente($conn, $nome, $cpf, $telefone, $email, $endereco){
     $cpf_compara = $conn->query("SELECT * FROM cliente WHERE cpf = '$cpf'");
     $cpf_compara->execute();
     $count = $cpf_compara->rowCount();

     if($count > 0){
	      echo "CPF já cadastrado";
        return header("Location:form_cliente.php");
     }else{
       //exeuta uma série de instruções SQL
         $result = $conn->exec("INSERT INTO cliente(nome, cpf, telefone, email, endereco) VALUES ('{$nome}','{$cpf}','{$telefone}','{$email}','$endereco')");
     }
     if ($result) {
     echo "Cliente cadastrado com sucesso!";
     header("Location: ../views/listar_cliente.php");
   }
 }
 /*public function inserir_cliente($conn, $cliente){
    $result = $conn-> exec("INSERT INTO cliente (nome, cpf, telefone, email, endereco) VALUES ('{$cliente['nome']}', '{$cliente['cpf']}', '{$cliente['telefone']}', '{$cliente['email']}', '{$cliente['endereco']}')");

 }*/
 public function listar_cliente($conn){
   $result = $conn -> query("SELECT * FROM cliente");
   return $result;
 }
 public function deletar_cliente($conn, $id){
   //$result = $conn -> exec("DELETE FROM cliente WHERE idcliente = '{$id}'");
   try {
     $result = $conn -> exec("DELETE FROM cliente WHERE idcliente = '{$id}'");
} catch (PDOException $e) {
   if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1451') {
      print 'mensagem';
   }
}
   if($result){
     $msg = "Deletado com sucesso!";
     header("Location: ../views/listar_cliente.php?msg=$msg");
   }else{
     $msg_erro = "Erro ao deletar! Cliente vinculado com moto ou serviço!";
     header("Location: ../views/listar_cliente.php?msg_erro=$msg_erro");
   }
  }
  public function alterar_cliente($conn, $id, $nome, $cpf, $telefone, $email, $endereco){
		$result = $conn -> exec("UPDATE cliente SET
								nome = '{$nome}', cpf='{$cpf}', telefone='{$telefone}', email='{$email}', endereco='{$endereco}'
								WHERE idcliente = '{$id}'");
		if ($result) {
      echo "Alterado com sucesso!";
			header("Location: ../views/listar_cliente.php");
		}else{
			echo "Erro ao atualizar!";
		}
	}
  public function buscar_cliente_id($conn, $id){
		$result = $conn -> query("SELECT * from cliente where idcliente = '{$id}'");
		return $result;
	}
  public function buscar_cliente_nome($conn, $nome){
		$result = $conn -> query("SELECT * from cliente where nome = '{$nome}'");
		return $result;
	}
  public function buscar_cliente_indice($conn, $cliente){

  require_once 'ClienteDAO.php';

  $c_n = new ClienteDAO();
  $cn = $c_n->buscar_cliente_nome($conn, $cliente['cliente']);
  $cliente_nome = $cn->fetch(PDO::FETCH_OBJ);
  $cliente_nome = $cliente['cliente'];

  $c_id = new ClienteDAO();
  $cid = $c_id->buscar_cliente_id($conn, $cliente['cliente']);
  $cliente_id = $cid->fetch(PDO::FETCH_OBJ);
  $cliente_id = $cliente['cliente'];

  $result = $conn -> query("SELECT * FROM cliente WHERE idcliente = '{$cliente_id}' OR nome LIKE '%{$cliente_nome}%'");
  return $result;
  }

 }
 ?>
