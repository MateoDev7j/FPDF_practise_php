<?php

declare(strict_types=1);

namespace Controllers;

class FrontController
{
    public static function main(): void
    {
        $controller_name = $_GET['controller'] ?? CONTROLLER_DEFAULT;
        $action_name = $_GET['action'] ?? ACTION_DEFAULT;

        // Solo aceptar nombres simples, sin espacios ni rutas.
        if (
            !is_string($controller_name)
            || !preg_match('/^[a-zA-Z][a-zA-Z0-9]*$/', $controller_name)
            || !is_string($action_name)
            || !preg_match('/^[a-zA-Z][a-zA-Z0-9_]*$/', $action_name)
        ) {
            ErrorController::show_error404();
            return;
        }

        $nombre_controlador =
            'Controllers\\' . ucfirst($controller_name) . 'Controller';

        if (
            !class_exists($nombre_controlador)
            || in_array(
                $nombre_controlador,
                [self::class, ErrorController::class],
                true
            )
        ) {
            ErrorController::show_error404();
            return;
        }

        $controlador = new $nombre_controlador();

        if (!is_callable([$controlador, $action_name])) {
            ErrorController::show_error404();
            return;
        }

        $controlador->$action_name();
    }
}
