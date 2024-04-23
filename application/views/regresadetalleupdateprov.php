<section id="main-content">
    <section class="wrapper">
        <form action="<?= base_url() ?>Dashboard/verDetalleCompra2" method="post">
            <input type="hidden" id="usernamecons2" name="usernamecons2" value="<?= $usernamecons ?>">
            <input type="hidden" name="numerocompra2" id="numerocompra2" value="<?= $numordenfinal ?>">
            <input type="hidden" name="tienda_name_2" id="tienda_name_2" value="<?= $tienda_name_updt ?>">
            <button type="submit" id="redirectordenprov" style="color: #000000; cursor: pointer; border: none"></button>
        </form>
    </section>
</section>
<script type="text/javascript">
    window.addEventListener('load', function() {
        document.getElementById('redirectordenprov').click();
    });
</script>