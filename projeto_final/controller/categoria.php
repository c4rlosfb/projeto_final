<?php

require "model/categoria_model.php";
require "controller/Controller.php";

class Categoria extends Controller
{
    function __construct()
    {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('location: ?c=restrito&m=login');
        }
        $this->model = new Categoria_model();
    }

    function index()
    {
        $d['categorias'] = $this->model->buscarTodos();
        $this->load_template("categoria/listagem.php", $d);
    }

    function add()
    {
        $this->load_template("categoria/form.php");
        //include 'view/template/cabecalho.php';
        //include 'view/template/menu.php';
        //include 'view/categoria/form.php';
        //include 'view/template/footer.php';
    }

    function editar($id)
    {
        $d['categoria'] = $this->model->buscarPorId($id);
        $this->load_template("categoria/form.php", $d);
        //include 'view/template/cabecalho.php';
        //include 'view/template/menu.php';
        //include 'view/categoria/form.php';
        //include 'view/template/footer.php';
    }

    function excluir($id)
    {
        $this->model->excluir($id);
        header('Location: ?c=categoria');
    }

    function salvar()
    {
        if (isset($_POST['categoria']) && !empty($_POST['categoria'])) {
            if (empty($_POST['idCategoria'])) {
                $this->model->inserir($_POST['categoria']);
            } else {
                $this->model->atualizar($_POST['categoria'], $_POST['idCategoria']);
            }
            header('Location: ?c=categoria');
        }
    }
}
