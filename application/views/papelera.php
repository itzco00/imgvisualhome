<section id="main-content">
    <section class="wrapper">
        <?php
        foreach ($usernamegenc as $ius) {
        ?>
        <?php
        }
        ?>
        <?php if ($ius->gencaccess == 1) : ?>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <div style="justify-content: space-between;">
                            <div class="col-lg-12">
                                <form action="<?= base_url() ?>Dashboard/productosEntrada" method="post">
                                    <div style="display:flex; justify-content:space-between">
                                        <button style="padding: 8px 20px 5px 20px;color:white; border-radius:5px; border: none; background:black; font-size:1.5em">REGRESAR</button>
                                        <?php if ($productos == '') : ?>
                                        <?php else : ?>
                                            <input type="button" id="recupera_todo_papelera" style="padding: 8px 20px 5px 20px;color:white; border-radius:5px; border: none; background:black; font-size:1.5em" value="RECUPERAR TODO">
                                        <?php endif ?>
                                    </div>
                                    <input type="hidden" name="usernamegenc" id="usernamegenc" value="<?= $ius->nombreusuario ?>">
                                </form>
                            </div>
                            <div class="row mt">
                                <div class="col-lg-12" style="padding-top: 1%;">
                                    <div class="form-panel" style="background-color:#E1E1E1">
                                        <h2 class="mb" style="color:black">PAPELERA</h2>
                                        <div class="row mt">
                                            <div class="col-lg-12">
                                                <div class="form-panel">
                                                    <h5 class="mb"></h5>
                                                    <table class="table">
                                                        <thead>
                                                            <tr style="width:100%; justify-content: center; text-align: center">
                                                                <th style="text-align: center; font-size: 1.2em; color:black">DESC. PRODUCTO</th>
                                                                <th style="text-align: center; font-size: 1.2em; color:black">DEPARTAMENTO</th>
                                                                <th style="text-align: center; font-size: 1.2em; color:black">SUBDEPARTAMENTO</th>
                                                                <th style="text-align: center; font-size: 1.2em; color:black">PRECIO MXN</th>
                                                                <th style="text-align: center; font-size: 1.2em; color:black">UNIDAD</th>
                                                                <th style="text-align: center; font-size: 1.2em; color:black">RECUPERAR</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($productos as $p) {
                                                            ?>
                                                                <tr id="rowproducto<?= $p->id ?>" style="justify-content: center; text-align: center" class="recover_all">
                                                                    <td style="text-align: left; font-size: 1.2em; color:black"><?= $p->nombre ?></td>
                                                                    <td style="text-align: center; font-size: 1.2em; color:black"><?= $p->departamentos ?></td>
                                                                    <td style="text-align: center; font-size: 1.2em; color:black"><?= $p->subdepartamentos ?></td>
                                                                    <td style="text-align: center; font-size: 1.2em; color:black"><?= $p->precio ?></td>
                                                                    <td style="text-align: center; font-size: 1.2em; color:black"><?= $p->unidad ?></td>
                                                                    <td style="font-size: 1.5em"><i class="recuperarpapelera fa fa-history" style="color: #000000; cursor: pointer" id="producto-<?= $p->id ?>"></i></td>
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
            </div>
        <?php else : ?>
        <?php endif ?>
    </section>
</section>
<script type="text/javascript">
    $(".recuperarpapelera").click(function() {
        var idproducto = this.id;
        var res = idproducto.split("-");
        var id = res[1];
        $.post("<?= base_url() ?>Dashboard/recuperarPapelera", {
            "idproducto": id
        }).done(function(data) {
            $("#rowproducto" + id).fadeOut();
        });
    });
    $('#recupera_todo_papelera').click(function() {
        $.post("<?= base_url() ?>Dashboard/recover_all_from_trash", {}).done(function() {
            $(".recover_all").remove();
            $("#recupera_todo_papelera").remove();
        }).fail(function() {
            alert("Error al recuperar registros.");
        });
    });
</script>