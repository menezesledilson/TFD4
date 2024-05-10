<?php
// Incluir o arquivo PacienteListarController.php para acessar a classe listaDeUnidade
require_once("../../../controllers/Paciente/PacienteListarController.php");

// Criar uma instância da classe listaDeUnidade para acessar os métodos
$controller = new listarPaciente();

// Chamar o método listarTodos para obter os dados das unidades
$rows = $controller->listarTodos();
if ($rows)
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Pacientes</title>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-between my-4">
        <p class="text-right"><a href="criarPaciente.php" class="btn btn-success">+ Novo Cadastro</a></p>
        <a href="../../home.php" class="btn btn-primary" style="margin-bottom: 25px;">Fechar</a>
    </header>
    <!-- Loop para cada paciente -->
    <?php foreach ($rows as $row): ?>
        <div class="card">
            <div class="card-header">Paciente</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <!--Verifica se $row['created'] está definido e não é nulo-->
                        <strong>Data do cadrastro:</strong> <?php if (isset($row ['created']) && $row['created'] !== null) {
                            // Converte a data para o formato brasileiro
                            $dataFormatadaCadastro = date('d/m/y H:i', strtotime($row['created']));
                            // Exibe a data formatada
                            echo $dataFormatadaCadastro;
                        } else {
                            echo "Data não disponível";
                        } ?> </p>
                        <!--Verifica se $row['modified'] está definido e não é nulo-->
                        <p><strong>Data de
                                alteração:</strong> <?php if (isset($row['modified']) && $row['modified'] !== null) {

                                // Converte a data para o formato brasileiro
                                $dataFormatada = date('d/m/y H:i', strtotime($row['modified']));

                                // Exibe a data formatada
                                echo $dataFormatada;
                            } else {
                                echo "Data não disponível";
                            } ?></p>
                        <p><strong>Nome:</strong> <?php echo $row['nome']; ?></p>
                        <p><strong>Situação:</strong> <?php echo $row['nome_situacao']; ?></p>
                        <p><strong>Celular:</strong> <?php echo $row['celular']; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>CNS:</strong> <?php echo $row['cns']; ?></p>
                        <p><strong>CPF:</strong> <?php echo $row['cpf']; ?></p>
                        <p><strong>RG:</strong> <?php echo $row['rg']; ?></p>
                        <p><strong>USF:</strong> <?php echo $row['nome_usf']; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Embarque:</strong> <?php echo $row['embarque']; ?></p>
                        <p><strong>Referência:</strong> <?php echo $row['referencia']; ?></p>
                    </div>
                    <div class="col-md-3">
                        <div style="text-align: center; margin-bottom: 15px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-9 text-right ">
            <div class="btn-group">
                <a href="visualizarPaciente.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Visualizar</a>
                <a href="editarPaciente.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"
                   style="margin-left: 5px; margin-right: 5px;">Editar</a>
                <a class="btn btn-danger"
                   href="../../../controllers/Paciente/PacienteDeletarController.php?id=<?php echo $row['id']; ?>">Excluir</a>
            </div>
        </div>
        <br>
    <?php endforeach; ?>
</div>

<br>
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
