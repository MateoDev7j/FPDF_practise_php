<?php
declare(strict_types=1);

namespace Models;

class Libros
{
    private array $libros = [];

    public function __construct()
    {
        $this->crearLibros();
    }

    private function crearLibros(): void
    {
        $datos = [
            ['9788437604947', 'Cien años de soledad', 'Gabriel García Márquez', 1967, 471],
            ['9788420412146', 'Don Quijote de la Mancha', 'Miguel de Cervantes', 1605, 1376],
            ['9788499089515', 'La sombra del viento', 'Carlos Ruiz Zafón', 2001, 576],
            ['9788466345316', 'Los renglones torcidos de Dios', 'Torcuato Luca de Tena', 1979, 640],
            ['9788491050483', 'Platero y yo', 'Juan Ramón Jiménez', 1914, 192],
            ['9788432217616', 'La colmena', 'Camilo José Cela', 1951, 320],
            ['9788408163602', 'Réquiem por un campesino español', 'Ramón J. Sender', 1953, 128],
        ];

        $this->libros = [];
        foreach ($datos as [$isbn, $titulo, $autor, $anio, $paginas]) {
            $this->libros[] = new Libro($isbn, $titulo, $autor, $anio, $paginas);
        }
    }

    public function getLibros(): array
    {
        return $this->libros;
    }
}
