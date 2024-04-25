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

    public function getPacientePorId($idSituacao) {
        $query = "SELECT * FROM situacoes WHERE id =$idSituacao";

        $result = $this->mysqli->query($query);

        if ($result) {
            $situacao = $result->fetch_array(MYSQLI_ASSOC);
            if ($situacao) {
                return $situacao;
            } else {
                return "Paciente não encontrado";
            }
        } else {
            return "Erro ao buscar paciente";
        }
    }

    public function putSituacao($id,$nome_situacao, $created, $modified)
    {
        $stmt = $this->mysqli->prepare("UPDATE `situacoes` SET `nome_situacao` = ?, `created` = ?, `modified`= ? WHERE `id` = ?");
        // Corrigindo a ordem dos parâmetros na declaração da query
        $stmt->bind_param("ssss", $nome_situacao, $created, $modified, $id);
        // Adicionando $nome ao final dos parâmetros passados para o bind_param
        $result = $stmt->execute();
        if ($result) {
            return true; // Retorna true indicando sucesso
        } else {
            echo "Erro ao executar a consulta: (" . $stmt->errno . ") " . $stmt->error;
            return false; // Retorna false indicando que houve um erro
        }
    }


}

?>