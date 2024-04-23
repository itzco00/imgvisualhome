<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <div style="justify-content: space-between;">
                        <div class="col-lg-12">
                            <form action="<?= base_url() ?>Dashboard/verCarrito" method="post">
                                <button>REGRESAR</button>
                            </form>
                        </div>
                        <div class="row mt">
                            <div class="col-lg-12">
                                <div class="form-panel" style="background-color:#E1E1E1">
                                    <h4 class="mb">PAPELERA EXTRAS</h4>
                                    <div class="row mt">
                                        <div class="col-lg-12">
                                            <div class="form-panel">
                                                <h5 class="mb"></h5>
                                                <table class="table">
                                                    <thead>
                                                        <tr style="width:100%; justify-content: center; text-align: center">
                                                            <th style="text-align: center">NOMBRE</th>
                                                            <th style="text-align: center">CANTIDAD</th>
                                                            <th style="text-align: center">UNIDAD</th>
                                                            <th style="text-align: center">PRECIO</th>
                                                            <th style="text-align: center">OBSERVACIONES</th>
                                                            <th style="text-align: center">RECUPERAR</th>
                                                            <!--
                                                            <th style="text-align: center">ELIMINAR PERMANENTE</th>-->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($productosprov as $p) {
                                                        ?>
                                                            <tr id="rowproducto<?= $p->id ?>" style="justify-content: center; text-align: center">
                                                                <td><?= $p->nombre ?></td>
                                                                <td><?= $p->pieza ?></td>
                                                                <td><?= $p->unidad ?></td>
                                                                <td><?= $p->precio ?></td>
                                                                <td><?= $p->observaciones ?></td>
                                                                <td style="font-size: 1.5em"><button type="submit" class="recuperarpapeleraprov btn fa fa-history" style="color: #000000; cursor: pointer" id="producto-<?= $p->id ?>"></button></td>
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
    </section>
</section>
<script type="text/javascript">
    $(".recuperarpapeleraprov").click(function() {
        var idproducto = this.id;
        var res = idproducto.split("-");
        var id = res[1];
        $.post("<?= base_url() ?>Dashboard/recuperarPapeleraProv", {
            "idproducto": id
        }).done(function(data) {
            $("#rowproducto" + id).remove();
        });
    });
</script>
