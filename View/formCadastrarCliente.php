<!DOCTYPE html>
<?php
include_once '../webcomplementes.html';

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <br>
        <br>
        <div class="container">
            <div class="card bg-dark text-white text-center font-weight-bold">
                <div class="card-body">Cadastrar Cliente</div>
            </div>
            <br>
            
            <form action="../controller/cadastraClienteController.php" method="post">
                <div class="card-group">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                             <div class="custom-control custom-radio custom-control-inline">
                                 <input type="radio" class="custom-control-input" id="client" name="perfil_idperfil" value="3" checked="" >
                                <label class="custom-control-label" for="client">Cliente</label>
                            </div>
                            <br>                                                          
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
                            <div class="custom-control custom-radio custom-control-inline" 
                                 style="margin-top:2px; ">
                                <input type="radio" class="custom-control-input" id="masc" name="sexo" value="1">
                                <label class="custom-control-label" for="masc">Masculino</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fem" name="sexo" value="2">
                                <label class="custom-control-label" for="fem">Feminino</label>
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
            <center>
                <?php
                if (!empty($_GET["msg"])) {
                    echo $_GET["msg"];
                }
                ?>
            </center>
        </div>
    </body>
</html>
