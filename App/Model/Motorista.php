<?php
require_once ("../../DAO/MotoristaDAO.php");

class Motorista extends  Banco
{
    private $id;
    private $nome;
    private $telefone;

    private $created;

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

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
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

   //Construtor da classe
    private $MotoristaDAO;
    public function __construct(){
        $this->MotoristaDAO = new MotoristaDAO();
    }
    //método para cadastrar os motorista
    public function cadastrarMotorista($nome,$telefone){
        return $this->MotoristaDAO->postMotorista($nome,$telefone);
    }
    //Método para listar os motorista
    public function listarMotoristas(){
        return $this->MotoristaDAO->getMotoristas();
    }
    //Atualizar a informação do motorista
    public function atualizarMotorista($nome,$telefone,$id){
        return $this->MotoristaDAO->putMotorista($nome,$telefone,$id);
    }
    //pesquisa motorista
    public function pesquisarMotorista($id){
        return $this->MotoristaDAO->localizarMotorista($id);
    }
    //Método para deletar veículo
    public function excluirMotorista($id){
        return $this->MotoristaDAO->deleteMotorista($id);
    }
}
?>