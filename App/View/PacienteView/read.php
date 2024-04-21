<?php
require_once("../Controller/Paciente/ControllerListar.php");
// Obtém o ID do paciente da URL
$id_Paciente = isset($_GET['id']) ? $_GET['id'] : null;

// Verifica se um ID de paciente foi fornecido
if ($id_Paciente !== null) {
    // Cria uma instância do controlador e busca os detalhes do paciente pelo ID
    $controller = new listarController();
    $controller->getPacienteId($id_Paciente);

    // Obtém os detalhes do paciente
    $paciente = $controller->getRows();

    // Verifica se o paciente foi encontrado
    if (empty($paciente)) {
        // Redireciona de volta para a página anterior se o paciente não for encontrado
        header("Location: novo.php");
        exit(); // Encerra o script
    }
} else {
    // Se nenhum ID de paciente foi fornecido, redireciona de volta para a página anterior
    header("Location: novo.php");
    exit(); // Encerra o script
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Prontuário do Paciente</title>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-end my-4">
        <div>
            <a href="novo.php" class="btn btn-primary">Back</a>
        </div>
    </header>
    <?php foreach ($paciente as $rowPaciente): ?>
    <div class="card mb-4">
        <div class="card">
            <div class="card-header">Prontuário</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-6 col-md-4">
                        <div>
                            <h5 class="card-title">Nome: <?php echo $rowPaciente['nome']; ?></h5>
                            <p class="card-text">RG: <?php echo $rowPaciente['rg']; ?></p>
                            <p class="card-text">CPF: <?php echo $rowPaciente['cpf']; ?></p>
                            <p class="card-text">CNS: <?php echo $rowPaciente['cns']; ?></p>
                            <p class="card-text">Celular: <?php echo $rowPaciente['celular']; ?></p>
                            <p class="card-text">Situação: <?php echo $rowPaciente['nome_situacao']; ?></p>
                            <p class="card-text">Unidade de Saúde: <?php echo $rowPaciente['nome_usf']; ?></p>
                            <p class="card-text">Endereço: <?php echo $rowPaciente['endereco']; ?></p>
                            <p class="card-text">Número: <?php echo $rowPaciente['numero']; ?></p>
                            <p class="card-text">Bairro: <?php echo $rowPaciente['bairro']; ?></p>
                            <p class="card-text">Cidade: <?php echo $rowPaciente['cidade']; ?></p>
                            <p class="card-text">CEP: <?php echo $rowPaciente['cep']; ?></p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div style="text-align: center; margin-bottom: 20px;">
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

                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
</body>
</html>
