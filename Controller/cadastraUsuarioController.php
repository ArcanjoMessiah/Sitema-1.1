<?php

require_once '../dto/usuarioDTO.php';
require_once '../dao/usuarioDAO.php';

// recuperei os dados do formulario

$perfil_idperfil = $_POST["perfil"];
$usuario = $_POST["usuario"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$datanascimento =$_POST["datanascimento"];
$sexo = $_POST["sexo"];
$endereco = $_POST["endereco"];
$email = $_POST["email"];
$senha = md5($_POST["senha"]);
$telefone = $_POST["telefone"];



$usuarioDTO = new usuarioDTO();
$usuarioDTO->setPerfil_idperfil($perfil_idperfil);
$usuarioDTO->setUsuario($usuario);
$usuarioDTO->setCpf($cpf);
$usuarioDTO->setRg($rg);
$usuarioDTO->setDatanascimento($datanascimento);
$usuarioDTO->setSexo($sexo);
$usuarioDTO->setEndereco($endereco);
$usuarioDTO->setEmail($email);
$usuarioDTO->setSenha($senha);
$usuarioDTO->setTelefone($telefone);


$usuarioDAO = new UsuarioDAO();
$sucesso = $usuarioDAO->salvarUsuario($usuarioDTO);

if ($sucesso) {
    echo "<script>";
    echo "alert('Usuário: $usuario Cadastrado com Sucesso!');";
    echo "window.location.href = '../view/formCadastroUsuario.php';";
    echo "</script> ";
}

