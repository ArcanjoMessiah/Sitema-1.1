<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="icon" type="image/png" href="../imagens/etcfavicon.png" /><!--Usando faviconIcon na Aba do URL-->
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <title>Home</title>
    </head>
    <body>
        <?php
        session_start();
        include 'validaLogin.php';
        ?> 
        <table width="100%" border='1'>
            <tr>
                <td>
                    <?php
                    switch ($_SESSION["perfil"]) {
                        case "Administrador":
                            include '../view/menuAdministrador.php';
                            break;
                        case "Usuario" :
                            include 'menuUsuario.php';
                            break;
                        case "Cliente";
                            include '../view/menuCliente.php';
                            break;
                        default :
                            echo "Usuário não encontrado";
                    }
                    
                    ?>
                    <br>
                </td>

            </tr>
        </table>
        <table id="tablehome" border='1'>
            <tr>         
                <td>
                    <iframe name="centro" src="centro.php" width="100%" height="100%" frameborder="0"></iframe>
                </td>
            </tr>                
        </table>
        <?php include '../footer.php'; ?>
    </body>
</html>
