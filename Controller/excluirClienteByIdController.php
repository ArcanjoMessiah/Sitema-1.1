<?php
require_once '../dao/usuarioDAO.php';


// Excluir usuário pelo ID
$idusuario = $_GET["id"];
$usuarioDAO = new UsuarioDAO();
$usuarioDAO->excluirUsuario($idusuario);

echo "<script>";
echo "window.location.href = '../view/listarAllCliente.php';";
echo "</script> ";
?>
