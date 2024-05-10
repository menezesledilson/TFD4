<?php
require_once("../../Models/CarroModel.php");

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
        $tipo_carro = $_POST['tipo_carro'];
        $marca = $_POST['marca'];
        $data_vencimento =$_POST['data_vencimento'];
        $id_seguradora = $_POST['id_seguradora'];

        $result = $this->cadastro->cadastrarCarro($modelo, $placa, $renavam, $ano, $cor, $combustivel, $vagas,$tipo_carro,$marca,$data_vencimento,$id_seguradora);
         if ($result >= 1) {
            echo "<script> alert('Registro incluído com sucesso!');document.location='../../views/user/CarroView/indexCarro.php' </script>";
        } else {
            echo "<script> alert('Erro ao gravar registro');history.back() </script>)";
        }
    }
}

new cadastrarCarro();
?>