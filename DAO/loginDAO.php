<?php

require_once 'conexao/conexao.php';

/*class LoginDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function login($usuario, $senha) {
        try {
            $sql = "SELECT U.idusuario,U.usuario,U.arquivo,U.sexo,P.perfil FROM usuario U
                    INNER JOIN perfil P ON (P.idperfil=U.perfil_idperfil)
                    WHERE (usuario='$usuario' ||  email='$usuario' ) AND senha='$senha'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuario);
            $stmt->bindValue(2, $senha);
            $stmt->execute();
            $login = $stmt->fetch(PDO::FETCH_ASSOC);
            return $login;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            
        }
    }

}*/

class LoginDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function login($usuario, $senha) {
        try {
            $sql = "SELECT U.idusuario,U.usuario,U.sexo,P.perfil FROM usuario U
                    INNER JOIN perfil P ON (P.idperfil=U.perfil_idperfil)
                    WHERE (usuario='$usuario' ||  email='$usuario' ) AND senha='$senha'";
            $stmt = $this->pdo->prepare($sql);            
            $stmt->execute();
            $login = $stmt->fetch(PDO::FETCH_ASSOC);
            return $login;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}



?>
