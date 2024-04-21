<?php
require_once("../../Model/UnidadeModel.php");

class editarUnidade
{
    private $editar;

    public function __CONSTRUCT(){
        $this->editar = new SituacaoDAO();
    }
    public function editarTods($nome_usf,$id,$created,$modified)
    {
        $this->rows = $this->editar->putSituacao($nome_usf, $id, $created, $modified);
        return $this->rows;
    }
    public function buscarUnidadePorId($id_Unidade) {
        // Chama a função da classe de modelo para buscar os dados do paciente por ID
        $dados_situacao = $this->editar->getUnidadePorId($id_Unidade);
        return $dados_situacao;
    }

}


?>