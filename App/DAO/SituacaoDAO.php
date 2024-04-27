<?php
require_once("conexao.php");
class situacaoDAO
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();
    }

//Listar todos
    public function getSituacao()
    {
        $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM situacoes");
        $situacao = [];
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $situacao[] = $row;
        }
        return $situacao;
    }

}

?>