<?php
$prevNombreTienda = null; // Inicializamos la variable para el seguimiento
$tiendaIndex = 0; // Inicializamos un índice para recorrer $tiendas

foreach ($resultados as $row) {
    // Si el valor de nombre_tienda cambia, abrimos una nueva fila para la información de la tienda
    if ($prevNombreTienda !== $row['nombre_tienda']) {
        // Cerramos la fila anterior (si había una abierta) y abrimos una nueva fila
        if ($prevNombreTienda !== null) {
            echo '</tr>';
        }
        echo '<tr>';

        // Insertamos las celdas de encabezado de la tienda
        echo '<th style="border: 1px solid black; padding: 8px; text-align: center; color: black;">' . $tiendas[$tiendaIndex]['numerodetienda'] . '</th>';
        echo '<th style="border: 1px solid black; padding: 8px; text-align: center; color: black;">' . $tiendas[$tiendaIndex]['nombre'] . '</th>';
        echo '<th style="border: 1px solid black; padding: 8px; text-align: center; color: black;">' . $tiendas[$tiendaIndex]['año'] . '</th>';
        echo '<th style="border: 1px solid black; padding: 8px; text-align: center; color: black;">' . $tiendas[$tiendaIndex]['construccion'] . '</th>';
        echo '<th style="border: 1px solid black; padding: 8px; text-align: center; color: black;">' . $tiendas[$tiendaIndex]['local'] . '</th>';
        echo '<th style="border: 1px solid black; padding: 8px; text-align: center; color: black;">' . $tiendas[$tiendaIndex]['deptos'] . '</th>';
        echo '<th style="border: 1px solid black; padding: 8px; text-align: center; color: black;">' . $tiendas[$tiendaIndex]['m2pisoventa'] . '</th>';
        echo '<th style="border: 1px solid black; padding: 8px; text-align: center; color: black;">' . $tiendas[$tiendaIndex]['m2bodega'] . '</th>';

        // Incrementamos el índice para obtener la siguiente tienda en $tiendas
        $tiendaIndex++;
    }

    // Imprimimos los registros de cada tienda horizontalmente en la misma fila
    echo '<th style="border: 1px solid black; padding: 8px; text-align: center; color: black;">' . $row['suma_piezas'] . '</th>';
    $prevNombreTienda = $row['nombre_tienda']; // Actualizamos el valor previo
}
// Cerramos la última fila (si no se cerró antes)
if ($prevNombreTienda !== null) {
    echo '</tr>';
}
