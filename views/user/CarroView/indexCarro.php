<?php
// Incluir o arquivo PacienteListarController.php para acessar a classe listaDeUnidade
require_once("../../../controllers/Carro/CarroListarController.php");

// Criar uma instância da classe listaDeUnidade para acessar os métodos
$controller = new listarCarro();

// Chamar o método listarTodos para obter os dados das unidades
$row = $controller->listarTodos();

require_once("../../../controllers/Seguradora/SeguradoraListarController.php");
$controllerSeguradora = new listarSeguradora();
$rowSeguradora = $controllerSeguradora->listarTodos();

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Frota de veículos </title>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-between my-4">
        <p class="text-right"><a href="criarCarro.php" class="btn btn-success">+ Novo Cadastro</a></p>
        <a href="../../home.php" class="btn btn-primary" style="margin-bottom: 25px;">Fechar</a>
    </header>

    <?php foreach ($row as $value): ?>
        <div class="card mb-4">
            <div class="card">
                <div class="card-header">Automovél</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <p><strong>Marca:</strong> <?php echo $value['marca']; ?> </p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Veículo:</strong> <?php echo $value['modelo']; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Placa:</strong> <?php echo $value['placa']; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Ano:</strong> <?php echo $value['ano']; ?></p>
                        </div>
                    </div>
                    <!--Segundo Bloco-->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <p><strong>Combustível:</strong> <?php echo $value['combustivel']; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Renavam:</strong> <?php echo $value['renavam']; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Tipo Carro:</strong> <?php echo $value['tipo_carro']; ?> </p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Seguradora:</strong> <?php echo $value['nome'] ?> </p>
                        </div>
                    </div>
                    <!--Terceiro Bloco-->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <p>
                                <strong>Venc. Seguro:</strong> <?php echo !empty($value['data_vencimento']) && $value['data_vencimento'] != '0000-00-00' ? date('d/m/Y', strtotime($value['data_vencimento'])) : "Data não disponível"; ?>

                            </p>
                        </div>
                        <div class="col-md-3">
                            <p><strong> Tel.Seguro: </strong><?php
                                // Encontrar a seguradora correspondente
                                $seguradora_telefone = "";
                                foreach ($rowSeguradora as $seguradora) {
                                    if ($seguradora['id'] == $value['id_seguradora']) {
                                        $seguradora_telefone = $seguradora['telefone'];
                                        break;
                                    }
                                }
                                echo $seguradora_telefone;
                                ?>  </p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Cor:</strong> <?php echo $value['cor']; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Vagas:</strong> <?php echo $value['vagas']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 text-right">
                <div class="btn-group">
                    <a class="btn btn-primary" style="margin-left: 5px; margin-right: 5px;"
                       href="../../user/CarroView/editarCarro.php?id=<?php echo $value['id']; ?>">Editar</a>

                    <a class="btn btn-danger"
                       href="../../../controllers/Carro/CarroDeletarController.php?id=<?php echo $value['id']; ?>">Excluir</a>
                </div>
            </div>
        </div>
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