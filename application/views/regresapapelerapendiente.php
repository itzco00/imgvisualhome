<section id="main-content">
    <section class="wrapper">
        <img src="<?= base_url() ?>assets/img/loading_2.gif" style="width: 50px; height:50px">
        <form action="<?= base_url() ?>Dashboard/verDetallePendientes" method="post">
            <input type="hidden" id="ordenpendiente" name="ordenpendiente" value="<?= $ordenpendiente ?>">
            <input type="hidden" name="usernamepdnt" id="usernamepdnt" value="<?= $usernamepdnt ?>">
            <button type="submit" id="redirectordenpendiente" style="color: #000000; cursor: pointer; border: none"></button>
        </form>
    </section>
</section>
<script type="text/javascript">
    window.addEventListener('load', function() {
        document.getElementById('redirectordenpendiente').click();
    });
</script>