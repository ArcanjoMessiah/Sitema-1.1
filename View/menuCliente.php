<!DOCTYPE html>
<?php
include_once '../webcomplementes.html';
session_start()
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cliente</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark  fixed-top">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="#">
                <img src="../imagens/logoMBO.png" alt="logo" style="width:50px;">
            </a>
            <a class="navbar-brand" href="#">
                <?php
                
                $_SESSION["perfil"];
                
                echo $_SESSION["perfil"];
                    
                    
                ?>
            </a>
            <!-- Links -->
            <ul class="navbar-nav">
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                        Cliente
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../view/informacoesUsuario.php" target="centro">Atualizar cadastro</a>
                    </li>   
                     <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                        Produtos
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="listarAllProduto_1.php" target="centro">Listar Produtos</a>
                        <a class="dropdown-item" href="pesquisarProduto.php" target="centro">Buscar Produto </a>
                    </div>
                     </li>
                     <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                        Carrinho
                    </a>   
                        <a class = "dropdown-item" href = "carrinho.php?idusuario=<?php echo $_SESSION["idusuario"];?>" target = "centro">Meu Carrinho</a>
                        <a class="dropdown-item" href="pesquisarPedidos.php" target="centro">Consultar pedidos</a>
                     </li>
                    </div>
                </li>
            </ul>
            <ul class="nav justify-content-end" style="margin-left: 400px">
                <li class="nav-item">
                    <a class="nav-link text-success text-uppercase " href="#"><i class="fas fa-user-circle" data-toggle="tooltip" data-placement="left" title="Usuário Logado"></i>
                        <?php
                        echo $_SESSION["usuario"];
                        ?> 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../controller/logoffController.php" >
                        <i class="fas fa-sign-out-alt text-danger" title="Sair do Sistema." data-toggle="tooltip" data-placement="bottom"></i></a>
                </li>
            </ul>
        </nav>
        <br>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>
