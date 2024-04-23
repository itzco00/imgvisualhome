<section id="main-content">
    <header class="header" style="position:fixed; background:#000000">
        <div>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <a href="<?= base_url() ?>Dashboard" class="logo"><b>AVANTE TEXTIL</b></a>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li>
                        <a class="logout" style="background-color: yellow; color: black" href="<?= base_url() ?>Dashboard/logout">CERRAR SESION</a>
                    </li>
                </ul>
                <?php
                foreach ($usernamemobi as $ius) {
                ?>
                <?php
                }
                ?>
                <?php if ($ius->mobi == 1) : ?>
                    <ul class="nav pull-right top-menu" style="padding-right:1%;padding-top:14px">
                        <li id="loading_tables" style="display: none">
                            <img src="<?= base_url() ?>assets/img/loading1.gif" class="img-circle" width="40">
                        </li>
                    </ul>
                <?php else : ?>
                <?php endif ?>

                <script type="text/javascript">
                    function sendclicksave() {
                        document.getElementById('save_mob').click();
                    }
                </script>
            </div>
        </div>
    </header>
    <section class="wrapper">
        <?php
        foreach ($usernamemobi as $ius) {
        ?>
        <?php
        }
        ?>
        <?php if ($ius->mobi == 1) : ?>
            <div style="padding-top: 1%;"></div>
            <input type="hidden" id="tiendas2" name="tiendas2" value="<?php echo join(', ', array_slice(array_column($tiendasid, 'id'), 0, 10)); ?>">
            <i id="start_get_values"></i>
            <?php
            $tiendas = array_column($tiendasid, 'id');
            $numInputs = ceil(count($tiendas) / 10); // Calculamos el número de inputs necesarios
            $size = 45; // Puedes ajustar el valor de size según tus preferencias de ancho
            $counter = 1; // Inicializamos el contador en 1

            for ($i = 0; $i < $numInputs; $i++) {
                $start = $i * 10;
                $end = ($i + 1) * 10;
                $tiendasSlice = array_slice($tiendas, $start, 10); // Obtenemos 10 valores a la vez

                // Generamos un ID único para cada input y un nombre de clase común
                $inputId = $counter;
                $groupClass = 'group-div';

                // Determinar si este es el primer div y mostrarlo
                $displayStyle = ($i == 0) ? 'block' : 'none';

                // Creamos un div para cada grupo de inputs con ID y clase, y aplicamos el estilo de visualización
                echo '<div id="' . $inputId . '" class="' . $groupClass . '" style="display: ' . $displayStyle . '">';

                // Mostrar el botón solo si no es el primer grupo
                if ($i > 0) {
                    echo '<i style="cursor:pointer" class="values_by_row_prev" id="' . $inputId . '"><img src="'. base_url() .'assets/img/arr_left.png" style=" width: 40px;"></i>';
                }

                // Creamos un input para cada grupo de 10 valores con el atributo size y el ID único
                echo '<input type="hidden" id="tiendas_id_values_' . $inputId . '" name="' . $inputId . '" value="' . join(', ', $tiendasSlice) . '" size="' . $size . '">';
                echo '<span>Pag: ' . $inputId . '</span>';

                if ($i < $numInputs - 1) {
                    echo '<i style="cursor:pointer" class="values_by_row_sig" id="' . $inputId . '"><img src="'. base_url() .'assets/img/arr_rigth.png" style=" width: 40px;"></i>';
                }

                // Cerramos el div
                echo '</div>';

                $counter++; // Incrementamos el contador
            }
            ?>
            <div id="tablaContainer"></div>
        <?php else : ?>
        <?php endif ?>
    </section>
</section>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#start_get_values').trigger('click');
        }, 100);
        $('#start_get_values').click(function() {
            $('#loading_tables').show();
            var input_values = $('#tiendas2').val();
            console.log(input_values);
            $.ajax({
                url: "<?= base_url() ?>Dashboard/verTablaMobi2",
                type: "POST",
                dataType: "json",
                data: {
                    input_values: input_values
                },
                success: function(data) {
                    $('#loading_tables').hide();
                    if (data.tableHtml) {
                        $("#tablaContainer").html(data.tableHtml);
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    $('#loading_tables').hide();
                    console.error("Error al cargar la tabla: " + errorThrown);
                }
            });
        });
        $('.values_by_row_sig').click(function() {
            $('#loading_tables').show();
            var input_id = $(this).attr("id");

            var next_group = $('#' + input_id).next('.' + 'group-div');
            $('#' + input_id).hide();
            

            var convert_string_input_id_value = parseInt(input_id);
            var input_id_sig = convert_string_input_id_value + 1;
            var input_values = $('#tiendas_id_values_' + input_id_sig).val();
            console.log(input_id);
            console.log(input_values);

            $.ajax({
                url: "<?= base_url() ?>Dashboard/verTablaMobi2",
                type: "POST",
                dataType: "json",
                data: {
                    input_values: input_values
                },
                success: function(data) {
                    $('#loading_tables').hide();
                    if (data.tableHtml) {
                        $("#tablaContainer").html(data.tableHtml);
                        next_group.show();
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    $('#loading_tables').hide();
                    console.error("Error al cargar la tabla: " + errorThrown);
                }
            });
        });
        $('.values_by_row_prev').click(function() {
            $('#loading_tables').show();
            var input_id = $(this).attr("id");

            var prev_group = $('#' + input_id).prev('.' + 'group-div');
            $('#' + input_id).hide();
            

            var input_values = $('#tiendas_id_values_' + (input_id - 1)).val();
            console.log(input_id);
            console.log(input_values);

            $.ajax({
                url: "<?= base_url() ?>Dashboard/verTablaMobi2",
                type: "POST",
                dataType: "json",
                data: {
                    input_values: input_values
                },
                success: function(data) {
                    $('#loading_tables').hide();
                    if (data.tableHtml) {
                        $("#tablaContainer").html(data.tableHtml);
                        prev_group.show();
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    $('#loading_tables').hide();
                    console.error("Error al cargar la tabla: " + errorThrown);
                }
            });
        });
    });
</script>