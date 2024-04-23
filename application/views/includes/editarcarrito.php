<section id="main-content">
    <section class="wrapper">
        <?php
        session_start();

        $nombre = $_POST['name0'];
        $archivo = $_POST['name1'];
        $precio = $_POST['name2'];
        $pieza = $_POST['name3'];
        $event = $_POST['event'];

        $product = array($nombre, $archivo, $precio, $pieza);

        if ($event == "Update"){
            $_SESSION[$nombre] = $product;
        }
        else if($event == "Delete"){
            unset($_SESSION[$nombre]);
        }
        header('location:verCarrito');
        ?>

    </section>
</section>