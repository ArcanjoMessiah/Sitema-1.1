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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

        <div class="container">
            
            <div class="card bg-dark text-white text-center font-weight-bold" ">
                <div class="card-body">Pesquisar Cliente</div>
            </div>
            <br>
            <form action="../controller/resultadoCliente.php" method="post">
                <div class="card-group" >
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <label for="n">Nome:</label>
                            <input type="text" name="usuario" size="70" id="nome" class="form-control col-10">
                            <label for="email">E-mail:</label>
                            <input type="text" name="email" size="70" id="email" class="form-control col-10">
                            <label for="cpf">CPF:</label>
                            <input type="text" name="cpf" id="cpf"  class="form-control col-6 ">
                            <label for="cpf">RG:</label>
                            <input type="text" name="cpf" id="rg"  class="form-control col-6 ">

                        </div>
                    </div>
                    <div class="card-body bg-dark text-white">
                        <label for="datanacimento">Data de Nascimento:</label>
                            <input type="date" name="datanascimento" id="datanacimento" class="form-control col-5">
                            <br>
                            <label>Sexo</label>
                            <br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="masc" name="sexo" value="1">
                                <label class="custom-control-label" for="masc">Masculino</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fem" name="sexo" value="2">
                                <label class="custom-control-label" for="fem">Feminino</label>
                            </div>
                            <br>
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
