<?php
require_once ("../../Model/MotoristaModel.php");

class cadastrarMotorista
{
    private $cadastro;
    public function __construct(){
        $this->cadastro = new Motorista();
        $this->cadastrarMotorista();
    }
    private function cadastrarMotorista(){
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];

        $result=$this->cadastro->cadastrarMotorista($nome,$telefone);

        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../../view/MotoristaView/indexMotorista.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
}
new cadastrarMotorista();
?>