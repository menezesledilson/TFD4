<?php
require_once("../../DAO/SituacaoDAO.php");

class Situacao extends Banco
{
    private $id;
    private $nome;

    private $created;
    private $modified;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
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

    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    private $situacaoDAO;

    public function __construct()
    {
        $this->situacaoDAO= new SituacaoDAO();
    }
    // Método para lista todas unidades no banco de dados
    public function listarSituacoes(){
        return $this->situacaoDAO->getSituacao();
    }
}
?>