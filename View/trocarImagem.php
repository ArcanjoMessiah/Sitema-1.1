<!DOCTYPE html>
<?php
include_once '../webcomplementes.html';
require_once '../dao/usuarioDAO.php';
session_start();
$idusuario = $_SESSION["idusuario"];
$usuarioDAO = new UsuarioDAO();
$usuario = $usuarioDAO->getUsuarioById($idusuario);
////////////////////////////////////////////////////////////
$idusuario = $usuario["idusuario"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <br>
            <br>
            <div class="card bg-dark text-white text-center font-weight-bold">
                <div class="card-body">Trocar Imagem</div>
            </div>
            <br>
            <form action="../controller/controllerTrocarImagem.php" method="post" enctype="multipart/form-data">
                <div class="card-group">
                    <div class="card bg-dark text-light">
                        <div class="card-body">
                            <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
                            <label for="arquivo">Imagem</label>
                            <input type="file" name="arquivo" class="form-control" id="arquivo">
                        </div>
                    </div>
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <a href="informacoesUsuario.php" class="btn btn-warning">Voltar</a>
                            <button type="submit" class="btn btn-light">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
