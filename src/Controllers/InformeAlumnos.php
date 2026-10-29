<?php

declare(strict_types=1);

namespace Controllers;

use Lib\Pages;
use Models\Alumnos;

class InformeAlumnos
{
    private Pages $pages;
    private Alumnos $alumnos;

    public function __construct()
    {
        $this->pages = new Pages();
        $this->alumnos = new Alumnos();
    }

    public function generarInforme(): void
    {
        $alumnos = $this->alumnos->getAlumnos();

        $this->pages->render('pdf/informeAlumnos', [
            'alumnos' => $alumnos
        ]);
    }
}