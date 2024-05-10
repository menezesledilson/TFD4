<?php
require_once("../../models/UnidadeModel.php");

class deletaUnidade
{
    private $deleta;

    public function __construct($id)
    {
        $this->deleta = new Unidade();
        if($this->deleta->excluirUnidade($id)==TRUE){
            echo "<script>alert('Deletado com sucesso!');document.location='../../views/user/UnidadeView/indexUnidade.php'</script>";
        }else{
            echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
        }
    }
}
if (isset($_GET['id'])) {
    new deletaUnidade($_GET['id']);
} else {
    // Lidar com o caso em que o parâmetro id não está presente na URL
    echo "<script>alert('Parâmetro ID não encontrado na URL');history.back()</script>";
}

?>