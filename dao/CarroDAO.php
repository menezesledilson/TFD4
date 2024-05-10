<?php
require_once(__DIR__ . "/../config/conexao.php");

class CarroDAO
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();
    }

    // Cadastrar os Carros
    public function postCarro($modelo, $placa, $renavam, $ano, $cor, $combustivel, $vagas, $tipo_carro, $marca, $data_vencimento, $id_seguradora)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("INSERT INTO carros(`modelo`,`placa`,`renavam`,`ano`,`cor`,`combustivel`,`vagas`,`tipo_carro`,`marca`,`data_vencimento`,`id_seguradora`) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssssssss", $modelo, $placa, $renavam, $ano, $cor, $combustivel, $vagas, $tipo_carro, $marca, $data_vencimento, $id_seguradora);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao cadastrar carro: " . $e->getMessage();
            return false;
        }
    }

    // Listar os Carros
    public function getCarro()
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT c.*, s.nome
                                                           FROM carros  c
                                                           INNER JOIN seguradoras s ON c.id_seguradora = s.id
                                                           ORDER BY c.id DESC");
            $stmt->execute();
            $result = $stmt->get_result();
            $carros = [];
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $carros[] = $row;
            }
            return $carros;
        } catch (Exception $e) {
            echo "Erro ao listar carros: " . $e->getMessage();
            return [];
        }
    }

    // Localizar o carro
    public function localizarCarro($id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM carros WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_array(MYSQLI_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao localizar carro: " . $e->getMessage();
            return null;
        }
    }

    // Atualizar o carro
    public function putCarro($modelo, $placa, $renavam, $ano, $cor, $combustivel, $vagas, $tipo_carro, $marca, $data_vencimento, $id_seguradora, $modified, $id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("UPDATE carros AS c
                                                           INNER JOIN seguradoras AS s ON c.id_seguradora = s.id 
                                                           SET c.modelo=?, c.placa=?, c.renavam=?, c.ano=?, c.cor=?, c.combustivel=?, c.vagas=?, c.tipo_carro=?, c.marca=?, c.data_vencimento=?, c.id_seguradora=?, c.modified=? WHERE c.id=?");
            $stmt->bind_param("ssssssssssssi", $modelo, $placa, $renavam, $ano, $cor, $combustivel, $vagas, $tipo_carro, $marca, $data_vencimento, $id_seguradora, $modified, $id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao atualizar carro: " . $e->getMessage();
            return false;
        }
    }

    // Deletar veiculo
    public function deleteVeiculo($id)
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("DELETE FROM `carros` WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro ao deletar veículo: " . $e->getMessage();
            return false;
        }
    }
}

?>
