<?php

require "model/categoria_model.php";
require "model/produtoModel.php";
require "controller/Controller.php";

class home extends Controller
{
    function __construct()
    {
        $this->Categoria = new Categoria_model();
        $this->produto = new produtoModel();
    }

    function index($id = null)
    {
        $categorias = $this->Categoria->buscarTodos();
        if (!$id) {
            $produtos = $this->produto->buscarTodos();
        } else {
            $produtos = $this->produto->buscarPorCategoria($id);
        }
        include 'view/template/cabecalho.php';
        include 'view/template/menu_home.php';
        include 'view/home/listagem.php';
        include 'view/template/footer.php';
    }

    function ver($id)
    {
        $categorias = $this->Categoria->buscarTodos();
        $produto = $this->produto->buscarPorId($id);
        include 'view/template/cabecalho.php';
        include 'view/template/menu_home.php';
        include 'view/home/ver.php';
        include 'view/template/footer.php';
    }

    function search()
    {
        $categorias = $this->Categoria->buscarTodos();
        $produtos = $this->produto->buscarPorLikeNome($_POST['search']);
        include 'view/template/cabecalho.php';
        include 'view/template/menu_home.php';
        include 'view/home/listagem.php';
        include 'view/template/footer.php';
    }
}
