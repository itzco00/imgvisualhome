<table style="width: 100%; text-align: center; border: 1px solid #ddd;">
    <?php if ($sumasprod !== NULL) { ?>
        <!-- Encabezados -->
        <tr>
            <th colspan="8" style="padding: 10px; border: 1px solid black;color:black; width: 100px; box-sizing: border-box;">
                <img src="<?= base_url() ?>assets/img/profile3.png" style=" width: 600px;">
            </th>
            <?php $productos = array(); ?>
            <?php foreach ($sumasprod as $fila) { ?>
                <?php $nombreProducto = $fila['nombre_producto']; ?>
                <?php if (!in_array($nombreProducto, $productos)) { ?>
                    <th style="padding: 10px; border: 1px solid black;color:black; width: 100px; box-sizing: border-box;">
                        <?php echo $nombreProducto; ?>
                    </th>
                    <?php $productos[] = $nombreProducto; ?>
                <?php } ?>
            <?php } ?>
        </tr>

        <!-- Fila para archivo_producto -->
        <tr>
            <th style="padding: 10px; border: 1px solid black;color:black; width: 100px; box-sizing: border-box;background:#FDFACB;">NO. DE TIENDA</th>
            <th style="padding: 10px; border: 1px solid black;color:black; width: 100px; box-sizing: border-box;background:#FDFACB;">NOMBRE</th>
            <th style="padding: 10px; border: 1px solid black;color:black; width: 100px; box-sizing: border-box;background:#FDFACB;">AÑO</th>
            <th style="padding: 10px; border: 1px solid black;color:black; width: 100px; box-sizing: border-box;background:#FDFACB;">CONSTRUCCION</th>
            <th style="padding: 10px; border: 1px solid black;color:black; width: 100px; box-sizing: border-box;background:#FDFACB;">LOCAL</th>
            <th style="padding: 10px; border: 1px solid black;color:black; width: 100px; box-sizing: border-box;background:#FDFACB;">DEPTOS</th>
            <th style="padding: 10px; border: 1px solid black;color:black; width: 100px; box-sizing: border-box;background:#FDFACB;">M2 PISO VENTA</th>
            <th style="padding: 10px; border: 1px solid black;color:black; width: 100px; box-sizing: border-box;background:#FDFACB;">M2 BODEGA</th>
            <?php $productos = array(); ?>
            <?php foreach ($sumasprod as $fila) { ?>
                <?php $nombreProducto = $fila['nombre_producto']; ?>
                <?php $archivoProducto = $fila['archivo_producto']; ?>
                <?php if (!in_array($nombreProducto, $productos)) { ?>
                    <th style="padding: 10px; border: 1px solid black;color:black; width: 100px; box-sizing: border-box;">
                        <!--<?php echo $archivoProducto; ?>-->
                        <img style="border-radius: 15px;" src="<?= base_url("uploads/" . $archivoProducto) ?>" height="100px" width="100px">
                    </th>
                    <?php $productos[] = $nombreProducto; ?>
                <?php } ?>
            <?php } ?>
        </tr>

        <!-- Datos de las tiendas -->
        <?php $prevNombreTienda = ''; ?>
        <?php foreach ($sumasprod as $fila) { ?>
            <?php $numeroTienda = $fila['numerodetienda']; ?>
            <?php $nombreTienda = $fila['nombre_tienda']; ?>
            <?php $anoTienda = $fila['año']; ?>
            <?php $construccionTienda = $fila['construccion']; ?>
            <?php $localTienda = $fila['local']; ?>
            <?php $deptosTienda = $fila['deptos']; ?>
            <?php $m2PisoVenta = $fila['m2pisoventa']; ?>
            <?php $m2Bodega = $fila['m2bodega']; ?>
            <?php if ($nombreTienda !== $prevNombreTienda) { ?>
                <tr style="background-color: #f2f2f2;">
                    <th style="padding: 10px; text-align: left; border: 1px solid black;color:black;"><?php echo $numeroTienda; ?></th>
                    <th style="padding: 10px; text-align: left; border: 1px solid black;color:black;"><?php echo $nombreTienda; ?></th>
                    <th style="padding: 10px; text-align: left; border: 1px solid black;color:black;"><?php echo $anoTienda; ?></th>
                    <th style="padding: 10px; text-align: left; border: 1px solid black;color:black;"><?php echo $construccionTienda; ?></th>
                    <th style="padding: 10px; text-align: left; border: 1px solid black;color:black;"><?php echo $localTienda; ?></th>
                    <th style="padding: 10px; text-align: left; border: 1px solid black;color:black;"><?php echo $deptosTienda; ?></th>
                    <th style="padding: 10px; text-align: left; border: 1px solid black;color:black;"><?php echo $m2PisoVenta; ?></th>
                    <th style="padding: 10px; text-align: left; border: 1px solid black;color:black;"><?php echo $m2Bodega; ?></th>
                    <?php foreach ($productos as $producto) { ?>
                        <?php $productoEncontrado = false; ?>
                        <?php foreach ($sumasprod as $subfila) { ?>
                            <?php if ($subfila['nombre_tienda'] === $nombreTienda && $subfila['nombre_producto'] === $producto) { ?>
                                <th style="padding: 10px; border: 1px solid black;color:black;"><?php echo $subfila['suma_piezas']; ?></th>
                                <?php $productoEncontrado = true; ?>
                                <?php break; ?>
                            <?php } ?>
                        <?php } ?>
                        <?php if (!$productoEncontrado) { ?>
                            <th style="padding: 10px; border: 1px solid black;color:black;"></th>
                        <?php } ?>
                    <?php } ?>
                </tr>
            <?php } ?>
            <?php $prevNombreTienda = $nombreTienda; ?>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <th colspan="1" style="padding: 10px; background-color: #f2f2f2; border: 1px solid black;color:black;">No se encontraron resultados.</th>
        </tr>
    <?php } ?>
</table>