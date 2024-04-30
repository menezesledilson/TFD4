<?php
require_once(__DIR__ . "/../config/conexao.php");

class SituacaoDAO
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();
    }

    // Listar todos
    public function getSituacao()
    {
        try {
            $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM situacoes");
            $situacao = [];
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $situacao[] = $row;
            }
            return $situacao;
        } catch (Exception $e) {
            echo "Erro ao listar situações: " . $e->getMessage();
            return [];
        }
    }
}
?>
