<section id="main-content">
    <section class="wrapper">
        <form action="<?= base_url() ?>Dashboard/verDetalleCompra" method="post">
            <input type="hidden" id="usernamecons" name="usernamecons" value="<?= $usernameconsred ?>">
            <input type="hidden" name="numerocompra" id="numerocompra" value="<?= $numerocompraparacte ?>">
            <input type="hidden" name="tienda_name" id="tienda_name" value="<?= $tienda_name ?>">
            <button type="submit" id="redirectorden" style="color: #000000; cursor: pointer; border: none"></button>
        </form>
    </section>
</section>
<script type="text/javascript">
    window.addEventListener('load', function() {
        document.getElementById('redirectorden').click();
    });
</script>