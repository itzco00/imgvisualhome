<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse " style="background-color: #2B2B2B;">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><i><img src="<?= base_url() ?>assets/img/avanteprofile2.jpg" class="img-circle" width="60"></i></p>
            <p class="centered" style="color:white;"><?php echo $fullname; ?></p>
            <li class="sub-menu">
                <a href="<?= base_url() ?>Dashboard" style="color: white">
                    <i class="fa fa-home" style="font-size: 1.5em;"></i>
                    <span ty>INICIO</span>
                </a>
            </li>
            <?php
            foreach ($nombreusuario as $ius) {
            ?>
                <?php if ($ius->uploadprod == 1) : ?>
                    <li class="sub-menu" style="padding-top: 10px;">
                        <form action="<?= base_url() ?>Dashboard/crearProductos" method="post">
                            <?php
                            foreach ($nombreusuario as $ius) {
                            ?>
                                <input type="hidden" name="usernameupload" id="usernameupload" value="<?= $ius->nombreusuario ?>">
                            <?php
                            }
                            ?>
                            <button type="submit" style="background:transparent; border:none; color:white;padding-left:10px">
                                <i class="fa fa-upload" style="font-size: 1.3em;"></i>
                                <span style="font-size: 1em;padding-left:5px">ALTA DE PRODUCTOS</span>
                            </button>
                        </form>
                    </li>
                <?php else : ?>
                <?php endif ?>
            <?php
            }
            ?>
            <?php
            foreach ($nombreusuario as $ius) {
            ?>
                <?php if ($ius->altapaccess == 1) : ?>
                    <li class="sub-menu" style="padding-top: 25px;">
                        <form action="<?= base_url() ?>Dashboard/misProductosActualizar" method="post">
                            <?php
                            foreach ($nombreusuario as $ius) {
                            ?>
                                <input type="hidden" name="usernamealtap" id="usernamealtap" value="<?= $ius->nombreusuario ?>">
                            <?php
                            }
                            ?>
                            <button type="submit" style="background:transparent; border:none; color:white;padding-left:10px">
                                <i class="fa fa-list" style="font-size: 1.3em;"></i>
                                <span style="font-size: 1em;padding-left:5px">CATÁLOGO</span>
                            </button>
                        </form>
                    </li>
                <?php else : ?>
                <?php endif ?>
            <?php
            }
            ?>
            <!--
                <li class="sub-menu">
                    <a href="<?= base_url() ?>Dashboard/ventaProductos">
                        <i class="fa fa-usd"></i>
                        <span>VENTA DE PRODUCTOS</span>
                    </a>
                </li>
                -->
            <?php
            foreach ($nombreusuario as $ius) {
            ?>
                <?php if ($ius->gencaccess == 1) : ?>
                    <li class="sub-menu" style="padding-top: 25px;">
                        <form action="<?= base_url() ?>Dashboard/productosEntrada" method="post">
                            <?php
                            foreach ($nombreusuario as $ius) {
                            ?>
                                <input type="hidden" name="usernamegenc" id="usernamegenc" value="<?= $ius->nombreusuario ?>">
                            <?php
                            }
                            ?>
                            <button type="submit" style="background:transparent; border:none; color:white;padding-left:10px">
                                <i class="fa fa-usd" style="font-size: 1.3em;"></i>
                                <span style="font-size: 1em;padding-left:5px">GENERAR COMPRA</span>
                            </button>
                        </form>
                    </li>
                <?php else : ?>
                <?php endif ?>
            <?php
            }
            ?>
            <?php
            foreach ($nombreusuario as $ius) {
            ?>
                <?php if ($ius->pdntaccess == 1) : ?>
                    <li class="sub-menu" style="padding-top: 25px;">
                        <form action="<?= base_url() ?>Dashboard/verPendientes" method="post">
                            <?php
                            foreach ($nombreusuario as $ius) {
                            ?>
                                <input type="hidden" name="usernamepdnt" id="usernamepdnt" value="<?= $ius->nombreusuario ?>">
                            <?php
                            }
                            ?>
                            <button type="submit" style="background:transparent; border:none; color:white;padding-left:10px">
                                <i class="fa fa-clock-o" style="font-size: 1.3em;"></i>
                                <span style="font-size: 1em;padding-left:5px">PENDIENTES</span>
                            </button>
                        </form>
                    </li>
                <?php else : ?>
                <?php endif ?>
            <?php
            }
            ?>
            <?php
            foreach ($nombreusuario as $ius) {
            ?>
                <?php if ($ius->consultas == 1) : ?>
                    <li class="sub-menu" style="padding-top: 25px;">
                        <form action="<?= base_url() ?>Dashboard/verCarrito" method="post">
                            <?php
                            foreach ($nombreusuario as $ius) {
                            ?>
                                <input type="hidden" name="usernamecons" id="usernamecons" value="<?= $ius->nombreusuario ?>">
                            <?php
                            }
                            ?>
                            <button type="submit" style="background:transparent; border:none; color:white;padding-left:10px">
                                <i class="fa fa-shopping-cart" style="font-size: 1.3em;"></i>
                                <span style="font-size: 1em;padding-left:5px">DETALLE DE COMPRA</span>
                            </button>
                        </form>
                    </li>
                <?php else : ?>
                <?php endif ?>
            <?php
            }
            ?>
            <?php
            foreach ($nombreusuario as $ius) {
            ?>
                <?php if ($ius->mobi == 1) : ?>
                    <li class="sub-menu" style="padding-top: 25px;">
                        <form action="<?= base_url() ?>Dashboard/consultaMobiliario" method="post">
                            <?php
                            foreach ($nombreusuario as $ius) {
                            ?>
                                <input type="hidden" name="usernamemobi" id="usernamemobi" value="<?= $ius->nombreusuario ?>">
                            <?php
                            }
                            ?>
                            <button type="submit" style="background:transparent; border:none; color:white;padding-left:10px">
                                <i class="fa fa-th" style="font-size: 1.3em;"></i>
                                <span style="font-size: 1em;padding-left:5px">MOBILIARIO</span>
                            </button>
                        </form>
                    </li>
                <?php else : ?>
                <?php endif ?>
            <?php
            }
            ?>
            <?php
            foreach ($nombreusuario as $ius) {
            ?>
                <?php if ($ius->rolusuario == 1) : ?>
                    <li class="sub-menu" style="padding-top: 25px;">
                        <form action="<?= base_url() ?>Dashboard/control_access" method="post">
                            <?php
                            foreach ($nombreusuario as $ius) {
                            ?>
                                <input type="hidden" name="usernameaccess" id="usernameaccess" value="<?= $ius->nombreusuario ?>">
                            <?php
                            }
                            ?>
                            <button type="submit" style="background:transparent; border:none; color:white;padding-left:10px">
                                <i class="fa fa-cog" style="font-size: 1.3em;"></i>
                                <span style="font-size: 1em;padding-left:5px">CONTROL DE ACCESSO</span>
                            </button>
                        </form>
                    </li>
                <?php else : ?>
                <?php endif ?>
            <?php
            }
            ?>
            <!--
            <li class="sub-menu">
                <a href="<?= base_url() ?>Dashboard/pruebamodal" style="color: white">
                    <i class="fa fa-home" style="font-size: 1.5em;"></i>
                    <span ty>PRUEBA MODAL</span>
                </a>
            </li>-->
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->