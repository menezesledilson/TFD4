<?php
require_once("../../DAO/AcompanhanteDAO.php.php");
class Acompanhante extends Banco
{
    private $id;
    private $nome;
    private $rg;
    private $cpf;
    private $cns;
    private $celular;
    private $endereco;
    private $numero;
    private $bairro;
    private $cidade;
    private $cep;
    private $id_situacao;
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
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * @param mixed $rg
     */
    public function setRg($rg)
    {
        $this->rg = $rg;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getCns()
    {
        return $this->cns;
    }

    /**
     * @param mixed $cns
     */
    public function setCns($cns)
    {
        $this->cns = $cns;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    /**
     * @return mixed
     */
    public function getIdSituacao()
    {
        return $this->id_situacao;
    }

    /**
     * @param mixed $id_situacao
     */
    public function setIdSituacao($id_situacao)
    {
        $this->id_situacao = $id_situacao;
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



    // declaração explícita da propriedade
    private $AcompanhanteDAO;

    public function __construct()
    {
        $this->acompanhanteDAO = new AcompanhanteDAO();
    }

    //método para cadastrar o paciente
    public function cadastrarAcompanhante($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_situacao)
    {
        return $this->acompanhanteDAO->postAcompanhante($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_situacao, date('Y-m-d H:i:s'));
    }

    //método para listar o paciente
    public function listarAcompanhante()
    {
        return $this->acompanhanteDAO->getAcompanhante();
    }

    //Método parar listar paciente por id
    public function listarAcompanhantePorId($id)
    {
        return $this->acompanhanteDAO->getAcompanhanteId($id);
    }

    //Método para deletar paciente
    public function excluirAcompanhante($id)
    {
        return $this->acompanhanteDAO->deleteAcompanhante($id);
    }

    //Atualizar a informação do motorista
    public function atualizarAcompanhante($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_situacao,$id)
    {
        return $this->acompanhanteDAO->putAcompanhante($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_situacao,$id);
    }

    //pesquisa paciente
    public function pesquisaAcompanhante($id)
    {
        return $this->acompanhanteDAO->localizarAcompanhante($id);
    }
}


