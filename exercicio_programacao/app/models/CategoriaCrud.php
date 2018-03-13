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
    }

    public function  getCategorias(){
        //Retorna várias categorias

        //Fazer consulta
        $sql = 'select * from categoria';
        $resultado = $this->conexao->query($sql);

        //fetchAll - Transforma o resultado em um array associativo
        $categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $listaCategorias = [];
        foreach ($categorias as $categoria){
                $id = $categoria["id_categoria"];
                $nome = $categoria["nome_categoria"];
                $descricao = $categoria["descricao_categoria"];

                $objcat = new Categoria($id, $nome, $descricao);

                $listaCategorias[] = $objcat;

        }


        return $listaCategorias;


    }

    public function  insertCategoria(Categoria $cat){
        //Adiciona Categorias

        //Adicionar no banco
        $sql = "INSERT INTO categoria(nome_categoria, descricao_categoria) VALUES ('"$categoria->get"') ";


    }

    public function __construct()
    {
        //Sempre que a classe for instanciada, já faz a conexão e guarda
        $this->conexao = DBConnection::getConexao();

    }

}
?>
