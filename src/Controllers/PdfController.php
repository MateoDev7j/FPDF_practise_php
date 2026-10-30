<?php
declare(strict_types=1);

namespace Controllers;

use Lib\PDF;
use Models\Libros;

class PdfController
{
    public function generar(): void
    {
        $libros = (new Libros())->getLibros();

        $pdf = new PDF('Catálogo oficial de libros');
        $pdf->AddPage();

        // Título
        $pdf->SetTextColor(107, 63, 29);
        $pdf->SetFont('Times', 'B', 17);
        $pdf->Cell(0, 12, $pdf->t('CATÁLOGO DE LIBROS'), 0, 1, 'C');
        $pdf->Ln(2);

        // Información del catálogo
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Helvetica', '', 11);
        $pdf->Cell(30, 8, $pdf->t('Sección:'), 0, 0);
        $pdf->SetFont('Helvetica', 'B', 11);
        $pdf->Cell(65, 8, $pdf->t('Literatura española'), 0, 0);
        $pdf->SetFont('Helvetica', '', 11);
        $pdf->Cell(30, 8, $pdf->t('Año:'), 0, 0);
        $pdf->SetFont('Helvetica', 'B', 11);
        $pdf->Cell(0, 8, $pdf->t(date('Y')), 0, 1);
        $pdf->Ln(5);

        // Cabecera de la tabla
        $dibujarCabecera = static function () use ($pdf): void {
            $pdf->SetFillColor(107, 63, 29);
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetDrawColor(210, 200, 185);
            $pdf->SetFont('Helvetica', 'B', 10);
            $pdf->Cell(12, 10, $pdf->t('Nº'), 1, 0, 'C', true);
            $pdf->Cell(80, 10, $pdf->t('Título'), 1, 0, 'L', true);
            $pdf->Cell(60, 10, $pdf->t('Autor'), 1, 0, 'L', true);
            $pdf->Cell(18, 10, $pdf->t('Año'), 1, 0, 'C', true);
            $pdf->Cell(20, 10, $pdf->t('Páginas'), 1, 1, 'C', true);
        };
        $dibujarCabecera();

        $pdf->SetFont('Helvetica', '', 10);
        $pdf->SetTextColor(35, 35, 35);

        foreach ($libros as $i => $libro) {
            if ($pdf->GetY() + 9 > 277) {
                $pdf->AddPage();
                $dibujarCabecera();
                $pdf->SetFont('Helvetica', '', 10);
                $pdf->SetTextColor(35, 35, 35);
            }
            $par = $i % 2 === 0;
            $pdf->SetFillColor($par ? 248 : 255, $par ? 240 : 255, $par ? 226 : 255);
            $pdf->Cell(12, 9, (string) ($i + 1), 1, 0, 'C', true);
            $pdf->Cell(80, 9, $pdf->t($libro->getTitulo()), 1, 0, 'L', true);
            $pdf->Cell(60, 9, $pdf->t($libro->getAutor()), 1, 0, 'L', true);
            $pdf->Cell(18, 9, (string) $libro->getAnio(), 1, 0, 'C', true);
            $pdf->Cell(20, 9, (string) $libro->getPaginas(), 1, 1, 'C', true);
        }

        $pdf->Ln(5);
        $pdf->SetFont('Times', 'I', 10);
        $pdf->SetTextColor(80, 80, 80);
        $pdf->Cell(0, 8, $pdf->t('Total de libros: ' . count($libros)), 0, 1, 'R');

        $pdf->Output('I', 'catalogo_libros.pdf');
        exit;
    }
}
