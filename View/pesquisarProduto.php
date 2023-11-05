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

                        </div>
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
