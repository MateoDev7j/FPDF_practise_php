<?php
declare(strict_types=1);

namespace Lib;

require_once FPDF_FILE;

/**
 * Herramienta (como Pages, pero para PDF): hereda de FPDF y define
 * lo que se repite en TODAS las páginas: cabecera con logo y pie con nº de página.
 * No sabe nada de alumnos: el contenido lo pone la vista.
 */
class PDF extends \FPDF   // \FPDF con barra: la clase FPDF no tiene namespace
{
    public function __construct(private string $subtitulo = '')
    {
        parent::__construct();   // A4, vertical, milímetros
        $this->AliasNbPages();   // {nb} = total de páginas
    }

    // FPDF solo entiende ISO-8859-1: convierte tildes y ñ. Público para usarlo en la vista.
    public function t(string $texto): string
    {
        return iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $texto);
    }

    // FPDF lo llama solo cada vez que se crea una página (AddPage)
    public function Header(): void
    {
        $this->Image(LOGO_FILE, 10, 8, 25);
        $this->SetFont('Times', 'B', 20);
        $this->Cell(0, 10, $this->t('IES Ejemplo Madrid'), 0, 1, 'C');
        $this->SetFont('Helvetica', 'I', 11);
        $this->Cell(0, 6, $this->t($this->subtitulo), 0, 1, 'C');
        $this->Ln(15);
    }

    // FPDF lo llama solo al terminar cada página
    public function Footer(): void
    {
        $this->SetY(-15);
        $this->SetFont('Courier', '', 9);
        $this->Cell(0, 10, $this->t('Página ' . $this->PageNo() . ' de {nb}'), 0, 0, 'C');
    }
}
