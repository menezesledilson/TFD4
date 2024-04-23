<?php
require_once ("../../Model/CarroModel.php");

class cadastrarMotorista
{
    private $cadastro;
    public function __construct(){
        $this->cadastro = new MotoristaModel();
        $this->cadastroMotorista();
    }
    private function cadastroMotorista(){
        $this->cadastro->setNome($_POST['nome']);
        $result=$this->cadastro->setTelefone($_POST['telefone']);

        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../../view/CarroView/indexCarro.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
}
?>