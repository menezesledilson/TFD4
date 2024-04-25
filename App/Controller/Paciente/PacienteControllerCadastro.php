<?php
require_once("/../../Model/PacienteModel.php");
class CadastrarPaciente
{
    private $cadastro;

    public function __construct()
    {
        $this->cadastro = new Paciente();
        $this->cadastrarPaciente();
    }
    public function cadastrarPaciente()
    {
        $foto = $_POST['foto'];
        $nome = $_POST ['nome'];
        $rg =$_POST['rg'];
        $cpf=$_POST['cpf'];
        $cns=$_POST['cns'];
        $celular=$_POST['celular'];
        $endereco=$_POST['endereco'];
        $numero=$_POST['numero'];
        $bairro=$_POST['bairro'];
        $cidade=$_POST['cidade'];
        $cep= $_POST['cep'];
        $id_unidade_usf=$_POST['id_unidade_usf'];
        $id_situacao=$_POST['id_situacao'];

        $result=$this->cadastro->cadastrarPaciente($foto, $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep,$id_situacao,$id_unidade_usf);
        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../../view/PacienteView/indexPaciente.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
}
new cadastrarPaciente();

?>
