<section id="main-content">
    <section class="wrapper">
        <?php
        foreach ($usernamepapordpdnt as $ius) {
        ?>
        <?php
        }
        ?>
        <?php if ($ius->rolusuario == 1) : ?>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <div style="justify-content: space-between;">
                            <div class="col-lg-12">
                                <form action="<?= base_url() ?>Dashboard/verPendientes" method="post">
                                    <button style="padding: 8px 20px 5px 20px;color:white; border-radius:5px; border: none; background:black; font-size:1.5em">REGRESAR</button>
                                    <input type="hidden" name="usernamepdnt" id="usernamepdnt" value="<?= $ius->nombreusuario ?>">
                                </form>
                            </div>
                            <div class="row mt">
                                <div class="col-lg-12" style="padding-top: 1%;">
                                    <div class="form-panel" style="background-color:#FFFFC4">
                                        <h2 class="mb" style="color:black">PAPELERA ORDEN PENDIENTES</h2>
                                        <div class="row mt">
                                            <div class="col-lg-12">
                                                <div class="form-panel">
                                                    <table class="table">
                                                        <thead>
                                                            <tr style="width:100%; justify-content: center; text-align: center">
                                                                <th style="text-align: left; font-size: 1.5em; color: black">ORDEN DE COMPRA</th>
                                                                <th style="text-align: left; font-size: 1.5em; color: black">FECHA/HORA</th>
                                                                <th style="text-align: center; font-size: 1.5em; color: black">RECUPERAR</th>
                                                                <th style="text-align: center; font-size: 1.5em; color: black">ELIMINAR PERMANENTE</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($ordenesborradas as $p) {
                                                            ?>
                                                                <tr id="roworden<?= $p->id ?>" style="justify-content: center; text-align: center">
                                                                    <td style="font-size: 1.5em; color: black; text-align: left;"><?= $p->tienda ?></td>
                                                                    <td style="font-size: 1.5em; color: black; text-align: left;" class="format_order"><?= $p->ordenpendiente ?></td>
                                                                    <td style="font-size: 1.5em">
                                                                        <i class="recuperarorden" style="color: #000000; cursor: pointer" id="<?= $p->id ?>">
                                                                            <img src="<?= base_url() ?>assets/img/recover_doc1.png" style=" width: 40px">
                                                                        </i>
                                                                    </td>
                                                                    <td style="font-size: 1.5em">
                                                                        <input type="hidden" id="rowdelete<?= $p->id ?>" value="<?= $p->ordenpendiente ?>">
                                                                        <input type="hidden" id="tienda_status<?= $p->id ?>" value="<?= $p->tienda ?>">
                                                                        <i class="eliminarordenpdnt" style="color: #000000; cursor: pointer" id="<?= $p->id ?>">
                                                                            <img src="<?= base_url() ?>assets/img/delete_btn.png" style=" width: 40px">
                                                                        </i>
                                                                        <i id="loading_delete<?= $p->id ?>" style="display:none">
                                                                            <img src="<?= base_url() ?>assets/img/loading_2.gif" style=" width: 40px">
                                                                        </i>
                                                                    </td>
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
    $(".recuperarorden").click(function() {
        var id_orden_pedido_pdnt = $(this).attr("id");
        console.log(id_orden_pedido_pdnt);
        $.post("<?= base_url() ?>Dashboard/recuperarPapeleraPorOrdenCompraPdnt", {
            "id_orden_pedido_pdnt": id_orden_pedido_pdnt
        }).done(function(data) {
            $("#roworden" + id_orden_pedido_pdnt).remove();
        });
    });
    $(".eliminarordenpdnt").click(function() {
        var id_orden_pedido_delete = $(this).attr("id");
        var id_orden_pedido_delete_val = $('#rowdelete' + id_orden_pedido_delete).val();
        var tienda_status_val = $('#tienda_status' + id_orden_pedido_delete).val();
        console.log(id_orden_pedido_delete);
        console.log(id_orden_pedido_delete_val);
        console.log(tienda_status_val);
        $.confirm({
            title: '¡ELIMINAR!',
            content: 'Esta por eliminar un pendiente de manera definitiva, pero la tienda seguira existiendo en su lista "tiendas" ¡Esta acción no se podrá deshacer!',
            buttons: {
                Aceptar: {
                    btnClass: 'btn-red',
                    action: function() {
                        $('#loading_delete' + id_orden_pedido_delete).show();
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url() ?>Dashboard/eliminarcomprapdntpermanente",
                            data: {
                                "id_orden_pedido_delete_val": id_orden_pedido_delete_val,
                                "tienda_status_val": tienda_status_val,
                            },
                            success: function() {
                                console.log("Compra liminada correctamente");
                                $('#loading_delete' + id_orden_pedido_delete).hide();
                                $("#roworden" + id_orden_pedido_delete).remove();
                                $.confirm({
                                    title: '!STATUS!',
                                    content: '¡Su compra se elimino de manera correcta!',
                                    buttons: {
                                        Aceptar: {
                                            btnClass: 'btn-blue',
                                            action: function() {}
                                        }
                                    }
                                });
                            },
                            error: function(xhr, status, error) {
                                alert("Error al eliminar");
                                $('#loading_delete' + id_orden_pedido_delete).hide();
                            }
                        });
                    }
                },
                Cancelar: function() {},
            }
        });
    });
</script>