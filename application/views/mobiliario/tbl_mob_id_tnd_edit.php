<?php
// Crear un array para almacenar los datos agrupados por id_producto
$productos_agrupados = array();

// Iterar sobre los resultados y agrupar los nombres y el id_dt por id_producto
foreach ($resultados as $row) {
    $id_producto = $row['id_producto'];
    $nombre_producto = $row['suma_piezas'];
    $id_dt = $row['id_dt']; // Nuevo campo id_dt //id de producto original
    $id_dt_comp = $row['id_dt_comp']; //id de producto existente en detalle de compras

    // Verificar si ya existe el id_producto en el array, si no existe, crear un array vacío para almacenar los datos
    if (!isset($productos_agrupados[$id_producto])) {
        $productos_agrupados[$id_producto] = array();
    }

    // Agregar los datos al array correspondiente al id_producto
    $productos_agrupados[$id_producto][] = array('nombre' => $nombre_producto, 'id_dt' => $id_dt, 'id_dt_comp' => $id_dt_comp);
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
                            <img style="cursor:pointer" src="<?= base_url() ?>assets/img/save_changues_1.png" width="20px" class="update_pieza_prod_tnd" data_id_value_mobiliario="<?php echo $dato['id_dt_comp']; ?>">
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </th>
    <?php } ?>
</tr>

