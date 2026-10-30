<?php
declare(strict_types=1);
namespace Lib;
require_once FPDF_FILE;

// la clase hereda de fpdf para utilizar los métodos
class PDF extends \FPDF
{
    private string $subtitulo;

    public function __construct(string $subtitulo = ''){
        parent::__construct('P', 'mm', 'A4');
        $this->subtitulo = $subtitulo;
        $this->SetMargins(10, 10, 10);
        $this->SetAutoPageBreak(true, 20);
        $this->AliasNbPages();
    }

    public function t(string $texto): string{
        $resultado = iconv(
            'UTF-8',
            'ISO-8859-1//TRANSLIT',
            $texto
        );

        return $resultado === false ? $texto : $resultado;
    }

    public function Header(): void{
        if (defined('LOGO_FILE') && is_file(LOGO_FILE)) {
            $this->Image(LOGO_FILE, 10, 8, 22);
        }

        $this->SetY(10);
        $this->SetFont('Times', 'B', 18);
        $this->Cell(
            0, 10,
            $this->t('IES Ejemplo Granada'),
            0, 1, 'C'
        );

        $this->SetFont('Helvetica', 'I', 11);
        $this->Cell(
            0, 7,
            $this->t($this->subtitulo),
            0, 1, 'C'
        );

        $this->SetDrawColor(40, 70, 110);
        $this->SetLineWidth(0.6);
        $this->Line(10, 37, 200, 37);
        $this->Ln(14);
    }

    public function Footer(): void{
        $this->SetY(-15);
        $this->SetDrawColor(180, 180, 180);
        $this->Line(10, $this->GetY(), 200, $this->GetY());

        $this->SetY(-13);
        $this->SetFont('Courier', '', 9);
        $this->Cell(
            0, 8,
            $this->t('Página ' . $this->PageNo() . ' de {nb}'),
            0, 0, 'C'
        );
    }
}
