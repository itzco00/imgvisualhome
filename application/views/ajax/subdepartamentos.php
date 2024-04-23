<div class="form-group" id="pnale_sub" >
	<div id="muestrasubcolor">
		<h4 class="col-sm-4 col-sm-3 control-label" style="color: black; background-color: yellow;">SUBDEPARTAMENTO</h4>
	</div>
	<div id="muestrasubsincolor" style="display: none">
		<h4 class="col-sm-4 col-sm-3 control-label" style="color: black;">SUBDEPARTAMENTO</h4>
	</div>
    <div class="col-sm-4">
        <select name="subdepartamentos" id="subdepartamentos" style="width:250px; height: 30px; font-size: 1.3em; color: black" onchange="getsubdepasinput();">
            <option value="NO SELECCIONADO">SELECCIONAR</option>
            <?php
            foreach ($subdepartamentos as $sdp) {
            ?>
                <option value="<?= $sdp->nombre ?>"><?= $sdp->nombre ?></option>
            <?php
            }
            ?>
        </select>
    </div>
</div>