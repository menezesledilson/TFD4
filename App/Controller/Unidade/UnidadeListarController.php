<?php
require_once("../../DAO/UnidadeModel.php");

class listarUnidade
{    private $listar;
    public function __construct()
    {
        $this->listar = new unidade();
        $this->listarTodos();
    }

    // Armazena todos os dados na propriedade $rows
    public function listarTodos()
    {
       return $this->listar->listarUnidades();
    }
}

?>