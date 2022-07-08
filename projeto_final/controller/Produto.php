<?php

require 'model/produtoModel.php';
require 'model/categoria_model.php';
require 'controller/Controller.php';

class Produto extends Controller
{
    function __construct()
    {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('location: ?c=restrito&m=login');
        }
        $this->model = new produtoModel();
        $this->categoriaModel = new Categoria_model();
    }

    function index()
    {
        $d['produtos'] = $this->model->buscarTodos();
        $this->load_template("produto/listagem.php", $d);
    }

    function add()
    {
        //$d['categorias'] = $this->categoriaModel->buscarTodos();
        $categorias = $this->categoriaModel->buscarTodos();
        //$this->load_template("produto/form.php");
        include 'view/template/cabecalho.php';
        include 'view/template/menu.php';
        include 'view/produto/form.php';
        include 'view/template/footer.php';
    }

    function editar($id)
    {
        $produto = $this->model->buscarPorId($id);
        $categorias = $this->categoriaModel->buscarTodos();
        //$d['produto'] = $this->model->buscarPorId($id);
        //$this->load_template("categoria/form.php", $d);
        include 'view/template/cabecalho.php';
        include 'view/template/menu.php';
        include 'view/produto/form.php';
        include 'view/template/footer.php';
    }

    function excluir($id)
    {
        $this->model->excluir($id);
        header('Location: ?c=produto');
    }

    function salvar_foto()
    {
        if (isset($_FILES['foto']) && !$_FILES['foto']['error']) {
            echo $nome_imagem = time() . $_FILES['foto']['name'];
            echo $origem = $_FILES['foto']['tmp_name'];
            echo $destino = "fotos/$nome_imagem";
            if (move_uploaded_file($origem, $destino)) {
                return $destino;
            }
        }
        return false;
    }

    function salvar()
    {

        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome_foto = $this->salvar_foto() ?? "fotos/semfoto.jpg";

            if (empty($_POST['idproduto'])) {

                $this->model->inserir(
                    $_POST['nome'],
                    $_POST['descricao'],
                    $_POST['preco'],
                    $_POST['marca'],
                    $nome_foto,
                    $_POST['categoria']
                );
            } else {
                $this->model->atualizar(
                    $_POST['idproduto'],
                    $_POST['nome'],
                    $_POST['descricao'],
                    $_POST['preco'],
                    $_POST['marca'],
                    $nome_foto,
                    $_POST['categoria']
                );
            }
            header('Location: ?c=produto');
        }
    }
}
