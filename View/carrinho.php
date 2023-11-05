<!DOCTYPE html>
<?php
include_once '../webcomplementes.html';
require_once '../dao/carrinhoDAO.php';
require_once '../dao/produtoDAO.php';
require_once '../dao/usuarioDAO.php';
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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>        
    </head>
    <body>
        <br>
        <br>
        <div class="container">
                <?php
                
     
               
                
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
                            
                            <input type="text" id="id" name="idusuario" class="form-control bg-dark text-center text-dark col-1" readonly="" value="<?php echo $usuario["idusuario"] ?>" size="1%">
                            <label for="id" ></label>                                                     
                            <th>Produto</th>                                                        
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th style="width:15%">Preço</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                    
                        <?php
                        
                        $idusuario;
                        
//Para cada checkbox selecionado
                    foreach($check as $item){
                        $produtos = $item;           

                        
                        foreach ($produtos as $p) {
                        $p["idproduto"];
                        
                        if(($p=["quantidade"])){
                            $p=1;
                        } 
                        
                        $preço= $p["preco"];
                            echo "<tr>";
                            echo "  <td>{$p["nome"]}</td>";                            
                            echo "  <td>{$p["descricao"]}</td>";
                            echo "  <td><input type='number' class='form-control col-3' name='quantidade' value='{$p["quantidade"]}'></td>";
                            echo "  <td class= 'dinheiro'>$preço</td> ";                            
                            echo "</tr>";                            
                            echo "<tr>";
                            echo "<td cowsplan='3' ><input type='number' class='form-control' name='total' value='$total'> </td>";
                            echo "</tr>";
                        }
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
