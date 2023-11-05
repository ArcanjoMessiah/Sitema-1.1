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
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark  fixed-top">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="#">
                <img src="../imagens/logoMBO.png" alt="logo" style="width:50px;">
            </a>
            <a class="navbar-brand" href="#">
                <?php
                
                if( $_SESSION["perfil"]=="Usuário"){
                    
                    echo "Funcionário";
                }
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
                        <a class="dropdown-item" href="../View/listarAllCliente.php" target="centro">Listar Cliente</a>
                        <a class="dropdown-item" href="../view/formCadastrarCliente.php" target="centro">Cadastrar Cliente</a>
                        
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                        Funcionário
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="listarAllUsuario.php" target="centro">Listar Usuários</a>
                        <a class="dropdown-item" href="../View/formCadastroUsuarioByuser.php" target="centro">Cadastrar Usuário</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                        Produtos
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../view/listarAllProduto.php" target="centro">Listar Produtos</a>
                        <a class="dropdown-item" href="../view/formCadastrarProduto.php" target="centro">Cadastrar Produtos</a>
                        <a class="dropdown-item" href="../view/pesquisarProduto.php" target="centro">Buscar Produto </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                        Pedidos
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../view/listarAllPedidos.php" target="centro">Listar Pedidos</a>
                        
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
