<?php

require_once "Conexao.class.php";
require_once "DonoEstabelecimento.class.php";

class DonoEstabelecimentoDAO{
    private $con;

    public function __construct(){
        $this->con = Conexao::obterConexao();
    }

    public function salvar($obj){
        // var_dump($obj);
        if($obj instanceof DonoEstabelecimento){
            $idDonoEstabelecimento = $obj->getIdDonoEstabelecimento();
            $nome = $obj->getNome();
            $cpf = $obj->getCpf();
            $email = $obj->getEmail();
            $senha = $obj->getSenha();
            $tipo = $obj->getTipo();

            //criptografa senha
            $senha = md5($senha);

            if($idDonoEstabelecimento == NULL){
                $comando = "INSERT INTO donoestabelecimento(nome, cpf, email, senha, tipo)
                VALUES ('$nome', '$cpf', '$email', '$senha', '$tipo')";
            } else {
                $comando = "UPDATE DonoEstabelecimento
                SET nome = '$nome', cpf = '$cpf', email = '$email', senha = '$senha', tipo = '$tipo'
                WHERE id_dono_estabelecimento = $idDonoEstabelecimento";
            }
            return $this->con->exec($comando);
        }
    }

    public function excluir($id){
        $comando = "DELETE FROM DonoEstabelecimento WHERE id_dono = $id";
        return $this->con->exec($comando);
    }

    public function obterTodos(){
        $donos = array();

        $comando = "SELECT nome, cpf, email, senha, tipo
        FROM DonoEstabelecimento";

        //fazendo a conexao manualmente, n consegui arrumar isso
        $conn = pg_connect("host=localhost port=5432 dbname=qual-vai-ser user=postgres password=postgres");
        $sql = pg_query($conn, $comando);

        while( $linha = pg_fetch_array($sql) ) {
            $donoEstabelecimento = new DonoEstabelecimento($linha['nome'], $linha['cpf'], $linha['email'], $linha['senha'], $tipo['tipo']);
            $donoEstabelecimento->setIdDono($linha['id_dono_estabelecimento']);
            $estabelecimentos[] = $donoEstabelecimento;
        }
        return $estabelecimentos;
    }
}

?>
