<?php

class compraDTO {

    private $id;
    private $quantidade;	
    private $total;
    private $usuario_idusuario;
    private $produto_idproduto;
    private $pagamento;
    private $entrega; 

    
    public function getEntrega(){
        return $this->entrega;
    }

    public function getPagamento() {
        return $this->pagamento;
    }
       
    public function getIdcompra() {
        return $this->id;
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

    public function setIdcompra($idcompra) {
        $this->id = $idcompra;
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

    public function setEntrega($entrega) {
        $this->entrega = $entrega;
    }


}
