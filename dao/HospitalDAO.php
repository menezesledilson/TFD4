<?php

require_once(__DIR__ . "/../config/conexao.php");

class HospitalDAO {

    protected $conexao;

    public function __construct() {
        $this->conexao = new Banco();
    }

    // Cadastrar o hospital
    public function postHospital($nome, $endereco, $numero, $bairro, $cep, $cidade, $telefone, $idEspecialidade) {
        try {
            $stmt = $this->conexao->getConexao()->prepare("INSERT INTO hospitais(`nome_hospital`,`endereco`,`numero`, `bairro`, `cep`,`cidade`,`telefone`,`id_especialidade`) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->bind_Param("ssssssss", $nome, $endereco, $numero, $bairro, $cep, $cidade, $telefone, $idEspecialidade);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao cadastrar hospital: " . $e->getMessage();
            return false;
        }
    }

    // Listar os Hospitais
    public function getHospital() {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT h.*,e.nome
                                                           FROM hospitais h
                                                           INNER JOIN especialidades e ON h.id_especialidade = e.id
                                                           ORDER BY id DESC ");

            if (!$stmt) {
                throw new Exception("Erro ao preparar a consulta: " . $this->conexao->getConexao()->error);
            }
            $stmt->execute();
            $result = $stmt->get_result();
            $hospitais = $result->fetch_all(MYSQLI_ASSOC);
            return $hospitais;
        } catch (Exception $e) {
            echo "Erro ao listar hospitais: " . $e->getMessage();
            return [];
        }
    }

    // Localizar o hospital
    public function localizarHospital($id) {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM hospitais WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_array(MYSQLI_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao localizar hospital: " . $e->getMessage();
            return null;
        }
    }

    // Atualizar o Hospital
    public function putHospital($nome, $endereco, $numero, $bairro, $cep, $cidade, $telefone, $idEspecialidade, $id) {
        try {
            $stmt = $this->conexao->getConexao()->prepare("UPDATE hospitais AS h
                                                          INNER JOIN especialidades AS e ON h.id_especialidade = e.id
                                                          SET h.nome_hospital=?, h.endereco=?, h.numero=?, h.bairro=?, h.cep=?, h.cidade=?, h.telefone=?, h.id_especialidade=? WHERE h.id=?");
            $stmt->bind_param("ssssssssi", $nome, $endereco, $numero, $bairro, $cep, $cidade, $telefone, $idEspecialidade, $id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao atualizar hospital: " . $e->getMessage();
            return false;
        }
    }

    // Deletar o Hospital
    public function deleteHospital($id) {
        try {
            $stmt = $this->conexao->getConexao()->prepare("DELETE FROM hospitais WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao deletar hospital: " . $e->getMessage();
            return false;
        }
    }
}

?>
