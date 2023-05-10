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
        <form id='formComprar' action='../controller/compraClienteController.php' method='post'>
            <input type='hidden' name='produtos' id='produtos'>
        </form>
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
                        <a class="dropdown-item" href="listarAllProdutoCliente.php" target="centro">Listar Produtos</a>
                        
                    </div>
                     </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                            Carrinho
                        </a>
                        <div class="dropdown-menu dropbox-custom" id="pedido-list">
                            Não há produtos no seu carrinho 😢
                        </div>
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
        
<script>


            if (window.addEventListener) {
                window.addEventListener("storage", buscarItems, false);
            } else {
                window.attachEvent("onstorage", buscarItems);
            };

            function comprar() {
                $('#formComprar').submit();
            }


            function buscarItems() {
                let listaCompras = window.localStorage.getItem('lista');
                let apresentaLista = "";
                if(listaCompras !== "") {
                    listaCompras = JSON.parse(listaCompras);
                    $('#produtos').val('');
                }
                if(listaCompras.length > 0) {
                    listaCompras.map(function(item, index) {
                        apresentaLista += item.quantidade + "x " + item.nome + " - <a onClick='removerItem("+ index +")' class='link-menu'>remover<a/><br/>";
                        let betweenValues = '';
                        if(index !== 0) betweenValues = '-';
                        $('#produtos').val($('#produtos').val() + betweenValues + JSON.stringify(item));
                        if(listaCompras.length === (index + 1)) {
                            apresentaLista += "<br><a class='link-menu' onClick='comprar()'>Finalizar Compra<a/>";
                            $("#pedido-list").html(apresentaLista);
                        }
                    });
                }else{
                    $('#produtos').val('');
                    $("#pedido-list").html("Não há produtos no seu carrinho 😢")
                }
            }

            $(document).ready(function () {
                buscarItems();
            });

            function removerItem(item) {
                let listaCompras = window.localStorage.getItem('lista');
                listaCompras = JSON.parse(listaCompras)
                listaCompras.splice(item, 1);
                window.localStorage.setItem('lista', JSON.stringify(listaCompras));
                buscarItems();
            }
</script>
    </body>
</html>
