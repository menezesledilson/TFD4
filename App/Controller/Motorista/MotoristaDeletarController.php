<?php
require_once("../../Model/MotoristaModel.php");

class deletaMotorista
{
    private $deleta;

    public function __construct($id)
    {
        $this->deleta = new Motorista();
        if($this->deleta->excluirMotorista($id)==TRUE){
            echo "<script>alert('Deletado com sucesso!');document.location='../../view/MotoristaView/indexDiaria.php'</script>";
        }else{
            echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
        }
    }
}
if(isset($_GET['id'])){
   new deletaMotorista($_GET['id']);
} else {
    // Lidar com o caso em que o parâmetro id não está presente na URL
    echo "<scritp> alert ( 'Parâmetro ID não encontrado na URL'); history.back()</scritp>";
}
?>