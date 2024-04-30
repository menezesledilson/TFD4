<?php
require_once (__DIR__ ."/../../models/HospitalModel.php");

class cadastrarHospital
{
    private $cadastro;

    public function __construct()
    {
        $this->cadastro = new Hospital();
        $this->cadastrarHospital();
    }

    public function cadastrarHospital()
    {
        // Verificar se o campo 'nome' está definido em $_POST
        if (isset($_POST['nome']) && isset($_POST['endereco']) && isset($_POST['numero']) && isset($_POST['bairro']) && isset($_POST['cep']) && isset($_POST['cidade']) && isset($_POST['telefone'])) {
            // Campos estão definidos, podemos acessá-los
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $numero = $_POST['numero'];
            $bairro = $_POST['bairro'];
            $cep = $_POST['cep'];
            $cidade = $_POST['cidade'];
            $telefone = $_POST['telefone'];

            // Tentar cadastrar o hospital
            $result = $this->cadastro->cadastrarHospital($nome, $endereco, $numero, $bairro, $cep, $cidade, $telefone);

            if ($result >= 1) {
                echo "<script>alert('Registro incluído com sucesso!'); document.location='../../views/user/HospitalView/indexHospital.php'</script>";
            } else {
                echo "<script>alert('Erro ao gravar registro!');</script>";
            }
        } else {
            // Campo 'nome' não está definido em $_POST
            echo "<script>alert('Erro: O campo nome não foi enviado!');</script>";
        }
    }
}

new cadastrarHospital();
?>
