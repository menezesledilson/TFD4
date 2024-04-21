<?php
require_once("../Config/conexao.php");

class Paciente extends Banco {

    private $id_paciente;
    private $foto;
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
    private $modified;

    /**
     * @return mixed
     */
    public function getIdPaciente()
    {
        return $this->id_paciente;
    }

    /**
     * @param mixed $id_paciente
     */
    public function setIdPaciente($id_paciente)
    {
        $this->id_paciente = $id_paciente;
    }

    // Métodos Set
    public function setFoto($blob){
        $this->foto = $blob;
    }
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
    public function getFoto(){
        return $this->foto;
    }
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
    public function getModified(){
        return $this->modified;
    }
    public function incluir(){
        return $this->setPaciente($this->getFoto(), $this->getNome(), $this->getRG(), $this->getCPF(), $this->getCNS(), $this->getCelular(), $this->getEndereco(), $this->getNumero(), $this->getBairro(), $this->getCidade(), $this->getCEP(),  $this->getIdUnidadeUSF(),$this->getIdSituacao(), $this->getCreated(), $this->getModified());
    }
}
?>
