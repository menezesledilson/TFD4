<?php
require_once("../../models/SeguradoraModel.php");

class deletaSeguradora
{
    private $deleta;
    public function __construct($id)
    {
        $this->deleta = new Seguradora();
        if ($this->deleta->excluirSeguradora($id) == TRUE) {
            echo "<script> alert('Deletado com sucesso!'); document.location='../../views/user/SeguradoraView/indexSeguradora.php' </script>";
        } else {
            echo "<script> alert('Erro ao deletar registro!');history.back()  </script>";
        }
    }

}
if (isset($_GET['id'])) {
    new deletaSeguradora($_GET['id']);
} else {
    // Lidar com o caso em que o parâmetro id não está presente na URL
    echo "<script>alert('Parâmetro ID não encontrado na URL');history.back()</script>";
}
?>