<?php

require_once '../dto/usuarioDTO.php';
require_once '../dao/usuarioDAO.php';
include_once './controllerArquivo.php';
$idusuario = $_POST["idusuario"];
$arquivo = $nome_final; //Pra cadasatrar bo BD

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setIdusuario($idusuario);
$usuarioDTO->setArquivo($arquivo);




$usuarioDAO = new usuarioDAO();
$sucesso = $usuarioDAO->updateImagem($usuarioDTO);

if ($sucesso) {
    echo "<script>";
    echo "alert('Imagem alterada com Sucesso!');";
    echo "window.location.href = '../view/informacoesUsuario.php';";
    echo "</script> ";
}


