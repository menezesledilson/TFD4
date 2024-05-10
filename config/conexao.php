
<?php

// Timezone
date_default_timezone_set('America/Sao_Paulo');

class Banco
{
    protected $mysqli;

    public function __construct($servidor = 'localhost', $usuario = 'root', $senha = '', $banco = 'saude3')

    {
         $this->conexao($servidor, $usuario, $senha, $banco);

    }

    private function conexao($servidor, $usuario, $senha, $banco)
    {
        try {
            $this->mysqli = new mysqli($servidor, $usuario, $senha, $banco);
            if ($this->mysqli->connect_error){
                throw new Exception('Erro de conexão (' . $this->mysqli->connect_errno . ') ' . $this->mysqli->connect_error);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getConexao()
    {
        return $this->mysqli;
    }

    public function prepare($sql)
    {
        return $this->mysqli->prepare($sql);
    }

    public function fecharConexao()
    {
        $this->mysqli->close();
    }

    // Tratamento contra injeção SQL
    public function protegerContraSQLInjection($input)
    {
        return $this->mysqli->real_escape_string($input);
    }
}

// Instanciação do objeto de banco de dados
$bancoDeDados = new Banco( );

?>
