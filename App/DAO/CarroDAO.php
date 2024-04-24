<?php
require_once("conexao.php");

class CarroDAO
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();
    }

    //Cadastrar os  Carros
    public function postCarro($modelo, $placa, $renavam, $ano, $cor, $combustivel, $vagas)
    {
        $stmt = $this->conexao->getConexao()->prepare("INSERT INTO carros(`modelo`,`placa`,`renavam`,`ano`,`cor`,`combustivel`,`vagas`) VALUES(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $modelo, $placa, $renavam, $ano, $cor, $combustivel, $vagas);
        if ($stmt->execute() == true) {
            return true;
        } else {
            return false;
        }
    }

    //Listar os Carros
    public function getCarro()
    {
        $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM carros ORDER BY id DESC");
        $carros = [];
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $carros[] = $row;
        }
        return $carros;
    }

//Localizar o carro
    public function localizarCarro($id)
    {
        $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM carros WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);

    }

    //Atualizar o carro
    public function putCarro($modelo, $placa, $renavam, $ano, $cor, $combustivel, $vagas, $id)
    {
        $stmt = $this->conexao->getConexao()->prepare("UPDATE carros SET modelo=?, placa=?, renavam=?, ano=?, cor=?, combustivel=?, vagas=? WHERE id=?");
        $stmt->bind_param("sssssssi", $modelo, $placa, $renavam, $ano, $cor, $combustivel, $vagas, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //deletar veiculo
    public function deleteVeiculo($id)
    {
        $tmt = $this->conexao->getConexao()->prepare("DELETE FROM `carros` WHERE id=?");
        $tmt->bind_param("i", $id);
        $tmt->execute();
        if ($tmt->affected_rows > 0) {
            return true;
        }else{
            return false;
        }
    }
}

?>