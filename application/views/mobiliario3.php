<section id="main-content">
    <section class="wrapper">
        <?php
        foreach ($usernamemobi as $ius) {
        ?>
        <?php
        }
        ?>
        <?php if ($ius->mobi == 1) : ?>
            <div style="padding-top:1%;padding-bottom:1%; display:flex; justify-content:center">
                <div style="display:flex; justify-content:space-evenly;width:80%;">
                    <div>
                        <select id="filtro_select_1" class="custom-select">
                            <option value="">SELECCIONAR</option>
                            <?php
                            foreach ($tiendas as $tnd) {
                            ?>
                                <option value="<?= $tnd->id ?>"><?= $tnd->nombre ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <select id="filtro_select_2" class="custom-select">
                            <option value="">SELECCIONAR</option>
                            <?php
                            foreach ($años as $añ) {
                            ?>
                                <option value="<?= $añ->año ?>"><?= $añ->año ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <button type="button" id="consultar" class="custom-btn">CONSULTAR</button>
                    </div>
                    <div>
                        <!--<button type="button" id="verificar" class="custom-btn-2">MODIFICAR / TIENDA</button>-->
                        <button type="button" id="modificar_orden" class="custom-btn-2">MODIFICAR / TIENDA</button>
                    </div>
                </div>
                <div>
                    <input id="filtro_val_1" type="hidden" value="">
                    <input id="filtro_val_2" type="hidden" value="">
                    <input type="hidden" name="is_admin" id="is_admin" value="<?= $ius->rolusuario ?>">
                </div>
            </div>
            <div id="loading_query" style="display:none">
                <img src="<?= base_url() ?>assets/img/loading1.gif" class="img-circle" width="40">
            </div>
            <table style="border-collapse: collapse; width: 100%; border: 1px solid black;">
                <thead>
                    <tr>
                        <th class="headers_tienda" style="border: 1px solid black; padding: 8px; text-align: left; color: black; background:white;" colspan="8" rowspan="2"><img src="<?= base_url() ?>assets/img/profile3.png" style=" width: 600px;"></th>
                        <?php if ($mobiliarioproductosentrada == '') : ?>
                        <?php else : ?>
                            <th colspan="<?= sizeof($mobiliarioproductosentrada) ?>" style="background-color: #CDCDCD;border: 1px solid black; padding: 8px; text-align: center; font-size:1.5em; color: black;">1.- PRODUCTOS ENTRADA</th>
                        <?php endif ?>
                        <?php if ($mobiliarioproductosdamaycaballero == '') : ?>
                        <?php else : ?>
                            <th colspan="<?= sizeof($mobiliarioproductosdamaycaballero) ?>" style="background-color: #B7B7B7;border: 1px solid black; padding: 8px; text-align: center; font-size:1.5em; color: black;">2.- PRODUCTOS DAMA Y CABALLERO</th>
                        <?php endif ?>
                        <?php if ($mobiliarioproductosmujerhombrejr == '') : ?>
                        <?php else : ?>
                            <th colspan="<?= sizeof($mobiliarioproductosmujerhombrejr) ?>" style="background-color: #CDCDCD;border: 1px solid black; padding: 8px; text-align: center; font-size:1.5em; color: black;">3.- MUJER HOMBRE JR</th>
                        <?php endif ?>
                        <?php if ($mobiliarioproductosinteriormujer == '') : ?>
                        <?php else : ?>
                            <th colspan="<?= sizeof($mobiliarioproductosinteriormujer) ?>" style="background-color: #B7B7B7;border: 1px solid black; padding: 8px; text-align: center; font-size:1.5em; color: black;">4.- INTERIOR MUJER</th>
                        <?php endif ?>
                        <?php if ($mobiliarioproductosinfantilniñoyniña == '') : ?>
                        <?php else : ?>
                            <th colspan="<?= sizeof($mobiliarioproductosinfantilniñoyniña) ?>" style="background-color: #CDCDCD;border: 1px solid black; padding: 8px; text-align: center; font-size:1.5em; color: black;">5.- INFANTIL NIÑO Y NIÑA</th>
                        <?php endif ?>
                        <?php if ($mobiliarioproductostoddlerniñoniñaybebes == '') : ?>
                        <?php else : ?>
                            <th colspan="<?= sizeof($mobiliarioproductostoddlerniñoniñaybebes); ?>" style="background-color: #B7B7B7;border: 1px solid black; padding: 8px; text-align: center; font-size:1.5em; color: black;">6.- TODDLER NIÑO NIÑA Y BEBES</th>
                        <?php endif ?>
                        <?php if ($mobiliarioproductosherrajes == '') : ?>
                        <?php else : ?>
                            <th colspan="<?= sizeof($mobiliarioproductosherrajes) ?>" style="background-color: #CDCDCD;border: 1px solid black; padding: 8px; text-align: center; font-size:1.5em; color: black;">7.- HERRAJES</th>
                        <?php endif ?>
                        <?php if ($mobiliarioproductosprobadores == '') : ?>
                        <?php else : ?>
                            <th colspan="<?= sizeof($mobiliarioproductosprobadores) ?>" style="background-color: #B7B7B7;border: 1px solid black; padding: 8px; text-align: center; font-size:1.5em; color: black;">8.- PROBADORES</th>
                        <?php endif ?>
                        <?php if ($mobiliarioproductospaneles == '') : ?>
                        <?php else : ?>
                            <th colspan="<?= sizeof($mobiliarioproductospaneles) ?>" style="background-color: #CDCDCD;border: 1px solid black; padding: 8px; text-align: center; font-size:1.5em; color: black;">9.- PANELES</th>
                        <?php endif ?>
                        <?php if ($mobiliarioproductosextras == '') : ?>
                        <?php else : ?>
                            <th colspan="<?= sizeof($mobiliarioproductosextras) ?>" style="background-color: #B7B7B7;border: 1px solid black; padding: 8px; text-align: center; font-size:1.5em; color: black;">10.- EXTRAS</th>
                        <?php endif ?>
                        <?php if ($mobiliarioproductosimagen == '') : ?>
                        <?php else : ?>
                            <th colspan="<?= sizeof($mobiliarioproductosimagen) ?>" style="background-color: #CDCDCD;border: 1px solid black; padding: 8px; text-align: center; font-size:1.5em; color: black;">11.- IMAGEN</th>
                        <?php endif ?>
                        <?php if ($mobiliarioproductosotros == '') : ?>
                        <?php else : ?>
                            <th colspan="<?= sizeof($mobiliarioproductosotros) ?>" style="background-color: #B7B7B7;border: 1px solid black; padding: 8px; text-align: center; font-size:1.5em; color: black;">12.- OTROS</th>
                        <?php endif ?>
                    </tr>
                    <tr>
                        <?php
                        foreach ($productos as $pts) {
                        ?>
                            <th style="border: 1px solid black; padding: 8px; text-align: left; color:black;background:#E5E5E5;"><img style="border-radius: 15px;" src="<?= base_url("uploads/" . $pts->archivo) ?>" height="100px" width="100px"></th>
                        <?php
                        }
                        ?>
                    </tr>
                    <tr>
                        <th class="headers_tienda" style="border: 1px solid black; padding: 8px; text-align: left; color: black;background:#FFFED3;">NO. TIENDA</th>
                        <th class="headers_tienda" style="border: 1px solid black; padding: 8px; text-align: left; color: black;background:#FFFED3;">NOMBRE</th>
                        <th class="headers_tienda" style="border: 1px solid black; padding: 8px; text-align: left; color: black;background:#FFFED3;">AÑO</th>
                        <th class="headers_tienda" style="border: 1px solid black; padding: 8px; text-align: left; color: black;background:#FFFED3;">CONSTRUCCION</th>
                        <th class="headers_tienda" style="border: 1px solid black; padding: 8px; text-align: left; color: black;background:#FFFED3;">LOCAL</th>
                        <th class="headers_tienda" style="border: 1px solid black; padding: 8px; text-align: left; color: black;background:#FFFED3;">DEPARTAMENTOS</th>
                        <th class="headers_tienda" style="border: 1px solid black; padding: 8px; text-align: left; color: black;background:#FFFED3;">M2 PISO VENTAS</th>
                        <th class="headers_tienda" style="border: 1px solid black; padding: 8px; text-align: left; color: black;background:#FFFED3;">M2 BODEGA</th>
                        <?php
                        foreach ($productos as $pts) {
                        ?>
                            <th style="border: 1px solid black; padding: 8px; text-align: left; color:black;background:#E5E5E5;"><?= $pts->nombre ?></th>
                        <?php
                        }
                        ?>
                    </tr>
                </thead>
                <thead id="area_consulta">

                </thead>
            </table>
            <div id="area_consulta_2">

            </div>
            <div id="area_consulta_3">

            </div>
            <input id="consultas_por_año" type="hidden">
            <input id="ordenes_existentes" type="hidden">
            <i id="subconsulta"></i>
            <i id="draw_table_ordenes_existentes"></i>
        <?php else : ?>
        <?php endif ?>
    </section>
</section>
<script>
    $(document).ready(function() {
        $('#filtro_select_1').change(function() {
            var id_tienda = $(this).val();
            $('#filtro_val_1').val(id_tienda);
        });
        $('#filtro_select_2').change(function() {
            var anio = $(this).val();
            $('#filtro_val_2').val(anio);
            /*$('#loading_query').show();
            console.log('consultando filtros...');
            $.ajax({
                url: '<?= base_url() ?>Dashboard/consulta_Tiendas_Por_anio_Select_Box',
                type: 'POST',
                data: {
                    anio: anio
                },
                success: function(data) {
                    $('#loading_query').hide();
                    console.log('Filtro Consultado!');
                    $('#filtro_select_1').html(data);
                },
                error: function(error) {
                    $('#loading_query').hide();
                    console.error('Error: ', error);
                }
            });*/
        });
        $('#consultar').click(function() {
            var id_tienda = $('#filtro_val_1').val();
            var año = $('#filtro_val_2').val();
            if (id_tienda == '' && año == '') {
                alert('seleccione al menos un campo');
            } else if (id_tienda == '' && año != '') {
                $('.headers_tienda').show();
                $('#loading_query').show();
                console.log('consultando filtros...');
                $.ajax({
                    url: '<?= base_url() ?>Dashboard/consulta_Mobiliario_Por_Anio_Tienda',
                    type: 'POST',
                    data: {
                        anio: año
                    },
                    dataType: "json",
                    beforeSend: function() {
                        $('#area_consulta_2').empty();
                    },
                    success: function(data) {
                        $('#loading_query').hide();
                        console.log('Datos Enviados!');
                        $('#consultas_por_año').val(data);
                        setTimeout(function() {
                            $('#subconsulta').trigger('click');
                        }, 500);
                        $('#subconsulta').click(function() {
                            $('#loading_query').show();
                            var resultadoInput = $('#consultas_por_año').val();
                            console.log(resultadoInput);
                            $.ajax({
                                url: '<?= base_url() ?>Dashboard/consulta_Mobiliario_Por_Anio_Tienda_info',
                                type: 'POST',
                                dataType: "html",
                                data: {
                                    resultadoInput: resultadoInput
                                },
                                success: function(data) {
                                    $('#loading_query').hide();
                                    console.log('Datos Enviados!');
                                    $('#area_consulta').html(data);
                                },
                                error: function(error) {
                                    $('#loading_query').hide();
                                    console.error('Error: ', error);
                                }
                            });
                        });
                    },
                    error: function(error) {
                        $('#loading_query').hide();
                        console.error('Error: ', error);
                    }
                });
            } else if (id_tienda != '' && año == '') {
                $('.headers_tienda').show();
                $('#loading_query').show();
                console.log('consultando filtros...');
                $.ajax({
                    url: '<?= base_url() ?>Dashboard/consulta_Mobiliario_Por_Id_Tienda',
                    type: 'POST',
                    dataType: "html",
                    //dataType: "json",
                    data: {
                        id_tienda: id_tienda
                    },
                    success: function(data) {
                        $('#loading_query').hide();
                        console.log('Datos Enviados!');
                        $('#area_consulta').html(data);
                    },
                    error: function(error) {
                        $('#loading_query').hide();
                        console.error('Error: ', error);
                    }
                });
            } else if (id_tienda != '' && año != '') {
                $('.headers_tienda').show();
                $('#loading_query').show();
                console.log('consultando filtros...');
                $.ajax({
                    url: '<?= base_url() ?>Dashboard/consulta_Mobiliario_Por_Anio_And_Id_Tienda',
                    type: 'POST',
                    dataType: "html",
                    data: {
                        id_tienda: id_tienda,
                        anio: año,
                    },
                    success: function(data) {
                        $('#loading_query').hide();
                        console.log('Datos Enviados!');
                        $('#area_consulta').html(data);
                    },
                    error: function(error) {
                        $('#loading_query').hide();
                        console.error('Error: ', error);
                    }
                });
            } else {
                console.log('probado');
            }
        });
    });
    $('#verificar').click(function() {
        $('#loading_query').show();
        $.ajax({
            url: '<?= base_url() ?>Dashboard/consulta_verificar_ordenes_existentes',
            method: 'GET',
            dataType: "json",
            success: function(response) {
                $('#loading_query').hide();
                var ordenes_exist = response.map(function(obj) {
                    return obj.idtienda;
                });
                var array_ordenes = ordenes_exist.join(', ');
                $('#ordenes_existentes').val(array_ordenes);

                setTimeout(function() {
                    $('#draw_table_ordenes_existentes').trigger('click');
                }, 500);
            },
            error: function(error) {
                console.error('Error: ', error);
                $('#loading_query').hide();
                alert('error al procesar la solicitud');
            }
        });
    });
    $('#draw_table_ordenes_existentes').click(function() {
        var input_array_ordenes = $('#ordenes_existentes').val();
        $.ajax({
            url: '<?= base_url() ?>Dashboard/consulta_imprime_ordenes_existentes',
            method: 'POST',
            dataType: "html",
            data: {
                input_array_ordenes: input_array_ordenes
            },
            success: function(data) {
                $('.headers_tienda').hide();
                $('#area_consulta').html(data);
            },
            error: function(error) {
                console.error('Error: ', error);
                $('#loading_query').hide();
                alert('error al procesar la solicitud 2');
            }
        });
    });
    $(document).on('click', '.show_info_prod_orden', function() {
        var data_id_prod = $(this).attr('data_id_prod');
        var data_name_tnd = $(this).attr('data_name_tnd');
        var divResponse = $(this).siblings('.response_piezas_prod_tnd');
        var baseUrl = '<?= base_url() ?>';
        var is_admin = $('#is_admin').val();
        //console.log(data_id_prod);
        //console.log(data_name_tnd);
        $.ajax({
            url: '<?= base_url() ?>Dashboard/consulta_piezas_rel_prod_tnd',
            type: 'POST',
            dataType: "json",
            data: {
                data_id_prod: data_id_prod,
                data_name_tnd: data_name_tnd,
            },
            success: function(response) {
                //console.log('success piezas!');
                //console.log(response);
                divResponse.empty();

                if (response.length > 0) {
                    if (is_admin == 1) {
                        for (var i = 0; i < response.length; i++) {
                            var nuevoDiv = $('<div><input type="number" min="1" mas="1000" style="width: 40px; border: none; background: transparent" value="' + response[i].pieza + '" class="valor_mobiliario_x_id_tnd"> <img src="' + baseUrl + 'assets/img/save_changues_1.png" width="20px" style="cursor:pointer" class="update_pieza_prod_tnd" data_id_value_mobiliario="' + response[i].id + '"></div>');
                            divResponse.append(nuevoDiv);
                        }
                    } else {
                        for (var i = 0; i < response.length; i++) {
                            var nuevoDiv = $('<div>' + response[i].pieza + '</div>');
                            divResponse.append(nuevoDiv);
                        }
                    }
                } else {
                    //divResponse.text('No se encontraron datos.');
                }
            },
            error: function(error) {
                console.error('Error: ', error);
            }
        });
    });
    $('#modificar_orden').click(function() {
        var id_tienda = $('#filtro_val_1').val();
        if (id_tienda != '') {
            $('.headers_tienda').show();
            $('#loading_query').show();
            console.log('consultando filtros...');
            $.ajax({
                url: '<?= base_url() ?>Dashboard/consulta_Mobiliario_Por_Id_Tienda_editable',
                type: 'POST',
                dataType: "html",
                //dataType: "json",
                data: {
                    id_tienda: id_tienda
                },
                success: function(data) {
                    $('#loading_query').hide();
                    console.log('Datos Enviados!');
                    $('#area_consulta').html(data);
                },
                error: function(error) {
                    $('#loading_query').hide();
                    console.error('Error: ', error);
                }
            });
        } else {
            alert('especifique la tienda');
        }
    });
    $(document).on('click', '.update_pieza_prod_tnd', function() {
        var id_producto_upt = $(this).attr('data_id_value_mobiliario');
        //console.log(id_producto_upt);
        if (id_producto_upt === '') {} else {
            var valor_producto_upt = $(this).prev('.valor_mobiliario_x_id_tnd').val();
            //console.log(valor_producto_upt);
            $.ajax({
                url: '<?= base_url() ?>Dashboard/actualiza_datos_consulta_Mobiliario_Por_Id_Tienda',
                type: 'POST',
                //dataType: "html",
                data: {
                    id_producto_upt: id_producto_upt,
                    valor_producto_upt: valor_producto_upt,
                },
                success: function(data) {
                    console.log('success pieza update!');
                    alert('se actualizo la cantidad para este producto y tienda');
                },
                error: function(error) {
                    console.error('Error: ', error);
                    alert('no se pudo actualizar el registro');
                }
            });
        }
    });
    /*$(document).on('click', '.update_pieza_prod_tnd', function() {
        var id_producto_upt = $(this).attr('data_id_value_mobiliario');
        //console.log(id_producto_upt);
        if (id_producto_upt === '') {} else {
            var valor_producto_upt = $(this).prev('.valor_mobiliario_x_id_tnd').val();
            //console.log(valor_producto_upt);
            $.ajax({
                url: '<?= base_url() ?>Dashboard/actualiza_datos_consulta_Mobiliario_Por_Id_Tienda',
                type: 'POST',
                dataType: "html",
                data: {
                    id_producto_upt: id_producto_upt,
                    valor_producto_upt: valor_producto_upt,
                },
                success: function(data) {
                    console.log('succes pieza update!');
                },
                error: function(error) {
                    console.error('Error: ', error);
                    alert('no se pudo actualizar el registro');
                }
            });
        }
    });*/
</script>
<style>
    .custom-select {
        background-color: #FEBE68;
        border: 1px solid #D57A00;
        padding: 10px;
        font-size: 14px;
        border-radius: 5px;
        color: black;
        cursor: pointer;
    }

    .custom-select:hover {
        background-color: #FFAB3A;
        border: 1px solid #D57A00;
    }

    .custom-select:active {
        transform: scale(0.98);
    }

    .custom-select option {
        background-color: #fff;
        color: black;
    }

    .custom-select option:checked {
        background-color: #FEBE68;
        color: black;
    }

    .custom-btn {
        background-color: #459FFF;
        border: 1px solid #0065D1;
        padding: 10px;
        font-size: 14px;
        border-radius: 5px;
        color: white;
        cursor: pointer;
    }

    .custom-btn:hover {
        background-color: #007CFF;
        border: 1px solid #0065D1;
    }

    .custom-btn:active {
        transform: scale(0.98);
    }

    .custom-btn-2 {
        background-color: #F79F05;
        border: 1px solid #925D00;
        padding: 10px;
        font-size: 14px;
        border-radius: 5px;
        color: white;
        cursor: pointer;
    }

    .custom-btn-2:hover {
        background-color: #D48600;
        border: 1px solid #925D00;
    }

    .custom-btn-2:active {
        transform: scale(0.98);
    }
</style>