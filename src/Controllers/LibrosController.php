<?php

declare(strict_types=1);
namespace Controllers;

use Lib\Pages;
use Models\Libros;

class LibrosController
{
    private Pages $pages;
    private Libros $libros;

    public function __construct()
    {
        $this->pages = new Pages();
        $this->libros = new Libros();
    }

    public function mostrarLibros(): void
    {
        $this->pages->render('libros/mostrarLibros', [
            'libros' => $this->libros->getLibros(),
        ]);
    }
}
