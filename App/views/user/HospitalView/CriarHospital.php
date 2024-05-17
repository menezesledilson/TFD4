<?php
require_once("../../../controllers/Especialidade/EspecialidadeListarController.php");

$controllerEspecialidade = new listarEspecialidade();
$row_especialidade = $controllerEspecialidade->listarTodos();
$optionsEspecialidade_html = ""; // Variável para armazenar o HTML das opções

foreach ($row_especialidade as $especialiadade) {
    $optionsEspecialidade_html .= '<option value="' . $especialiadade['id'] . '">' . $especialiadade['nome'] . '</option>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../favicon.ico"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Cadastro de Hospital</title>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-between- my-4">
        <div class="ms-auto">
            <a href="indexHospital.php" class="btn btn-primary">Voltar</a>
        </div>
    </header>
    <form method="post" action="../../../controllers/Hospital/HospitalCadastroController.php" id="form"
          enctype="multipart/form-data">

        <div class="card">
            <div class="card-header">Cadastro de  Hospital</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Nome:</label>
                        <input class="form-control form-control-sm" type="text" id="nome_hospital" name="nome_hospital"
                               placeholder="Nome do Hospital">
                    </div>
                    <div class="col-md-3">
                        <label>Endereço:</label>
                        <input class="form-control form-control-sm" type="text" id="endereco" name="endereco"
                               placeholder="Endereço">
                    </div>
                    <div class="col-md-3">
                        <label>Número:</label>
                        <input class="form-control form-control-sm" type="text" id="numero" name="numero"
                               placeholder="Número">
                    </div>
                    <div class="col-md-3">
                        <label>Bairro:</label>
                        <input class="form-control form-control-sm" type="text" id="bairro" name="bairro"
                               placeholder="Bairro">
                    </div>
                    <div class="col-md-3">
                        <label>Cep:</label>
                        <input class="form-control form-control-sm" type="text" id="cep" name="cep"
                               placeholder="Cep">
                    </div>
                    <div class="col-md-3">
                        <label>Cidade:</label>
                        <input class="form-control form-control-sm" type="text" id="cidade" name="cidade"
                               placeholder="Cidade">
                    </div>
                        <div class="col-md-3">
                        <label>Celular:</label>
                        <input class="form-control form-control-sm" type="text" id="telefone" name="telefone"
                               placeholder="Celular">
                    </div>
                    <div class="col-md-3">
                        <label>Especialidade:</label>
                        <select class="form-control" name="id_especialidade">
                            <option>Selecione</option>
                            <?php echo $optionsEspecialidade_html; ?>
                        </select>
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
