<?php
require_once("conexao.php");

class UnidadeDAO
{
    protected $conexao;
    public function __construct()
    {
        $this->conexao = new Banco();
    }

    // Criar unidades
    public function postUnidade($nome)
    {
        $stmt = $this->conexao->getConexao()->prepare("INSERT INTO unidades(`nome_usf`) VALUES (?)");
        $stmt->bind_param("s", $nome);
        if ($stmt->execute() == true) {
            return true;
        } else {
            return false;
        }
    }

   //Lista de todas unidades
     public function getUnidade( )
     {
         $stmt = $this->conexao->getConexao()->prepare("SELECT id, nome_usf FROM unidades order by id desc  ");
         $unidades = [];
         $stmt->execute();
         $result = $stmt->get_result();
         while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
             $unidades[] = $row;
         }
         return $unidades;
     }

    public function pesquisaLivro($id)
    {
        $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM unidades WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    //Deletar as unidade
     public function deleteUnidade($id)
    {
         $stmt = $this->conexao->getconexao()->prepare("DELETE FROM `unidades` WHERE id=?");
         $stmt->bind_param("i", $id);
         $stmt->execute();
         if ($stmt->affected_rows > 0) {
             return true;

         }else{
             return false;
         }
    }
    //Atualizar unidade
    public function putUnidade($nome,$id)
    {
        $stmt = $this->conexao->prepare("UPDATE unidades SET nome_usf = ? where id = ?");
        $stmt->bind_param("si", $nome,$id);
        if ($stmt->execute() == true) {
            return true;
        }else{
            return false;
        }
    }

}
?>