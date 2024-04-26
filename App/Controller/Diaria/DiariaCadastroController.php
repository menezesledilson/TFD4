<?php
require_once("../../Model/DiariaModel.php");

class cadastrarDiaria
{
    private $cadastro;

    public function __construct()
    {
        $this->cadastro = new Diaria();
        $this->cadastrarDiaria();
    }

    private function cadastrarDiaria()
    {
        $nome = $_POST['nome'];

        $result = $this->cadastro->cadastrarDiaria($nome);


        if ($result >= 1) {
            echo "<script> alert('Registro incluído com sucesso!');document.location='../../View/DiariaView/indexDiaria.php' </script>";
        } else {
            echo "<script> alert('Erro ao gravar registro');history.back() </script>)";
        }
    }
}

new cadastrarDiaria();
?>