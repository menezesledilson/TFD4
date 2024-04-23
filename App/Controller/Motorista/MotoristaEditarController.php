<?php
require_once ("../../Model/MotoristaModel.php");

class editarMotorista
{
    private $editar;

    private $id;

    private $nome;
    private $telefone;

    public function __construct($id)
    {
        $this->editar = new Motorista();
        $this->id = $id;
        $this->criarFormulario($id);
    }

    public function criarFormulario($id)
    {
        $row = $this->editar->pesquisarMotorista($id);
        if ($row) {
            //Localizar nome da coluna no banco de dados
            $this->nome = $row['nome'];
            $this->telefone = $row['telefone'];
        } else {
            // Tratar o caso em que a pesquisa da unidade não retornou resultados ou 'nome' não está definido
            echo "Registro não encontrado ou nome não está definido.";
        }
    }

    public function editarFormulario($nome, $telefone, $id)
    {

        if ($this->editar->atualizaUnidade($nome, $telefone, $id) == TRUE) {
            echo "<script>alert('Registro atualizado com sucesso!');document.location='../../view/MotoristaView/indexMotorista.php'</script>";
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
    $editar = new editarMotorista($id);
    if(isset($_POST['submit'])){
        $editar->editarMotorista($_POST['nome'],$_POST['telefone'],$_POST['id']);
}
?>