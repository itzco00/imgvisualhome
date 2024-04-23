<section id="main-content">
    <header class="header" style="position:fixed; background:#000000">
        <div>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <a href="<?= base_url() ?>Dashboard" class="logo"><b>AVANTE TEXTIL</b></a>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li>
                        <a class="logout" style="background-color: yellow; color: black" href="<?= base_url() ?>Dashboard/logout">CERRAR SESION</a>
                    </li>
                </ul>
                <?php
                foreach ($usernamemobi as $ius) {
                ?>
                <?php
                }
                ?>
                <?php if ($ius->mobi == 1) : ?>
                    <ul class="nav pull-right top-menu" style="padding-right:1%;padding-top:14px">
                        <li>
                            <!--<button type="button" id="loading_changes_btn" onclick="sendclicksave()" style="background:#000000;color: #ffffff; cursor: pointer; font-size: 1em; padding-top:6px; padding-bottom:6px; border-radius:5px; border:none">GUARDAR</button>-->
                        </li>
                    </ul>
                <?php else : ?>
                <?php endif ?>

                <script type="text/javascript">
                    function sendclicksave() {
                        document.getElementById('save_mob').click();
                    }
                </script>
            </div>
        </div>
    </header>
    <section class="wrapper">
        <?php
        foreach ($usernamemobi as $ius) {
        ?>
        <?php
        }
        ?>
        <?php if ($ius->mobi == 1) : ?>
            <!--
            <div style="padding-top: 15px;">
                <i type="button" id="cargardatos2" onclick="mostrardatos();"></i>
                <form action="<?= base_url() ?>Dashboard/actualizaTiendasObs" method="post">
                    <?php
                    foreach ($nombreusuario as $ius) {
                    ?>
                        <input type="hidden" id="usernamemobi" name="usernamemobi" value="<?= $ius->nombreusuario ?>">
                    <?php
                    }
                    ?>
                    <table class="table table-striped table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th colspan="8" rowspan="4" style="background-color: white; text-align: center"><img src="<?= base_url() ?>assets/img/profile3.png" style=" width: 600px;"></th>
                                <?php if ($mobiliarioproductosentrada == '') : ?>
                                <?php else : ?>
                                    <th colspan="<?= sizeof($mobiliarioproductosentrada) ?>" style="color: black; background-color: #CDCDCD; text-align: center; font-size: 1.5em">1.- PRODUCTOS ENTRADA</th>
                                <?php endif ?>
                                <?php if ($mobiliarioproductosdamaycaballero == '') : ?>
                                <?php else : ?>
                                    <th colspan="<?= sizeof($mobiliarioproductosdamaycaballero) ?>" style="color: black; background-color: #B7B7B7; text-align: center; font-size: 1.5em">2.- PRODUCTOS DAMA Y CABALLERO</th>
                                <?php endif ?>
                                <?php if ($mobiliarioproductosmujerhombrejr == '') : ?>
                                <?php else : ?>
                                    <th colspan="<?= sizeof($mobiliarioproductosmujerhombrejr) ?>" style="color: black; background-color: #CDCDCD; text-align: center; font-size: 1.5em">3.- MUJER HOMBRE JR</th>
                                <?php endif ?>
                                <?php if ($mobiliarioproductosinteriormujer == '') : ?>
                                <?php else : ?>
                                    <th colspan="<?= sizeof($mobiliarioproductosinteriormujer) ?>" style="color: black; background-color: #B7B7B7; text-align: center; font-size: 1.5em">4.- INTERIOR MUJER</th>
                                <?php endif ?>
                                <?php if ($mobiliarioproductosinfantilniñoyniña == '') : ?>
                                <?php else : ?>
                                    <th colspan="<?= sizeof($mobiliarioproductosinfantilniñoyniña) ?>" style="color: black; background-color: #CDCDCD; text-align: center; font-size: 1.5em">5.- INFANTIL NIÑO Y NIÑA</th>
                                <?php endif ?>
                                <?php if ($mobiliarioproductostoddlerniñoniñaybebes == '') : ?>
                                <?php else : ?>
                                    <th colspan="<?= sizeof($mobiliarioproductostoddlerniñoniñaybebes); ?>" style="color: black; background-color: #B7B7B7; text-align: center; font-size: 1.5em">6.- TODDLER NIÑO NIÑA Y BEBES</th>
                                <?php endif ?>
                                <?php if ($mobiliarioproductosherrajes == '') : ?>
                                <?php else : ?>
                                    <th colspan="<?= sizeof($mobiliarioproductosherrajes) ?>" style="color: black; background-color: #CDCDCD; text-align: center; font-size: 1.5em">7.- HERRAJES</th>
                                <?php endif ?>
                                <?php if ($mobiliarioproductosprobadores == '') : ?>
                                <?php else : ?>
                                    <th colspan="<?= sizeof($mobiliarioproductosprobadores) ?>" style="color: black; background-color: #B7B7B7; text-align: center; font-size: 1.5em">8.- PROBADORES</th>
                                <?php endif ?>
                                <?php if ($mobiliarioproductospaneles == '') : ?>
                                <?php else : ?>
                                    <th colspan="<?= sizeof($mobiliarioproductospaneles) ?>" style="color: black; background-color: #CDCDCD; text-align: center; font-size: 1.5em">9.- PANELES</th>
                                <?php endif ?>
                                <?php if ($mobiliarioproductosextras == '') : ?>
                                <?php else : ?>
                                    <th colspan="<?= sizeof($mobiliarioproductosextras) ?>" style="color: black; background-color: #B7B7B7; text-align: center; font-size: 1.5em">10.- EXTRAS</th>
                                <?php endif ?>
                                <?php if ($mobiliarioproductosimagen == '') : ?>
                                <?php else : ?>
                                    <th colspan="<?= sizeof($mobiliarioproductosimagen) ?>" style="color: black; background-color: #CDCDCD; text-align: center; font-size: 1.5em">11.- IMAGEN</th>
                                <?php endif ?>
                                <?php if ($mobiliarioproductosotros == '') : ?>
                                <?php else : ?>
                                    <th colspan="<?= sizeof($mobiliarioproductosotros) ?>" style="color: black; background-color: #B7B7B7; text-align: center; font-size: 1.5em">12.- OTROS</th>
                                <?php endif ?>
                            </tr>
                            <tr>
                                <?php
                                foreach ($mobiliarioproductosentrada as $mpe) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <?= $mpe->observaciones ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosdamaycaballero as $mpdc) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <?= $mpdc->observaciones ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosmujerhombrejr as $mpmhj) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <?= $mpmhj->observaciones ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosinteriormujer as $mpim) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <?= $mpim->observaciones ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosinfantilniñoyniña as $mpinn) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <?= $mpinn->observaciones ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductostoddlerniñoniñaybebes as $mptnnb) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <?= $mptnnb->observaciones ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosherrajes as $mph) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <?= $mph->observaciones ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosprobadores as $mppr) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <?= $mppr->observaciones ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductospaneles as $mppn) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <?= $mppn->observaciones ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosextras as $mpex) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <?= $mpex->observaciones ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosimagen as $mpin) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <?= $mpin->observaciones ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosotros as $mpo) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <?= $mpo->observaciones ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <th style="padding: 15px; color: black; text-align: center"></th>
                            </tr>
                            <tr>
                                <?php
                                foreach ($mobiliarioproductosentrada as $mpe) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <img style="border-radius: 15px;" src="<?= base_url("uploads/" . $mpe->archivo) ?>" height="100px" width="100px">
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosdamaycaballero as $mpdc) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <img style="border-radius: 15px;" src="<?= base_url("uploads/" . $mpdc->archivo) ?>" height="100px" width="100px">
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosmujerhombrejr as $mpmhj) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <img style="border-radius: 15px;" src="<?= base_url("uploads/" . $mpmhj->archivo) ?>" height="100px" width="100px">
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosinteriormujer as $mpim) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <img style="border-radius: 15px;" src="<?= base_url("uploads/" . $mpim->archivo) ?>" height="100px" width="100px">
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosinfantilniñoyniña as $mpinn) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <img style="border-radius: 15px;" src="<?= base_url("uploads/" . $mpinn->archivo) ?>" height="100px" width="100px">
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductostoddlerniñoniñaybebes as $mptnnb) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <img style="border-radius: 15px;" src="<?= base_url("uploads/" . $mptnnb->archivo) ?>" height="100px" width="100px">
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosherrajes as $mph) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <img style="border-radius: 15px;" src="<?= base_url("uploads/" . $mph->archivo) ?>" height="100px" width="100px">
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosprobadores as $mppr) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <img style="border-radius: 15px;" src="<?= base_url("uploads/" . $mppr->archivo) ?>" height="100px" width="100px">
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductospaneles as $mppn) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <img style="border-radius: 15px;" src="<?= base_url("uploads/" . $mppn->archivo) ?>" height="100px" width="100px">
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosextras as $mpex) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <img style="border-radius: 15px;" src="<?= base_url("uploads/" . $mpex->archivo) ?>" height="100px" width="100px">
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosimagen as $mpin) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <img style="border-radius: 15px;" src="<?= base_url("uploads/" . $mpin->archivo) ?>" height="100px" width="100px">
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosotros as $mpo) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <img style="border-radius: 15px;" src="<?= base_url("uploads/" . $mpo->archivo) ?>" height="100px" width="100px">
                                    </th>
                                <?php
                                }
                                ?>
                                <th style="padding: 15px; color: black; text-align: center"></th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th style="padding: 15px; color: black; background-color: #FFFBBC;">NO. DE TIENDA</th>
                                <th style="padding: 15px; color: black; background-color: #FFFBBC;">NOMBRE</th>
                                <th style="padding: 15px; color: black; background-color: #FFFBBC;">AÑO</th>
                                <th style="padding: 15px; color: black; background-color: #FFFBBC;">CONSTRUCCION</th>
                                <th style="padding: 15px; color: black; background-color: #FFFBBC;">LOCAL</th>
                                <th style="padding: 15px; color: black; background-color: #FFFBBC;">DEPTOS</th>
                                <th style="padding: 15px; color: black; background-color: #FFFBBC;">M2 PISO VENTA</th>
                                <th style="padding: 15px; color: black; background-color: #FFFBBC;">M2 BODEGA</th>
                                <?php
                                foreach ($mobiliarioproductosentrada as $mpe) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <?= $mpe->nombre ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosdamaycaballero as $mpdc) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <?= $mpdc->nombre ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosmujerhombrejr as $mpmhj) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <?= $mpmhj->nombre ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosinteriormujer as $mpim) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <?= $mpim->nombre ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosinfantilniñoyniña as $mpinn) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <?= $mpinn->nombre ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductostoddlerniñoniñaybebes as $mptnnb) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <?= $mptnnb->nombre ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosherrajes as $mph) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <?= $mph->nombre ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosprobadores as $mppr) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <?= $mppr->nombre ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductospaneles as $mppn) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <?= $mppn->nombre ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosextras as $mpex) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <?= $mpex->nombre ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosimagen as $mpin) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #CDCDCD;">
                                        <?= $mpin->nombre ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <?php
                                foreach ($mobiliarioproductosotros as $mpo) {
                                ?>
                                    <th style="padding: 15px; color: black; background-color: #B7B7B7;">
                                        <?= $mpo->nombre ?>
                                    </th>
                                <?php
                                }
                                ?>
                                <th style="padding: 15px; color: black; text-align: center; font-size: 2em;">QUICIERAMOS CRECERLA</th>
                            </tr>
                        </thead>
                        <tbody id="subtable">
                            <?php
                            $filasid = 0;
                            foreach ($tiendas as $tnd) {
                                $filasid++;
                            ?>
                                <tr id="<?= $filasid ?>">
                                    <th style="padding: 15px; color: black;">
                                        <?= $tnd->numerodetienda ?>
                                        <div id="muestraiconodesplegarcolor-<?= $filasid ?>">
                                            <i id="<?= $filasid ?>" class="desplegarcolores fa fa-magic" aria-hidden="true" style="cursor: pointer"></i>
                                        </div>
                                        <div id="muestraiconoocultarcolor-<?= $filasid ?>" style="display: none;">
                                            <i id="<?= $filasid ?>" class="ocultarcolores fa fa-eye-slash" aria-hidden="true" style="cursor: pointer"></i>
                                        </div>
                                    </th>
                                    <?php if ($tnd->color == "0") : ?>
                                        <th style="background-color: white; padding: 15px; color: black;" id="cell-name-row-<?= $filasid ?>">
                                            <?= $tnd->nombre ?>
                                            <input type="hidden" id="valorcolor-<?= $filasid ?>" value="<?= $tnd->color ?>">
                                            <div id="color-fila-<?= $filasid ?>" style="display: none;">
                                                <i type="button" class="setgreen btn btn-outline-dark fa fa-paint-brush" style="background-color: #00E022; cursor: pointer" value="1" id="<?= $filasid ?>"></i>
                                                <i type="button" class="setyellow btn btn-outline-dark fa fa-paint-brush" style="background-color: #F0FF08; cursor: pointer" value="2" id="<?= $filasid ?>"></i>
                                                <i type="button" class="setpink btn btn-outline-dark fa fa-paint-brush" style="background-color: #FF35ED; cursor: pointer" value="3" id="<?= $filasid ?>"></i>
                                                <i type="button" class="setwhite btn btn-outline-dark fa fa-paint-brush" style="background-color: #FFFFFF; cursor: pointer" value="0" id="<?= $filasid ?>"></i>
                                            </div>
                                        </th>
                                    <?php elseif ($tnd->color == "1") : ?>
                                        <th style="background-color: #00E022; padding: 15px; color: black;" id="cell-name-row-<?= $filasid ?>">
                                            <?= $tnd->nombre ?>
                                            <input type="hidden" id="valorcolor-<?= $filasid ?>" value="<?= $tnd->color ?>">
                                            <div id="color-fila-<?= $filasid ?>" style="display: none;">
                                                <i type="button" class="setgreen btn btn-outline-dark fa fa-paint-brush" style="background-color: #00E022; cursor: pointer" value="1" id="<?= $filasid ?>"></i>
                                                <i type="button" class="setyellow btn btn-outline-dark fa fa-paint-brush" style="background-color: #F0FF08; cursor: pointer" value="2" id="<?= $filasid ?>"></i>
                                                <i type="button" class="setpink btn btn-outline-dark fa fa-paint-brush" style="background-color: #FF35ED; cursor: pointer" value="3" id="<?= $filasid ?>"></i>
                                                <i type="button" class="setwhite btn btn-outline-dark fa fa-paint-brush" style="background-color: #FFFFFF; cursor: pointer" value="0" id="<?= $filasid ?>"></i>
                                            </div>
                                        </th>
                                    <?php elseif ($tnd->color == "2") : ?>
                                        <th style="background-color: #F0FF08; padding: 15px; color: black;" id="cell-name-row-<?= $filasid ?>">
                                            <?= $tnd->nombre ?>
                                            <input type="hidden" id="valorcolor-<?= $filasid ?>" value="<?= $tnd->color ?>">
                                            <div id="color-fila-<?= $filasid ?>" style="display: none;">
                                                <i type="button" class="setgreen btn btn-outline-dark fa fa-paint-brush" style="background-color: #00E022; cursor: pointer" value="1" id="<?= $filasid ?>"></i>
                                                <i type="button" class="setyellow btn btn-outline-dark fa fa-paint-brush" style="background-color: #F0FF08; cursor: pointer" value="2" id="<?= $filasid ?>"></i>
                                                <i type="button" class="setpink btn btn-outline-dark fa fa-paint-brush" style="background-color: #FF35ED; cursor: pointer" value="3" id="<?= $filasid ?>"></i>
                                                <i type="button" class="setwhite btn btn-outline-dark fa fa-paint-brush" style="background-color: #FFFFFF; cursor: pointer" value="0" id="<?= $filasid ?>"></i>
                                            </div>
                                        </th>
                                    <?php elseif ($tnd->color == "3") : ?>
                                        <th style="background-color: #FF35ED; padding: 15px; color: black;" id="cell-name-row-<?= $filasid ?>">
                                            <?= $tnd->nombre ?>
                                            <input type="hidden" id="valorcolor-<?= $filasid ?>" value="<?= $tnd->color ?>">
                                            <div id="color-fila-<?= $filasid ?>" style="display: none;">
                                                <i type="button" class="setgreen btn btn-outline-dark fa fa-paint-brush" style="background-color: #00E022; cursor: pointer" value="1" id="<?= $filasid ?>"></i>
                                                <i type="button" class="setyellow btn btn-outline-dark fa fa-paint-brush" style="background-color: #F0FF08; cursor: pointer" value="2" id="<?= $filasid ?>"></i>
                                                <i type="button" class="setpink btn btn-outline-dark fa fa-paint-brush" style="background-color: #FF35ED; cursor: pointer" value="3" id="<?= $filasid ?>"></i>
                                                <i type="button" class="setwhite btn btn-outline-dark fa fa-paint-brush" style="background-color: #FFFFFF; cursor: pointer" value="0" id="<?= $filasid ?>"></i>
                                            </div>
                                        </th>
                                    <?php else : ?>
                                    <?php endif ?>

                                    <th style="padding: 15px; color: black;">
                                        <?= $tnd->año ?>
                                    </th>
                                    <th style="padding: 15px; color: black;">
                                        <?= $tnd->construccion ?>
                                    </th>
                                    <th style="padding: 15px; color: black;">
                                        <?= $tnd->local ?>
                                    </th>
                                    <th style="padding: 15px; color: black;">
                                        <?= $tnd->deptos ?>
                                    </th>
                                    <th style="padding: 15px; color: black;">
                                        <?= $tnd->m2pisoventa ?>
                                    </th>
                                    <th style="padding: 15px; color: black;">
                                        <?= $tnd->m2bodega ?>
                                    </th>

                                    <?php
                                    $colent = 1000;
                                    foreach ($mobiliarioproductosentrada as $mpe) {
                                        $colent++;
                                    ?>
                                        <td id="<?= $filasid ?>-<?= $colent ?>" class="nombrestiendayprod" style="padding: 15px; color: black;">
                                            <input style="background-color: #D2FFB3" type="hidden" id="nombretienda-<?= $filasid ?>-<?= $colent ?>" value="<?= $tnd->id ?>">
                                            <input style="background-color: #FFD1C8" type="hidden" id="nombreprod-<?= $filasid ?>-<?= $colent ?>" value="<?= $mpe->id ?>">
                                            <i type="button" class="getntiendaidprodent" style="background-color: chartreuse; color: #000000; cursor: pointer; font-size: 1.1em" id="<?= $filasid ?>-<?= $colent ?>"></i>
                                            <span style="font-size: 1.5em;" id="cuadro_de_texto-<?= $filasid ?>-<?= $colent ?>"></span>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $colmpdc = 2000;
                                    foreach ($mobiliarioproductosdamaycaballero as $mpdc) {
                                        $colmpdc++;
                                    ?>
                                        <td id="<?= $filasid ?>-<?= $colmpdc ?>" class="nombrestiendayprod" style="padding: 15px; color: black;">
                                            <input style="background-color: #D2FFB3" type="hidden" id="nombretienda-<?= $filasid ?>-<?= $colmpdc ?>" value="<?= $tnd->id ?>">
                                            <input style="background-color: #AFAFFF" type="hidden" id="nombreprod-<?= $filasid ?>-<?= $colmpdc ?>" value="<?= $mpdc->id ?>">
                                            <i type="button" class="getntiendaidprodmpdc" style="background-color: chartreuse; color: #000000; cursor: pointer; font-size: 1.1em" id="<?= $filasid ?>-<?= $colmpdc ?>"></i>
                                            <span style="font-size: 1.5em;" id="cuadro_de_texto-<?= $filasid ?>-<?= $colmpdc ?>"></span>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $colmpmhj = 3000;
                                    foreach ($mobiliarioproductosmujerhombrejr as $mpmhj) {
                                        $colmpmhj++;
                                    ?>
                                        <td id="<?= $filasid ?>-<?= $colmpmhj ?>" class="nombrestiendayprod" style="padding: 15px; color: black;">
                                            <input style="background-color: #D2FFB3" type="hidden" id="nombretienda-<?= $filasid ?>-<?= $colmpmhj ?>" value="<?= $tnd->id ?>">
                                            <input style="background-color: #FEFFA5" type="hidden" id="nombreprod-<?= $filasid ?>-<?= $colmpmhj ?>" value="<?= $mpmhj->id ?>">
                                            <i type="button" class="getntiendaidprodmpmhj" style="background-color: chartreuse; color: #000000; cursor: pointer; font-size: 1.1em" id="<?= $filasid ?>-<?= $colmpmhj ?>"></i>
                                            <span style="font-size: 1.5em;" id="cuadro_de_texto-<?= $filasid ?>-<?= $colmpmhj ?>"></span>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $colmpim = 4000;
                                    foreach ($mobiliarioproductosinteriormujer as $mpim) {
                                        $colmpim++;
                                    ?>
                                        <td id="<?= $filasid ?>-<?= $colmpim ?>" class="nombrestiendayprod" style="padding: 15px; color: black;">
                                            <input style="background-color: #D2FFB3" type="hidden" id="nombretienda-<?= $filasid ?>-<?= $colmpim ?>" value="<?= $tnd->id ?>">
                                            <input style="background-color: #B6FDFE" type="hidden" id="nombreprod-<?= $filasid ?>-<?= $colmpim ?>" value="<?= $mpim->id ?>">
                                            <i type="button" class="getntiendaidprodmpim" style="background-color: chartreuse; color: #000000; cursor: pointer; font-size: 1.1em" id="<?= $filasid ?>-<?= $colmpim ?>"></i>
                                            <span style="font-size: 1.5em;" id="cuadro_de_texto-<?= $filasid ?>-<?= $colmpim ?>"></span>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $colmpinn = 5000;
                                    foreach ($mobiliarioproductosinfantilniñoyniña as $mpinn) {
                                        $colmpinn++;
                                    ?>
                                        <td id="<?= $filasid ?>-<?= $colmpinn ?>" class="nombrestiendayprod" style="padding: 15px; color: black;">
                                            <input style="background-color: #D2FFB3" type="hidden" id="nombretienda-<?= $filasid ?>-<?= $colmpinn ?>" value="<?= $tnd->id ?>">
                                            <input style="background-color: #53FA71" type="hidden" id="nombreprod-<?= $filasid ?>-<?= $colmpinn ?>" value="<?= $mpinn->id ?>">
                                            <i type="button" class="getntiendaidprodmpinn" style="background-color: chartreuse; color: #000000; cursor: pointer; font-size: 1.1em" id="<?= $filasid ?>-<?= $colmpinn ?>"></i>
                                            <span style="font-size: 1.5em;" id="cuadro_de_texto-<?= $filasid ?>-<?= $colmpinn ?>"></span>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $colmptnnb = 6000;
                                    foreach ($mobiliarioproductostoddlerniñoniñaybebes as $mptnnb) {
                                        $colmptnnb++;
                                    ?>
                                        <td id="<?= $filasid ?>-<?= $colmptnnb ?>" class="nombrestiendayprod" style="padding: 15px; color: black;">
                                            <input style="background-color: #D2FFB3" type="hidden" id="nombretienda-<?= $filasid ?>-<?= $colmptnnb ?>" value="<?= $tnd->id ?>">
                                            <input style="background-color: #E676FF" type="hidden" id="nombreprod-<?= $filasid ?>-<?= $colmptnnb ?>" value="<?= $mptnnb->id ?>">
                                            <i type="button" class="getntiendaidprodmptnnb" style="background-color: chartreuse; color: #000000; cursor: pointer; font-size: 1.1em" id="<?= $filasid ?>-<?= $colmptnnb ?>"></i>
                                            <span style="font-size: 1.5em;" id="cuadro_de_texto-<?= $filasid ?>-<?= $colmptnnb ?>"></span>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $colmph = 7000;
                                    foreach ($mobiliarioproductosherrajes as $mph) {
                                        $colmph++;
                                    ?>
                                        <td id="<?= $filasid ?>-<?= $colmph ?>" class="nombrestiendayprod" style="padding: 15px; color: black;">
                                            <input style="background-color: #D2FFB3" type="hidden" id="nombretienda-<?= $filasid ?>-<?= $colmph ?>" value="<?= $tnd->id ?>">
                                            <input style="background-color: #7689FF" type="hidden" id="nombreprod-<?= $filasid ?>-<?= $colmph ?>" value="<?= $mph->id ?>">
                                            <i type="button" class="getntiendaidprodmph" style="background-color: chartreuse; color: #000000; cursor: pointer; font-size: 1.1em" id="<?= $filasid ?>-<?= $colmph ?>"></i>
                                            <span style="font-size: 1.5em;" id="cuadro_de_texto-<?= $filasid ?>-<?= $colmph ?>"></span>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $colmppr = 8000;
                                    foreach ($mobiliarioproductosprobadores as $mppr) {
                                        $colmppr++;
                                    ?>
                                        <td id="<?= $filasid ?>-<?= $colmppr ?>" class="nombrestiendayprod" style="padding: 15px; color: black;">
                                            <input style="background-color: #D2FFB3" type="hidden" id="nombretienda-<?= $filasid ?>-<?= $colmppr ?>" value="<?= $tnd->id ?>">
                                            <input style="background-color: #FFBB76" type="hidden" id="nombreprod-<?= $filasid ?>-<?= $colmppr ?>" value="<?= $mppr->id ?>">
                                            <i type="button" class="getntiendaidprodmppr" style="background-color: chartreuse; color: #000000; cursor: pointer; font-size: 1.1em" id="<?= $filasid ?>-<?= $colmppr ?>"></i>
                                            <span style="font-size: 1.5em;" id="cuadro_de_texto-<?= $filasid ?>-<?= $colmppr ?>"></span>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $colmppn = 9000;
                                    foreach ($mobiliarioproductospaneles as $mppn) {
                                        $colmppn++;
                                    ?>
                                        <td id="<?= $filasid ?>-<?= $colmppn ?>" class="nombrestiendayprod" style="padding: 15px; color: black;">
                                            <input style="background-color: #D2FFB3" type="hidden" id="nombretienda-<?= $filasid ?>-<?= $colmppn ?>" value="<?= $tnd->id ?>">
                                            <input style="background-color: #FFF576" type="hidden" id="nombreprod-<?= $filasid ?>-<?= $colmppn ?>" value="<?= $mppn->id ?>">
                                            <i type="button" class="getntiendaidprodmppn" style="background-color: chartreuse; color: #000000; cursor: pointer; font-size: 1.1em" id="<?= $filasid ?>-<?= $colmppn ?>"></i>
                                            <span style="font-size: 1.5em;" id="cuadro_de_texto-<?= $filasid ?>-<?= $colmppn ?>"></span>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $colmpex = 10000;
                                    foreach ($mobiliarioproductosextras as $mpex) {
                                        $colmpex++;
                                    ?>
                                        <td id="<?= $filasid ?>-<?= $colmpex ?>" class="nombrestiendayprod" style="padding: 15px; color: black;">
                                            <input style="background-color: #D2FFB3" type="hidden" id="nombretienda-<?= $filasid ?>-<?= $colmpex ?>" value="<?= $tnd->id ?>">
                                            <input style="background-color: #9C76FF" type="hidden" id="nombreprod-<?= $filasid ?>-<?= $colmpex ?>" value="<?= $mpex->id ?>">
                                            <i type="button" class="getntiendaidprodmpex" style="background-color: chartreuse; color: #000000; cursor: pointer; font-size: 1.1em" id="<?= $filasid ?>-<?= $colmpex ?>"></i>
                                            <span style="font-size: 1.5em;" id="cuadro_de_texto-<?= $filasid ?>-<?= $colmpex ?>"></span>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $colmpin = 11000;
                                    foreach ($mobiliarioproductosimagen as $mpin) {
                                        $colmpin++;
                                    ?>
                                        <td id="<?= $filasid ?>-<?= $colmpin ?>" class="nombrestiendayprod" style="padding: 15px; color: black;">
                                            <input style="background-color: #D2FFB3" type="hidden" id="nombretienda-<?= $filasid ?>-<?= $colmpin ?>" value="<?= $tnd->id ?>">
                                            <input style="background-color: #6EFF7D" type="hidden" id="nombreprod-<?= $filasid ?>-<?= $colmpin ?>" value="<?= $mpin->id ?>">
                                            <i type="button" class="getntiendaidprodmpin" style="background-color: chartreuse; color: #000000; cursor: pointer; font-size: 1.1em" id="<?= $filasid ?>-<?= $colmpin ?>"></i>
                                            <span style="font-size: 1.5em;" id="cuadro_de_texto-<?= $filasid ?>-<?= $colmpin ?>"></span>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $colmpo = 12000;
                                    foreach ($mobiliarioproductosotros as $mpo) {
                                        $colmpo++;
                                    ?>
                                        <td id="<?= $filasid ?>-<?= $colmpo ?>" class="nombrestiendayprod" style="padding: 15px; color: black;">
                                            <input style="background-color: #D2FFB3" type="hidden" id="nombretienda-<?= $filasid ?>-<?= $colmpo ?>" value="<?= $tnd->id ?>">
                                            <input style="background-color: #E676FF" type="hidden" id="nombreprod-<?= $filasid ?>-<?= $colmpo ?>" value="<?= $mpo->id ?>">
                                            <i type="button" class="getntiendaidprodmpo" style="background-color: chartreuse; color: #000000; cursor: pointer; font-size: 1.1em" id="<?= $filasid ?>-<?= $colmpo ?>"></i>
                                            <span style="font-size: 1.5em;" id="cuadro_de_texto-<?= $filasid ?>-<?= $colmpo ?>"></span>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <th style="padding: 15px; color: black;">
                                        <input type="hidden" size="5" style="border: none;" name="idtiendas[]" value="<?= $tnd->id ?>">
                                        <input type="hidden" size="5" style="border: none;" id="valor2color-<?= $filasid ?>" name="valorcolortiendas[]" value="<?= $tnd->color ?>">
                                        <input type="text" size="70" style="border: none; text-align: center;" name="obstiendas[]" value="<?= $tnd->observaciones ?>">
                                    </th>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-outline-dark" id="save_mob" style="background-color: black; color: #ffffff; cursor: pointer; font-size: 1.7em">GUARDAR</button>
                    <br>
                    <br>
                </form>
            </div>
                        -->
            <div style="padding-top:2%">
                <table style="width: 100%; text-align: center; border: 1px solid #ddd;">
                    <?php if ($sumasprod !== NULL) { ?>
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
            </div>
        <?php else : ?>
        <?php endif ?>
    </section>
</section>

<script type="text/javascript">
    window.addEventListener('load', function() {
        document.getElementById('cargardatos').click();
    });
</script>

<script type="text/javascript">
    function mostrardatos() {
        $('.getntiendaidprodent').trigger('click');
        $('.getntiendaidprodmpdc').trigger('click');
        $('.getntiendaidprodmpmhj').trigger('click');
        $('.getntiendaidprodmpim').trigger('click');
        $('.getntiendaidprodmpinn').trigger('click');
        $('.getntiendaidprodmptnnb').trigger('click');
        $('.getntiendaidprodmph').trigger('click');
        $('.getntiendaidprodmppr').trigger('click');
        $('.getntiendaidprodmppn').trigger('click');
        $('.getntiendaidprodmpex').trigger('click');
        $('.getntiendaidprodmpin').trigger('click');
        $('.getntiendaidprodmpo').trigger('click');
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        //1.0 FUNCION MUESTRA CONSULTA ENTRADA ********************************************************
        $(".getntiendaidprodent").click(function() {
            var row_ident = $(this).attr("id");
            var tiendaent = document.getElementById('nombretienda-' + row_ident).value;
            var nombreent = document.getElementById('nombreprod-' + row_ident).value;
            //console.log(tiendaent);
            //console.log(nombreent);
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>Dashboard/imprimesumatotalent",
                data: {
                    'tiendaent': tiendaent,
                    'nombreent': nombreent,
                }
            }).done(function(consultaent) {
                document.getElementById('cuadro_de_texto-' + row_ident).innerHTML = consultaent;
                //console.log(consultaent);
            });
        });

        //2.0 FUNCION MUESTRA CONSULTA DAMA Y CABALLERO ********************************************************
        $(".getntiendaidprodmpdc").click(function() {
            var row_idmpdc = $(this).attr("id");
            var tiendampdc = document.getElementById('nombretienda-' + row_idmpdc).value;
            var nombrempdc = document.getElementById('nombreprod-' + row_idmpdc).value;
            //console.log(tiendampdc);
            //console.log(nombrempdc);
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>Dashboard/imprimesumatotalmpdc",
                data: {
                    'tiendampdc': tiendampdc,
                    'nombrempdc': nombrempdc,
                }
            }).done(function(consultampdc) {
                document.getElementById('cuadro_de_texto-' + row_idmpdc).innerHTML = consultampdc;
                //console.log(consultampdc);
            });
        });

        //3.0 FUNCION MUESTRA CONSULTA MUJER HOMBRE JR ********************************************************
        $(".getntiendaidprodmpmhj").click(function() {
            var row_idmpmhj = $(this).attr("id");
            var tiendampmhj = document.getElementById('nombretienda-' + row_idmpmhj).value;
            var nombrempmhj = document.getElementById('nombreprod-' + row_idmpmhj).value;
            //console.log(tiendampmhj);
            //console.log(nombrempmhj);
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>Dashboard/imprimesumatotalmpmhj",
                data: {
                    'tiendampmhj': tiendampmhj,
                    'nombrempmhj': nombrempmhj,
                }
            }).done(function(consultampmhj) {
                document.getElementById('cuadro_de_texto-' + row_idmpmhj).innerHTML = consultampmhj;
                //console.log(consultampmhj);
            });
        });
        //4.0 FUNCION MUESTRA CONSULTA INTERIOR MUJER ********************************************************
        $(".getntiendaidprodmpim").click(function() {
            var row_idmpim = $(this).attr("id");
            var tiendampim = document.getElementById('nombretienda-' + row_idmpim).value;
            var nombrempim = document.getElementById('nombreprod-' + row_idmpim).value;
            //console.log(tiendampim);
            //console.log(nombrempim);
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>Dashboard/imprimesumatotalmpim",
                data: {
                    'tiendampim': tiendampim,
                    'nombrempim': nombrempim,
                }
            }).done(function(consultampim) {
                document.getElementById('cuadro_de_texto-' + row_idmpim).innerHTML = consultampim;
                //console.log(consultampim);
            });
        });

        //5.0 FUNCION MUESTRA CONSULTA INFANTIL NIÑO Y NIÑA ********************************************************
        $(".getntiendaidprodmpinn").click(function() {
            var row_idmpinn = $(this).attr("id");
            var tiendampinn = document.getElementById('nombretienda-' + row_idmpinn).value;
            var nombrempinn = document.getElementById('nombreprod-' + row_idmpinn).value;
            //console.log(tiendampinn);
            //console.log(nombrempinn);
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>Dashboard/imprimesumatotalmpinn",
                data: {
                    'tiendampinn': tiendampinn,
                    'nombrempinn': nombrempinn,
                }
            }).done(function(consultampinn) {
                document.getElementById('cuadro_de_texto-' + row_idmpinn).innerHTML = consultampinn;
                //console.log(consultampinn);
            });
        });

        //6.0 FUNCION MUESTRA CONSULTA TODDLER NIÑO NIÑA Y BEBES ********************************************************
        $(".getntiendaidprodmptnnb").click(function() {
            var row_idmptnnb = $(this).attr("id");
            var tiendamptnnb = document.getElementById('nombretienda-' + row_idmptnnb).value;
            var nombremptnnb = document.getElementById('nombreprod-' + row_idmptnnb).value;
            //console.log(tiendamptnnb);
            //console.log(nombremptnnb);
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>Dashboard/imprimesumatotalmptnnb",
                data: {
                    'tiendamptnnb': tiendamptnnb,
                    'nombremptnnb': nombremptnnb,
                }
            }).done(function(consultamptnnb) {
                document.getElementById('cuadro_de_texto-' + row_idmptnnb).innerHTML = consultamptnnb;
                //console.log(consultamptnnb);
            });
        });

        //7.0 FUNCION MUESTRA CONSULTA HERRAJES ********************************************************
        $(".getntiendaidprodmph").click(function() {
            var row_idmph = $(this).attr("id");
            var tiendamph = document.getElementById('nombretienda-' + row_idmph).value;
            var nombremph = document.getElementById('nombreprod-' + row_idmph).value;
            //console.log(tiendamph);
            //console.log(nombremph);
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>Dashboard/imprimesumatotalmph",
                data: {
                    'tiendamph': tiendamph,
                    'nombremph': nombremph,
                }
            }).done(function(consultamph) {
                document.getElementById('cuadro_de_texto-' + row_idmph).innerHTML = consultamph;
                //console.log(consultamph);
            });
        });

        //8.0 FUNCION MUESTRA CONSULTA PROBADORES ********************************************************
        $(".getntiendaidprodmppr").click(function() {
            var row_idmppr = $(this).attr("id");
            var tiendamppr = document.getElementById('nombretienda-' + row_idmppr).value;
            var nombremppr = document.getElementById('nombreprod-' + row_idmppr).value;
            //console.log(tiendamppr);
            //console.log(nombremppr);
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>Dashboard/imprimesumatotalmppr",
                data: {
                    'tiendamppr': tiendamppr,
                    'nombremppr': nombremppr,
                }
            }).done(function(consultamppr) {
                document.getElementById('cuadro_de_texto-' + row_idmppr).innerHTML = consultamppr;
                //console.log(consultamppr);
            });
        });

        //9.0 FUNCION MUESTRA CONSULTA PANELES ********************************************************
        $(".getntiendaidprodmppn").click(function() {
            var row_idmppn = $(this).attr("id");
            var tiendamppn = document.getElementById('nombretienda-' + row_idmppn).value;
            var nombremppn = document.getElementById('nombreprod-' + row_idmppn).value;
            //console.log(tiendamppn);
            //console.log(nombremppn);
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>Dashboard/imprimesumatotalmppn",
                data: {
                    'tiendamppn': tiendamppn,
                    'nombremppn': nombremppn,
                }
            }).done(function(consultamppn) {
                document.getElementById('cuadro_de_texto-' + row_idmppn).innerHTML = consultamppn;
                //console.log(consultamppn);
            });
        });

        //10.0 FUNCION MUESTRA CONSULTA EXTRAS ********************************************************
        $(".getntiendaidprodmpex").click(function() {
            var row_idmpex = $(this).attr("id");
            var tiendampex = document.getElementById('nombretienda-' + row_idmpex).value;
            var nombrempex = document.getElementById('nombreprod-' + row_idmpex).value;
            //console.log(tiendampex);
            //console.log(nombrempex);
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>Dashboard/imprimesumatotalmpex",
                data: {
                    'tiendampex': tiendampex,
                    'nombrempex': nombrempex,
                }
            }).done(function(consultampex) {
                document.getElementById('cuadro_de_texto-' + row_idmpex).innerHTML = consultampex;
                //console.log(consultampex);
            });
        });

        //11.0 FUNCION MUESTRA CONSULTA IMAGEN ********************************************************
        $(".getntiendaidprodmpin").click(function() {
            var row_idmpin = $(this).attr("id");
            var tiendampin = document.getElementById('nombretienda-' + row_idmpin).value;
            var nombrempin = document.getElementById('nombreprod-' + row_idmpin).value;
            //console.log(tiendampin);
            //console.log(nombrempin);
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>Dashboard/imprimesumatotalmpin",
                data: {
                    'tiendampin': tiendampin,
                    'nombrempin': nombrempin,
                }
            }).done(function(consultampin) {
                document.getElementById('cuadro_de_texto-' + row_idmpin).innerHTML = consultampin;
                //console.log(consultampin);
            });
        });

        //12.0 FUNCION MUESTRA CONSULTA OTROS ********************************************************
        $(".getntiendaidprodmpo").click(function() {
            var row_idmpo = $(this).attr("id");
            var tiendampo = document.getElementById('nombretienda-' + row_idmpo).value;
            var nombrempo = document.getElementById('nombreprod-' + row_idmpo).value;
            //console.log(tiendampo);
            //console.log(nombrempo);
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>Dashboard/imprimesumatotalmpo",
                data: {
                    'tiendampo': tiendampo,
                    'nombrempo': nombrempo,
                }
            }).done(function(consultampo) {
                document.getElementById('cuadro_de_texto-' + row_idmpo).innerHTML = consultampo;
                //console.log(consultampo);
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".desplegarcolores").click(function() {
            var getRowIdColor1 = $(this).attr("id");
            var divmuestraiconodesplegar1 = document.getElementById('muestraiconodesplegarcolor-' + getRowIdColor1);
            var divmuestraiconoocultar1 = document.getElementById('muestraiconoocultarcolor-' + getRowIdColor1);
            var valdivcolors1 = document.getElementById('color-fila-' + getRowIdColor1);
            valdivcolors1.style.display = 'block';
            divmuestraiconodesplegar1.style.display = 'none';
            divmuestraiconoocultar1.style.display = 'block';

        });
        $(".ocultarcolores").click(function() {
            var getRowIdColor2 = $(this).attr("id");
            var divmuestraiconodesplegar2 = document.getElementById('muestraiconodesplegarcolor-' + getRowIdColor2);
            var divmuestraiconoocultar2 = document.getElementById('muestraiconoocultarcolor-' + getRowIdColor2);
            var valdivcolors2 = document.getElementById('color-fila-' + getRowIdColor2);
            valdivcolors2.style.display = 'none';
            divmuestraiconodesplegar2.style.display = 'block';
            divmuestraiconoocultar2.style.display = 'none';
        });
    });
</script>
<script type="text/javascript">
    $(document).on('click', '.setgreen', function() {
        var row_idgreen = $(this).attr("id");
        var green = "1";
        document.getElementById('valorcolor-' + row_idgreen).value = green;
        document.getElementById('valor2color-' + row_idgreen).value = green;
        $('#cell-name-row-' + row_idgreen).css('background-color', '#00E022');
    });
</script>
<script type="text/javascript">
    $(document).on('click', '.setyellow', function() {
        var row_idyellow = $(this).attr("id");
        var yellow = "2";
        document.getElementById('valorcolor-' + row_idyellow).value = yellow;
        document.getElementById('valor2color-' + row_idyellow).value = yellow;
        $('#cell-name-row-' + row_idyellow).css('background-color', '#F0FF08');
    });
</script>
<script type="text/javascript">
    $(document).on('click', '.setpink', function() {
        var row_idpink = $(this).attr("id");
        var pink = "3";
        document.getElementById('valorcolor-' + row_idpink).value = pink;
        document.getElementById('valor2color-' + row_idpink).value = pink;
        $('#cell-name-row-' + row_idpink).css('background-color', '#FF35ED');
    });
</script>
<script type="text/javascript">
    $(document).on('click', '.setwhite', function() {
        var row_idwhite = $(this).attr("id");
        var white = "0";
        document.getElementById('valorcolor-' + row_idwhite).value = white;
        document.getElementById('valor2color-' + row_idwhite).value = white;
        $('#cell-name-row-' + row_idwhite).css('background-color', '#FFFFFF');
    });
</script>