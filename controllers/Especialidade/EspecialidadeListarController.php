<?php
require_once (__DIR__ ."/../../models/EspecialidadeModel.php");

class listarEspecialidade
{    private $listar;

    public function __construct(){
        $this->listar = new especialidade();
        $this->listarTodos();
    }
    // Armazena todos os dados na propriedade $rows
    public function listarTodos(){
        return $this->listar->listarEspecialidades();
    }
}

?>