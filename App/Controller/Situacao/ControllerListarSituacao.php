<?php

require_once("../DAO/SituacaoDAO.php");

class listarControllerSituacao
{
    private $listaSituacao;
    public $rows; //Propriedade para armazenar os dados dos pacientes

    public function __construct()
    {
        $this->listaSituacao = new situacaoDAO();
        $this->listarTodos(); // Chama o método para listar todos os pacientes ao construir o objeto
    }
    public function listarTodos()
    {
        $this->rows = $this->listaSituacao->getSituacao(); // Armazena todos os dados dos pacientes na propriedade $rows
    }

 public function getRows()
 {
     return $this->rows;
 }

}

?>




