<?php  

require '../conexao.php';
require "../model/categoria_model.php";
$model = new Categoria_model($con);
//$model->inserir("Produtos de Limpeza");
//$model->delete(1);
//$model->atualizar("Smartphone", 4);
var_dump($model->buscarPorId(4));
?>