<?php
require_once(__DIR__ . "/../config/conexao.php");

class MotoristaDAO
{

    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();
    }
    // Listar os Carros
    public function getMotorista()
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT id,nome,telefone, created FROM motoristas ORDER BY id DESC LIMIT 5 ");
            $motoristas = [];
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $motoristas[] = $row;
            }
            return $motoristas;
        } catch (Exception $e) {
            echo "Erro ao listar motoristas: " . $e->getMessage();
            return [];
        }
    }

    // Localizar o motorista
    public function localizarMotorista($id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM motoristas WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_array(MYSQLI_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao localizar motorista: " . $e->getMessage();
            return null;
        }
    }

    // Cadastrar os motoristas
    public function postMotorista($motorista, $telefone, $created,$modified)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("INSERT INTO motoristas(`nome`, `telefone`, `created`,`modified`) VALUES (?,?, ?,?)");

            // Ajuste para o tipo de dados do campo 'created' e 'modified'
            $stmt->bind_param("ssss", $motorista, $telefone, $created,$modified);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao cadastrar motorista: " . $e->getMessage();
            return false;
        }
    }

    // Atualizar o motorista
    public function putMotorista($nome, $telefone,$modified, $id)
    {
        try {

            $stmt = $this->conexao->getConexao()->prepare("UPDATE motoristas SET nome=?, telefone =?, modified=? WHERE id=?");
            $stmt->bind_param("sssi", $nome, $telefone,$modified,$id);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao atualizar motorista: " . $e->getMessage();
            return false;
        }
    }

    // Deletar o motorista
    public function deleteMotorista($id){
        try {
            $stmt = $this->conexao->getConexao()->prepare("DELETE FROM `motoristas` WHERE id=?");
            $stmt->bind_param("i",$id);
            $stmt->execute();
            if($stmt->affected_rows > 0){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao deletar motorista: " . $e->getMessage();
            return false;
        }
    }
}
?>
