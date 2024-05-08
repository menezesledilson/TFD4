<?php
require_once("../../../controllers/Carro/CarroEditarController.php");

// Atualizar a lista de situações
require_once("../../../controllers/Seguradora/SeguradoraListarController.php");
$controllerSeguradora = new listarSeguradora();
$rowSeguradora = $controllerSeguradora->listarTodos();

// Armazenar o HTML das opções de situação
$optionsSeguradoraHtml = "";
foreach ($rowSeguradora as $seguradora) {
    $selected = ($editarCarro->getIdSeguradora() == $seguradora['id']) ? 'selected' : '';
    $optionsSeguradoraHtml .= '<option value="' . $seguradora['id'] . '" ' . $selected . '>' . $seguradora['nome'] . '</option>';
}
// Gerar o código JavaScript para atualizar o campo de contato
echo '<script>
    function atualizarContato() {
        var seguradora_id = document.getElementById("id_seguradora").value;
        switch(seguradora_id) {';
foreach ($rowSeguradora as $seguradora) {
    echo 'case ' . $seguradora['id'] . ':
                document.getElementById("contato").value = "' . $seguradora['telefone'] . '";
                break;';
}
echo 'default:
                document.getElementById("contato").value = "";
        }
    }

    document.getElementById("id_seguradora").addEventListener("change", function () {
        atualizarContato();
    });

    atualizarContato(); // Atualizar o contato quando a página carrega
</script>';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="paciente/image/favicon.ico"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Atualizar Veículo</title>
</head>
<body>
<?php require_once("../../../controllers/Carro/CarroEditarController.php"); ?>
<div class="container">
    <header class="d-flex justify-content-between- my-4">
        <div class="ms-auto">
            <a href="indexCarro.php" class="btn btn-primary">Voltar</a>
        </div>
    </header>
    <form action=" " method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">Atualizar informaçao do veículo</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Marca:</label>
                        <input type="text" class="form-control form-control-sm" name=" "
                               value=" ">
                    </div>
                    <div class="col-md-3">
                        <label>Marca:</label>
                        <input type="text" class="form-control form-control-sm" name="modelo"
                               value="<?php echo !empty($editarCarro->getModelo()) ? $editarCarro->getModelo() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Placa:</label>
                        <input type="text" class="form-control form-control-sm" name="placa"
                               value="<?php echo !empty($editarCarro->getPlaca()) ? $editarCarro->getPlaca() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Ano:</label>
                        <input type="text" class="form-control form-control-sm" name="ano"
                               value="<?php echo !empty($editarCarro->getAno()) ? $editarCarro->getAno() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Combustível:</label>
                        <input type="text" class="form-control form-control-sm" name="combustivel"
                               value="<?php echo !empty($editarCarro->getCombustivel()) ? $editarCarro->getCombustivel() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Renavam:</label>
                        <input type="text" class="form-control form-control-sm" name="renavam"
                               value="<?php echo !empty($editarCarro->getRenavam()) ? $editarCarro->getRenavam() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Tipo Carro:</label>
                        <input type="text" class="form-control form-control-sm" name=" "
                               value=" ">
                    </div>
                    <div class="col-md-3">
                        <label>Vencimento:</label>
                        <input type="date" class="form-control form-control-sm" name="data_vencimento"
                               value="data_vencimento ">
                    </div>
                    <div class="col-md-3">
                        <label>Cor:</label>
                        <input type="text" class="form-control form-control-sm" name="cor"
                               value="<?php echo !empty($editarCarro->getCor()) ? $editarCarro->getCor() : ''; ?>">
                    </div>

                    <div class="col-md-3">
                        <label>Vagas:</label>
                        <input type="text" class="form-control form-control-sm" name="vagas"
                               value="<?php echo !empty($editarCarro->getVagas()) ? $editarCarro->getVagas() : ''; ?>">
                    </div>

                    <div class="col-md-3">
                        <label>Seguro:</label>
                        <select class="form-control" name="id_seguradora">
                            <option>Selecione</option>
                            <?php echo $optionsSeguradoraHtml; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <input type="hidden" name="id"
                   value="<?php echo !empty($editarCarro->getId()) ? $editarCarro->getId() : ''; ?>">
            <button type="submit" class="btn btn-primary" id="editarCarro" name="submit" value="editarCarro">Confirma
            </button>
        </div>
    </form>
</div>
</body>
</html>