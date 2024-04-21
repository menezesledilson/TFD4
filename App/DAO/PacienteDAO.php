<?php

require_once(__DIR__ . '/../Config/conexao.php');

class pacienteDAO
{
    protected $mysqli;

    public function __construct()
    {

        $banco = new Banco(); // Cria uma instância da classe Banco para estabelecer a conexão com o banco de dados
        $this->mysqli = $banco->getConexao(); // Atribui a conexão estabelecida à propriedade $mysqli da classe PacienteDAO
    }

    //exbir cliente por ID
    public function getPacientePorId($idPaciente)
    {
        $query = "SELECT p.*, s.nome_situacao, u.nome_usf
                      FROM pacientes p
                      INNER JOIN situacoes s ON p.id_situacao = s.id
                      INNER JOIN unidades u ON p.id_unidade_usf = u.id
                       WHERE p.id =$idPaciente";

        $result = $this->mysqli->query($query);

        if ($result) {
            $paciente = $result->fetch_array(MYSQLI_ASSOC);
            if ($paciente) {
                return $paciente;
            } else {
                return "Paciente não encontrado";
            }
        } else {
            return "Erro ao buscar paciente";
        }
    }

    //Listar todos
    public function getPaciente()
    {
        $result = $this->mysqli->query("SELECT p.*, s.nome_situacao, u.nome_usf
                      FROM pacientes p
                      INNER JOIN situacoes s ON p.id_situacao = s.id
                      INNER JOIN unidades u ON p.id_unidade_usf = u.id order by p.id desc");

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row;
        }
        return $array;
    }

    public function setPaciente($foto, $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_unidade_usf, $id_situacao, $created, $modified)
    {
        // Prepare a consulta SQL para inserir um novo paciente
        $stmt = $this->mysqli->prepare("INSERT INTO pacientes (`foto`, `nome`, `rg`, `cpf`, `cns`, `celular`, `endereco`, `numero`, `bairro`, `cidade`, `cep`, `id_unidade_usf`, `id_situacao`, `created`, `modified`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Verifica se a preparação da consulta foi bem-sucedida
        if (!$stmt) {
            echo "Erro ao preparar a consulta: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
            return false; // Retorna false indicando que houve um erro
        }

        // Liga os parâmetros da consulta às variáveis
        $stmt->bind_param("sssssssssssssss", $foto, $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_unidade_usf, $id_situacao, $created, $modified);

        // Executa a consulta
        $result = $stmt->execute();

        // Verifica se a consulta foi bem-sucedida
        if ($result) {
            // Fecha a declaração
            $stmt->close();
            return true; // Retorna true indicando sucesso
        } else {
            // Se a consulta falhou, exibe uma mensagem de erro
            echo "Erro ao executar a consulta: (" . $stmt->errno . ") " . $stmt->error;
            // Fecha a declaração
            $stmt->close();
            return false; // Retorna false indicando que houve um erro
        }
    }

    public function inserirFoto($nome_final)
    {
        // Prepare a consulta SQL para inserir o nome da foto
        $stmt = $this->mysqli->prepare("INSERT INTO pacientes (foto) VALUES (?)");

        // Verificar se a preparação da consulta falhou
        if (!$stmt) {
            echo "Erro ao preparar a consulta: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
            return false; // Retorna false indicando que houve um erro
        }

        // Liga o parâmetro da consulta à variável
        $stmt->bind_param("s", $nome_final);

        // Executa a consulta
        $result = $stmt->execute();

        // Verifica se a consulta foi bem-sucedida
        if ($result) {
            // Fecha a declaração
            $stmt->close();
            return true; // Retorna true indicando sucesso
        } else {
            // Se a consulta falhou, exibe uma mensagem de erro
            echo "Erro ao executar a consulta: (" . $stmt->errno . ") " . $stmt->error;
            // Fecha a declaração
            $stmt->close();
            return false; // Retorna false indicando que houve um erro
        }
    }


    public function putPaciente($foto, $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_unidade_usf, $id_situacao, $created, $modified, $id)
    {
        // Verificar se todos os parâmetros estão definidos
        if (!isset($foto, $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_unidade_usf, $id_situacao, $created, $modified, $id)) {
            echo "Alguns parâmetros não estão definidos.";
            return false;
        }

        $stmt = $this->mysqli->prepare("UPDATE `pacientes` SET `foto` = ?, `rg` = ?, `cpf`= ?, `cns`= ?, `celular` = ?, `endereco` = ?, `numero` = ?, `bairro` = ?, `cidade` = ?, `cep` = ?, `id_unidade_usf` = ?, `id_situacao` = ?, `created` = ?, `modified`= ? WHERE `id` = ?");
        // Verificar se a preparação da consulta falhou
        if (!$stmt) {
            echo "Erro ao preparar a consulta: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
            return false;
        }

        // Corrigindo a ordem dos parâmetros na declaração da query
        $stmt->bind_param("sssssssssssssssi", $foto, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_unidade_usf, $id_situacao, $created, $modified, $id);

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