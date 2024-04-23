<?php
require_once("../../Model/MotoristaModel.php");

class deletaMotorista
{
    private $deleta;

    public function __construct($id)
    {
        $this->deleta = new Motorista();
        if($this->deleta->excluirMotorista($id)==TRUE){
            echo "<script>alert('Deletado com sucesso!');document.location='../../view/MotoristaView/indexMotorista.php'</script>";
        }else{
            echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
        }
    }
}
?>