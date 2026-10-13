<?php

namespace Controllers;

use MVC\Router;



class RegistroController
{
    public static function crear(Router $router)
    {


        $router->render('registro/crear', [
            'titulo' => 'Finalizar Registro'
        ]);
    }

    public static function gratis(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!is_auth()) {
                header('Location: /login');
            }
            $token = substr(md5(uniqid(rand(), true)), 0, 8);
            debuguear($token);

        }
    }

}