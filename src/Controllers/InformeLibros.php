<?php

declare(strict_types=1);

namespace Controllers;

use Lib\Pages;
use Models\Libros;

class InformeLibros
{
    private Pages $pages;
    private Libros $libros;

    public function __construct()
    {
        $this->pages = new Pages();
        $this->libros = new Libros();
    }

    public function generarInforme(): void
    {
        $this->pages->render('pdf/informeLibros', [
            'libros' => $this->libros->getLibros(),
        ]);
    }
}
