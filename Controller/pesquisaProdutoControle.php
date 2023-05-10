<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../dto/produtoDTO.php';
require_once '../dao/produtoDAO.php';

// recuperei os dados do formulario


$usuario = $_POST["usuario"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$datanascimento =$_POST["datanascimento"];
$sexo = $_POST["sexo"];
$endereco = $_POST["endereco"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];





$usuarioDAO = new UsuarioDAO();
$sucesso = $usuarioDAO->getClienteSerch($idusuario);

if ($sucesso) {
    echo "<script>";    
    echo "window.location.href = '../view/resultadocliente.php';";
    echo "</script> ";
}

