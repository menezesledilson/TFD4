<?php
require_once (__DIR__ ."/../../models/HospitalModel.php");

class editarHospital
{
    private $editar;

    private $id;

    private $nome;
    private $endereco;
    private $numero;
    private $bairro;
    private $cep;
    private $telefone;
    private $cidade;

    public function __construct($id)
    {
        $this->editar = new Hospital();
        $this->id = $id;
        $this->criarFormulario($id);
    }

    public function criarFormulario($id)
    {
        $row = $this->editar->pesquisarHospital($id);
        if ($row) {
            $this->nome = $row['nome'];
            $this->endereco = $row['endereco'];
            $this->numero = $row['numero'];
            $this->bairro = $row['bairro'];
            $this->cep = $row['cep'];
            $this->telefone = $row['telefone'];
            $this->cidade = $row['cidade'];

        } else {
            // Tratar o caso em que a pesquisa da unidade não retornou resultados ou 'nome' não está definido
            echo "Registro não encontrado ou nome não está definido.";
        }
    }

    public function editarFormulario($nome, $endereco, $numero, $bairro, $cep, $telefone, $cidade, $id)
    {
        if ($this->editar->atualizarHospital($nome, $endereco, $numero, $bairro, $cep, $telefone, $cidade, $id) == TRUE) {
            echo "<script>alert('Registro atualizado com sucesso!');document.location='./indexHospital.php'</script>";
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

    public function getCep()
    {
        return $this->cep;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }


    public function getCidade()
    {
        return $this->cidade;
    }
}
    $id = filter_input(INPUT_GET, 'id');
$editaHospital = new editarHospital($id);
if(isset($_POST['submit'])) {
    $editaHospital->editarFormulario($_POST['nome'], $_POST['endereco'], $_POST['numero'], $_POST['bairro'], $_POST['cep'],$_POST['cidade'],$_POST['telefone'],$_POST['id']);
}
?>