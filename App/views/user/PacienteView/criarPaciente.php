<?php
//
require_once("../../../controllers/Unidade/UnidadeListarController.php");
$controller = new listarUnidade();
$row_unidades = $controller->listarTodos();

$optionsUnidade_html = ""; // Variável para armazenar o HTML das opções

foreach ($row_unidades as $unidade) {
    $optionsUnidade_html .= '<option value="' . $unidade['id'] . '">' . $unidade['nome_usf'] . '</option>';

    require_once("../../../controllers/Situacao/SituacaoListarController.php");

    $controllerSituacao = new listarSituacao();
    $row_situacao = $controllerSituacao->listarTodos();
    $optionsSituacao_html = ""; // Variável para armazenar o HTML das opções

    foreach ($row_situacao as $situacao) {
        $optionsSituacao_html .= '<option value="' . $situacao['id'] . '">' . $situacao['nome_situacao'] . '</option>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Cadastro de Pacientes</title>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-between- my-4">
        <div class="ms-auto">
            <a href="indexPaciente.php" class="btn btn-primary">Voltar</a>
        </div>
    </header>
    <!--Controllrs para cadastrar o paciente -->
    <form method="post" action="../../../controllers/Paciente/PacienteCadastroController.php" id="form" enctype="multipart/form-data">

        <div class="card">
            <div class="card-header">Cadastro Paciente</div>
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Nome:</label>
                        <input type="text" class="form-control form-control-sm" name="nome" placeholder="Nome completo">
                    </div>
                    <div class="col-md-3">
                        <label>RG:</label>
                        <input type="text" class="form-control form-control-sm" name="rg" placeholder="RG">
                    </div>

                    <div class="col-md-3">
                        <label>CPF:</label>
                        <input type="text" class="form-control form-control-sm" name="cpf" maxlength="14" placeholder="000.000.000-00">
                    </div>
                    <div class="col-md-3">
                        <label>CNS:</label>
                        <input type="text" class="form-control form-control-sm" name="cns" placeholder="CNS">
                    </div>
                </div>
                <!--Segunda coluna-->
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
                <!--Terceira coluna-->
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
                        <label>Embarque:</label>
                        <input type="text" class="form-control form-control-sm" name="embarque" placeholder="Ponto de embarque">
                    </div>
                    <div class="col-md-3">
                        <label>Referência:</label>
                        <input type="text" class="form-control form-control-sm" name="referencia" placeholder="Referência">
                    </div>
                    <div class="col-md-3">
                        <label>Unidade de Saúde:</label>
                        <select class="form-control" name="id_unidade_usf">
                            <option>Selecione</option>
                            <?php echo $optionsUnidade_html; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Situação:</label>
                        <select class="form-control" name="id_situacao">
                            <option>Selecione</option>
                            <?php echo $optionsSituacao_html; ?>
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
</div>
</body>