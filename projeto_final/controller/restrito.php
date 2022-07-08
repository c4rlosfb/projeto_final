<?php

require "model/usuarioModel.php";
require "controller/Controller.php";

class restrito extends Controller
{
    function __construct()
    {
        $this->usuario = new usuarioModel();
    }


    function login($id)
    {
        include 'view/template/cabecalho.php';
        include 'view/restrito/form.php';
        include 'view/template/footer.php';
    }

    function logout()
    {
        session_start();
        unset($_SESSION['usuario']);
        session_destroy();
        header('location: ?c=restrito&m=login');
    }

    function entrar()
    {
        if (isset($_POST['login']) && isset($_POST['senha'])) {
            $usuario = $this->usuario->buscarPorLogin($_POST['login']);
            if (password_verify($_POST['senha'], $usuario['senha'])) {
                session_start();
                $_SESSION['usuario'] = $usuario['login'];
                header("Location: ?c=categoria");
            } else {
                header('location: ?c=restrito&m=login');
            }
        }
    }
}
