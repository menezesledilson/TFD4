<?php
require_once (__DIR__ ."/../../models/ViagemModel.php");

class cadastrarHospital
{
    private $cadastro;

    public function __construct()
    {
        $this->cadastro = new Viagem();
        $this->cadastrarViagem();
    }

    public function cadastrarViagem()
    {
        // Verificar se o campo 'nome' está definido em $_POST
        if (isset($_POST['local_viagem']) && isset($_POST['destino']) && isset($_POST['hora_saida']) && isset($_POST['data_viagem']) && isset($_POST['id_carro']) && isset($_POST['id_motorista']) && isset($_POST['id_paciente']) && isset($_POST['id_acompanhante'])) {
            // Campos estão definidos, podemos acessá-los
            $localViagem = $_POST['local_viagem '];
            $destino  = $_POST['destino'];
            $horaSaida = $_POST['hora_saida'];
            $dataViagem = $_POST['data_viagem'];
            
            $idCarro = $_POST['id_carro'];
            
            $idMotorista = $_POST['id_motorista'];
            $idPaciente = $_POST['id_paciente'];
            $idAcompanhante = $_POST['id_acompanhante'];

            // Tentar cadastrar o hospital
            $result = $this->cadastro->cadastrarHospital($localViagem, $destino,$horaSaida, $dataViagem, $idCarro, $idMotorista,$idPaciente,$idAcompanhante);

            if ($result >= 1) {
                echo "<script>alert('Registro incluído com sucesso!'); document.location='../../views/user/ViagemView/indexViagem.php'</script>";
            } else {
                echo "<script>alert('Erro ao gravar registro!');</script>";
            }
        } else {
            // Campo 'nome' não está definido em $_POST
            echo "<script>alert('Erro: O campo nome não foi enviado!');</script>";
        }
    }
}

new cadastrarHospital();
?>
