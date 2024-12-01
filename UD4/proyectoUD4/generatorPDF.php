<?php
// Importar la biblioteca FPDF
require('lib\fpdf.php');

// Conexión a la base de datos
$mysqli = new mysqli("localhost", "root", "", "dwes");

// Verificar conexión
if ($mysqli->connect_error) {
    die("Error en la conexión: " . $mysqli->connect_error);
}

// Consultar los datos de la tabla 'encuestas'
$query = "SELECT id, pregunta, respuesta_a, respuesta_b FROM encuestas";
$resultado = $mysqli->query($query);

// Crear un nuevo PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Título del documento
$pdf->Cell(0, 10, 'Lista de encuestas', 0, 1, 'C');
$pdf->Ln(10); // Salto de línea

// Encabezados de la tabla
$pdf->Cell(20, 10, 'ID', 1, 0, 'C');
$pdf->Cell(50, 10, 'pregunta', 1, 0, 'C');
$pdf->Cell(50, 10, 'respuesta_a', 1, 0, 'C');
$pdf->Cell(30, 10, 'respuesta_b', 1, 1, 'C');

// Agregar los datos a la tabla
while ($fila = $resultado->fetch_assoc()) {
    $pdf->Cell(20, 10, $fila['id'], 1, 0, 'C');
    $pdf->Cell(50, 10, $fila['pregunta'], 1, 0, 'C');
    $pdf->Cell(50, 10, $fila['respuesta_a'], 1, 0, 'C');
    $pdf->Cell(30, 10, $fila['respuesta_b'], 1, 1, 'C');
}

// Cerrar la conexión
$mysqli->close();

// Salida del PDF
$pdf->Output('D', 'encuesta.pdf');
?>