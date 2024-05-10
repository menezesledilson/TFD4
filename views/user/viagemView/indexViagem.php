 
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../../favicon.ico"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <title>Unidades USF</title>
    </head>
    <body>
        <div class="container">
            <header class="d-flex justify-content-between my-4">
                <p class="text-right"><a href="criarViagem.php" class="btn btn-success">+ Novo Cadastro</a></p>
                <a href="../../home.php" class="btn btn-primary" style="margin-bottom: 25px;">Fechar</a>
            </header>

            <div class="card">
                <div class="card-header">Viagem</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Data da criação:</strong>  </p>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <p><strong>Local da viagem:</strong>  </p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Horário saída:</strong> </p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Data:</strong>  </p>
                        </div>
                    </div>
                    <!--Coluna do motorisita-->
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Motorista:</strong>  </p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Carro:</strong> </p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Placa:</strong>  </p>
                        </div>
                    </div>

                    <!--Coluna do Paciente-->
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Paciente:</strong>  </p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Local embarque:</strong> </p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Destino/hora:</strong>  </p>
                        </div>
                    </div>

                    <!--Coluna do Acompanhante-->
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Acompanhante:</strong>  </p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Local embarque:</strong> </p>
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-6"> <!-- Terceira coluna para os botões -->
                <div class="btn-group justify-content-end"> <!-- Botões dentro da terceira coluna -->

                </div>
            </div>
            <br>
            <br>

        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
                integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
    </body>
</html>
