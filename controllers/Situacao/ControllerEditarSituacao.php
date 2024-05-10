<?php
require_once (__DIR__ ."/../../models/SituacaoModel.php");
class EditarController {

    private $editar;

    public function __construct(){
        $this->editar = new SituacaoDAO();

    }
    public function editarTodos($nome_situacao,$id, $created, $modified)
    {

        $this->rows = $this->editar->putSituacao($nome_situacao, $id, $created, $modified );
        return $this->rows;
    }
    public function buscarSituacaoPorId($id_situacao) {
        // Chama a função da classe de modelo para buscar os dados do paciente por ID
        $dados_situacao = $this->editar->getSituacaoPorId($id_situacao);
        return $dados_situacao;
    }
}
?>
