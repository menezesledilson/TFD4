<?php
require_once("../../models/SeguradoraModel.php");

class cadastrarSeguradora
{
    private $cadastro;

    public function __construct()
    {
        $this->cadastro = new Seguradora();
        $this->cadastrarSeguradora();
    }

    private function cadastrarSeguradora()
    {
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
       $result = $this->cadastro->cadastrarSeguradora($nome, $telefone);
        if ($result >= 1) {
            echo "<script> alert('Registro incluído com sucesso!');document.location='../../views/user/SeguradoraView/indexSeguradora.php' </script>";
        } else {
            echo "<script> alert('Erro ao gravar registro');history.back() </script>)";
        }
    }
}

new cadastrarSeguradora();
?>