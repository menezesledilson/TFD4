<?php
require_once("../../../controllers/Paciente/PacienteListarController.php");

// Verifica se o ID do paciente está presente na URL
if (isset($_GET['id'])) {
    // Captura o ID do paciente da URL
    $id = $_GET['id'];

    // Instancia o controlador para listar os pacientes
    $controller = new listarPaciente();

    // Obtém as informações do paciente com base no ID fornecido
    $rows = $controller->listarTodosPorId($id);

    // Verifica se o paciente foi encontrado
    if ($rows) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shortcut icon" href="../../favicon.ico"/>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
                  integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
                  crossorigin="anonymous">
            <title>Prontuário do Paciente</title>
        </head>
        <body>
        <div class="container">
            <header class="d-flex justify-content-end my-4">
                <div>
                    <a href="indexPaciente.php" class="btn btn-primary">Voltar</a>
                </div>
            </header>
            <div class="card mb-4">
                <div class="card">
                    <div class="card-header">Prontuário</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <span><h5><label>Nome:</label> <?php echo $rows['nome']; ?></h5></span>
                            </div>
                        </div>
                        <!--Segundo bloco-->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <span><label>Situação: </label> <?php echo $rows['nome_situacao']; ?></span>
                            </div>
                            <div class="col-md-3">
                                <span><label>CNS: </label> <?php echo $rows['cns']; ?></span>
                            </div>
                            <div class="col-md-3">
                                <span><label>CPF: </label> <?php echo $rows['cpf']; ?></span>
                            </div>
                            <div class="col-md-3">
                                <span><label>RG: </label> <?php echo $rows['rg']; ?></span>
                            </div>
                        </div>

                        <!--Terceiro bloco-->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <span><label>Celular: </label> <?php echo $rows['celular']; ?></span>
                            </div>
                            <div class="col-md-4">
                                <span><label>Unidade de Saúde: </label> <?php echo $rows['nome_usf']; ?></span>
                            </div>
                            <div class="col-md-4">
                                <span><label>Endereço: </label> <?php echo $rows['endereco']; ?></span>
                            </div>
                        </div>
                        <!--Quarto bloco-->
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <span><label>Número: </label> <?php echo $rows['numero']; ?></span>
                            </div>
                            <div class="col-md-3">
                                <span><label>Bairro: </label> <?php echo $rows['bairro']; ?></span>
                            </div>
                            <div class="col-md-3">
                                <span><label>Cidade: </label> <?php echo $rows['cidade']; ?></span>
                            </div>
                            <div class="col-md-3">
                                <span><label>CEP: </label> <?php echo $rows['cep']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </body>
        </html>
        <?php
    } else {
        // Exibir uma mensagem de erro se nenhum paciente for encontrado com o ID fornecido
        echo "Paciente não encontrado.";
    }
} else {
    // Exibir uma mensagem de erro se o ID do paciente não estiver presente na URL
    echo "ID do paciente não fornecido.";
}
?>