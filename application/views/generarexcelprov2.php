<?php
// Configurar encabezados HTTP para descargar el archivo
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=archivo_excel.xlsx');
header('Cache-Control: max-age=0');

// Inicio del documento XLSX
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";
echo '<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">' . "\n";
echo '<sheetData>' . "\n";

// Datos de ejemplo, reemplaza con tus propios datos
$ordencompra = [
    ['Dato 1', 'Dato 2'],
    ['Dato 3', 'Dato 4'],
];

// Escribir los datos en el archivo XLSX
foreach ($ordencompra as $row) {
    echo '<row>' . "\n";
    foreach ($row as $cell) {
        echo '<c><v>' . htmlspecialchars($cell) . '</v></c>' . "\n";
    }
    echo '</row>' . "\n";
}

// Fin del documento XLSX
echo '</sheetData>' . "\n";
echo '</worksheet>' . "\n";
