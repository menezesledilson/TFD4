<?php
require_once("../../../controllers/Paciente/PacienteEditarController.php");

// Atualizar a lista de unidades
require_once("../../../controllers/Unidade/UnidadeListarController.php");
$controllerUnidade = new listarUnidade();
$rowUnidade = $controllerUnidade->listarTodos();

// Armazenar o HTML das opções de unidade
$optionsUnidadeHtml = "";
foreach ($rowUnidade as $unidade) {
    $selected = ($editaPaciente->getIdUnidadeUsf() == $unidade['id']) ? 'selected' : '';
    $optionsUnidadeHtml .= '<option value="' . $unidade['id'] . '" ' . $selected . '>' . $unidade['nome_usf'] . '</option>';
}

// Atualizar a lista de situações
require_once("../../../controllers/Situacao/SituacaoListarController.php");
$controllerSituacao = new listarSituacao();
$rowSituacao = $controllerSituacao->listarTodos();

// Armazenar o HTML das opções de situação
$optionsSituacaoHtml = "";
foreach ($rowSituacao as $situacao) {
    $selected = ($editaPaciente->getIdSituacao() == $situacao['id']) ? 'selected' : '';
    $optionsSituacaoHtml .= '<option value="' . $situacao['id'] . '" ' . $selected . '>' . $situacao['nome_situacao'] . '</option>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Atualizar o Paciente</title>
</head>
<body>

<div class="container">
    <header class="d-flex justify-content-between- my-4">
        <div class="ms-auto">
            <a href="indexPaciente.php" class="btn btn-primary">Voltar</a>
        </div>
    </header>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Seu código HTML existente... -->
        <div class="card">
            <div class="card-header">Atualizar informação do Paciente</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Nome:</label>
                        <input type="text" class="form-control form-control-sm" name="nome"
                               value="<?php echo !empty($editaPaciente->getNome()) ? $editaPaciente->getNome() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>RG:</label>
                        <input type="text" class="form-control form-control-sm" name="rg"
                               value="<?php echo !empty($editaPaciente->getRg()) ? $editaPaciente->getRg() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>CPF:</label>
                        <input type="text" class="form-control form-control-sm" name="cpf"
                               value="<?php echo !empty($editaPaciente->getCpf()) ? $editaPaciente->getCpf() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>CNS:</label>
                        <input type="text" class="form-control form-control-sm" name="cns"
                               value="<?php echo isset($editaPaciente) ? $editaPaciente->getCns() : ''; ?>">
                    </div>
                </div>
                <!--Segunda coluna-->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Celular:</label>
                        <input type="text" class="form-control form-control-sm" name="celular"
                               value="<?php echo !empty($editaPaciente->getCelular()) ? $editaPaciente->getCelular() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Endereço:</label>
                        <input type="text" class="form-control form-control-sm" name="endereco"
                               value="<?php echo !empty($editaPaciente->getEndereco()) ? $editaPaciente->getEndereco() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Número:</label>
                        <input type="text" class="form-control form-control-sm" name="numero"
                        value="<?php echo !empty($editaPaciente->getNumero()) ? $editaPaciente->getNumero() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Bairro:</label>
                        <input type="text" class="form-control form-control-sm" name="bairro"
                        value="<?php echo !empty($editaPaciente->getBairro()) ? $editaPaciente->getBairro() : ''; ?>">
                    </div>
                </div>
                <!--Terceira coluna-->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Cidade:</label>
                        <input type="text" class="form-control form-control-sm" name="cidade"
                               value="<?php echo !empty($editaPaciente->getCidade()) ? $editaPaciente->getCidade() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>CEP:</label>
                        <input type="text" class="form-control form-control-sm" name="cep"
                               value="<?php echo !empty($editaPaciente->getCep()) ? $editaPaciente->getCep() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Unidade de Saúde:</label>
                        <select class="form-control" name="id_unidade_usf">
                            <option value="">Selecione</option>
                            <?php echo $optionsUnidadeHtml ?>
                        </select>

                    </div>
                    <div class="col-md-3">
                        <label>Situação:</label>
                        <select class="form-control" name="id_situacao">
                            <option value="">Selecione</option>
                            <?php echo $optionsSituacaoHtml ?>
                        </select>
                    </div>
                </div>
                <!--Quarto coluna-->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Embarque:</label>
                        <input type="text" class="form-control form-control-sm" name="embarque"
                               value="<?php echo !empty($editaPaciente->getEmbarque()) ? $editaPaciente->getEmbarque() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Referência:</label>
                        <input type="text" class="form-control form-control-sm" name="referencia"
                               value="<?php echo !empty($editaPaciente->getReferencia()) ? $editaPaciente->getReferencia() : ''; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <!-- Adicione o campo de ID -->
                <input type="hidden" name="id"
                       value="<?php echo !empty($editaPaciente->getId()) ? $editaPaciente->getId() : ''; ?>">
                <!-- Adicione o botão de editar -->
                <button type="submit" class="btn btn-primary" id="$editaPaciente" name="submit" value="$editaPaciente">
                    Confirma
                </button>
            </div>
        </div>
    </form>
</div>
</body>