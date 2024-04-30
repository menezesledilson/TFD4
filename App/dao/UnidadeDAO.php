<?php
require_once(__DIR__ . "/../config/conexao.php");

class UnidadeDAO
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();
    }

    // Criar unidades
    public function postUnidade($nome)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("INSERT INTO unidades(`nome_usf`) VALUES (?)");
            $stmt->bind_param("s", $nome);
            if ($stmt->execute() == true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao criar unidade: " . $e->getMessage();
            return false;
        }
    }

    // Lista de todas unidades
    public function getUnidade()
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT id, nome_usf FROM unidades ORDER BY id DESC");
            $unidades = [];
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $unidades[] = $row;
            }
            return $unidades;
        } catch (Exception $e) {
            echo "Erro ao listar unidades: " . $e->getMessage();
            return [];
        }
    }

    public function localizarUnidade($id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM unidades WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_array(MYSQLI_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao localizar unidade: " . $e->getMessage();
            return null;
        }
    }

    // Deletar as unidades
    public function deleteUnidade($id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("DELETE FROM `unidades` WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao deletar unidade: " . $e->getMessage();
            return false;
        }
    }

    // Atualizar unidade
    public function putUnidade($nome, $id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("UPDATE unidades SET nome_usf = ? WHERE id = ?");
            $stmt->bind_param("si", $nome, $id);
            if ($stmt->execute() == true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao atualizar unidade: " . $e->getMessage();
            return false;
        }
    }
}
?>
