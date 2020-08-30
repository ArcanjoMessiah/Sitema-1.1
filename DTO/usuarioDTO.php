<?php

class usuarioDTO {

    private $idusuario;
    private $usuario;
    private $senha;
    private $perfil_idperfil;
    private $sexo;
    private $endereco;
    private $arquivo;
    private $datanascimento;
    private $nome;
    private $email;
    private $telefone;
    private $cpf;
    private $rg;
    


    public function getIdusuario() {
        return $this->idusuario;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getPerfil_idperfil() {
        return $this->perfil_idperfil;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getArquivo() {
        return $this->arquivo;
    }

    public function getDatanascimento() {
        return $this->datanascimento;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getRg() {
        return $this->rg;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setPerfil_idperfil($perfil_idperfil) {
        $this->perfil_idperfil = $perfil_idperfil;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function setArquivo($arquivo) {
        $this->arquivo = $arquivo;
    }

    public function setDatanascimento($datanascimento) {
        $this->datanascimento = $datanascimento;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }


}
