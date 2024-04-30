<?php
require_once(__DIR__ . "/../config/conexao.php");

class DiariaDAO
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();
    }

    //Cadastrar os Diaria
    public function postDiaria($nome)
    {
        $stmt = $this->conexao->getConexao()->prepare("INSERT INTO diarias(`diaria`) VALUES(?)");
        $stmt->bind_param("s", $nome);
        if ($stmt->execute() == true) {
            return true;
        } else {
            return false;
        }
    }
    //Listar as Diarias
    public function getDiaria()
    {
        $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM diarias ORDER BY id DESC");
        $dia = [];
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $dia[] = $row;
        }
        return $dia;
    }
   //Localizar a diaria
    public function localizarDiaria($id)
    {
        $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM diarias WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);

    }

    //Atualizar a diaria
    public function putDiaria($nome, $id)
    {
        $stmt = $this->conexao->getConexao()->prepare("UPDATE diarias SET diaria=? WHERE id=?");
        $stmt->bind_param("si", $nome, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //deletar veiculo
    public function deleteDiaria($id)
    {
        $tmt = $this->conexao->getConexao()->prepare("DELETE FROM `diarias` WHERE id=?");
        $tmt->bind_param("i", $id);
        $tmt->execute();
        if ($tmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
?>