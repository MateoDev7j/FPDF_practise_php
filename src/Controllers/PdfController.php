<?php
declare(strict_types=1);

namespace Controllers;

use Lib\PDF;
use Models\Alumnos;

class PdfController
{
    public function generar(): void
    {
        // Obtener los alumnos del modelo
        $modelo = new Alumnos();
        $alumnos = $modelo->getAlumnos();

        $pdf = new PDF('Listado oficial de alumnos');
        $pdf->AddPage();

        // Título
        $pdf->SetTextColor(35, 55, 85);
        $pdf->SetFont('Times', 'B', 17);
        $pdf->Cell(
            0, 12,
            $pdf->t('LISTADO DE ALUMNOS'),
            0, 1, 'C'
        );

        $pdf->Ln(2);

        // Información académica
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Helvetica', '', 11);

        $pdf->Cell(30, 8, $pdf->t('Grupo:'), 0, 0);
        $pdf->SetFont('Helvetica', 'B', 11);
        $pdf->Cell(65, 8, $pdf->t('2º DAW'), 0, 0);

        $pdf->SetFont('Helvetica', '', 11);
        $pdf->Cell(30, 8, $pdf->t('Curso:'), 0, 0);
        $pdf->SetFont('Helvetica', 'B', 11);
        $pdf->Cell(0, 8, $pdf->t('2026-2027'), 0, 1);

        $pdf->Ln(5);

        // Cabecera de la tabla
        $dibujarCabecera = static function () use ($pdf): void {
            $pdf->SetFillColor(35, 55, 85);
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetDrawColor(210, 215, 220);
            $pdf->SetFont('Helvetica', 'B', 10);

            $pdf->Cell(15, 10, 'Nº', 1, 0, 'C', true);
            $pdf->Cell(55, 10, $pdf->t('Nombre'), 1, 0, 'L', true);
            $pdf->Cell(80, 10, $pdf->t('Apellidos'), 1, 0, 'L', true);
            $pdf->Cell(40, 10, $pdf->t('Edad'), 1, 1, 'C', true);
        };

        $dibujarCabecera();

        // Filas obtenidas del modelo
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->SetTextColor(35, 35, 35);

        foreach ($alumnos as $indice => $alumno) {
            if ($pdf->GetY() + 9 > 277) {
                $pdf->AddPage();
                $dibujarCabecera();
                $pdf->SetFont('Helvetica', '', 10);
                $pdf->SetTextColor(35, 35, 35);
            }

            $pdf->SetFillColor(
                $indice % 2 === 0 ? 235 : 255,
                $indice % 2 === 0 ? 241 : 255,
                $indice % 2 === 0 ? 247 : 255
            );

            $pdf->Cell(
                15, 9, (string) ($indice + 1),
                1, 0, 'C', true
            );

            $pdf->Cell(
                55, 9, $pdf->t($alumno->getNombre()),
                1, 0, 'L', true
            );

            $pdf->Cell(
                80, 9, $pdf->t($alumno->getApellidos()),
                1, 0, 'L', true
            );

            $pdf->Cell(
                40, 9, (string) $alumno->getEdad(),
                1, 1, 'C', true
            );
        }

        // Total de alumnos
        $pdf->Ln(5);
        $pdf->SetFont('Times', 'I', 10);
        $pdf->SetTextColor(80, 80, 80);
        $pdf->Cell(
            0, 8,
            $pdf->t('Total de alumnos: ' . count($alumnos)),
            0, 1, 'R'
        );

        // Mostrar en el navegador
        $pdf->Output('I', 'listado_alumnos.pdf');
        exit;
    }
}
