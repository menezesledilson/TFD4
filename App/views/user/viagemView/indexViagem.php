<?php
// Incluir o arquivo PacienteListarController.php para acessar a classe listaDeUnidade
require_once("../../../controllers/Viagem/ViagemListarController.php");

// Criar uma instância da classe listaDeUnidade para acessar os métodos
$controller = new listarViagem();

// Chamar o método listarTodos para obter os dados das unidades
$row = $controller->listarTodos();
?> 
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../../favicon.ico"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <title>Lista de Viagem</title>
    </head>
    <body>
        <div class="container">
            <header class="d-flex justify-content-between my-4">
                <p class="text-right"><a href="criarViagem.php" class="btn btn-success">+ Novo Cadastro</a></p>
                <a href="../../home.php" class="btn btn-primary" style="margin-bottom: 25px;">Fechar</a>
            </header>
            <?php foreach ($row as $value):?>
                <div class="card">
                    <div class="card-header">Viagem</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Data da criação:</strong> <?php echo date('d/m/Y', strtotime($value['created'])); ?>  </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Local da viagem:</strong> <?php echo $value['local_viagem']; ?>  </p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Horário saída:</strong> <?php echo $value['hora_saida']; ?> </p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Data:</strong> <?php echo date('d/m/Y', strtotime($value['data_viagem'])); ?> </p>
                            </div>
                        </div>
                        <!--Coluna do motorisita-->
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Motorista:</strong> <?php echo $value['nome_motorista']; ?>  </p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Placa:</strong> <?php echo $value['placa']; ?> </p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Carro automatico:</strong>  </p>
                            </div>
                        </div>

                        <!--Coluna do Paciente-->
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Paciente:</strong> <?php echo $value['nome_paciente']; ?> </p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Local embarque automatico:</strong> </p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Destino/hora:</strong>  </p>
                            </div>
                        </div>

                        <!--Coluna do Acompanhante-->
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Acompanhante:</strong> <?php echo $value['nome_acompanhante']; ?> </p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Local embarque automatico:</strong> </p>
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
            <?php endforeach; ?>
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
