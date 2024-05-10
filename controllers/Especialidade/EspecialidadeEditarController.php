<?php

require_once (__DIR__ . "/../../models/EspecialidadeModel.php");

class editarEspecialidade {

    private $editar;
    private $id;
    private $nomeEspecialidade;

    public function __construct($id) {
        $this->editar = new Especialidade();
        $this->id = $id;
        $this->criarFormulario($id);
    }

    public function criarFormulario($id) {

        $row = $this->editar->pesquisarEspecialidade($id);
        if ($row) {
            //Localizar nome da coluna no banco de dados
            $this->nomeEspecialidade = $row['nome'];
        } else {
            // Tratar o caso em que a pesquisa da unidade não retornou resultados ou 'nome' não está definido
            echo "Registro não encontrado ou nome não está definido.";
        }
    }

    public function editarFormulario($nomeEspecialidade, $id) {
        if ($this->editar->atualizarEspecialidade($nomeEspecialidade, $id) == TRUE) {
            echo "<script>alert('Registro atualizado com sucesso!');document.location='./indexEspecialidade.php'</script>";
        } else {
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getNomeEspecialidade() {
        return $this->nomeEspecialidade;
    }
}

$id = filter_input(INPUT_GET, 'id');
$editaEspecialidade = new editarEspecialidade($id);
if (isset($_POST['submit'])) {
    $editaEspecialidade->editarFormulario($_POST['nome'], $_POST['id']);
}
?>