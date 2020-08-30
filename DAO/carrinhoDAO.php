<?php

require_once 'conexao/conexao.php';

class carrinhoDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function getAllPedidos() {
        try {
            $sql = "SELECT * FROM carrinho";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $carrs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $carrs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function salvarPedido(carrinhoDTO $carrinhoDTO) {
        try {
            $sql = "INSERT INTO carrinho ( quantidade, total, usuario_idusuario,produto_idproduto,pagamento ) 
                    VALUES (?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $carrinhoDTO->getQuantidade());
            $stmt->bindValue(2, $carrinhoDTO->getTotal());
            $stmt->bindValue(3, $carrinhoDTO->getUsuario_idusuario());
            $stmt->bindValue(4, $carrinhoDTO->getProduto_idproduto());
            $stmt->bindValue(5, $carrinhoDTO->getPagamento());
            
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
        public function getCarrinhoById($idusuario) {
        try {
            $sql = "select *,T.descricao as CURSO,A.descricao as AULA from carrinho as C
INNER join aula as A on A.idaula=C.idaula
INNER join tipo as T on T.idtipo=A.idtipo
                    where C.idusuario=$idusuario and C.ativo=0";
//            $sql = "select * from carrinho where idusuario=$idusuario and ativo=0";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idusuario);
            $stmt->execute();
            $carrinho = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $carrinho;
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
