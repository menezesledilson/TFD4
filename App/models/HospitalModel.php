<?php
require_once (__DIR__ ."/../dao/HospitalDAO.php");
class Hospital extends Banco
{
    private $id;
    private $nome;
    private $endereco;
    private $numero;
    private $bairro;
    private $cep;
    private $cidade;
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

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    //Contrutor da classe Hospital
    private $hospitalDAO;

    public function __construct()
    {
        $this->hospitalDAO = new HospitalDAO();
    }

    //método para cadastrar o Hospital

    public function cadastrarHospital($nome, $endereco, $numero, $bairro, $cep, $cidade, $telefone)
    {
        return $this->hospitalDAO->postHospital($nome, $endereco, $numero, $bairro, $cep, $cidade, $telefone, date('Y-m-d H:i:s'));
    }

    //Método para listar o Hospital
    public function listarHospitais()
    {
        return $this->hospitalDAO->getHospital();
    }

    //Método para Atualizar a informação do Hospital
    public function atualizarHospital($nome, $endereco, $numero, $bairro, $cep, $cidade,$telefone,$id)
    {
        return $this->hospitalDAO->putHospital($nome, $endereco, $numero, $bairro, $cep, $cidade, $telefone, $id);
    }

    //Método para Pesquisar Hospital
    public function pesquisarHospital($id)
    {
        return $this->hospitalDAO->localizarHospital($id);
    }

    //Método para deletar veículo
    public function excluirHospital($id)
    {
        return $this->hospitalDAO->deleteHospital($id);
    }
}

?>