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
                foreach ($usernamecons as $ius) {
                ?>
                <?php
                }
                ?>
                <?php if ($ius->rolusuario == 1) : ?>
                    <ul class="nav pull-right top-menu" style="padding-right:1%;padding-top:8px">
                        <li>
                            <form action="<?= base_url() ?>Dashboard/verPapelera2" method="post">
                                <button type="submit" style="border:none; background:transparent"><img src="<?= base_url() ?>assets/img/trashcan.png" style=" width: 40px"></button>
                                <input type="hidden" name="usernamepapdetalle" id="usernamepapdetalle" value="<?= $ius->nombreusuario ?>">
                            </form>
                        </li>
                    </ul>
                <?php else : ?>
                <?php endif ?>
            </div>
        </div>
    </header>
    <section class="wrapper">
        <?php
        foreach ($usernamecons as $ius) {
        ?>
        <?php
        }
        ?>
        <?php if ($ius->consultas == 1) : ?>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <div class="col-lg-12 ">
                            <h1 style="justify-content: center; color: black" class="mb">DETALLE DE COMPRA</h1>
                        </div>
                        <div class="row mt">
                            <div class="col-lg-12">
                                <div class="form-panel" style="background-color:#E1E1E1">
                                    <h4 class="mb"></h4>
                                    <div class="row mt">
                                        <div class="col-lg-12">
                                            <div class="form-panel">
                                                <h5 class="mb"></h5>
                                                <table class="table">
                                                    <thead>
                                                        <tr style="width:100%; justify-content: center; text-align: center">
                                                            <th style="text-align: left; font-size: 2em; color: black">ORDEN DE COMPRA</th>
                                                            <th style="text-align: center; font-size: 2em; color: black">FECHA / HORA</th>
                                                            <th style="text-align: center; font-size: 2em; color: black">PEDIDO COMPLETADO</th>
                                                            <th style="text-align: center; font-size: 2em; color: black">PEDIDO PROVEEDOR</th>
                                                            <?php if ($ius->rolusuario == 1) : ?>
                                                                <th style="text-align: center; font-size: 2em; color: black">DETALLE</th>
                                                            <?php else : ?>
                                                            <?php endif ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="numerocompra" name="numerocompra">
                                                        <?php
                                                        foreach ($productos as $p) {
                                                        ?>
                                                            <tr id="orden<?= $p->id ?>" style="justify-content: center; text-align: center">
                                                                <td style="font-size: 1.5em; color: black; text-align:left"><?= $p->tienda ?><!--<?= $p->id ?>--></td>
                                                                <td style="font-size: 1.5em; color: black"><?= $p->numordencompra ?></td>
                                                                <td>
                                                                    <form action="<?= base_url() ?>Dashboard/verDetalleCompra" method="post">
                                                                        <span style="font-size: 1.5em; color: black">VER DETALLE </span>
                                                                        <label></label>
                                                                        <input type="hidden" id="usernamecons" name="usernamecons" value="<?= $ius->nombreusuario ?>">
                                                                        <input type="hidden" name="numerocompra" id="numerocompra" value="<?= $p->numordencompra ?>">
                                                                        <input type="hidden" name="tienda_name" id="tienda_name" value="<?= $p->tienda ?>">
                                                                        <button button type="submit" class="btn btn-light fa fa-info-circle fa-lg" style="color: #000000; cursor: pointer"></button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <form action="<?= base_url() ?>Dashboard/verDetalleCompra2" method="post">
                                                                        <span style="font-size: 1.5em; color: black">VER DETALLE </span>
                                                                        <label></label>
                                                                        <input type="hidden" id="usernamecons2" name="usernamecons2" value="<?= $ius->nombreusuario ?>">
                                                                        <input type="hidden" name="numerocompra2" id="numerocompra2" value="<?= $p->numordencompra ?>">
                                                                        <input type="hidden" name="tienda_name_2" id="tienda_name_2" value="<?= $p->tienda ?>">
                                                                        <button button type="submit" class="btn btn-light fa fa-info-circle fa-lg" style="color: #000000; cursor: pointer"></button>
                                                                    </form>
                                                                </td>
                                                                <?php if ($ius->rolusuario == 1) : ?>
                                                                    <td>
                                                                        <i class="enviarpapelera2" style="cursor: pointer" id="<?= $p->id ?>"><img src="<?= base_url() ?>assets/img/delete_btn.png" height="35px" width="35px"></i>
                                                                        <!--<?php if ($ius->nombreusuario == 'amnhed.lagunas' || $ius->nombreusuario == 'marco.morales') { ?>
                                                                            <i style="padding-left:10px;"><img src="<?= base_url() ?>assets/img/pending_return.png" height="35px" width="35px" class="devolverpendientes" style="cursor: pointer;" ordencomp="<?= $p->numordencompra ?>" tnd_val="<?= $p->tienda ?>" title="regresar a pendientes"></i>
                                                                        <?php } else { ?>
                                                                        <?php } ?>-->
                                                                    </td>
                                                                <?php else : ?>
                                                                <?php endif ?>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
        <?php endif ?>
    </section>
</section>
<script type="text/javascript">
    $(".enviarpapelera2").click(function() {
        var id_orden_pedido = $(this).attr("id");
        console.log(id_orden_pedido);
        $.post("<?= base_url() ?>Dashboard/enviarPapelera2", {
            "id_orden_pedido": id_orden_pedido
        }).done(function(data) {
            $("#orden" + id_orden_pedido).remove();
        });
    });
    $(".devolverpendientes").click(function() {
        var pedido = $(this).attr('ordencomp');
        var tienda = $(this).attr('tnd_val');
        console.log(tienda);
        console.log(pedido);

        var currentDate = new Date();
        var day = currentDate.getDate();
        var month = currentDate.getMonth() + 1; // Se suma 1 porque los meses comienzan desde 0
        var year = currentDate.getFullYear();
        var hours = currentDate.getHours();
        var minutes = currentDate.getMinutes();
        var seconds = currentDate.getSeconds();
        var pedidonuevotemporal = day + "_" + month + "_" + year + "*" + hours + ":" + (minutes < 10 ? '0' : '') + minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
        console.log(pedidonuevotemporal);
        
        $.ajax({
            url: '<?= base_url() ?>Dashboard/regresar_a_pendientes',
            type: 'POST',
            data: {
                'numordencompra': pedido,
                'ordenpendiente': pedidonuevotemporal,
                'tienda': tienda,
            },
            success: function(response) {
                console.log('pedido regresado a pendientes');
                console.log(response);
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
</script>