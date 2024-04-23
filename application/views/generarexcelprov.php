<?php
foreach ($ordencompra as $cos) {
?>
    <?php
    header('Content-type: application/vnd.ms-excel; charset=ISO-8859-1');
    //header("Content-Disposition: attachment; filename=PROV_$cos->numordencompra2$cos->id.xls");
    header("Content-Disposition: attachment; filename=$cos->tienda $cos->proveedor.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    ?>
<?php
}
?>
<html xmlns:x="urn:schemas-microsoft-com:office:excel">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        /*
        body{
            background: gray;
        }*/
        table {
            border-style: solid;
            border-width: thin;
        }

        th,
        td {
            border-style: solid;
            border-width: thin;
        }
    </style>
</head>

<body>
    <table class="table">
        <tr>
            <th style="text-align: center; color: black; font-size: 1.2em; background:#000000;" colspan="1" rowspan="5">
                <img src="<?= base_url() ?>assets/img/profile2.png" width="300">
            </th>
            <th style="text-align: center; color: white; font-size: 2em; background:#000000;" colspan="5">AVANTE TEXTIL</th>
            <th style="text-align: left; color: white; font-size: 2em; background:#000000;">
                <?php
                foreach ($centrocostos3 as $cos) {
                ?>
                    FECHA: <?= $cos->fechaprov ?>
                <?php
                }
                ?>
            </th>
        </tr>
        <tr>
            <th style="text-align: center; color: white; font-size: 1.5em; background:#000000;" colspan="5">Tiendas Optima</th>
            <th style="text-align: left; color: white; font-size: 1.5em; background:#000000;">Contacto:</th>
        </tr>
        <tr>
            <th style="text-align: center; color: white; font-size: 1.2em; background:#000000;" colspan="5">Av. Industrial Automotriz No. 202</th>
            <th style="text-align: left; color: white; font-size: 1.2em; background:#000000;">MARIA TERESA VILLAR DOURADO</th>
        </tr>
        <tr>
            <th style="text-align: center; color: white; font-size: 1.2em; background:#000000;" colspan="5">Parque Industrial El Coecillo</th>
            <th style="text-align: left; text-decoration-line: underline; color: #00F3FF; font-size: 1.2em; background:#000000;">mtvillar@tiendasoptima.com.mx</th>
        </tr>
        <tr>
            <th style="text-align: center; color: white; font-size: 1.2em; background:#000000;" colspan="5">C.P. 50200 Tel. (722)2790900 Ext. 2909 y 2908</th>
            <th style="text-align: center; color: white; font-size: 1.2em; background:#000000;"></th>
        </tr>
    </table>
    <table class="table" style="background-color: #B2B2B2; border-right: 1px solid; border-left: 1px solid">
        <tr>
            <th colspan="2">
                <?php
                foreach ($ordencompra as $cos) {
                ?>
                    <h1 style="color: black; width: 300px; font-size: 1.2em;"><?= $cos->tienda ?></h1>
                <?php
                }
                ?>
            </th>
            <th colspan="3">
                <?php
                foreach ($ordencompra as $cos) {
                ?>
                    <h1 style="color: black; width: 300px; font-size: 1.2em;"><?= $cos->proveedor ?></h1>
                <?php
                }
                ?>
            </th>
            <!--
            <th colspan="4">
                <?php
                foreach ($ordencompra as $cos) {
                ?>
                    <h1 style="color: black; width: 300px; font-size: 1.2em;"><?= $cos->proveedor ?></h1>
                <?php
                }
                ?>
            </th>-->
            <th colspan="2">
                <?php
                foreach ($centrocostos3 as $cos) {
                ?>
                    FECHA DE ENTREGA: <?= $cos->fecha_entregaprov ?>
                <?php
                }
                ?>
            </th>
        </tr>
    </table>
    <table class="table" style="border-right: 1px solid; border-left: 1px solid">
        <tr>
            <th style="text-align: center; color: white; font-size: 1em; background-color: #000000;" colspan="1">CENTRO DE COSTOS</th>
            <th style="text-align: center; color: black; font-size: 1.2em; background-color: #ffffff;" colspan="3">CONCEPTO</th>
            <th style="text-align: center; color: black; font-size: 1.2em; background-color: #ffffff;" colspan="2">TOTAL POR AREA</th>
            <th style="text-align: center; color: black; font-size: 1.2em; background-color: #ffffff;">PORCENTAJE</th>
        </tr>
        <tr>
            <th style="text-align: center; color: white; font-size: 1em; background-color: #000000;" colspan="1">NUMERO DE TIENDA</th>
            <th style="text-align: center; color: white; font-size: 1.2em; background-color: #7F521C;" colspan="3">MUEBLES</th>
            <td style="text-align: center; color: black; font-size: 1.2em; background-color: #ffffff;" colspan="2">
                <?php
                foreach ($centrocostos3 as $cos) {
                ?>
                    $<?= $cos->totalmueblesprov ?> MXN
                <?php
                }
                ?>
            </td>
            <td style="text-align: center; color: black; font-size: 1.2em; background-color: #ffffff;">
                <?php
                foreach ($centrocostos3 as $cos) {
                ?>
                    <?= $cos->porcentajemueblesprov ?> %
                <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <th style="text-align: center; color: white; font-size: 1em; background-color: #000000;" colspan="1">
                <?php
                foreach ($ordencompra as $cos) {
                ?>
                    <?= $cos->numerotienda ?>
                <?php
                }
                ?>
            </th>
            <th style="text-align: center; color: black; font-size: 1.2em; background-color: #91DDD9;" colspan="3">HERRAJES</th>
            <td style="text-align: center; color: black; font-size: 1.2em; background-color: #ffffff;" colspan="2">
                <?php
                foreach ($centrocostos3 as $cos) {
                ?>
                    $<?= $cos->totalherrajesprov ?> MXN
                <?php
                }
                ?>
            </td>
            <td style="text-align: center; color: black; font-size: 1.2em; background-color: #ffffff;">
                <?php
                foreach ($centrocostos3 as $cos) {
                ?>
                    <?= $cos->porcentajeherrajesprov ?> %
                <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <th style="text-align: center; color: white; font-size: 1em; background-color: #000000;" colspan="1">
                <?php
                foreach ($tienda_cc as $cc) {
                ?>
                    <?= $cc->centro_costos ?>
                <?php
                }
                ?>
            </th>
            <th style="text-align: center; color: black; font-size: 1.2em; background-color: #ffffff;" colspan="3">CONCEPTO</th>
            <th style="text-align: center; color: black; font-size: 1.2em; background-color: #ffffff;" colspan="2">TOTAL</th>
            <th style="text-align: center; color: black; font-size: 1.2em; background-color: #ffffff;">TOTAL M.H.E</th>
        </tr>
        <tr>
            <th style="text-align: center; color: white; font-size: 1em; background-color: #000000;" colspan="1">
                <?php
                foreach ($tienda_cc as $cc) {
                ?>
                    <?= $cc->ubicacion_td ?>
                <?php
                }
                ?>
            </th>
            <th style="text-align: center; color: black; font-size: 1.2em; background-color: #D6D6D6;" colspan="3">M2 TIENDA <?= $cos->m2prov ?></th>
            <td style="text-align: center; color: black; font-size: 1.2em; background-color: #ffffff;" colspan="2">
                <?php
                foreach ($centrocostos3 as $cos) {
                ?>
                    $<?= $cos->totalmueblesherrajesextrasinstalacionytransportepopmaniquisprov ?> MXN
                <?php
                }
                ?>
            </td>
            <td style="text-align: center; color: black; font-size: 1.2em; background-color: #ffffff;">
                <?php
                foreach ($centrocostos3 as $cos) {
                ?>
                    $<?= $cos->totalmueblesherrajesextrasprov ?> MXN
                <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <th style="text-align: center; color: white; font-size: 1em; background-color: #000000;" colspan="1"></th>
            <th style="text-align: center; color: black; font-size: 1.2em; background-color: #D6D6D6;" colspan="3">PRECIO TOTAL CON M2</th>
            <td style="text-align: center; color: black; font-size: 1.2em; background-color: #D6D6D6;" colspan="2">
                <?php
                foreach ($centrocostos3 as $cos) {
                ?>
                    $<?= $cos->totalentrevalorantespreciototalv1prov ?> MXN
                <?php
                }
                ?>
            </td>
            <td style="text-align: center; color: black; font-size: 1.2em; background-color: #D6D6D6;">
                <?php
                foreach ($centrocostos3 as $cos) {
                ?>
                    $<?= $cos->totalentrevalorantespreciototal2v2prov ?> MXN
                <?php
                }
                ?>
            </td>
        </tr>
    </table>
    <?php if ($entrada3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid; border-top: 1px solid">
            <tr>
                <th colspan="4" style="text-align: center; color: black; font-size: 1.7em; background-color: #B0B0B0;">1.0 ENTRADA</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #B0B0B0;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #7F521C; color: white">$<?= $sub->finalent ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #B0B0B0;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($entrada3 as $ent) {
            ?>
                <tr>
                    <?php if ($ent->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $ent->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $ent->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $ent->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $ent->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $ent->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $ent->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $ent->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $ent->observaciones) ?></td>
                    <?php elseif ($ent->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $ent->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $ent->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $ent->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $ent->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $ent->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $ent->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $ent->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $ent->observaciones) ?></td>
                    <?php elseif ($ent->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $ent->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $ent->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $ent->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $ent->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $ent->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $ent->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $ent->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $ent->observaciones) ?></td>
                    <?php elseif ($ent->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $ent->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $ent->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $ent->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $ent->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $ent->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $ent->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $ent->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $ent->observaciones) ?></td>
                    <?php elseif ($ent->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $ent->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $ent->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $ent->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $ent->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $ent->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $ent->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $ent->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $ent->observaciones) ?></td>
                    <?php elseif ($ent->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $ent->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $ent->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $ent->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $ent->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $ent->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $ent->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $ent->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $ent->observaciones) ?></td>
                    <?php elseif ($ent->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $ent->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $ent->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $ent->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $ent->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $ent->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $ent->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $ent->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $ent->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $ent->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $ent->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $ent->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $ent->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $ent->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $ent->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $ent->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $ent->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <?php if ($dcmpiso3 == '' && $dcmperimetral3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid; border-top: 1px solid;">
            <tr>
                <th colspan="7" style="text-align: center; color: black; font-size: 1.7em; background-color: #B0B0B0;">2.0 DAMA Y CABALLERO</th>
            </tr>
        </table>
    <?php endif ?>

    <?php if ($dcmpiso3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid">
            <tr>
                <th colspan="4" style="text-align: left; color: black; font-size: 1.3em; background-color: #D8D8D8;">MOBILIARIO DE PISO</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #7F521C; color: white">$<?= $sub->finaldcmpi ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($dcmpiso3 as $dcmpi) {
            ?>
                <tr>
                    <?php if ($dcmpi->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $dcmpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $dcmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $dcmpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $dcmpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $dcmpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $dcmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $dcmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $dcmpi->observaciones) ?></td>
                    <?php elseif ($dcmpi->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $dcmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $dcmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $dcmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $dcmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $dcmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $dcmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $dcmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $dcmpi->observaciones) ?></td>
                    <?php elseif ($dcmpi->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $dcmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $dcmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $dcmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $dcmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $dcmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $dcmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $dcmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $dcmpi->observaciones) ?></td>
                    <?php elseif ($dcmpi->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $dcmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $dcmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $dcmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $dcmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $dcmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $dcmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $dcmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $dcmpi->observaciones) ?></td>
                    <?php elseif ($dcmpi->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $dcmpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $dcmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $dcmpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $dcmpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $dcmpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $dcmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $dcmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $dcmpi->observaciones) ?></td>
                    <?php elseif ($dcmpi->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $dcmpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $dcmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $dcmpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $dcmpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $dcmpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $dcmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $dcmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $dcmpi->observaciones) ?></td>
                    <?php elseif ($dcmpi->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $dcmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $dcmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $dcmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $dcmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $dcmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $dcmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $dcmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $dcmpi->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $dcmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $dcmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $dcmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $dcmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $dcmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $dcmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $dcmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $dcmpi->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <?php if ($dcmperimetral3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid">
            <tr>
                <th colspan="4" style="text-align: left; color: black; font-size: 1.3em; background-color: #D8D8D8;">MOBILIARIO PERIMETRAL</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #91DDD9; color: black">$<?= $sub->finaldcmpe ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($dcmperimetral3 as $dcmpe) {
            ?>
                <tr>
                    <?php if ($dcmpe->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $dcmpe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $dcmpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $dcmpe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $dcmpe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $dcmpe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $dcmpe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $dcmpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $dcmpe->observaciones) ?></td>
                    <?php elseif ($dcmpe->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $dcmpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $dcmpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $dcmpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $dcmpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $dcmpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $dcmpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $dcmpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $dcmpe->observaciones) ?></td>
                    <?php elseif ($dcmpe->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $dcmpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $dcmpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $dcmpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $dcmpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $dcmpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $dcmpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $dcmpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $dcmpe->observaciones) ?></td>
                    <?php elseif ($dcmpe->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $dcmpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $dcmpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $dcmpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $dcmpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $dcmpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $dcmpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $dcmpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $dcmpe->observaciones) ?></td>
                    <?php elseif ($dcmpe->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $dcmpe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $dcmpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $dcmpe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $dcmpe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $dcmpe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $dcmpe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $dcmpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $dcmpe->observaciones) ?></td>
                    <?php elseif ($dcmpe->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $dcmpe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $dcmpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $dcmpe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $dcmpe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $dcmpe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $dcmpe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $dcmpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $dcmpe->observaciones) ?></td>
                    <?php elseif ($dcmpe->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $dcmpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $dcmpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $dcmpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $dcmpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $dcmpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $dcmpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $dcmpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $dcmpe->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $dcmpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $dcmpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $dcmpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $dcmpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $dcmpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $dcmpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $dcmpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $dcmpe->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <?php if ($mhjmpiso3 == '' && $mhjmperimetral3 == '' && $mhjmpjeans3 == '' && $mhjmplicencias3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid; border-top: 1px solid;">
            <tr>
                <th colspan="7" style="text-align: center; color: black; font-size: 1.7em; background-color: #B0B0B0;">3.0 MUJER HOMBRE JR</th>
            </tr>
        </table>
    <?php endif ?>

    <?php if ($mhjmpiso3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid">
            <tr>
                <th colspan="4" style="text-align: left; color: black; font-size: 1.3em; background-color: #D8D8D8;">MOBILIARIO DE PISO</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #7F521C; color: white">$<?= $sub->finalmhjmpi ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($mhjmpiso3 as $mhjmpi) {
            ?>
                <tr>
                    <?php if ($mhjmpi->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $mhjmpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $mhjmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $mhjmpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $mhjmpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $mhjmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $mhjmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpi->observaciones) ?></td>
                    <?php elseif ($mhjmpi->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $mhjmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $mhjmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $mhjmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $mhjmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $mhjmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $mhjmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpi->observaciones) ?></td>
                    <?php elseif ($mhjmpi->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $mhjmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $mhjmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $mhjmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $mhjmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $mhjmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $mhjmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpi->observaciones) ?></td>
                    <?php elseif ($mhjmpi->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $mhjmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $mhjmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $mhjmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $mhjmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $mhjmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $mhjmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpi->observaciones) ?></td>
                    <?php elseif ($mhjmpi->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $mhjmpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $mhjmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $mhjmpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $mhjmpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $mhjmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $mhjmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpi->observaciones) ?></td>
                    <?php elseif ($mhjmpi->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $mhjmpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $mhjmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $mhjmpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $mhjmpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $mhjmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $mhjmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpi->observaciones) ?></td>
                    <?php elseif ($mhjmpi->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $mhjmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $mhjmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $mhjmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpi->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $mhjmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $mhjmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $mhjmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpi->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <?php if ($mhjmperimetral3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid">
            <tr>
                <th colspan="4" style="text-align: left; color: black; font-size: 1.3em; background-color: #D8D8D8;">MOBILIARIO PERIMETRAL</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #91DDD9; color: black">$<?= $sub->finalmhjmpe ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($mhjmperimetral3 as $mhjmpe) {
            ?>
                <tr>
                    <?php if ($mhjmpe->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $mhjmpe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $mhjmpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $mhjmpe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $mhjmpe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $mhjmpe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $mhjmpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpe->observaciones) ?></td>
                    <?php elseif ($mhjmpe->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $mhjmpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $mhjmpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $mhjmpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $mhjmpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $mhjmpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $mhjmpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpe->observaciones) ?></td>
                    <?php elseif ($mhjmpe->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $mhjmpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $mhjmpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $mhjmpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $mhjmpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $mhjmpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $mhjmpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpe->observaciones) ?></td>
                    <?php elseif ($mhjmpe->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $mhjmpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $mhjmpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $mhjmpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $mhjmpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $mhjmpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $mhjmpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpe->observaciones) ?></td>
                    <?php elseif ($mhjmpe->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $mhjmpe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $mhjmpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $mhjmpe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $mhjmpe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $mhjmpe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $mhjmpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpe->observaciones) ?></td>
                    <?php elseif ($mhjmpe->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $mhjmpe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $mhjmpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $mhjmpe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $mhjmpe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $mhjmpe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $mhjmpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpe->observaciones) ?></td>
                    <?php elseif ($mhjmpe->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $mhjmpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $mhjmpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $mhjmpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpe->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $mhjmpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $mhjmpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $mhjmpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpe->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <?php if ($mhjmpjeans3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid">
            <tr>
                <th colspan="4" style="text-align: left; color: black; font-size: 1.3em; background-color: #D8D8D8;">MOBILIARIO PERIMETRO JEANS</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #91DDD9; color: black">$<?= $sub->finalmhjmpje ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($mhjmpjeans3 as $mhjmpje) {
            ?>
                <tr>
                    <?php if ($mhjmpje->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #ffffff;"><?= $mhjmpe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $mhjmpje->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpje->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $mhjmpje->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $mhjmpje->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $mhjmpje->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $mhjmpje->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpje->observaciones) ?></td>
                    <?php elseif ($mhjmpje->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $mhjmpje->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpje->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $mhjmpje->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $mhjmpje->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $mhjmpje->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $mhjmpje->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpje->observaciones) ?></td>
                    <?php elseif ($mhjmpje->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $mhjmpje->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpje->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $mhjmpje->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $mhjmpje->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $mhjmpje->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $mhjmpje->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpje->observaciones) ?></td>
                    <?php elseif ($mhjmpje->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $mhjmpje->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpje->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $mhjmpje->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $mhjmpje->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $mhjmpje->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $mhjmpje->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpje->observaciones) ?></td>
                    <?php elseif ($mhjmpje->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #ffffff;"><?= $mhjmpe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $mhjmpje->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpje->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $mhjmpje->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $mhjmpje->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $mhjmpje->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $mhjmpje->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpje->observaciones) ?></td>
                    <?php elseif ($mhjmpje->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #ffffff;"><?= $mhjmpe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $mhjmpje->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpje->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $mhjmpje->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $mhjmpje->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $mhjmpje->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $mhjmpje->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpje->observaciones) ?></td>
                    <?php elseif ($mhjmpje->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpje->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpje->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $mhjmpje->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpje->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $mhjmpje->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $mhjmpje->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpje->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpje->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpje->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $mhjmpje->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpje->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $mhjmpje->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $mhjmpje->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpje->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <?php if ($mhjmplicencias3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid">
            <tr>
                <th colspan="4" style="text-align: left; color: black; font-size: 1.3em; background-color: #D8D8D8;">MOBILIARIO PERIMETRO LICENCIAS</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #91DDD9; color: black">$<?= $sub->finalmhjmpli ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($mhjmplicencias3 as $mhjmpli) {
            ?>
                <tr>
                    <?php if ($mhjmpli->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $mhjmpli->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $mhjmpli->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpli->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $mhjmpli->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $mhjmpli->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $mhjmpli->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $mhjmpli->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpli->observaciones) ?></td>
                    <?php elseif ($mhjmpli->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $mhjmpli->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $mhjmpli->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpli->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $mhjmpli->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $mhjmpli->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $mhjmpli->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $mhjmpli->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpli->observaciones) ?></td>
                    <?php elseif ($mhjmpli->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $mhjmpli->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $mhjmpli->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpli->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $mhjmpli->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $mhjmpli->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $mhjmpli->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $mhjmpli->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpli->observaciones) ?></td>
                    <?php elseif ($mhjmpli->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $mhjmpli->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $mhjmpli->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpli->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $mhjmpli->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $mhjmpli->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $mhjmpli->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $mhjmpli->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpli->observaciones) ?></td>
                    <?php elseif ($mhjmpli->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $mhjmpli->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $mhjmpli->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpli->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $mhjmpli->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $mhjmpli->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $mhjmpli->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $mhjmpli->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpli->observaciones) ?></td>
                    <?php elseif ($mhjmpli->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $mhjmpli->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $mhjmpli->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpli->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $mhjmpli->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $mhjmpli->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $mhjmpli->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $mhjmpli->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpli->observaciones) ?></td>
                    <?php elseif ($mhjmpli->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpli->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpli->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpli->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $mhjmpli->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpli->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $mhjmpli->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $mhjmpli->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpli->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpli->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpli->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $mhjmpli->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $mhjmpli->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $mhjmpli->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $mhjmpli->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $mhjmpli->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $mhjmpli->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <?php if ($impiso3 == '' && $imperimetral3 == '' && $imherraje3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid; border-top: 1px solid;">
            <tr>
                <th colspan="7" style="text-align: center; color: black; font-size: 1.7em; background-color: #B0B0B0;">4.0 INTERIOR MUJER</th>
            </tr>
        </table>
    <?php endif ?>

    <?php if ($impiso3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid;">
            <tr>
                <th colspan="4" style="text-align: left; color: black; font-size: 1.3em; background-color: #D8D8D8;">MOBILIARIO DE PISO</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #7F521C; color: white">$<?= $sub->finalimpi ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($impiso3 as $impi) {
            ?>
                <tr>
                    <?php if ($impi->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $impi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $impi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $impi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $impi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $impi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $impi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $impi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $impi->observaciones) ?></td>
                    <?php elseif ($impi->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $impi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $impi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $impi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $impi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $impi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $impi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $impi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $impi->observaciones) ?></td>
                    <?php elseif ($impi->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $impi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $impi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $impi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $impi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $impi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $impi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $impi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $impi->observaciones) ?></td>
                    <?php elseif ($impi->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $impi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $impi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $impi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $impi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $impi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $impi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $impi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $impi->observaciones) ?></td>
                    <?php elseif ($impi->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $impi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $impi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $impi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $impi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $impi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $impi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $impi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $impi->observaciones) ?></td>
                    <?php elseif ($impi->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $impi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $impi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $impi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $impi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $impi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $impi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $impi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $impi->observaciones) ?></td>
                    <?php elseif ($impi->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $impi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $impi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $impi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $impi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $impi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $impi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $impi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $impi->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $impi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $impi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $impi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $impi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $impi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $impi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $impi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $impi->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <?php if ($imperimetral3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid">
            <tr>
                <th colspan="4" style="text-align: left; color: black; font-size: 1.3em; background-color: #D8D8D8;">MOBILIARIO PERIMETRAL</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #91DDD9; color: black">$<?= $sub->finalimpe ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($imperimetral3 as $impe) {
            ?>
                <tr>
                    <?php if ($impe->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $impe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $impe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $impe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $impe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $impe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $impe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $impe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $impe->observaciones) ?></td>
                    <?php elseif ($impe->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $impe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $impe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $impe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $impe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $impe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $impe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $impe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $impe->observaciones) ?></td>
                    <?php elseif ($impe->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $impe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $impe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $impe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $impe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $impe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $impe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $impe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $impe->observaciones) ?></td>
                    <?php elseif ($impe->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $impe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $impe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $impe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $impe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $impe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $impe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $impe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $impe->observaciones) ?></td>
                    <?php elseif ($impe->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $impe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $impe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $impe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $impe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $impe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $impe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $impe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $impe->observaciones) ?></td>
                    <?php elseif ($impe->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $impe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $impe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $impe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $impe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $impe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $impe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $impe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $impe->observaciones) ?></td>
                    <?php elseif ($impe->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $impe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $impe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $impe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $impe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $impe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $impe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $impe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $impe->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $impe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $impe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $impe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $impe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $impe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $impe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $impe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $impe->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <?php if ($imherraje3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid">
            <tr>
                <th colspan="4" style="text-align: left; color: black; font-size: 1.3em; background-color: #D8D8D8;">HERRAJE</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #91DDD9; color: black">$<?= $sub->finalimhe ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($imherraje3 as $imhe) {
            ?>
                <tr>
                    <?php if ($imhe->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $imhe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $imhe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $imhe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $imhe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $imhe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $imhe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $imhe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $imhe->observaciones) ?></td>
                    <?php elseif ($imhe->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $imhe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $imhe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $imhe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $imhe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $imhe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $imhe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $imhe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $imhe->observaciones) ?></td>
                    <?php elseif ($imhe->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $imhe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $imhe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $imhe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $imhe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $imhe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $imhe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $imhe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $imhe->observaciones) ?></td>
                    <?php elseif ($imhe->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $imhe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $imhe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $imhe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $imhe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $imhe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $imhe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $imhe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $imhe->observaciones) ?></td>
                    <?php elseif ($imhe->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $imhe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $imhe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $imhe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $imhe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $imhe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $imhe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $imhe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $imhe->observaciones) ?></td>
                    <?php elseif ($imhe->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $imhe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $imhe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $imhe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $imhe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $imhe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $imhe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $imhe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $imhe->observaciones) ?></td>
                    <?php elseif ($imhe->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $imhe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $imhe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $imhe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $imhe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $imhe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $imhe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $imhe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $imhe->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $imhe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $imhe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $imhe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $imhe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $imhe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $imhe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $imhe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $imhe->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <?php if ($innpiso3 == '' && $innperimetral3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid; border-top: 1px solid;">
            <tr>
                <th colspan="7" style="text-align: center; color: black; font-size: 1.7em; background-color: #B0B0B0;">5.0 INFANTIL NI&#209;O Y NI&#209;A</th>
            </tr>
        </table>
    <?php endif ?>

    <?php if ($innpiso3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid">
            <tr>
                <th colspan="4" style="text-align: left; color: black; font-size: 1.3em; background-color: #D8D8D8;">MOBILIARIO DE PISO</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #7F521C; color: white">$<?= $sub->finalinnpi ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($innpiso3 as $innpi) {
            ?>
                <tr>
                    <?php if ($innpi->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $innpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $innpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $innpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $innpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $innpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $innpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $innpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $innpi->observaciones) ?></td>
                    <?php elseif ($innpi->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $innpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $innpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $innpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $innpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $innpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $innpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $innpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $innpi->observaciones) ?></td>
                    <?php elseif ($innpi->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $innpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $innpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $innpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $innpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $innpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $innpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $innpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $innpi->observaciones) ?></td>
                    <?php elseif ($innpi->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $innpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $innpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $innpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $innpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $innpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $innpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $innpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $innpi->observaciones) ?></td>
                    <?php elseif ($innpi->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $innpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $innpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $innpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $innpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $innpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $innpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $innpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $innpi->observaciones) ?></td>
                    <?php elseif ($innpi->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $innpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $innpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $innpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $innpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $innpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $innpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $innpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $innpi->observaciones) ?></td>
                    <?php elseif ($innpi->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $innpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $innpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $innpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $innpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $innpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $innpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $innpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $innpi->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $innpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $innpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $innpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $innpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $innpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $innpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $innpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $innpi->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <?php if ($innperimetral3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid">
            <tr>
                <th colspan="4" style="text-align: left; color: black; font-size: 1.3em; background-color: #D8D8D8;">MOBILIARIO PERIMETRAL</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #91DDD9; color: black">$<?= $sub->finalinnpe ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($innperimetral3 as $innpe) {
            ?>
                <tr>
                    <?php if ($innpe->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $innpe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $innpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $innpe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $innpe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $innpe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $innpe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $innpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $innpe->observaciones) ?></td>
                    <?php elseif ($innpe->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $innpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $innpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $innpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $innpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $innpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $innpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $innpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $innpe->observaciones) ?></td>
                    <?php elseif ($innpe->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $innpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $innpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $innpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $innpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $innpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $innpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $innpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $innpe->observaciones) ?></td>
                    <?php elseif ($innpe->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $innpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $innpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $innpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $innpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $innpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $innpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $innpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $innpe->observaciones) ?></td>
                    <?php elseif ($innpe->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $innpe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $innpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $innpe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $innpe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $innpe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $innpe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $innpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $innpe->observaciones) ?></td>
                    <?php elseif ($innpe->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $innpe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $innpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $innpe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $innpe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $innpe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $innpe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $innpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $innpe->observaciones) ?></td>
                    <?php elseif ($innpe->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $innpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $innpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $innpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $innpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $innpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $innpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $innpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $innpe->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $innpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $innpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $innpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $innpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $innpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $innpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $innpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $innpe->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <?php if ($tnnbpiso3 == '' && $tnnbperimetral3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid; border-top: 1px solid;">
            <tr>
                <th colspan="7" style="text-align: center; color: black; font-size: 1.7em; background-color: #B0B0B0;">6.0 TODDLER NI&#209;O NI&#209;A Y BEBES</th>
            </tr>
        </table>
    <?php endif ?>

    <?php if ($tnnbpiso3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid">
            <tr>
                <th colspan="4" style="text-align: left; color: black; font-size: 1.3em; background-color: #D8D8D8;">MOBILIARIO DE PISO</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #7F521C; color: white">$<?= $sub->finaltnnbpi ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($tnnbpiso3 as $tnnbpi) {
            ?>
                <tr>
                    <?php if ($tnnbpi->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $tnnbpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $tnnbpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $tnnbpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $tnnbpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $tnnbpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $tnnbpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $tnnbpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $tnnbpi->observaciones) ?></td>
                    <?php elseif ($tnnbpi->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $tnnbpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $tnnbpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $tnnbpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $tnnbpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $tnnbpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $tnnbpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $tnnbpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $tnnbpi->observaciones) ?></td>
                    <?php elseif ($tnnbpi->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $tnnbpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $tnnbpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $tnnbpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $tnnbpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $tnnbpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $tnnbpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $tnnbpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $tnnbpi->observaciones) ?></td>
                    <?php elseif ($tnnbpi->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $tnnbpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $tnnbpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $tnnbpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $tnnbpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $tnnbpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $tnnbpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $tnnbpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $tnnbpi->observaciones) ?></td>
                    <?php elseif ($tnnbpi->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $tnnbpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $tnnbpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $tnnbpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $tnnbpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $tnnbpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $tnnbpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $tnnbpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $tnnbpi->observaciones) ?></td>
                    <?php elseif ($tnnbpi->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $tnnbpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $tnnbpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $tnnbpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $tnnbpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $tnnbpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $tnnbpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $tnnbpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $tnnbpi->observaciones) ?></td>
                    <?php elseif ($tnnbpi->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $tnnbpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $tnnbpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $tnnbpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $tnnbpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $tnnbpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $tnnbpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $tnnbpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $tnnbpi->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $tnnbpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $tnnbpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $tnnbpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $tnnbpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $tnnbpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $tnnbpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $tnnbpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $tnnbpi->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <?php if ($tnnbperimetral3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid">
            <tr>
                <th colspan="4" style="text-align: left; color: black; font-size: 1.3em; background-color: #D8D8D8;">MOBILIARIO PERIMETRAL</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #91DDD9; color: black">$<?= $sub->finaltnnbpe ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($tnnbperimetral3 as $tnnbpe) {
            ?>
                <tr>
                    <?php if ($tnnbpe->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $tnnbpe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $tnnbpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $tnnbpe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $tnnbpe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $tnnbpe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $tnnbpe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $tnnbpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $tnnbpe->observaciones) ?></td>
                    <?php elseif ($tnnbpe->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $tnnbpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $tnnbpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $tnnbpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $tnnbpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $tnnbpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $tnnbpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $tnnbpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $tnnbpe->observaciones) ?></td>
                    <?php elseif ($tnnbpe->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $tnnbpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $tnnbpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $tnnbpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $tnnbpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $tnnbpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $tnnbpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $tnnbpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $tnnbpe->observaciones) ?></td>
                    <?php elseif ($tnnbpe->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $tnnbpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $tnnbpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $tnnbpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $tnnbpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $tnnbpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $tnnbpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $tnnbpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $tnnbpe->observaciones) ?></td>
                    <?php elseif ($tnnbpe->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $tnnbpe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $tnnbpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $tnnbpe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $tnnbpe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $tnnbpe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $tnnbpe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $tnnbpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $tnnbpe->observaciones) ?></td>
                    <?php elseif ($tnnbpe->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $tnnbpe->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $tnnbpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $tnnbpe->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $tnnbpe->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $tnnbpe->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $tnnbpe->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $tnnbpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $tnnbpe->observaciones) ?></td>
                    <?php elseif ($tnnbpe->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $tnnbpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $tnnbpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $tnnbpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $tnnbpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $tnnbpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $tnnbpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $tnnbpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $tnnbpe->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $tnnbpe->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $tnnbpe->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $tnnbpe->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $tnnbpe->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $tnnbpe->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $tnnbpe->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $tnnbpe->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $tnnbpe->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <?php if ($hernoaplica3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid; border-top: 1px solid;">
            <tr>
                <th colspan="4" style="text-align: center; color: black; font-size: 1.7em; background-color: #B0B0B0;">7.0 HERRAJE</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #B0B0B0;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #91DDD9; color: black">$<?= $sub->finalherna ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #B0B0B0;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($hernoaplica3 as $herna) {
            ?>
                <tr>
                    <?php if ($herna->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $herna->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $herna->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $herna->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $herna->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $herna->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $herna->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $herna->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $herna->observaciones) ?></td>
                    <?php elseif ($herna->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $herna->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $herna->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $herna->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $herna->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $herna->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $herna->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $herna->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $herna->observaciones) ?></td>
                    <?php elseif ($herna->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $herna->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $herna->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $herna->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $herna->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $herna->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $herna->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $herna->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $herna->observaciones) ?></td>
                    <?php elseif ($herna->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $herna->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $herna->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $herna->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $herna->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $herna->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $herna->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $herna->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $herna->observaciones) ?></td>
                    <?php elseif ($herna->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $herna->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $herna->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $herna->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $herna->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $herna->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $herna->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $herna->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $herna->observaciones) ?></td>
                    <?php elseif ($herna->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $herna->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $herna->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $herna->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $herna->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $herna->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $herna->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $herna->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $herna->observaciones) ?></td>
                    <?php elseif ($herna->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $herna->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $herna->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $herna->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $herna->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $herna->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $herna->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $herna->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $herna->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $herna->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $herna->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $herna->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $herna->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $herna->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $herna->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $herna->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $herna->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <?php if ($probmpiso3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid; border-top: 1px solid;">
            <tr>
                <th colspan="7" style="text-align: center; color: black; font-size: 1.7em; background-color: #B0B0B0;">8.0 PROVADORES</th>
            </tr>
            <tr>
                <th colspan="4" style="text-align: left; color: black; font-size: 1.3em; background-color: #D8D8D8;">MOBILIARIO DE PISO</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #7F521C; color: white">$<?= $sub->finalprobmpi ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($probmpiso3 as $probmpi) {
            ?>
                <tr>
                    <?php if ($probmpi->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $probmpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $probmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $probmpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $probmpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $probmpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $probmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $probmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $probmpi->observaciones) ?></td>
                    <?php elseif ($probmpi->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $probmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $probmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $probmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $probmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $probmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $probmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $probmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $probmpi->observaciones) ?></td>
                    <?php elseif ($probmpi->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $probmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $probmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $probmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $probmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $probmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $probmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $probmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $probmpi->observaciones) ?></td>
                    <?php elseif ($probmpi->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $probmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $probmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $probmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $probmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $probmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $probmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $probmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $probmpi->observaciones) ?></td>
                    <?php elseif ($probmpi->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $probmpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $probmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $probmpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $probmpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $probmpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $probmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $probmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $probmpi->observaciones) ?></td>
                    <?php elseif ($probmpi->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $probmpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $probmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $probmpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $probmpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $probmpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $probmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $probmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $probmpi->observaciones) ?></td>
                    <?php elseif ($probmpi->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $probmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $probmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $probmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $probmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $probmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $probmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $probmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $probmpi->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $probmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $probmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $probmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $probmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $probmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $probmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $probmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $probmpi->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <?php if ($panmpiso3 == '') : ?>
    <?php else : ?>
        <table class="table" style="border-right: 1px solid; border-left: 1px solid; border-top: 1px solid;">
            <tr>
                <th colspan="7" style="text-align: center; color: black; font-size: 1.7em; background-color: #B0B0B0;">9.0 PANELES</th>
            </tr>
            <tr>
                <th colspan="4" style="text-align: left; color: black; font-size: 1.3em; background-color: #D8D8D8;">MOBILIARIO DE PISO</th>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;">TOTAL</th>
                <?php
                foreach ($subtotales3 as $sub) {
                ?>
                    <td style="font-size: 1.5em; background-color: #7F521C; color: white">$<?= $sub->finalpanmpi ?> MXN</td>
                <?php
                }
                ?>
                <th style="text-align: center; color: black; font-size: 1.5em; background-color: #D8D8D8;"></th>
            </tr>
            <tr>
                <th style="text-align: left; color: black; background-color: #ffffff;">SKU</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">DESC. PRODUCTO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">CANTIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">UNIDAD</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">PRECIO</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">SUBTOTAL</th>
                <th style="text-align: left; color: black; background-color: #ffffff;">OBSERVACIONES</th>
            </tr>
            <?php
            foreach ($panmpiso3 as $panmpi) {
            ?>
                <tr>
                    <?php if ($panmpi->color == 1) : ?>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $panmpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $panmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $panmpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #FF0000;"><?= $panmpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= $panmpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;"><?= $panmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;font-size: 1.1em;">$<?= $panmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #FF0000;"><?= iconv('UTF-8', 'ISO-8859-1', $panmpi->observaciones) ?></td>
                    <?php elseif ($panmpi->color == 2) : ?>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $panmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $panmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $panmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #FF8B00;"><?= $panmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= $panmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;"><?= $panmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;font-size: 1.1em;">$<?= $panmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #FF8B00;"><?= iconv('UTF-8', 'ISO-8859-1', $panmpi->observaciones) ?></td>
                    <?php elseif ($panmpi->color == 3) : ?>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $panmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $panmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $panmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #F7FF00;"><?= $panmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= $panmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;"><?= $panmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;font-size: 1.1em;">$<?= $panmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #F7FF00;"><?= iconv('UTF-8', 'ISO-8859-1', $panmpi->observaciones) ?></td>
                    <?php elseif ($panmpi->color == 4) : ?>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $panmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $panmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $panmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #4DFF00;"><?= $panmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= $panmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;"><?= $panmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;font-size: 1.1em;">$<?= $panmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #4DFF00;"><?= iconv('UTF-8', 'ISO-8859-1', $panmpi->observaciones) ?></td>
                    <?php elseif ($panmpi->color == 5) : ?>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $panmpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $panmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $panmpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #0055FF;"><?= $panmpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= $panmpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;"><?= $panmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;font-size: 1.1em;">$<?= $panmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #0055FF;"><?= iconv('UTF-8', 'ISO-8859-1', $panmpi->observaciones) ?></td>
                    <?php elseif ($panmpi->color == 6) : ?>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $panmpi->sku ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $panmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $panmpi->incluye)) ?></td>
                        <td style="text-align: center; color: white; background-color: #CD00FF;"><?= $panmpi->pieza ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= $panmpi->unidad ?></td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;"><?= $panmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;font-size: 1.1em;">$<?= $panmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: white; background-color: #CD00FF;"><?= iconv('UTF-8', 'ISO-8859-1', $panmpi->observaciones) ?></td>
                    <?php elseif ($panmpi->color == 0) : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $panmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $panmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $panmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $panmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $panmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $panmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $panmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $panmpi->observaciones) ?></td>
                    <?php else : ?>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $panmpi->sku ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $panmpi->nombre ?><br><?= preg_replace('/:\s+/', ":\n", preg_replace('/\s*-\s*/', "<br>- ", $panmpi->incluye)) ?></td>
                        <td style="text-align: center; color: black; background-color: #ffffff;"><?= $panmpi->pieza ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= $panmpi->unidad ?></td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;"><?= $panmpi->precio ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;font-size: 1.1em;">$<?= $panmpi->subtotal ?> MXN</td>
                        <td style="text-align: left; color: black; background-color: #ffffff;"><?= iconv('UTF-8', 'ISO-8859-1', $panmpi->observaciones) ?></td>
                    <?php endif ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php endif ?>

    <table class="table" style="border: 1px solid;">
        <thead>
            <tr>
                <th style="text-align: center; color: white; font-size: 1.5em; background-color: #000000;"></th>
                <th style="text-align: center; color: white; font-size: 1.5em; background-color: #000000;"></th>
                <th style="text-align: center; color: white; font-size: 1.5em; background-color: #000000;"></th>
                <th style="text-align: center; color: white; font-size: 1.5em; background-color: #000000;"></th>
                <th style="text-align: center; color: white; font-size: 1.5em; background-color: #000000;"></th>
                <th style="text-align: left; color: white; font-size: 1.5em; background-color: #000000;">TOTAL </th>
                <?php
                foreach ($centrocostosfinal3 as $cosf) {
                ?>
                    <th style="text-align: left; color: white; font-size: 1.5em; background-color: #000000;">$<?= $cosf->totalmueblesherrajesextrasinstalacionytransportepopmaniquis3prov ?> MXN</th>
                <?php
                }
                ?>
            </tr>
            <tr>
                <th style="background-color: #ffffff;"></th>
                <th style="background-color: #ffffff;"></th>
                <th style="background-color: #ffffff;"></th>
                <th style="background-color: #ffffff;"></th>
                <th style="background-color: #ffffff;"></th>
                <th style="text-align: left; background-color: #000000; color: white; font-size: 15px">TOTAL TIENDA</th>
                <th style="text-align: left; background-color: #000000; color: white; font-size: 15px">ANTICIPO 30%</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($centrocostosfinal3 as $cosf) {
            ?>
                <tr>
                    <td style="background-color: #ffffff;"></td>
                    <td style="background-color: #ffffff;"></td>
                    <td style="background-color: #ffffff;"></td>
                    <td style="background-color: #ffffff;"></td>
                    <th style="text-align: right; color: black; font-size: 15px; background-color: #ffffff;">SUBTOTAL</th>
                    <td style="text-align: left; color: black; background-color: #ffffff;">$<?= $cosf->totalmueblesherrajesextrasinstalacionytransportepopmaniquis3prov ?> MXN<input type="hidden" size="15" style="font-size: 1.5em; color: black" id="totalmueblesherrajesextrasinstalacionytransportepopmaniquis3v2" value="<?= $cosf->totalmueblesherrajesextrasinstalacionytransportepopmaniquis3prov ?>" readonly></td>
                    <td style="text-align: left; color: black; background-color: #ffffff;">$<?= $cosf->anticipoprov ?> MXN<input type="hidden" size="15" style="font-size: 1.5em; color: black" id="anticipov2" value="<?= $cosf->anticipoprov ?>" readonly></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <th style="text-align: right; color: black; font-size: 15px; background-color: #ffffff;">IVA 16%</th>
                <td style="text-align: left; color: black; background-color: #ffffff;">$<?= $cosf->totalconivaprov ?> MXN<input type="hidden" size="15" style="font-size: 1.5em; color: black" id="totalconivav2" value="<?= $cosf->totalconivaprov ?>" readonly></td>
                <td style="text-align: left; color: black; background-color: #ffffff;">$<?= $cosf->anticipoconivaprov ?> MXN<input type="hidden" size="15" style="font-size: 1.5em; color: black" id="anticipoconivav2" value="<?= $cosf->anticipoconivaprov ?>" readonly></td>
            </tr>
            <tr>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <th style="text-align: right; color: black; font-size: 15px; background-color: #ffffff;">TOTAL</th>
                <td style="text-align: left; color: black; background-color: #ffffff;">$<?= $cosf->totaltiendav2prov ?> MXN<input type="hidden" size="15" style="font-size: 1.5em; color: black" id="totaltienda" value="<?= $cosf->totaltiendav2prov ?>" readonly></td>
                <td style="text-align: left; color: black; background-color: #ffffff;">$<?= $cosf->totaltiendaanticipov2prov ?> MXN<input type="hidden" size="15" style="font-size: 1.5em; color: black" id="totaltiendaanticipo" value="<?= $cosf->totaltiendaanticipov2prov ?>" readonly></td>
            </tr>
            <tr>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <th style="text-align: left; background-color: #000000; color: white; font-size: 15px">M2 DE TIENDA</th>
                <th style="text-align: left; background-color: #000000; color: white; font-size: 15px">PRECIO POR M2</th>
            </tr>
            <tr>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <?php
                foreach ($centrocostosfinal3 as $cosf) {
                ?>
                    <td style="text-align: left; color: black; background-color: #ffffff;"><?= $cosf->m2prov ?><input type="hidden" size="15" style="font-size: 1.5em; color: black" id="mismom2inicio" value="500.72" readonly></td>
                <?php
                }
                ?>
                <td style="text-align: left; color: black; background-color: #ffffff;">$<?= $cosf->m2tiendafinalv2prov ?> MXN<input type="hidden" size="15" style="font-size: 1.5em; color: black" id="m2tiendafinal" value="<?= $cosf->m2tiendafinalv2prov ?>" readonly></td>
            </tr>
            <tr>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <td style="background-color: #ffffff;"></td>
                <th style="text-align: left; background-color: #000000; color: white; font-size: 20px">FINIQUITO</th>
                <td style="text-align: left; color: black; background-color: #ffffff;">$<?= $cosf->finiquitov2prov ?> MXN<input type="hidden" size="15" style="font-size: 1.5em; color: black" id="finiquito" value="<?= $cosf->finiquitov2prov ?>" readonly></td>
            </tr>
        </tbody>
    </table>
</body>

</html>