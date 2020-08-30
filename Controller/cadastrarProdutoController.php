<?php
require_once '../dto/produtoDTO.php';
require_once '../dao/produtoDAO.php';


$nome = $_POST["nome"];
$categoria = ($_POST["categoria"]);
$quantidade = $_POST["quantidade"];
$descricao = $_POST["descricao"];
$datavalidade = $_POST["datavalidade"];
$preco = $_POST["preco"];
$tipo = $_POST["tipo"];

$produtoDTO = new ProdutoDTO();
$produtoDTO->setNome($nome);
$produtoDTO->setCategoria($categoria);
$produtoDTO->setQuantidade($quantidade);
$produtoDTO->setDescricao($descricao);
$produtoDTO->setDatavalidade($datavalidade);
$produtoDTO->setPreco($preco);
$produtoDTO->settipo($tipo);

$produtoDAO = new ProdutoDAO();
$sucesso = $produtoDAO->salvarProduto($produtoDTO);
if ($sucesso) {
 $msg = "Produto Cadastrado com sucesso";
 echo "<script>";
echo"window.location.href='../view/formCadastrarProduto.php?msg={$msg}' ";
 echo "</script> ";
}
