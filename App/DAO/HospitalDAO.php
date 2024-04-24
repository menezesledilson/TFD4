<?php
require_once("conexao.php");

class HospitalDAO
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();
    }

    //Cadastrar o hospital
    public function postHospital($nome, $endereco, $numero, $bairro, $cep, $telefone, $cidade)
    {
        $stmt = $this->conexao->getConexao()->prepare("INSERT INTO hospitais(`nome`,`endereco`,`numero`, `bairro`, `cep`,`cidade`,`telefone`) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_Param("sssssss", $nome, $endereco, $numero, $bairro, $cep, $cidade, $telefone);
        if ($stmt->execute() == true) {
            return true;
        } else {
            return false;
        }
    }

    //Listar os Hospitais
    public function getHospital()
    {
        $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM hospitais ORDER BY id DESC ");
        $hospitais = [];
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $hospital [] = $row;
        }
        return $hospital;
    }

    //Localizar o hispital
    public function localizarHospital($id)
    {
        $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM hospitais WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    //Atualizar o Hospital
    public function putHospital($nome, $endereco, $numero, $bairro, $cep, $cidade, $telefone, $id)
    {
        $stmt = $this->conexao->getConexao()->prepare("UPDATE hospitais SET nome=?, endereco=?, numero=?, bairro=?, cep=?, cidade=?, telefone=? WHERE id=?");
        $stmt->bind_param("sssssssi", $nome, $endereco, $numero, $bairro, $cep, $cidade, $telefone, $id);
        if ($stmt->execute() == true) {
            return true;
        } else {
            return false;
        }
    }
    //Deleta o Hospital
    public function deleteHospital($id){
        $stmt= $this->conexao->getConexao()->prepare("DELETE FROM hospitais WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        }else{
            return false;
        }
    }
}
?>