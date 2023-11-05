<?php

require_once '../dao/usuarioDAO.php';
// Excluir usuário pelo ID
$idusuario = $_GET["id"];
$usuarioDAO = new UsuarioDAO();
$usuarioDAO->excluirUsuario($idusuario);

echo "<script>";
echo "alert('Usuário Excluido com Sucesso!');";
echo "window.location.href = '../view/listarAllUsuario.php';";
echo "</script> ";

