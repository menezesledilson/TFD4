<?php
require_once("../../DAO/PacienteDAO.php");

class Paciente extends Banco {

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
    private $id_unidade_usf;
    private $created;
     public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Métodos Set

    public function setNome($string){
        $this->nome = $string;
    }
    public function setRG($string){
        $this->rg = $string;
    }
    public function setCPF($string){
        $this->cpf = $string;
    }
    public function setCNS($string){
        $this->cns = $string;
    }
    public function setCelular($string){
        $this->celular = $string;
    }
    public function setEndereco($string){
        $this->endereco = $string;
    }
    public function setNumero($string){
        $this->numero = $string;
    }
    public function setBairro($string){
        $this->bairro = $string;
    }
    public function setCidade($string){
        $this->cidade = $string;
    }
    public function setCEP($string){
        $this->cep = $string;
    }
    public function setIdSituacao($int){
        $this->id_situacao = $int;
    }
    public function setIdUnidadeUSF($int){
        $this->id_unidade_usf = $int;
    }
    public function setCreated($datetime){
        $this->created = $datetime;
    }
    public function setModified($datetime){
        $this->modified = $datetime;
    }

    // Métodos Get

    public function getNome(){
        return $this->nome;
    }
    public function getRG(){
        return $this->rg;
    }
    public function getCPF(){
        return $this->cpf;
    }
    public function getCNS(){
        return $this->cns;
    }
    public function getCelular(){
        return $this->celular;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function getBairro(){
        return $this->bairro;
    }
    public function getCidade(){
        return $this->cidade;
    }
    public function getCEP(){
        return $this->cep;
    }
    public function getIdSituacao(){
        return $this->id_situacao;
    }
    public function getIdUnidadeUSF(){
        return $this->id_unidade_usf;
    }
    public function getCreated(){
        return $this->created;
    }

    // declaração explícita da propriedade
    private $pacienteDAO;
    public function __construct()
    {
        $this->pacienteDAO = new PacienteDAO();
    }

    //método para cadastrar o paciente
    public  function cadastrarPaciente($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep,$id_situacao,$id_unidade_usf)
    {
    return $this->pacienteDAO->postPaciente($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep,$id_situacao,$id_unidade_usf,date('Y-m-d H:i:s'));
    }
    //método para listar o paciente
    public function listarPacientes()
    {
        return $this->pacienteDAO->getPaciente();
    }
}
?>
