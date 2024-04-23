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
                                <h2 style="justify-content: center;" class="mb">REGISTRAR TIENDA</h2>
                                <form action="<?= base_url() ?>Dashboard/registraTienda" method="post" class="form-horizontal style-form" enctype="multipart/form-data">
                                    <input type="hidden" name="usernamegenc" id="usernamegenc" value="<?= $ius->nombreusuario ?>">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 1.3em; color: black">NUMERO</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="numerodetienda" id="numerodetienda" style="color: black">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 1.3em; color: black">NOMBRE DE LA TIENDA</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="nombre" id="nombre" style="color: black">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 1.3em; color: black">AÑO</label>
                                        <div class="col-sm-4">
                                            <input name="año" id="año" type="text" class="form-control" name="nombre" id="nombre" style="color: black">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 1.3em; color: black">CONSTRUCCION</label>
                                        <div class="col-sm-4">
                                            <select name="construccion" id="construccion" class="form-control" style="color: black">
                                                <option value="">SELECCIONAR</option>
                                                <option value="AMPLIACION">AMPLIACION</option>
                                                <option value="RELOCALIZACION">RELOCALIZACION</option>
                                                <option value="REMODELACION">REMODELACION</option>
                                                <option value="TIENDA NUEVA">TIENDA NUEVA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 1.3em; color: black">LOCAL</label>
                                        <div class="col-sm-4">
                                            <select name="local" id="local" class="form-control" style="color: black">
                                                <option value="">SELECCIONAR</option>
                                                <option value="CC">CC</option>
                                                <option value="CENTRO">CENTRO</option>
                                                <option value="PLANTA">PLANTA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-size: 1.3em; color: black">ESCAPARATES</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="escaparates" id="escaparates" style="color: black">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-size: 1.3em; color: black">BANNERS</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="banners" id="banners" style="color: black">
                                </div>
                            </div>
                            -->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 1.3em; color: black">DEPARTAMENTOS</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="deptos" id="deptos" style="color: black">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 1.3em; color: black">UBICACION</label>
                                        <div class="col-sm-4">
                                            <select name="ubicacion_t" id="ubicacion_t" class="form-control" style="color: black">
                                                <option value="">SELECCIONAR</option>
                                                <option value="A PIE DE CARRETERA">A PIE DE CARRETERA</option>
                                                <option value="CENTRO COMERCIAL">CENTRO COMERCIAL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-size: 1.3em; color: black">INTERIOR DAMAS</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="interiordamas" id="interiordamas" style="color: black">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-size: 1.3em; color: black">COMENTARIOS DE INTERIOR DAMAS</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="comentariosdeinteriordamas" id="comentariosdeinteriordamas" style="color: black">
                                </div>
                            </div>
                            -->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 1.3em; color: black">M2 PISO VENTA</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="m2pisoventa" id="m2pisoventa" style="color: black">
                                        </div>
                                    </div>
                                    <!--
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-size: 1.3em; color: black">M2 INTERIOR MUJER</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="m2interiormujer" id="m2interiormujer" style="color: black">
                                </div>
                            </div>
                            -->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 1.3em; color: black">M2 BODEGA</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="m2bodega" id="m2bodega" style="color: black">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" style="font-size: 1.3em; color: black">CENTRO DE COSTOS</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="centro_costos" id="centro_costos" style="color: black">
                                        </div>
                                    </div>
                                    <button type="submit" id="altatiendas" class="btn btn-outline-dark" style="background-color: chartreuse; color: #000000; cursor: pointer; font-size: 1.5em" disabled>REGISTRAR</button>
                                </form>
                            </div>
                            <div class="col-lg-12 ">
                                <h2 style="justify-content: center;" class="mb">GESTIÓN DE TIENDAS</h2>
                            </div>
                            <form action="<?= base_url() ?>Dashboard/actualizaTiendas" method="post">
                                <input type="hidden" name="usernamegenc2" id="usernamegenc2" value="<?= $ius->nombreusuario ?>">
                                <table class="table">
                                    <thead>
                                        <tr style="width:100%; justify-content: center; text-align: center">
                                            <th style="text-align: center; font-size: 1.3em">NÚMERO DE TIENDA</th>
                                            <th style="text-align: center; font-size: 1.3em">NOMBRE</th>
                                            <th style="text-align: center; font-size: 1.3em">AÑO</th>
                                            <th style="text-align: center; font-size: 1.3em">CONSTRUCCION</th>
                                            <th style="text-align: center; font-size: 1.3em">LOCAL</th>
                                            <!--<th style="text-align: center; font-size: .8em">ESCAPARATES</th>
                                    <th style="text-align: center; font-size: .8em">BANNERS</th>-->
                                            <th style="text-align: center; font-size: 1.3em">DEPTOS</th>
                                            <th style="text-align: center; font-size: 1.3em">UBICACION</th>
                                            <!--<th style="text-align: center; font-size: .8em">INTERIOR DAMAS</th>
                                    <th style="text-align: center; font-size: .8em">COMENTARIOS DE INTERIOR DAMAS</th>-->
                                            <th style="text-align: center; font-size: 1.3em">M2 PISO VENTA</th>
                                            <!--<th style="text-align: center; font-size: .8em">M2 INTERIOR MUJER</th>-->
                                            <th style="text-align: center; font-size: 1.3em">M2 BODEGA</th>
                                            <th style="text-align: center; font-size: 1.3em">CENTRO COSTOS</th>
                                            <th style="text-align: center; font-size: 1.3em">STATUS</th>
                                            <th style="text-align: center; font-size: 1.3em">DETALLE</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tiendas" name="tiendas">
                                        <?php
                                        foreach ($tiendas2 as $tnd2) {
                                        ?>
                                            <tr id="rowtiendas<?= $tnd2->id ?>" style="justify-content: center; text-align: center">
                                                <td>
                                                    <input style="font-size: 1em; color: black" type="hidden" name="idtiendas[]" value="<?= $tnd2->id ?>">
                                                    <input size="7" style="font-size: 1em; color: black" type="text" name="numerodetiendas[]" value="<?= $tnd2->numerodetienda ?>">
                                                </td>
                                                <td>
                                                    <input size="25" style="font-size: 1em; color: black" type="text" name="nombretiendas[]" value="<?= $tnd2->nombre ?>">
                                                </td>
                                                <td>
                                                    <input size="7" style="font-size: 1em; color: black" type="text" name="añotiendas[]" value="<?= $tnd2->año ?>">
                                                </td>
                                                <td>
                                                    <select name="construcciontiendas[]" style="color: black">
                                                        <option value="<?= $tnd2->construccion ?>"><?= $tnd2->construccion ?></option>
                                                        <option value="AMPLIACION" style="color: gray">AMPLIACION</option>
                                                        <option value="RELOCALIZACION" style="color: gray">RELOCALIZACION</option>
                                                        <option value="REMODELACION" style="color: gray">REMODELACION</option>
                                                        <option value="TIENDA NUEVA" style="color: gray">TIENDA NUEVA</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="localtiendas[]" style="color: black">
                                                        <option value="<?= $tnd2->local ?>"><?= $tnd2->local ?></option>
                                                        <option value="CC" style="color: gray">CC</option>
                                                        <option value="CENTRO" style="color: gray">CENTRO</option>
                                                        <option value="PLANTA" style="color: gray">PLANTA</option>
                                                    </select>
                                                </td>
                                                <!--
                                        <td>
                                            <input size="5" style="font-size: 1em; color: black" type="text" name="escaparatestiendas[]" value="<?= $tnd2->escaparates ?>">
                                        </td>
                                        <td>
                                            <input size="5" style="font-size: 1em; color: black" type="text" name="bannerstiendas[]" value="<?= $tnd2->banners ?>">
                                        </td>
                                        -->
                                                <td>
                                                    <input size="20" style="font-size: 1em; color: black" type="text" name="deptostiendas[]" value="<?= $tnd2->deptos ?>">
                                                </td>
                                                <td>
                                                    <select name="ubicacion_td[]" style="color: black">
                                                        <option value="<?= $tnd2->ubicacion_td ?>"><?= $tnd2->ubicacion_td ?></option>
                                                        <option value="A PIE DE CARRETERA" style="color: gray">A PIE DE CARRETERA</option>
                                                        <option value="CENTRO COMERCIAL" style="color: gray">CENTRO COMERCIAL</option>
                                                    </select>
                                                </td>
                                                <!--
                                        <td>
                                            <input size="8" style="font-size: 1em; color: black" type="text" name="interiordamastiendas[]" value="<?= $tnd2->interiordamas ?>">
                                        </td>
                                        <td>
                                            <input size="8" style="font-size: 1em; color: black" type="text" name="comentariosdeinteriordamastiendas[]" value="<?= $tnd2->comentariosdeinteriordamas ?>">
                                        </td>
                                        -->
                                                <td>
                                                    <input size="7" style="font-size: 1em; color: black" type="text" name="m2pisoventatiendas[]" value="<?= $tnd2->m2pisoventa ?>">
                                                </td>
                                                <!--
                                        <td>
                                            <input size="5" style="font-size: 1em; color: black" type="text" name="m2interiormujertiendas[]" value="<?= $tnd2->m2interiormujer ?>">
                                        </td>
                                        -->
                                                <td>
                                                    <input size="5" style="font-size: 1em; color: black" type="text" name="m2bodegatiendas[]" value="<?= $tnd2->m2bodega ?>">
                                                </td>
                                                <td>
                                                    <input size="5" style="font-size: 1em; color: black" type="text" name="centro_costos[]" value="<?= $tnd2->centro_costos ?>">
                                                </td>
                                                <?php if ($tnd2->status == 2) : ?>
                                                    <td style="background:#59FF00">
                                                        <span style="color:black;"><b>Con Orden Generada</b></span>
                                                    </td>
                                                <?php elseif ($tnd2->status == 1) : ?>
                                                    <td style="background:#FFE400">
                                                        <span style="color:black;"><b>Con Orden Pendiente</b></span>
                                                    </td>
                                                <?php elseif ($tnd2->status == 3) : ?>
                                                    <td style="background:#0093FF">
                                                        <span style="color:white;"><b>Informacion En Mobiliario</b></span>
                                                    </td>
                                                <?php else : ?>
                                                    <td>
                                                        <span style="color:black;"><b>Lista para Generar</b></span>
                                                    </td>
                                                <?php endif ?>
                                                <td>
                                                    <i class="eliminartiendas" style="cursor: pointer" id="tiendas-<?= $tnd2->id ?>"><img src="<?= base_url() ?>assets/img/delete_btn.png" height="35px" width="35px"></i>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <button type="submit" class="btn btn-outline-dark" style="background-color: black; color: #ffffff; cursor: pointer; float: right; font-size: 1.7em">ACTUALIZAR TIENDAS</button>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="row mt">
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
                                            <h2 class="mb" style="color:black">TIENDAS</h2>
                                            <div class="row mt">
                                                <div class="col-lg-12">
                                                    <div class="form-panel">
                                                        <table class="table">
                                                            <thead>
                                                                <tr style="width:100%; justify-content: center; text-align: center; color: black">
                                                                    <th style="text-align: left; font-size: 1.2em">NÚMERO DE TIENDA</th>
                                                                    <th style="text-align: left; font-size: 1.2em">NOMBRE</th>
                                                                    <th style="text-align: left; font-size: 1.2em">AÑO</th>
                                                                    <th style="text-align: left; font-size: 1.2em">CONSTRUCCION</th>
                                                                    <th style="text-align: left; font-size: 1.2em">LOCAL</th>
                                                                    <th style="text-align: left; font-size: 1.2em">DEPTOS</th>
                                                                    <th style="text-align: left; font-size: 1.2em">M2 PISO VENTA</th>
                                                                    <th style="text-align: left; font-size: 1.2em">M2 BODEGA</th>
                                                                    <th style="text-align: left; font-size: 1.2em">CENTRO COSTOS</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                foreach ($tiendas2 as $tnd2) {
                                                                ?>
                                                                    <tr style="color: black">
                                                                        <td style="text-align: left; font-size: 1.2em"><?= $tnd2->numerodetienda ?></td>
                                                                        <td style="text-align: left; font-size: 1.2em"><?= $tnd2->nombre ?></td>
                                                                        <td style="text-align: left; font-size: 1.2em"><?= $tnd2->año ?></td>
                                                                        <td style="text-align: left; font-size: 1.2em"><?= $tnd2->construccion ?></td>
                                                                        <td style="text-align: left; font-size: 1.2em"><?= $tnd2->local ?></td>
                                                                        <td style="text-align: left; font-size: 1.2em"><?= $tnd2->deptos ?></td>
                                                                        <td style="text-align: left; font-size: 1.2em"><?= $tnd2->m2pisoventa ?></td>
                                                                        <td style="text-align: left; font-size: 1.2em"><?= $tnd2->centro_costos ?></td>
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
    function habilitaraltatiendas() {
        var valornumerodetienda = document.getElementById('numerodetienda').value;
        var valornombre = document.getElementById('nombre').value;
        var valoraño = document.getElementById('año').value;
        var valorconstruccion = document.getElementById('construccion').value;
        var valorlocal = document.getElementById('local').value;
        var valordeptos = document.getElementById('deptos').value;
        var valorm2pisoventa = document.getElementById('m2pisoventa').value;
        var valorm2bodega = document.getElementById('m2bodega').value;

        var val = 0;

        if (valornumerodetienda == "") {
            val++;
        }
        if (valornombre == "") {
            val++;
        }
        if (valoraño == "") {
            val++;
        }
        if (valorconstruccion == "") {
            val++;
        }
        if (valorlocal == "") {
            val++;
        }
        if (valordeptos == "") {
            val++;
        }
        if (valorm2pisoventa == "") {
            val++;
        }
        if (valorm2bodega == "") {
            val++;
        }
        if (val == 0) {
            document.getElementById('altatiendas').disabled = false;
        } else {
            document.getElementById('altatiendas').disabled = true;
            //document.getElementById('mensajetienda').style.display = 'none';
        }
    }
    document.getElementById('numerodetienda').addEventListener("keyup", habilitaraltatiendas);
    document.getElementById('nombre').addEventListener("keyup", habilitaraltatiendas);
    document.getElementById('año').addEventListener("change", habilitaraltatiendas);
    document.getElementById('construccion').addEventListener("change", habilitaraltatiendas);
    document.getElementById('local').addEventListener("change", habilitaraltatiendas);
    document.getElementById('deptos').addEventListener("keyup", habilitaraltatiendas);
    document.getElementById('m2pisoventa').addEventListener("keyup", habilitaraltatiendas);
    document.getElementById('m2bodega').addEventListener("keyup", habilitaraltatiendas);
</script>
<script type="text/javascript">
    $(".eliminartiendas").click(function() {
        var idtiendas = this.id;
        var res = idtiendas.split("-");
        var id = res[1];
        $.confirm({
            title: '¡ELIMINAR!',
            content: '¿Desea eliminar la tienda permanentemente? ¡Esta acción no se podrá deshacer!',
            buttons: {
                Aceptar: {
                    btnClass: 'btn-red',
                    action: function() {
                        $.post("<?= base_url() ?>Dashboard/eliminartiendas", {
                            idtiendas: id
                        }).done(function(data) {
                            $("#rowtiendas" + id).remove();
                        });
                        $.alert('¡Registro eliminado correctamente!');
                    }
                },
                Cancelar: function() {},
            }
        });
    });
</script>