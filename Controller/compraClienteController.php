<?php
session_start();

require_once '../dto/compraDTO.php';
require_once '../dao/compraDAO.php'; 

require_once '../dto/ProdutoDTO.php';
require_once '../dao/ProdutoDAO.php';

require_once '../dto/compra_has_produtoDTO.php';
require_once '../dao/compra_has_produtoDAO.php';

$produtos = explode("-", $_POST["produtos"]);

try{
    $precoTotal = 0;
    foreach($produtos as $key=>$produto) {
        $produto = json_decode($produto, true);
        $produtos[$key] = $produto;
        
        $produtoDAO = new ProdutoDAO;
        $produtoRecuperado = $produtoDAO->getProdutoById($produto['id']);
        $precoTotal += $produtoRecuperado['preco'] * $produto['quantidade'];
    }

    $compraDTO = new compraDTO();
    $compraDTO->setTotal($precoTotal);
    $compraDTO->setUsuario_idusuario($_SESSION['idusuario']);
    $compraDTO->setEntrega('EM SEPARAÇÃO');


    $compraDAO = new compraDAO();
    $idCompra = $compraDAO->salvarPedido($compraDTO);

    foreach($produtos as $produto) {
        $compraHasProductDTO = new compra_has_produtoDTO();
        $compraHasProductDTO->setCompra_idpedido((int)$idCompra);
        $compraHasProductDTO->setProduto_idproduto((int)$produto['id']);
        $compraHasProductDTO->setQuantidade((int)$produto['quantidade']);

        $compraHasProductDAO = new compra_has_produtoDAO();
        $sucesso= $compraHasProductDAO->salvarCompra_has_produto($compraHasProductDTO);
    }
if ($sucesso){
    echo "<script>";    
    echo "alert('Sr(a) ". $_SESSION['usuario'] ." Seu pedido foi confirmado com Sucesso!');"; 
    echo "window.location.href = '../view/principal.php';";
    echo "</script> ";
}
} catch(Exception $e) {
    echo "Opa! Foi mal, erro ao realizar compra, falha nossa, abaixo o log <br/>";
    echo $e->getMessage();
}

?>