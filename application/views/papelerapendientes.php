<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <div style="justify-content: space-between;">
                        <div class="col-lg-12">
                            <form action="<?= base_url() ?>Dashboard/regresa_papelera_orden_pendiente" method="post">
                                <div style="display:flex; justify-content:space-between">
                                    <button style="padding: 8px 20px 5px 20px;color:white; border-radius:5px; border: none; background:black; font-size:1.5em">REGRESAR</button>
                                    <?php if ($productos == '') : ?>
                                    <?php else : ?>
                                        <input type="button" id="recupera_todo_papelera_pendientes" style="padding: 8px 20px 5px 20px;color:white; border-radius:5px; border: none; background:black; font-size:1.5em" value="RECUPERAR TODO">
                                    <?php endif ?>
                                </div>
                                <input type="hidden" id="ordenpendiente" name="ordenpendiente" value="<?= $ordenpendiente ?>">
                                <input type="hidden" name="usernamepdnt" id="usernamepdnt" value="<?= $usernamepdnt ?>">
                            </form>
                        </div>
                        <div class="row mt">
                            <div class="col-lg-12" style="padding-top: 1%;">
                                <div class="form-panel" style="background-color:#FFFFC4">
                                    <h4 class="mb" style="color:black;">ELIMINADOS</h4>
                                    <div class="row mt">
                                        <div class="col-lg-12">
                                            <div class="form-panel">
                                                <table class="table">
                                                    <thead>
                                                        <tr style="width:100%; justify-content: center; text-align: center">
                                                            <th style="text-align: center;color:#000000;">DESC. PRODUCTO</th>
                                                            <th style="text-align: center;color:#000000;">DEPARTAMENTO</th>
                                                            <th style="text-align: center;color:#000000;">SUBDEPARTAMENTO</th>
                                                            <th style="text-align: center;color:#000000;">PRECIO MXN</th>
                                                            <th style="text-align: center;color:#000000;">RECUPERAR</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($productos as $p) {
                                                        ?>
                                                            <tr id="rowproducto<?= $p->id_nuevo ?>" style="justify-content: center; text-align: center" class="recover_all_pdnt">
                                                                <td style="font-size: 1.2em;color:#000000;"><?= $p->nombre ?></td>
                                                                <td style="font-size: 1.2em;color:#000000;"><?= $p->departamentos ?></td>
                                                                <td style="font-size: 1.2em;color:#000000;"><?= $p->subdepartamentos ?></td>
                                                                <td style="font-size: 1.2em;color:#000000;"><?= $p->precio ?></td>
                                                                <td style="font-size: 1.5em"><i class="recuperarpapelera fa fa-history" style="color: #000000; cursor: pointer" id="producto-<?= $p->id_nuevo ?>"></i></td>
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
    </section>
</section>
<script type="text/javascript">
    $(".recuperarpapelera").click(function() {
        var idproducto = this.id;
        var res = idproducto.split("-");
        var id = res[1];
        $.post("<?= base_url() ?>Dashboard/recuperarPapeleraPendientes", {
            "idproducto": id
        }).done(function(data) {
            $("#rowproducto" + id).remove();
        });
    });
    $('#recupera_todo_papelera_pendientes').click(function() {
        var ordenpendiente = $('#ordenpendiente').val();
        $.post("<?= base_url() ?>Dashboard/recover_all_from_trash_pdnt", {
            "ordenpendiente": ordenpendiente
        }).done(function() {
            $(".recover_all_pdnt").remove();
            $("#recupera_todo_papelera_pendientes").remove();
        }).fail(function() {
            alert("Error al recuperar registros.");
        });
    });
</script>