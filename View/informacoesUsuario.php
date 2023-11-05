<!DOCTYPE html>
<?php
include_once '../webcomplementes.html';
require_once '../dao/usuarioDAO.php';
session_start();
$idusuario = $_SESSION["idusuario"];
$usuarioDAO = new UsuarioDAO();
$usuario = $usuarioDAO->getUsuarioById($idusuario);
////////////////////////////////////////////////////////////
$imagem = $usuario["arquivo"];
$sexo = $usuario["sexo"];
$perfil = $usuario["perfil_idperfil"];

if ($imagem == "semImagem") {
    if ($sexo == 1) {
        $sexo = "<a href='trocarImagem.php'><img src='../imagens/masculino.png' class='card-img-top rounded-circle' style='width:30%' data-toggle='tooltip' data-placement='right' title='Trocar Imagem!'></a>";
    }
    if ($sexo == 2) {
        $sexo = "<a href='trocarImagem.php'><img src='../imagens/feminino.png' class='card-img-top rounded-circle' style='width:30%' data-toggle='tooltip' data-placement='left' title='Trocar Imagem!'></a>";
    }
} else {
    $sexo = "<a href='trocarImagem.php'><img src='../upload/$imagem' class='card-img-top rounded-circle' style='width:30%' data-toggle='tooltip' data-placement='right' title='Trocar Imagem!'></a>"; //Image cafdasatrad no banco
}

if ($perfil == 3) {
    $perfil = "Cliente";
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <br>
            <br>
            <div class="card bg-dark text-white text-center font-weight-bold">
                <div class="card-body">Dados do Usuário</div>
            </div>
            <br>
            <div class="card-group">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h6 class="card-title text-warning font-weight-bold"><?php echo $perfil; ?></h6>
                        <?php echo $sexo; ?>
                    </div>
                </div>
                <div class="card bg-dark text-white">
                    <div class="card-body font-weight-bold">
                        <form action="../controller/alterarDadosUsuarioControlle.php" method="post">
                            <label id="idusuario">ID: <?php echo $usuario["idusuario"]; ?></label>
                            <br>
                            <input type="hidden" id="idusuario" name="idusuario"  class="form-control col-4" value="<?php echo $usuario["idusuario"]; ?>">
                            <label id="usuario">Usuário</label>
                            <input type="text" id="usuario" name="usuario" class="form-control col-4" value="<?php echo $usuario["usuario"]; ?>">
                            <label for="nome">Nome Completo</label>
                            <input type="text" id="nome" name="nome" class="form-control col-8" value="<?php echo $usuario["usuario"]; ?>"> 

                            <label id='datanascimento'>Data Nascimento</label>
                            <input type="date" id="datanascimento" class="form-control col-4" name="datanascimento" value="<?php echo $usuario["datanascimento"]; ?>">
                            
                            <label id='email'>E-mail</label>
                            <input type="email" id="email"  class="form-control col-6" name="email" value="<?php echo $usuario["email"]; ?>">

                            <label for="senha">Senha</label>
                            <input type="password" name="senha" class="form-control col-6" id="senha" value="<?php echo $usuario["senha"]; ?>">
                            
                            <label id='telefone'>Telefone</label>
                            <input type="tel" id="telefone" class="form-control col-4" name="telefone" value="<?php echo $usuario["telefone"]; ?>">
                            <br>
                            <button class="btn btn-danger" onclick="return confirm('Tem certeza que deseja Atualizar os Dados?'); return false;">Atualizar Dados</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </body>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</html>
