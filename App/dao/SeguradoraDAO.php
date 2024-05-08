<?php
require_once(__DIR__ . "/../config/conexao.php");

class SeguradoraDAO
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();
    }

    // Cadastrar os Carros
    public function postSeguradora($nome,$telefone)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("INSERT INTO seguradoras(`nome`,`telefone`) VALUES(?,?)");
            $stmt->bind_param("ss", $nome,$telefone);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao cadastrar registro: " . $e->getMessage();
            return false;
        }
    }

    // Listar os Carros
    public function getSeguradora()
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM seguradoras ORDER BY id DESC");
            $stmt->execute();
            $result = $stmt->get_result();
            $seguradoras = [];
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $seguradoras[] = $row;
            }
            return $seguradoras;
        } catch (Exception $e) {
            echo "Erro ao listar seguradora: " . $e->getMessage();
            return [];
        }
    }

    public function localizarSeguradora($id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM seguradoras WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_array(MYSQLI_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao localizar seguradora: " . $e->getMessage();
            return null;
        }
    }

    // Atualizar o carro
    public function putSeguradora($nome,$telefone, $id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("UPDATE seguradoras SET nome=?, telefone=? WHERE id=?");
            $stmt->bind_param("ssi",$nome,$telefone, $id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao atualizar seguradora: " . $e->getMessage();
            return false;
        }
    }

    // Deletar veiculo
    public function deleteSeguradora($id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("DELETE FROM `seguradoras` WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao deletar seguradora: " . $e->getMessage();
            return false;
        }
    }
}

?>
