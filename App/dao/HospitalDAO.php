<?php
require_once(__DIR__ . "/../config/conexao.php");

class HospitalDAO
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();
    }

    // Cadastrar o hospital
    public function postHospital($nome, $endereco, $numero, $bairro, $cep, $cidade,$telefone,$id_especialidade )
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("INSERT INTO hospitais(`nome`,`endereco`,`numero`, `bairro`, `cep`,`cidade`,`telefone`,`id_especialidade`) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->bind_Param("ssssssss", $nome, $endereco, $numero, $bairro, $cep, $cidade, $telefone,$id_especialidade);
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
    public function getHospital()
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM hospitais ORDER BY id DESC ");
            $stmt->execute();
            $result = $stmt->get_result();
            $hospitais = [];
            while ($row = $result->fetch_assoc()) {
                $hospital [] = $row;
            }
            return $hospital;
        } catch (Exception $e) {
            echo "Erro ao listar hospitais: " . $e->getMessage();
            return [];
        }
    }

    // Localizar o hospital
    public function localizarHospital($id)
    {
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
    public function putHospital($nome, $endereco, $numero, $bairro, $cep, $cidade, $telefone,$id_especialidade ,$id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("UPDATE hospitais SET nome_hospital=?, endereco=?, numero=?, bairro=?, cep=?, cidade=?, telefone=?,id_especialidade=? WHERE id=?");
            $stmt->bind_param("ssssssssi", $nome, $endereco, $numero, $bairro, $cep, $cidade, $telefone,$id_especialidade, $id);
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
    public function deleteHospital($id)
    {
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
