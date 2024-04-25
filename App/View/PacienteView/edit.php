
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
<div class="container">
    <header class="d-flex justify-content-between- my-4">
        <div class="ms-auto">
            <a href="indexPaciente.php" class="btn btn-primary">Voltar</a>
        </div>
    </header>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <!-- Verifica se houve erro no envio do formulário -->
        <?php if (!empty($erro)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $erro; ?>
            </div>
        <?php } ?>

        <!-- Verifica se houve sucesso no envio do formulário -->
        <?php if (!empty($success)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success; ?>
            </div>
        <?php } ?>
        <div class="card">
            <div class="card-header">Atualizar informação do paciente</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label>Foto:</label>
                        <input type="file" name="arquivo" class="form-control" accept="image/*" placeholder="Foto">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Nome:</label>
                        <input type="text" class="form-control form-control-sm" name="nome" placeholder="Nome completo"
                              value="<?php echo isset($dados_paciente['nome']) ? $dados_paciente['nome'] : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>RG:</label>
                        <input type="text" class="form-control form-control-sm" name="rg" placeholder="RG"
                               value="<?php echo isset($dados_paciente['rg']) ? $dados_paciente['rg'] : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>CPF:</label>
                        <input type="text" class="form-control form-control-sm" name="cpf" placeholder="CPF"
                               value="<?php echo isset($dados_paciente['cpf']) ? $dados_paciente['cpf'] : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>CNS:</label>
                        <input type="text" class="form-control form-control-sm" name="cns" placeholder="CNS"
                               value="<?php echo isset($dados_paciente['cns']) ? $dados_paciente['cns'] : ''; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Celular:</label>
                        <input type="text" class="form-control form-control-sm" name="celular" placeholder="Celular"
                               value="<?php echo isset($dados_paciente['rg']) ? $dados_paciente['rg'] : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Endereço:</label>
                        <input type="text" class="form-control form-control-sm" name="endereco" placeholder="Endereço"
                               value="<?php echo isset($dados_paciente['endereco']) ? $dados_paciente['endereco'] : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Número:</label>
                        <input type="text" class="form-control form-control-sm" name="numero" placeholder="Número"
                               value="<?php echo isset($dados_paciente['numero']) ? $dados_paciente['numero'] : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Bairro:</label>
                        <input type="text" class="form-control form-control-sm" name="bairro" placeholder="Bairro"
                               value="<?php echo isset($dados_paciente['bairro']) ? $dados_paciente['bairro'] : ''; ?>">
                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col-md-3">
                        <label>Cidade:</label>
                        <input type="text" class="form-control form-control-sm" name="cidade" placeholder="Cidade"
                               value="<?php echo isset($dados_paciente['cidade']) ? $dados_paciente['cidade'] : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>CEP:</label>
                        <input type="text" class="form-control form-control-sm" name="cep" placeholder="CEP"
                               value="<?php echo isset($dados_paciente['cep']) ? $dados_paciente['cep'] : ''; ?>">
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
                            <option value="<?php echo $unidade['id']; ?>" <?php if (isset($dados_paciente['id_unidade_usf']) && $dados_paciente['id_unidade_usf'] == $unidade['id']) echo "selected"; ?>>
                                <?php echo $unidade['nome_usf']; ?>
                            </option>
                           <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Situação:</label>
                        <select class="form-control" name="select_situacao">
                            <option>Selecione</option>
                            <?php
                            require_once("../Controller/Situacao/SituacaoListarController.php");
                            $controller = new listarControllerSituacao();
                            $row_situacoes = $controller->getRows();
                            foreach ($row_situacoes as $situacao) {
                                ?>
                                <option value="<?php echo $situacao['id']; ?>" <?php if (isset($dados_paciente['id_situacao']) && $dados_paciente['id_situacao'] == $situacao['id']) echo "selected"; ?>>
                                    <?php echo $situacao['nome_situacao']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <input type="hidden" name="id" value="<?php echo isset($dados_paciente['id']) ? $dados_paciente['id'] : ''; ?>">
            <input type="submit" name="edit" value="Confirm" class="btn btn-primary">

        </div>
    </form>
</div>
</body>
</html>
