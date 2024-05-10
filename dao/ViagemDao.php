<?php

require_once(__DIR__ . "/../config/conexao.php");

class ViagemDAO {

    protected $conexao;

    public function __construct() {
        $this->conexao = new Banco();
    }

// Lista de todas unidades
    public function getViagem() {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT v.*, c.modelo, m.nome_motorista,p.nome_paciente,a.nome_acompanhante
                                                           FROM viagens v 
                                                           INNER JOIN carros c ON v.id_carro = c.id
                                                           INNER JOIN motoristas m ON v.id_motorista = m.id
                                                           INNER JOIN pacientes p ON v.id_paciente = p.id
                                                           INNER JOIN acompanhantes a ON v.id_acompanhante =a.id
                                                           ORDER BY v.id DESC");
            if (!$stmt) {
                throw new Exception("Erro ao preparar a consulta: " . $this->conexao->getConexao()->error);
            }
            $stmt->execute();
            $result = $stmt->get_result();
            $pacientes = $result->fetch_all(MYSQLI_ASSOC);
            return $pacientes;
        } catch (Exception $e) {
            echo "Erro ao listar viagem: " . $e->getMessage();
            return [];
        }
    }

    public function postViagem($localViagem, $destino, $horaSaida, $dataViagem, $idCarro, $idMotorista, $idPaciente, $idAcompanhante, $created) {
        try {
            $stmt = $this->conexao->getConexao()->prepare("INSERT INTO viagens(localViagem,destino,horaSaida,dataViagem,idCarro,idMotorista,idPaciente,idAcompanhante,created)VALUES(?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssssss",$localViagem, $destino, $horaSaida, $dataViagem, $idCarro, $idMotorista, $idPaciente, $idAcompanhante, $created);
                    
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
}

?>
