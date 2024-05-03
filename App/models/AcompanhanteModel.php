<?php
require_once (__DIR__ ."/../dao/AcompanhanteDAO.php");
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

    private $created;
    private $modified;
    public function getId()
    {
        return $this->id;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): void
    {
        $this->nome = $nome;
    }
    public function getRg()
    {
        return $this->rg;
    }
    public function setRg($rg): void
    {
        $this->rg = $rg;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }
    public function getCelular()
    {
        return $this->celular;
    }
    public function setCelular($celular): void
    {
        $this->celular = $celular;
    }
    public function getEndereco()
    {
        return $this->endereco;
    }
    public function setEndereco($endereco): void
    {
        $this->endereco = $endereco;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function setNumero($numero): void
    {
        $this->numero = $numero;
    }
    public function getBairro()
    {
        return $this->bairro;
    }
    public function setBairro($bairro): void
    {
        $this->bairro = $bairro;
    }
    public function getCidade()
    {
        return $this->cidade;
    }
    public function setCidade($cidade): void
    {
        $this->cidade = $cidade;
    }
    public function getCep()
    {
        return $this->cep;
    }
    public function setCep($cep): void
    {
        $this->cep = $cep;
    }
       public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created): void
    {
        $this->created = $created;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function setModified($modified): void
    {
        $this->modified = $modified;
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
    public function cadastrarAcompanhante($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep ) {
      //  var_dump($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep);

        // Formate a data e hora no formato MySQL padrão
        $dataHoraAtual = date('Y-m-d H:i:s');
        return $this->acompanhanteDAO->postAcompanhante($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep,$dataHoraAtual);
    }

    //Atualizar a informação
    public function atualizarAcompanhante($nome, $rg, $cpf,$celular, $endereco, $numero, $bairro, $cidade, $cep,$id)
    {
        // Formate a data e hora no formato MySQL padrão
        $dataHoraAtual = date('Y-m-d H:i:s');
        return $this->acompanhanteDAO->putAcompanhante($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep, $dataHoraAtual,$id);
    }

    //pesquisa paciente
    public function pesquisaAcompanhante($id){
        return $this->acompanhanteDAO->localizarAcompanhante($id);
    }

   //método para deletar
    public  function excluirAcompanhante($id)
    {
        return $this->acompanhanteDAO->deleteAcompanhante($id);
    }


}


