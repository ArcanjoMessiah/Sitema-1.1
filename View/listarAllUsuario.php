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
            <div class="card bg-dark text-white 
                 text-center font-weight-bold">
                <div class="card-body">
                    Lista de Usuários
                    <a href="formCadastroUsuario.php" target="centro" class="btn btn-light btn-sm float-right"
                       data-toggle='tooltip' data-placement='left' title='Cadastrar novo Usuário!'>
                        Novo Usuário <i class="fas fa-user-check"></i>
                    </a>
                </div>
            </div>
            <br>
            <?php
            require_once '../dao/usuarioDAO.php';
            $usuarioDAO = new UsuarioDAO();
            $usuarios = $usuarioDAO->getAllUsuario();
            ?>
            <!--// listar todos os Usuários--><div>
            <table class="table table-borderless table-hover">
                <thead class="thead-dark text-uppercase">
                    <tr>                        
                        <th>Usuário</th>
                        <th>Perfil</th>
                        <th>E-mail</th>
                        <th>Cpf</th>
                        <th>Rg</th>
                        <th><i class="fas fa-birthday-cake" data-toggle="tooltip" data-placement="right" title="Data de Nascimento!"></i></th>
                        <th>Telefone</th>
                        <th>Endereço</th>                            
                        <th class="text-center">Sexo</th>
                        <th class="text-center">Alterar</th>
                        <th class="text-center">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($usuarios as $u) {
                        $perfil = $u['perfil_idperfil'];
                        $sexo = $u ['sexo'];
                        $email = $u['email'];

                        if ($perfil == 1) {
                            $perfil = "<b class='text-success'>Admin</b>";
                        }
                        if ($perfil == 2) {
                            $perfil = "<b class='text-danger'>Usuário</b>";
                        }
                        if ($perfil == 3) {
                            $perfil = "<b class='text-primary'>Cliente</b>";
                        }                        
                        if ($sexo == 1) {
                            $sexo = "<img src='../imagens/masculino.png' class='rounded-circle' width='45' data-toggle='tooltip' data-placement='right' title='Masculino!'>";
                        }
                        if ($sexo == 2) {
                            $sexo = "<img src='../imagens/feminino.png' class='rounded-circle' width='45' data-toggle='tooltip' data-placement='left' title='Feminino!'>";
                        }

                        $u["idusuario"];
                        echo"<tr>";                        
                        echo"<td> {$u["usuario"]} </td>";                        
                        echo"<td> $perfil </td>";
                        echo"<td>{$u["email"]}</td>";
                        echo"<td> {$u["cpf"]} </td>";
                        echo"<td> {$u["rg"]} </td>";
                        echo"<td> <i class='fas fa-birthday-cake' data-toggle='tooltip' data-placement='right' title='{$u["datanascimento"]}'></i></td>";
                        echo"<td> {$u["telefone"]} </td>";
                        echo"<td> {$u["endereco"]} </td>";
                        echo"<td class='text-center'> $sexo </td>";
                        echo "<td class='text-center'>
                        <a href='../view/formAlterarUsuario.php?id={$u["idusuario"]}' onclick=\"return confirm('Tem certeza que deseja Editar  o Usuário: {$u["usuario"]}'); return false;\">
                            <i class='fas fa-user-edit text-dark' data-toggle='tooltip' data-placement='left' title='Editar: {$u["usuario"]}!'></i>
                        </a>
                        </td>";
                        echo"<td class='text-center'>
                        <a href='../controller/excluirUsuarioByIdController.php?id={$u["idusuario"]}' onclick=\"return confirm('Tem certeza que deseja Excluir  o Usuário: {$u["usuario"]}'); return false;\">
                            <i class='fas fa-trash-alt text-danger' data-toggle='tooltip' data-placement='right' title='Excluir: {$u["usuario"]}?'></i>
                        </a>
                        </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>
