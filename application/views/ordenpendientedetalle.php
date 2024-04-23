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
                foreach ($usernamepdnt as $ius) {
                ?>
                <?php
                }
                ?>
                <?php if ($ius->rolusuario == 1) : ?>
                    <ul class="nav pull-right top-menu" style="padding-right:1%;padding-top:8px">
                        <li>
                            <form action="<?= base_url() ?>Dashboard/verPapeleraOrdePdnt" method="post">
                                <button type="submit" style="border:none; background:transparent"><img src="<?= base_url() ?>assets/img/trashcan.png" style=" width: 40px"></button>
                                <input type="hidden" name="usernamepapordpdnt" id="usernamepapordpdnt" value="<?= $ius->nombreusuario ?>">
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
        foreach ($usernamepdnt as $ius) {
        ?>
        <?php
        }
        ?>
        <?php if ($ius->pdntaccess == 1) : ?>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <div class="col-lg-12 ">
                            <h1 style="justify-content: center; color: black" class="mb">ORDENES PENDIENTES</h1>
                        </div>
                        <div class="row mt">
                            <div class="col-lg-12">
                                <div class="form-panel" style="background-color:#FFFFC4">
                                    <h4 class="mb"></h4>
                                    <div class="row mt">
                                        <div class="col-lg-12">
                                            <div class="form-panel">
                                                <h5 class="mb"></h5>
                                                <table class="table">
                                                    <thead>
                                                        <tr style="width:100%; justify-content: center; text-align: center">
                                                            <th style="text-align: left; font-size: 2em; color: black">ORDEN</th>
                                                            <th style="text-align: center; font-size: 2em; color: black">FECHA / HORA</th>
                                                            <th style="text-align: center; font-size: 2em; color: black">CONTINUAR</th>
                                                            <?php if ($ius->rolusuario == 1) : ?>
                                                                <th style="text-align: center; font-size: 2em; color: black">DETALLE</th>
                                                            <?php else : ?>
                                                            <?php endif ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($productospdts as $p) {
                                                        ?>
                                                            <tr id="roworden<?= $p->id ?>" style="justify-content: center; text-align: center">
                                                                <td style="font-size: 1.5em; color: black;text-align: left;"><?= $p->tienda ?></td>
                                                                <td style="font-size: 1.5em; color: black" class="format_order"><?= $p->ordenpendiente ?></td>
                                                                <td>
                                                                    <form action="<?= base_url() ?>Dashboard/verDetallePendientes" method="post">
                                                                        <div style="display:flex; justify-content:center">
                                                                            <h4 style="color: black"> CONTINUAR </h4>
                                                                            <input type="hidden" id="usernamepdnt" name="usernamepdnt" value="<?= $ius->nombreusuario ?>">
                                                                            <input type="hidden" name="ordenpendiente" id="ordenpendiente" value="<?= $p->ordenpendiente ?>">
                                                                            <button type="submit" class="btn btn-light fa fa-external-link-square fa-lg" style="color: #000000; cursor: pointer"></button>
                                                                        </div>
                                                                    </form>
                                                                </td>
                                                                <?php if ($ius->rolusuario == 1) : ?>
                                                                    <td>
                                                                        <i class="enviarpapeleraordpdnt" style="cursor: pointer" id="<?= $p->id ?>"><img src="<?= base_url() ?>assets/img/delete_btn.png" height="35px" width="35px"></i>
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
    var cells = document.querySelectorAll('.format_order');
    cells.forEach(function(cell) {
        var content = cell.textContent;
        content = content.replace(/_/g, '/').replace(/\*/g, '-');
        cell.textContent = content;
    });
</script>
<script type="text/javascript">
    $(".enviarpapeleraordpdnt").click(function() {
        var id_orden_pedido_pdnt = $(this).attr("id");
        console.log(id_orden_pedido_pdnt);
        $.post("<?= base_url() ?>Dashboard/enviarPapeleraPorOrdenCompraPdnt", {
            "id_orden_pedido_pdnt": id_orden_pedido_pdnt
        }).done(function(data) {
            $("#roworden" + id_orden_pedido_pdnt).remove();
        });
    });
</script>
