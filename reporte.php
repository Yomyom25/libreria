<?php
require('fpdf/fpdf.php');
require('conn.php'); // tu conexión a MySQL

class PDF extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image('img/logo.jpg', 10, 6, 30); // Ajusta según el logo que tengas
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, utf8_decode('Reporte de Libros'), 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        // Pie de página
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, utf8_decode('Pág. ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->Cell(0, 10, date('d-m-Y'), 0, 0, 'R');
    }

    function FancyTable($header, $data)
    {
        // Colores
        $this->SetFillColor(255, 102, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(255, 255, 255);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial', 'B', 10);

        // Cabecera
        $w = array(45, 40, 20, 35, 50); // Anchos de las columnas
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, utf8_decode($header[$i]), 1, 0, 'C', true);
        $this->Ln();

        // Restaurar colores y fuente
        $this->SetFillColor(255);
        $this->SetTextColor(0);
        $this->SetFont('Arial', '', 9);

        // Datos
        foreach ($data as $row) {
            $this->Cell($w[0], 6, utf8_decode($row[0]), 'LR', 0, 'L');
            $this->Cell($w[1], 6, utf8_decode($row[1]), 'LR', 0, 'L');
            $this->Cell($w[2], 6, $row[2], 'LR', 0, 'C');
            $this->Cell($w[3], 6, utf8_decode($row[3]), 'LR', 0, 'L');
            $this->Cell($w[4], 6, utf8_decode($row[4]), 'LR', 0, 'L');
            $this->Ln();
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

// Consulta a la base de datos
$sql = "SELECT titulo_libro, nombre_autor, anio, editorial, nombre_carrera
        FROM libros 
        INNER JOIN autores ON libros.autor = autores.ID_autor 
        INNER JOIN carreras ON libros.carrera = carreras.ID_carrera";

$resultado = mysqli_query($conectar, $sql);

$data = [];
while ($row = mysqli_fetch_array($resultado)) {
    $data[] = [$row['titulo_libro'], $row['nombre_autor'], $row['anio'], $row['editorial'], $row['nombre_carrera']];
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->FancyTable(['Libro', 'Autor', 'Año', 'Editorial', 'Carreras'], $data);
$pdf->Output();
?>
