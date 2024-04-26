<?php
require_once ("../../DAO/DiariaDAO.php");
class Diaria extends Banco
{
private $id;
private $nome;

private $created;
private $modified;

    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param mixed $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
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

   private $diariaDAO;

    public function __construct()
    {
        $this->diariaDAO=new DiariaDAO();
    }

    //Método para incluir diaria
    public function cadastrarDiaria($nome)
    {
     return $this->diariaDAO->postDiaria($nome);
    }

    //Método para listar  diaria
    public  function listarDiaria()
    {
        return $this->diariaDAO->getDiaria();
    }
    //Atualizar a informação da diaria
    public  function atualizaDiaria($nome,$id)
    {
        return $this->diariaDAO->putDiaria($nome,$id);
    }

    //Método para deletar diaria
    public  function excluirDiaria($id){
        return $this->diariaDAO->deleteDiaria($id);
    }
    //pesquisa diaria
    public  function pesquisaDiaria($id)
    {
        return $this->diariaDAO->localizarDiaria($id);
    }
}