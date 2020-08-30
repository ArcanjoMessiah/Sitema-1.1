<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../dao/produtoDAO.php';
// Excluir produto pelo ID
$idproduto = $_GET["id"];
$produtoDAO = new ProdutoDAO();
$produtoDAO->excluirProduto($idproduto);

echo "<script>";
echo "alert('Produto Excluido com Sucesso!');";
echo "window.location.href = '../view/listarAllProduto.php';";
echo "</script> ";