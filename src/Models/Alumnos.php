<?php

declare(strict_types=1);

namespace Models;
use Models\Alumno;
class Alumnos{
    private array $alumnos=[];
    public function __construct(){
        $this->crearAlumnos();
    }
    function crearAlumnos(): void
    {
        $nombres=["manuel","pepe","maria","manuela","johnny","pablo","natalia"];
        $apellidos=["gonzalez","perez","martinez","gonzalez","smith","payez","natilla"];
        $alumnoRec = new Alumno("1","maria","gonzalez",18,10,2007);
        $this->alumnos = [];
        for($i = 0; $i < count($nombres); $i++)
            $this->alumnos[$i] = new Alumno("".$i,$nombres[$i],$apellidos[$i],rand(18,25),(int)rand(0,10));

    }
    public function getAlumnos(): array{
        return $this->alumnos;
    }
}