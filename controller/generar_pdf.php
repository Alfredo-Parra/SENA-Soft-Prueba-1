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

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AddPage();

// Configuración del documento
$pdf->SetTitle(utf8_decode('Certificado de Participación'));
$pdf->SetAuthor('SONDEOS OPINIÓN CIUDADANA');
$pdf->SetCreator('Alfredo Parra, Josep Jacome');

// Agregar contenido
$pdf->setTitulo('Certificado de Participación');
$pdf->setTexto('La presente entidad encargada del proceso de recolección de información a través de sondeos de opinión ciudadana, hace constar que el ciudadano(a):');
$pdf->setSubTitulo('NOMBRE USUARIO'.' identificado(a) con:');
$pdf->setSubTitulo('TIPO DOCUMENTO'.' No. '.'NUMERO DOCUMENTO');
$pdf->setTexto('Participó en el sondeo de opinión ciudadana '.'Nombre_Sondeo'.' realizado el día: '.'2021-05-05');
$pdf->setTexto('Este certificado se expide a solicitud del interesado el día: '.'2021-05-05');

// Archivo de salida
$pdf->Output('','Certificado.pdf');

?>
