<?php

class carrinhoDTO {

    private $idcarrinho;
    private $quantidade;	
    private $total;
    private $usuario_idusuario;
    private $produto_idproduto;
    private $pagamento;
    
    public function getPagamento() {
        return $this->pagamento;
    }
       
    public function getIdcarrinho() {
        return $this->idcarrinho;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getTotal() {
        return $this->total;
    }

    public function getUsuario_idusuario() {
        return $this->usuario_idusuario;
    }

    public function getProduto_idproduto() {
        return $this->produto_idproduto;
    }

    public function setIdcarrinho($idcarrinho) {
        $this->idcarrinho = $idcarrinho;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function setUsuario_idusuario($usuario_idusuario) {
        $this->usuario_idusuario = $usuario_idusuario;
    }

    public function setProduto_idproduto($produto_idproduto) {
        $this->produto_idproduto = $produto_idproduto;
    }
    public function setPagamento($pagamento) {
        $this->pagamento = $pagamento;
    }



}
