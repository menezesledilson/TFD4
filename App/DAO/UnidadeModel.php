<?php
require_once("UnidadeDAO.php");
class Unidade
{
    private $id;
    private $nome;
    private $created;

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

    private $unidadeDAO;

    public function __construct()
    {
        $this->unidadeDAO= new UnidadeDAO();
    }

   // Método para incluir uma unidade no banco de dados
    public function cadastrarUnidade($nome)
    {
    // Aqui você pode chamar o método de inclusão da classe UnidadeDAO
        return $this->unidadeDAO->postUnidade($nome, date('Y-m-d H:i:s'));
    }

    // Método para lista todas unidades no banco de dados
    public function listarUnidades(){
        return $this->unidadeDAO->getUnidade();
    }

    //Atualizar o nome da unidade
    public function atualizaUnidade($nome,$id)
    {
        return $this->unidadeDAO->putUnidade($nome,$id);
    }

    public function pesquisaUnidade($id ){
        return $this->unidadeDAO->localizarUnidade($id );



    }
    //Métdo para deletar unidadde da lista
    public function excluirUnidade($id){
        return $this->unidadeDAO->deleteUnidade($id);
    }

}
?>