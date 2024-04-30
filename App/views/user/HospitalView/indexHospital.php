<?php
// Incluir o arquivo PacienteListarController.php para acessar a classe listaDeUnidade
require_once("../../../controllers/Hospital/HospitalListarController.php");

// Criar uma instância da classe listaDeUnidade para acessar os métodos
$controller = new listarHospital();

// Chamar o método listarTodos para obter os dados das unidades
$row = $controller->listarTodos();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Hospital </title>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-between my-4">
        <p class="text-right"><a href="CriarHospital.php" class="btn btn-success">+ Novo Cadastro</a></p>
        <a href="../../home.php" class="btn btn-primary" style="margin-bottom: 25px;">Fechar</a>
    </header>
    <!-- Loop para cada paciente -->
    <?php foreach ($row as $value): ?>
        <div class="card mb-4">
            <div class="card">
                <div class="card-header">Lista de Hospitais</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <p><strong>Nome:</strong> <?php echo $value['nome']; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Endereço:</strong> <?php echo $value['endereco']; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Número:</strong> <?php echo $value['numero']; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Bairro:</strong> <?php echo $value['bairro']; ?></p>
                        </div>
                    </div>
                    <!-- Segundo Bloco -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <p><strong>Cep:</strong> <?php echo $value['cep']; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Cidade:</strong> <?php echo $value['cidade']; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Telefone:</strong> <?php echo $value['telefone']; ?></p>
                        </div>
                        <div class="col-md-1 text-right">
                            <div class="btn-group">
                                <a class="btn btn-primary" style="margin-left: 5px; margin-right: 5px;"
                                   href="../../user/HospitalView/editarHospital.php?id=<?php echo $value['id']; ?>">Editar</a>
                                <a class="btn btn-danger"
                                   href="../../../controllers/Hospital/HospitalDeletarController.php?id=<?php echo $value['id']; ?>">Excluir</a>
                            </div>
                        </div>
                    </div>
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