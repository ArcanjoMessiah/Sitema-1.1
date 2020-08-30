<!DOCTYPE html>
<?php
include_once '../webcomplementes.html';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <?php
    require_once '../dao/usuarioDAO.php';
    

    $idusuario = $_GET["id"];
    $usuarioDAO = new usuarioDAO();
    $usuario = $usuarioDAO->getUsuarioById($idusuario);
    ?>
    <body>
        <div class="container">
            <form action="../controller/alterarUsuarioController.php" method="post">
                <div class="card bg-dark text-light text-center font-weight-bold">
                    <div class="card-body">Editar Usuario</div>
                </div>
                <br>
                <div class="card-group">
                    <div class="card bg-dark text-light">
                        <div class="card-body">
                            <label for="id">ID</label>
                            <input type="text" id="id" name="idusuario" class="form-control col-2"readonly="" value="<?php echo $usuario["idusuario"] ?>">
                            <label for="usuario">Nome</label>
                            <input type="text" name="usuario" class="form-control" id="usuario" value="<?php echo $usuario ["usuario"] ?>">
                            <label for="email"> E-mail</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?php echo $usuario ["email"] ?>" size="40"">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control col-5" id="cpf" value="<?php echo $usuario ["cpf"] ?>" >
                            <label for="rg">RG</label>
                            <input type="text" name="rg" class="form-control col-5" id="rg" value="<?php echo $usuario ["rg"] ?>" >
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control col-5" id="senha" value="<?php echo $usuario ["senha"] ?>" name="senha">
                            
                        </div>
                    </div>
                    <div class="card bg-dark text-light">
                        <div class="card-body">
                            
                            <label for="endereco">Endereço:</label>
                            <input type="text" size="60" name="endereco" id="endereco" class="form-control" value="<?php echo $usuario["endereco"]; ?>">
                            <label for="email">Telefone</label>
                            <input type="text" name="telefone" class="form-control col-6" id="telefone" value="<?php echo $usuario["telefone"]; ?>">
                            <label for="datanacimento">Data de Nascimento:</label>
                            <input type="date" name="datanascimento" id="datanacimento" class="form-control col-5" value="<?php echo $usuario["datanascimento"]; ?>">
                            <br>
                           
                            <?php
                                error_reporting(0);
                            if ($usuario["sexo"] == "1") {
                                $checkedmasc = "checked";
                               
                            } else {
                                $checkedfem = "checked";
                                
                            }
                            ?>
                            <br>
                            <label>Sexo</label>
                            <br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio" name="sexo" value="1" <?php echo $checkedmasc; ?>>
                                <label class="custom-control-label" for="customRadio">Masculino</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio2" name="sexo" value="2" <?php echo $checkedfem; ?>>
                                <label class="custom-control-label" for="customRadio2">Feminino</label>
                            </div>
                            <br>
                            <?php
                                error_reporting(0);
                            if ($usuario["perfil_idperfil"] == "1") {
                                $adm = "checked";
                               
                            } 
                            if ($usuario["perfil_idperfil"] == "2") {
                                $user = "checked";
                               
                            } 
                            if ($usuario["perfil_idperfil"] == "3") {
                                $client = "checked";
                                
                            }?>
                            <label>Perfil</label>
                            <br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="adm" name="perfil_idperfil" value="1"<?php echo $adm; ?>>
                                <label class="custom-control-label" for="adm">Administrador</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="user" name="perfil_idperfil" value="2"<?php echo $user; ?>>
                                <label class="custom-control-label" for="user">Usuário</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="client" name="perfil_idperfil" value="3"<?php echo $client; ?>>
                                <label class="custom-control-label" for="client">Cliente</label>
                            </div>
                            <br><br>    
                            <a href="../view/listarAllUsuario.php" class="btn btn-warning">Voltar</a>
                            <button type="submit" class="btn btn-primary">Editar</button>
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
