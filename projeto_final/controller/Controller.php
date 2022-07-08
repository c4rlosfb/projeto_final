<?php

class Controller
{
    public function load_template($url_view, $dados = [])
    {
        foreach ($dados as $key => $value) {
            $$key = $value;
        }
        include "view/template/cabecalho.php";
        include "view/template/menu.php";
        include "view/$url_view";
        include "view/template/footer.php";
    }
}
