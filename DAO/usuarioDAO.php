<?php

// Conexão com o BD
require_once 'conexao/conexao.php';

// Inicio da class usuarioDAO
class usuarioDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

// INSERT
    public function salvarUsuario(UsuarioDTO $usuarioDTO) {
        try {
            $sql = "INSERT INTO usuario (usuario,cpf,rg,datanascimento,endereco,sexo,email,senha,telefone,arquivo,perfil_idperfil) 
                    VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getUsuario());
            $stmt->bindValue(2, $usuarioDTO->getCpf());
            $stmt->bindValue(3, $usuarioDTO->getRg());
            $stmt->bindValue(4, $usuarioDTO->getDatanascimento());
            $stmt->bindValue(5, $usuarioDTO->getEndereco());
            $stmt->bindValue(6, $usuarioDTO->getSexo());
            $stmt->bindValue(7, $usuarioDTO->getEmail());
            $stmt->bindValue(8, $usuarioDTO->getSenha());
            $stmt->bindValue(9, $usuarioDTO->getTelefone());
            $stmt->bindValue(10, $usuarioDTO->getArquivo());
            $stmt->bindValue(11, $usuarioDTO->getPerfil_idperfil());
            
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
// SELECT TODOS
    public function getAllUsuario() {
        try {
            $sql = "SELECT * FROM usuario";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

// SELECT ÚNICO
    public function getUsuarioById($idusuario) {
        try {
            $sql = "SELECT * FROM usuario WHERE idusuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idusuario);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

// DELETE
    public function excluirUsuario($idusuario) {
        try {
            $sql = "DELETE FROM usuario WHERE idusuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idusuario);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

// UPDATE
    public function updateUsuarioById(UsuarioDTO $usuarioDTO) {
        try {
            $sql = "UPDATE usuario SET usuario=?,cpf=?,rg=?,datanascimento=?,endereco=?,sexo=?,email=?,senha=?,telefone=?, arquivo=?, perfil_idperfil=? WHERE idusuario= ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getUsuario());
            $stmt->bindValue(2, $usuarioDTO->getCpf());
            $stmt->bindValue(3, $usuarioDTO->getRg());
            $stmt->bindValue(4, $usuarioDTO->getDatanascimento());
            $stmt->bindValue(5, $usuarioDTO->getEndereco());
            $stmt->bindValue(6, $usuarioDTO->getSexo());
            $stmt->bindValue(7, $usuarioDTO->getEmail());
            $stmt->bindValue(8, $usuarioDTO->getSenha());
            $stmt->bindValue(9, $usuarioDTO->getTelefone());
            $stmt->bindValue(10, $usuarioDTO->getArquivo());
            $stmt->bindValue(11, $usuarioDTO->getPerfil_idperfil());
            $stmt->bindValue(12, $usuarioDTO->getIdusuario());
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    //SALVAR CLIENTE
    public function salvarCliente(usuarioDTO $usuarioDTO) {
        try {
            $sql = "INSERT INTO usuario (usuario,cpf,rg,datanascimento,endereco,sexo,email,senha,telefone, arquivo) 
                    VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getUsuario());
            $stmt->bindValue(2, $usuarioDTO->getCpf());
            $stmt->bindValue(3, $usuarioDTO->getRg());
            $stmt->bindValue(4, $usuarioDTO->getDatanascimento());
            $stmt->bindValue(5, $usuarioDTO->getEndereco());
            $stmt->bindValue(6, $usuarioDTO->getSexo());
            $stmt->bindValue(7, $usuarioDTO->getEmail());
            $stmt->bindValue(8, $usuarioDTO->getSenha());
            $stmt->bindValue(9, $usuarioDTO->getTelefone());
            $stmt->bindValue(10, $usuarioDTO->getArquivo());
            
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

//LISTAR TODOS OS CLIENTES
    public function getAllCliente() {
        try {
            $sql = "SELECT * FROM usuario WHERE perfil_idperfil = 3";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    //EXCLUIR CLIENTES
    public function excluirCliente($idcliente) {
        try {
            $sql = "DELETE FROM usuario 
                   WHERE idusuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idcliente);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
//SELECIONAR CLIENTE PELA ID
public function getClienteSearch($usuario=null, $cpf=null, $rg=null, $datanascimento=null, $email=null, $sexo=null, $telefone=null) {
    try {
        $filtros = [];
        $sql = "SELECT * FROM usuario WHERE ";
        if ($usuario !== null) {
            $filtros[] = "usuario = ?";
        }
        if ($cpf !== null) {
            $filtros[] = "cpf = ?";
        }
        if ($rg !== null) {
            $filtros[] = "rg = ?";
        }
        if ($datanascimento !== null) {
            $filtros[] = "datanascimento = ?";
        }
        if ($email !== null) {
            $filtros[] = "email = ?";
        }
        if ($sexo !== null) {
            $filtros[] = "sexo = ?";
        }
        if ($telefone !== null) {
            $filtros[] = "telefone = ?";
        }

        $sql .= implode(' OR ', $filtros);

        $stmt = $this->pdo->prepare($sql);

        $i = 1;
        if ($usuario !== null) {
            $stmt->bindValue($i++, $usuario);
        }
        if ($cpf !== null) {
            $stmt->bindValue($i++, $cpf);
        }
        if ($rg !== null) {
            $stmt->bindValue($i++, $rg);
        }
        if ($datanascimento !== null) {
            $stmt->bindValue($i++, $datanascimento);
        }
        if ($email !== null) {
            $stmt->bindValue($i++, $email);
        }
        if ($sexo !== null) {
            $stmt->bindValue($i++, $sexo);
        }
        if ($telefone !== null) {
            $stmt->bindValue($i++, $telefone);
        }

        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        return $cliente;
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
}
//ATUALIZAR CLIENTE
    public function updateClienteById(usuarioDTO $usuarioDTO) {
        try {
            $sql = "UPDATE usuario SET usuario=?,cpf=?,rg=?,datanascimento=?,endereco=?,sexo=?,email=?,senha=?,telefone=?, arquivo=? WHERE idusuario= ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getUsuario());
            $stmt->bindValue(2, $usuarioDTO->getCpf());
            $stmt->bindValue(3, $usuarioDTO->getRg());
            $stmt->bindValue(4, $usuarioDTO->getDatanascimento());
            $stmt->bindValue(5, $usuarioDTO->getEndereco());
            $stmt->bindValue(6, $usuarioDTO->getSexo());
            $stmt->bindValue(7, $usuarioDTO->getEmail());
            $stmt->bindValue(8, $usuarioDTO->getSenha());
            $stmt->bindValue(9, $usuarioDTO->getTelefone());
            $stmt->bindValue(10, $usuarioDTO->getArquivo());
            $stmt->bindValue(11, $usuarioDTO->getIdusuario());
            $stmt->execute();
            
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    
// Fechamento da class usuarioDAO
}
