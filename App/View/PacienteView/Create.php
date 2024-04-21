<?php
require_once("../Controller/Paciente/ControllerCadastro.php");

$erro = ""; // Variável para armazenar mensagens de erro
$success = ""; // Variável para armazenar mensagens de sucesso

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se um arquivo foi selecionado
    if (!empty($_FILES['arquivo']['name'])) {
        // Processa o upload da imagem
        $foto = $_FILES['arquivo']['name'];
        $nome_foto_antiga = "../fotopac/" . $foto;

        // Verifica se a foto antiga existe antes de excluí-la
        if (file_exists($nome_foto_antiga)) {
            unlink($nome_foto_antiga);
        }

        // Pasta onde o arquivo vai ser salvo
        $_UP['pasta'] = '../fotopac/';

        // Tamanho máximo do arquivo em Bytes
        $_UP['tamanho'] = 1024 * 1024 * 5; // 5mb

        // Array com as extensões permitidas
        $_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');

        // Renomeia o arquivo? (se true, o arquivo será salvo como .jpg e em nome único)
        $_UP['renomeia'] = false;

        // Array com os tipos de erros de upload do PHP
        $_UP['erros'][0] = 'Não houve erro';
        $_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
        $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
        $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
        $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

        // Verifica se houve algum erro com o upload. Se sim, exibe mensagem de erro
        if ($_FILES['arquivo']['error'] != 0) {
            $erro = "Não foi possível fazer o upload, erro: <br>" . $_UP['erros'][$_FILES['arquivo']['error']];
        } else {
            // Verificar se deve trocar o nome do arquivo
            if ($_UP['renomeia'] == true) {
                // Criar um nome baseado no UNIX TIMESTAMP atual e com a extensão jpg
                $nome_final = time() . '.jpg';
            } else {
                // Manter o nome original do arquivo
                $nome_final = $_FILES['arquivo']['name'];
            }
            // Verificar se é possível mover o arquivo para a pasta escolhida
            if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
                $nome = trim($_POST['nome']);
                $rg = trim($_POST['rg']);
                $cpf = trim($_POST['cpf']);
                $cns = trim($_POST['cns']);
                $celular = trim($_POST['celular']);
                $endereco = trim($_POST['endereco']);
                $numero = trim($_POST['numero']);
                $bairro = trim($_POST['bairro']);
                $cidade = trim($_POST['cidade']);
                $cep = trim($_POST['cep']);
                //Seleciona uma unidade e uma situaco
                $id_unidade_usf = trim($_POST['select_unidade']);
                $id_situacao = trim($_POST['select_situacao']);

                // Verifica se todos os campos estão preenchidos
                if (empty($nome) || empty($rg) || empty($cpf) || empty($cns) || empty($celular) || empty($endereco) || empty($numero) || empty($bairro) || empty($cidade) || empty($cep) || empty($id_unidade_usf) || empty($id_situacao)) {
                    $erro = "Por favor, preencha todos os campos do formulário.";
                } else {
                    // Define os valores para $created e $modified
                    $created = date('Y-m-d H:i:s');
                    $modified = date('Y-m-d H:i:s');

                    // Cria um objeto CadastroController e passa os dados do formulário para o construtor
                    $cadastroController = new cadastrarUnidade ();

                    // Chama o método criarTodos do CadastroController
                    $resultado = $cadastroController->criarTodos($foto, $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_unidade_usf, $id_situacao, $created, $modified);
                    // Verifica se o paciente foi cadastrado com sucesso
                    if($resultado == true){
                        $success = "Cadastro realizado com sucesso!";
                        header("Location: novo.php");
                        exit(); // Certifique-se de sair
                    }else{
                        $erro = "Erro ao cadastrar o paciente.";
                    }

                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Cadastro de Pacientes</title>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-between- my-4">
        <div class="ms-auto">
            <a href="novo.php" class="btn btn-primary">Voltar</a>
        </div>
    </header>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <!-- Verifica se houve erro no envio do formulário -->
        <?php if (!empty($erro)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $erro; ?>
            </div>
        <?php } ?>

        <!-- Verifica se houve sucesso no envio do formulário -->
        <?php if (!empty($success)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success; ?>
            </div>
        <?php } ?>

        <div class="card">
            <div class="card-header">Cadastro de paciente</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label>Foto:</label>
                        <input type="file" name="arquivo" class="form-control" accept="image/*" placeholder="Foto">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Nome:</label>
                        <input type="text" class="form-control form-control-sm" name="nome"
                               placeholder="Nome completo">
                    </div>
                    <div class="col-md-3">
                        <label>RG:</label>
                        <input type="text" class="form-control form-control-sm" name="rg" placeholder="RG">
                    </div>
                    <div class="col-md-3">
                        <label>CPF:</label>
                        <input type="text" class="form-control form-control-sm" name="cpf" placeholder="CPF">
                    </div>
                    <div class="col-md-3">
                        <label>CNS:</label>
                        <input type="text" class="form-control form-control-sm" name="cns" placeholder="CNS">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Celular:</label>
                        <input type="text" class="form-control form-control-sm" name="celular"
                               placeholder="Celular">
                    </div>
                    <div class="col-md-3">
                        <label>Endereço:</label>
                        <input type="text" class="form-control form-control-sm" name="endereco"
                               placeholder="Endereço">
                    </div>
                    <div class="col-md-3">
                        <label>Número:</label>
                        <input type="text" class="form-control form-control-sm" name="numero" placeholder="Número">
                    </div>
                    <div class="col-md-3">
                        <label>Bairro:</label>
                        <input type="text" class="form-control form-control-sm" name="bairro" placeholder="Bairro">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Cidade:</label>
                        <input type="text" class="form-control form-control-sm" name="cidade" placeholder="Cidade">
                    </div>
                    <div class="col-md-3">
                        <label>CEP:</label>
                        <input type="text" class="form-control form-control-sm" name="cep" placeholder="CEP">
                    </div>
                    <div class="col-md-3">
                        <label>Unidade de Saúde:</label>
                        <select class="form-control" name="select_unidade">
                            <option>Selecione</option>
                            <?php
                            require_once("../Controller/Unidade/UnidadeListarController.php");
                            $controller = new listarControllerUnidade();
                            $row_unidades = $controller->getRows();
                            foreach ($row_unidades as $unidade) {
                                ?>
                                <option value="<?php echo $unidade['id']; ?>"><?php echo $unidade['nome_usf']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Situação:</label>
                        <select class="form-control" name="select_situacao">
                            <option>Selecione</option>
                            <?php
                            require_once("../Controller/Situacao/ControllerListarSituacao.php");
                            $controller = new listarControllerSituacao();
                            $row_situacoes = $controller->getRows();
                            foreach ($row_situacoes as $situacao) {
                                ?>
                                <option value="<?php echo $situacao['id']; ?>"><?php echo $situacao['nome_situacao']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <input type="submit" name="create" value="Confirma" class="btn btn-primary">
            </div>
    </form>
</body>
</html>


