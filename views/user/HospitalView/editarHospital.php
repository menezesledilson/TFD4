<?php
require_once("../../../controllers/Hospital/HospitalEditarController.php"); 

// Atualizar a lista de situações
require_once("../../../controllers/Especialidade/EspecialidadeListarController.php");
$controllerEspecialidade = new listarEspecialidade();
$rowEspecialidade = $controllerEspecialidade->listarTodos();

// Armazenar o HTML das opções de situação
$optionsEspecialidadeHtml = "";
foreach ($rowEspecialidade as $especialiadade) {
    $selected = ($editaHospital->getIdEspecialidade() == $especialiadade['id']) ? 'selected' : '';
    $optionsEspecialidadeHtml .= '<option value="' . $especialiadade['id'] . '" ' . $selected . '>' . $especialiadade['nome'] . '</option>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="paciente/image/favicon.ico"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Atualizar Hospital</title>
</head>
<body>

<div class="container">
    <header class="d-flex justify-content-between- my-4">
        <div class="ms-auto">
            <a href="indexHospital.php" class="btn btn-primary">Voltar</a>
        </div>
    </header>
    <form action=" " method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">Atualizar informaçao do hospital</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Nome:</label>
                        <input type="text" class="form-control form-control-sm" name="nome_hospital"
                               value="<?php echo !empty($editaHospital->getNome()) ? $editaHospital->getNome() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Rua:</label>
                        <input type="text" class="form-control form-control-sm" name="endereco"
                               value="<?php echo !empty($editaHospital->getEndereco()) ? $editaHospital->getEndereco() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Número:</label>
                        <input type="text" class="form-control form-control-sm" name="numero"
                               value="<?php echo !empty($editaHospital->getNumero()) ? $editaHospital->getNumero() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Bairro:</label>
                        <input type="text" class="form-control form-control-sm" name="bairro"
                               value="<?php echo !empty($editaHospital->getBairro()) ? $editaHospital->getBairro() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Cep:</label>
                        <input type="text" class="form-control form-control-sm" name="cep"
                               value="<?php echo !empty($editaHospital->getCep()) ? $editaHospital->getCep() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Cidade:</label>
                        <input type="text" class="form-control form-control-sm" name="cidade"
                               value="<?php echo !empty($editaHospital->getCidade()) ? $editaHospital->getCidade() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Telefone:</label>
                        <input type="text" class="form-control form-control-sm" name="telefone"
                               value="<?php echo !empty($editaHospital->getTelefone()) ? $editaHospital->getTelefone() : ''; ?>">
                    </div>
                     <div class="col-md-3">
                        <label>Situação:</label>
                        <select class="form-control" name="id_especialidade">
                            <option value="">Selecione</option>
                            <?php echo $optionsEspecialidadeHtml ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
            <div class="mt-3">
                <input type="hidden" name="id"
                       value="<?php echo !empty($editaHospital->getId()) ? $editaHospital->getId() : ''; ?>">
                <button type="submit" class="btn btn-primary" id="editarHospital" name="submit" value="editarHospital">
                    Confirma
                </button>
            </div>

    </form>
</div>
</body>
</html>