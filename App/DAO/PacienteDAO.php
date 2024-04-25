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
    public function postPaciente($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_situacao, $id_unidade_usf)
    {
        $stmt = $this->conexao->getConexao()->prepare("INSERT INTO pacientes ( `nome`,`rg`,`cpf`,`cns`,`celular`,`endereco`,`numero`,`bairro`, `cidade`,`cep`,`id_situacao`,`id_unidade_usf`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssssss", $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_situacao, $id_unidade_usf);
        if ($stmt->execute() == true) {
            return true;
        } else {
            return false;
        }

    }

    //Listar os pacientes
    public function getPaciente()
    {
        $stmt = $this->conexao->getConexao()->prepare("SELECT p.*, s.nome_situacao, u.nome_usf
                      FROM pacientes p
                      INNER JOIN situacoes s ON p.id_situacao = s.id
                      INNER JOIN unidades u ON p.id_unidade_usf = u.id order by p.id desc");
        $pacientes = [];
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $pacientes[] = $row;
        }
        return $pacientes;
    }

    //Deletar o motorista
    public function deletePaciente($id){
        $stmt = $this->conexao->getConexao()->prepare("DELETE FROM `pacientes` WHERE id=?");
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