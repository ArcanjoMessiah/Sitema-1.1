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
        <br>
        <br>
        <div class="container">
            <div class="card bg-dark text-white text-center font-weight-bold">
                <div class="card-body">Cadastrar Produto</div>
            </div>
            <br>
            <form action="../controller/cadastrarProdutoController.php" method="post">
                <div class="card-group">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" size="50" id="nome" class="form-control">
                            <label for="categoria">Categoria:</label>
                            <input type="text" name="categoria" id="categoria"  class="form-control col-6 ">
                            <label for="quantidade">Quantidade:</label>
                            <input type="number" name="quantidade" id="quantidade" class="form-control col-6">
                            <label for="preco">Preço do produto: </label>
                            <input type="text" name="preco" id="preco" class= "form-control col-5 dinheiro"> 
                        </div>
                    </div>
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <label for="descricao">Descrição do produto:</label>
                            <input type="text-area" size="200" name="descricao" id="endereco" class="form-control">
                            <label for="datavalidade">Data de validade:</label>
                            <input type="date" name="datavalidade" id="data" class="form-control col-5">
                             
                            <div class="card-body text-white">
                                <label>Tipo</label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="perecivel" name="tipo" value="perecivel">
                                    <label class="custom-control-label" for="perecivel">Perecível</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="nperecivel" name="tipo" value="não perecivel">
                                    <label class="custom-control-label" for="nperecivel">Não perecível</label>
                                </div>
                                <br>
                                <br>
                                <button type="reset" class="btn btn-warning float-left">Limpar</button>
                                <button type="submit" class="btn btn-success float-left" style="margin-left: 5px;">Cadastrar</button>
                            </div>

                        </div>
                        <br>
                        <center>

                        </center>
                        </form>
                        <center>
                            <?php
                            if (!empty($_GET["msg"])) {
                                echo $_GET["msg"];
                            }
                            ?>
                        </center>
                    </div>
                    </body>
                    </html>
