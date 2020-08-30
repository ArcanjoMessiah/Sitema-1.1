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
                require_once '../dao/ProdutoDAO.php';
                
                
                $produtoDAO = new ProdutoDAO();
                $produtos = $produtoDAO->getAllProduto(); 
                
                
                  
                ?>
            
                <div class="card bg-dark text-white text-center font-weight-bold">
                    <div class="card-body">
                        Lista de Produtos
                        <a href="carrinho.php" target="centro" class="btn btn-light btn-sm float-right"
                           data-toggle='tooltip' data-placement='left' title='Acessar meu carrinho'>
                            Carrinho <i class="fas fa-cart-arrow-down" data-toggle='tooltip' data-placement='top' title='Meu Carrinho'></i>
                        </a>
                    </div>
                </div>
                <br>
                <form class="forma-control form-group" action="carrinho.php" method="post">
                <table class="table table-borderless table-hover">
                    <thead class="thead-dark text-uppercase">
                        <tr style="align:center">
                            <th>Produto</th>                                                       
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th style="width:15%">Preço</th>                            
                            <th>Selecionar</th>
                        </tr>
                    </thead>
                    <button type="submit" class="btn btn-success float-right" data-toggle='tooltip' data-placement='top' title='Adicionar produtos selecionados ao carrinho '>Adicionar ao carrinho</button>
                    <tbody>
                        <?php
                        foreach ($produtos as $p) {
                        $produto= $p["idproduto"];  
                        
                            echo "<tr>";
                            echo "  <td>{$p["nome"]}</td>";
                            echo "  <td>{$p["descricao"]}</td>";
                            echo "  <td><input type='number' class='form-control form-group col-3' name='quantidade' value='1'> </td>";
                            echo "  <td class= 'dinheiro'>{$p["preco"]}</td> ";
                            
                            echo "  <td class='text-center'>
    <input type='checkbox' class='custom-control-input custom-checkbox' id='check' name='item[]' value='$produto'><label class='custom-control-label' for='check'> </td>";
                            echo "</tr>";                           
                           
                        }
                        ?>
                        
                    </tbody>
                </table>
                    <button type="submit" class="btn btn-success float-right" data-toggle='tooltip' data-placement='top' title='Adicionar produtos selecionados ao carrinho '>Adicionar ao carrinho</button>
        </form>
        </div>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
                $(".dinheiro").maskMoney();
            });
        </script>
    </body>
</html>
