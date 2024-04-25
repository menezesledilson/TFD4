<?php

require_once("conexao.php");

class pacienteDAO
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();

    }

    //Cadastrar Paciente
    public function postPaciente($foto, $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_situacao, $id_unidade_usf)
    {
        $stmt = $this->conexao->getConexao()->prepare("INSERT INTO pacientes (`foto`, `nome`,`rg`,`cpf`,`cns`,`celular`,`endereco`,`numero`,`bairro`, `cidade`,`cep`,`id_situacao`,`id_unidade_usf`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssssssss", $foto, $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_situacao, $id_unidade_usf);
        if ($stmt->execute() == true) {
            return true;
        } else {
            return false;
        }

    }
}

?>