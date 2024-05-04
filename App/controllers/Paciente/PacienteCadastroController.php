<?php
require_once (__DIR__ ."/../../models/PacienteModel.php");
class cadastrarPacienteController
{
    private $cadastro;

    public function __construct()
    {
        $this->cadastro = new Paciente();
        $this->cadastrar();
    }

    public function cadastrar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
            $rg = isset($_POST['rg']) ? $_POST['rg'] : '';
            $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
            $cns = isset($_POST['cns']) ? $_POST['cns'] : '';
            $celular = isset($_POST['celular']) ? $_POST['celular'] : '';
            $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
            $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
            $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
            $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
            $cep = isset($_POST['cep']) ? $_POST['cep'] : '';

            $embarque = isset($_POST['embarque']) ? $_POST['embarque'] : '';
            $referencia = isset($_POST['referencia']) ? $_POST['referencia'] : '';
            $id_unidade_usf = isset($_POST['id_unidade_usf']) ? $_POST['id_unidade_usf'] : null;
            $id_situacao = isset($_POST['id_situacao']) ? $_POST['id_situacao'] : null;

            // Validação dos dados, se necessário...

            $result = $this->cadastro->cadastrarPaciente($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep,$embarque,$referencia, $id_situacao, $id_unidade_usf);
            if ($result >= 1) {
                echo "<script>alert('Registro incluído com sucesso!');document.location='../../views/user/PacienteView/indexPaciente.php'</script>";
            } else {
                echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
            }
        }
    }
}

// Instanciando e chamando o método
new CadastrarPacienteController();
?>