<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../dto/produtoDTO.php';
require_once '../dao/produtoDAO.php';


// recuperei os dados do formulario
$idproduto = $_POST["idproduto"];
$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$quantidade = $_POST["quantidade"];
$descricao = $_POST["descricao"];
$datavalidade = $_POST["datavalidade"];
$preco = $_POST["preco"];
$tipo = $_POST["tipo"];

$produtoDTO = new ProdutoDTO();
$produtoDTO->setidproduto($idproduto);
$produtoDTO->setNome($nome);
$produtoDTO->setCategoria($categoria);
$produtoDTO->setQuantidade($quantidade);
$produtoDTO->setDescricao($descricao);
$produtoDTO->setDatavalidade($datavalidade);
$produtoDTO->setPreco($preco);
$produtoDTO->settipo($tipo);

$produtoDAO = new ProdutoDAO();
$produtoDAO->updateProdutoById($produtoDTO);

echo "<script>";
echo "window.location.href = '../view/listarAllProduto.php';";
echo "</script> ";
        