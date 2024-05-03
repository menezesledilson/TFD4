<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="paciente/image/favicon.ico"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Atualizar Acompanhante</title>
</head>
<body>
<?php require_once("../../../controllers/Acompanhate/AcompanhanteEditarController.php"); ?>
<div class="container">
    <header class="d-flex justify-content-between- my-4">
        <div class="ms-auto">
            <a href="indexAcompanhante.php" class="btn btn-primary">Voltar</a>
        </div>
    </header>
    <form action=" " method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">Atualizar informaçao do acompanhante</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Nome:</label>
                        <input type="text" class="form-control form-control-sm" name="nome"
                               value="<?php echo !empty($editaAcompanhante->getNome()) ? $editaAcompanhante->getNome() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>RG:</label>
                        <input type="text" class="form-control form-control-sm" name="rg"
                               value="<?php echo !empty($editaAcompanhante->getRg()) ? $editaAcompanhante->getRg() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>CPF:</label>
                        <input type="text" class="form-control form-control-sm" name="cpf"
                               value="<?php echo !empty($editaAcompanhante->getCpf()) ? $editaAcompanhante->getCpf() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Celular:</label>
                        <input type="text" class="form-control form-control-sm" name="celular"
                               value="<?php echo !empty($editaAcompanhante->getCelular()) ? $editaAcompanhante->getCelular() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Endereço:</label>
                        <input type="text" class="form-control form-control-sm" name="endereco"
                               value="<?php echo !empty($editaAcompanhante->getEndereco()) ? $editaAcompanhante->getEndereco() : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Número:</label>
                        <input type="text" class="form-control form-control-sm" name="numero"
                               value="<?php echo !empty($editaAcompanhante->getNumero()) ? $editaAcompanhante->getNumero(): ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Bairro:</label>
                        <input type="text" class="form-control form-control-sm" name="bairro"
                               value="<?php echo !empty($editaAcompanhante->getBairro()) ? $editaAcompanhante->getBairro(): ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Cidade:</label>
                        <input type="text" class="form-control form-control-sm" name="cidade"
                               value="<?php echo !empty($editaAcompanhante->getCidade()) ? $editaAcompanhante->getCidade(): ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>CEP:</label>
                        <input type="text" class="form-control form-control-sm" name="cep"
                               value="<?php echo !empty($editaAcompanhante->getCep()) ? $editaAcompanhante->getCep(): ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Ponto de embarque:</label>
                        <input type="text" class="form-control form-control-sm" name=" "
                               value="">
                    </div>
                    <div class="col-md-3">
                        <label>Referência:</label>
                        <input type="text" class="form-control form-control-sm" name=" "
                               value="">
                    </div>
                </div>
            </div>
            </div>
            <div class="mt-3">
                <input type="hidden" name="id" value="<?php echo !empty($editaAcompanhante->getId()) ? $editaAcompanhante->getId() : ''; ?>">
                <button type="submit" class="btn btn-primary" id="editarAcompanhante" name="submit" value="editarAcompanhante">Editar</button>
            </div>
    </form>
</div>
</body>
</html>