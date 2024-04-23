<tr>
    <?php
    $lenght = sizeof($products_length);
    $chunks = array_chunk($resultados, $lenght); // Dividir las filas de tiendas por numero total de productos,la consulta se encarga de estrcuturar los datos
    foreach ($chunks as $chunk) {
        echo '<tr>';
        foreach ($chunk as $row) {
            echo '<th style="border: 1px solid black; padding: 8px; text-align: center; color: black;">';
            echo '<div style="cursor:pointer" class="show_info_prod_orden" data_id_prod="'. $row['id_prod'] .'" data_name_tnd="'. $row['nom_tnd_dt'] .'">' . $row['nom_tnd_dt'] . '</div>';
            echo '<div class="response_piezas_prod_tnd"></div>';
            echo '</th>';
        }
        echo '</tr>';
    }
    ?>
</tr>