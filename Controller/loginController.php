<?php
session_start();
require_once '../dao/loginDAO.php';

$usuario = $_POST["usuario"];
$senha = md5($_POST["senha"]);

$loginDAO = new LoginDAO();
$usuario = $loginDAO->login($usuario, $senha);

if (!empty($usuario)) {
    $_SESSION["idusuario"] = $usuario["idusuario"];
    $_SESSION["usuario"] = $usuario["usuario"];
    $_SESSION["perfil"] = $usuario["perfil"];
    $_SESSION["arquivo"] = $usuario["arquivo"];
    $_SESSION["sexo"] = $usuario["sexo"];
    
    echo "<script>";
    echo "window.location.href = '../view/principal.php';";
    echo "</script> ";
} else {
    $msg = "Usuário e/ou senha invalido";
    echo "<script>";
    echo "window.location.href = '../index.php?msg={$msg}';";
    echo "</script> ";
    
}
?>
