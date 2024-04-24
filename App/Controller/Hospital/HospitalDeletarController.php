<?php
require_once("../../Model/HospitalModel.php");

class deletaHospital
{
    private $deleta;

    public function __construct($id)
    {
        $this->deleta = new Hospital();
        if ($this->deleta->excluirHospital($id) == TRUE) {
            echo "<script>alert('Deletado com sucesso!');document.location='../../view/HospitalView/indexHospital.php'</script>";
        } else {
            echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
        }
    }
}
if(isset($_GET['id'])){
    new deletaHospital($_GET['id']);
} else {
    // Lidar com o caso em que o parâmetro id não está presente na URL
    echo "<scritp> alert ( 'Parâmetro ID não encontrado na URL'); history.back()</scritp>";
}
?>