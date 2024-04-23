<!--***********************Paneles**********************-->


<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel" style="background-color:#E1E1E1">
            <h4 class="mb">PANELES</h4>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h5 class="mb">MOBILIARIO DE PISO</h5>
                        <table class="table">
                            <thead>
                                <tr style="width:100%; justify-content: center; text-align: center">
                                    <th style="text-align: center; color: black">DESC. PRODUCTO</th>
                                    <th style="text-align: center; color: black">PRECIO MXN</th>
                                    <th style="text-align: center; color: black">UNIDAD</th>
                                    <th style="text-align: center; color: black">CANTIDAD</th>
                                    <th style="text-align: center; color: black">SUBTOTAL</th>
                                    <th style="text-align: center; color: black">OBSERVACIONES</th>
                                    <th style="text-align: center; color: black">DETALLE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($panmpiso as $panmpi) {
                                ?>
                                    <tr id="rowproducto<?= $panmpi->id ?>" style="justify-content: center; text-align: center">
                                        <td style="font-size: 1.5em; color: black"><?= $panmpi->nombre ?></td>
                                        <td>
                                            <form action="<?= base_url() ?>Dashboard/actualizarPrecio2" method="post">
                                                <input type="hidden" name="id" value="<?= $panmpi->id ?>">
                                                <input size="10" style="font-size: 1.3em; color: black" type="text" name="precio" value="<?= $panmpi->precio ?>">
                                                <button type="submit" class="btn btn-light fa fa-save fa-lg" style="color: #000000; cursor: pointer"></button>
                                            </form>
                                        </td>
                                        <td style="font-size: 1.5em; color: black"><?= $panmpi->unidad ?></td>
                                        <td>
                                            <form action="<?= base_url() ?>Dashboard/actualizarPiezaYSubtotal" method="post">
                                                <input type="hidden" name="id" value="<?= $panmpi->id ?>">
                                                <input size="10" style="font-size: 1.3em; color: black" type="numeric" name="pieza" value="<?= $panmpi->pieza ?>">
                                                <input type="hidden" size="8" style="font-size: 1.1em; color: black" name="subtotal" value="<?= $panmpi->subtotal = $panmpi->precio * $panmpi->pieza ?>">
                                                <input type="hidden" size="8" style="font-size: 1.1em; color: black" name="subtotal" value="<?= $panmpi->subtotal ?>">
                                                <button type="submit" class="btn btn-light fa fa-save fa-lg" style="color: #000000; cursor: pointer"></button>
                                            </form>
                                        </td>
                                        <td style="font-size: 1.5em; color: black" name="subtotal">$ <?= $panmpi->subtotal ?> MXN</td>
                                        <td style="font-size: 1.3em; color: black"><?= $panmpi->observaciones ?>
                                            <form action="<?= base_url() ?>Dashboard/actualizarObservaciones" method="post">
                                                <input type="hidden" name="id" value="<?= $panmpi->id ?>">
                                                <input type="text" name="observaciones" value="">
                                                <button type="submit" class="btn btn-light fa fa-save fa-lg" style="color: #000000; cursor: pointer"></button>
                                            </form>
                                        </td>
                                        <td style="font-size: 2.3em"><i class="enviarpapelera fa fa-trash-o" style="color: #000000; cursor: pointer" id="producto-<?= $panmpi->id ?>"></i></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <thead>
                                <tr>
                                    <td style="font-size: 1.5em; color: black">Total</td>
                                    <td style="font-size: 1.5em; color: black">$ <? ?> MXN</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
foreach ($imgnoaplica as $imgna) {
?>
    <tr id="rowproducto<?= $imgna->id ?>" style="justify-content: center; text-align: center">
        <td style="font-size: 1.5em; color: black"><input type="hidden" size="5" value="<?= $imgna->id ?>"> <?= $imgna->nombre ?></td>
        <td>
            <input size="10" style="font-size: 1.3em; color: black" type="text" name="precioimgna[]" onchange="GetTotalimgna(); calculaherrajes(); calculamuebles(); calculaextras(); calculatotalmueherextintytrapopman(); calculatotalentrevalorantespreciototal(); calculatotalmueherext(); calculatotalentrevalorantespreciototal2(); getanticipo(); gettotaliva(); getanticipoiva(); gettotaltiendatotal(); gettotaltiendaanticipo(); getfiniquito(); getPorcentajes()" value="<?= $imgna->precio ?>">
        </td>

        <td style="font-size: 1.3em; color: black">
            <input type="text" name="observacionesimgna[]" value="<?= $imgna->observaciones ?>">
        </td>
        <td style="font-size: 2.3em"><i class="enviarpapelera fa fa-trash-o" style="color: #000000; cursor: pointer" id="producto-<?= $imgna->id ?>"></i></td>
    </tr>
<?php
}
?>






<?php
                            foreach ($mobiliarioproductosdamaycaballero as $mpdc) {
                            ?>
                                
                                    <th class="tablasumapiezasdamcabpiso" style="padding: 15px; color: black; background-color: #BCFFF6;">
                                        <!--******************************TRAE POR COLUMNA DE PRODUCTOS DAMA Y CABALLERO PISO EL NOMBRE Y ID DEL PRODUCTO AZUL CLARO******************************-->
                                        <input type="text" size="5" name="mobproductosidsdmmobpiso[]" style="background-color: #AFAFFF;" value="<?= $mpdc->id ?>">
                                        <input type="text" size="20" name="mobproductosnombresdmmobpiso[]" style="background-color: #AFAFFF;" value="<?= $mpdc->nombre ?>">
                                        <!--******************************TRAE POR COLUMNA DE PRODUCTOS DAMA Y CABALLERO PISO EL NOMBRE DE LA TIENDA POR FILA AZUL CLARO******************************-->
                                        <input type="text" size="20" name="mobtiendasnombredmmobpiso[]" style="background-color: #D2FFB3;" value="<?= $tnd->nombre ?>">
                                        <button type="submit">x</button>
                                    </th>
                                
                            <?php
                            }
                            ?>






<!--********************************************************autocomplete*********************************************************-->

<input class="auto_complete" type="text" value="" placeholder="in 1">
<input class="auto_complete" type="text" value="" placeholder="in 2">
<script>
    $(document).ready(function(){
        $(".auto_complete").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "<?= base_url() ?>Dashboard/busca_prods_catalogo",
                    dataType: "json",
                    type: 'get',
                    data: {
                        term: request.term,
                        timestamp: new Date().getTime()
                    },
                    success: function(data) {
                        response(data);
                    },
                    error: function(){
                        console.log('errror')
                    }
                });
            },
            minLength: 1
        });
    });
</script>

















<?php
// Suponiendo que $resultados es un array de objetos
$resultados = array_map(function ($rs) {
    return $rs->id;
}, $resultados);

$chunks = array_chunk($resultados, 9);

foreach ($chunks as $index => $chunk) {
    $commaSeparated = implode(', ', $chunk);
    echo '<input type="text" size="40" id="resultadoInput' . ($index + 1) . '" name="resultadoInput' . ($index + 1) . '" value="' . $commaSeparated . '" />';
    echo '<button id="' . ($index + 1) . '" class="subconsulta">subconsulta</button>';
}
?>
<script>
    $(document).ready(function() {
        $('.subconsulta').click(function() {
            var input_values = $(this).attr('id');
            var resultadoInput = $('#resultadoInput' + input_values).val();
            console.log(resultadoInput);
            $.ajax({
                url: '<?= base_url() ?>Dashboard/consulta_Mobiliario_Por_Anio_Tienda_info',
                type: 'POST',
                dataType: "html",
                //dataType: "json",
                data: {
                    resultadoInput: resultadoInput
                },
                success: function(data) {
                    console.log('Datos Enviados!');
                    $('#area_consulta_3').html(data);
                },
                error: function(error) {
                    console.error('Error: ', error);
                }
            });
        });
    });
</script>
























<!--*******************************************MOBILIARIOS**************************************************-->
<!--*****************************TIENDA********************************-->

<!--
<?php
// Crear un array para almacenar los datos agrupados por id_producto
$productos_agrupados = array();

// Iterar sobre los resultados y agrupar los nombres y el id_dt por id_producto
foreach ($resultados as $row) {
    $id_producto = $row['id_producto'];
    $nombre_producto = $row['suma_piezas'];
    $id_dt = $row['id_dt']; // Nuevo campo id_dt

    // Verificar si ya existe el id_producto en el array, si no existe, crear un array vacío para almacenar los datos
    if (!isset($productos_agrupados[$id_producto])) {
        $productos_agrupados[$id_producto] = array();
    }

    // Agregar los datos al array correspondiente al id_producto
    $productos_agrupados[$id_producto][] = array('nombre' => $nombre_producto, 'id_dt' => $id_dt);
}
?>
<tr>
    <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $tiendas[0]->numerodetienda; ?></th>
    <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $tiendas[0]->nombre; ?></th>
    <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $tiendas[0]->año; ?></th>
    <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $tiendas[0]->construccion; ?></th>
    <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $tiendas[0]->local; ?></th>
    <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $tiendas[0]->deptos; ?></th>
    <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $tiendas[0]->m2pisoventa; ?></th>
    <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $tiendas[0]->m2bodega; ?></th>
    <?php foreach ($productos_agrupados as $id_producto => $datos) { ?>
        <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;">
            <div>
                <?php foreach ($datos as $dato) { ?>
                    <div>
                        <?php if (empty($dato['id_dt'])) { ?>
                            <?php echo $dato['nombre']; ?>
                        <?php } else { ?>
                            <input type="number" min="1" mas="1000" style="width: 40px; border: none; background: transparent" value="<?php echo $dato['nombre']; ?>" class="valor_mobiliario_x_id_tnd">
                            <img src="<?= base_url() ?>assets/img/save_changues_1.png" width="20px" class="update_val_mobiliario_x_id_tnd" data_id_value_mobiliario="<?php echo $dato['id_dt']; ?>">
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </th>
    <?php } ?>
</tr>
-->

























<!-- ************************AÑO*************************

<?php
$prevNombreTienda = null; // Inicializamos la variable para el seguimiento
$tiendaIndex = 0; // Inicializamos un índice para recorrer $tiendas
$productos_agrupados_por_tienda = []; // Array para almacenar productos agrupados por tienda

// Iterar sobre los resultados y agrupar los nombres y el id_dt por nombre_tienda
foreach ($resultados as $row) {
    $nombre_tienda = $row['nombre_tienda'];
    $suma_piezas = $row['suma_piezas'];
    $id_dt = $row['id_dt']; // Nuevo campo id_dt

    // Verificar si ya existe el nombre_tienda en el array, si no existe, crear un array vacío para almacenar los datos
    if (!isset($productos_agrupados_por_tienda[$nombre_tienda])) {
        $productos_agrupados_por_tienda[$nombre_tienda] = [];
    }

    // Agregar los datos al array correspondiente al nombre_tienda
    $productos_agrupados_por_tienda[$nombre_tienda][] = ['suma_piezas' => $suma_piezas, 'id_dt' => $id_dt];
}
?>

<?php foreach ($productos_agrupados_por_tienda as $nombre_tienda => $productos) { ?>
    <tr>
        <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?= $tiendas[$tiendaIndex]['numerodetienda'] ?></th>
        <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?= $tiendas[$tiendaIndex]['nombre'] ?></th>
        <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?= $tiendas[$tiendaIndex]['año'] ?></th>
        <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?= $tiendas[$tiendaIndex]['construccion'] ?></th>
        <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?= $tiendas[$tiendaIndex]['local'] ?></th>
        <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?= $tiendas[$tiendaIndex]['deptos'] ?></th>
        <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?= $tiendas[$tiendaIndex]['m2pisoventa'] ?></th>
        <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?= $tiendas[$tiendaIndex]['m2bodega'] ?></th>


        <?php foreach ($productos as $producto) { ?>
            <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;">
                <div>
                    <?php if (empty($producto['id_dt'])) { ?>
                        <?= $producto['suma_piezas'] ?>
                    <?php } else { ?>
                        <input type="number" min="1" max="1000" style="width: 40px; border: none; background: transparent" value="<?= $producto['suma_piezas'] ?>" class="valor_mobiliario_x_id_tnd">
                        <img src="<?= base_url() ?>assets/img/save_changues_1.png" width="20px" class="update_val_mobiliario_x_id_tnd" data_id_value_mobiliario="<?= $producto['id_dt'] ?>">
                    <?php } ?>
                </div>
            </th>
        <?php } ?>

    </tr>
    <?php $tiendaIndex++; ?>
<?php } ?>
-->
















<!--
<?php
$prevNombreTienda = null; // Variable para seguimiento del cambio en nombre_tienda
$tiendaIndex = 0; // Índice para recorrer $tiendas
$datosPorTienda = array(); // Almacenar los datos agrupados por tienda

// Iterar sobre los resultados y agrupar por nombre_tienda
foreach ($resultados as $row) {
    $nombre_tienda = $row['nombre_tienda'];
    $id_dt = $row['id_dt'];
    $suma_piezas = $row['suma_piezas'];

    // Verificar si ya existe la entrada para esta tienda
    if (!isset($datosPorTienda[$nombre_tienda])) {
        $datosPorTienda[$nombre_tienda] = array();
    }

    // Agregar los datos al array correspondiente a la tienda
    $datosPorTienda[$nombre_tienda][$id_dt] = $suma_piezas;
}

// Iterar por las tiendas y generar las filas
foreach ($datosPorTienda as $nombre_tienda => $datos) {
    // Si el nombre de la tienda cambia, crear una nueva fila
    if ($prevNombreTienda !== $nombre_tienda) {
        // Cerrar la fila anterior (si existe)
        if ($prevNombreTienda !== null) {
            echo '</tr>';
        }
        echo '<tr>';

        // Insertar celdas para el nombre de la tienda
        echo '<td style="border: 1px solid black; padding: 8px; text-align: center; color: black;">' . $nombre_tienda . '</td>';
    }

    // Iterar sobre los datos de cada tienda para las celdas correspondientes
    foreach ($datos as $id_dt => $suma_piezas) {
        echo '<td style="border: 1px solid black; padding: 8px; text-align: center; color: black;">' . $suma_piezas . '</td>';
    }

    $prevNombreTienda = $nombre_tienda; // Actualizar el nombre de la tienda previa
}

// Cerrar la última fila (si es que no se cerró antes)
if ($prevNombreTienda !== null) {
    echo '</tr>';
}
?>
-->