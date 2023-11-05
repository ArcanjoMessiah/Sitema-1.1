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
                $produtos = $produtoDAO->getClientSerch(); 
                            
                  
                ?>
            
                <div class="card bg-dark text-white text-center font-weight-bold">
                    <br>
                    <div class="card-body">
                        Lista de Clientes
                        <a href="pesquisaCliente.php" target="centro" class="btn btn-light btn-sm float-right"
                           data-toggle='tooltip' data-placement='left' title='Pesquisar outro cliente!'>
                            Novo Busca <i class="fas fa-user-check"></i>
                        </a>
                    </div>
                </div>
                <br>
                <table class="table table-borderless table-hover">
                    <thead class="thead-dark text-uppercase">
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Cpf</th>
                            <th>Rg</th>
                            <th>Sexo</th>
                            <th>D. Nascimento</th>
                            <th>Endereco</th>
                            <th>Telefone</th>
                            <th>Alterar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($usuario as $c) {
                        
                        $sexo = $c ['sexo'];
                        
                      
                        if ($sexo ==1) {
                            $sexo = "<img src='../imagens/masculino.png' class='rounded-circle' width='45' data-toggle='tooltip' data-placement='right' title='Masculino!'>";
                        }
                        if ($sexo ==2) {
                            $sexo = "<img src='../imagens/feminino.png' class='rounded-circle' width='45' data-toggle='tooltip' data-placement='left' title='Feminino!'>";
                        }
                            echo "<tr>";
                            echo "  <td>{$c["usuario"]}</td>";
                            echo "  <td>{$c["email"]}</td>";
                            echo "  <td>{$c["cpf"]}</td>";
                            echo "  <td>{$c["rg"]}</td>";
                            echo "  <td>$sexo</td>";
                            echo "  <td>{$c["datanascimento"]} </td>";
                            echo "  <td>{$c["endereco"]}</td>";
                            echo "  <td>{$c["telefone"]}</td>";
                            echo "  <td class='text-center'><a href='../View/formAlterarCliente.php?id={$c["idusuario"]}' data-toggle='tooltip' data-placement='top' title='Editar Cliente!'><i class='fas fa-user-edit text-dark'></i></a></td>";
                            echo "  <td class='text-center'><a href='../controller/excluirClienteByIdController.php?id={$c["idusuario"]}' data-toggle='tooltip' data-placement='top' title='Excluir Cliente.'><i class='fas fa-trash-alt text-danger'></i></a></td>";
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
