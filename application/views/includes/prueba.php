<?php

	function cargaSubMenus2($submenu, $numid) {
        if (empty($submenu)) return "";
        $strSubMenu = "<ul>" . PHP_EOL;
      //  print_r($numid);
        foreach ($submenu as $key => $value) {
            $onclick = !empty($value->submenu)?"onclick='return false;'":"";
            //$link = $value->acceso==0?"#":$value->url;
            $link = $value->url;
			if($link == "#"){
				$class = "has-arrow" ;			
			}else{
				$class = "" ;			
			}
            if ($value->acceso==1) {
			//116126
			if($numid == "120073"){

				if($value->texto=="Consulta Estados Financieros"){
				
					$strSubMenu .= PHP_EOL .
				"    <li> " . PHP_EOL .
				"        <a href='/edosFinancieros/archivos'  > " . PHP_EOL .
				"            <span >Admin. Archivos</span> " . PHP_EOL .
				"        </a> " .
						
				"    </li> " . PHP_EOL;
				
				}
			}				
//112304				
            $strSubMenu .= PHP_EOL .
            "    <li> " . PHP_EOL .
            "        <a href=\"".$link."\"  class=\"".$class."\"  aria-expanded='false' ".$onclick."> " . PHP_EOL .
            "            <span >". $value->texto ."</span> " . PHP_EOL .
            "        </a> " .
                    cargaSubMenus2($value->submenu, $numid) .
            "    </li> " . PHP_EOL;
			}
			
			/*
			
			if($numid == "59345"){
				$strSubMenu .= PHP_EOL .
            "    <li> " . PHP_EOL .
            "        <a href='/edosFinancieros/archivos'  > " . PHP_EOL .
            "            <span >Admin. Archivos</span> " . PHP_EOL .
            "        </a> " .
                    
            "    </li> " . PHP_EOL;
			}
			*/
				
			
            
        }
        $strSubMenu .= "</ul>" . PHP_EOL;
        return $strSubMenu;
    }

    $menu_izq = $this->session->userdata('menu_izq');
	//print_r($menu_izq);
	
    $menu_der = $this->session->userdata('menu_der');

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Title -->
    <title>Intranet Avante</title>

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="<?= base_url() . 'webroot/assets_x/css/plugins/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?= base_url() . 'webroot/assets_x/css/plugins/font-awesome.css'?>">
    <link rel="stylesheet" href="<?= base_url() . 'webroot/assets_x/css/plugins/magnific-popup.css'?>">
    <link rel="stylesheet" href="<?= base_url() . 'webroot/assets_x/css/plugins/simplebar.css'?>">
    <link rel="stylesheet" href="<?= base_url() . 'webroot/assets_x/css/plugins/owl.carousel.min.css'?>">
    <link rel="stylesheet" href="<?= base_url() . 'webroot/assets_x/css/plugins/owl.theme.default.min.css'?>">
    <link rel="stylesheet" href="<?= base_url() . 'webroot/assets_x/css/plugins/jquery.animatedheadline.css'?>">

    <!-- CSS Base -->
    <link rel="stylesheet" class="theme-st" href="<?= base_url() . 'webroot/assets_x/css/style-dark.css'?>">

    <!-- Settings Style -->
    <link rel="stylesheet" class="pos-nav" href="<?= base_url() . 'webroot/assets_x/css/settings/left-nav.css'?>">
    <link rel="stylesheet" class="box-bd" href="<?= base_url() . 'webroot/assets_x/css/settings/box/box.css'?>">
    <link rel="stylesheet" class="box-st" href="<?= base_url() . 'webroot/assets_x/css/settings/box/circle.css'?>">
    <link rel="stylesheet" class="box-tl" href="<?= base_url() . 'webroot/assets_x/css/settings/title/title.css'?>">
    <link rel="stylesheet" class="style-cl"
        href="<?= base_url() . 'webroot/assets_x/css/settings/color/blue-color.css'?>">

    <link rel="stylesheet" href="<?= base_url() . 'webroot/assets_x/setting/style-demo.css'?>">


    <link rel="stylesheet" href="https://unpkg.com/metismenu/dist/metisMenu.min.css" />

    <link href="<?= base_url() . 'webroot/assets_x/css/mm-vertical.css'?>" rel="stylesheet" type="text/css" />

    <style type="text/css">
    .ir-arriba {
        display: inline;
        background-repeat: no-repeat;
        font-size: 20px;
        color: #1880F0;
        cursor: pointer;
        position: fixed;
        bottom: 10px;
        right: 10px;
        z-index: 2;
    }

    .cursor {
        cursor: pointer;
    }

    .carousel-control-next,
    .carousel-control-prev {
        filter: invert(100%);
    }

    .btn-flotante {
        font-size: 16px;
        /* Cambiar el tamaño de la tipografia */
        text-transform: uppercase;
        /* Texto en mayusculas */
        font-weight: bold;
        /* Fuente en negrita o bold */
        color: #ffffff;
        /* Color del texto */
        border-radius: 5px;
        /* Borde del boton */
        letter-spacing: 2px;
        /* Espacio entre letras */
        padding: 18px 30px;
        /* Relleno del boton */
        position: fixed;
        bottom: 40px;
        right: 40px;
        transition: all 300ms ease 0ms;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        z-index: 99;
    }

    .btn-flotante:hover {
        background-color: #113C7D;
        /* Color de fondo al pasar el cursor */
        box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
        transform: translateY(-7px);
    }

    @media only screen and (max-width: 600px) {
        .btn-flotante {
            font-size: 14px;
            padding: 12px 20px;
            bottom: 20px;
            right: 20px;
        }
    }
    </style>
	
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loading-area">
            <div class="circle"></div>
        </div>
        <div class="left-side"></div>
        <div class="right-side"></div>
    </div>
    <!-- Main Site -->
    <div id="home">
        <div id="view">
            <div id="resume">
                <div id="portfolio">
                    <div id="blog">
                        <div>
                            <?php
                        // Revisamos que haya un video
                        $hayVideo = false;
                        $video = "";
                        $sliders = $slider->result();
                        
                        if (!$hayVideo) {
				
                        $cont=1;
                        foreach ($sliders as $row) {                                
							if($row->boton_link!=''){
								?>

                            <a class="btn-flotante" id="pdf">
                                <div id="img-pdf" style="display: none;"><img
                                        src="<?= base_url() . 'webroot/img/slider/' . $row->img ?>" width="365px"
                                        height="220px" />
                                </div>
                                <button type="button" onclick="window.open('<?=$row->boton_link?>','_blank')"
                                    class="btn-st"><?=$row->boton_text?></button>
                            </a>
                            <?php
							}
                        ?>

                            <?php
                        $cont++;
						
                        }
                   	} 
                    ?>
                        </div>
                        <div id="contact">
                            <div class="header-mobile">
                                <a class="header-toggle"><i class="fas fa-bars"></i></a>
                                <h2>Avante</h2>
                            </div>
                            <!-- Left Block -->
                            <nav class="header-main" data-simplebar style="">

                                <!-- Logo 
								<div class="logo">
									<img src="assets/img/logo-avante-pequeno.png" alt="">
								</div>-->
                                <ul>
                                    <li>
                                        <a href="#home" class="icon-h fas fa-house-damage" title="Página Principal"></a>
                                    </li>
                                    <li>
                                        <a href="#resume" class="icon-r fas fa-bars" title="Menu"></a>
                                    </li>
                                    <li>
                                        <a href="#view" class="icon-a fas fa-newspaper"
                                            title="Secciones de Interes"></a>
                                    </li>
                                    <li>
                                        <a href="https://tienda.tiendasoptima.com" target="_blanck"
                                            class="icon-h fas fa-shopping-cart" title="Tiendas Optima"></a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url().'/aulas/'?>" target="_blanck"
                                            class="icon-h fas fa-calendar-alt" title="Reservación de Salas"></a>
											
                                    </li>
									
									<i id="openModalBtn" style="font-size:.8em">Modal</i>

                                </ul>
                            </nav>
                            <nav class="header-sound">
                                <!-- Sound wave -->
                                <a class="music-bg" id="unmuteButton">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <p> Sonido</p>
                                </a>
                                <!--<button id="unmuteButton">Sonido</button>-->
                            </nav>

                            <!-- Home Section -->
                            <div class="pt-home">
								<div id="myModal" style="display: none; position:fixed; z-index:1;left:0;top:0;width:100%;height:100%;background-color: rgba(0, 0, 0, 0.5);">
									<div style="background-color: white;margin: 3% auto;padding: 20px;width: 50%;text-align: center;position: relative;border-radius:10px">
										<div style="display: flex; justify-content:flex-end">
											<i id="hide_user_form_btn" style="cursor:pointer"><img src="<?= base_url() . 'webroot/assets/encvideo/close1.png'?>" width="30px" height="30px"></i>
										</div>
										<h2></h2>
										<div id="video_container">
											<video controls id="modalVideo" style="max-width: 100%;height: auto;max-height: 300px;border-radius:10px">
												<source src="<?= base_url() . 'webroot/assets/encvideo/sample.mp4'?>" type="video/mp4">
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
													<div style="text-align: left;">
														<span style="color:black; font-size:.8em">1.- ¿Qué es un virus informático?</span>
													</div>
													<div style="display:flex; justify-content:flex-start">
														<select name="Select1" id="Select1" style="color: black; width:80%; font-size:.7em">
															<option value="">SELECCIONAR</option>
															<option value="Un programa que protege tu computadora.">Un programa que protege tu computadora.</option>
															<option value="Un programa que ayuda a acelerar la velocidad de tu computadora.">Un programa que ayuda a acelerar la velocidad de tu computadora.</option>
															<option value="Un programa malicioso que se replica e infecta otros archivos.">Un programa malicioso que se replica e infecta otros archivos.</option>
														</select>
														<input type="hidden" name="Res1" id="Res1">
													</div>
												</div>
												<div style="padding-top: 3%;">
													<div style="text-align: left;">
														<span style="color:black; font-size:.8em">2.- ¿Cuál de las siguientes contraseñas es más segura?</span>
													</div>
													<div style="display:flex; justify-content:flex-start">
														<select name="Select2" id="Select2" style="color: black; width:80%; font-size:.7em">
															<option value="">SELECCIONAR</option>
															<option value='"123456"'>"123456"</option>
															<option value='"P@$$w0rd"'>"P@$$w0rd"</option>
															<option value='"GatoAzul#2023"'>"GatoAzul#2023"</option>
														</select>
														<input type="hidden" name="Res2" id="Res2">
													</div>
												</div>
												<div style="padding-top: 3%;">
													<div style="text-align: left;">
														<span style="color:black; font-size:.8em">3.- ¿Qué es el phishing?</span>
													</div>
													<div style="display:flex; justify-content:flex-start">
														<select name="Select3" id="Select3" style="color: black; width:80%; font-size:.7em">
															<option value="">SELECCIONAR</option>
															<option value="Un método para mejorar la velocidad de Internet.">Un método para mejorar la velocidad de Internet.</option>
															<option value="Un ataque donde los ciberdelincuentes intentan engañarte para revelar información personal o financiera.">Un ataque donde los ciberdelincuentes intentan engañarte para revelar información personal o financiera.</option>
															<option value="Un tipo de software malicioso.">Un tipo de software malicioso.</option>
														</select>
														<input type="hidden" name="Res3" id="Res3">
													</div>
												</div>
												<div style="padding-top: 3%;">
													<div style="text-align: left;">
														<span style="color:black; font-size:.8em">4.- ¿Qué significa VPN en ciberseguridad?</span>
													</div>
													<div style="display:flex; justify-content:flex-start">
														<select name="Select4" id="Select4" style="color: black; width:80%; font-size:.7em">
															<option value="">SELECCIONAR</option>
															<option value="Virus Protection Network">Virus Protection Network</option>
															<option value="Virtual Private Network">Virtual Private Network</option>
															<option value="Very Private Name">Very Private Name</option>
														</select>
														<input type="hidden" name="Res4" id="Res4">
													</div>
												</div>
												<div style="padding-top: 3%;">
													<div style="text-align: left;">
														<span style="color:black; font-size:.8em">5.- ¿Por qué es importante mantener el software y los sistemas operativos actualizados?</span>
													</div>
													<div style="display:flex; justify-content:flex-start">
														<select name="Select5" id="Select5" style="color: black; width:80%; font-size:.7em">
															<option value="">SELECCIONAR</option>
															<option value="Para ahorrar dinero.">Para ahorrar dinero.</option>
															<option value="Para mejorar el rendimiento de la computadora.">Para mejorar el rendimiento de la computadora.</option>
															<option value="Para corregir vulnerabilidades de seguridad conocidas.">Para corregir vulnerabilidades de seguridad conocidas.</option>
														</select>
														<input type="hidden" name="Res5" id="Res5">
													</div>
												</div>
												<div style="padding-top: 3%;">
													<div style="text-align: left;">
														<span style="color:black; font-size:.8em">6.- ¿Cuál es una práctica recomendada para proteger tus contraseñas?</span>
													</div>
													<div style="display:flex; justify-content:flex-start">
														<select name="Select6" id="Select6" style="color: black; width:80%; font-size:.7em">
															<option value="">SELECCIONAR</option>
															<option value="Compartirlas con amigos cercanos.">Compartirlas con amigos cercanos.</option>
															<option value="Usar la misma contraseña para todas tus cuentas.">Usar la misma contraseña para todas tus cuentas.</option>
															<option value="Usar contraseñas únicas y complejas para cada cuenta.">Usar contraseñas únicas y complejas para cada cuenta.</option>
														</select>
														<input type="hidden" name="Res6" id="Res6">
													</div>
												</div>
												<div style="padding-top: 3%;">
													<div style="text-align: left;">
														<span style="color:black; font-size:.8em">7.- ¿Qué debe hacerse con los correos electrónicos sospechosos o no solicitados? </span>
													</div>
													<div style="display:flex; justify-content:flex-start">
														<select name="Select7" id="Select7" style="color: black; width:80%; font-size:.7em">
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
												<img src="<?= base_url() . 'webroot/assets/encvideo/checked_form.png'?>" width="200px" height="200px">
											</div>
										</div>
										
										
									</div>
								</div>
                                <div class="addition-bg">
									
									
                                    <!-- Fullscreen Slider-->
                                    <!--<video id="video" loop muted autoplay>
							<source src="<?= base_url() . 'webroot/assets_x/css/slide-1.mp4'?>" type="video/mp4">
					</video>
      
				    <div class="slide-kenburns slide-kenburns-1"></div>
						<div class="slide-kenburns slide-kenburns-2"></div>-->

                                    <div id="slideshow">
                                        <?php
                        // Revisamos que haya un video
                        $hayVideo = false;
                        $video = "";
                        $sliders = $slider->result();
                        foreach ($sliders as $row) {
                            $hayVideo = (($temp = strlen($row->img) - strlen('.mp4')) >= 0 && strpos($row->img, '.mp4', $temp) !== false);
                            if ($hayVideo) {
                                $video = $row->img;
                                $video_type = "video/" . substr($video,-4);
                            }
                        }
                        if (!$hayVideo) {
				
                        $cont=1;
                        foreach ($sliders as $row) {

							if($row->boton_link == ''){
							?>
                                        <img src="<?= base_url() . 'webroot/img/slider/' . $row->img ?>"
                                            class="img-fluid">
                                        <?php
							$cont++;
							}
						}
                   } else {
                        ?>
                                        <div style="text-align: center;">
                                            <video autoplay loop style="width: 100% !important; padding: 0px;"
                                                id="video" data-autoplay="true" data-loop="true" data-volume="0"
                                                data-style="{}" src="<?= base_url() . 'webroot/img/slider/' . $video ?>"
                                                controls muted>
                                                <source
                                                    style="font-size: 2px; line-height: 4px; margin: 0px; padding: 0px;"
                                                    data-style="{}"
                                                    src="<?= base_url() . 'webroot/img/slider/' . $video ?>"
                                                    type="<?=$video_type?>">
                                                Tu navegador no soporta este tipo de videos.
                                                </source>
                                            </video>
                                        </div>
                                        <?php
                    }
                    ?>
                                    </div>



                                </div>
                                <section>

                                    <table width="100%" style="top: 5%; position:absolute " class="">
                                        <tr>
                                            <td width="7%"></td>
                                            <td width="43%" style="text-align: left;">
                                                <img src="<?= base_url() . 'webroot/assets_x/img/logo-avante-pequeno.png'?>"
                                                    alt="" class="border-primary">
                                            </td>
                                            <td width="43%" style="text-align: right;"><?=$nombre?>
                                                <i class="fas fa-user"></i>
                                                <!--<img src="http://assets.stickpng.com/images/585e4bf3cb11b227491c339a.png"
                                                    alt="..." class="border-primary  rounded-circle"
                                                    onerror="reemplaza_imagen(this);" style="width: 50px; height:50px;">-->
                                            </td>
                                            <td width="7%"></td>
                                        </tr>
                                    </table>
                                    <div class="menu">

                                    </div>

                                    <!-- Social -->
                                    <div class="social">
                                        <ul>
                                            <li><a href="https://www.facebook.com/AvanteTextil.Oficial/"
                                                    data-toggle="tooltip" data-placement="left" title="facebook"
                                                    target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="https://mx.linkedin.com/company/avante-textil"
                                                    data-toggle="tooltip" data-placement="left" title="linkedin"
                                                    target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                            <li><a href="https://www.instagram.com/optimaoficial/" data-toggle="tooltip"
                                                    data-placement="left" title="instagram" target="_blank"><i
                                                        class="fab fa-instagram"></i></a></li>
                                            <li><a href="https://www.youtube.com/user/avantetextil1"
                                                    data-toggle="tooltip" data-placement="left" title="youtube"
                                                    target="_blank"><i class="fab fa-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </section>
                            </div>

                            <!-- About Section -->

                            <div class="page pt-view" data-simplebar style="">
                                <section class="container" id="container_x">

                                    <!-- Boton hacia arriba -->
                                    <a class="ir-arriba">
                                        <span class="fa-stack">
                                            <i class="icon-h fas fa-chevron-circle-up fa-2x"></i>
                                        </span>
                                    </a>

                                    <!-- Section Title NOTICIAS AVANTE -->
                                    <div class="header-page mt-30 mob-mt">
                                        <div class="row ">
                                            <div class="col-sm"></div>
                                            <div class="col-sm"><img
                                                    src="<?= base_url() . 'webroot/assets_x/img/noticias-avante.png'?>"
                                                    class="img-fluid" width="70%" alt=""></div>
                                            <div class="col-sm"></div>
                                        </div>
                                    </div>
                                    <!-- Personal Info Start NOTICIAS AVANTE-->
                                    <div class="row mt-100">
                                        <!-- Information Block -->
                                        <div class="col-lg-11 col-sm-12">
                                            <div class="row">
                                                <div id="carouselExampleIndicators" class="carousel slide"
                                                    data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                                            class="active"></li>
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <!--  inicio carousel-->
                                                        <?php   
                        $c = 0;  
                        $active = "active" ;  
                          foreach ($noticias->result() as $row) {            
                          if($row->tipo == 0){
                          if($c > 0){
                            $active="";  
                          }
                          $c++;
                              ?>
                                                        <div class="carousel-item <?=$active?>">
                                                            <div class="row">
                                                                <div class="col-2 ">
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="price box-1">
                                                                        <img
                                                                            src="<?= base_url() . 'webroot/img/noticias/' . $row->img?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 ">
                                                                    <p style="text-align: center; padding-top:10%">
                                                                        <b><?=$row->titulo?></b><br><br><?=$row->intro?>
                                                                    </p>
                                                                    <div class="loc"
                                                                        style="text-align: center; padding:10px;">
                                                                        <div class="banner">
                                                                            <button type="submit"
                                                                                id="<?=$row->noticias_id ?>"
                                                                                class="btn-st menux">IR a
                                                                                Noticia</button>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2 ">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                              }
                              ?>
                                                        <?php
                            }
                          ?>
                                                        <!--fin carousel  -->
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                                        role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleIndicators"
                                                        role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Service Row Start -->
                                    <br>
                                    <div class="row no-gutters">
                                        <!-- Item -->
                                        <div class="col-lg-3">
                                            <div class="price box-1">
                                                <img alt="" id="periodico" class="cursor com_avante"
                                                    src="<?= base_url() . 'webroot/assets_x/img/01 ESPACIO DE COMUNICACION.png'?>">
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="col-lg-3">
                                            <div class="price box-1">
                                                <img alt="" id="directorio" class="cursor com_avante"
                                                    src="<?= base_url() . 'webroot/assets_x/img/02 DIRECTORIO.png'?>">
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="col-lg-3">
                                            <div class="price box-1">
                                                <img alt="" id="aulas" class="cursor com_avante"
                                                    src="<?= base_url() . 'webroot/assets_x/img/03 RESERVACION DE SALAS.png'?>">
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="col-lg-3 ">
                                            <div class="price box-1">
                                                <img alt="" id="buzon" class="cursor com_avante"
                                                    src="<?= base_url() . 'webroot/assets_x/img/04 BUSON DE SUGERENCIAS.png'?>">
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="col-lg-3 ">
                                            <div class="price box-1">
                                                <img alt="" id="convenio_edu" class="cursor com_avante"
                                                    src="<?= base_url() . 'webroot/assets_x/img/05 CONVENIOS.png'?>">
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="col-lg-3 ">
                                            <div class="price box-1">
                                                <img alt="" id="bolsatrabajoavante" class="cursor"
                                                    src="<?= base_url() . 'webroot/assets_x/img/06 TALENTO AVANTE.png'?>">
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="col-lg-3 ">
                                            <div class="price box-1">
                                                <img alt="" id="promociones" class="cursor com_avante"
                                                    src="<?= base_url() . 'webroot/assets_x/img/07 DESCUENTOS O PROMOCIONES.png'?>">
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="col-lg-3 ">
                                            <div class="price box-1">
                                                <img alt="" id="voluntad" class="cursor com_avante"
                                                    src="<?= base_url() . 'webroot/assets_x/img/08 VOLUNTAD ES AVANTE.png'?>">
                                            </div>
                                        </div>
                                    </div>


                                    <br>
                                    <!-- Section Title COMUNIDAD AVANTE -->
                                    <div class="header-page mt-30 mob-mt">
                                        <div class="row ">
                                            <div class="col-sm"></div>
                                            <div class="col-sm"><img
                                                    src="<?= base_url() . 'webroot/assets_x/img/comunidad-avante.png'?>"
                                                    class="img-fluid" width="70%" alt=""></div>
                                            <div class="col-sm"></div>
                                        </div>
                                    </div>

                                    <!-- Row Start -->
                                    <div class="row mt-100  no-gutters">
                                        <!-- Item -->
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="price box-1">
                                                <a href="<?= base_url(); ?>normatividad">
                                                    <img src="<?= base_url() . 'webroot/assets_x/img/1 POLÍTICAS & PROCEDIMIENTOS.png'?>"
                                                        width="55%" height="55%" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="price box-1">
                                                <a href="<?= base_url() ?>concursos/votacion/">
                                                    <img src="<?= base_url() . 'webroot/assets_x/img/2 concursos.png'?>"
                                                        width="55%" height="70%" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="price box-1">
                                                <a href="<?= base_url(); ?>avisooportuno">
                                                    <img src="<?= base_url() . 'webroot/assets_x/img/3 aviso-oportuno.png'?>"
                                                        width="55%" height="55%" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="price box-1">
                                                <a href="<?= base_url(); ?>reconocimiento/mostrar">
                                                    <img src="<?= base_url() . 'webroot/assets_x/img/4 reconocimientos.png'?>"
                                                        width="55%" height="55%" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="price box-1">
                                                <a href="<?= base_url(); ?>sugerencia">
                                                    <img src="<?= base_url() . 'webroot/assets_x/img/5 recomentaciones-finde.png'?>"
                                                        width="55%" height="55%" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Item -->
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="price box-1">
                                                <a href="<?= base_url(); ?>birthday">
                                                    <img src="<?= base_url() . 'webroot/assets_x/img/6 cumpleaños.png'?>"
                                                        width="55%" height="55%" alt="">
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <!-- Service Row Start -->
                                    <div class="row no-gutters">
                                        <!-- Item -->

                                        <?php        
    foreach ($noticias->result() as $row) {
      if($row->tipo == 1){
      ?>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="price box-1">
                                                <img class="cursor menux" id="<?=$row->noticias_id ?>"
                                                    src="<?= base_url() . 'webroot/assets_x/img/menu-directivos.png'?>">
                                            </div>
                                        </div>
                                        <?php
      }
    if($row->tipo == 2){
        ?> <div class="col-lg-6 col-sm-12">
                                            <div class="price box-1">
                                                <img class="cursor menux" id="<?=$row->noticias_id ?>"
                                                    src="<?= base_url() . 'webroot/assets_x/img/menu-avante.png'?>">
                                            </div>
                                        </div>
                                        <?php
        }
      }
    ?>
                                    </div>


                                    <br>
                                    <!-- Row Start -->
                                    <div class="row no-gutters">
                                        <?php
                  					foreach ($nuestros_sitios as $key) {
                    				?>
                                        <div class="col-3">
                                            <div class="price box-1" style="padding: 10px;">
                                                <a href="http://<?=$key["link"]?>" target="_blank" class="cursor"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="<?=$key['texto']?>" data-position="bottom"
                                                    data-delay="50"><img
                                                        src="<?= base_url(); ?>webroot/img/<?=$key["imagen"]?>" /></a>
                                            </div>
                                        </div>
                                        <?php     
                     				}
                					?>
                                    </div>

                                    <!-- Section Title OTROS SITIOS -->
                                    <div class="header-page mt-30 mob-mt">
                                        <div class="row ">
                                            <div class="col-sm"></div>
                                            <div class="col-sm"><img
                                                    src="<?= base_url() . 'webroot/assets_x/img/otros-sitios.png'?>"
                                                    class="img-fluid" width="70%" alt=""></div>
                                            <div class="col-sm"></div>
                                        </div>
                                    </div>


                                    <br>


                                    <div class="row no-gutters">
                                        <!-- Item -->
                                        <?php
                  					foreach ($nuestros_sitios_ex as $key) {
                    				?><div class="col-2">
                                            <div class="price box-1">
                                                <a href="http://<?=$key["link"]?>" class="cursor" data-toggle="tooltip"
                                                    data-placement="top" title="<?=$key['texto']?>" target="_blank"
                                                    data-position="bottom" data-delay="50"><img
                                                        src="<?= base_url(); ?>webroot/img/Secciones//<?=$key["imagen"]?>" /></a>
                                            </div>
                                        </div>
                                        <?php     
									}
									?>

                                    </div>






                                    <br>

                                    <div
                                        style="background-color:#094293; color: white; text-align:center; padding: 1.5%;">
                                        <p></i>© 2021 Avante Textil SA de CV, Derechos Reservados.</p>
                                    </div>
                                </section>
                            </div>

                            <!-- Resume Section -->
                            <div class="page pt-resume" data-simplebar style="background: #212529;">
                                <section class="container">
                                    <div class="container">
                                        <div class="container-fluid">
                                            <div class="container">


                                                <div class="row">
                                                    <aside class="col-md-12"><br><br><br>
                                                        <nav class="sidebar-nav">
                                                            <ul class="metismenu" id="menu1">
                                                                <li>
                                                                    <span class="fa fa-fw  fa-play fa-md"
                                                                        style="color: white;">AREAS</span>
                                                                </li>

                                                                <?php
														// Primer Nivel
											//            if ($this->session->userdata('sonarh')[0]->IdTrab=='58541') {
												if($menu_izq  == null){

												}else{
														foreach ($menu_izq as $key => $value) {
																$dropdown = !empty($value->submenu)?"dropdown-menu":"";
																$onclick = !empty($value->submenu)?"onclick='return false;'":"";
																$arrowHolder = !empty($value->submenu)?"arrowHolder":"";
																//$link = $value->acceso==0?"#":$value->url;
																$link = $value->url;
																if ($value->acceso==1) {
																?>
                                                                <li>
                                                                    <a href="<?=$link?>" class="has-arrow"
                                                                        aria-expanded="false" <?=$onclick?>>
                                                                        <span><?=$value->texto?></span>
                                                                    </a>
                                                                    <?php
																			echo cargaSubMenus2($value->submenu, $numid);
																		?>
                                                                </li>
                                                                <?php
																}
														}
													}
													?>
                                                            </ul>
                                                        </nav>

                                                        <br><br>
                                                        <nav class="sidebar-nav">
                                                            <ul class="metismenu" id="menu2">
                                                                <li>
                                                                    <span class="fa fa-fw  fa-play fa-md"
                                                                        style="color: white;">PERFILES</span>
                                                                </li>
                                                                <?php
														// Primer Nivel
											//            if ($this->session->userdata('sonarh')[0]->IdTrab=='58541') {
												if($menu_izq  == null){
													?>
                                                                <li>
                                                                    <a href="Usuario/logout" class=""
                                                                        aria-expanded="false">
                                                                        <span>Cerrar Sesión</span>
                                                                    </a>
                                                                </li>

                                                                <?php
												}else{
														foreach ($menu_der as $key => $value) {
																$dropdown = !empty($value->submenu)?"dropdown-menu":"";
																$onclick = !empty($value->submenu)?"onclick='return false;'":"";
																$arrowHolder = !empty($value->submenu)?"arrowHolder":"";
																//$link = $value->acceso==0?"#":$value->url;
																$link = $value->url;
																if($link == "#"){
																	$class = "has-arrow" ;			
																}else{
																	$class = "" ;			
																}
																if ($value->acceso==1) {
																?>
                                                                <li>
                                                                    <a href="<?=$link?>" class="<?=$class?>"
                                                                        aria-expanded="false" <?=$onclick?>>
                                                                        <span><?=$value->texto?></span>
                                                                    </a>
                                                                    <?php
																			echo cargaSubMenus2($value->submenu, $numid);
																		?>
                                                                </li>
                                                                <?php
																}
														}
													}
													?>
                                                            </ul>
                                                        </nav>


                                                    </aside>
                                                </div>

                                </section>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- All Script -->
    <script src="<?= base_url() . 'webroot/assets_x/js/jquery.min.js'?>"></script>
    <script src="<?= base_url() . 'webroot/assets_x/js/isotope.pkgd.min.js'?>"></script>
    <script src="<?= base_url() . 'webroot/assets_x/js/simplebar.js'?>"></script>
    <script src="<?= base_url() . 'webroot/assets_x/js/owl.carousel.min.js'?>"></script>
    <script src="<?= base_url() . 'webroot/assets_x/js/jquery.magnific-popup.min.js'?>"></script>
    <script src="<?= base_url() . 'webroot/assets_x/js/jquery.animatedheadline.min.js'?>"></script>
    <script src="<?= base_url() . 'webroot/assets_x/js/jquery.easypiechart.js'?>"></script>
    <script src="<?= base_url() . 'webroot/assets_x/js/jquery.validation.js'?>"></script>
    <script src="<?= base_url() . 'webroot/assets_x/js/tilt.js'?>"></script>
    <script src="<?= base_url() . 'webroot/assets_x/js/main.js'?>"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="<?= base_url(); ?>webroot/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url(); ?>webroot/assets/js/core/bootstrap.min.js"></script>

    <script src="https://unpkg.com/metismenu"></script>

    <script>
    $(document).ready(function() {

        $('#pdf').mouseover(function() {
            $('#img-pdf').css("display", "block");
        });

        $('#pdf').mouseout(function() {
            $('#img-pdf').css("display", "none");
        });

        $('#menu1').metisMenu();
        $('#menu2').metisMenu();

        $('[data-toggle="tooltip"]').tooltip();
        $(".menux").click(function() {
            window.open("<?= base_url() ?>noticia/leer/" + $(this).attr("id"), "_blank");
        });

        $(".com_avante").click(function() {
            window.open("<?= base_url(); ?>" + $(this).attr("id"), "_blank");
        });

        $('.ir-arriba').click(function() {
            $('div').animate({
                scrollTop: '0px'
            }, 1000);
        });

        $(window).scroll(function() {
            if ($(this).scrollTop() > 0) {
                $('.ir-arriba').slideDown(600);
            } else {
                $('.ir-arriba').slideUp(600);
            }
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
            $("#hide_video_show_question").hide();
            $("#video_container_btn_return").show();
            $("#questions_container").show();
        });
        $('#hide_question_show_video').click(function() {
            $("#video_container").show();
            $("#hide_video_show_question").show();
            $("#video_container_btn_return").hide();
            $("#questions_container").hide();
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

    function toggleChevron(e) {
        $(e.target)
            .prev('.panel-heading')
            .find("i.indicator")
            .toggleClass('fa-caret-down fa-caret-right');
    }
    $('#accordion').on('hidden.bs.collapse', toggleChevron);
    $('#accordion').on('shown.bs.collapse', toggleChevron);

    function reemplaza_imagen(imagen) {
        imagen.onerror = "";
        imagen.src = "https://cdn-icons-png.flaticon.com/512/5987/5987462.png";
        return true;
    }
    </script>
    <script>
    (function() {

        // we set the 'fx' class on the first image when the page loads
        document.getElementById('slideshow').getElementsByTagName('img')[0].className = "fx";

        // this calls the kenBurns function every 4 seconds
        // you can increase or decrease this value to get different effects
        window.setInterval(kenBurns, 6000);

        // the third variable is to keep track of where we are in the loop
        // if it is set to 1 (instead of 0) it is because the first image is styled when the page loads
        var images = document.getElementById('slideshow').getElementsByTagName('img'),
            numberOfImages = images.length,
            i = 1;

        function kenBurns() {
            if (i == numberOfImages) {
                i = 0;
            }
            images[i].className = "fx";

            // we can't remove the class from the previous element or we'd get a bouncing effect so we clean up the one before last
            // (there must be a smarter way to do this though)
            if (i === 0) {
                images[numberOfImages - 2].className = "";
            }
            if (i === 1) {
                images[numberOfImages - 1].className = "";
            }
            if (i > 1) {
                images[i - 2].className = "";
            }
            i++;

        }
    })();
    </script>

</body>

</html>