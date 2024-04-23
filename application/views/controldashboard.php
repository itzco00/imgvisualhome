<section id="main-content">
    <section class="wrapper">
        <?php
        foreach ($usernameaccess as $ius) {
        ?>
        <?php
        }
        ?>
        <?php if ($ius->rolusuario == 1) : ?>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <div class="row mt">
                            <div class="col-lg-12">
                                <div class="form-panel" style="background-color:#E1E1E1">
                                    <div style="display: flex; justify-content:space-between">
                                        <div>
                                            <h2 class="mb" style="color:black">CONTROL DE ACCESOS ADMINISTRADOR</h2>
                                        </div>
                                        <div style="width:20%">
                                            <button id="update_all_status" style="display: block;width: 100%;padding: 10px;background-color: #000000;color: #fff;font-size:1.3em;border: none;border-radius: 3px;cursor: pointer;">ACTUALIZAR ACCESOS</button>
                                            <div id="loading_changes2" style="display:none;padding-top:5px"><img src="<?= base_url() ?>assets/img/loading1.gif" style=" width: 40px"></div>
                                        </div>
                                    </div>
                                    <div class="row mt">
                                        <div class="col-lg-12">
                                            <div class="form-panel">
                                                <h3 class="mb" style="color:black">Usuarios</h3>
                                                <table class="table">
                                                    <thead>
                                                        <tr style="width:100%; justify-content: center; text-align: center">
                                                            <th style="text-align: center; color:black">NOMBRE</th>
                                                            <th style="text-align: center; color:black">USUARIO</th>
                                                            <th style="text-align: center; color:black">ALTA DE PRODUCTOS</th>
                                                            <th style="text-align: center; color:black">CATÁLOGO</th>
                                                            <th style="text-align: center; color:black">GENERAR COMPRA</th>
                                                            <th style="text-align: center; color:black">PENDIENTES</th>
                                                            <th style="text-align: center; color:black">DETALLE DE COMPRA</th>
                                                            <th style="text-align: center; color:black">MOBILIARIO</th>
                                                            <th style="text-align: center; color:black">ROL</th>
                                                            <th style="text-align: center; color:black">EDITAR</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $filas = 0;
                                                        foreach ($rolusuarios as $rus) {
                                                            $filas++;
                                                        ?>
                                                            <tr id="rowuser<?= $filas ?>" style="width:100%; justify-content: center; text-align: center">
                                                                <td style="text-align: center; font-size:1.em; color:black">
                                                                    <input type="hidden" name="user_ids[]" value="<?= $rus->id ?>">
                                                                    <input type="text" name="user_names[]" style="border: none; text-align:center;" value="<?= $rus->nombre ?>">
                                                                </td>
                                                                <td style="text-align: center; font-size:1.2em; color:black">
                                                                    <input type="text" name="user_usernames[]" style="border: none; text-align:center;" value="<?= $rus->nombreusuario ?>">
                                                                </td>
                                                                <td>
                                                                    <?php if ($rus->uploadprod == 1) : ?>
                                                                        <div id="section_btn_act_upload-<?= $filas ?>">
                                                                            <i class="active_upload" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_on.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                        <div id="section_btn_des_upload-<?= $filas ?>" style="display:none">
                                                                            <i class="desactive_upload" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_off.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                    <?php else : ?>
                                                                        <div id="section_btn_des_upload-<?= $filas ?>">
                                                                            <i class="desactive_upload" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_off.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                        <div id="section_btn_act_upload-<?= $filas ?>" style="display:none">
                                                                            <i class="active_upload" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_on.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                    <?php endif ?>
                                                                    <input type="hidden" id="status_upload-<?= $filas ?>" name="status_upload[]" value="<?= $rus->uploadprod ?>">
                                                                </td>
                                                                <td>
                                                                    <?php if ($rus->altapaccess == 1) : ?>
                                                                        <div id="section_btn_act_cat-<?= $filas ?>">
                                                                            <i class="active_cat" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_on.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                        <div id="section_btn_des_cat-<?= $filas ?>" style="display:none">
                                                                            <i class="desactive_cat" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_off.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                    <?php else : ?>
                                                                        <div id="section_btn_des_cat-<?= $filas ?>">
                                                                            <i class="desactive_cat" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_off.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                        <div id="section_btn_act_cat-<?= $filas ?>" style="display:none">
                                                                            <i class="active_cat" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_on.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                    <?php endif ?>
                                                                    <input type="hidden" id="status_cat-<?= $filas ?>" name="status_cat[]" value="<?= $rus->altapaccess ?>">
                                                                </td>
                                                                <td>
                                                                    <?php if ($rus->gencaccess == 1) : ?>
                                                                        <div id="section_btn_act_genc-<?= $filas ?>">
                                                                            <i class="active_genc" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_on.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                        <div id="section_btn_des_genc-<?= $filas ?>" style="display:none">
                                                                            <i class="desactive_genc" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_off.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                    <?php else : ?>
                                                                        <div id="section_btn_des_genc-<?= $filas ?>">
                                                                            <i class="desactive_genc" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_off.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                        <div id="section_btn_act_genc-<?= $filas ?>" style="display:none">
                                                                            <i class="active_genc" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_on.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                    <?php endif ?>
                                                                    <input type="hidden" id="status_genc-<?= $filas ?>" name="status_genc[]" value="<?= $rus->gencaccess ?>">
                                                                </td>
                                                                <td>
                                                                    <?php if ($rus->pdntaccess == 1) : ?>
                                                                        <div id="section_btn_act_pdnt-<?= $filas ?>">
                                                                            <i class="active_pdnt" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_on.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                        <div id="section_btn_des_pdnt-<?= $filas ?>" style="display:none">
                                                                            <i class="desactive_pdnt" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_off.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                    <?php else : ?>
                                                                        <div id="section_btn_des_pdnt-<?= $filas ?>">
                                                                            <i class="desactive_pdnt" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_off.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                        <div id="section_btn_act_pdnt-<?= $filas ?>" style="display:none">
                                                                            <i class="active_pdnt" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_on.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                    <?php endif ?>
                                                                    <input type="hidden" id="status_pdnt-<?= $filas ?>" name="status_pdnt[]" value="<?= $rus->pdntaccess ?>">
                                                                </td>
                                                                <td>
                                                                    <?php if ($rus->consultas == 1) : ?>
                                                                        <div id="section_btn_act_cons-<?= $filas ?>">
                                                                            <i class="active_cons" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_on.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                        <div id="section_btn_des_cons-<?= $filas ?>" style="display:none">
                                                                            <i class="desactive_cons" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_off.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                    <?php else : ?>
                                                                        <div id="section_btn_des_cons-<?= $filas ?>">
                                                                            <i class="desactive_cons" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_off.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                        <div id="section_btn_act_cons-<?= $filas ?>" style="display:none">
                                                                            <i class="active_cons" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_on.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                    <?php endif ?>
                                                                    <input type="hidden" id="status_cons-<?= $filas ?>" name="status_cons[]" value="<?= $rus->consultas ?>">
                                                                </td>
                                                                <td>
                                                                    <?php if ($rus->mobi == 1) : ?>
                                                                        <div id="section_btn_act_mob-<?= $filas ?>">
                                                                            <i class="active_mob" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_on.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                        <div id="section_btn_des_mob-<?= $filas ?>" style="display:none">
                                                                            <i class="desactive_mob" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_off.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                    <?php else : ?>
                                                                        <div id="section_btn_des_mob-<?= $filas ?>">
                                                                            <i class="desactive_mob" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_off.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                        <div id="section_btn_act_mob-<?= $filas ?>" style="display:none">
                                                                            <i class="active_mob" id="<?= $filas ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/checked_on.png" width="30px" height="30px"></i>
                                                                        </div>
                                                                    <?php endif ?>
                                                                    <input type="hidden" id="status_mob-<?= $filas ?>" name="status_mob[]" value="<?= $rus->mobi ?>">
                                                                </td>
                                                                <td style="text-align: center; font-size:1.3em; color:black">
                                                                    <?php if ($rus->rolusuario == 1) : ?>
                                                                        <div id="section_btn_admin_rol-<?= $filas ?>">
                                                                            <div class="admin_rol" id="<?= $filas ?>" style="background: #FBFF00;cursor:pointer; border-radius:10px">Admin</div>
                                                                        </div>
                                                                        <div id="section_btn_user_rol-<?= $filas ?>" style="display:none">
                                                                            <div class="user_rol" id="<?= $filas ?>" style="background: #00B2FF;cursor:pointer; border-radius:10px">User</div>
                                                                        </div>
                                                                    <?php else : ?>
                                                                        <div id="section_btn_admin_rol-<?= $filas ?>" style="display:none">
                                                                            <div class="admin_rol" id="<?= $filas ?>" style="background: #FBFF00;cursor:pointer; border-radius:10px">Admin</div>
                                                                        </div>
                                                                        <div id="section_btn_user_rol-<?= $filas ?>">
                                                                            <div class="user_rol" id="<?= $filas ?>" style="background: #00B2FF;cursor:pointer; border-radius:10px">User</div>
                                                                        </div>
                                                                    <?php endif ?>
                                                                    <input type="hidden" id="status_rol-<?= $filas ?>" name="status_rol[]" value="<?= $rus->rolusuario ?>">
                                                                </td>
                                                                <td style="text-align: center; font-size:1.1em; color:black">
                                                                    <input type="hidden" id="rowuserdelete<?= $filas ?>" value="<?= $rus->id ?>">
                                                                    <i class="userdelete" style="color: #000000; cursor: pointer" id="<?= $filas ?>">
                                                                        <img src="<?= base_url() ?>assets/img/delete_btn.png" style=" width: 30px">
                                                                    </i>
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
                            </div>
                        </div>
                        <div style="display:flex;justify-content:flex-end">
                            <div style="width:20%;display:flex; justify-content:center; padding-right:10px;padding-top:10px">
                                <button id="show_user_form_btn" style="display: block;width: 100%;padding: 10px;background-color: #007bff;color: #fff;font-size:1.3em;border: none;border-radius: 3px;cursor: pointer;">ALTA USUARIOS</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="show_user_form" style="display:none">
                <div style="display: flex;justify-content:center; padding-top:1%">
                    <div style="background-color: #CDCDCD;padding: 20px;border-radius: 5px;box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);width: 35%">
                        <div style="display:flex; justify-content:flex-end">
                            <i id="hide_user_form_btn" style="cursor:pointer"><img src="<?= base_url() ?>assets/img/close1.png" width="30px" height="30px"></i>
                        </div>
                        <div style="margin-bottom: 15px;">
                            <label style="display: block;margin-bottom: 5px;font-weight: bold;color:black;font-size:1.3em;">NOMBRE</label>
                            <input style="width: 100%;padding: 8px;border: 1px solid #000;border-radius: 3px;color:black;font-size:1.3em;" type="text" id="nombre" name="nombre" required>
                        </div>
                        <div style="margin-bottom: 15px;padding-bottom:15px">
                            <label style="display: block;margin-bottom: 5px;font-weight: bold;color:black;font-size:1.3em;">NOMBRE DE USUARIO</label>
                            <input style="width: 100%;padding: 8px;border: 1px solid #000;border-radius: 3px;color:black;font-size:1.3em;" type="text" id="nombreusuario" name="nombreusuario" required>
                        </div>
                        <button style="display: block;width: 100%;padding: 10px;background-color: #007bff;color: #fff;font-size:1.3em;border: none;border-radius: 3px;cursor: pointer;" id="send_loging_users" type="button">REGISTRAR</button>
                        <div id="loading_changes" style="display:none;padding-top:5px"><img src="<?= base_url() ?>assets/img/loading1.gif" style=" width: 40px"></div>
                    </div>
                </div>
            </div>
            <!--
        <div style="width: 40%;">
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <div class="row mt">
                            <div class="col-lg-12">
                                <div class="form-panel" style="background-color:#E1E1E1">
                                    <div style="display: flex; justify-content:space-between">
                                        <div>
                                            <h2 class="mb" style="color:black">TUS ACCESOS</h2>
                                        </div>
                                        <div>
                                            <?php
                                            foreach ($nombreusuario as $ius) {
                                            ?>
                                                <h2 class="mb" style="color:black"><?= $ius->nombreusuario ?></h2>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row mt">
                                        <div class="col-lg-12">
                                            <div class="form-panel">
                                                <table class="table">
                                                    <thead>
                                                        <tr style="width:100%; justify-content: center; text-align: center">
                                                            <th style="text-align: center; font-size:1.5em; color:black">ACCESO A CONSULTAS</th>
                                                            <th style="text-align: center; font-size:1.5em; color:black">ACCESO A MOBILIARIO</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($nombreusuario as $rus) {
                                                        ?>
                                                            <tr style="width:100%; justify-content: center; text-align: center">
                                                                <?php if ($rus->consultas == 1) : ?>
                                                                    <td style="text-align: center; font-size:1.5em; color:black">ACCESO</td>
                                                                <?php else : ?>
                                                                    <td style="text-align: center; font-size:1.5em; color:black">SIN ACCESO</td>
                                                                <?php endif ?>
                                                                <?php if ($rus->mobi == 1) : ?>
                                                                    <td style="text-align: center; font-size:1.5em; color:black">ACCESO</td>
                                                                <?php else : ?>
                                                                    <td style="text-align: center; font-size:1.5em; color:black">SIN ACCESO</td>
                                                                <?php endif ?>
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
        </div>-->
            <i id="recargar_pagina"></i>
        <?php else : ?>
        <?php endif ?>
    </section>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $("#show_user_form_btn").click(function() {
            $('#show_user_form').css("display", "block");
            $('#show_user_form_btn').css("display", "none");
            $("#send_loging_users").click(function() {
                var nombre = $('#nombre').val();
                var nombreusuario = $('#nombreusuario').val();
                if (nombre == '' || nombreusuario == '') {
                    alert('Uno o mas campos incompletos');
                    console.log('Faltan Campos');
                } else {
                    $('#loading_changes').css("display", "block");
                    $('#send_loging_users').css("display", "none");
                    $.ajax({
                        url: "<?= base_url() ?>Dashboard/login_access_users",
                        type: "post",
                        data: {
                            'nombre': nombre,
                            'nombreusuario': nombreusuario,
                        },
                        success: function() {
                            alert('Usuario Registrado!');
                            console.log('Usuario Registrado!');
                            $('#nombre').val("");
                            $('#nombreusuario').val("");
                            $('#loading_changes').css("display", "none");
                            $('#send_loging_users').css("display", "block");
                            $("#recargar_pagina").trigger("click");
                        }
                    })
                }
            });
        });
        $("#hide_user_form_btn").click(function() {
            $('#show_user_form').css("display", "none");
            $('#show_user_form_btn').css("display", "block");
        });
        $(".active_upload").click(function() {
            var fila = $(this).attr("id");
            var section_btn_act_upload = document.getElementById('section_btn_act_upload-' + fila);
            var section_btn_des_upload = document.getElementById('section_btn_des_upload-' + fila);
            document.getElementById('status_upload-' + fila).value = 0;
            section_btn_act_upload.style.display = 'none';
            section_btn_des_upload.style.display = 'block';
        });
        $(".desactive_upload").click(function() {
            var fila = $(this).attr("id");
            var section_btn_act_upload = document.getElementById('section_btn_act_upload-' + fila);
            var section_btn_des_upload = document.getElementById('section_btn_des_upload-' + fila);
            document.getElementById('status_upload-' + fila).value = 1;
            section_btn_act_upload.style.display = 'block';
            section_btn_des_upload.style.display = 'none';
        });


        $(".active_cat").click(function() {
            var fila = $(this).attr("id");
            var section_btn_act_cat = document.getElementById('section_btn_act_cat-' + fila);
            var section_btn_des_cat = document.getElementById('section_btn_des_cat-' + fila);
            document.getElementById('status_cat-' + fila).value = 0;
            section_btn_act_cat.style.display = 'none';
            section_btn_des_cat.style.display = 'block';
        });
        $(".desactive_cat").click(function() {
            var fila = $(this).attr("id");
            var section_btn_act_cat = document.getElementById('section_btn_act_cat-' + fila);
            var section_btn_des_cat = document.getElementById('section_btn_des_cat-' + fila);
            document.getElementById('status_cat-' + fila).value = 1;
            section_btn_act_cat.style.display = 'block';
            section_btn_des_cat.style.display = 'none';
        });


        $(".active_genc").click(function() {
            var fila = $(this).attr("id");
            var section_btn_act_genc = document.getElementById('section_btn_act_genc-' + fila);
            var section_btn_des_genc = document.getElementById('section_btn_des_genc-' + fila);
            document.getElementById('status_genc-' + fila).value = 0;
            section_btn_act_genc.style.display = 'none';
            section_btn_des_genc.style.display = 'block';
        });
        $(".desactive_genc").click(function() {
            var fila = $(this).attr("id");
            var section_btn_act_genc = document.getElementById('section_btn_act_genc-' + fila);
            var section_btn_des_genc = document.getElementById('section_btn_des_genc-' + fila);
            document.getElementById('status_genc-' + fila).value = 1;
            section_btn_act_genc.style.display = 'block';
            section_btn_des_genc.style.display = 'none';
        });


        $(".active_pdnt").click(function() {
            var fila = $(this).attr("id");
            var section_btn_act_pdnt = document.getElementById('section_btn_act_pdnt-' + fila);
            var section_btn_des_pdnt = document.getElementById('section_btn_des_pdnt-' + fila);
            document.getElementById('status_pdnt-' + fila).value = 0;
            section_btn_act_pdnt.style.display = 'none';
            section_btn_des_pdnt.style.display = 'block';
        });
        $(".desactive_pdnt").click(function() {
            var fila = $(this).attr("id");
            var section_btn_act_pdnt = document.getElementById('section_btn_act_pdnt-' + fila);
            var section_btn_des_pdnt = document.getElementById('section_btn_des_pdnt-' + fila);
            document.getElementById('status_pdnt-' + fila).value = 1;
            section_btn_act_pdnt.style.display = 'block';
            section_btn_des_pdnt.style.display = 'none';
        });


        $(".active_cons").click(function() {
            var fila = $(this).attr("id");
            var section_btn_act_cons = document.getElementById('section_btn_act_cons-' + fila);
            var section_btn_des_cons = document.getElementById('section_btn_des_cons-' + fila);
            document.getElementById('status_cons-' + fila).value = 0;
            section_btn_act_cons.style.display = 'none';
            section_btn_des_cons.style.display = 'block';
        });
        $(".desactive_cons").click(function() {
            var fila = $(this).attr("id");
            var section_btn_act_cons = document.getElementById('section_btn_act_cons-' + fila);
            var section_btn_des_cons = document.getElementById('section_btn_des_cons-' + fila);
            document.getElementById('status_cons-' + fila).value = 1;
            section_btn_act_cons.style.display = 'block';
            section_btn_des_cons.style.display = 'none';
        });


        $(".active_mob").click(function() {
            var fila = $(this).attr("id");
            var section_btn_act_mob = document.getElementById('section_btn_act_mob-' + fila);
            var section_btn_des_mob = document.getElementById('section_btn_des_mob-' + fila);
            document.getElementById('status_mob-' + fila).value = 0;
            section_btn_act_mob.style.display = 'none';
            section_btn_des_mob.style.display = 'block';
        });
        $(".desactive_mob").click(function() {
            var fila = $(this).attr("id");
            var section_btn_act_mob = document.getElementById('section_btn_act_mob-' + fila);
            var section_btn_des_mob = document.getElementById('section_btn_des_mob-' + fila);
            document.getElementById('status_mob-' + fila).value = 1;
            section_btn_act_mob.style.display = 'block';
            section_btn_des_mob.style.display = 'none';
        });


        $(".admin_rol").click(function() {
            var fila = $(this).attr("id");
            var section_btn_admin_rol = document.getElementById('section_btn_admin_rol-' + fila);
            var section_btn_user_rol = document.getElementById('section_btn_user_rol-' + fila);
            document.getElementById('status_rol-' + fila).value = 0;
            section_btn_admin_rol.style.display = 'none';
            section_btn_user_rol.style.display = 'block';
        });
        $(".user_rol").click(function() {
            var fila = $(this).attr("id");
            var section_btn_admin_rol = document.getElementById('section_btn_admin_rol-' + fila);
            var section_btn_user_rol = document.getElementById('section_btn_user_rol-' + fila);
            document.getElementById('status_rol-' + fila).value = 1;
            section_btn_admin_rol.style.display = 'block';
            section_btn_user_rol.style.display = 'none';
        });


        $('#update_all_status').click(function() {
            var user_ids = [];
            $("input[name='user_ids[]']").each(function(indexf, elemf) {
                user_ids.push(jQuery(this).val());
            });
            var user_names = [];
            $("input[name='user_names[]']").each(function(indexf, elemf) {
                user_names.push(jQuery(this).val());
            });
            var user_usernames = [];
            $("input[name='user_usernames[]']").each(function(indexf, elemf) {
                user_usernames.push(jQuery(this).val());
            });
            var status_upload = [];
            $("input[name='status_upload[]']").each(function(indexf, elemf) {
                status_upload.push(jQuery(this).val());
            });
            var status_cat = [];
            $("input[name='status_cat[]']").each(function(indexf, elemf) {
                status_cat.push(jQuery(this).val());
            });
            var status_genc = [];
            $("input[name='status_genc[]']").each(function(indexf, elemf) {
                status_genc.push(jQuery(this).val());
            });
            var status_pdnt = [];
            $("input[name='status_pdnt[]']").each(function(indexf, elemf) {
                status_pdnt.push(jQuery(this).val());
            });
            var status_cons = [];
            $("input[name='status_cons[]']").each(function(indexf, elemf) {
                status_cons.push(jQuery(this).val());
            });
            var status_mob = [];
            $("input[name='status_mob[]']").each(function(indexf, elemf) {
                status_mob.push(jQuery(this).val());
            });
            var status_rol = [];
            $("input[name='status_rol[]']").each(function(indexf, elemf) {
                status_rol.push(jQuery(this).val());
            });

            console.log(user_ids);
            console.log(user_names);
            console.log(user_usernames);
            console.log(status_upload);
            console.log(status_cat);
            console.log(status_genc);
            console.log(status_pdnt);
            console.log(status_cons);
            console.log(status_mob);
            console.log(status_rol);


            $('#loading_changes2').css("display", "block");
            $('#update_all_status').css("display", "none");
            $.ajax({
                url: "<?= base_url() ?>Dashboard/updatestatuscos",
                type: "post",
                data: {
                    'user_ids[]': user_ids,
                    'user_names[]': user_names,
                    'user_usernames[]': user_usernames,
                    'status_upload[]': status_upload,
                    'status_cat[]': status_cat,
                    'status_genc[]': status_genc,
                    'status_pdnt[]': status_pdnt,
                    'status_cons[]': status_cons,
                    'status_mob[]': status_mob,
                    'status_rol[]': status_rol,
                },
                success: function() {
                    console.log('datos enviados!');
                    $('#loading_changes2').css("display", "none");
                    $('#update_all_status').css("display", "block");
                    alert('Accesos Actualizados');
                    $("#recargar_pagina").trigger("click");
                }
            });
        });
        $('#recargar_pagina').click(function() {
            location.reload();
        });
        $('.userdelete').click(function(){
            var user_id = $(this).attr("id");
            var user_id_val = $('#rowuserdelete' + user_id).val();
            console.log(user_id_val);
            $.confirm({
                title: '¡ELIMINAR!',
                content: '¿Realmente desea eliminar a este usario de forma permanente?" ¡Esta acción no se podrá deshacer!',
                buttons: {
                    Aceptar: {
                        btnClass: 'btn-red',
                        action: function() {
                            $.ajax({
                                type: "POST",
                                url: "<?= base_url() ?>Dashboard/user_delete_access_control",
                                data: {
                                    "user_id_val": user_id_val,
                                },
                                success: function() {
                                    console.log("Usuario Eliminado");
                                    $("#rowuser" + user_id).remove();
                                    $.confirm({
                                        title: '!STATUS!',
                                        content: '¡Usuario Eliminado!',
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
                                }
                            });
                        }
                    },
                    Cancelar: function() {},
                }
            });
        });
    });
</script>