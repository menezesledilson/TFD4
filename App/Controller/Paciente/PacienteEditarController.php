<?php
require_once("../../Model/PacienteModel.php");

class editarPaciente
{

    private $editar;
    private $id;
    private $nome;
    private $rg;
    private $cpf;
    private $cns;
    private $celular;
    private $endereco;
    private $numero;
    private $bairro;
    private $cidade;
    private $cep;
    private $id_situacao;
    private $id_unidade_usf;

    public function __construct($id)
    {
        $this->editar = new Paciente();
        $this->id = $id;
        $this->criarFormulario($id);
    }

    public function criarFormulario($id)
    {
        $row = $this->editar->pesquisaPaciente($id);
        if ($row) {
            //Localizar nome da coluna no banco de dados
            $this->nome = $row['nome'];
            $this->rg = $row['rg'];
            $this->cpf = $row['cpf'];
            $this->cns = $row['cns'];
            $this->celular = $row['celular'];
            $this->endereco = $row['endereco'];
            $this->numero = $row['numero'];
            $this->bairro = $row['bairro'];
            $this->cidade = $row['cidade'];
            $this->cep = $row['cep'];
            $this->id_situacao = $row['id_unidade_usf'];
            $this->id_unidade_usf = $row['id_unidade_usf'];
        }
    }

    public function editarFormulario($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_unidade_usf, $id_situacao,$id)
    {
        // Chama a função da classe de modelo para atualizar os dados do paciente no banco de dados
        if ($this->editar->atualizarPaciente($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_situacao, $id_unidade_usf, $id)== TRUE) {
            echo "<script>alert('Registro atualizado com sucesso!');document.location='../../view/PacienteView/indexPaciente.php'</script>";
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
     public function getRg()
    {
        return $this->rg;
    }
     public function getCpf()
    {
        return $this->cpf;
    }
     public function getCns()
    {
        return $this->cns;
    }
     public function getCelular()
    {
        return $this->celular;
    }
     public function getEndereco()
    {
        return $this->endereco;
    }
     public function getNumero()
    {
        return $this->numero;
    }
     public function getBairro()
    {
        return $this->bairro;
    }
     public function getCidade()
    {
        return $this->cidade;
    }
     public function getCep()
    {
        return $this->cep;
    }
     public function getIdSituacao()
    {
        return $this->id_situacao;
    }
     public function getIdUnidadeUsf()
    {
        return $this->id_unidade_usf;
    }
}
$id = filter_input(INPUT_GET, 'id');
$editaPaciente = new editarPaciente($id);
if (isset($_POST['submit'])) {
    $editaPaciente->editarFormulario($_POST['nome'],$_POST['rg'], $_POST['cpf'] , $_POST['cns'],  $_POST['celular'], $_POST['endereco'], $_POST['numero'],  $_POST['bairro'], $_POST['cidade'],  $_POST['cep'], $_POST['id_unidade_usf'], $_POST['id_situacao'], $_POST['id']);

}



