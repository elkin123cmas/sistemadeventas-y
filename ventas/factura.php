<?php
require_once('../app/TCPDF-main/tcpdf.php');
include('../app/config.php');

$id_venta = $_GET['id_venta'];
$nro_venta = $_GET['nro_venta'];

// ✅ **Configurar PDF para Ticket (75mm ancho, altura ajustable)**
$pdf = new TCPDF('P', 'mm', array(75, 200), true, 'UTF-8', false);

// Configurar información del documento
$pdf->SetCreator('Gestión 180');
$pdf->SetAuthor('Gestión 180');
$pdf->SetTitle('Factura de Venta');
$pdf->SetSubject('Factura');
$pdf->SetKeywords('Factura, Venta, Ticket');

// **Deshabilitar encabezado y pie de página**
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Agregar página
$pdf->AddPage();

// ✅ **ENCABEZADO: Logo y Datos de la Empresa**
$logo = '../app/assets/logo.png'; // Ruta del logo
$pdf->Image($logo, 15, 5, 45);
$pdf->Ln(18);

$pdf->SetFont('helvetica', 'B', 12);
$pdf->SetTextColor(0, 102, 204);
$pdf->Cell(0, 5, 'Gestión 180 S.A.', 0, 1, 'C');

$pdf->SetFont('helvetica', '', 9);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(0, 5, 'Calle Principal #123, Ciudad', 0, 1, 'C');
$pdf->Cell(0, 5, 'Tel: +123 456 789', 0, 1, 'C');
$pdf->Ln(5);

// ✅ **DATOS DE LA FACTURA**
$pdf->SetFont('helvetica', 'B', 10);
$pdf->SetTextColor(0, 153, 51);
$pdf->Cell(0, 5, 'Factura N°: ' . $nro_venta, 0, 1, 'L');

$pdf->SetFont('helvetica', '', 9);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(0, 5, 'Fecha: ' . date('d/m/Y H:i:s'), 0, 1, 'L');
$pdf->Cell(0, 5, 'Cliente: Juan Pérez', 0, 1, 'L');
$pdf->Ln(3);

// ✅ **LISTA DE PRODUCTOS SIN TABLAS**
$productos = [
    ["nombre" => "Producto A", "cantidad" => 2, "precio" => 10000],
    ["nombre" => "Producto B", "cantidad" => 1, "precio" => 15000],
    ["nombre" => "Producto C", "cantidad" => 3, "precio" => 8000]
];

$pdf->SetFont('helvetica', '', 9);
$total = 0;

foreach ($productos as $producto) {
    $subtotal_producto = $producto['cantidad'] * $producto['precio'];
    $total += $subtotal_producto;

    $pdf->Cell(0, 5, "{$producto['cantidad']}x {$producto['nombre']}", 0, 1, 'L');
    $pdf->Cell(0, 5, number_format($subtotal_producto, 0, ',', '.') . ' $', 0, 1, 'R');
}

// ✅ **CALCULOS DE IVA Y TOTAL**
$subtotal_sin_iva = $total / 1.19;
$iva = $total - $subtotal_sin_iva;

$pdf->Ln(3);
$pdf->SetLineWidth(0.2);
$pdf->SetDrawColor(0, 102, 204);
$pdf->Line(10, $pdf->GetY(), 65, $pdf->GetY());
$pdf->Ln(3);

$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(40, 5, 'Subtotal:', 0, 0, 'L');
$pdf->Cell(0, 5, number_format($subtotal_sin_iva, 0, ',', '.') . ' $', 0, 1, 'R');

$pdf->SetFont('helvetica', 'B', 9);
$pdf->SetTextColor(0, 153, 51);
$pdf->Cell(40, 5, 'IVA (19%):', 0, 0, 'L');
$pdf->Cell(0, 5, number_format($iva, 0, ',', '.') . ' $', 0, 1, 'R');

$pdf->SetFont('helvetica', 'B', 11);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(40, 5, 'Total a Pagar:', 0, 0, 'L');
$pdf->SetFillColor(204, 255, 204);
$pdf->Cell(0, 5, number_format($total, 0, ',', '.') . ' $', 0, 1, 'R', true);
$pdf->Ln(5);

// ✅ **CÓDIGO QR**
$qr_data = "Factura N°: $nro_venta\nTotal: " . number_format($total, 0, ',', '.') . " $\nFecha: " . date('d/m/Y H:i:s') . "\nCliente: Juan Pérez\nwww.miempresa.com/verificar_factura.php?id=$id_venta";

$pdf->write2DBarcode($qr_data, 'QRCODE,L', 20, $pdf->GetY(), 35, 35, [], 'N');
$pdf->Ln(40);

// ✅ **PIE DE PÁGINA**
$pdf->SetFont('helvetica', 'I', 8);
$pdf->SetTextColor(100, 100, 100);
$pdf->Cell(0, 5, 'Gracias por su compra. ¡Vuelva pronto!', 0, 1, 'C');

// ✅ **Generar y mostrar PDF (para imprimir)**
$pdf->Output('ticket.pdf', 'I');
