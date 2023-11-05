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
            require_once '../dao/usuarioDAO.php';
            require_once '../dao/compraDAO.php';
             require_once '../dto/compraDTO.php';
            require_once '../dao/compra_has_produtoDAO.php';

            $total = 0;
            $_checkbox = $_POST['item'];
            
            $CompraDTO = new compraDTO;
            $CompraDTO ->setIdcompra(end($_checkbox));
                   
            $compra_has_produtoDAO = new compra_has_produtoDAO();
            $pedido = $compra_has_produtoDAO->detalharPedido($CompraDTO);
            ?>


            <br><br><table  class="table table-borderless table-hover">
                <thead class="thead-dark text-uppercase">
                    <tr style="align:center">
                        <th>Pedido</th>                                                       
                        <th>Produtos</th>
                        <th style="width:15%">Quantidade</th> 
                        <th>Cliente</th>
                        <th>Situação atual</th>
                        <th>Endereço de entrega</th>
                        <th>Pagamento</th>
                        <th>Entrega</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pedido as $itens) {

                        echo "<tr>";
                        echo "  <td>{$itens["id"]}</td>";
                        echo "  <td>{$itens["nome"]}</td>";
                        echo "  <td>{$itens["quantidade"]}</td>";
                        echo "  <td>{$itens["usuario"]}</td>";
                        if (empty($itens["entrega"]))
                        {
                            echo "<td> <img src='../Imagens/entregue.png' width='100' height = '100'></a></td>";
                        }
                        else
                        {
                            echo "<td> <img src='../Imagens/pendente.png' width='100' height = '100'></a></td>";
                             
                        }
                        
                        echo "<td> <a href='AlterarPaciente.php?id=" . $itens["id"] . "'><img src='../Imagens/endereco.png' width='100' height = '100'></a></td>";
                        
                        echo "<td> <a href='Pagamento.php?id=" . $itens["id"] . "'><img src='../Imagens/pagamento.png' width='100' height = '100'></a></td>"; 
                        echo "<td> <a href='Entrega.php?id=" . $itens["id"] . "'><img src='../Imagens/entrega.png' width='100' height = '70'></a></td>";
    
                        echo "</tr>";
                        
                        $total = $total + $itens["total"];
                    }
                    echo "<tr>";
                    echo "  <td colspan='8'> R$ $total </td> ";
                    echo "</tr>";
                    ?>

                </tbody>
            </table>
            <a href="../view/listarAllPedidos.php" class="btn btn-warning">Voltar</a>


        </div>


