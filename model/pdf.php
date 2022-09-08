<?php

require('../utilidades/fpdf.php');

class PDF extends FPDF
{
protected $fontName = 'Times';
// Cabecera de página

function setTitulo($text)
{
// Establecer espacio superior
$this->Ln(20);
// Establecer fuente
$this->SetFont($this->fontName,'B',20);
// Movernos a la derecha
$this->Cell(80);
// Título
$this->Cell(30, 10, utf8_decode($text),0,0,'C');
// Salto de línea
$this->Ln(25);
}

function setSubTitulo($text)
{
$this->SetFont($this->fontName,'B',14);
// Movernos a la derecha
$this->Cell(80);
// Subtítulo
$this->Cell(30, 10, utf8_decode($text),0,0,'C');
// Salto de línea
$this->Ln();
}

function setTexto($text)
{
// Salto de línea
$this->Ln();
// Establecer fuente
$this->SetFont($this->fontName,'',14);
// Movernos a la derecha
$this->Cell(10);
// Texto
$this->MultiCell(0, 7, utf8_decode($text), 0, 1,);
// Salto de línea
$this->Ln();
}

}
?>
