<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb">NO. DE PIEZAS</h4>
                    <form action="<?= base_url() ?>Dashboard/actualizarPieza" method="post" class="form-horizontal style-form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">PIEZAS</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="id" value="<?= $id ?>" id="id">
                                <input type="float" class="form-control" name="pieza" value="<?= $pieza ?>" id="pieza">
                            </div>
                        </div>
                        <input type="submit" name="">
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>