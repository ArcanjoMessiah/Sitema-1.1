<?php
echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>";
error_reporting(0);
// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = '../upload/';
// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 2048 * 2048 * 6; // 6Mb
// Array com as extensões permitidas
$_UP['extensoes'] = array('PNG','JPGE','JPG','png','jpge','jpg','PDF', 'pdf');
// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = FALSE;
// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite.';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado.';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
    die("Não foi poss񹑬 fazer o upload, erro:" . $_UP['erros'][$_FILES['arquivo']['error']]);
    exit; // Para a execução do script
}
// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
// Faz a verificação da extensão do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
    echo "
          <div class='container'>
          <center>
          <div class='card bg-dark text-light' style='margin-top: 200px;'>
          <div class='card-body text-center'>
          <h4>
          <strong>Atenção!</strong> Por favor, envie arquivos com as seguintes extenção <b style='color:red;'>pdf</b>. Tente de NOVO!</b>
          </h4>
          </div>
          </div>
          </div>
          </center>";
    header('refresh: 8; url=../view/trocarImagem.php');
    die();
}
// Faz a verificação do tamanho do arquivo
if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
    echo "
          <div class='container'>
          <center>
          <div class='card bg-dark text-light' style='margin-top: 200px;'>
          <div class='card-body text-center'>
          <h4>
          <strong>Atenção!</strong> O arquivo enviado é muito grande, envie arquivos de até<b style='color:red;'>6Mb</b>. Tente de NOVO!</b>
          </h4>
          </div>
          </div>
          </div>
          </center>";
    header('refresh: 8; url=../view/trocarImagem.php');
    die();
}
// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
    // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
    $nome_final = md5(time()) . '.pdf';
} else {
    // Mantém o nome original do arquivo
    $nome_final = $_FILES['arquivo']['name'];
}

// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
//    // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
//    echo "Upload efetuado com sucesso!";
//    echo '<a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
} else {
    // Não foi possível fazer o upload, provavelmente a pasta está incorreta
    echo "Não foi possível enviar o arquivo, tente novamente.";
}

