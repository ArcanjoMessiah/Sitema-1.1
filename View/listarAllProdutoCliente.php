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
                    <tbody>
                        <?php
                        foreach ($produtos as $p) {
                        $produto= $p["idproduto"];  
                            echo "<tr>";
                            echo "  <td>{$p["nome"]}</td>";
                            echo "  <td>{$p["descricao"]}</td>";
                            echo "  <td><input type='number' class='form-control form-group col-4' id='quantidade". $produto ."' name='quantidade' value='0'> </td>";
                            echo "  <td > R$ {$p["preco"]}</td> ";                            
                            echo "  <td class='text-center'>  <input type='checkbox' class='custom-control-input custom-checkbox' id='check". $produto ."' name='item[]' value='{\"id\": $produto, \"nome\": \"". $p["nome"] ."\", \"preco\": \"". $p["preco"] ."\"}'><label class='custom-control-label' for='check". $produto ."'> </td>";
                            echo "</tr>";                           
                           
                        }
                        ?>
                        
                    </tbody>
                </table>
                    <button  id="wishlist" type="button" class="btn btn-success float-right" data-toggle='tooltip' data-placement='top' title='Adicionar produtos selecionados ao carrinho '>Adicionar ao carrinho <i class="fas fa-cart-arrow-down" data-toggle='tooltip' data-placement='top' title='Meu Carrinho'></i></button>
        </form>
        </div>

        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Opa!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Produto adicionado com sucesso!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="button-ok" class="btn btn-primary">Ok</button>
                </div>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function () {
                $(".dinheiro").maskMoney();
            });

            $('#wishlist').click((val) => {
                const lista = [];
                $('input[type=checkbox]').each(function(index, element) {
                    if(element.checked) {
                        let produto = JSON.parse(element.value);
                        produto.quantidade = $('#quantidade' + produto.id).val();
                        lista.push(produto);
                    }
                })
                window.localStorage.setItem('lista', JSON.stringify(lista));
                $(".modal").show();
            });

            $("#button-ok").click(function() {
                $(".modal").hide();
                window.location.href ="../View/principal.php"; // Redireciona para a página principal.php            
            })
        </script>
    </body>
</html>

