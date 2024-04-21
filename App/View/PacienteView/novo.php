<?php
require_once("../Controller/Paciente/ControllerListar.php");

$controller = new listarController();
$rows = $controller->getRows();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Detalhes do Paciente</title>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-between my-4">
        <p class="text-right"><a href="Create.php" class="btn btn-success">+ Novo Cadastro</a></p>
        <a href="../home.php" class="btn btn-primary" style="margin-bottom: 25px;">Fechar</a>
    </header>

    <!-- Loop para cada paciente -->
    <?php foreach ($rows as $rowPaciente): ?>
        <div class="card">
            <div class="card-header">Detalhes do Paciente </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <p><strong>ID:</strong> <?php echo $rowPaciente['id']; ?></p>
                        <p><strong>Nome:</strong> <?php echo $rowPaciente['nome']; ?></p>
                        <p><strong>CNS:</strong> <?php echo $rowPaciente['cns']; ?></p>
                        <p><strong>Celular:</strong> <?php echo $rowPaciente['celular']; ?></p>
                    </div>
                    <div class="col-md-3">
                        <p><strong>USF:</strong> <?php echo $rowPaciente['nome_usf']; ?></p>
                        <p><strong>Situação:</strong> <?php echo $rowPaciente['nome_situacao']; ?></p>
                    </div>
                    <div class="col-md-3">
                        <div style="text-align: center; margin-bottom: 15px;">
                            <strong>Foto:</strong> <br>
                            <?php
                            // Define o caminho da imagem com base no nome do arquivo no banco de dados
                            $nome_arquivo = $rowPaciente['foto'];
                            $caminho_imagem = "../fotopac/" . $nome_arquivo;
                            // Verifica se o arquivo existe antes de exibi-lo
                            if (file_exists($caminho_imagem)) {
                                // Exibe a imagem usando o caminho definido
                                echo '<img src="' . $caminho_imagem . '" width="150" height="150" alt="Foto do Paciente"/>';
                            } else {
                                // Se o arquivo não existir, exibe uma mensagem alternativa
                                echo '<p>Nenhuma foto disponível</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="btn-group justify-content-between">
                            <a href="read.php?id=<?php echo $rowPaciente['id']; ?>" class="btn btn-info">Ler</a>
                            <a href="edit.php?id=<?php echo $rowPaciente['id']; ?>" class="btn btn-primary"
                               style="margin-left: 5px; margin-right: 5px;">Editar</a>
                            <a href="delete.php?id=<?php echo $rowPaciente['id']; ?>" class="btn btn-danger"
                               onclick="return confirm('Tem certeza que deseja apagar?')">Excluir</a>
                        </div>
                </div>
            </div>
        </div>
</div>
    <br>
    <?php endforeach; ?>
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
