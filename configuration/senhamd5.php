<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post">
            <input type="text" placeholder="Digite a sua Senha" name="senhamd5">
            <br>
            <input type="reset" value="Limpar">
            <input type="submit" value="Enviar">
        </form>
        <?php
        $semhamd5 = $_POST['senhamd5'];
        echo "<p>Sua senha no formato normal= $semhamd5</p>";
        echo "<p title='Copie e cole no DB'>Sua senha no formato md5= ".md5($semhamd5)."</p>";
        ?>

    </body>
</html>
