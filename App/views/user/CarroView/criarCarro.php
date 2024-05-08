<?php
require_once("../../../controllers/Seguradora/SeguradoraListarController.php");
$controller = new listarSeguradora();
$row_seguradora = $controller->listarTodos();

$optionsSeguradora_html = ""; // Variável para armazenar o HTML das opções

foreach ($row_seguradora as $seguradora) {
    $optionsSeguradora_html .= '<option value="' . $seguradora['id'] . '">' . $seguradora['nome'] . '</option>';

    // Chamar o método listarTodos
    $row = $controller->listarTodos();

    require_once("../../../controllers/Seguradora/SeguradoraListarController.php");
    $controllerSeguradora = new listarSeguradora();
    $rowSeguradora = $controllerSeguradora->listarTodos();
}


?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../favicon.ico"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Cadastro de Veículo</title>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-between- my-4">
        <div class="ms-auto">
            <a href="indexCarro.php" class="btn btn-primary">Voltar</a>
        </div>
    </header>
    <form method="post" action="../../../controllers/Carro/CarroCadastroController.php" id="form"
          enctype="multipart/form-data">
        <div class="card mb-4">
            <div class="card">
                <div class="card-header">Cadastro de veículo</div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label>Marca:</label>
                            <input class="form-control form-control-sm" type="text" id="marca" name="marca"
                                   placeholder="Marca do veículo">
                        </div>
                        <div class="col-md-3">
                            <label>Veículo:</label>
                            <input class="form-control form-control-sm" type="text" id="modelo" name="modelo"
                                   placeholder="Modelo do carro">
                        </div>
                        <div class="col-md-3">
                            <label>Placa:</label>
                            <input class="form-control form-control-sm" type="text" id="placa" name="placa"
                                   placeholder="Placa do carro">
                        </div>
                        <div class="col-md-3">
                            <label>Ano:</label>
                            <input class="form-control form-control-sm" type="text" id="ano" name="ano"
                                   placeholder="Ano do carro">
                        </div>
                    </div>
                    <!-- Segundo Bloco -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label>Combustível:</label>
                            <input class="form-control form-control-sm" type="text" id="combustivel" name="combustivel"
                                   placeholder="Combustível">
                        </div>
                        <div class="col-md-3">
                            <label>Renavam:</label>
                            <input class="form-control form-control-sm" type="text" id="renavam" name="renavam"
                                   placeholder="Renavam do carro">
                        </div>
                        <div class="col-md-3">
                            <label>Cor:</label>
                            <input class="form-control form-control-sm" type="text" id="cor" name="cor"
                                   placeholder="Cor do carro">
                        </div>
                        <div class="col-md-3">
                            <label>Vagas:</label>
                            <input class="form-control form-control-sm" type="text" id="vagas" name="vagas"
                                   placeholder="Vagas">
                        </div>
                    </div>
                        <!-- Terceiro Bloco -->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <label>Tipo do Carro:</label>
                                <input class="form-control form-control-sm" type="text" id="tipo_carro"
                                       name="tipo_carro"
                                       placeholder="Tipo do carro">
                            </div>
                            <div class="col-md-3">
                                <label>Data vencimento seguro:</label>
                                <input class="form-control form-control-sm" type="date" id="data_vencimento"
                                       name="data_vencimento" <?php if (empty($data_vencimento)) echo 'value=""'; ?>>
                            </div>
                            <div class="col-md-3">
                                <label>Seguradora:</label>
                                <select class="form-control" name="id_seguradora">
                                    <option value="">Selecione</option>
                                    <?php echo $optionsSeguradora_html; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <input type="submit" name="create" value="Confirma" class="btn btn-primary">
                </div>
            </div>
    </form>
</div>


</body>
</html>
