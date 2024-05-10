<?php
require_once(__DIR__ . "/../dao/EspecialidadeDAO.php");

class Especialidade extends Banco
{
    private $id;
    private $nomeEspecialidade;
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
    public function getNomeEspecialidade() {
        return $this->nomeEspecialidade;
    }

    public function setNomeEspecialidade($nomeEspecialidade){
        $this->nomeEspecialidade = $nomeEspecialidade;
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
    private $especialidadeDAO;

    public function __construct()
    {
        $this->especialidadeDAO = new EspecialidadeDAO();
    }
    //Método para listar os motorista
    public function listarEspecialidades()
    {
        return $this->especialidadeDAO->getEspecialidade();
    }

    //método para cadastrar os motorista
    public function cadastrarEspecialidade($nomeEspecialidade)
    {
        // Formate a data e hora no formato MySQL padrão
        $dataHoraAtual = date('Y-m-d H:i:s');
        return $this->especialidadeDAO->postEspecialidade($nomeEspecialidade,$dataHoraAtual,$dataHoraAtual);
    }

    //Atualizar a informação do motorista
    public function atualizarEspecialidade($nomeEspecialidade, $id)
    {
        // Formate a data e hora no formato MySQL padrão
        $dataHoraAtual = date('Y-m-d H:i:s');

        return $this->especialidadeDAO->putEspecialidade($nomeEspecialidade,$dataHoraAtual, $id);
    }

    //pesquisa motorista
    public function pesquisarEspecialidade($id)
    {
        return $this->especialidadeDAO->localizarEspecialidade($id);
    }

    //Método para deletar veículo
    public function excluirEspecialidade($id)
    {
        return $this->especialidadeDAO->deleteEspecialidade($id);
    }
}

?>