<?php
declare(strict_types=1);
namespace Models;

class Libro
{
    public function __construct(
        private string $isbn,
        private string $titulo,
        private string $autor,
        private int $anio,
        private int $paginas = 0
    ) {
    }

    public function getIsbn(): string { return $this->isbn; }
    public function getTitulo(): string { return $this->titulo; }
    public function getAutor(): string { return $this->autor; }
    public function getAnio(): int { return $this->anio; }
    public function getPaginas(): int { return $this->paginas; }

    public function getFicha(): string
    {
        return $this->titulo . ' (' . $this->autor . ')';
    }
}
