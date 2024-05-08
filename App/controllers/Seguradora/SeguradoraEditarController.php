<?php
require_once (__DIR__ ."/../../models/SeguradoraModel.php");

class editarSeguradora
{
    private $editar;
    private $id;
    private $nome;
    private $telefone;

    public function __CONSTRUCT($id)
    {
        $this->editar = new Seguradora();
        $this->id = $id;
        $this->criarFormulario($id);
    }

    public function criarFormulario($id)
    {
        $row = $this->editar->pesquisaSeguradora($id);
        if ($row) {
            //Localizar nome da coluna no banco de dados
            $this->nome = $row['nome'];
            $this->telefone = $row['telefone'];
        }
    }

    public function editarFormulario($nome,$telefone,$id)
    {
        if ($this->editar->atualizaSeguradora($nome,$telefone,$id) == TRUE) {
            echo "<script>alert('Registro atualizado com sucesso!');document.location='./indexSeguradora.php'</script>";
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

    public function getTelefone()
    {
        return $this->telefone;
    }
}

$id = filter_input(INPUT_GET, 'id');
$editaSeguradora = new editarSeguradora($id);
if (isset($_POST['submit'])) {
    $editaSeguradora->editarFormulario($_POST['nome'],$_POST['telefone'],$_POST['id']);
}

?>