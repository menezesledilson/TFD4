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

    public function postAcompanhante($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep)
    {
        $stmt = $this->conexao->getConexao()->prepare("INSERT INTO pacientes (`nome`, `rg`, `cpf`, `celular`, `endereco`, `numero`, `bairro`, `cidade`, `cep`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sssssssss", $nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep);
        if ($stmt->execute() == true) {
            return true;
        } else {
            return false;
        }
    }

}

?>