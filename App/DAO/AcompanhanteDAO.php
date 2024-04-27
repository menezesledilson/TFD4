<?php

require_once("conexao.php");

class AcompanhanteDAO
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();

    }
    //Listar
    public function getAcompanhante()
    {
        $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM acompanhantes ORDER BY id DESC");
        $acompanhantes = [];
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $acompanhantes[] = $row;
        }
        return $acompanhantes;
    }
    //cadastrar
    public function postAcompanhante($nome, $rg, $cpf, $telefone, $endereco, $numero, $bairro, $cidade, $cep)
    {
        $stmt = $this->conexao->getConexao()->prepare("INSERT INTO acompanhantes (`nome`, `rg`, `cpf`, `telefone`, `endereco`, `numero`, `bairro`, `cidade`, `cep`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sssssssss", $nome, $rg, $cpf, $telefone, $endereco, $numero, $bairro, $cidade, $cep);
        if ($stmt->execute() == true) {
            return true;
        } else {
            return false;
        }
    }

    //Buscar
    public function localizarAcompanhante($id)
    {
        $stmt =$this->conexao->getConexao()->prepare("SELECT * FROM acompanhantes WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);

    }
    public function putAcompanhante($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id)
    {
        $stmt = $this->conexao->getConexao()->prepare("UPDATE acompanhantes SET nome=?, rg=?, cpf=?, telefone=?, endereco=?,numero=?, bairro=?, cidade =?, cep=?  WHERE id=?");
        $stmt->bind_param("sssssssssi", $nome, $rg,$cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id);
        if ($stmt->execute() == true) {
            return true;
        } else {
            return false;
        }

    }

    //Deletar
    public function deleteAcompanhante($id)
    {
        $stmt = $this->conexao->getConexao()->prepare("DELETE FROM `acompanhantes` WHERE  id=?");
        $stmt->bind_param("i", $id);
         $stmt->execute();
         if ($stmt->affected_rows > 0) {
             return true;
         } else {
             return false;
         }

    }
}

?>