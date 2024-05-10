<?php
require_once(__DIR__ . "/../config/conexao.php");

class EspecialidadeDAO
{

    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();
    }
    // Listar os Carros
    public function getEspecialidade()
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM especialidades ORDER BY id DESC");
            $especialidades = [];
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $especialidades[] = $row;
            }
            return $especialidades;
        } catch (Exception $e) {
            echo "Erro ao listar especialidade: " . $e->getMessage();
            return [];
        }
    }

    // Localizar o motorista
    public function localizarEspecialidade($id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM especialidades WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_array(MYSQLI_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao localizar especialidade: " . $e->getMessage();
            return null;
        }
    }

    // Cadastrar os motoristas
    public function postEspecialidade($nomeEspecialidade,$created,$modified)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("INSERT INTO especialidades(`nome`, `created`,`modified`) VALUES (?,?,?)");

            // Ajuste para o tipo de dados do campo 'created' e 'modified'
            $stmt->bind_param("sss", $nomeEspecialidade,$created,$modified);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao cadastrar especialidade: " . $e->getMessage();
            return false;
        }
    }

    // Atualizar o motorista
    public function putEspecialidade($nomeEspecialidade,$modified, $id)
    {
        try {

            $stmt = $this->conexao->getConexao()->prepare("UPDATE especialidades SET nome=?,modified=? WHERE id=?");
            $stmt->bind_param("ssi", $nomeEspecialidade,$modified,$id);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao atualizar especialidade: " . $e->getMessage();
            return false;
        }
    }

    // Deletar o motorista
    public function deleteEspecialidade($id){
        try {
            $stmt = $this->conexao->getConexao()->prepare("DELETE FROM `especialidades` WHERE id=?");
            $stmt->bind_param("i",$id);
            $stmt->execute();
            if($stmt->affected_rows > 0){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao deletar especialidade: " . $e->getMessage();
            return false;
        }
    }
}
?>
