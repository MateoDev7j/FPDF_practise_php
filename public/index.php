<?php



declare(strict_types=1);
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../autoloader.php';


use Controllers\FrontController;

FrontController::main();

// ahora creamos varios alumnos, una clase de alumnos

/*
// probando alumno controller
use Controllers\AlumnoController;

$controller = new AlumnoController();
$controller->mostrarAlumno();
*/

// probando models alumno
// use Models\Alumno;
// $alumno = new Alumno("1","maria","gonzalez",18,10,2007);
// var_dump($alumno);