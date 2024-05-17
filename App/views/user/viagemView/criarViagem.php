<?php
//lista o motorista
require_once("../../../controllers/Motorista/MotoristaListarController.php");

$controllerMotorista = new listarMotorista();
$rowMotorista = $controllerMotorista->listarTodos();
$optionsMotoristaHtml = ""; // Variável para armazenar o HTML das opções

foreach ($rowMotorista as $motorista) {
    $optionsMotoristaHtml .= '<option value="' . $motorista['id'] . '">' . $motorista['nome_motorista'] . '</option>';
}

//lista o Carro
require_once("../../../controllers/Carro/CarroListarController.php");

$controllerCarro = new listarCarro();
$rowCarro = $controllerCarro->listarTodos();
$optionsCarroHtml = "";

foreach ($rowCarro as $carrro) {
    $optionsCarroHtml .= '<option value="' . $carrro['id'] . '"placa=" ' . $carrro['modelo'] . '">' . $carrro['placa'] . '</option>';
}

//listar Paciente
require_once("../../../controllers/Paciente/PacienteListarController.php");

$controllerPaciente = new listarPaciente();
$rowPaciente = $controllerPaciente->listarTodos();
$optionsPacienteHtml = "";
$optionsPacienteEmbarqueHtml = "";

foreach ($rowPaciente as $paciente) {
    $optionsPacienteHtml .= '<option value="' . $paciente['id'] . '" data-embarque="' . $paciente['embarque'] . '">' . $paciente['nome_paciente'] . '</option>';
}

?>
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
            <form method="post" action="../../../controllers/Viagem/ViagemCadastrarController.php" id ="form" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">Cadastro de Viagem</div>
                    <div class="card-body">

                        <!--Primeiro Coluna-->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <label>Local da viagem:</label>
                                <input class="form-control form-control-sm" type="text" id="local_viagem" name="local_viagem">
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Horário saída:</label>
                                <input class="form-control form-control-sm" type="time" id="hora_saida " name="hora_saida" >
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Data:</label>
                                <input class="form-control form-control-sm" type="date" id="data_viagem" name="data_viagem" >
                            </div>
                        </div>

                        <!-- Segunda Coluna -->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <label>Motorista:</label>
                                <select class="form-control" name="id_motorista">
                                    <option>Selecione</option>
                                    <?php echo $optionsMotoristaHtml; ?>
                                </select>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Placa:</label>
                                <select class="form-control" name="id_carro" onchange="updateModeloCarro()">
                                    <option>Selecione</option>
                                    <?php echo $optionsCarroHtml; ?>
                                </select>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Carro:</label>
                                <input class="form-control form-control-sm" type="text" id="modelo" name="modelo" readonly>
                            </div>
                        </div>
                        <script>
                            function updateModeloCarro() {
                                var select = document.querySelector('select[name="id_carro"]');
                                var selectedOption = select.options[select.selectedIndex];
                                var modeloInput = document.getElementById('modelo');
                                var selectedModelo = selectedOption.getAttribute('placa');

                                // Atualiza o valor do campo de texto do modelo do carro
                                modeloInput.value = selectedModelo;
                            }
                        </script>
                        <!--Terceira Coluna-->
                         <div class="row mb-4">
                            <div class="col-md-3">
                                <label>Paciente:</label>
                                <select class="form-control" name="id_paciente" onchange="updateEmbarque()">
                                    <option>Selecione</option>
                                    <?php echo $optionsPacienteHtml; ?>
                                </select>
                            </div>
                             <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <label>Acompanhante:</label>
                                <input class="form-control form-control-sm" type="text" id="embarque_paciente" name="embarque_paciente" readonly>
                            </div>

                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <label>Local embarque:</label>
                                <input class="form-control form-control-sm" type="text" id="embarque_paciente" name="embarque_paciente" readonly>
                            </div>
                                                    </div>
                        <script>
                            function updateEmbarque() {
                                var select = document.querySelector('select[name="id_paciente"]');
                                var selectedOption = select.options[select.selectedIndex];
                                var embarqueInput = document.getElementById('embarque_paciente');
                                var selectedEmbarque = selectedOption.getAttribute('data-embarque');

                                // Atualiza o valor do campo de texto do local de embarque do acompanhante
                                embarqueInput.value = selectedEmbarque;
                            }
                        </script>
                            
                          
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <input type="submit" name="create" value="Confirma" class="btn btn-primary">
                    </div>
            </form>
    </body>
</html>