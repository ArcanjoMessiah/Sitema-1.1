<!DOCTYPE html>
<?php
include_once '../webcomplementes.html';
require_once '../DAO/usuarioDAO.php';
session_start();
$idusuario = $_SESSION["idusuario"];
$usuarioDAO = new UsuarioDAO();
$usuario = $usuarioDAO->getUsuarioById($idusuario);
////////////////////////////////////////////////////////////
$imagem = $usuario["arquivo"];
$sexo = $usuario["sexo"];
$perfil = $usuario["perfil_idperfil"];

if ($imagem == "semImagem") {
    if ($sexo == 1) {
        $sexo = "<a href='trocarImagem.php'><img src='../imagens/masculino.png' class='card-img-top rounded-circle' style='width:30%' data-toggle='tooltip' data-placement='right' title='Trocar Imagem!'></a>";
    }
    if ($sexo == 2) {
        $sexo = "<a href='trocarImagem.php'><img src='../imagens/feminino.png' class='card-img-top rounded-circle' style='width:30%' data-toggle='tooltip' data-placement='left' title='Trocar Imagem!'></a>";
    }
} else {
    $sexo = "<a href='trocarImagem.php'><img src='../upload/$imagem' class='card-img-top rounded-circle' style='width:30%' data-toggle='tooltip' data-placement='right' title='Trocar Imagem!'></a>"; //Image cafdasatrad no banco
}

if ($perfil == 3) {
    $perfil = "Cliente";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
           
                <?php
                require_once '../dao/compraDAO.php';
                require_once '../dao/usuarioDAO.php';
                
                
                $compraDAO = new compraDAO();
                $pedidos = $compraDAO->getAllPedidos(); 
                
               
                  
                ?>
            
            <form class="forma-control form-group" action="detalharPedido.php" method="post">
                <br><br> <table class="table table-borderless table-hover">
                    <thead class="thead-dark text-uppercase">
                        <tr style="align:center">
                            <th>Pedido</th>                                                       
                            <th>ID Cliente</th>
                            <th style="width:15%">Total R$</th> 
                            <th>Situação</th>
                            <th>Selecionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pedidos as $pedido) {
                        $total= $pedido["total"];
                        
                            echo "<tr>";
                            echo "  <td>{$pedido["id"]}</td>";
                            echo "  <td>{$pedido["usuario"]}</td>";                            
                            echo "  <td > R$ $total </td> ";  
                            echo "  <td > {$pedido["entrega"]} </td> ";                              
                            echo "  <td class='text-center'>  <input type='checkbox' name='item[]' value='". $pedido['id'] . "'> </td>";
                                                                                                                                                                           
                            echo "</tr>";                           
                           
                        }
                        ?>
                        
                    </tbody>
                </table>
                    <button  id="wishlist" type="submit" class="btn btn-success float-right" data-toggle='tooltip' data-placement='top' title='Detalhar itens do pedido '>Atender pedido <i class="fas fa-cart-arrow-down" data-toggle='tooltip' data-placement='top' title='Conferir o o pedido do cliente'></i></button>
        </form>
            <br>
            <br>
            <br>
        </div>
 
      
