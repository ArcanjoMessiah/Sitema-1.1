<?php

require_once 'conexao/conexao.php';


class compra_has_produtoDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function getAllPedidos() {
        try {
            $sql = "SELECT * FROM compra_has_produto";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $pedidos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function getUserByIdPedidos($idusuario) {
        try {
            $sql = "SELECT usuario, endereco FROM usuario WHERE idusuario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idusuario->getIdusuario());
            $stmt->execute();
            $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $pedidos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    
    public function detalharPedido(compraDTO $compraDTO) {
        try {
            
             $sql = "select C.id, C.total, C.usuario_idusuario, C.datapedido, C.pagamento, C.entrega, c.enderecoentrega, 
            U.idUsuario, U.usuario, CP.compra_idPedido, CP.produto_idproduto, CP.quantidade, P.idproduto, P.nome
            FROM compra as C, Usuario as U, compra_has_produto as CP, produto as P
            where C.usuario_idusuario = U.idUsuario and C.id = CP.compra_idPedido and P.idproduto = CP.produto_idproduto  and CP.compra_idpedido= ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $compraDTO->getIdcompra());
            $stmt->execute();
            $carrs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $carrs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function salvarCompra_has_produto(compra_has_produtoDTO $compra_has_produtoDTO) {
        try {
            $sql = "INSERT INTO compra_has_produto ( quantidade,compra_idpedido,produto_idproduto ) 
                    VALUES (?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $compra_has_produtoDTO->getQuantidade());            
            $stmt->bindValue(2, $compra_has_produtoDTO->getCompra_idpedido());
            $stmt->bindValue(3, $compra_has_produtoDTO->getProduto_idproduto());
            
            
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    

//
//    public function excluirCliente($idcliente) {
//        try {
//            $sql = "DELETE FROM cliente 
//                   WHERE idcliente = ?";
//            $stmt = $this->pdo->prepare($sql);
//            $stmt->bindValue(1, $idcliente);
//            $stmt->execute();
//        } catch (PDOException $exc) {
//            echo $exc->getMessage();
//        }
//    }
//

//
//    public function updateClienteById(ClienteDTO $clienteDTO) {
//        try {
//            $sql = "UPDATE cliente SET nome=?,
//                                       cpf=?,
//                                       rg=?,
//                                       datanascimento=?,
//                                       endereco=?,
//                                       sexo=? 
//                    WHERE idcliente= ?";
//            $stmt = $this->pdo->prepare($sql);
//            $stmt->bindValue(1, $clienteDTO->getNome());
//            $stmt->bindValue(2, $clienteDTO->getCpf());
//            $stmt->bindValue(3, $clienteDTO->getRg());
//            $stmt->bindValue(4, $clienteDTO->getDatanascimento());
//            $stmt->bindValue(5, $clienteDTO->getEndereco());
//            $stmt->bindValue(6, $clienteDTO->getSexo());
//            $stmt->bindValue(7, $clienteDTO->getIdcliente());
//            $stmt->execute();
//            
//            
//        } catch (PDOException $exc) {
//            echo $exc->getMessage();
//        }
//    }

}

?>