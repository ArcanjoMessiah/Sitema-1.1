<?php

require_once 'conexao/conexao.php';

class compraDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function getAllPedidos() {
        try {
            $sql = "SELECT C.id, C.total, C.usuario_idusuario, C.datapedido, C.pagamento, C.entrega, c.enderecoentrega, 
            U.idUsuario, U.usuario, 
            CP.compra_idPedido,
            CP.produto_idproduto,
            CP.quantidade,
            P.idproduto,
            P.nome

            FROM compra as C, Usuario as U, compra_has_produto as CP, produto as P
            where 
            C.usuario_idusuario = U.idUsuario
            and C.id = CP.compra_idPedido
            and P.idproduto = CP.produto_idproduto";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $carrs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $carrs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function salvarPedido(compraDTO $compraDTO) {
        try {
            $sql = "INSERT INTO compra (total, usuario_idusuario, entrega ) 
                    VALUES (?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $compraDTO->getTotal());
            $stmt->bindValue(2, $compraDTO->getUsuario_idusuario());
            $stmt->bindValue(3, $compraDTO->getEntrega());

            $stmt->execute();
            return $this->pdo->lastInsertId();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function detalharcompraById($compra_idpedido) {
        try {
            
            
            //print_r($compra_idpedido);
            //exit();
            $sql = "select * FROM compra_has_produtos where id= " . $idcompra_idpedido;

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $compra_idpedido);
            $stmt->execute();
            $compra = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $compra;
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
