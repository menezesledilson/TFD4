<?php
require_once (__DIR__ ."/../../models/EspecialidadeModel.php");

class cadastrarMotorista
{
    private $cadastro;
    public function __construct()
    {
        $this->cadastro = new Especialidade();
        $this->cadastrarEspecialidade();
    }
    private function cadastrarEspecialidade(){
        $nomeEspecialidade = $_POST['nome'];

        $result=$this->cadastro->cadastrarEspecialidade($nomeEspecialidade);

        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../../views/user/EspecialidadeView/indexEspecialidade.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
}
new cadastrarMotorista();
?>