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
            $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM acompanhantes ORDER BY id DESC");
            $stmt->execute();
            $result = $stmt->get_result();
            $acompanhantes = [];
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $acompanhantes[] = $row;
            }
            return $acompanhantes;
        } catch (Exception $e) {
            echo "Erro ao listar acompanhantes: " . $e->getMessage();
            return [];
        }
    }

    // Cadastrar acompanhante
    public function postAcompanhante($nome, $rg, $cpf, $telefone, $endereco, $numero, $bairro, $cidade, $cep,$created,$modified)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("INSERT INTO acompanhantes (`nome`, `rg`, `cpf`, `celular`, `endereco`, `numero`, `bairro`, `cidade`, `cep`,`created`,`modified`) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
            $stmt->bind_param("sssssssssss", $nome, $rg, $cpf, $telefone, $endereco, $numero, $bairro, $cidade, $cep,$created,$modified);
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
            $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM acompanhantes WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_array(MYSQLI_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao localizar acompanhante: " . $e->getMessage();
            return null;
        }
    }

    // Atualizar acompanhante
    public function putAcompanhante($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep,$modified, $id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("UPDATE acompanhantes SET nome=?, rg=?, cpf=?, celular=?, endereco=?,numero=?, bairro=?, cidade =?, cep=?, modified=?  WHERE id=?");
            $stmt->bind_param("ssssssssssi", $nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep,$modified, $id);
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