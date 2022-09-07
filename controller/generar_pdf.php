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

// Validación de datos enviados
  if (!empty($_POST)) {
    if (isset($_POST["nombre"]) && isset($_POST["documento"]) && isset($_POST["ndocumento"]) && isset($_POST["tema"]) && isset($_POST["fechaSondeo"])) {
      // Declaración de variables
      $nombre = $_POST["nombre"];
      $documento = $_POST["documento"];
      $ndocumento = $_POST["ndocumento"];
      $tema = $_POST["tema"];
      $fechaSondeo = $_POST["fechaSondeo"];
      $fechaActual = date("d-m-Y");

      if ($nombre != "" && $documento != "" && $ndocumento != "" && $tema != "" && $fechaSondeo != "") {

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
        $pdf->setSubTitulo($nombre.' identificado(a) con:');
        $pdf->setSubTitulo($documento.' No. '.$ndocumento);
        $pdf->setTexto('Participó en el sondeo de opinión ciudadana '.$tema.' realizado el día: '.$fechaSondeo);
        $pdf->setTexto('Este certificado se expide a solicitud del interesado el día: '.$fechaActual);

        // Archivo de salida
        $pdf->Output('','Certificado.pdf');
      } else {
        echo "Ocurrió un error, los campos no pueden llegar vacíos";
      }
    } else {
      echo "Ocurrió un error, algunos campos no se recibieron";
    }
  } else {
    echo "Ocurrió un error, no se recibieron los datos";
  }
?>
