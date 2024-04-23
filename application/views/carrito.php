<section id="main-content">
    <section class="wrapper">
        <!--
        <form action="" method="post">
            <table class="carrito">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Departamento</th>
                    <th>Sub Departamento</th>
                    <th>No. Piezas</th>
                    <th>Subtotal</th>
                </tr>
                <?
                $i = 1;
                foreach ($this->cart->contents() as $item) :
                ?>
                    <input type="hidden" name="<? echo $i; ?>[rowid]" value="<? echo $item['rowid']; ?>">
                    <tr>
                        <td>
                            <?
                            echo $item['nombre'];
                            ?>
                        </td>
                        <td>
                            <?
                            echo $item['Precio'];
                            ?>
                        </td>
                        <td>
                            <?
                            echo $item['departamentos'];
                            ?>
                        </td>
                        <td>
                            <?
                            echo $item['subdepartamentos'];
                            ?>
                        </td>
                        <td>
                            <?
                            echo $item['pieza'];
                            ?>
                        </td>
                    </tr>
                    <?
                endforeach;
                $i++;
                    ?>
            </table>
        </form>
            -->
        <?php
        session_start();

        $nombre = $_POST['nombre'];
        $archivo =$_POST['archivo'];
        $precio = $_POST['precio'];
        $pieza = $_POST['pieza'];

        $product = array($nombre, $archivo, $precio, $pieza);
        $_SESSION[$nombre] = $product;
        //print_r($product);
        header('location:ventaProductos');
        ?>
    </section>
</section>