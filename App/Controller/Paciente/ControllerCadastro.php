<?php
require_once(__DIR__ . '/../../DAO/PacienteDAO.php');
class CadastroController
{
    private $criar;

    public function __construct()
    {
        $this->criar = new pacienteDAO();
    }

    public function criarTodos($foto, $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_unidade_usf, $id_situacao, $created, $modified)
    {
        try {

            // Verifica se o paciente foi cadastrado com sucesso
            $resultado_paciente = $this->criar->setPaciente($foto, $nome, $rg, $cpf, $cns, $celular, $endereco, $numero, $bairro, $cidade, $cep, $id_unidade_usf, $id_situacao, $created, $modified);

            if ($resultado_paciente) {
                // Cria um nome único para a foto
                $nome_final = time() . '_' . $foto;

                // Inserir a foto do paciente
                $resultado_foto = $this->criar->inserirFoto($nome_final);


                // Retorna verdadeiro apenas se o paciente e a foto forem inseridos com sucesso
                if ($resultado_foto) {
                    return true;
                } else {
                    // Se houver um erro ao inserir a foto, retorne uma string indicando o problema
                    return "foto_error";
                }
            } else {
                // Se houver um erro ao inserir o paciente, retorne falso
                return false;
            }
        } catch (Exception $e) {
            // Captura a exceção e exibe a mensagem de erro
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
            return false;
        }
    }
}

?>
