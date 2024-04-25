<?php
require_once("conexao.php");

class MotoristaDAO
{

    protected $conexao;

    public function __construct()
    {
        $this->conexao = new Banco();
    }

    //Cadastrar os motoristas
    public function postMotorista($motorista, $telefone)
    {
        $stmt = $this->conexao->getConexao()->prepare("INSERT INTO motoristas(`nome`,`telefone`) VALUES(?,?)");
        $stmt->bind_param("ss", $motorista, $telefone);
        if ($stmt->execute() == true) {
            return true;
        } else {
            return false;
        }
    }

    //Listar os Carros
    public function getMotorista()
    {
        $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM motoristas ORDER BY id DESC ");
        $motoristas = [];
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $motoristas[] = $row;
        }
        return $motoristas;
    }

    //Localizar o motorista
    public function localizarMotorista($id)
    {
        $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM motoristas WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);

    }

    //Atualizar o motorista
    public function putMotorista($nome, $telefone, $id)
    {
        $stmt = $this->conexao->getConexao()->prepare("UPDATE motoristas SET nome=?, telefone =? WHERE id=?");
        $stmt->bind_param("ssi", $nome, $telefone, $id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
   //Deletar o motorista
    public function deleteMotorista($id){
        $stmt = $this->conexao->getConexao()->prepare("DELETE FROM `motoristas` WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        if($stmt->affected_rows > 0){
            return true;
        }else{
            return false;
        }
    }
}
?>