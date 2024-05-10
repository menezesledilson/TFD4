<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../../favicon.ico"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
              integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <title>Cadastro de Viagens</title>
    </head>
    <body>
        <div class="container">
            <header class="d-flex justify-content-between- my-4">
                <div class="ms-auto">
                    <a href="indexViagem.php" class="btn btn-primary">Voltar</a>
                </div>
            </header>
            <form method="post" action="../../../controllers/Unidade/UnidadeCadastrarController.php" id ="form" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">Cadastro de Viagem</div>
                    <div class="card-body">

                        <!--Primeiro Coluna-->
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <label>Local da viagem:</label>
                                <input class="form-control form-control-sm" type="text" id="nome" name="nome">
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Horário saída:</label>
                                <input class="form-control form-control-sm" type="time" id=" " name=" " >
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Data:</label>
                                <input class="form-control form-control-sm" type="date" id=" " name=" " >
                            </div>
                        </div>

                        <!--Segunda Coluna-->

                        <div class="row mb-4">
                            <div class="col-md-4">
                                <label>Motorista:</label>
                                <select class="form-control" name="id_situacao">
                                    <option>Selecione</option>
                                    <?php echo $optionsSituacao_html; ?>
                                </select>

                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Carro:</label>
                                <input class="form-control form-control-sm" type="text" id=" " name=" " >
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Placa:</label>
                                <input class="form-control form-control-sm" type="text" id=" " name=" " >
                            </div>
                        </div>

                        <!--Terceira Coluna-->
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <label>Paciente:</label>
                                 <select class="form-control" name="id_situacao">
                                    <option>Selecione</option>
                                    <?php echo $optionsSituacao_html; ?>
                                </select>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Local embarque:</label>
                                <input class="form-control form-control-sm" type="text" id=" " name=" " >
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Destino/hora:</label>
                                <input class="form-control form-control-sm" type="text" id=" " name=" " >
                            </div>
                        </div>

                        <!--Quarto Coluna-->
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <label>Acompanhante:</label>
                                <select class="form-control" name="id_situacao">
                                    <option>Selecione</option>
                                    <?php echo $optionsSituacao_html; ?>
                                </select>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Local embarque:</label>
                                <input class="form-control form-control-sm" type="text" id=" " name=" " >
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Destino/hora:</label>
                                <input class="form-control form-control-sm" type="text" id=" " name=" " >
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