<!DOCTYPE html>
<?php
include_once '../webcomplementes.html';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <?php
    require_once '../dao/produtoDAO.php';
    

    $idproduto = $_GET["id"];
    $produtoDAO = new ProdutoDAO();
    $produto = $produtoDAO->getProdutoById($idproduto);
    ?>
    <body>
        <div class="container">
            <form action="../controller/alterarProdutoController.php" method="post">
                <div class="card bg-dark text-light text-center font-weight-bold">
                    <div class="card-body">Editar Usuario</div>
                </div>
                <br>
                <div class="card-group">
                    <div class="card bg-dark text-light">
                        <div class="card-body">
                            <label for="id">ID</label>
                            <input type="text" id="id" name="idproduto" class="form-control col-2" readonly="" value="<?php echo $produto["idproduto"] ?>">
                            <div class="card bg-dark text-white">                        
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" size="50" id="nome" class="form-control" value="<?php echo $produto["nome"] ?>">
                            <label for="categoria">Categoria:</label>
                            <input type="text" name="categoria" id="categoria"  class="form-control col-6 " value="<?php echo $produto["categoria"] ?>">
                            <label for="quantidade">Quantidade:</label>
                            <input type="number" name="quantidade" id="quantidade" class="form-control col-6" value="<?php echo $produto["quantidade"] ?>">
                            <label for="preco">Preço do produto: </label>
                            <input type="text" name="preco" id="preco" class= "form-control col-5 dinheiro" value="<?php echo $produto["preco"] ?>"> 
                        
                    </div>
                        </div>
                    </div>
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <label for="descricao">Descrição do produto:</label>
                            <input type="text-area" size="200" name="descricao" id="endereco" class="form-control" value="<?php echo $produto["descricao"] ?>">
                            <label for="datavalidade">Data de validade:</label>
                            <input type="date" name="datavalidade" id="data" class="form-control col-5" value="<?php echo $produto["datavalidade"] ?>">
                             
                            <div class="card-body text-white">
                                
                            <?php
                                error_reporting(0);
                            if ($produto["tipo"] == "perecivel") {
                                $checkedp = "checked";
                               
                            } else {
                                $checkednp = "checked";
                                
                            }
                            ?>
                            <br>
                            <label>Tipo</label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="perecivel" name="tipo" value="pereceivel"  <?php echo $checkedp; ?>>
                                    <label class="custom-control-label" for="perecivel">Perecível</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="nperecivel" name="tipo" value="não perecivel" <?php echo $checkednp; ?>>
                                    <label class="custom-control-label" for="nperecivel">Não perecível</label>
                                </div>
                            <br>
                            
                            <br><br>    
                            <a href="../view/listarAllProduto.php" class="btn btn-warning">Voltar</a>
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                    </div>
                </div>

            </form>   
        </div>
        <center>
        <?php
        if (!empty($_GET["msg"])) {
            echo $_GET["msg"];
        }
        ?>
    </center>
    </body>
</html>
