<?php

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
    <form method="post" action="../../Controller/Paciente/PacienteControllerCadastro.php" id="form"
          enctype="multipart/form-data">
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
                        <label>Paciente:</label>
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


