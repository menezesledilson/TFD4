<?php
require_once(__DIR__ . "/../dao/MotoristaDAO.php");

class Motorista extends Banco
{
    private $id;
    private $nome;
    private $telefone;
    private $created;
    private $modified;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function setModified($modified): void
    {
        $this->modified = $modified;
    }


    //Construtor da classe
    private $motoristaDAO;

    public function __construct()
    {
        $this->motoristaDAO = new MotoristaDAO();
    }

    //Método para listar os motorista
    public function listarMotoristas()
    {
        return $this->motoristaDAO->getMotorista();
    }

    //método para cadastrar os motorista
    public function cadastrarMotorista($nome, $telefone)
    {
        // Formate a data e hora no formato MySQL padrão
        $dataHoraAtual = date('Y-m-d H:i:s');
        return $this->motoristaDAO->postMotorista($nome, $telefone, $dataHoraAtual,$dataHoraAtual);
    }

    //Atualizar a informação do motorista
    public function atualizarMotorista($nome, $telefone, $id)
    {
        // Formate a data e hora no formato MySQL padrão
        $dataHoraAtual = date('Y-m-d H:i:s');

        return $this->motoristaDAO->putMotorista($nome, $telefone,$dataHoraAtual, $id);
    }

    //pesquisa motorista
    public function pesquisarMotorista($id)
    {
        return $this->motoristaDAO->localizarMotorista($id);
    }

    //Método para deletar veículo
    public function excluirMotorista($id)
    {
        return $this->motoristaDAO->deleteMotorista($id);
    }
}

?>