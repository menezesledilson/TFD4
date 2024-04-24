<?php
require_once("../../Model/CarroModel.php");

class cadastrarCarro
{
    private $cadastro;

    public function __construct()
    {
        $this->cadastro = new Carro();
        $this->cadastrarCarro();
    }

    private function cadastrarCarro()
    {
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $renavam = $_POST['renavam'];
        $ano = $_POST['ano'];
        $cor = $_POST['cor'];
        $combustivel = $_POST['combustivel'];
        $vagas = $_POST['vagas'];

        $result = $this->cadastro->cadastrarCarro($modelo, $placa, $renavam, $ano, $cor, $combustivel, $vagas);


        if ($result >= 1) {
            echo "<script> alert('Registro incluído com sucesso!');document.location='../../View/CarroView/indexHospital.php' </script>";
        } else {
            echo "<script> alert('Erro ao gravar registro');history.back() </script>)";
        }
    }
}

new cadastrarCarro();
?>