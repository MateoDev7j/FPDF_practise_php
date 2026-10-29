<?php

declare(strict_types=1);
namespace Controllers;

use lib\Pages;
use Models\Alumno;
use Models\Alumnos;
class AlumnosController{
    private Pages $pages;
    private Alumnos $alumnos;

    public function __construct(){
        $this->pages = new Pages();
        $this->alumnos = new Alumnos();

    }
    public function mostrarAlumnos(?Alumnos $alumnosRec = null){
        if ($alumnosRec === null) {
            $alumnosRec = $this->alumnos->getAlumnos();  // misma variable
        }

        $this->pages->render('alumnos/mostrarAlumnos', [
            'alumnos' => $alumnosRec,
        ]);
    }
}