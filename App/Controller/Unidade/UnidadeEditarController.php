<?php
require_once("../../DAO/UnidadeModel.php");

class editarUnidade
{
    private $editar;
    private $id;
    private $nome;


    public function __CONSTRUCT($id)
    {
        $this->editar = new Unidade();
        $this->id = $id;
        $this->criarFormulario($id);
    }

    public function criarFormulario($id)
    {
        $row = $this->editar->consultaUnidade($id);
        if ($row) {
            $this->nome = $row['nome'];
        } else {
            // Tratar o caso em que a pesquisa do livro não retornou resultados
            echo "Registro não encontrado.";
        }
    }

    public function editarFormulario($nome, $id) {
        if ($this->editar->putSituacao($nome, $id) == TRUE) {
            echo "<script>alert('Registro incluído com sucesso!');document.location='../../view/UnidadeView/indexUnidade.php'</script>";
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
$editar = new editarController($id);
if (isset($_POST['submit'])) {
    $editar->editarFormulario($_POST['nome'], $_POST['id']);
}
?>