<!DOCTYPE html>
<html lang="en">
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
                               value="<?php echo !empty($editarCarro->getCombustivel()) ? $editarCarro->getCombustivel(): ''; ?>">
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
                        <label>Seguradora:</label>
                        <input type="text" class="form-control form-control-sm" name=" "
                               value=" ">
                    </div>
                    <div class="col-md-3">
                        <label>Vencimento:</label>
                        <input type="text" class="form-control form-control-sm" name=" "
                               value=" ">
                    </div>
                    <div class="col-md-3">
                        <label>Acionamento Seguro:</label>
                        <input type="text" class="form-control form-control-sm" name=" "
                               value=" ">
                    </div>

                    <div class="col-md-3">
                        <label>Cor:</label>
                        <input type="text" class="form-control form-control-sm" name="cor"
                               value="<?php echo !empty($editarCarro->getCor()) ? $editarCarro->getCor() : ''; ?>">
                    </div>

                    <div class="col-md-3">
                        <label>Vagas:</label>
                        <input type="text" class="form-control form-control-sm" name="vagas"
                               value="<?php echo !empty($editarCarro->getVagas()) ? $editarCarro->getVagas(): ''; ?>">
                    </div>
                </div>
            </div>
            </div>
            <div class="mt-3">
                <input type="hidden" name="id" value="<?php echo !empty($editarCarro->getId()) ? $editarCarro->getId() : ''; ?>">
                <button type="submit" class="btn btn-primary" id="editarCarro" name="submit" value="editarCarro">Confirma</button>
            </div>
    </form>
</div>
</body>
</html>