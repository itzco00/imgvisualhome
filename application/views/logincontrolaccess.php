<section id="main-content">
    <section class="wrapper">
        <div style="display: flex;justify-content:center; padding-top:10%">
            <div style="background-color: #CDCDCD;padding: 20px;border-radius: 5px;box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);width: 35%">
                <div style="margin-bottom: 15px;">
                    <form action="<?= base_url() ?>Dashboard/sublogin" method="post">
                        <div style="margin-bottom: 15px;padding-bottom:15px">
                            <label style="display: block;margin-bottom: 5px;font-weight: bold;color:black;font-size:1.3em;">NOMBRE DE USUARIO</label>
                            <input type="text" id="nombreusuario" name="nombreusuario"  style="width: 100%;padding: 8px;border: 1px solid #000;border-radius: 3px;color:black;font-size:1.3em;" required>
                        </div>
                        <button id="send_loging_users" type="sumbit" style="display: block;width: 100%;padding: 10px;background-color: #007bff;color: #fff;font-size:1.3em;border: none;border-radius: 3px;cursor: pointer;">INGRESAR</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>