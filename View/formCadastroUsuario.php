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
                            <label for="usuario">Nome:</label>
                            <input type="text" name="usuario" size="50" id="usuario" class="form-control">
                            <label for="email">E-mail:</label>
                            <input type="text" name="email" size="50" id="email" class="form-control">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" class="form-control col-6" id="senha">
                            <label for="cpf">CPF:</label>
                            <input type="text" name="cpf" id="cpf" class="form-control col-6">
                            <label for="rg">RG:</label>
                            <input type="text" name="rg" id="rg" class="form-control col-6">
                        </div>
                    </div>
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <label for="endereco">Endereço:</label>
                            <input type="text" size="60" name="endereco" id="endereco" class="form-control">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" class="form-control col-5">
                            <label for="datanacimento">Data de Nascimento:</label>
                            <input type="date" name="datanascimento" id="datanacimento" class="form-control col-5">
                            <br>
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
                            <select name="perfil" class="custom-select custom-control col-5">
                                <option selected>Perfil</option>
                                <option value="1">Administrador</option>
                                <option value="2">Usuário</option>
                                <option value="3">Cliente</option>
                            </select>

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
