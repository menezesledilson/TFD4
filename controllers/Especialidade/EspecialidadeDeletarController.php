<?php
require_once (__DIR__ ."/../../models/EspecialidadeModel.php");

class deletaEspecialidade
{
    private $deleta;

    public function __construct($id)
    {
        $this->deleta = new Especialidade();
        if($this->deleta->excluirEspecialidade($id)==TRUE){
            echo "<script>alert('Deletado com sucesso!');document.location='../../views/user/EspecialidadeView/indexEspecialidade.php'</script>";
        }else{
            echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
        }
    }
}
if(isset($_GET['id'])){
   new deletaEspecialidade($_GET['id']);
} else {
    // Lidar com o caso em que o parâmetro id não está presente na URL
    echo "<scritp> alert ( 'Parâmetro ID não encontrado na URL'); history.back()</scritp>";
}
?>