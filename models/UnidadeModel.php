<?php
require_once (__DIR__ ."/../dao/UnidadeDAO.php");
class Unidade extends Banco
{
    private $id;
    private $nome;
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

    public function getCreated()
    {
        return $this->created;
    }
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->modified;
    }

    public function setModified($modified): void
    {
        $this->modified = $modified;
    }

    private $unidadeDAO;

    public function __construct()
    {
        $this->unidadeDAO= new UnidadeDAO();
    }

   // Método para incluir uma unidade no banco de dados
    public function cadastrarUnidade($nome)
    {
        // Formate a data e hora no formato MySQL padrão
        $dataHoraAtual = date('Y-m-d H:i:s');

    // Aqui você pode chamar o método de inclusão da classe UnidadeDAO
        return $this->unidadeDAO->postUnidade($nome,$dataHoraAtual,$dataHoraAtual);
    }

    // Método para lista todas unidades no banco de dados
    public function listarUnidades(){
        return $this->unidadeDAO->getUnidade();
    }

    //Atualizar o nome da unidade
    public function atualizaUnidade($nome,$id)
    {
        // Formate a data e hora no formato MySQL padrão
        $dataHoraAtual = date('Y-m-d H:i:s');

        return $this->unidadeDAO->putUnidade($nome,$dataHoraAtual,$id);
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