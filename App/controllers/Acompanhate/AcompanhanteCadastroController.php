<?php
require_once (__DIR__ ."/../../models/AcompanhanteModel.php");
class CadastrarAcompanhanteController
{

    private $cadastroAcompanhante;

    public function __construct()
    {
        $this->cadastroAcompanhante = new Acompanhante();
        $this->cadastrar(); // Chamar o método cadastrar automaticamente quando a classe é instanciada
    }

    public function cadastrar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
            $rg = isset($_POST['rg']) ? $_POST['rg'] : '';
            $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
            $celular = isset($_POST['telefone']) ? $_POST['telefone'] : '';
            $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
            $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
            $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
            $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
            $cep = isset($_POST['cep']) ? $_POST['cep'] : '';

            // Validação dos dados, se necessário...

            $result = $this->cadastroAcompanhante->cadastrarAcompanhante($nome, $rg, $cpf, $celular, $endereco, $numero, $bairro, $cidade, $cep);
            if ($result >= 1) {
                echo "<script>alert('Registro incluído com sucesso!');document.location='../../views/user/AcompanhanteView/indexAcompanhante.php'</script>";
            } else {
                echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
            }
        }
    }
}

// Instanciar a classe dentro de uma função ou método, ou em outro contexto apropriado
new CadastrarAcompanhanteController();

?>
