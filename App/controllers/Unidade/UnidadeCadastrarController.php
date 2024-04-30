<?php
require_once (__DIR__ ."/../../models/UnidadeModel.php");
class cadastrarUnidade
{
    private $cadastro;

    public function __construct()
    {
        $this->cadastro = new Unidade();
        $this->cadastrarUnidade();
    }
    private function cadastrarUnidade()
    {
        $this->cadastro->setNome($_POST['nome']);

        $result = $this->cadastro->cadastrarUnidade($_POST['nome']);

        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../../views/user/UnidadeView/indexUnidade.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }

    }
}

new cadastrarUnidade();
?>
