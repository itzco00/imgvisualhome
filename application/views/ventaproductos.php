<section id="main-content">
    <section class="wrapper">
        <label for=""></label>
        <?php if ($this->session->flashdata('Carrito')) : ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('Carrito'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('Precio')) : ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('Precio'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('Pieza')) : ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('Pieza'); ?>
            </div>
        <?php endif; ?>
        <table id="productos" class="display">
            <thead>
                <tr style="width:100%; justify-content: center; text-align: center">
                    <th style="text-align: center">NOMBRE DEL PRODUCTO</th>
                    <th style="text-align: center">PRECIO MXN</th>
                    <th style="text-align: center">STATUS</th>
                    <th style="text-align: center">DEPARTAMENTO</th>
                    <th style="text-align: center">SUB DEPARTAMENTO</th>
                    <th style="text-align: center">VISTA PREVIA</th>
                    <th style="text-align: center">NO. PIEZAS</th>
                    <th style="text-align: center">PROCESAR</th>
                    <!--<th style="text-align: center">EDITAR</th>-->
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($productos as $t) {
                ?>
                    <tr id="rowproducto<?= $t->id ?>" style="justify-content: center; text-align: center">
                        <td><?= $t->nombre ?></td>
                        <td>
                            <form action="<?= base_url() ?>Dashboard/editarPrecio" method="post">
                                <?= $t->precio ?>
                                <input type="hidden" name="id" value="<?= $t->id ?>">
                                <input type="hidden" name="precio" value="<?= $t->precio ?>">
                                <button type="submit" class="btn btn-light fa fa-pencil fa-lg" style="color: #000000; cursor: pointer"></button>
                            </form>
                        </td>
                        <td><?= $t->status ?></td>
                        <td><?= $t->departamentos ?></td>
                        <td><?= $t->subdepartamentos ?></td>
                        <td>
                            <img style="border-radius: 15px;" src="<?= base_url("uploads/" . $t->archivo) ?>" height="100px" width="100px">
                        </td>
                        <td>
                            <form action="<?= base_url() ?>Dashboard/editarPieza" method="post">
                                <?= $t->pieza ?>
                                <input type="hidden" name="id" value="<?= $t->id ?>">
                                <input type="hidden" name="pieza" value="<?= $t->pieza ?>">
                                <button type="submit" class="btn btn-light fa fa-pencil fa-lg" style="color: #000000; cursor: pointer"></button>
                            </form>
                        </td>
                        <td>
                            <form action="<?= base_url() ?>Dashboard/mostrarCarrito" method="post">
                                <input type="hidden" name="id" value="<?= $t->id ?>">
                                <input type="hidden" name="nombre" value="<?= $t->nombre ?>">
                                <input type="hidden" name="precio" value="<?= $t->precio ?>">
                                <input type="hidden" name="departamentos" value="<?= $t->departamentos ?>">
                                <input type="hidden" name="subdepartamentos" value="<?= $t->subdepartamentos ?>">
                                <input type="hidden" name="archivo" value="<?= $t->archivo ?>">
                                <input type="hidden" name="pieza" value="<?= $t->pieza ?>">
                                <!--<input type="number" value="1" step="1" min="1" max="100" name="pieza" class="quantity-field border-0 text-center w-25" id="producto-<?= $t->id ?>">-->
                                <button type="submit" class="btn btn-light fa fa-shopping-cart fa-lg" style="color: #000000; cursor: pointer"></button>
                            </form>
                        </td>
                        <!--
                        <td>
                            <i class="eliminar fa fa-trash-o" style="color: #000000; cursor: pointer" id="idproducto-<?= $a->id ?>"></i>
                        </td>
                -->
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
            <a href="verCarrito" class="btn btn-warning col-lg-2">VER CARRITO</a>
    </section>
</section>

<script type="text/javascript">
    $(".actulalizarcantidad").click(function() {
        var idproducto = this.id;
        var res = idproducto.split("-");
        var id = res[1];
        $.post("<?= base_url() ?>Dashboard/actualizarCantidad", {
            idproducto: id
        }).done(function(data) {});
    });
</script>
<script type="text/javascript">
    $(".actulalizarprecio").click(function() {
        var id = this.id;
        var res = id.split("-");
        var id = res[1];
        $.post("<?= base_url() ?>Dashboard/actualizarPrecio", {
            id: id
        }).done(function(data) {});
    });
</script>

<script>
    $(document).ready(function() {
        $('#productos').DataTable({
            columnDefs: [{
                targets: [0],
                orderData: [0, 1]
            }, {
                targets: [1],
                orderData: [1, 0]
            }, {
                targets: [4],
                orderData: [4, 0]
            }]
        });
    });
</script>
</section>
</section>