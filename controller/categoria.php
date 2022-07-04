<?php  

require "model/categoria_model.php";
require "controller/Controller.php";

class Categoria extends Controller{
    function __construct(){
        $this->model = new Categoria_model();
    }

    function index(){
        $categorias = $this->model->buscarTodos();
        $this->load_template("categoria/listagem.php", $categorias);
    }

    function inserir(){
        
    }

    function excluir($id){
        $this->model->delete($id);
    }
}



//$model = new Categoria_model();
//$model->inserir();
//$model->delete();
//$model->atualizar();
//var_dump($model->buscarPorId(4));
?>