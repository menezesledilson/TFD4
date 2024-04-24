<?php
require_once("../../Model/CarroModel.php");

class editarVeiculo
{
    private $editar;
    private $id;
    private $modelo;
    private $placa;
    private $renavam;
    private $ano;
    private $cor;
    private $combustivel;
    private $vagas;

    public function __CONSTRUCT($id)
    {
        $this->editar = new Carro();
        $this->id = $id;
        $this->criarFormulario($id);
    }

    public function criarFormulario($id)
    {
        $row = $this->editar->pesquisaCarro($id);
        if ($row) {
            //Localizar nome da coluna no banco de dados
            $this->modelo = $row['modelo'];
            $this->placa = $row['placa'];
            $this->renavam = $row['renavam'];
            $this->ano = $row['ano'];
            $this->cor = $row['cor'];
            $this->combustivel = $row['combustivel'];
            $this->vagas = $row['vagas'];
        } else {
            // Tratar o caso em que a pesquisa da unidade não retornou resultados ou 'nome' não está definido
            echo "Registro não encontrado ou nome não está definido.";
        }
    }

    public function editarFormulario($modelo, $placa, $renavam, $ano, $cor, $combustivel, $vagas, $id)
    {
        if ($this->editar->atualizaCarro($modelo, $placa, $renavam, $ano, $cor, $combustivel, $vagas, $id) == TRUE) {
            echo "<script>alert('Registro atualizado com sucesso!');document.location='../../view/CarroView/indexHospital.php'</script>";
        } else {
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getPlaca()
    {
        return $this->placa;
    }

    public function getRenavam()
    {
        return $this->renavam;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function getCor()
    {
        return $this->cor;
    }

    public function getCombustivel()
    {
        return $this->combustivel;
    }

    public function getVagas()
    {
        return $this->vagas;
    }

}

$id = filter_input(INPUT_GET, 'id');
$editarCarro = new editarVeiculo($id);
if (isset($_POST['submit'])) {
    $editarCarro->editarFormulario($_POST['modelo'],$_POST['placa'],$_POST['renavam'],$_POST['ano'],$_POST['cor'],$_POST['combustivel'],$_POST['vagas'], $_POST['id']);
}

?>