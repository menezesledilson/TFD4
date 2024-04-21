<?php


require_once("../Config/conexao.php");

class situacaoDAO
{
    protected $mysqli;

    public function __construct()
    {

        $banco = new Banco(); // Cria uma instância da classe Banco para estabelecer a conexão com o banco de dados
        $this->mysqli = $banco->getConexao(); // Atribui a conexão estabelecida à propriedade $mysqli da classe PacienteDAO
    }

//Listar todos
    public function getSituacao()
    {
        $result = $this->mysqli->query("SELECT * FROM situacoes");

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row;
        }
        return $array;
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