<?php
require_once (__DIR__ ."/../../models/UnidadeModel.php");

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
        $row = $this->editar->pesquisaUnidade($id);
        if ($row) {
            //Localizar nome da coluna no banco de dados
            $this->nome = $row['nome_usf'];
        } else {
            // Tratar o caso em que a pesquisa da unidade não retornou resultados ou 'nome' não está definido
            echo "Registro não encontrado ou nome não está definido.";
        }
    }

    public function editarFormulario($nome, $id)
    {
        if ($this->editar->atualizaUnidade($nome,$id) == TRUE) {
            echo "<script>alert('Registro atualizado com sucesso!');document.location='./indexUnidade.php'</script>";
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
$editar = new editarUnidade($id);
if (isset($_POST['submit'])) {
    $editar->editarFormulario($_POST['nome'], $_POST['id']);
}
?>