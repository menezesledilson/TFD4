<?php
require_once(__DIR__ . '/../../DAO/PacienteDAO.php');

class listarController
{
    private $lista;
    public $rows; //Propriedade para armazenar os dados dos pacientes

    public function __construct()
    {
        $this->lista = new pacienteDAO();
        $this->listarTodos(); // Chama o método para listar todos os pacientes ao construir o objeto
    }
    public function listarTodos()
    {
        $this->rows = $this->lista->getPaciente(); // Armazena todos os dados dos pacientes na propriedade $rows
    }
    public function getPacienteId($id_Paciente) {
        $pacienteDAO = new pacienteDAO(); // Instancia a classe PacienteDAO
        $paciente = $pacienteDAO->getPacientePorId($id_Paciente); // Busca o paciente pelo ID utilizando o método correto

        if ($paciente) {
            $this->rows = array($paciente); // Armazena os dados do paciente encontrado na propriedade $rows
        } else {
            $this->rows = array(); // Se não encontrar o paciente, esvazia $rows
        }
    }


    public function getRows()
    {
        return $this->rows;
    }

}

?>




