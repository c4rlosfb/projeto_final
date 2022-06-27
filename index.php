<?php
    if(isset($_GET['c'])){
        $controller = ucfirst($_GET['c']);
        $path_controller = "controller/$controller.php";

        if(file_exists($path_controller)){
            require $path_controller;

            // ?? condição 
            $metodo = $_GET['m'] ?? "index";

            // cria objeto controlador e chama metodo
                $obj = new $controller();
            
            //verifica se o controlador possui uma função 
            if(is_callable(array($obj, $metodo))){

                //executa o método do controlador
                call_user_func_array(array($obj, $metodo), array());
            }
    }
}
