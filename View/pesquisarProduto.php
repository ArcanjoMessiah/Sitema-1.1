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
            
            <div class="card bg-dark text-white text-center font-weight-bold" ">
                <div class="card-body">Buscar Produto</div>
            </div>
            <br>
            <form action="../View/resultadoprodutos.php" method="post">
                <div class="card-group" >
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <label for="n">Nome:</label>
                            <input type="text" name="n" size="70" id="nome" class="form-control col-12">
                            <label for="c">Categoria:</label>
                            <input type="text" name="c" id="categoria"  class="form-control col-6 ">

                        </div>
                    </div>
                    <div class="card-body bg-dark text-white">
                        <label>Tipo</label>
                        <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="perecivel" name="t" value="pereceivel">
                            <label class="custom-control-label" for="perecivel">Perecível</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="nperecivel" name="t" value="não perecivel">
                            <label class="custom-control-label" for="nperecivel">Não perecível</label>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <button type="reset" class="btn btn-warning float-left">Limpar</button>
                        <button type="submit" class="btn btn-success float-left" style="margin-left: 5px;">Pesquisar</button>
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
