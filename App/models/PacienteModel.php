<?php
require_once (__DIR__ ."/../dao/PacienteDAO.php");
class Paciente extends Banco
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

    private $embarque;
    private $referencia;
    private $id_situacao;
    private $id_unidade_usf;
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
     * @param mixed $cns
     */
    public function setCns($cns): void
    {
        $this->cns = $cns;
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
     * @param mixed $id_unidade_usf
     */
    public function setIdUnidadeUsf($id_unidade_usf): void
    {
        $this->id_unidade_usf = $id_unidade_usf;
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
    public function getCns()
    {
        return $this->cns;
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
    public function getIdUnidadeUsf()
    {
        return $this->id_unidade_usf;
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
    private $pacienteDAO;

    public function __construct()
    {
        $this->pacienteDAO = new PacienteDAO();
    }

    //método para cadastrar o paciente
    public function cadastrarPaciente($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia, $id_situacao, $id_unidade_usf)
    {
        // Formate a data e hora no formato MySQL padrão
        $dataHoraAtual = date('Y-m-d H:i:s');
        return $this->pacienteDAO->postPaciente($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia, $id_situacao, $id_unidade_usf,$dataHoraAtual,$dataHoraAtual);
    }

    //método para listar o paciente
    public function listarPacientes()
    {
        return $this->pacienteDAO->getPaciente();
    }

    //Método parar listar paciente por id
    public function listarPacientePorId($id)
    {
        return $this->pacienteDAO->getPacienteId($id);
    }
    //Método para deletar paciente
    public function excluirPaciente($id)
    {
        return $this->pacienteDAO->deletePaciente($id);
    }
    //Atualizar a informação do motorista
    public function atualizarPaciente($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia, $id_situacao,$id_unidade_usf, $id)
    {
        // Formate a data e hora no formato MySQL padrão
        $dataHoraAtual = date('Y-m-d H:i:s');
        return $this->pacienteDAO->putPaciente($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia, $id_situacao,$id_unidade_usf,$dataHoraAtual,$id);
    }

    //pesquisa paciente
    public function pesquisaPaciente($id){
        return $this->pacienteDAO->localizarPaciente($id);
    }
}

?>