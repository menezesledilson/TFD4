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
   public function getRg()
    {
        return $this->rg;
    }
    public function setRg($rg)
    {
        $this->rg = $rg;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getCelular()
    {
        return $this->celular;
    }
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }
    public function getEndereco()
    {
        return $this->endereco;
    }
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function getBairro()
    {
        return $this->bairro;
    }
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }
    public function getCidade()
    {
        return $this->cidade;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    public function getCep()
    {
        return $this->cep;
    }
    public function setCep($cep)
    {
        $this->cep = $cep;
    }
    public function getCreated()
    {
        return $this->created;
    }
    public function setCreated($created)
    {
        $this->created = $created;
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
   //método para cadastrar
    public function  cadastrarAcompanhante($nome, $rg, $cpf,$celular, $endereco, $numero, $bairro, $cidade, $cep){
        return $this->acompanhanteDAO->postAcompanhante($nome, $rg, $cpf,$celular, $endereco, $numero, $bairro, $cidade, $cep);
   }

    //Atualizar a informação
    public function atualizarAcompanhante($nome, $rg, $cpf,$celular, $endereco, $numero, $bairro, $cidade, $cep,$id)
    {
        return $this->acompanhanteDAO->putAcompanhante($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep,$id);
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


