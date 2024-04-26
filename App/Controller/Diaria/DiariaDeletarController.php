<?php
require_once("../../Model/DiariaModel.php");

class deletaDiaria
{
    private $deleta;
    public function __construct($id)
    {
        $this->deleta = new Diaria();
        if ($this->deleta->excluirDiaria($id) == TRUE) {
            echo "<script> alert('Deletado com sucesso!'); document.location='../../View/DiariaView/indexDiaria.php' </script>";
        } else {
            echo "<script> alert('Erro ao deletar registro!');history.back()  </script>";
        }
    }

}
if (isset($_GET['id'])) {
    new deletaDiaria($_GET['id']);
} else {
    // Lidar com o caso em que o parâmetro id não está presente na URL
    echo "<script>alert('Parâmetro ID não encontrado na URL');history.back()</script>";
}
?>