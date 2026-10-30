<?php

declare(strict_types=1);
namespace Controllers;

use Lib\Pages;
use Models\Libro;

class LibroController
{
    private Pages $pages;

    public function __construct()
    {
        $this->pages = new Pages();
    }

    public function mostrarLibro(): void
    {
        $libro = new Libro('9788491050483', 'Platero y yo', 'Juan Ramón Jiménez', 1914, 192);
        $this->pages->render('libro/mostrarLibro', [
            'ficha' => $libro->getFicha(),
            'anio' => $libro->getAnio(),
        ]);
    }
}
