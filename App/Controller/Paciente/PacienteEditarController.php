<?php
require_once("../../Model/PacienteModel.php");

class editarController {

    private $editar;
    private $id;
    private $nome;
    private $rg;
    private $cpf;
    private $cns;
    private $celular;
    private $endereco;
    private $numero;
    private $bairro;
    private $cidade;
    private $cep;
    private $id_situacao;
    private $id_unidade_usf;
    private $created;

    public function __construct(){
        $this->editar = new Paciente();
        $this->id=$id;
        $this->criarFormulario($id);
    }

    public function criarFormulario($id)
    {
        $row = $this->editar->listarPacientePorId($id);
        if($row){
            //Localizar nome da coluna no banco de dados
            $this->nome = $row['nome'];
            $this->rg = $row['rg'];
            $this->cpf = $row['cpf'];
            $this->cns = $row['cns'];
            $this->celular = $row['celular'];
            $this->endereco = $row['endereco'];
            $this->numero = $row['numero'];
            $this->bairro = $row['bairro'];
            $this->cidade = $row['cidade'];
            $this->cep = $row['cep'];
            $this->id_situacao = $row['id_unidade_usf'];
            $this->id_unidade_usf = $row['id_unidade_usf'];
        }
    }
    public function editarTodos($nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_unidade_usf, $id_situacao)
    {
        // Chama a função da classe de modelo para atualizar os dados do paciente no banco de dados
        $this->rows = $this->editar->putPaciente(id $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_unidade_usf, $id_situacao);
        return $this->rows;
    }
    public function buscarPacientePorId($id_paciente) {
        // Chama a função da classe de modelo para buscar os dados do paciente por ID
        $dados_paciente = $this->editar->getPacientePorId($id_paciente);
        return $dados_paciente;
    }
}

?>

