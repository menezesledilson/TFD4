<?php
require_once(__DIR__ . "/../dao/AcompanhanteDAO.php");

class Acompanhante extends Banco
{
    private $id;
    private $nome;
    private $rg;
    private $cpf;
    private $celular;
    private $endereco;
    private $numero;
    private $bairro;
    private $cidade;
    private $cep;
    private $embarque;
    private $referencia;
    private $id_situacao;
    private $created;
    private $modified;

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @param mixed $rg
     */
    public function setRg($rg): void
    {
        $this->rg = $rg;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular): void
    {
        $this->celular = $celular;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco): void
    {
        $this->endereco = $endereco;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero): void
    {
        $this->numero = $numero;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro): void
    {
        $this->bairro = $bairro;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade): void
    {
        $this->cidade = $cidade;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep): void
    {
        $this->cep = $cep;
    }

    /**
     * @param mixed $embarque
     */
    public function setEmbarque($embarque): void
    {
        $this->embarque = $embarque;
    }

    /**
     * @param mixed $referencia
     */
    public function setReferencia($referencia): void
    {
        $this->referencia = $referencia;
    }

    /**
     * @param mixed $id_situacao
     */
    public function setIdSituacao($id_situacao): void
    {
        $this->id_situacao = $id_situacao;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created): void
    {
        $this->created = $created;
    }

    /**
     * @param mixed $modified
     */
    public function setModified($modified): void
    {
        $this->modified = $modified;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @return mixed
     */
    public function getEmbarque()
    {
        return $this->embarque;
    }

    /**
     * @return mixed
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * @return mixed
     */
    public function getIdSituacao()
    {
        return $this->id_situacao;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->modified;
    }



    // declaração explícita da propriedade
    private $acompanhanteDAO;

    public function __construct()
    {
        $this->acompanhanteDAO = new AcompanhanteDAO();
    }

    //método para listar o paciente
    public function listarAcompanhante()
    {
        return $this->acompanhanteDAO->getAcompanhante();
    }

    public function cadastrarAcompanhante($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia, $id_situacao)
    {
        //  var_dump($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep);

        // Formate a data e hora no formato MySQL padrão
        $dataHoraAtual = date('Y-m-d H:i:s');
        return $this->acompanhanteDAO->postAcompanhante($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia, $id_situacao, $dataHoraAtual, $dataHoraAtual);
    }

    //Atualizar a informação
    public function atualizarAcompanhante($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia, $id_situacao, $id)
    {
        // Formate a data e hora no formato MySQL padrão
        $dataHoraAtual = date('Y-m-d H:i:s');
        return $this->acompanhanteDAO->putAcompanhante($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia, $id_situacao, $dataHoraAtual, $id);
    }

    //pesquisa paciente
    public function pesquisaAcompanhante($id)
    {
        return $this->acompanhanteDAO->localizarAcompanhante($id);
    }

    //método para deletar
    public function excluirAcompanhante($id)
    {
        return $this->acompanhanteDAO->deleteAcompanhante($id);
    }


}


