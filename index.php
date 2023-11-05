<!DOCTYPE html>
<?php
include_once "./webcomplementes.html";
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="icon" type="image/png" href="imagens/etcfavicon.png" /><!--Usando faviconIcon na Aba do URL-->
        <!--<link rel="stylesheet" type="text/css" href="css/estilo.css">-->
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <center>
                <div style="width: 350px;">
                    <p id="logologin">
                        <img src="imagens/logoMBO.png" alt="Logo"/>
                    </p>
                    <div class="card bg-dark text-white" >
                        <div class="card-body-dark text-white">
                            <form action="controller/loginController.php" method="post" >
                                <table class="table table-borderless">
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="text" name="usuario" placeholder="Usuário ou E-mail" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="password" name="senha" placeholder="Senha" class="form-control">
                                        </td>
                                    </tr>                
                                    <tr> 
                                        <td></td>
                                        <td>
                                            <input type="reset" value="Limpar" class="btn btn-primary btn-lg">
                                            <input type="submit" value="Entrar" class="btn btn-success btn-lg">
                                        </td>
                                    </tr>                                                                
                                </table>
                            </form> 
                            <br>
                            <div >
                                <a  href="formCadastrarNovoCliente.php" class="text-white font-weight-bold">Ainda não possui cadastro? Clique aqui!</a>
                            
                            
                            <a href="redefinirSenha.php" class="text-white font-weight-bold">Esqueceu a Senha?Clique aqui!</a>
                           
                            </div>
                            
                        </div>
                    </div>

                </div>
            </center>
        </div>
        <br>
    <center>
        <?php if (!empty($_GET["msg"])) { 
            $mensagem=$_GET["msg"];
            ?>
        <div class="alert alert-dismissible bg-danger text-white font-weight-bold"  style="width: 350px">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Atenção!<br></strong> <?php echo $mensagem;?>
            </div>
        <?php }
        ?>
    </center>
    <?php
    include './footer.php';
    ?>
</body>
</html>
