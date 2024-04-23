<section id="main-content">
    <section class="wrapper">
        <?php
        foreach ($usernamepapdetalle as $ius) {
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
                                <form action="<?= base_url() ?>Dashboard/verCarrito" method="post">
                                    <button style="padding: 8px 20px 5px 20px;color:white; border-radius:5px; border: none; background:black; font-size:1.5em">REGRESAR</button>
                                    <input type="hidden" name="usernamecons" id="usernamecons" value="<?= $ius->nombreusuario ?>">
                                </form>
                            </div>
                            <div class="row mt">
                                <div class="col-lg-12" style="padding-top: 1%;">
                                    <div class="form-panel" style="background-color:#E1E1E1">
                                        <h2 class="mb" style="color:black">PAPELERA DETALLE DE COMPRAS</h2>
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
                                                            foreach ($productos as $p) {
                                                            ?>
                                                                <tr id="rowproducto<?= $p->id ?>" style="justify-content: center; text-align: center">
                                                                    <td style="font-size: 1.5em; color: black; text-align: left;"><?= $p->tienda ?></td>
                                                                    <td style="font-size: 1.5em; color: black; text-align: left;"><?= $p->numordencompra ?></td>
                                                                    <td style="font-size: 1.5em">
                                                                        <i class="recuperarpapelera2" style="color: #000000; cursor: pointer" id="producto-<?= $p->id ?>">
                                                                            <img src="<?= base_url() ?>assets/img/recover_doc1.png" style=" width: 40px">
                                                                        </i>
                                                                    </td>
                                                                    <td style="font-size: 1.5em">
                                                                        <input type="hidden" id="rowdelete<?= $p->id ?>" value="<?= $p->numordencompra ?>">
                                                                        <input type="hidden" id="tienda_status<?= $p->id ?>" value="<?= $p->tienda ?>">
                                                                        <i class="eliminardetallecompra" style="color: #000000; cursor: pointer" id="<?= $p->id ?>">
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
    $(".recuperarpapelera2").click(function() {
        var idproducto = this.id;
        var res = idproducto.split("-");
        var id = res[1];
        $.post("<?= base_url() ?>Dashboard/recuperarPapelera2", {
            "idproducto": id
        }).done(function(data) {
            $("#rowproducto" + id).remove();
        });
    });
    $(".eliminardetallecompra").click(function() {
        var id_orden_pedido_delete = $(this).attr("id");
        var id_orden_pedido_delete_val = $('#rowdelete' + id_orden_pedido_delete).val();
        var tienda_status_val = $('#tienda_status' + id_orden_pedido_delete).val();
        console.log(id_orden_pedido_delete);
        console.log(id_orden_pedido_delete_val);
        console.log(tienda_status_val);
        $.confirm({
            title: '¡ELIMINAR!',
            content: 'Esta por eliminar una compra de manera definitiva, pero la tienda seguira existiendo en su lista "tiendas" ¡Esta acción no se podrá deshacer!',
            buttons: {
                Aceptar: {
                    btnClass: 'btn-red',
                    action: function() {
                        $('#loading_delete' + id_orden_pedido_delete).show();
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url() ?>Dashboard/eliminarcomprapermanente",
                            data: {
                                "id_orden_pedido_delete_val": id_orden_pedido_delete_val,
                                "tienda_status_val": tienda_status_val,
                            },
                            success: function() {
                                console.log("Compra liminada correctamente");
                                $('#loading_delete' + id_orden_pedido_delete).hide();
                                $("#rowproducto" + id_orden_pedido_delete).remove();
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