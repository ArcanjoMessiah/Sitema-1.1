<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'conexao/conexao.php';

class ProdutoDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }
    
    public function getAllProduto() {
        try {
            $sql = "SELECT * FROM produto";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $produtos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function salvarProduto(ProdutoDTO $produtoDTO) {
        try {
            $sql = "INSERT INTO produto (idproduto,nome,categoria,quantidade,descricao,datavalidade,preco,tipo) 
                    VALUES (?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $produtoDTO->getIdproduto());
            $stmt->bindValue(2, $produtoDTO->getNome());
            $stmt->bindValue(3, $produtoDTO->getCategoria());
            $stmt->bindValue(4, $produtoDTO->getQuantidade());
            $stmt->bindValue(5, $produtoDTO->getDescricao());
            $stmt->bindValue(6, $produtoDTO->getDatavalidade());
            $stmt->bindValue(7, $produtoDTO->getPreco());
            $stmt->bindValue(8, $produtoDTO->getTipo());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function excluirProduto($idproduto) {
        try {
            $sql = "DELETE FROM produto 
                   WHERE idproduto = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1,$idproduto->set);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getProdutoById($idproduto) {
        try {
            $sql = "SELECT * FROM produto WHERE idproduto = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idproduto);
            $stmt->execute();
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);
            return $produto;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function serchProduto($where = Array() ){
        try { 
		$nome = getPost('n');
		$categoria = getPost('c');
		$tipo = getPost('t');
		if( $nome ){ $where[] = " `nome` = '{$nome}'"; }
		if( $categoria ){ $where[] = " `categoria` = '{$categoria}'"; }
		if( $tipo ){ $where[] = " `tipo` = '{$tipo}'"; }
		$sql = "SELECT * FROM produto WHERE nome, categoria, tipo  ";
		if( sizeof( $where ) ){$sql .= ' WHERE '.implode( ' AND ',$where );
                echo $sql;}
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $categoria);
            $stmt->bindValue(3, $tipo);
            $stmt->execute();
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);
            return $produto;
        
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        
    }

    public function updateProdutoById(ProdutoDTO $produtoDTO) {
        try {
            $sql = "UPDATE produto SET nome=?,categoria=?,quantidade=?,descricao=?,datavalidade=?,preco=?,tipo=? WHERE idproduto= ?";
            $stmt = $this->pdo->prepare($sql);            
            $stmt->bindValue(1, $produtoDTO->getNome());
            $stmt->bindValue(2, $produtoDTO->getCategoria());
            $stmt->bindValue(3, $produtoDTO->getQuantidade());
            $stmt->bindValue(4, $produtoDTO->getDescricao());
            $stmt->bindValue(5, $produtoDTO->getDatavalidade());
            $stmt->bindValue(6, $produtoDTO->getPreco());
            $stmt->bindValue(7, $produtoDTO->getTipo());
            $stmt->bindValue(8, $produtoDTO->getidproduto());
            $stmt->execute();
                        
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    
}