<?php

require_once '../dto/usuarioDTO.php';
require_once '../dao/usuarioDAO.php';

$idusuario = $_POST["idusuario"];
$perfil_idperfil = $_POST["perfil_idperfil"];
$usuario = $_POST["usuario"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$datanascimento =$_POST["datanascimento"];
$sexo = $_POST["sexo"];
$email = $_POST["email"];
$endereco = $_POST["endereco"];
$senha = md5($_POST["senha"]);
$telefone = $_POST["telefone"];



$usuarioDTO = new usuarioDTO();
$usuarioDTO->setIdusuario($idusuario);
$usuarioDTO->setPerfil_idperfil($perfil_idperfil);
$usuarioDTO->setUsuario($usuario);
$usuarioDTO->setCpf($cpf);
$usuarioDTO->setRg($rg);
$usuarioDTO->setDatanascimento($datanascimento);
$usuarioDTO->setSexo($sexo);
$usuarioDTO->setEmail($email);
$usuarioDTO->setEndereco($endereco);
$usuarioDTO->setSenha($senha);
$usuarioDTO->setTelefone($telefone);




$usuarioDAO = new usuarioDAO();
$sucesso = $usuarioDAO->updateUsuarioById($usuarioDTO);

if ($sucesso) {
    echo "<script>";
    echo "alert('Usuário alterado com Sucesso!');";
    echo "window.location.href = '../view/listarAllUsuario.php';";
    echo "</script> ";
}