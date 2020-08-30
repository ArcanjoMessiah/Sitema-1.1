<?php


class ProdutoDTO {
    //put your code here
    private $idproduto; 
    private $nome; 
    private $categoria; 
    private $quantidade; 
    private $descricao; 
    private $datavalidade; 
    private $preco; 
    private $tipo; 
    
    public function getidproduto() {
        return $this->idproduto;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDatavalidade() {
        return $this->datavalidade;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setidproduto($idproduto) {
        $this->idproduto = $idproduto;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setDatavalidade($datavalidade) {
        $this->datavalidade = $datavalidade;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    
}



