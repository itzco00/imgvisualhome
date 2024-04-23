<div id="panel_tienda">
    <?php
    foreach ($numerodetienda as $not) {
    ?>
        <input id="resultadonumerodelatiendainput" name="resultadonumerodelatiendainput" type="hidden" value="<?= $not->numerodetienda ?>">
    <?php
    }
    ?>
    <?php
    foreach ($numerodetienda as $not) {
    ?>
        <input id="valorantespreciototal" name="valorantespreciototal" class="valorantespreciototal" type="hidden" value="<?= $not->m2pisoventa ?>" onclick="calculatotalentrevalorantespreciototal(); calculatotalentrevalorantespreciototal2(); enviarm2()">
    <?php
    }
    ?>
    <?php
    foreach ($numerodetienda as $not) {
    ?>
        <input id="idunicotiendas" name="idunicotiendas" class="idunicotiendas" type="hidden" value="<?= $not->id ?>">
    <?php
    }
    ?>
</div>
<script>
    $('.valorantespreciototal').trigger('click');
</script>