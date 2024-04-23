<section id="main-content">
    <section class="wrapper">
        <?php
        foreach ($usernamealtap as $ius) {
        ?>
        <?php
        }
        ?>
        <?php if ($ius->altapaccess == 1) : ?>
            <label for=""></label>
            <form action="<?= base_url() ?>Dashboard/misProductosActualizar" method="post">
                <button type="submit" style="background-color: transparent; border:none;" id="redirect_cat_2"></button>
                <input type="hidden" name="usernamealtap2" id="usernamealtap2" value="<?= $ius->nombreusuario ?>">
            </form>
            <!--<form action="<?= base_url() ?>Dashboard/ActualizaStatus" method="post">
                <input type="hidden" name="usernamealtap" id="usernamealtap" value="<?= $ius->nombreusuario ?>">
                <button type="submit" class="btn btn-outline-dark" style="background-color: black; color: #ffffff; cursor: pointer; font-size: 1.7em">ACTUALIZAR STATUS</button>
                <table id="productos" class="table" style="color: black;">
                    <thead style="font-size: 1.5em;">
                        <tr style="width:100%; justify-content: center; text-align: center">
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">NOMBRE DEL PRODUCTO</th>
                            <th style="text-align: center">PRECIO MXN</th>
                            <th style="text-align: center">PRECIO REPROCESO</th>
                            <th style="text-align: center">STATUS</th>
                            <th style="text-align: center">DEPARTAMENTO</th>
                            <th style="text-align: center">SUB DEPARTAMENTO</th>-->
            <!--<th style="text-align: center">VISTA PREVIA</th>-->
            <!--<th style="text-align: center">EDITAR STATUS</th>
                            <th style="text-align: center">ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 1.2em;">
                        <?php
                        $contador = 0;
                        foreach ($productos as $t) {
                            $contador++;
                        ?>
                            <tr id="rowproducto<?= $t->id ?>" style="justify-content: center; text-align: left">
                                <td><?= $t->id ?></td>
                                <td><?= $t->nombre ?></td>
                                <td><?= $t->precio ?></td>
                                <td><?= $t->reproceso ?></td>
                                <?php if ($t->status == "Activo") : ?>
                                    <td style="background-color: chartreuse" id="tdstatus<?= $contador ?>"><?= $t->status ?></td>
                                <?php else : ?>
                                    <td style="background-color: #FFAA00" id="tdstatus<?= $contador ?>"><?= $t->status ?></td>
                                <?php endif ?>
                                <td><?= $t->departamentos ?></td>
                                <td><?= $t->subdepartamentos ?></td>-->
            <!--
                        <td>
                            <img style="border-radius: 15px;" src="<?= base_url("uploads/" . $t->archivo) ?>" height="100px" width="100px">
                        </td>
                -->
            <!--<td>
                                    <input type="hidden" value="<?= $t->id ?>" name="idproductos[]">
                                    <input type="hidden" value="<?= $t->status ?>" id="producto<?= $contador ?>" name="statusproductos[]">
                                    <?php if ($t->status == "Activo") : ?>
                                        <div id="divactivo-<?= $contador ?>" style="display: none;">
                                            <i class="setInputActivo" id="<?= $contador ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/switch_off.png" height="35px" width="35px"></i>
                                        </div>
                                        <div id="divinactivo-<?= $contador ?>">
                                            <i class="setInputInactivo" id="<?= $contador ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/switch_on.png" height="35px" width="35px"></i>
                                        </div>
                                    <?php else : ?>
                                        <div id="divactivo-<?= $contador ?>">
                                            <i class="setInputActivo" id="<?= $contador ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/switch_off.png" height="35px" width="35px"></i>
                                        </div>
                                        <div id="divinactivo-<?= $contador ?>" style="display: none;">
                                            <i class="setInputInactivo" id="<?= $contador ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/switch_on.png" height="35px" width="35px"></i>
                                        </div>
                                    <?php endif ?>-->
            <!--
                            <form action="" method="post">
                                <button class=" btn btn-outline-dark" style="background-color: chartreuse; color: #000000; cursor: pointer" id="producto-<?= $t->id ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                <button class=" btn btn-outline-dark" style="background-color: #FFAA00; color: #000000; cursor: pointer" id="producto-<?= $t->id ?>"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </form>
                            -->
            <!--</td>
                                <td>-->
            <!--
                            <form action="" method="post">
                                -->
            <!--<i class="eliminarelproducto" style="cursor: pointer;" id="producto-<?= $t->id ?>"><img src="<?= base_url() ?>assets/img/delete_btn.png" height="35px" width="35px"></i>
                                    <i></i>-->
            <!--
                            </form>
                            -->
            <!--</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </form>-->
        <?php else : ?>
        <?php endif ?>


    </section>
</section>
<script type="text/javascript">

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#redirect_cat_2').trigger('click');
    });
    $(document).on('click', '.setInputActivo', function() {
        var row_id = $(this).attr("id");
        var row_activo_div = document.getElementById('divactivo-' + row_id);
        var row_inactivo_div = document.getElementById('divinactivo-' + row_id);
        //var status = document.getElementById('producto' + row_id).value;
        var Activo = "Activo";
        document.getElementById('producto' + row_id).value = Activo;
        document.getElementById('tdstatus' + row_id).innerHTML = Activo;
        //console.log(status);
        $('#tdstatus' + row_id).css('background-color', 'chartreuse');
        row_activo_div.style.display = 'none';
        row_inactivo_div.style.display = 'block';
    });
</script>
<script type="text/javascript">
    $(document).on('click', '.setInputInactivo', function() {
        var row_id2 = $(this).attr("id");
        var row_activo_div2 = document.getElementById('divactivo-' + row_id2);
        var row_inactivo_div2 = document.getElementById('divinactivo-' + row_id2);
        //var status = document.getElementById('producto' + row_id).value;
        var Inactivo = "Inactivo";
        document.getElementById('producto' + row_id2).value = Inactivo;
        document.getElementById('tdstatus' + row_id2).innerHTML = Inactivo;
        //console.log(status);
        $('#tdstatus' + row_id2).css('background-color', '#FFAA00');
        row_activo_div2.style.display = 'block';
        row_inactivo_div2.style.display = 'none';
    });
</script>


<script type="text/javascript">
    $(".actulalizarelproductoactivo").click(function() {
        var idproducto = this.id;
        var res = idproducto.split("-");
        var id = res[1];
        $.post("<?= base_url() ?>Dashboard/actualizarProductoActivo", {
            idproducto: id
        }).done(function(data) {});
    });
</script>

<script type="text/javascript">
    $(".actulalizarelproductoinactivo").click(function() {
        var idproducto = this.id;
        var res = idproducto.split("-");
        var id = res[1];
        $.post("<?= base_url() ?>Dashboard/actualizarProductoInactivo", {
            idproducto: id
        }).done(function(data) {});
    });
</script>

<script type="text/javascript">
    $(".eliminarelproducto").click(function() {
        var idproducto = this.id;
        var res = idproducto.split("-");
        var id = res[1];
        $.confirm({
            title: '¡ELIMINAR!',
            content: '¿Esta seguro de eliminar el producto permanentemente? ¡Esta acción no se podrá deshacer!',
            buttons: {
                Aceptar: {
                    btnClass: 'btn-red',
                    action: function() {
                        $.post("<?= base_url() ?>Dashboard/eliminarProducto", {
                            idproducto: id
                        }).done(function(data) {
                            $("#rowproducto" + id).remove();
                        });
                        $.alert('¡El producto se ha eliminado!');
                    }
                },
                Cancelar: function() {},
                /*
                somethingElse: {
                    text: 'Something else',
                    btnClass: 'btn-blue',
                    keys: ['enter', 'shift'],
                    action: function() {
                        $.alert('Something else?');
                    }
                }
                */
            }
        });
        /*
        var idproducto = this.id;
        var res = idproducto.split("-");
        var id = res[1];
        $.post("<?= base_url() ?>Dashboard/eliminarProducto", {
            idproducto: id
        }).done(function(data) {
            $("#rowproducto" + id).remove();
        });
        */
    });
</script>
<script>
    $(document).ready(function() {
        $('#productos').DataTable({
            searching: false,
            paging: false,
            info: false
        });
    });
</script>