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
        
        <br>
        <br>
        <div class="container">
            <div class="card bg-dark text-white text-center font-weight-bold">
                <div class="card-body">Cadastrar Usuário</div>
            </div>
            <br>
            <form action="../controller/cadastraUsuarioController.php" method="post">
                <div class="card-group">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" size="50" id="nome" class="form-control">
                            <label for="senha">Senha:</label>
                            <input type="password" name="senha" id="senha" class="form-control col-6">
                            
                        </div>
                    </div>
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <div class="custom-control custom-radio custom-control-inline" 
                                 style="margin-top:2px; ">
                                <input type="radio" class="custom-control-input" id="Administrador" name="perfil" value="1">
                                <label class="custom-control-label" for="1">Administrador</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="Usuario" name="perfil" value="2">
                                <label class="custom-control-label" for="2">Funcionário</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="Cliente" name="perfil" value="3">
                                <label class="custom-control-label" for="3">Cliente</label>
                            </div>
                            <br>
                            <div class="custom-control custom-radio custom-control-inline" 
                                 style="margin-top:2px; ">
                                <input type="radio" class="custom-control-input" id="masc" name="sexo" value="1">
                                <label class="custom-control-label" for="1">Masculino</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fem" name="sexo" value="2">
                                <label class="custom-control-label" for="2">Feminino</label>
                            </div>
                            <br>
                            <br>
                            <button type="reset" class="btn btn-warning float-left">Limpar</button>
                            <button type="submit" class="btn btn-success float-left" style="margin-left: 5px;">Cadastrar</button>
                        </div>
                    </div>
                </div>
                <br>
                <center>

                </center>
            </form>
        <form action="../controller/cadastraUsuarioController.php" method="post">
            <label>Nome</label>
            <input type="text" name="usuario">
            <br>
            <label>Senha</label>
            <input type="password" name="senha">
            <br>
            <label>Sexo</label>
            Masculino<input type="radio" name="sexo" value="1">
            Feminino<input type="radio" name="sexo" value="2">
            <br>
            <label>Perfil</label>
            Administrador<input type="radio" name="perfil_idperfil" value="1">
            Usuário<input type="radio" name="perfil_idperfil" value="2">
            Cliente<input type="radio" name="perfil_idperfil" value="3">
            <br>
            <input type='submit' value='Enviar'>
        </form>
    <center>
        <?php
        if (!empty($_GET["msg"])) {
            echo $_GET["msg"];
        }
        ?>
    </center>
</body>
</html>
