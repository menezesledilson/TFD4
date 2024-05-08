<?php

require_once (__DIR__ ."/../dao/SeguradoraDAO.php");
class Seguradora extends Banco
{
    private $id;
    private $nome;
    private $telefone;
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone): void
    {
        $this->telefone = $telefone;
    }

    private $seguradoraDAO;

    public function __construct()
    {
        $this->seguradoraDAO = new seguradoraDAO();
    }

    //Método para incluir  a frota de carros

    public function cadastrarSeguradora($nome, $telefone)
    {
        return $this->seguradoraDAO->postSeguradora($nome, $telefone);
    }

    //Método para listar a frota de carros
    public function listarSeguradora()
    {
        return $this->seguradoraDAO->getSeguradora();
    }

    //Atualizar a informação do veículo
    public function atualizaSeguradora($nome, $telefone, $id)
    {
        return $this->seguradoraDAO->putSeguradora($nome, $telefone,$id);
    }

    //Método para deletar veiculo
    public function excluirSeguradora($id)
    {
        return $this->seguradoraDAO->deleteSeguradora($id);
    }

    //pesquisa paciente
    public function pesquisaSeguradora($id)
    {
        return $this->seguradoraDAO->localizarSeguradora($id);
    }
}