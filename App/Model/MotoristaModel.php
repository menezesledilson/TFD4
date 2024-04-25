<?php
require_once ("../../DAO/MotoristaDAO.php");

class Motorista extends  Banco
{
    private $id;
    private $nome;
    private $telefone;

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

   //Construtor da classe
    private $motoristaDAO;

    public function __construct()
    {
        $this->motoristaDAO = new MotoristaDAO();
    }
    //método para cadastrar os motorista
    public function cadastrarMotorista($nome,$telefone)
    {
        return $this->motoristaDAO->postMotorista($nome,$telefone,date('Y-m-d H:i:s'));
    }
    //Método para listar os motorista
    public function listarMotoristas()
    {
        return $this->motoristaDAO->getMotorista();
    }
    //Atualizar a informação do motorista
    public function atualizarMotorista($nome,$telefone,$id)
    {
        return $this->motoristaDAO->putMotorista($nome,$telefone,$id);
    }
    //pesquisa motorista
    public function pesquisarMotorista($id){
        return $this->motoristaDAO->localizarMotorista($id);
    }
    //Método para deletar veículo
    public function excluirMotorista($id){
        return $this->motoristaDAO->deleteMotorista($id);
    }
}
?>