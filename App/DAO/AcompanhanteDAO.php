<?php

require_once("conexao.php");

class AcompanhanteDAO
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();

    }

    //Cadastrar
    public function postAcompanhante($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_situacao)
    {
        $stmt = $this->conexao->getConexao()->prepare("INSERT INTO acompanhantes ( `nome`,`rg`,`cpf`,`cns`,`celular`,`endereco`,`numero`,`bairro`, `cidade`,`cep`,`id_situacao`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssssss", $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_situacao);
        if ($stmt->execute() == true) {
            return true;
        } else {
            return false;
        }

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

    //Atualizar o carro
    public function putAcompanhante($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_situacao,$id)
    {
        $stmt = $this->conexao->getConexao()->prepare("UPDATE acompanhantes SET nome=?, rg=?, cpf=?, cns=?, celular=?, endereco=?, numero=?, bairro=?, cidade=?, cep=?, id_situacao=? WHERE id=?");
        $stmt->bind_param("sssssssssssi", $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_situacao,$id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
  //Localizar
    public function localizarAcompanhante($id)
    {
        $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM acompanhantes WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);

    }

    //Deletar
    public function deleteAcompanhante($id){
        $stmt = $this->conexao->getConexao()->prepare("DELETE FROM `acompanhantes` WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        if($stmt->affected_rows > 0){
            return true;
        }else{
            return false;
        }
    }


}

?>