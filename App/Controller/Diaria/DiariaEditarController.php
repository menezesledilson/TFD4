<?php
require_once("../../Model/DiariaModel.php");
class DiariaEditarController
{
    private $editar;
    private $id;
    private $nome;
    public function __CONSTRUCT($id)
    {
        $this->editar = new Diaria();
        $this->id = $id;
        $this->criarFormulario($id);
    }
    public function criarFormulario($id)
    {
        $row = $this->editar->pesquisaDiaria($id);
        if ($row) {
            //Localizar nome da coluna no banco de dados
            $this->nome = $row['diaria'];
        }
    }
    public function editarFormulario($nome, $id)
    {
        if ($this->editar->atualizaDiaria($nome,$id) == TRUE) {
            echo "<script>alert('Registro atualizado com sucesso!');document.location='../../view/DiariaView/indexDiaria.php'</script>";
        } else {
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
}
$id = filter_input(INPUT_GET, 'id');
$editarDiaria = new DiariaEditarController($id);
if (isset($_POST['submit'])) {
    $editarDiaria->editarFormulario($_POST['nome'],$_POST['id']);
}
?>