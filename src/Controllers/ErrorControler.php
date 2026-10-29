<?php
declare(strict_types=1);
namespace Controllers;

class ErrorController
{
    public static function show_error404(): void
    {
        http_response_code(404);
        echo "Error 404: página no encontrada";
    }
}