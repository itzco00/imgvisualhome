<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    // TIENDA NOMBRE PROVEEDOR
    function index()
    {
        $data['entrada3'] = $this->model->getProductosEntrada2format($_POST['numerocompra']);

        $data['dcmpiso3'] = $this->model->getProductosDamaYCaballeroPiso2format($_POST['numerocompra']);
        $data['dcmperimetral3'] = $this->model->getProductosDamaYCaballeroPerimetral2format($_POST['numerocompra']);

        $data['mhjmpiso3'] = $this->model->getProductosMujerHombreJrPiso2format($_POST['numerocompra']);
        $data['mhjmperimetral3'] = $this->model->getProductosMujerHombreJrPerimetral2format($_POST['numerocompra']);
        $data['mhjmpjeans3'] = $this->model->getProductosMujerHombreJrJeans2format($_POST['numerocompra']);
        $data['mhjmplicencias3'] = $this->model->getProductosMujerHombreJrLicencias2format($_POST['numerocompra']);

        $data['impiso3'] = $this->model->getProductosInteriorMujerPiso2format($_POST['numerocompra']);
        $data['imperimetral3'] = $this->model->getProductosInteriorMujerPerimetral2format($_POST['numerocompra']);
        $data['imherraje3'] = $this->model->getProductosInteriorMujerHerraje2format($_POST['numerocompra']);

        $data['innpiso3'] = $this->model->getProductosInfantilNiñoYNiñaPiso2format($_POST['numerocompra']);
        $data['innperimetral3'] = $this->model->getProductosInfantilNiñoYNiñaPerimetral2format($_POST['numerocompra']);

        $data['tnnbpiso3'] = $this->model->getProductosToddlerNiñoNiñaYBebesPiso2format($_POST['numerocompra']);
        $data['tnnbperimetral3'] = $this->model->getProductosToddlerNiñoNiñaYBebesPerimetral2format($_POST['numerocompra']);

        $data['hernoaplica3'] = $this->model->getProductosHerrajeNoAplica2format($_POST['numerocompra']);

        $data['probmpiso3'] = $this->model->getProductosProbadoresPiso2format($_POST['numerocompra']);

        $data['panmpiso3'] = $this->model->getProductosPanelesPiso2format($_POST['numerocompra']);

        $data['extmpiso3'] = $this->model->getProductosExtrasPiso2format($_POST['numerocompra']);

        $data['imgpop3'] = $this->model->getProductosImagenPop2format($_POST['numerocompra']);

        $data['imgmaniquis3'] = $this->model->getProductosImagenManiquis2format($_POST['numerocompra']);

        $data['otsnoaplica3'] = $this->model->getProductosOtrosNoAplica2format($_POST['numerocompra']);



        $data['centrocostos3'] = $this->model->getCentroCostos2($_POST['numerocompra']);

        $data['centrocostosfinal3'] = $this->model->getCentroCostosFinal2($_POST['numerocompra']);

        $data['subtotales3'] = $this->model->getSubtotalesDepartamentosformat($_POST['numerocompra']);

        $data['ordencompra'] = $this->model->getNumeroDeCompraPorId($_POST['numerocompra']);

        $tienda_name = $this->input->post('tienda_name_excel');
        $data['tienda_cc'] = $this->model->get_centrocostos_by_tienda($tienda_name);

        $this->load->view('generarexcel', $data);
    }

    //TIENDA PROVEEDOR
    function index2()
    {
        $data['entrada3'] = $this->model->getProductosEntrada2format($_POST['numerocompra2']);

        $data['dcmpiso3'] = $this->model->getProductosDamaYCaballeroPiso2format($_POST['numerocompra2']);
        $data['dcmperimetral3'] = $this->model->getProductosDamaYCaballeroPerimetral2format($_POST['numerocompra2']);

        $data['mhjmpiso3'] = $this->model->getProductosMujerHombreJrPiso2format($_POST['numerocompra2']);
        $data['mhjmperimetral3'] = $this->model->getProductosMujerHombreJrPerimetral2format($_POST['numerocompra2']);
        $data['mhjmpjeans3'] = $this->model->getProductosMujerHombreJrJeans2format($_POST['numerocompra2']);
        $data['mhjmplicencias3'] = $this->model->getProductosMujerHombreJrLicencias2format($_POST['numerocompra2']);

        $data['impiso3'] = $this->model->getProductosInteriorMujerPiso2format($_POST['numerocompra2']);
        $data['imperimetral3'] = $this->model->getProductosInteriorMujerPerimetral2format($_POST['numerocompra2']);
        $data['imherraje3'] = $this->model->getProductosInteriorMujerHerraje2format($_POST['numerocompra2']);

        $data['innpiso3'] = $this->model->getProductosInfantilNiñoYNiñaPiso2format($_POST['numerocompra2']);
        $data['innperimetral3'] = $this->model->getProductosInfantilNiñoYNiñaPerimetral2format($_POST['numerocompra2']);

        $data['tnnbpiso3'] = $this->model->getProductosToddlerNiñoNiñaYBebesPiso2format($_POST['numerocompra2']);
        $data['tnnbperimetral3'] = $this->model->getProductosToddlerNiñoNiñaYBebesPerimetral2format($_POST['numerocompra2']);

        $data['hernoaplica3'] = $this->model->getProductosHerrajeNoAplica2format($_POST['numerocompra2']);

        $data['probmpiso3'] = $this->model->getProductosProbadoresPiso2format($_POST['numerocompra2']);

        $data['panmpiso3'] = $this->model->getProductosPanelesPiso2format($_POST['numerocompra2']);

        $data['extmpiso3'] = $this->model->getProductosExtrasPiso2_2format($_POST['numerocompra2']);

        $data['imgpop3'] = $this->model->getProductosImagenPop2format($_POST['numerocompra2']);

        $data['imgmaniquis3'] = $this->model->getProductosImagenManiquis2format($_POST['numerocompra2']);



        $data['centrocostos3'] = $this->model->getCentroCostosProv2($_POST['numerocompra2']);

        $data['centrocostosfinal3'] = $this->model->getCentroCostosFinalProv2($_POST['numerocompra2']);

        $data['subtotales3'] = $this->model->getSubtotalesDepartamentos2($_POST['numerocompra2']);

        $data['ordencompra'] = $this->model->getNumeroDeCompraPorId($_POST['numerocompra2']);

        $tienda_name = $this->input->post('tienda_name_excel');
        $data['tienda_cc'] = $this->model->get_centrocostos_by_tienda($tienda_name);

        $this->load->view('generarexcelprov', $data);
    }
}


