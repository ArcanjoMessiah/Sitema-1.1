<!DOCTYPE html>
<?php
include_once '../webcomplementes.html';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <form action="../controller/cadastraUsuarioController.php" method="post">
                <br>
                <br>
                <div class="card bg-dark text-white font-weight-bold text-center">
                    <div class="card-body">Cadastro de Usuário</div>
                </div>
                <br>
                <div class="card-group">
                    <div class="card bg-dark">
                        <div class="card-body text-white">
                            <label for="nome">Nome</label>
                            <input type="text" name="usuario" class="form-control col-10" id="nome">
                             <label for="email">E-mail:</label>
                            <input type="text" name="email" size="50" id="email" class="form-control">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" class="form-control col-6" id="senha">

                        </div>
                    </div>
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <label>Sexo</label>
                            <br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="masc" name="sexo" value="1">
                                <label class="custom-control-label" for="masc">Masculino</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fem" name="sexo" value="2">
                                <label class="custom-control-label" for="fem">Feminino</label>
                            </div>
                            <br>
                            <label>Perfil</label>
                            <br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="user" name="perfil_idperfil" value="2">
                                <label class="custom-control-label" for="user">Funcionário</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="cli" name="perfil_idperfil" value="3">
                                <label class="custom-control-label" for="cli">Cliente</label>
                            </div>
                            <br>
                            <br>
                            <button type="reset" class="btn btn-warning">Limpar</button>
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <center>
        <?php
        if (!empty($_GET["msg"])) {
            echo $_GET["msg"];
        }
        ?>
    </center>
    </body>
</html>
