<section id="main-content">
    <section class="wrapper">
        <?php
        foreach ($usernamegenc as $ius) {
        ?>
        <?php
        }
        ?>
        <?php if ($ius->gencaccess == 1) : ?>
            <?php if ($ius->rolusuario == 1) : ?>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <form action="<?= base_url() ?>Dashboard/productosEntrada" method="post">
                                <button type="submit" class="btn btn-outline-dark" style="color: #000000; cursor: pointer; float: right; font-size: 1.5em">CONTINUAR</button>
                                <input type="hidden" name="usernamegenc" id="usernamegenc" value="<?= $ius->nombreusuario ?>">
                            </form>
                            <div class="col-lg-12 ">
                                <h2 style="justify-content: center;" class="mb">REGISTRAR PROVEEDOR</h2>
                                <form action="<?= base_url() ?>Dashboard/registraProveedor" method="post" class="form-horizontal style-form" enctype="multipart/form-data">
                                    <input type="hidden" name="usernamegenc2" id="usernamegenc2" value="<?= $ius->nombreusuario ?>">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 1.3em; color: black">NOMBRE DEL PROVEEDOR</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="proveedor" id="proveedor">
                                        </div>
                                    </div>
                                    <button type="submit" id="altaproveedores" class="btn btn-outline-dark" style="background-color: chartreuse; color: #000000; cursor: pointer; font-size: 1.5em" disabled>REGISTRAR</button>
                                </form>
                            </div>
                            <div class="col-lg-12 ">
                                <h2 style="justify-content: center;" class="mb">GESTION DE PROVEEDORES</h2>
                            </div>
                            <form action="<?= base_url() ?>Dashboard/actualizaProveedores" method="post">
                                <input type="hidden" name="usernamegenc3" id="usernamegenc3" value="<?= $ius->nombreusuario ?>">
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
                                                                    <th style="text-align: center; font-size: 2em">NOMBRE</th>
                                                                    <th style="text-align: center; font-size: 2em">DETALLE</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="proveedores" name="proveedores">
                                                                <?php
                                                                foreach ($proveedores2 as $p) {
                                                                ?>
                                                                    <tr id="rowproveedor<?= $p->id ?>" style="justify-content: center; text-align: center">
                                                                        <td style="font-size: 1.5em">
                                                                            <input size="20" style="font-size: 1.3em; color: black" type="hidden" name="idproveedor[]" value="<?= $p->id ?>">
                                                                            <input size="20" style="font-size: 1.3em; color: black" type="text" name="nombreproveedor[]" value="<?= $p->proveedor ?>">
                                                                        </td>
                                                                        <td style="font-size: 2.3em">
                                                                            <i class="eliminarproveedor" style="cursor: pointer;" id="proveedor-<?= $p->id ?>"><img src="<?= base_url() ?>assets/img/delete_btn.png" height="35px" width="35px"></i>
                                                                        </td>
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
                                        <button type="submit" class="btn btn-outline-dark" style="background-color: black; color: #ffffff; cursor: pointer; float: right; font-size: 1.7em">ACTUALIZAR PROVEEDORES</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="row mt" style="width:60%;">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <form action="<?= base_url() ?>Dashboard/productosEntrada" method="post">
                                <button type="submit" class="btn btn-outline-dark" style="color: #000000; cursor: pointer; float: right; font-size: 1.5em">CONTINUAR</button>
                                <input type="hidden" name="usernamegenc" id="usernamegenc" value="<?= $ius->nombreusuario ?>">
                            </form>
                            <div style="justify-content: space-between;">
                                <div class="row mt">
                                    <div class="col-lg-12" style="padding-top: 1%;">
                                        <div class="form-panel" style="background-color:#E1E1E1">
                                            <h2 class="mb" style="color:black">PROVEEDORES</h2>
                                            <div class="row mt">
                                                <div class="col-lg-12">
                                                    <div class="form-panel">
                                                        <table class="table">
                                                            <thead>
                                                                <tr style="width:100%; justify-content: center; text-align: center; color: black">
                                                                    <th style="text-align: left; font-size: 1.2em">NOMBRE</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                foreach ($proveedores2 as $p) {
                                                                ?>
                                                                    <tr style="color: black">
                                                                        <td style="text-align: left; font-size: 1.2em"><?= $p->proveedor ?></td>
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
            <?php endif ?>
        <?php else : ?>
        <?php endif ?>
    </section>
</section>
<script type="text/javascript">
    function habilitaraltaproveedores() {
        var valorproveedor = document.getElementById('proveedor').value;

        var val = 0;

        if (valorproveedor == "") {
            val++;
        }
        if (val == 0) {
            document.getElementById('altaproveedores').disabled = false;
        } else {
            document.getElementById('altaproveedores').disabled = true;
            //document.getElementById('mensajetienda').style.display = 'none';
        }
    }
    document.getElementById('proveedor').addEventListener("keyup", habilitaraltaproveedores);
</script>
<script type="text/javascript">
    $(".eliminarproveedor").click(function() {
        var idproveedor = this.id;
        var res = idproveedor.split("-");
        var id = res[1];
        $.confirm({
            title: '¡ELIMINAR!',
            content: '¿Desea eliminar el proveedor permanentemente? ¡Esta acción no se podrá deshacer!',
            buttons: {
                Aceptar: {
                    btnClass: 'btn-red',
                    action: function() {
                        $.post("<?= base_url() ?>Dashboard/eliminarProveedor", {
                            idproveedor: id
                        }).done(function(data) {
                            $("#rowproveedor" + id).remove();
                        });
                        $.alert('¡Registro eliminado correctamente!');
                    }
                },
                Cancelar: function() {},
            }
        });
    });
</script>