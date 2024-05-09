<?php
require_once(__DIR__ . "/../../models/CarroModel.php");

class editarVeiculo
{
    private $editar;
    private $id;
    private $modelo;
    private $placa;
    private $renavam;
    private $ano;
    private $cor;
    private $combustivel;
    private $vagas;

    private $tipo_carro;
    private $marca;
    private $data_vencimento;
    private $id_seguradora;

    public function __CONSTRUCT($id)
    {
        $this->editar = new Carro();
        $this->id = $id;
        $this->criarFormulario($id);
    }

    public function criarFormulario($id)
    {
        $row = $this->editar->pesquisaCarro($id);
        if ($row) {
            //Localizar nome da coluna no banco de dados
            $this->modelo = $row['modelo'];
            $this->placa = $row['placa'];
            $this->renavam = $row['renavam'];
            $this->ano = $row['ano'];
            $this->cor = $row['cor'];
            $this->combustivel = $row['combustivel'];
            $this->vagas = $row['vagas'];
            $this->tipo_carro = $row['tipo_carro'];
            $this->marca = $row['marca'];
            $this->data_vencimento = $row['data_vencimento'];
            $this->id_seguradora = $row['id_seguradora'];
        }
    }

    public function editarFormulario($modelo, $placa, $renavam, $ano, $cor, $combustivel, $vagas, $tipo_carro, $marca, $data_vencimento, $id_seguradora, $id)

    {
        try {
            if ($this->editar->atualizaCarro($modelo, $placa, $renavam, $ano, $cor, $combustivel, $vagas, $tipo_carro, $marca, $data_vencimento, $id_seguradora, $id)) {
                echo "<script>alert('Registro atualizado com sucesso!');document.location='./indexCarro.php'</script>";
            } else {
               echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
            }
        } catch (Exception $e) {
            // Captura e exibe o erro
            echo "Erro: " . $e->getMessage();
        }
    }

public function getId()
{
    return $this->id;
}

public
function getModelo()
{
    return $this->modelo;
}

public
function getPlaca()
{
    return $this->placa;
}

public
function getRenavam()
{
    return $this->renavam;
}

public
function getAno()
{
    return $this->ano;
}

public
function getCor()
{
    return $this->cor;
}

public
function getCombustivel()
{
    return $this->combustivel;
}

public
function getVagas()
{
    return $this->vagas;
}

/**
 * @return mixed
 */
public
function getIdSeguradora()
{
    return $this->id_seguradora;
}

/**
 * @return mixed
 */
public
function getTipoCarro()
{
    return $this->tipo_carro;
}

/**
 * @return mixed
 */
public
function getMarca()
{
    return $this->marca;
}

/**
 * @return mixed
 */
public
function getDataVencimento()
{
    return $this->data_vencimento;
}


}

$id = filter_input(INPUT_GET, 'id');
$editarCarro = new editarVeiculo($id);
if (isset($_POST['submit'])) {
    $editarCarro->editarFormulario($_POST['modelo'], $_POST['placa'], $_POST['renavam'], $_POST['ano'], $_POST['cor'], $_POST['combustivel'], $_POST['vagas'], $_POST['tipo_carro'], $_POST['marca'], $_POST['data_vencimento'], $_POST['id_seguradora'], $_POST['id']);
}

?>