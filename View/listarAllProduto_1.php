<!DOCTYPE html>
<?php
include_once '../webcomplementes.html';

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
           
                <?php
                require_once '../dao/ProdutoDAO.php';
                include '../Mascaras.php';             
                $mascara= "R$ ###.###,##";
                
                $produtoDAO = new ProdutoDAO();
                $produtos = $produtoDAO->getAllProduto(); 
                
                
                  
                ?>
            
                <div class="card bg-dark text-white 
                     text-center font-weight-bold">
                    <div class="card-body">
                        Lista de Produtos
                        <a href="pesquisarProduto.php" target="centro" class="btn btn-light btn-sm float-right"
                           data-toggle='tooltip' data-placement='left' title='Pesquisar um produto!'>
                            Pesquisar Produto <i class="fas fa-user-check"></i>
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
                            <th>Alterar</th>
                            <th>Excluir</th>
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
                            echo "  <td>{$p["datavalidade"]}</td>";
                            echo "  <td>{$p["tipo"]}</td>";
                            echo "  <td class='text-center'><a href='../view/formAlterarProduto.php?id={$p["idproduto"]}' data-toggle='tooltip' data-placement='top' title='Editar Produto!' onclick=\"return confirm('Tem certeza que deseja Editar  o Produto!: {$p["nome"]}'); return false;\" ><i class='fas fa-user-edit text-dark'></i></a></td>";
                            echo "  <td class='text-center'><a href='../controller/excluirProdutoByIdController.php?id={$p["idproduto"]}' data-toggle='tooltip' data-placement='top' title='Excluir Produto!!'  onclick=\"return confirm('Tem certeza que deseja Excluir o Produto!: {$p["nome"]}'); return false;\"><i class='fas fa-trash-alt text-danger'></i></a></td>";
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
