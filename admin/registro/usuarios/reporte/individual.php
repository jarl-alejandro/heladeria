<?php
session_start();

require('fpdf.php');
include "../../../../conexion.php";

date_default_timezone_set('America/Guayaquil');

class PDF extends FPDF {

//Cabecera de página

    function Header() {

       $this->Image('../../../../assets/img/logo.png',0, 0, 300, 42);


        $this->SetFont('Arial', 'B', 17);
        $this->SetTextColor(47, 47, 47);
        // $this->Text(80, 10, 'RIO TOACHI');

        $this->Ln(20);
        $this->Line(2, 42, 295, 42);

        $this->Text(100, 54, 'REGISTRO DE ROLES DE EMPLEADO');

        $this->SetFont('Arial', '', 10);
        $this->SetTextColor(47, 47, 47);
    }

//Body
    function TablaColores($header) {

// Colores, ancho de línea y fuente en negrita

        $this->SetFillColor(192, 192, 192);

        $this->SetTextColor(255);

        $this->SetLineWidth(.3);

        $this->SetFont('Arial', 'B');

        // Cabecera
        $w = array(30, 80, 170, 80);


        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'E', true);

        $this->Ln();

        $this->SetTextColor(0);

        $this->SetFont('Times');
    }
//Pie de página

    function Footer() {
        //Posición: a 1,5 cm del final
        $this->SetY(-15);

        //Arial italic 8
        $this->SetFont('Arial', 'I', 8);

        //Número de página
        $this->Cell(0, 10, 'Página ' . $this->PageNo() . '/Doce Coffe', 0, 0, 'E');
    }

}

$pdf = new PDF("L");
$pdf->AddPage();

$pdf -> SetY(60);
$header = array('CODIGO', 'EMPLEADO', 'ROL');

$pdf -> SetX(10);
$pdf->TablaColores($header);

$id = $_GET["id"];

$select = $pdo->query("SELECT * FROM vista_rol_empleado WHERE ced_empl='$id'");
$row = $select->fetch();

$pdf -> SetX(10);
$pdf->SetFont('Arial', '',10);

$pdf->Cell(30, 6.5, $row["ced_empl"], 1, 'E');
$pdf->Cell(80, 6.5, $row["nom_empl"]." ".$row["ape_empl"], 1, 'E');
$pdf->Cell(170, 6.5, $row['nom_rol'], 1, 'E');

$pdf->Ln();

$pdf->Ln();

$pdf->Output();
?>
