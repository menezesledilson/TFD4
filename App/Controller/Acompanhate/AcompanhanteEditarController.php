<?php
require_once("../../Model/AcompanhanteModel.php");

class editarAcompanhante
{
    // Propriedades da classe
    private $editar;
    private $id;
    private $nome;
    private $rg;
    private $cpf;
    private $celular;
    private $endereco;
    private $numero;
    private $bairro;
    private $cidade;
    private $cep;

    // Construtor da classe
    public function __construct($id)
    {
        $this->editar = new Acompanhante();
        $this->id = $id;
        $this->criarFormulario($id);
    }

    // Método para criar o formulário
    public function criarFormulario($id)
    {
        $row = $this->editar->pesquisaAcompanhante($id);
        if ($row) {
            $this->nome = $row['nome'];
            $this->rg = $row['rg'];
            $this->cpf = $row['cpf'];
            $this->celular = $row['telefone'];
            $this->endereco = $row['endereco'];
            $this->numero = $row['numero'];
            $this->bairro = $row['bairro'];
            $this->cidade = $row['cidade'];
            $this->cep = $row['cep'];
        }
    }

    // Método para editar o formulário
    public function editarFormulario($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id)
    {
        // Chama a função da classe de modelo para atualizar os dados do paciente no banco de dados
        if ($this->editar->atualizarAcompanhante($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep,  $id)) {
            // Redirecionamento após a atualização bem-sucedida
            header("Location: ../../view/AcompanhanteView/indexAcompanhante.php");
            exit(); // Certifique-se de que nenhum código adicional seja executado após o redirecionamento
        } else {
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }

    // Métodos getters
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
}

// Processamento do formulário quando enviado
$id = filter_input(INPUT_GET,'id');
     $editaAcompanhante = new EditarAcompanhante($id);
     if(isset($_POST['submit'])){
    $editaAcompanhante->editarFormulario($_POST['nome'], $_POST['rg'], $_POST['cpf'], $_POST['celular'], $_POST['endereco'], $_POST['numero'], $_POST['bairro'], $_POST['cidade'], $_POST['cep'], $_POST['id']);
}
?>
