<!DOCTYPE html>
<?php
include_once '../webcomplementes.html';
$perfil_idperfil= "3";
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
            <div class="card bg-dark text-white text-center font-weight-bold">
                <div class="card-body">Alterar Cliente</div>
            </div>

            <form action="../controller/alterarClienteController.php" method="post">
                <div class="card-group"> 
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <label for="id">ID</label>
                            <input type="text" id="id" name="idusuario" class="form-control col-2"readonly="" value="<?php echo $usuario["idusuario"] ?>">

                            <label for="usuario">Nome</label>
                            <input type="text" name="usuario" size="50" id="nome" class="form-control" value="<?php echo $usuario["usuario"] ?>" size="50"/>

                            <label for="email">E-mail</label>
                            <input type="text" name="email" size="50" id="email" class="form-control" value="<?php echo $usuario["email"] ?>" size="40"/>

                            <label for="senha">Senha</label>
                            <input type="password" name="senha" class="form-control col-6" id="senha" value="<?php echo $usuario["senha"];  ?>">

                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control col-6" value="<?php echo $usuario["cpf"] ?>"/>

                            <label for="rg">RG</label>
                            <input type="text" name="rg" id="rg" class="form-control col-6" value="<?php echo $usuario["rg"] ?>"/>
                        </div>
                    </div>
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <label for="endereco">Endereço:</label>
                            <input type="text" size="60" name="endereco" id="endereco" class="form-control" value="<?php echo $usuario["endereco"]; ?>">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" class="form-control col-5" value="<?php echo $usuario["telefone"]; ?>">
                            <label for="datanascimento">Data de Nascimento</label>
                            <input type="date" name="datanascimento" id="datanascimento" class="form-control col-5" value="<?php echo $usuario["datanascimento"]; ?>"/>
                            <br>
                            <label for="sexo">Sexo</label>

                            <?php if ($usuario["sexo"] == "1") { ?>
                                <div class="custom-control custom-radio custom-control-inline" 
                                     style="margin-top:2px; ">
                                    <input type="radio" checked="Masculino" class="custom-control-input" id="masc" name="sexo" value="1">
                                    <label class="custom-control-label" for="masc">Masculino</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="fem" name="sexo" value="2">
                                    <label class="custom-control-label" for="fem">Feminino</label>
                                </div><?php } else {
                                ?>
                                <div class="custom-control custom-radio custom-control-inline" 
                                     style="margin-top:2px; ">
                                    <input type="radio"  class="custom-control-input" id="masc" name="sexo" value="1">
                                    <label class="custom-control-label" for="masc">Masculino</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" checked="Feminino" class="custom-control-input" id="fem" name="sexo" value="2">
                                    <label class="custom-control-label" for="fem">Feminino</label>
                                </div><?php
                            }
                            ?><br>
                                                   

                            <a href="../view/listarAllCliente.php" class="btn btn-warning" style="margin-left: 5px;">Voltar</a> 
                            <button type="submit" class="btn btn-success float-left" style="margin-left: 5px;">Alterar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </body>
</html>
