<?php
require_once("../DAO/PacienteDAO.php");

class EditarController {

    private $editar;

    public function __construct(){
        $this->editar = new PacienteDAO();
    }

    public function editarTodos($id, $foto, $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_unidade_usf, $id_situacao, $created, $modified)
    {
        // Chama a função da classe de modelo para atualizar os dados do paciente no banco de dados
        $this->rows = $this->editar->putPaciente($id, $foto, $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_unidade_usf, $id_situacao, $created, $modified);
        return $this->rows;
    }
    public function buscarPacientePorId($id_paciente) {
        // Chama a função da classe de modelo para buscar os dados do paciente por ID
        $dados_paciente = $this->editar->getPacientePorId($id_paciente);
        return $dados_paciente;
    }
}

?>

