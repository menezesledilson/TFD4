<?php
require_once (__DIR__ ."/../../models/AcompanhanteModel.php");

class deletaAcompanhante
{
    private $deleta;

    public function __construct($id)
    {
        $this->deleta = new Acompanhante();

        if ($this->deleta->excluirAcompanhante($id) == TRUE) {
            echo "<script>alert('Deletado com sucesso!'); document.location='../../views/user/AcompanhanteView/indexAcompanhante.php'</script>";
        } else {
            echo "<script> alert('Erro ao deletar registro!');history.back() </script>";
        }
    }
}
if (isset($_GET['id'])) {
    new deletaAcompanhante($_GET['id']);
} else {
    // Lidar com o caso em que o parâmetro id não está presente na URL
    echo "<script>alert('Parâmetro ID não encontrado na URL');history.back()</script>";
}
?>
