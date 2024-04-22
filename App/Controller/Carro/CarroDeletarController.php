<?php
require_once("../../Model/CarroModel.php");

class deletaCarro
{
    private $deleta;
    public function __construct($id)
    {
        $this->deleta = new Carro();
        if ($this->deleta->excluirCarro($id) == TRUE) {
            echo "<script> alert('Deletado com sucesso!'); document.location='../../View/CarroView/indexCarro.php' </script>";
        } else {
            echo "<script> alert('Erro ao deletar registro!');history.back()  </script>";
        }
    }

}
if (isset($_GET['id'])) {
    new deletaCarro($_GET['id']);
} else {
    // Lidar com o caso em que o parâmetro id não está presente na URL
    echo "<script>alert('Parâmetro ID não encontrado na URL');history.back()</script>";
}
?>