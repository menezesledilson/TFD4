<?php
require_once (__DIR__ ."/../../models/PacienteModel.php");

class deletaPacienteController
{
    private $deleta;

    public function __construct($id)
    {
        $this->deleta = new Paciente();
        if($this->deleta->excluirPaciente($id)==TRUE){
            echo "<script>alert('Deletado com sucesso!');document.location='../../views/user/PacienteView/indexPaciente.php'</script>";
        }else{
            echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
        }
    }
}
if(isset($_GET['id'])){
    new deletaPacienteController($_GET['id']);
} else {
    // Lidar com o caso em que o parâmetro id não está presente na URL
    echo "<scritp> alert ( 'Parâmetro ID não encontrado na URL'); history.back()</scritp>";
}
?>