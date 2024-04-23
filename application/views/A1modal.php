<div>
    <i id="openModalBtn"></i>
    <i id="verify_user_questions"></i>
    <input type="hidden" id="usuario" name="usuario" value="marco.morales">
    <input type="hidden" id="nombre" name="nombre" value="Marco Alberto Morales Martinez">
    <div id="myModal" class="modal">
        <div class="modal-content" style="border-radius:10px">
            <div style="display: flex; justify-content:flex-end">
                <i id="hide_user_form_btn" style="cursor:pointer"><img src="<?= base_url() ?>assets/img/close1.png" width="30px" height="30px"></i>
            </div>
            <h2></h2>
            <div id="video_container">
                <video controls id="modalVideo" style="border-radius:10px">
                    <source src="<?= base_url() ?>assets/videos/sample.mp4" type="video/mp4">
                    Su navegador no soporta el elemento de video.
                </video>
            </div>
            <div id="video_container_btn_continue" style="display: none;">
                <div style="display:flex; justify-content:flex-end;padding-top: 4%;">
                    <button type="button" id="hide_video_show_question">Continuar</button>
                </div>
            </div>
            <div id="questions_container" style="display: none;">
                <div style="width:100%">
                    <div>
                        <div style="display:flex; justify-content:flex-start">
                            <span>1.- ¿Qué es un virus informático?</span>
                        </div>
                        <div style="display:flex; justify-content:flex-start">
                            <select name="Select1" id="Select1" style="color: black; width:80%">
                                <option value="">SELECCIONAR</option>
                                <option value="Un programa que protege tu computadora.">Un programa que protege tu computadora.</option>
                                <option value="Un programa que ayuda a acelerar la velocidad de tu computadora.">Un programa que ayuda a acelerar la velocidad de tu computadora.</option>
                                <option value="Un programa malicioso que se replica e infecta otros archivos.">Un programa malicioso que se replica e infecta otros archivos.</option>
                            </select>
                            <input type="hidden" name="Res1" id="Res1">
                        </div>
                    </div>
                    <div style="padding-top: 4%;">
                        <div style="display:flex; justify-content:flex-start">
                            <span>2.- ¿Cuál de las siguientes contraseñas es más segura?</span>
                        </div>
                        <div style="display:flex; justify-content:flex-start">
                            <select name="Select2" id="Select2" style="color: black; width:80%">
                                <option value="">SELECCIONAR</option>
                                <option value='"123456"'>"123456"</option>
                                <option value='"P@$$w0rd"'>"P@$$w0rd"</option>
                                <option value='"GatoAzul#2023"'>"GatoAzul#2023"</option>
                            </select>
                            <input type="hidden" name="Res2" id="Res2">
                        </div>
                    </div>
                    <div style="padding-top: 4%;">
                        <div style="display:flex; justify-content:flex-start">
                            <span>3.- ¿Qué es el phishing?</span>
                        </div>
                        <div style="display:flex; justify-content:flex-start">
                            <select name="Select3" id="Select3" style="color: black; width:80%">
                                <option value="">SELECCIONAR</option>
                                <option value="Un método para mejorar la velocidad de Internet.">Un método para mejorar la velocidad de Internet.</option>
                                <option value="Un ataque donde los ciberdelincuentes intentan engañarte para revelar información personal o financiera.">Un ataque donde los ciberdelincuentes intentan engañarte para revelar información personal o financiera.</option>
                                <option value="Un tipo de software malicioso.">Un tipo de software malicioso.</option>
                            </select>
                            <input type="hidden" name="Res3" id="Res3">
                        </div>
                    </div>
                    <div style="padding-top: 4%;">
                        <div style="display:flex; justify-content:flex-start">
                            <span>4.- ¿Qué significa VPN en ciberseguridad?</span>
                        </div>
                        <div style="display:flex; justify-content:flex-start">
                            <select name="Select4" id="Select4" style="color: black; width:80%">
                                <option value="">SELECCIONAR</option>
                                <option value="Virus Protection Network">Virus Protection Network</option>
                                <option value="Virtual Private Network">Virtual Private Network</option>
                                <option value="Very Private Name">Very Private Name</option>
                            </select>
                            <input type="hidden" name="Res4" id="Res4">
                        </div>
                    </div>
                    <div style="padding-top: 4%;">
                        <div style="display:flex; justify-content:flex-start">
                            <span>5.- ¿Por qué es importante mantener el software y los sistemas operativos actualizados?</span>
                        </div>
                        <div style="display:flex; justify-content:flex-start">
                            <select name="Select5" id="Select5" style="color: black; width:80%">
                                <option value="">SELECCIONAR</option>
                                <option value="Para ahorrar dinero.">Para ahorrar dinero.</option>
                                <option value="Para mejorar el rendimiento de la computadora.">Para mejorar el rendimiento de la computadora.</option>
                                <option value="Para corregir vulnerabilidades de seguridad conocidas.">Para corregir vulnerabilidades de seguridad conocidas.</option>
                            </select>
                            <input type="hidden" name="Res5" id="Res5">
                        </div>
                    </div>
                    <div style="padding-top: 4%;">
                        <div style="display:flex; justify-content:flex-start">
                            <span>6.- ¿Cuál es una práctica recomendada para proteger tus contraseñas?</span>
                        </div>
                        <div style="display:flex; justify-content:flex-start">
                            <select name="Select6" id="Select6" style="color: black; width:80%">
                                <option value="">SELECCIONAR</option>
                                <option value="Compartirlas con amigos cercanos.">Compartirlas con amigos cercanos.</option>
                                <option value="Usar la misma contraseña para todas tus cuentas.">Usar la misma contraseña para todas tus cuentas.</option>
                                <option value="Usar contraseñas únicas y complejas para cada cuenta.">Usar contraseñas únicas y complejas para cada cuenta.</option>
                            </select>
                            <input type="hidden" name="Res6" id="Res6">
                        </div>
                    </div>
                    <div style="padding-top: 4%;">
                        <div style="display:flex; justify-content:flex-start">
                            <span>7.- ¿Qué debe hacerse con los correos electrónicos sospechosos o no solicitados? </span>
                        </div>
                        <div style="display:flex; justify-content:flex-start">
                            <select name="Select7" id="Select7" style="color: black; width:80%">
                                <option value="">SELECCIONAR</option>
                                <option value="Abrirlos y seguir sus instrucciones.">Abrirlos y seguir sus instrucciones.</option>
                                <option value="Eliminarlos sin abrirlos o marcarlos como spam.">Eliminarlos sin abrirlos o marcarlos como spam.</option>
                                <option value="Responder a ellos para obtener más información.">Responder a ellos para obtener más información.</option>
                            </select>
                            <input type="hidden" name="Res7" id="Res7">
                        </div>
                    </div>
                </div>
            </div>
            <div id="video_container_btn_return" style="display: none;">
                <div style="display:flex; justify-content:space-between; padding-top: 4%;">
                    <div>
                        <button type="button" id="hide_question_show_video">ver video</button>
                    </div>
                    <div>
                        <button id="obtenerFechayguadrar">Enviar</button>
                        <input type="hidden" id="date_hour_form">
                        <i type="button" id="save_questions"></i>
                    </div>
                </div>
            </div>
            <div id="success_send_questions" style="display: none;">
                <div>
                    <h2>¡Se Ha Enviado Su Respuesta!</h2>
                </div>
                <div>
                    <img src="<?= base_url() ?>assets/img/checked_form.png" width="200px" height="200px">
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(window).on('load', function() {
            setTimeout(function() {
                $("#verify_user_questions").trigger("click");
            }, 1000);
        });
        $("#openModalBtn").click(function() {
            $("#myModal").show();
            var video = document.getElementById("modalVideo");
            video.play();

            var modalVideo = document.getElementById('modalVideo');
            var video_container_btn_continue = document.getElementById('video_container_btn_continue');
            video.addEventListener('timeupdate', function() {
                var tiempoActual = video.currentTime;
                var duracion = video.duration;
                // Verifica si le faltan 2 segundos para terminar
                if (duracion - tiempoActual <= 2) {
                    video_container_btn_continue.style.display = 'block';
                }
            });
        });
        $("#hide_user_form_btn").click(function() {
            $("#myModal").hide();
            var video = document.getElementById("modalVideo");
            video.pause();
        });
        $('#hide_video_show_question').click(function() {
            var video = document.getElementById("modalVideo");
            video.pause();
            $("#video_container").hide();
            $("#video_container_btn_continue").hide();
            $("#video_container_btn_return").show();
            $("#questions_container").show();
        });
        $('#hide_question_show_video').click(function() {
            $("#video_container").show();
            $("#video_container_btn_continue").show();
            $("#video_container_btn_return").hide();
            $("#questions_container").hide();
        });
        $('#save_questions').click(function() {
            var Res1 = $('#Res1').val();
            var Res2 = $('#Res2').val();
            var Res3 = $('#Res3').val();
            var Res4 = $('#Res4').val();
            var Res5 = $('#Res5').val();
            var Res6 = $('#Res6').val();
            var Res7 = $('#Res7').val();
            var usuario = $('#usuario').val();
            var nombre = $('#nombre').val();
            var date_hour_form = $('#date_hour_form').val();
            if (Res1 == '' || Res2 == '' || Res3 == '' || Res4 == '' || Res5 == '' || Res6 == '' || Res7 == '') {
                alert('Tiene campos obligatorios vacios');
            } else {
                $.ajax({
                    url: "<?= base_url() ?>Dashboard/savequestions",
                    type: "post",
                    data: {
                        'usuario': usuario,
                        'nombre': nombre,
                        'Res1': Res1,
                        'Res2': Res2,
                        'Res3': Res3,
                        'Res4': Res4,
                        'Res5': Res5,
                        'Res6': Res6,
                        'Res7': Res7,
                        'date_hour_form': date_hour_form,
                    },
                    success: function() {
                        console.log(Res1);
                        console.log(Res2);
                        console.log(Res3);
                        console.log(Res4);
                        console.log(Res5);
                        console.log(Res6);
                        console.log(Res7);
                        console.log('Encuesta Enviada!');
                        $("#success_send_questions").show();
                        $("#video_container_btn_return").hide();
                        $("#questions_container").hide();
                    }
                })
            }
        });
        $("#obtenerFechayguadrar").click(function() {
            var fecha = new Date();
            var dia = fecha.getDate();
            var mes = fecha.getMonth() + 1; // Los meses se indexan desde 0 (enero) hasta 11 (diciembre)
            var año = fecha.getFullYear();
            var horas = fecha.getHours();
            var minutos = fecha.getMinutes();
            var segundos = fecha.getSeconds();
            var fechaHoraFormateada = dia + "/" + mes + "/" + año + "_" + horas + ":" + minutos + ":" + segundos;
            $("#date_hour_form").val(fechaHoraFormateada);
            $("#save_questions").trigger("click");
        });
        $("#Select1").change(function() {
            var ValSel1 = $(this).val();
            $('#Res1').val(ValSel1);
        });
        $("#Select2").change(function() {
            var ValSel2 = $(this).val();
            $('#Res2').val(ValSel2);
        });
        $("#Select3").change(function() {
            var ValSel3 = $(this).val();
            $('#Res3').val(ValSel3);
        });
        $("#Select4").change(function() {
            var ValSel4 = $(this).val();
            $('#Res4').val(ValSel4);
        });
        $("#Select5").change(function() {
            var ValSel5 = $(this).val();
            $('#Res5').val(ValSel5);
        });
        $("#Select6").change(function() {
            var ValSel6 = $(this).val();
            $('#Res6').val(ValSel6);
        });
        $("#Select7").change(function() {
            var ValSel7 = $(this).val();
            $('#Res7').val(ValSel7);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#verify_user_questions").click(function() {
            var usuario = $("#usuario").val();
            console.log(usuario);
            $.ajax({
                url: "<?= base_url() ?>Dashboard/buscarUsuario",
                method: "POST",
                data: {
                    usuario: usuario
                },
                success: function(response) {
                    console.log(response);
                    if (response.existe) {
                        console.log("Encuesta Contestada");
                    } else {
                        console.log("Debe Contestar Encuesta");
                        $("#openModalBtn").trigger("click");
                    }
                },
                error: function() {
                    console.log("Error al realizar la solicitud.");
                }
            });
        });
    });
</script>

<style type="text/css">
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: white;
        margin: 5% auto;
        padding: 20px;
        width: 50%;
        text-align: center;
        position: relative;
    }

    video {
        max-width: 100%;
        height: auto;
        max-height: 300px;
    }
</style>