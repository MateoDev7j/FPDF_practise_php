<?php

namespace Controllers;
use lib\Pages;
use Models\Alumno;
class AlumnoController{
    private Pages $pages;
    
    public function __construct(){
        $this->pages = new Pages();
    }
    /*
    public function muestraAlumno(): void{
        echo "<p>nombre completo: '{$this->alumno->getNombreCompleto()}'</p><p>nota: '{$this->alumno->getNota()}'</p>";
        return 
    }*//*
    public function barajar():void{
        $this->baraja->barajarCartas();
        $this->mostrarCartas($this->baraja->getCartas(),'Baraja mezclada');
    }*/
    public function mostrarAlumno(?string $alumnoRec = null){
        if($alumnoRec === null)
            $alumnoRec = new Alumno("1","maria","gonzalez",18,10,2007);
        $this->pages->render('alumno/mostrarAlumno',[
            'nombreCompleto' => $alumnoRec->getNombreCompleto(),
            'edad' => $alumnoRec->getEdad(),
        ]);
    }
}