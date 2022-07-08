<?php

require "model/usuarioModel.php";
require "controller/Controller.php";

class usuario extends Controller
{
    function __construct()
    {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('location: ?c=restrito&m=login');
        }
        $this->model = new usuarioModel();
    }

    function index()
    {
        $d['usuarios'] = $this->model->buscarTodos();
        $this->load_template("usuario/listagem.php", $d);
    }

    function add()
    {
        $this->load_template("usuario/form.php");
        //include 'view/template/cabecalho.php';
        //include 'view/template/menu.php';
        //include 'view/categoria/form.php';
        //include 'view/template/footer.php';
    }

    function editar($id)
    {
        $d['usuario'] = $this->model->buscarPorId($id);
        $this->load_template("usuario/form.php", $d);
        //include 'view/template/cabecalho.php';
        //include 'view/template/menu.php';
        //include 'view/categoria/form.php';
        //include 'view/template/footer.php';
    }

    function excluir($id)
    {
        $this->model->excluir($id);
        header('Location: ?c=usuario');
    }

    function salvar()
    {
        if (isset($_POST['login']) && !empty($_POST['login']) && !empty($_POST['senha'])) {
            if (empty($_POST['idusuario'])) {

                if (!$this->model->buscarPorLogin($_POST['login'])) {
                    $this->model->inserir($_POST['login'], password_hash($_POST['senha'], PASSWORD_BCRYPT));
                } else {
                    echo "Já existe um usuário com esse Login cadastrado!";
                    die();
                }
            } else {
                $this->model->atualizar($_POST['idusuario'], $_POST['login'], password_hash($_POST['senha'], PASSWORD_BCRYPT));
            }
            header('Location: ?c=usuario');
        }
    }
}
