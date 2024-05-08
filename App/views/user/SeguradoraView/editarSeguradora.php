<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="paciente/image/favicon.ico"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Pacientes</title>
</head>
<body>
<?php require_once("../../../controllers/Seguradora/SeguradoraEditarController.php");?>
<div class="container">
    <header class="d-flex justify-content-between- my-4">
        <div class="ms-auto">
            <a href="indexSeguradora.php" class="btn btn-primary">Voltar</a>
        </div>
    </header>
    <form action=" " method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">Editar seguradora</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Nome:</label>
                        <input type="text" class="form-control form-control-sm" name="nome" value="<?php echo !empty($editaSeguradora->getNome()) ? $editaSeguradora->getNome() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Telefone:</label>
                        <input type="text" class="form-control form-control-sm" name="telefone" value="<?php echo !empty($editaSeguradora->getTelefone()) ? $editaSeguradora->getTelefone() : ''; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <input type="hidden" name="id" value="<?php echo !empty($editaSeguradora->getId()) ? $editaSeguradora->getId() : ''; ?>">
            <button type="submit" class="btn btn-primary id="editaSeguradora" name="submit" value="editaSeguradora">Editar</button>
        </div>
    </form>
</div>
</body>
</html>