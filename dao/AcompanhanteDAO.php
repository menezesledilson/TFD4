<?php
require_once(__DIR__ . "/../config/conexao.php");

class AcompanhanteDAO
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();
    }

    // Listar acompanhantes
    public function getAcompanhante()
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT a.*, s.nome_situacao 
                                                           FROM acompanhantes a
                                                           INNER JOIN situacoes s ON a.id_situacao = s.id
                                                           ORDER BY a.id DESC");
            if (!$stmt) {
                throw new Exception("Erro ao preparar a consulta: " . $this->conexao->getConexao()->error);
            }
            $stmt->execute();
            $result = $stmt->get_result();
            $acompanhantes = $result->fetch_all(MYSQLI_ASSOC);
            return $acompanhantes;
        } catch (Exception $e) {
            echo "Erro ao listar pacientes: " . $e->getMessage();
            return [];
        }
    }

    // Cadastrar acompanhante
    public function postAcompanhante($nome, $rg, $cpf, $telefone, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia, $id_situacao, $created, $modified)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("INSERT INTO acompanhantes (`nome_acompanhante`, `rg`, `cpf`, `celular`, `endereco`, `numero`, `bairro`, `cidade`, `cep`,`embarque`,`referencia`, `id_situacao`,`created`,`modified`) VALUES (?,?,?,?,?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
            $stmt->bind_param("ssssssssssssss", $nome, $rg, $cpf, $telefone, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia, $id_situacao, $created, $modified);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao cadastrar acompanhante: " . $e->getMessage();
            return false;
        }
    }

    // Buscar acompanhante por ID
    public function localizarAcompanhante($id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT a.*, s.nome_situacao
                                                           FROM acompanhantes a
                                                           INNER JOIN situacoes s ON a.id_situacao = s.id
                                                           WHERE a.id = ?");
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

    // Atualizar acompanhante
    public function putAcompanhante($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia, $id_situacao, $modified, $id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("UPDATE acompanhantes AS a 
                                                       INNER JOIN situacoes AS s ON a.id_situacao = s.id 
                                                       SET a.nome_acompanhante=?, a.rg=?, a.cpf=?, a.celular=?, a.endereco=?, a.numero=?, a.bairro=?, a.cidade=?, a.cep=?,a.embarque=?,a.referencia=?, a.id_situacao=?, a.modified=? 
                                                       WHERE a.id=?");
            if (!$stmt) {
                throw new Exception("Erro ao preparar a consulta: " . $this->conexao->getConexao()->error);
            }
            $stmt->bind_param("sssssssssssssi", $nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia, $id_situacao, $modified, $id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao atualizar acompanhante: " . $e->getMessage();
            return false;
        }
    }


    // Deletar acompanhante
    public function deleteAcompanhante($id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("DELETE FROM `acompanhantes` WHERE  id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao deletar acompanhante: " . $e->getMessage();
            return false;
        }
    }
}

?>