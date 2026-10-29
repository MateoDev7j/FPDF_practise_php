<?php
declare(strict_types=1);
namespace Models;
class Alumno{
    public function __construct(
        private string $dni,
        private string $nombre,
        private string $apellidos,
        private int $edad,
        private float $nota=0,
        private int $fechaNac=0
    ){

    }
    public function getNombre(): string{
        return $this->nombre;
    }
    public function getNombreCompleto(): string{
        return $this->nombre . " " .  $this->apellidos;;
    }
    public function getApellidos(): string{
        return $this->nombre . " " .  $this->apellidos;
    }
    public function getNota(): float{
        return $this->nota;
    }
    public function getEdad(): int{
        return $this->edad;
        // $this-> datey - (int) date('Y');
    }
}