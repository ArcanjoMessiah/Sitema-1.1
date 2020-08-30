<?php

require_once '../dto/usuarioDTO.php';
require_once '../dao/usuarioDAO.php';

$idusuario = $_POST["idusuario"];
$usuario = $_POST["usuario"];
$datanascimento = $_POST["datanascimento"];
$nome = $_POST["nome"];
$email= $_POST["email"];
$telefone = $_POST["telefone"];

//echo "<pre>";
//echo "<br>";
//echo "<br>";
//echo "<br>";
//var_dump($_POST);
//exit();
//echo "</pre>";

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setIdusuario($idusuario);
$usuarioDTO->setUsuario($usuario);
$usuarioDTO->setNome($nome);
$usuarioDTO->setEmail($email);
$usuarioDTO->setDatanascimento($datanascimento);
$usuarioDTO->setTelefone($telefone);



$usuarioDAO = new usuarioDAO();
$sucesso = $usuarioDAO->updateDadosUsuario($usuarioDTO);

if ($sucesso) {
    echo "<script>";
    echo "alert('Dados do Usuário alterado com Sucesso!');";
    echo "window.location.href = '../view/informacoesUsuario.php';";
    echo "</script> ";
}