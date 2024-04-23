<div id="panel_tienda2">
    <?php
    foreach ($numerodetienda as $not) {
    ?>
        <input id="resultadonumerodelatiendainput" name="resultadonumerodelatiendainput" type="text" value="<?= $not->numerodetienda ?>">
    <?php
    }
    ?>
    <?php
    foreach ($numerodetienda as $not) {
    ?>
        <input id="valorantespreciototal" name="valorantespreciototal" class="valorantespreciototal" type="text" value="<?= $not->m2pisoventa ?>">
    <?php
    }
    ?>
</div>
<script>
    $('.valorantespreciototal').trigger('click');
</script>