<?php  

require "model/categoria_model.php";

class Categoria{
    function __construct(){
        $this->model = new Categoria_model();
    }

    function index(){
        var_dump($this->model->buscarTodos());
    }

    function inserir(){
        echo "Testando inserir";
    }
}



//$model = new Categoria_model();
//$model->inserir();
//$model->delete();
//$model->atualizar();
//var_dump($model->buscarPorId(4));
?>