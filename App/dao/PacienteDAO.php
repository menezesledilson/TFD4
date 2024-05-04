<?php
require_once(__DIR__ . "/../config/conexao.php");

class pacienteDAO
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();
    }

    // Cadastrar Paciente
    public function postPaciente($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia,$id_situacao, $id_unidade_usf,$created,$modified)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("INSERT INTO pacientes (`nome`, `rg`, `cpf`, `cns`, `celular`, `endereco`, `numero`, `bairro`, `cidade`, `cep`,`embarque`,`referencia`, `id_situacao`, `id_unidade_usf`,`created`,`modified`) VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");
            if (!$stmt) {
                throw new Exception("Erro ao preparar a consulta: " . $this->conexao->getConexao()->error);
            }
            $stmt->bind_param("ssssssssssssssss", $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia,$id_situacao, $id_unidade_usf, $created, $modified);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao cadastrar paciente: " . $e->getMessage();
            return false;
        }
    }

    // Listar os pacientes
    public function getPaciente()
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT p.*, s.nome_situacao, u.nome_usf FROM pacientes p INNER JOIN situacoes s ON p.id_situacao = s.id INNER JOIN unidades u ON p.id_unidade_usf = u.id ORDER BY p.id DESC");
            if (!$stmt) {
                throw new Exception("Erro ao preparar a consulta: " . $this->conexao->getConexao()->error);
            }
            $stmt->execute();
            $result = $stmt->get_result();
            $pacientes = $result->fetch_all(MYSQLI_ASSOC);
            return $pacientes;
        } catch (Exception $e) {
            echo "Erro ao listar pacientes: " . $e->getMessage();
            return [];
        }
    }

    // Listar paciente por ID
    public function getPacienteId($id)
    {
        try {
            // Consulta preparada para evitar SQL Injection
            $stmt = $this->conexao->getConexao()->prepare("SELECT p.*, s.nome_situacao, u.nome_usf FROM pacientes p INNER JOIN situacoes s ON p.id_situacao = s.id INNER JOIN unidades u ON p.id_unidade_usf = u.id WHERE p.id = ?");
            if (!$stmt) {
                throw new Exception("Erro ao preparar a consulta: " . $this->conexao->getConexao()->error);
            }
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result && $result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "Erro ao buscar paciente por ID: " . $e->getMessage();
            return null;
        }
    }

    // Atualizar paciente
    public function putPaciente($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia,$id_situacao, $id_unidade_usf,$modified, $id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("UPDATE pacientes AS p INNER JOIN situacoes AS s ON p.id_situacao = s.id INNER JOIN unidades AS u ON p.id_unidade_usf = u.id SET p.nome = ?, p.rg = ?, p.cpf = ?, p.cns = ?, p.celular = ?, p.endereco = ?, p.numero = ?, p.bairro = ?, p.cidade = ?, p.cep = ?,p.embarque=?,p.referencia=?, p.id_situacao = ?, p.id_unidade_usf = ?,p.modified=? WHERE p.id = ?");
            if (!$stmt) {
                throw new Exception("Erro ao preparar a consulta: " . $this->conexao->getConexao()->error);
            }
            $stmt->bind_param("sssssssssssssssi", $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia,$id_situacao, $id_unidade_usf,$modified, $id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao atualizar paciente: " . $e->getMessage();
            return false;
        }
    }

    // Deletar o paciente
    public function deletePaciente($id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("DELETE FROM pacientes WHERE id = ?");
            if (!$stmt) {
                throw new Exception("Erro ao preparar a consulta: " . $this->conexao->getConexao()->error);
            }
            $stmt->bind_param("i", $id);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao deletar paciente: " . $e->getMessage();
            return false;
        }
    }

    // Localizar paciente por ID
    public function localizarPaciente($id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM pacientes WHERE id = ?");
            if (!$stmt) {
                throw new Exception("Erro ao preparar a consulta: " . $this->conexao->getConexao()->error);
            }
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_array(MYSQLI_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao localizar paciente: " . $e->getMessage();
            return null;
        }
    }
}

?>