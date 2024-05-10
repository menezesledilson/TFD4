<?php

require_once (__DIR__ ."/../dao/ViagemDAO.php");

class Viagem extends Banco {

    private $id;
    private $localViagem;
    private $destino;
    private $horaSaida;
    private $dataViagem;
    private $idCarro;
    private $idMotorista;
    private $idPaciente;
    private $idAcompanhante;
    private $created;

    public function getId() {
        return $this->id;
    }

    public function getLocalViagem() {
        return $this->localViagem;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function getHoraSaida() {
        return $this->horaSaida;
    }

    public function getDataViagem() {
        return $this->dataViagem;
    }

    public function getIdCarro() {
        return $this->idCarro;
    }

    public function getIdMotorista() {
        return $this->idMotorista;
    }

    public function getIdPaciente() {
        return $this->idPaciente;
    }

    public function getIdAcompanhante() {
        return $this->idAcompanhante;
    }

    public function getCreated() {
        return $this->created;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setLocalViagem($localViagem): void {
        $this->localViagem = $localViagem;
    }

    public function setDestino($destino): void {
        $this->destino = $destino;
    }

    public function setHoraSaida($horaSaida): void {
        $this->horaSaida = $horaSaida;
    }

    public function setDataViagem($dataViagem): void {
        $this->dataViagem = $dataViagem;
    }

    public function setIdCarro($idCarro): void {
        $this->idCarro = $idCarro;
    }

    public function setIdMotorista($idMotorista): void {
        $this->idMotorista = $idMotorista;
    }

    public function setIdPaciente($idPaciente): void {
        $this->idPaciente = $idPaciente;
    }

    public function setIdAcompanhante($idAcompanhante): void {
        $this->idAcompanhante = $idAcompanhante;
    }

    public function setCreated($created): void {
        $this->created = $created;
    }
    
    
     private $viagemDAO;

    public function __construct()
    {
        $this->viagemDAO= new ViagemDAO();
    }
     
    public function listarViagens(){
        return $this->viagemDAO->getViagem();
    }


    public function cadastroViagem($localViagem, $destino, $horaSaida, $dataViagem, $idCarro, $idMotorista, $idPaciente, $idAcompanhante, $created) {

        // Formate a data e hora no formato MySQL padrão
        $dataHoraAtual = date('Y-m-d H:i:s');
        return $this->carroDAO->postCarro($localViagem, $destino, $horaSaida, $dataViagem, $idCarro, $idMotorista, $idPaciente, $idAcompanhante, $dataHoraAtual);
    }
    
    
}

?>