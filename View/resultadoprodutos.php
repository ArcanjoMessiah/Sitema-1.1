<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '../webcomplementes.html';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <div class="container">
           
                <?php
                require_once '../dao/ProdutoDAO.php';
                
                
                $produtoDAO = new ProdutoDAO();
                $produtos = $produtoDAO->serchProduto($where); 
                            
                  
                ?>
            
                <div class="card bg-dark text-white text-center font-weight-bold">
                    <br>
                    <div class="card-body">
                        Lista de Produtos
                        <a href="pesquisarProduto.php" target="centro" class="btn btn-light btn-sm float-right"
                           data-toggle='tooltip' data-placement='left' title='Buscar mais produtos!'>
                            Novo Busca <i class="fas fa-user-check"></i>
                        </a>
                    </div>
                </div>
                <br>
                <table class="table table-borderless table-hover">
                    <thead class="thead-dark text-uppercase">
                        <tr style="align:center">
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Quantidade</th>
                            <th>Descrição</th>
                            <th style="width:15%">Preço</th>
                            <th>Data de Validade</th>
                            <th>Tipo</th>
                            <th>Selecionar</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($produtos as $p) {
                        $p["idproduto"];
                            echo "<tr>";
                            echo "  <td>{$p["nome"]}</td>";
                            echo "  <td>{$p["categoria"]}</td>";
                            echo "  <td>{$p["quantidade"]}</td>";
                            echo "  <td>{$p["descricao"]}</td>";
                            echo "  <td class= 'dinheiro'>{$p["preco"]}</td> ";
                            echo "  <td>", dateUStoDateBR($p["datavalidade"]), "</td>";
                            echo "  <td>{$p["tipo"]}</td>";
                            echo "  <td </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
        
        </div>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
                $(".dinheiro").maskMoney();
            });
        </script>
    </body>
</html>
