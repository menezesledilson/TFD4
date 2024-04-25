<?php
require_once ("../../DAO/CarroDAO.php");
class Carro extends Banco {

    private $id;
    private $modelo;
    private $placa;
    private  $renavam;
    private $ano;
    private $cor;
    private $combustivel;
    private $vagas;
    private $created;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getModelo()
    {
        return $this->modelo;
    }
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }
    public function getPlaca()
    {
        return $this->placa;
    }
    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }

    public function getRenavam()
    {
        return $this->renavam;
    }
    public function setRenavam($renavam)
    {
        $this->renavam = $renavam;
    }
    public function getAno()
    {
        return $this->ano;
    }

    public function setAno($ano)
    {
        $this->ano = $ano;
    }
    public function getCor()
    {
        return $this->cor;
    }
    public function setCor($cor)
    {
        $this->cor = $cor;
    }
    public function getCombustivel()
    {
        return $this->combustivel;
    }
    public function setCombustivel($combustivel)
    {
        $this->combustivel = $combustivel;
    }
    public function getVagas()
    {
        return $this->vagas;
    }
    public function setVagas($vagas)
    {
        $this->vagas = $vagas;
    }
    public function getCreated()
    {
        return $this->created;
    }
    public function setCreated($created)
    {
        $this->created = $created;
    }
    private $carroDAO;
    public function __construct()
    {
        $this->carroDAO=new CarroDAO();
    }

    //Método para incluir  a frota de carros

    public  function cadastrarCarro($modelo,$placa,$renavam,$ano,$cor,$combustivel,$vagas)
    {
        return $this->carroDAO ->postCarro($modelo,$placa,$renavam,$ano,$cor,$combustivel,$vagas, date('Y-m-d H:i:s'));
    }

    //Método para listar a frota de carros
    public  function listarCarros()
    {
        return $this->carroDAO->getCarro();
    }
    //Atualizar a informação do veículo
    public  function atualizaCarro($modelo,$placa,$renavam,$ano,$cor,$combustivel,$vagas,$id)
    {
        return $this->carroDAO->putCarro($modelo,$placa,$renavam,$ano,$cor,$combustivel,$vagas,$id);
    }
    //pesquisa veiculo
    public  function pesquisaCarro($id)
    {
        return $this->carroDAO->localizarCarro($id);
    }

    //Método para deletar veiculo
    public  function excluirCarro($id){
        return $this->carroDAO->deleteVeiculo($id);
    }
}
?>