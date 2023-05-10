<?php

class compra_has_produtoDTO {

    private $compra_idpedido;
    private $produto_idproduto;
    private $quantidade;	
    

    public function getCompra_idpedido() {
        return $this->compra_idpedido;

    }

    public function getProduto_idproduto(){
        return $this->produto_idproduto;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function setCompra_idpedido($compra_idpedido){
        $this->compra_idpedido = $compra_idpedido;
    }

    public function setProduto_idproduto($produto_idproduto){
        $this->produto_idproduto = $produto_idproduto;
    }

    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }



}