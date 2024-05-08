<?php
require_once (__DIR__ ."/../dao/CarroDAO.php");
class Carro extends Banco {

    private $id;
    private $modelo;
    private $placa;
    private  $renavam;
    private $ano;
    private $cor;
    private $combustivel;
    private $vagas;

    private $id_seguradora;

    private $tipo_carro;
    private $marca;
    private $data_vencimento;
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

    /**
     * @return mixed
     */
    public function getIdSeguradora()
    {
        return $this->id_seguradora;
    }

    /**
     * @param mixed $id_seguradora
     */
    public function setIdSeguradora($id_seguradora): void
    {
        $this->id_seguradora = $id_seguradora;
    }

    /**
     * @return mixed
     */
    public function getTipoCarro()
    {
        return $this->tipo_carro;
    }

    /**
     * @param mixed $tipo_carro
     */
    public function setTipoCarro($tipo_carro): void
    {
        $this->tipo_carro = $tipo_carro;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca): void
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */
    public function getDataVencimento()
    {
        return $this->data_vencimento;
    }

    /**
     * @param mixed $data_vencimento
     */
    public function setDataVencimento($data_vencimento): void
    {
        $this->data_vencimento = $data_vencimento;
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

    private $carroDAO;
    public function __construct()
    {
        $this->carroDAO=new CarroDAO();
    }

    //Método para incluir  a frota de carros

    public  function cadastrarCarro($modelo,$placa,$renavam,$ano,$cor,$combustivel,$vagas,$id_seguradora,$tipo_carro,$marca,$data_vencimento)
    {
        // Formate a data e hora no formato MySQL padrão
        $dataHoraAtual = date('Y-m-d H:i:s');
        return $this->carroDAO ->postCarro($modelo,$placa,$renavam,$ano,$cor,$combustivel,$vagas, $id_seguradora,$tipo_carro,$marca,$data_vencimento, $dataHoraAtual,$dataHoraAtual);
    }

    //Método para listar a frota de carros
    public  function listarCarros()
    {
        return $this->carroDAO->getCarro();
    }
    //Atualizar a informação do veículo
    public  function atualizaCarro($modelo,$placa,$renavam,$ano,$cor,$combustivel,$vagas,$id_seguradora,$tipo_carro,$marca,$data_vencimento,$id)
    {
        // Formate a data e hora no formato MySQL padrão
        $dataHoraAtual = date('Y-m-d H:i:s');
        return $this->carroDAO->putCarro($modelo,$placa,$renavam,$ano,$cor,$combustivel,$vagas,$id_seguradora,$tipo_carro,$marca,$data_vencimento,$dataHoraAtual,$id);
    }

    //Método para deletar veiculo
    public  function excluirCarro($id){
        return $this->carroDAO->deleteVeiculo($id);
    }

    //pesquisa paciente
    public  function pesquisaCarro($id)
    {
        return $this->carroDAO->localizarCarro($id);
    }

}
?>