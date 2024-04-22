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
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * @return mixed
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * @param mixed $placa
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }

    /**
     * @return mixed
     */
    public function getRenavam()
    {
        return $this->renavam;
    }

    /**
     * @param mixed $renavam
     */
    public function setRenavam($renavam)
    {
        $this->renavam = $renavam;
    }

    /**
     * @return mixed
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * @param mixed $ano
     */
    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    /**
     * @return mixed
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * @param mixed $cor
     */
    public function setCor($cor)
    {
        $this->cor = $cor;
    }

    /**
     * @return mixed
     */
    public function getCombustivel()
    {
        return $this->combustivel;
    }

    /**
     * @param mixed $combustivel
     */
    public function setCombustivel($combustivel)
    {
        $this->combustivel = $combustivel;
    }

    /**
     * @return mixed
     */
    public function getVagas()
    {
        return $this->vagas;
    }

    /**
     * @param mixed $vagas
     */
    public function setVagas($vagas)
    {
        $this->vagas = $vagas;
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
}
?>