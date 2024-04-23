<section id="main-content">
    <section class="wrapper">
        <form action="<?= base_url() ?>Dashboard/verDetalleCompra2" method="post">
            <input type="hidden" id="usernamecons2" name="usernamecons2" value="<?= $usernameconsred ?>">
            <input type="hidden" name="numerocompra2" id="numerocompra2" value="<?= $numerocompraparaprov ?>">
            <input type="hidden" name="tienda_name_2" id="tienda_name_2" value="<?= $tienda_name ?>">
            <button type="submit" id="redirectmismoprov" style="color: #000000; cursor: pointer; border: none"></button>
        </form>
    </section>
</section>
<script type="text/javascript">
    window.addEventListener('load', function() {
        document.getElementById('redirectmismoprov').click();
    });
</script>