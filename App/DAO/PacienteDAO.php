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

    //listar paciente por ID
    public function getPacienteId($id)
    {
        // Consulta preparada para evitar SQL Injection
        $stmt = $this->conexao->getConexao()->prepare("SELECT p.*, s.nome_situacao, u.nome_usf
                                                   FROM pacientes p
                                                   INNER JOIN situacoes s ON p.id_situacao = s.id
                                                   INNER JOIN unidades u ON p.id_unidade_usf = u.id
                                                   WHERE p.id = ?");
        // Verifica se a preparação da consulta foi bem-sucedida
        if ($stmt) {
            // Vincula o parâmetro e executa a consulta
            $stmt->bind_param("i", $id);
            $stmt->execute();

            // Obtém o resultado da consulta
            $result = $stmt->get_result();

            // Verifica se há resultados
            if ($result && $result->num_rows > 0) {
                // Retorna o paciente encontrado
                return $result->fetch_assoc();
            } else {
                // Retorna null se o paciente não for encontrado
                return null;
            }
        } else {
            // Retorna false se houver um erro na preparação da consulta
            return false;
        }
    }
    public function putPaciente($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_situacao, $id_unidade_usf, $id)
    {
        // Prepare a consulta com INNER JOINs
        $stmt = $this->conexao->getConexao()->prepare("
        UPDATE pacientes AS p
        INNER JOIN situacoes AS s ON p.id_situacao = s.id
        INNER JOIN unidades AS u ON p.id_unidade_usf = u.id
        SET
            p.nome = ?,
            p.rg = ?,
            p.cpf = ?,
            p.cns = ?,
            p.celular = ?,
            p.endereco = ?,
            p.numero = ?,
            p.bairro = ?,
            p.cidade = ?,
            p.cep = ?,
            p.id_situacao = ?,
            p.id_unidade_usf = ?
        WHERE p.id = ?
    ");

        // Verificar se a preparação da consulta foi bem-sucedida
        if (!$stmt) {
            echo "Erro ao preparar a consulta: " . $this->conexao->getConexao()->error;
            return false;
        }

        // Vincular os parâmetros à consulta
        $stmt->bind_param("ssssssssssssi", $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_situacao, $id_unidade_usf, $id);

        // Executar a consulta
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Erro ao executar a consulta: " . $stmt->error;
            return false;
        }
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


    public function localizarPaciente($id)
    {
        $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM pacientes WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);

    }

}

?>