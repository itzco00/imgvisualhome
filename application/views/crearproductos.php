<section id="main-content">
    <section class="wrapper">
        <?php
        foreach ($usernameupload as $ius) {
        ?>
        <?php
        }
        ?>
        <?php if ($ius->uploadprod == 1) : ?>
            <?php if ($this->session->flashdata('FaltaMultimedia')) : ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('FaltaMultimedia'); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('CargaConExito')) : ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('CargaConExito'); ?>
                </div>
            <?php endif; ?>
            <!--<div class="row mt">
                <div class="col-lg-8">
                    <div style="color: black">
                        <h2 class="mb">ALTA DE PRODUCTOS</h2>
                        <form action="" method="post" class="form-horizontal style-form" enctype="multipart/form-data">
                            <input type="hidden" name="usernameupload" id="usernameupload" value="<?= $ius->nombreusuario ?>">
                            <div class="form-group">
                                <h4 class="col-sm-4 col-sm-3 control-label">INGRESE EL NOMBRE DEL PRODUCTO</h4>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nombre" id="nombre">
                                </div>
                            </div>-->
            <!--
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">UNIDAD POR PIEZA</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pieza">
                            </div>
                        </div>
                        --><!--
                            <div class="form-group">
                                <h4 class="col-sm-4 col-sm-3 control-label">SKU</h4>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="sku" id="sku">
                                </div>
                            </div>
                            <div class="form-group">
                                <h4 class="col-sm-4 col-sm-3 control-label">PRECIO REPROCESO</h4>
                                <div class="col-sm-2">
                                    <input type="float" class="form-control" name="reproceso" id="reproceso">
                                </div>
                            </div>
                            <div class="form-group">
                                <h4 class="col-sm-4 col-sm-3 control-label">PRECIO POR PIEZA</h4>
                                <div class="col-sm-2">
                                    <input type="float" class="form-control" name="precio" id="precio">
                                </div>
                            </div>
                            <div class="form-group">
                                <h4 class="col-sm-4 col-sm-3 control-label">TIPO DE UNIDAD</h4>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="unidad" id="unidad">
                                </div>
                            </div>
                            <div class="form-group">
                                <h4 class="col-sm-4 col-sm-3 control-label">STATUS</h4>
                                <div class="col-sm-4">
                                    <select name="status" id="status" style="width:250px; height: 30px; font-size: 1.3em; color: black">
                                        <option value="">SELECCIONAR</option>
                                        <option value="Activo">ACTIVO</option>
                                        <option value="Inactivo">INACTIVO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <h4 class="col-sm-4 col-sm-3 control-label">DEPARTAMENTO</h4>
                                <div class="col-sm-4">
                                    <select name="departamentos" id="departamentos" style="width:250px; height: 30px; font-size: 1.3em; color: black">
                                        <option value="">SELECCIONAR</option>
                                        <?php
                                        foreach ($departamentos as $dp) {
                                        ?>
                                            <option class="getsubdepa" value="<?= $dp->nombre ?>"><?= $dp->nombre ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div id="areasudepartamentos">
                            </div>
                            <div class="form-group">
                                <h4 class="col-sm-4 col-sm-3 control-label">ARCHIVO MULTIMEDIA</h4>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" name="archivo">
                                </div>
                            </div>-->
            <!--
                        <div class="form-group">
                        <h4 class="col-sm-4 col-sm-3 control-label">OBSERVACIONES</h4>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="observaciones" id="observaciones" rows="3" placeholder="(opcional)"></textarea>
                            </div>
                        </div>
                                -->
            <!--<button type="submit" id="validaalta" class="btn btn-outline-dark" style="background-color: chartreuse; color: #000000; cursor: pointer; font-size: 1.5em" disabled>CARGAR</button>


                        </form>
                    </div>
                </div>
            </div>-->
            <div style="display: flex; justify-content: center;padding-top:2%; padding-bottom: 4%;">

                <div style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 40%;">

                    <h2 style="text-align: center; margin-bottom: 20px; color:black;">Alta de Productos</h2>

                    <h4 for="nombre" style="display: block; margin-bottom: 8px; font-weight: bold; color:black;">Nombre:</h4>
                    <input type="text" id="nombre" name="nombre" style="width: 100%; padding: 8px; margin-bottom: 16px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; color:black; font-size:1.3em">

                    <h4 for="reproceso" style="display: block; margin-bottom: 8px; font-weight: bold; color:black;">Precio Reproceso:</h4>
                    <input type="text" id="reproceso" name="reproceso" style="width: 100%; padding: 8px; margin-bottom: 16px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; color:black; font-size:1.3em">

                    <h4 for="precio" style="display: block; margin-bottom: 8px; font-weight: bold; color:black;">Precio Por Pieza:</h4>
                    <input type="text" id="precio" name="precio" style="width: 100%; padding: 8px; margin-bottom: 16px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; color:black; font-size:1.3em">

                    <h4 for="unidad" style="display: block; margin-bottom: 8px; font-weight: bold; color:black;">Tipo De Unidad:</h4>
                    <input type="text" id="unidad" name="unidad" style="width: 100%; padding: 8px; margin-bottom: 16px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; color:black; font-size:1.3em">

                    <!--
                    <label for="mensaje" style="display: block; margin-bottom: 8px; font-weight: bold;">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" rows="4" style="width: 100%; padding: 8px; margin-bottom: 16px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                                    -->
                    <h4 for="opciones" style="display: block; margin-bottom: 8px; font-weight: bold; color:black;">Status:</h4>
                    <select id="status" name="opciones" style="width: 100%; padding: 8px; margin-bottom: 16px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; color:black; color:black; font-size:1.3em">
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>

                    <h4 for="opciones" style="display: block; margin-bottom: 8px; font-weight: bold; color:black;">Departamento:</h4>
                    <select id="departamentos" name="opciones" style="width: 100%; padding: 8px; margin-bottom: 16px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; color:black; color:black; font-size:1.3em">
                        <option value="" style="color: black">Seleccionar</option>
                        <option value="entrada" style="color: black">entrada</option>
                        <option value="dama y caballero" style="color: black">dama y caballero</option>
                        <option value="mujer hombre jr" style="color: black">mujer hombre jr</option>
                        <option value="interior mujer" style="color: black">interior mujer</option>
                        <option value="infantil niño y niña" style="color: black">infantil niño y niña</option>
                        <option value="toddler niño niña y bebes" style="color: black">toddler niño niña y bebes</option>
                        <option value="herrajes" style="color: black">herrajes</option>
                        <option value="probadores" style="color: black">probadores</option>
                        <option value="paneles" style="color: black">paneles</option>
                        <option value="extras" style="color: black">extras</option>
                        <option value="imagen" style="color: black">imagen</option>
                        <option value="otros" style="color: black">otros</option>
                    </select>

                    <h4 for="opciones" style="display: block; margin-bottom: 8px; font-weight: bold; color:black;">Subdepartamento:</h4>
                    <select id="subdepartamentos" name="opciones" style="width: 100%; padding: 8px; margin-bottom: 16px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; color:black; color:black; font-size:1.3em">
                        <option value="">Seleccionar</option>
                    </select>

                    <h4 for="opciones" style="display: block; margin-bottom: 8px; font-weight: bold; color:black;">Cuenta Contable:</h4>
                    <table style="width: 100%; margin-bottom: 16px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; color:black; font-size:1.3em">
                        <tbody>
                            <tr>
                                <td style="text-align: center; color: black;">Sku CC 31</td>
                                <td style="text-align: center; color: black;">Sku CC 33</td>
                                <td style="text-align: center; color: black;">Sku CC 34</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"><input id="cc31" style="border: none; border-bottom: 1px solid black; width: 90%;" type="text"></td>
                                <td style="text-align: center;"><input id="cc33" style="border: none; border-bottom: 1px solid black; width: 90%;" type="text"></td>
                                <td style="text-align: center;"><input id="cc34" style="border: none; border-bottom: 1px solid black; width: 90%;" type="text"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center; color: black;">Sku CC 31 r</td>
                                <td style="text-align: center; color: black;">Sku CC 33 r</td>
                                <td style="text-align: center; color: black;">Sku CC 34 r</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"><input id="cc31r" style="border: none; border-bottom: 1px solid black; width: 90%;" type="text"></td>
                                <td style="text-align: center;"><input id="cc33r" style="border: none; border-bottom: 1px solid black; width: 90%;" type="text"></td>
                                <td style="text-align: center;"><input id="cc34r" style="border: none; border-bottom: 1px solid black; width: 90%;" type="text"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center; color: black;">Activo Fijo</td>
                                <td style="text-align: center; color: black;"></td>
                                <td style="text-align: center; color: black;"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"><input id="activof" style="border: none; border-bottom: 1px solid black; width: 90%;" type="text"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                            </tr>
                        </tbody>
                    </table>

                    <h4 for="imagen" style="display: block; margin-bottom: 8px; font-weight: bold; color:black;">Imagen:</h4>
                    <input type="file" id="archivo" name="imagen" accept="image/*" style="width: 100%; padding: 8px; margin-bottom: 16px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; color:black;">
                    <div style="padding-top: 5%;"></div>
                    <button type="button" id="upload_prod" style="background-color: #007bff; color: #fff; padding: 10px; border: none; border-radius: 4px; cursor: pointer; width:100%; font-size:1.5em;" onmouseover="this.style.backgroundColor='#0056b3'" onmouseout="this.style.backgroundColor='#007bff'">Enviar</button>
                    <div style="padding-top: 3%;"></div>
                </div>
            </div>
        <?php else : ?>
        <?php endif ?>


    </section>
</section>
<div id="loader_modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3); z-index: 1;">
    <div id="spinner-container" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="loader" id="loader-1"></div>
    </div>
</div>
<style>
    #spinner-container {
        text-align: center;
    }

    .loader {
        width: 100px;
        height: 100px;
        border-radius: 100%;
        position: relative;
        margin: 0 auto;
    }

    #loader-1:before,
    #loader-1:after {
        content: "";
        position: absolute;
        top: -10px;
        left: -10px;
        width: 100%;
        height: 100%;
        border-radius: 100%;
        border: 10px solid transparent;
        border-top-color: #414141;
    }

    #loader-1:before {
        z-index: 100;
        animation: spin 1s infinite;
    }

    #loader-1:after {
        border: 10px solid #fff;
    }

    @keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
</style>
<script type="text/javascript">
    function habilitaralta() {
        var valornombre = document.getElementById('nombre').value;
        var valorprecio = document.getElementById('precio').value;
        var valorunidad = document.getElementById('unidad').value;
        var valorstatus = document.getElementById('status').value;
        var valordepartamentos = document.getElementById('departamentos').value;
        var val = 0;

        if (valornombre == "") {
            val++;
        }
        if (valorprecio == "") {
            val++;
        }
        if (valorunidad == "") {
            val++;
        }
        if (valorstatus == "") {
            val++;
        }
        if (valordepartamentos == "") {
            val++;
        }
        if (val == 0) {
            document.getElementById('validaalta').disabled = false;
        } else {
            document.getElementById('validaalta').disabled = true;
            //document.getElementById('mensajetienda').style.display = 'none';
        }
    }
    document.getElementById('nombre').addEventListener("keyup", habilitaralta);
    document.getElementById('precio').addEventListener("keyup", habilitaralta);
    document.getElementById('unidad').addEventListener("keyup", habilitaralta);
    document.getElementById('status').addEventListener("change", habilitaralta);
    document.getElementById('departamentos').addEventListener("change", habilitaralta);
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".getsubdepa").click(function() {
            var iddepa = this.id_departamento;
            var res = iddepa.split("-");
            var id_departamento = res[1];
            $.post("<?= base_url() ?>Dashboard/getSubdepartamentos", {
                iddepa: id_departamento
            }).done(function(data) {});
        });
        $("#departamentos").change(function() {
            var departamentos = $("#departamentos").val();
            //alert(departamentos);
            $.ajax({
                type: "POST",
                //url: "<?= base_url() ?>Dashboard/getDepartamentos",
                url: "<?= base_url() ?>Dashboard/getsubdepartamentos",
                data: {
                    departamentos: departamentos
                }
            }).done(function(response) {
                document.getElementById("areasudepartamentos").innerHTML = response;
                console.log(response);
                //$( this ).addClass( "done" );
            });
            $("#pnale_sub").css("display", "inline");
        });
        /*
    $("#departamentos").change(function(){   
        var subdepartamentos = $("#subdepartamentos").val();
        //alert(subdepartamentos);
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>Dashboard/getSubDepartamentos",
            data: { subdepartamentos : subdepartamentos }
        }).done(function() {
          $( this ).addClass( "done" );
        });
        $("#pnale_sub").css("display","inline");
    });
    */
        $('#departamentos').change(function() {
            var departamentosval = $(this).val();
            var subdepartamentosbox = $('#subdepartamentos');
            //var currentRow = $(this).closest('tr');
            //var opcionesSelect = currentRow.find('.subdepartamentos');
            //var departamentos_val = currentRow.find('.departamentos_val');
            subdepartamentosbox.empty();
            if (departamentosval == 'entrada') {
                subdepartamentosbox.append('<option value="">SELECCIONAR</option>');
                subdepartamentosbox.append('<option value="no aplica">no aplica</option>');
            } else if (departamentosval == 'dama y caballero') {
                subdepartamentosbox.append('<option value="">SELECCIONAR</option>');
                subdepartamentosbox.append('<option value="mobiliario de piso">mobiliario de piso</option>');
                subdepartamentosbox.append('<option value="mobiliario perimetral">mobiliario perimetral</option>');
            } else if (departamentosval == 'mujer hombre jr') {
                subdepartamentosbox.append('<option value="">SELECCIONAR</option>');
                subdepartamentosbox.append('<option value="mobiliario de piso">mobiliario de piso</option>');
                subdepartamentosbox.append('<option value="mobiliario perimetral">mobiliario perimetral</option>');
                subdepartamentosbox.append('<option value="mobiliario perimetro jeans">mobiliario perimetro jeans</option>');
                subdepartamentosbox.append('<option value="mobiliario perimetro licencias">mobiliario perimetro licencias</option>');
            } else if (departamentosval == 'interior mujer') {
                subdepartamentosbox.append('<option value="">SELECCIONAR</option>');
                subdepartamentosbox.append('<option value="mobiliario de piso">mobiliario de piso</option>');
                subdepartamentosbox.append('<option value="mobiliario perimetral">mobiliario perimetral</option>');
                subdepartamentosbox.append('<option value="herraje">herraje</option>');
            } else if (departamentosval == 'infantil niño y niña') {
                subdepartamentosbox.append('<option value="">SELECCIONAR</option>');
                subdepartamentosbox.append('<option value="mobiliario de piso">mobiliario de piso</option>');
                subdepartamentosbox.append('<option value="mobiliario perimetral">mobiliario perimetral</option>');
            } else if (departamentosval == 'toddler niño niña y bebes') {
                subdepartamentosbox.append('<option value="">SELECCIONAR</option>');
                subdepartamentosbox.append('<option value="mobiliario de piso">mobiliario de piso</option>');
                subdepartamentosbox.append('<option value="mobiliario perimetral">mobiliario perimetral</option>');
            } else if (departamentosval == 'herrajes') {
                subdepartamentosbox.append('<option value="">SELECCIONAR</option>');
                subdepartamentosbox.append('<option value="no aplica">no aplica</option>');
            } else if (departamentosval == 'probadores') {
                subdepartamentosbox.append('<option value="">SELECCIONAR</option>');
                subdepartamentosbox.append('<option value="mobiliario de piso">mobiliario de piso</option>');
            } else if (departamentosval == 'paneles') {
                subdepartamentosbox.append('<option value="">SELECCIONAR</option>');
                subdepartamentosbox.append('<option value="mobiliario de piso">mobiliario de piso</option>');
            } else if (departamentosval == 'extras') {
                subdepartamentosbox.append('<option value="">SELECCIONAR</option>');
                subdepartamentosbox.append('<option value="mobiliario de piso">mobiliario de piso</option>');
            } else if (departamentosval == 'imagen') {
                subdepartamentosbox.append('<option value="">SELECCIONAR</option>');
                subdepartamentosbox.append('<option value="pop">pop</option>');
                subdepartamentosbox.append('<option value="maniquis">maniquis</option>');
            } else if (departamentosval == 'otros') {
                subdepartamentosbox.append('<option value="">SELECCIONAR</option>');
                subdepartamentosbox.append('<option value="no aplica">no aplica</option>');
            } else {
                subdepartamentosbox.append('<option value="">SELECCIONAR</option>');
                departamentos_val.val('');
            }
        });
        $('#upload_prod').click(function() {
            var nombre = $('#nombre').val();
            var precio = $('#precio').val();
            var reproceso = $('#reproceso').val();
            var unidad = $('#unidad').val();
            var status = $('#status').val();
            var departamentos = $('#departamentos').val();
            var subdepartamentos = $('#subdepartamentos').val();
            var archivo = $('#archivo')[0].files[0];
            var cc31 = $('#cc31').val();
            var cc33 = $('#cc33').val();
            var cc34 = $('#cc34').val();
            var cc31r = $('#cc31r').val();
            var cc33r = $('#cc33r').val();
            var cc34r = $('#cc34r').val();
            var activof = $('#activof').val();

            if (nombre == '' || precio == '' || reproceso == '' || unidad == '' || status == '' || departamentos == '' || subdepartamentos == '') {
                alert('uno o mas campos obligatorios estan vacios');
            } else {
                $('#loader_modal').show();
                var formData = new FormData();
                formData.append('datos', JSON.stringify({
                    'nombre': nombre,
                    'precio': precio,
                    'reproceso': reproceso,
                    'unidad': unidad,
                    'status': status,
                    'departamentos': departamentos,
                    'subdepartamentos': subdepartamentos,
                }));
                formData.append('archivo', archivo);

                $.ajax({
                    url: '<?= base_url() ?>Dashboard/crearProductos2',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Manejar la respuesta del servidor
                        console.log('success insert');
                        console.log('id de registro: ' + response);

                        var id_nuevo_reg = response;
                        $.ajax({
                            url: '<?= base_url() ?>Dashboard/insertskusdirect',
                            type: 'POST',
                            data: {
                                'cc31': cc31,
                                'cc33': cc33,
                                'cc34': cc34,
                                'cc31r': cc31r,
                                'cc33r': cc33r,
                                'cc34r': cc34r,
                                'activof': activof,
                                'id_nuevo_reg': id_nuevo_reg
                            },
                            success: function(response) {
                                // Manejar la respuesta del servidor
                                console.log('skus inserted');
                                $('#nombre').val('');
                                $('#precio').val('');
                                $('#reproceso').val('');
                                $('#unidad').val('');
                                $('#status').val('');
                                $('#departamentos').val('');
                                $('#subdepartamentos').val('');
                                $('#archivo').val('');
                                $('#cc31').val('');
                                $('#cc33').val('');
                                $('#cc34').val('');
                                $('#cc31r').val('');
                                $('#cc33r').val('');
                                $('#cc34r').val('');
                                $('#activof').val('');
                                $('#loader_modal').hide();
                            },
                            error: function(error) {
                                console.error(error);
                                $('#loader_modal').hide();
                            }
                        });
                    },
                    error: function(error) {
                        // Manejar errores
                        console.error(error);
                        alert('no se puedo insertar el producto');
                        $('#loader_modal').hide();
                    }
                });
            }
        });
    });


    function getsubdepasinput() {
        var muestrasubcolor = document.getElementById('muestrasubcolor');
        var muestrasubsincolor = document.getElementById('muestrasubsincolor');
        muestrasubcolor.style.display = 'none';
        muestrasubsincolor.style.display = 'block';
    }
</script>