<!DOCTYPE html>
<?php
include_once '../webcomplementes.html';
session_start();
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
                <?php
                $idusuario=$_GET["idusuario"];
                require_once '../dao/carrinhoDAO.php';
     
                $carrinhoDAO = new carrinhoDAO();
                $itens = $carrinhoDAO->getCarrinhoById($idusuario);
                ?>
                <div class="card bg-dark text-white 
                     text-center font-weight-bold">
                    <div class="card-body">
                        Lista de Produtos
                        <a href="carrinho.php"><i class='fas fa-cart-arrow-down float-right text-danger' data-toggle='tooltip' data-placement='top' title='Meu Carrinho'></i></a>
                    </div>
                </div>
                <br>
                <form class="form-control " action="carrinhoController.php" method="post">
                <table class="table table-borderless table-hover">
                    <thead class="thead-dark text-uppercase">
                        <tr style="align:center">
                            <th>Produto</th>                                                        
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th style="width:15%">Preço</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                    <input type="number" class="form-control col-2" value="1">
                        <?php
                        foreach ($produtos as $p) {
                        $p["idproduto"];
                        $q= $_POST["quantidade"];
                        if($q==0){
                            $q=1;
                        } else {
                            $q=  ($q= $_POST["quantidade"]);                           
                        }
                        
                        $preço= $p["preco"];
                            echo "<tr>";
                            echo "  <td>{$p["nome"]}</td>";                            
                            echo "  <td>{$p["descricao"]}</td>";
                            echo "  <td><input type='number' class='form-control col-2' name='quantidade' value='$q'></td>";
                            echo "  <td class= 'dinheiro'>$preço</td> ";                            
                            echo "</tr>";
                           
                        }
                        
                        ?>
                    </tbody>
                </table>
                </form>
        </div>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>
