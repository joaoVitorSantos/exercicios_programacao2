<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 06/03/18
 * Time: 16:10
 */

require_once 'DBConnection.php';
require_once 'Categoria.php';

class CategoriaCrud
{

    private $conexao;

    public function __construct()
    {
        //Sempre que a classe for instanciada, já faz a conexão e guarda
        $this->conexao = DBConnection::getConexao();

    }


    public function getCategoria(int $id){
        //Retorna uma categoria, dado um id

        //Fazer consulta
        $sql = 'select * from categoria where id_categoria =' . $id;
        $resultado = $this->conexao->query($sql);

        //FETCH - Transforma o resultado em um array associativo
        $categoria = $resultado-> fetch(PDO::FETCH_ASSOC);
        //Criar Objeto do Tipo Categoria
        $objcat = new Categoria($categoria['id_categoria'], $categoria['nome_categoria']);
        //Retornar um objeto categoria com os valores
        return $objcat;

        return $resultado;
    }

    /**
     * @return null|PDO
     */
    public function getCategorias()
    {
        $sql = "SELECT * FROM categoria";

        $resultado = $this->conexao->query($sql);

        $categorias = $resultado->fetchAll(PDO:: FETCH_ASSOC);

        foreach ($categorias as $categoria){
            $id = $categoria['id_categoria'];
            $nome = $categoria['nome_categoria'];
            $descricao = $categoria['descricao_categoria'];

            $obj = new Categoria($id, $nome, $descricao);
            $listaCategorias[] = $obj;
        }

        return $listaCategorias;
    }


}
?>
