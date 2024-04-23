<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $this->loadViews("home");
    }
    /*
	public function hola()
    {
		$resultado=$this->model->updateProf();
		print_r($resultado);
	}
    */
    public function login()
    {
        if ($_POST['username'] && $_POST['password']) {
            $result = $this->model->loginUser($_POST['username'], $_POST['password']);
            if (!is_array($result) && strpos($result, "Error:") >= 0) {
                redirect(base_url() . "Dashboard/login", "location"); //si no encuentra nada regresa a login
            } else {
                $user_data = [
                    'id'          => $result[0]->id,
                    'nombre'      => $result[0]->Nombre,
                    'apellido'    => $result[0]->Apellido,
                    'username'    => $result[0]->username,
                    'is_profesor' => $result[0]->is_profesor,
                    'curso'       => $result[0]->curso
                ];
                $this->session->set_userdata('user_data', $user_data); //si no, establece la sesion a los parametros retornados
                var_dump($result);
            }
        }
        $this->loadViews('login');
    }

    /*{
        if ($_POST['username'] && $_POST['password']) {
            $login = $this->model->loginUser($_POST);
            print_r($login);
            if ($login) {
                $array = array(
                    "username" => $login[0]->username,
                );
                $this->session->set_userdata($array);
            }
        }
        $this->loadViews('login');
    }*/


    function loadViews($view, $data = null)
    {
        $user_data = $this->session->userdata('user_data');
        /*if ($user_data && isset($user_data['username'])) {
            echo 'sesion is: ' . $user_data['username'];
        } else {
            echo 'No hay datos de usuario en sesión.';
        }*/
        //si tenemos sesion creada
        if ($user_data['username']) {
            //si la vista es login se redirije a home
            if ($view == "login") {
                redirect(base_url() . "Dashboard", "location");
            }
            //si es una vista cualquiera se carga
            $username = $user_data['username'];
            $full_name = $user_data['nombre'] . ' ' . $user_data['apellido'];
			$data['fullname'] = $full_name;
			$data['username'] = $username;
            $data['nombreusuario'] = $this->model->verify_sublogin_mob($username);
            //$data['nombreusuario'] = $this->model->verify_sublogin_mob($username);
            $this->load->view('includes/header', $data);
            $this->load->view('includes/sidebar', $data);
            $this->load->view($view, $data);
            $this->load->view('includes/footer');
            //print_r($data);
            //si no tenemos iniciada sesion
        } else {
            //si la vista es login se carga
            if ($view == "login") {
                $this->load->view($view);
                //si la vista es otra cualquiera se redirige al login
            } else {
                redirect(base_url() . "Dashboard/login", "location");
            }
        }
    }







    function control_access()
    {
        $usernameaccess = $this->input->post("usernameaccess");
        $data['usernameaccess'] = $this->model->verify_userctrlaccess($usernameaccess);
        $data['rolusuarios'] = $this->model->verificarolusuarios();
        $this->loadViews("controldashboard", $data);
    }
    /*
    function controldashboard()
    {
        if ($_SESSION['nombreusuario']) {
            $this->loadViews("controldashboard");
        } else {
            redirect(base_url() . "Dashboard", "location");
        }
    }*/
    /*
    function sublogin()
    {
        $nombreusuario = $this->input->post('nombreusuario');

        if ($this->model->verify_sublogin($nombreusuario)) {

            $this->session->set_userdata('sublogin_authenticated', true);
            $data['nombreusuario'] = $this->model->verify_sublogin($nombreusuario);
            $data['rolusuarios'] = $this->model->verificarolusuarios();

            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('controldashboard', $data);
            $this->load->view('includes/footer');
        } else {

            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('logincontrolaccess');
            $this->load->view('includes/footer');
        }
    }*/
    function updatestatuscos()
    {
        $data = array(
            'id' => $_POST['user_ids'],
            'nombre' => $_POST['user_names'],
            'nombreusuario' => $_POST['user_usernames'],
            'uploadprod' => $_POST['status_upload'],
            'altapaccess' => $_POST['status_cat'],
            'gencaccess' => $_POST['status_genc'],
            'pdntaccess' => $_POST['status_pdnt'],
            'consultas' => $_POST['status_cons'],
            'mobi' => $_POST['status_mob'],
            'rolusuario' => $_POST['status_rol'],
        );
        $this->model->getupdatestatuscos($data);
    }











    public function logout()
    {
        session_destroy();
        $this->loadViews('login');
    }

    function crearProductos()
    {
        $usernameupload = $this->input->post("usernameupload");
        $data['usernameupload'] = $this->model->verify_userupload($usernameupload);
        if ($_POST) {
            //if($_FILES['file_name']){

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = uniqid() . '_' . $_FILES['archivo']['name'];
            $this->load->library('upload', $config);
            $this->upload->do_upload('archivo');
            $this->model->uploadProducto($_POST, $config['file_name']);
            /*
            if (!$this->upload->do_upload('archivo')) {
                $this->session->set_flashdata('FaltaMultimedia', 'Falto Agregar Archivo Multimedia');
            } else {
                $this->model->uploadProducto($_POST, $config['file_name']);
                $this->session->set_flashdata('CargaConExito', 'Producto Agregado Con Éxito!');
            }
            */
            /*}else{
                $this->model->uploadTarea($_POST);
            }*/
        }
        $data['departamentos'] = $this->model->getDepartamentos();

        //$data['subdepartamentos']=$this->model->getSubdepartamentos($_POST['id_departamento']);
        $this->loadViews("crearproductos", $data);
    }
    function crearProductos2()
    {
        $response = new stdClass();
        $datos = json_decode($this->input->post('datos'), true);
        $config['upload_path'] = './uploads/'; //condigura la ruta donde se va a subir la imagen en la carpeta
        $config['allowed_types'] = 'gif|jpg|png'; //tipo de imagen permitidos
        $config['file_name'] = uniqid() . '_' . $_FILES['archivo']['name']; //id unico + nombre original de la imagen (nuevo nombre)
        $this->load->library('upload', $config);
        if (isset($_FILES['archivo']['name']) && $_FILES['archivo']['name'] != '') { //si es que existe la imagen...
            if ($this->upload->do_upload('archivo')) { //si es que permite la carga de la imagen a la carpeta...
                $archivo_url = $config['file_name'];
                echo $this->model->uploadProducto2($datos, $archivo_url); //inserta el producto con imagen y devuelve el id del registro nuevo al cliente
                //echo $result_data;
                //var_dump("Datos insertados");
            } else { //si es que no permite la carga de la imagen a la carpeta...
                $errors = $this->upload->display_errors();
                var_dump($errors);
            }
        } else { //si es que no existe la imagen...
            $archivo_url = "";
            echo $this->model->uploadProducto2($datos, $archivo_url); //inserta el producto sin imagen y devuelve el id del registro nuevo al cliente
            //echo $result_data;
            //var_dump("Datos insertados sin imagen");
        }
    }
    function insertskusdirect()
    {
        $cc31 = $this->input->post('cc31');
        $cc33 = $this->input->post('cc33');
        $cc34 = $this->input->post('cc34');
        $cc31r = $this->input->post('cc31r');
        $cc33r = $this->input->post('cc33r');
        $cc34r = $this->input->post('cc34r');
        $activof = $this->input->post('activof');
        $id_nuevo_reg = $this->input->post('id_nuevo_reg');
        $data = array(
            'cc31' => $cc31,
            'cc33' => $cc33,
            'cc34' => $cc34,
            'cc31r' => $cc31r,
            'cc33r' => $cc33r,
            'cc34r' => $cc34r,
            'activof' => $activof,
            'id_nuevo_reg' => $id_nuevo_reg
        );
        $this->model->get_insertskusdirect($data);
    }
    function actualizarprods()
    {

        $id = $this->input->post("id");
        $nombres = $this->input->post('nombreselect');
        $precios = $this->input->post('precioselect');
        $departamentos = $this->input->post('departamentosselect');
        $subdepartamentos = $this->input->post('subdepartamentosselect');
        $descripcionselect = $this->input->post('descripcionselect');

        $fileName = $_FILES['archivonuevo']['name'];

        $file_name = uniqid() . '_' . $fileName;
        $config['upload_path'] = 'uploads/';
        $config['file_name'] = $file_name;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        //$config['max_size'] = '5000';
        $this->load->library('upload', $config);
        $this->upload->do_upload('archivonuevo');
        $registro = $this->model->capturaimagen($id);
        unlink("./uploads/" . $registro->archivo);
        $datos = array(
            'nombre' => $nombres,
            'precio' => $precios,
            'departamentos' => $departamentos,
            'subdepartamentos' => $subdepartamentos,
            'archivo' => $file_name,
            'observaciones' => $descripcionselect,
        );
        $this->model->getactualizarprods($id, $datos);
        $usernamealtap = $this->input->post("usernamealtap2");
        $data['usernamealtap'] = $this->model->verify_useraltap($usernamealtap);
        $data['productos'] = $this->model->getProductos();
        $data['departamentos'] = $this->model->getDepartamentos();
        $this->loadViews("misproductosactualizar", $data);

        /*
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post("id");
            $nombres = $this->input->post('nombreselect');
            $precios = $this->input->post('precioselect');
            $departamentos = $this->input->post('departamentosselect');
            $subdepartamentos = $this->input->post('subdepartamentosselect');
            $descripcionselect = $this->input->post('descripcionselect');


            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = uniqid() . $_FILES['archivonuevo']['name'];
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('archivonuevo');
            $data = array('upload_data'=>$this->upload->data());
            $datos = array(
                'nombre' => $nombres,
                'precio' => $precios,
                'departamentos' => $departamentos,
                'subdepartamentos' => $subdepartamentos,
                'archivo' => $data['upload_data']['file_name'],
                'observaciones' => $descripcionselect,
            );
            $this->model->getactualizarprods($id, $datos);
        }
        redirect('Dashboard/misProductosActualizar');
        */
    }
    /*
    function actualizarprods(){
        $id = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        $precio = $this->input->post('precio');
        
        $path = './uploads/';
        
        $data = array('id'=>$id);
        
        //obtener foto
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = uniqid() . $_FILES['archivo']['name'];

        $this->upload->initialize($config);

        if(!empty($_FILES['archivo']['name'])){
            if($this->upload->do_upload('archivo')){
                $archivo = $this->upload->data();
                $data2 = array(
                                'nombre' => $nombre,
                                'precio' => $precio,
                                'archivo' => $archivo['file_name'],
                            );
                        
                        $this->model->getactualizarprods($data2, $data);
                        redirect('Dashboard/misProductosActualizar');
            } else{
                redirect('Dashboard/misProductosActualizar');
            }
        }
        else{
            redirect('Dashboard/misProductosActualizar');
        }
    } 
    */
    function set_depas()
    {
        $departamento = $this->input->post('departamento');
        $subdepartamentos = $this->model->get_subdepas($departamento);
        echo json_encode($subdepartamentos);
    }
    function actualizarCatalogo()
    {
        $data = array(
            'id' => $_POST['id'],
            'nombre' => $_POST['nombre'],
            'precio' => $_POST['precio'],
            'reproceso' => $_POST['precioreproceso'],
            'unidad' => $_POST['unidad'],
            'departamentos' => $_POST['departamentos_res'],
            'subdepartamentos' => $_POST['subdepartamentos_res'],
            'incluye' => $_POST['incluye'],
            'status' => $_POST['statusproductos'],
            'pieza' => $_POST['pieza'],
        );
        $data2 = array(
            'id' => $_POST['id'],
            'cc31' => $_POST['cc31'],
            'cc33' => $_POST['cc33'],
            'cc34' => $_POST['cc34'],
            'cc31r' => $_POST['cc31r'],
            'cc33r' => $_POST['cc33r'],
            'cc34r' => $_POST['cc34r'],
            'activof' => $_POST['activof'],
        );
        $this->model->get_actualizarCatalogo($data);
        $this->model->get_actulizaSkus($data2);
        $usernamealtap = $this->input->post("usernamealtap2");
        $data['usernamealtap'] = $this->model->verify_useraltap($usernamealtap);
        $data['productos'] = $this->model->getProductos();
        $data['departamentos'] = $this->model->getDepartamentos();
        $this->loadViews("misproductosactualizar", $data);
    }
    function updateImgCat()
    {
        $id_img = $this->input->post('id_img');
        $imagen_actual = $this->model->get_searchImgCat($id_img);
        echo $imagen_actual;
        if ($imagen_actual) {
            echo 'pasa 1';
            $imagen_antigua = './uploads/' . $imagen_actual->archivo;
            if (file_exists($imagen_antigua)) {
                unlink($imagen_antigua);
                echo 'pasa 2';
            }
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = uniqid() . '_' . preg_replace('/\.(?=.*.{4})/', '', str_replace(['|', '°', '!', '"', '#', '$', '%', '&', '/', '(', ')', '=', '?', "'", '¡', '¿', '*', '+', '~', '¨', '[', ']', '{', '}', '^', '`', '-', '_', ',', ';', ':', '@', ' '], ['', '', '', '', '', '', '', '', '', '', '', '', '', "", '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''], $_FILES['new_img']['name']));
            echo 'pasa 3';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('new_img')) {
                echo 'pasa 4';
                // Actualizar el nombre de la imagen en la base de datos
                $data = array('archivo' => $config['file_name']);
                $this->model->get_updateImgCat($id_img, $data);

                echo 'Imagen cargada y actualizada correctamente.';
            } else {
                echo 'Error al cargar la imagen: ' . $this->upload->display_errors();
            }
        } else {
            echo ' imagen no encontrada para actualizar.';
        }
    }
    function actualizarImagenes()
    {
        if ($_POST) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = uniqid() . $_FILES['archivo']['name'];
            $this->load->library('upload', $config);
            $this->upload->do_upload('archivo');

            $this->model->updateImages($_POST, $config['file_name']);
        }
    }
    function ActualizaStatus()
    {
        $data = array(
            'id' => $_POST['idproductos'],
            'status' => $_POST['statusproductos'],
        );
        $this->model->getActualizaStatus($data);
        $usernamealtap = $this->input->post("usernamealtap");
        $data['usernamealtap'] = $this->model->verify_useraltap($usernamealtap);
        $data['productos'] = $this->model->getProductos();
        $this->loadViews("misproductos", $data);
    }
    function comprobar_skus()
    {
        $productos = $this->model->get_productos_ids();
        $skus = $this->model->get_skus_ids();
        $response = array(
            'productos' => $productos,
            'skus' => $skus
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function insertar_ids_skus_faltantes()
    {
        $this->model->get_insertar_ids_skus_faltantes($_POST);
    }


    function getsubdepartamentos()
    {
        //echo "departamentos:" .  $_POST['departamentos'];
        //$data['departamentos']=$this->model->getDepartamentos();
        $subdepartamentos = $this->model->getSubdepartamentos($_POST['departamentos']);
        $data['subdepartamentos'] = $subdepartamentos;
        //print_r($subdepartamentos);
        $this->load->view("ajax/subdepartamentos", $data);
    }
    function registraProveedor()
    {
        $this->model->getRegistraProveedor($_POST);
        $usernamegenc = $this->input->post("usernamegenc2");
        $data['usernamegenc'] = $this->model->verify_usergenc($usernamegenc);
        $data['proveedores2'] = $this->model->getProveedores();
        $this->loadViews("proveedores", $data);
    }
    function registraNombre()
    {
        $this->model->getRegistraNombre($_POST);
        $usernamegenc = $this->input->post("usernamegenc2");
        $data['usernamegenc'] = $this->model->verify_usergenc($usernamegenc);
        $data['nombresusuario2'] = $this->model->getNombresUsuario();
        $this->loadViews("nombresusuario", $data);
    }
    function registraTienda()
    {
        $this->model->getRegistraTienda($_POST);
        $usernamegenc = $this->input->post("usernamegenc");
        $data['usernamegenc'] = $this->model->verify_usergenc($usernamegenc);
        $data['tiendas2'] = $this->model->getTiendas();
        $this->loadViews("tiendas", $data);
    }
    function traerNumerodetienda()
    {
        $numerodetienda = $this->model->getNumerodetienda($_POST['tienda']);
        $data['numerodetienda'] = $numerodetienda;
        $this->load->view("ajax/datostienda", $data);
    }
    function traerm2detienda()
    {
        $numerodetienda = $this->model->getm2detienda($_POST['tienda']);
        $data['numerodetienda'] = $numerodetienda;
        $this->load->view("ajax/m2tienda", $data);
    }
    function traernumdetienda()
    {
        $numerodetienda = $this->model->getnumdetienda($_POST['tienda']);
        $data['numerodetienda'] = $numerodetienda;
        $this->load->view("ajax/numerotienda", $data);
    }
    function traercentrocostos()
    {
        $cctienda = $this->model->getcentrocostos_after($_POST['tienda']);
        $data['cctienda'] = $cctienda;
        $this->load->view("ajax/centrocostostnd", $data);
    }
    function traerubicacion()
    {
        $ubicacion_info = $this->model->gettraerubicacion($_POST['tienda']);
        $data['ubicacion_info'] = $ubicacion_info;
        $this->load->view("ajax/ubicacion_td", $data);
    }
    function login_access_users()
    {
        $this->model->upload_login_access_users($_POST);
    }
    /*
    function generarExcel(){
        
        $data['entrada3'] = $this->model->getProductosEntrada2($_POST['numerocompra']);

        $data['dcmpiso3'] = $this->model->getProductosDamaYCaballeroPiso2($_POST['numerocompra']);
        $data['dcmperimetral3'] = $this->model->getProductosDamaYCaballeroPerimetral2($_POST['numerocompra']);

        $data['mhjmpiso3'] = $this->model->getProductosMujerHombreJrPiso2($_POST['numerocompra']);
        $data['mhjmperimetral3'] = $this->model->getProductosMujerHombreJrPerimetral2($_POST['numerocompra']);
        $data['mhjmpjeans3'] = $this->model->getProductosMujerHombreJrJeans2($_POST['numerocompra']);
        $data['mhjmplicencias3'] = $this->model->getProductosMujerHombreJrLicencias2($_POST['numerocompra']);

        $data['impiso3'] = $this->model->getProductosInteriorMujerPiso2($_POST['numerocompra']);
        $data['imperimetral3'] = $this->model->getProductosInteriorMujerPerimetral2($_POST['numerocompra']);
        $data['imherraje3'] = $this->model->getProductosInteriorMujerHerraje2($_POST['numerocompra']);

        $data['innpiso3'] = $this->model->getProductosInfantilNiñoYNiñaPiso2($_POST['numerocompra']);
        $data['innperimetral3'] = $this->model->getProductosInfantilNiñoYNiñaPerimetral2($_POST['numerocompra']);
        
        $data['tnnbpiso3'] = $this->model->getProductosToddlerNiñoNiñaYBebesPiso2($_POST['numerocompra']);
        $data['tnnbperimetral3'] = $this->model->getProductosToddlerNiñoNiñaYBebesPerimetral2($_POST['numerocompra']);

        $data['hernoaplica3'] = $this->model->getProductosHerrajeNoAplica2($_POST['numerocompra']);

        $data['probmpiso3'] = $this->model->getProductosProbadoresPiso2($_POST['numerocompra']);

        $data['panmpiso3'] = $this->model->getProductosPanelesPiso2($_POST['numerocompra']);

        $data['extmpiso3'] = $this->model->getProductosExtrasPiso2($_POST['numerocompra']);

        $data['imgpop3'] = $this->model->getProductosImagenPop2($_POST['numerocompra']);

        $data['imgmaniquis3'] = $this->model->getProductosImagenManiquis2($_POST['numerocompra']);



        $data['centrocostos3'] = $this->model->getCentroCostos($_POST['numerocompra']);

        $data['centrocostosfinal3'] = $this->model->getCentroCostosFinal($_POST['numerocompra']);

        $data['subtotales3'] = $this->model->getSubtotalesDepartamentos($_POST['numerocompra']);

        $this->loadViews("generarexcel", $data);
    }
    */


    function verDetalleCompra()
    {
        $data = array(
            'numerocompra' => $this->input->post('numerocompra'),
        );
        $data['entrada2'] = $this->model->getProductosEntrada2($_POST['numerocompra']);

        $data['dcmpiso2'] = $this->model->getProductosDamaYCaballeroPiso2($_POST['numerocompra']);
        $data['dcmperimetral2'] = $this->model->getProductosDamaYCaballeroPerimetral2($_POST['numerocompra']);

        $data['mhjmpiso2'] = $this->model->getProductosMujerHombreJrPiso2($_POST['numerocompra']);
        $data['mhjmperimetral2'] = $this->model->getProductosMujerHombreJrPerimetral2($_POST['numerocompra']);
        $data['mhjmpjeans2'] = $this->model->getProductosMujerHombreJrJeans2($_POST['numerocompra']);
        $data['mhjmplicencias2'] = $this->model->getProductosMujerHombreJrLicencias2($_POST['numerocompra']);

        $data['impiso2'] = $this->model->getProductosInteriorMujerPiso2($_POST['numerocompra']);
        $data['imperimetral2'] = $this->model->getProductosInteriorMujerPerimetral2($_POST['numerocompra']);
        $data['imherraje2'] = $this->model->getProductosInteriorMujerHerraje2($_POST['numerocompra']);

        $data['innpiso2'] = $this->model->getProductosInfantilNiñoYNiñaPiso2($_POST['numerocompra']);
        $data['innperimetral2'] = $this->model->getProductosInfantilNiñoYNiñaPerimetral2($_POST['numerocompra']);

        $data['tnnbpiso2'] = $this->model->getProductosToddlerNiñoNiñaYBebesPiso2($_POST['numerocompra']);
        $data['tnnbperimetral2'] = $this->model->getProductosToddlerNiñoNiñaYBebesPerimetral2($_POST['numerocompra']);

        $data['hernoaplica2'] = $this->model->getProductosHerrajeNoAplica2($_POST['numerocompra']);

        $data['probmpiso2'] = $this->model->getProductosProbadoresPiso2($_POST['numerocompra']);

        $data['panmpiso2'] = $this->model->getProductosPanelesPiso2($_POST['numerocompra']);

        $data['extmpiso2'] = $this->model->getProductosExtrasPiso2($_POST['numerocompra']);

        $data['imgpop2'] = $this->model->getProductosImagenPop2($_POST['numerocompra']);

        $data['imgmaniquis2'] = $this->model->getProductosImagenManiquis2($_POST['numerocompra']);

        $data['otsnoaplica2'] = $this->model->getProductosOtrosNoAplica2($_POST['numerocompra']);



        $data['centrocostos'] = $this->model->getCentroCostos($_POST['numerocompra']);

        $data['centrocostosfinal'] = $this->model->getCentroCostosFinal($_POST['numerocompra']);

        $data['subtotales'] = $this->model->getSubtotalesDepartamentos($_POST['numerocompra']);


        $data['ordencompra'] = $this->model->getNumeroDeCompraPorId($_POST['numerocompra']);

        //$usernamecons = $this->input->post("usernamecons");
        $usernamecons = $_SESSION['username'];
        $data['usernamecons'] = $this->model->verify_userconsu($usernamecons);
        $tienda_name = $this->input->post('tienda_name');
        $data['tienda_cc'] = $this->model->get_centrocostos_by_tienda($tienda_name);

        $this->loadViews("detallecompras", $data);
    }
    function verDetalleCompra2()
    {
        $data = array(
            'numerocompra' => $this->input->post('numerocompra2'),
        );
        $data['entrada2'] = $this->model->getProductosEntrada2($_POST['numerocompra2']);

        $data['dcmpiso2'] = $this->model->getProductosDamaYCaballeroPiso2($_POST['numerocompra2']);
        $data['dcmperimetral2'] = $this->model->getProductosDamaYCaballeroPerimetral2($_POST['numerocompra2']);

        $data['mhjmpiso2'] = $this->model->getProductosMujerHombreJrPiso2($_POST['numerocompra2']);
        $data['mhjmperimetral2'] = $this->model->getProductosMujerHombreJrPerimetral2($_POST['numerocompra2']);
        $data['mhjmpjeans2'] = $this->model->getProductosMujerHombreJrJeans2($_POST['numerocompra2']);
        $data['mhjmplicencias2'] = $this->model->getProductosMujerHombreJrLicencias2($_POST['numerocompra2']);

        $data['impiso2'] = $this->model->getProductosInteriorMujerPiso2($_POST['numerocompra2']);
        $data['imperimetral2'] = $this->model->getProductosInteriorMujerPerimetral2($_POST['numerocompra2']);
        $data['imherraje2'] = $this->model->getProductosInteriorMujerHerraje2($_POST['numerocompra2']);

        $data['innpiso2'] = $this->model->getProductosInfantilNiñoYNiñaPiso2($_POST['numerocompra2']);
        $data['innperimetral2'] = $this->model->getProductosInfantilNiñoYNiñaPerimetral2($_POST['numerocompra2']);

        $data['tnnbpiso2'] = $this->model->getProductosToddlerNiñoNiñaYBebesPiso2($_POST['numerocompra2']);
        $data['tnnbperimetral2'] = $this->model->getProductosToddlerNiñoNiñaYBebesPerimetral2($_POST['numerocompra2']);

        $data['hernoaplica2'] = $this->model->getProductosHerrajeNoAplica2($_POST['numerocompra2']);

        $data['probmpiso2'] = $this->model->getProductosProbadoresPiso2($_POST['numerocompra2']);

        $data['panmpiso2'] = $this->model->getProductosPanelesPiso2($_POST['numerocompra2']);

        $data['extmpiso2'] = $this->model->getProductosExtrasPiso2_2($_POST['numerocompra2']);

        $data['imgpop2'] = $this->model->getProductosImagenPop2($_POST['numerocompra2']);

        $data['imgmaniquis2'] = $this->model->getProductosImagenManiquis2($_POST['numerocompra2']);



        $data['centrocostosprov'] = $this->model->getCentroCostosProv($_POST['numerocompra2']);

        $data['centrocostosfinalprov'] = $this->model->getCentroCostosFinalProv($_POST['numerocompra2']);

        $data['subtotales'] = $this->model->getSubtotalesDepartamentos($_POST['numerocompra2']);


        $data['ordencompra'] = $this->model->getNumeroDeCompraPorId($_POST['numerocompra2']);

        //$usernamecons = $this->input->post("usernamecons2");
        $usernamecons = $_SESSION['username'];
        $data['usernamecons'] = $this->model->verify_userconsu($usernamecons);
        $tienda_name = $this->input->post('tienda_name_2');
        $data['tienda_cc'] = $this->model->get_centrocostos_by_tienda($tienda_name);


        $this->loadViews("detallecompras2", $data);
    }







    function insertarProductosCompra()
    {
        $this->model->reemplaza_ultima_orden_de_tienda_prods($_POST);
        $this->model->reemplaza_ultima_orden_de_tienda_numerocompra($_POST);
        $this->model->actualiza_status_tienda($_POST);
        $this->model->remueve_orden_temporal_en_base_a_tienda_orden_creada($_POST);
        $this->model->remueve_cabeceros_temporales_en_base_a_tienda_orden_creada($_POST);
        $this->model->remueve_productos_temporales_en_base_a_tienda_orden_creada($_POST);

        $this->model->uploadProductosCompraEntrada($_POST);
        $this->model->uploadProductosCompraDamaCaballeroPiso($_POST);
        $this->model->uploadProductosCompraDamaCaballeroPerimetral($_POST);
        $this->model->uploadProductosCompraMujerHombreJrPiso($_POST);
        $this->model->uploadProductosCompraMujerHombreJrPerimetral($_POST);
        $this->model->uploadProductosCompraMujerHombreJrJeans($_POST);
        $this->model->uploadProductosCompraMujerHombreJrLicencias($_POST);
        $this->model->uploadProductosCompraInteriorMujerPiso($_POST);
        $this->model->uploadProductosCompraInteriorMujerPerimetral($_POST);
        $this->model->uploadProductosCompraInteriorMujerHerraje($_POST);
        $this->model->uploadProductosCompraInfantilNiñoYNiñaPiso($_POST);
        $this->model->uploadProductosCompraInfantilNiñoYNiñaPerimetral($_POST);
        $this->model->uploadProductosCompraToddlerNiñoNiñaYBebesPiso($_POST);
        $this->model->uploadProductosCompraToddlerNiñoNiñaYBebesPerimetral($_POST);
        $this->model->uploadProductosCompraHerrajes($_POST);
        $this->model->uploadProductosCompraProbadoresPiso($_POST);
        $this->model->uploadProductosCompraPanelesPiso($_POST);
        $this->model->uploadProductosCompraExtrasPiso($_POST);
        $this->model->uploadProductosCompraImagenPop($_POST);
        $this->model->uploadProductosCompraImagenManiquis($_POST);
        $this->model->uploadProductosCompraOtros($_POST);

        $this->model->uploadCentroCostos($_POST);
        $this->model->uploadCentroCostosProveedor($_POST);
        $this->model->uploadCentroCostosFinal($_POST);
        $this->model->uploadCentroCostosFinalProveedor($_POST);
        $this->model->uploadSubtotalesFinal($_POST);
        $this->model->uploadOrdenCompra($_POST);

        $usernamecons = $this->input->post("username_validate_session");
        $data['usernamecons'] = $this->model->verify_userconsu($usernamecons);
        $data['productos'] = $this->model->contenidoCarrito();
        $this->loadViews("vercarrito", $data);
    }
    function busca_prods_catalogo()
    {
        $dato = $this->input->get('term');
        $data = $this->model->get_busca_prods_catalogo($dato);
        echo json_encode($data);
    }
    function busca_prods_catalogo_precio()
    {
        $dato = $this->input->get('autocomval');
        $data = [
            'precio' => $this->model->get_busca_prods_catalogo_precio($dato),
            'reproceso' => $this->model->get_busca_prods_catalogo_reproceso($dato),
            'pieza' => $this->model->get_busca_prods_catalogo_no_piezas($dato),
            'unidad' => $this->model->get_busca_prods_catalogo_unidad($dato),
        ];
        echo json_encode($data);
    }
    function busca_obs_catalogo()
    {
        $dato = $this->input->get('term');
        $data = $this->model->get_busca_obs_catalogo($dato);
        echo json_encode($data);
    }
    function busca_reprocesado()
    {
        $dato = $this->input->get('rep_id_val');
        $resultado = $this->model->get_busca_reprocesado($dato);
        echo json_encode($resultado);
    }
    function busca_precionormal()
    {
        $dato = $this->input->get('rep_id_val');
        $resultado = $this->model->get_busca_precionormal($dato);
        echo json_encode($resultado);
    }
    function busca_reprocesado_en_compra()
    {
        $dato = $this->input->get('rep_id_val');
        $resultado = $this->model->get_busca_reprocesado_en_compra($dato);
        echo json_encode($resultado);
    }
    function busca_precionormal_en_compra()
    {
        $dato = $this->input->get('rep_id_val');
        $resultado = $this->model->get_busca_precionormal_en_compra($dato);
        echo json_encode($resultado);
    }

    function registraNuevosSkus()
    {
        $cc31 = $this->input->post('cc31');
        $cc33 = $this->input->post('cc33');
        $cc34 = $this->input->post('cc34');
        $id_producto = $this->input->post('id_producto');
        $data = array(
            'cc31' => $cc31,
            'cc33' => $cc33,
            'cc34' => $cc34,
            'id_producto' => $id_producto
        );
        $this->model->getregistraNuevosSkus($data);
    }
    function registraNuevoProductoEntrada()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombreent'],
            'unidad' => $data['unidadent'],
            'pieza' => $data['piezaent'],
            'precio' => $data['precioent'],
            'observaciones' => $data['observacionesent'],
            'departamentos' => $data['departamentosent'],
            'subdepartamentos' => $data['subdepartamentosent'],
            'status' => $data['statusent'],
            'incluye' => $data['entincluye'],
            'reproceso' => $data['reprocesoent'],
        );
        echo $this->model->getregistraNuevoProductoEntrada($info);
    }
    function registraNuevoProductodcmpi()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombredcmpi'],
            'unidad' => $data['unidaddcmpi'],
            'pieza' => $data['piezadcmpi'],
            'precio' => $data['preciodcmpi'],
            'observaciones' => $data['observacionesdcmpi'],
            'departamentos' => $data['departamentosdcmpi'],
            'subdepartamentos' => $data['subdepartamentosdcmpi'],
            'status' => $data['statusdcmpi'],
            'incluye' => $data['dcmpiincluye'],
            'reproceso' => $data['reprocesodcmpi'],
        );
        echo $this->model->getregistraNuevoProductodcmpi($info);
    }
    function registraNuevoProductodcmpe()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombredcmpe'],
            'unidad' => $data['unidaddcmpe'],
            'pieza' => $data['piezadcmpe'],
            'precio' => $data['preciodcmpe'],
            'observaciones' => $data['observacionesdcmpe'],
            'departamentos' => $data['departamentosdcmpe'],
            'subdepartamentos' => $data['subdepartamentosdcmpe'],
            'status' => $data['statusdcmpe'],
            'incluye' => $data['dcmpeincluye'],
            'reproceso' => $data['reprocesodcmpe'],
        );
        echo $this->model->getregistraNuevoProductodcmpe($info);
    }
    function registraNuevoProductomhjmpi()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombremhjmpi'],
            'unidad' => $data['unidadmhjmpi'],
            'pieza' => $data['piezamhjmpi'],
            'precio' => $data['preciomhjmpi'],
            'observaciones' => $data['observacionesmhjmpi'],
            'departamentos' => $data['departamentosmhjmpi'],
            'subdepartamentos' => $data['subdepartamentosmhjmpi'],
            'status' => $data['statusmhjmpi'],
            'incluye' => $data['mhjmpiincluye'],
            'reproceso' => $data['reprocesomhjmpi'],
        );
        echo $this->model->getregistraNuevoProductomhjmpi($info);
    }
    function registraNuevoProductomhjmpe()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombremhjmpe'],
            'unidad' => $data['unidadmhjmpe'],
            'pieza' => $data['piezamhjmpe'],
            'precio' => $data['preciomhjmpe'],
            'observaciones' => $data['observacionesmhjmpe'],
            'departamentos' => $data['departamentosmhjmpe'],
            'subdepartamentos' => $data['subdepartamentosmhjmpe'],
            'status' => $data['statusmhjmpe'],
            'incluye' => $data['mhjmpeincluye'],
            'reproceso' => $data['reprocesomhjmpe'],
        );
        echo $this->model->getregistraNuevoProductomhjmpe($info);
    }
    function registraNuevoProductomhjmpje()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombremhjmpje'],
            'unidad' => $data['unidadmhjmpje'],
            'pieza' => $data['piezamhjmpje'],
            'precio' => $data['preciomhjmpje'],
            'observaciones' => $data['observacionesmhjmpje'],
            'departamentos' => $data['departamentosmhjmpje'],
            'subdepartamentos' => $data['subdepartamentosmhjmpje'],
            'status' => $data['statusmhjmpje'],
            'incluye' => $data['mhjmpjeincluye'],
            'reproceso' => $data['reprocesomhjmpje'],
        );
        echo $this->model->getregistraNuevoProductomhjmpje($info);
    }
    function registraNuevoProductomhjmpli()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombremhjmpli'],
            'unidad' => $data['unidadmhjmpli'],
            'pieza' => $data['piezamhjmpli'],
            'precio' => $data['preciomhjmpli'],
            'observaciones' => $data['observacionesmhjmpli'],
            'departamentos' => $data['departamentosmhjmpli'],
            'subdepartamentos' => $data['subdepartamentosmhjmpli'],
            'status' => $data['statusmhjmpli'],
            'incluye' => $data['mhjmpliincluye'],
            'reproceso' => $data['reprocesomhjmpli'],
        );
        echo $this->model->getregistraNuevoProductomhjmpli($info);
    }
    function registraNuevoProductoimpi()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombreimpi'],
            'unidad' => $data['unidadimpi'],
            'pieza' => $data['piezaimpi'],
            'precio' => $data['precioimpi'],
            'observaciones' => $data['observacionesimpi'],
            'departamentos' => $data['departamentosimpi'],
            'subdepartamentos' => $data['subdepartamentosimpi'],
            'status' => $data['statusimpi'],
            'incluye' => $data['impiincluye'],
            'reproceso' => $data['reprocesoimpi'],
        );
        echo $this->model->getregistraNuevoProductoimpi($info);
    }
    function registraNuevoProductoimpe()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombreimpe'],
            'unidad' => $data['unidadimpe'],
            'pieza' => $data['piezaimpe'],
            'precio' => $data['precioimpe'],
            'observaciones' => $data['observacionesimpe'],
            'departamentos' => $data['departamentosimpe'],
            'subdepartamentos' => $data['subdepartamentosimpe'],
            'status' => $data['statusimpe'],
            'incluye' => $data['impeincluye'],
            'reproceso' => $data['reprocesoimpe'],
        );
        echo $this->model->getregistraNuevoProductoimpe($info);
    }
    function registraNuevoProductoimhe()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombreimhe'],
            'unidad' => $data['unidadimhe'],
            'pieza' => $data['piezaimhe'],
            'precio' => $data['precioimhe'],
            'observaciones' => $data['observacionesimhe'],
            'departamentos' => $data['departamentosimhe'],
            'subdepartamentos' => $data['subdepartamentosimhe'],
            'status' => $data['statusimhe'],
            'incluye' => $data['imheincluye'],
            'reproceso' => $data['reprocesoimhe'],
        );
        echo $this->model->getregistraNuevoProductoimhe($info);
    }
    function registraNuevoProductoinnpi()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombreinnpi'],
            'unidad' => $data['unidadinnpi'],
            'pieza' => $data['piezainnpi'],
            'precio' => $data['precioinnpi'],
            'observaciones' => $data['observacionesinnpi'],
            'departamentos' => $data['departamentosinnpi'],
            'subdepartamentos' => $data['subdepartamentosinnpi'],
            'status' => $data['statusinnpi'],
            'incluye' => $data['innpiincluye'],
            'reproceso' => $data['reprocesoinnpi'],
        );
        echo $this->model->getregistraNuevoProductoinnpi($info);
    }
    function registraNuevoProductoinnpe()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombreinnpe'],
            'unidad' => $data['unidadinnpe'],
            'pieza' => $data['piezainnpe'],
            'precio' => $data['precioinnpe'],
            'observaciones' => $data['observacionesinnpe'],
            'departamentos' => $data['departamentosinnpe'],
            'subdepartamentos' => $data['subdepartamentosinnpe'],
            'status' => $data['statusinnpe'],
            'incluye' => $data['innpeincluye'],
            'reproceso' => $data['reprocesoinnpe'],
        );
        echo $this->model->getregistraNuevoProductoinnpe($info);
    }
    function registraNuevoProductotnnbpi()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombretnnbpi'],
            'unidad' => $data['unidadtnnbpi'],
            'pieza' => $data['piezatnnbpi'],
            'precio' => $data['preciotnnbpi'],
            'observaciones' => $data['observacionestnnbpi'],
            'departamentos' => $data['departamentostnnbpi'],
            'subdepartamentos' => $data['subdepartamentostnnbpi'],
            'status' => $data['statustnnbpi'],
            'incluye' => $data['tnnbpiincluye'],
            'reproceso' => $data['reprocesotnnbpi'],
        );
        echo $this->model->getregistraNuevoProductotnnbpi($info);
    }
    function registraNuevoProductotnnbpe()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombretnnbpe'],
            'unidad' => $data['unidadtnnbpe'],
            'pieza' => $data['piezatnnbpe'],
            'precio' => $data['preciotnnbpe'],
            'observaciones' => $data['observacionestnnbpe'],
            'departamentos' => $data['departamentostnnbpe'],
            'subdepartamentos' => $data['subdepartamentostnnbpe'],
            'status' => $data['statustnnbpe'],
            'incluye' => $data['tnnbpeincluye'],
            'reproceso' => $data['reprocesotnnbpe'],
        );
        echo $this->model->getregistraNuevoProductotnnbpe($info);
    }
    function registraNuevoProductoherna()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombreherna'],
            'unidad' => $data['unidadherna'],
            'pieza' => $data['piezaherna'],
            'precio' => $data['precioherna'],
            'observaciones' => $data['observacionesherna'],
            'departamentos' => $data['departamentosherna'],
            'subdepartamentos' => $data['subdepartamentosherna'],
            'status' => $data['statusherna'],
            'incluye' => $data['hernaincluye'],
            'reproceso' => $data['reprocesoherna'],
        );
        echo $this->model->getregistraNuevoProductoherna($info);
    }
    function registraNuevoProductoprobmpi()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombreprobmpi'],
            'unidad' => $data['unidadprobmpi'],
            'pieza' => $data['piezaprobmpi'],
            'precio' => $data['precioprobmpi'],
            'observaciones' => $data['observacionesprobmpi'],
            'departamentos' => $data['departamentosprobmpi'],
            'subdepartamentos' => $data['subdepartamentosprobmpi'],
            'status' => $data['statusprobmpi'],
            'incluye' => $data['probmpiincluye'],
            'reproceso' => $data['reprocesoprobmpi'],
        );
        echo $this->model->getregistraNuevoProductoprobmpi($info);
    }
    function registraNuevoProductopanmpi()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombrepanmpi'],
            'unidad' => $data['unidadpanmpi'],
            'pieza' => $data['piezapanmpi'],
            'precio' => $data['preciopanmpi'],
            'observaciones' => $data['observacionespanmpi'],
            'departamentos' => $data['departamentospanmpi'],
            'subdepartamentos' => $data['subdepartamentospanmpi'],
            'status' => $data['statuspanmpi'],
            'incluye' => $data['panmpiincluye'],
            'reproceso' => $data['reprocesopanmpi'],
        );
        echo $this->model->getregistraNuevoProductopanmpi($info);
    }
    function registraNuevoProductoextmpi()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombreextmpi'],
            'unidad' => $data['unidadextmpi'],
            'pieza' => $data['piezaextmpi'],
            'precio' => $data['precioextmpi'],
            'observaciones' => $data['observacionesextmpi'],
            'departamentos' => $data['departamentosextmpi'],
            'subdepartamentos' => $data['subdepartamentosextmpi'],
            'status' => $data['statusextmpi'],
            'incluye' => $data['extmpiincluye'],
            'reproceso' => $data['reprocesoextmpi'],
        );
        echo $this->model->getregistraNuevoProductoextmpi($info);
    }
    function registraNuevoProductoimgp()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombreimgp'],
            'unidad' => $data['unidadimgp'],
            'pieza' => $data['piezaimgp'],
            'precio' => $data['precioimgp'],
            'observaciones' => $data['observacionesimgp'],
            'departamentos' => $data['departamentosimgp'],
            'subdepartamentos' => $data['subdepartamentosimgp'],
            'status' => $data['statusimgp'],
            'incluye' => $data['imgpincluye'],
            'reproceso' => $data['reprocesoimgp'],
        );
        echo $this->model->getregistraNuevoProductoimgp($info);
    }
    function registraNuevoProductoimgm()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombreimgm'],
            'unidad' => $data['unidadimgm'],
            'pieza' => $data['piezaimgm'],
            'precio' => $data['precioimgm'],
            'observaciones' => $data['observacionesimgm'],
            'departamentos' => $data['departamentosimgm'],
            'subdepartamentos' => $data['subdepartamentosimgm'],
            'status' => $data['statusimgm'],
            'incluye' => $data['imgmincluye'],
            'reproceso' => $data['reprocesoimgm'],
        );
        echo $this->model->getregistraNuevoProductoimgm($info);
    }
    function registraNuevoProductoots()
    {
        $data = $this->input->post();
        $info = array(
            'id' => '',
            'nombre' => $data['nombreots'],
            'unidad' => $data['unidadots'],
            'pieza' => $data['piezaots'],
            'precio' => $data['precioots'],
            'observaciones' => $data['observacionesots'],
            'departamentos' => $data['departamentosots'],
            'subdepartamentos' => $data['subdepartamentosots'],
            'status' => $data['statusots'],
            'incluye' => $data['otsincluye'],
            'reproceso' => $data['reprocesoots'],
        );
        echo $this->model->getregistraNuevoProductoots($info);
    }















    function registraNuevoProductoentpdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvalueent'],
            'id' => $data['idnuevoentrada'],
            'nombre' => $data['nombreent'],
            'unidad' => $data['unidadent'],
            'pieza' => $data['piezaent'],
            'precio' => $data['precioent'],
            'subtotal' => $data['subtotalent'],
            'observaciones' => $data['observacionesent'],
            'departamentos' => $data['departamentosent'],
            'subdepartamentos' => $data['subdepartamentosent'],
            'incluye' => $data['entincluye'],
            'color' => $data['color_values_ent'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductoentpdnt($info);
    }
    function registraNuevoProductodcmpipdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvaluedcmpi'],
            'id' => $data['idnuevodcmpi'],
            'nombre' => $data['nombredcmpi'],
            'unidad' => $data['unidaddcmpi'],
            'pieza' => $data['piezadcmpi'],
            'precio' => $data['preciodcmpi'],
            'subtotal' => $data['subtotaldcmpi'],
            'observaciones' => $data['observacionesdcmpi'],
            'departamentos' => $data['departamentosdcmpi'],
            'subdepartamentos' => $data['subdepartamentosdcmpi'],
            'incluye' => $data['dcmpiincluye'],
            'color' => $data['color_values_dcmpi'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductodcmpipdnt($info);
    }
    function registraNuevoProductodcmpepdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvaluedcmpe'],
            'id' => $data['idnuevodcmpe'],
            'nombre' => $data['nombredcmpe'],
            'unidad' => $data['unidaddcmpe'],
            'pieza' => $data['piezadcmpe'],
            'precio' => $data['preciodcmpe'],
            'subtotal' => $data['subtotaldcmpe'],
            'observaciones' => $data['observacionesdcmpe'],
            'departamentos' => $data['departamentosdcmpe'],
            'subdepartamentos' => $data['subdepartamentosdcmpe'],
            'incluye' => $data['dcmpeincluye'],
            'color' => $data['color_values_dcmpe'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductodcmpepdnt($info);
    }
    function registraNuevoProductomhjmpipdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvaluemhjmpi'],
            'id' => $data['idnuevomhjmpi'],
            'nombre' => $data['nombremhjmpi'],
            'unidad' => $data['unidadmhjmpi'],
            'pieza' => $data['piezamhjmpi'],
            'precio' => $data['preciomhjmpi'],
            'subtotal' => $data['subtotalmhjmpi'],
            'observaciones' => $data['observacionesmhjmpi'],
            'departamentos' => $data['departamentosmhjmpi'],
            'subdepartamentos' => $data['subdepartamentosmhjmpi'],
            'incluye' => $data['mhjmpiincluye'],
            'color' => $data['color_values_mhjmpi'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductomhjmpipdnt($info);
    }
    function registraNuevoProductomhjmpepdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvaluemhjmpe'],
            'id' => $data['idnuevomhjmpe'],
            'nombre' => $data['nombremhjmpe'],
            'unidad' => $data['unidadmhjmpe'],
            'pieza' => $data['piezamhjmpe'],
            'precio' => $data['preciomhjmpe'],
            'subtotal' => $data['subtotalmhjmpe'],
            'observaciones' => $data['observacionesmhjmpe'],
            'departamentos' => $data['departamentosmhjmpe'],
            'subdepartamentos' => $data['subdepartamentosmhjmpe'],
            'incluye' => $data['mhjmpeincluye'],
            'color' => $data['color_values_mhjmpe'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductomhjmpepdnt($info);
    }
    function registraNuevoProductomhjmpjepdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvaluemhjmpje'],
            'id' => $data['idnuevomhjmpje'],
            'nombre' => $data['nombremhjmpje'],
            'unidad' => $data['unidadmhjmpje'],
            'pieza' => $data['piezamhjmpje'],
            'precio' => $data['preciomhjmpje'],
            'subtotal' => $data['subtotalmhjmpje'],
            'observaciones' => $data['observacionesmhjmpje'],
            'departamentos' => $data['departamentosmhjmpje'],
            'subdepartamentos' => $data['subdepartamentosmhjmpje'],
            'incluye' => $data['mhjmpjeincluye'],
            'color' => $data['color_values_mhjmpje'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductomhjmpjepdnt($info);
    }
    function registraNuevoProductomhjmplipdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvaluemhjmpli'],
            'id' => $data['idnuevomhjmpli'],
            'nombre' => $data['nombremhjmpli'],
            'unidad' => $data['unidadmhjmpli'],
            'pieza' => $data['piezamhjmpli'],
            'precio' => $data['preciomhjmpli'],
            'subtotal' => $data['subtotalmhjmpli'],
            'observaciones' => $data['observacionesmhjmpli'],
            'departamentos' => $data['departamentosmhjmpli'],
            'subdepartamentos' => $data['subdepartamentosmhjmpli'],
            'incluye' => $data['mhjmpliincluye'],
            'color' => $data['color_values_mhjmpli'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductomhjmplipdnt($info);
    }
    function registraNuevoProductoimpipdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvalueimpi'],
            'id' => $data['idnuevoimpi'],
            'nombre' => $data['nombreimpi'],
            'unidad' => $data['unidadimpi'],
            'pieza' => $data['piezaimpi'],
            'precio' => $data['precioimpi'],
            'subtotal' => $data['subtotalimpi'],
            'observaciones' => $data['observacionesimpi'],
            'departamentos' => $data['departamentosimpi'],
            'subdepartamentos' => $data['subdepartamentosimpi'],
            'incluye' => $data['impiincluye'],
            'color' => $data['color_values_impi'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductoimpipdnt($info);
    }
    function registraNuevoProductoimpepdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvalueimpe'],
            'id' => $data['idnuevoimpe'],
            'nombre' => $data['nombreimpe'],
            'unidad' => $data['unidadimpe'],
            'pieza' => $data['piezaimpe'],
            'precio' => $data['precioimpe'],
            'subtotal' => $data['subtotalimpe'],
            'observaciones' => $data['observacionesimpe'],
            'departamentos' => $data['departamentosimpe'],
            'subdepartamentos' => $data['subdepartamentosimpe'],
            'incluye' => $data['impeincluye'],
            'color' => $data['color_values_impe'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductoimpepdnt($info);
    }
    function registraNuevoProductoimhepdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvalueimhe'],
            'id' => $data['idnuevoimhe'],
            'nombre' => $data['nombreimhe'],
            'unidad' => $data['unidadimhe'],
            'pieza' => $data['piezaimhe'],
            'precio' => $data['precioimhe'],
            'subtotal' => $data['subtotalimhe'],
            'observaciones' => $data['observacionesimhe'],
            'departamentos' => $data['departamentosimhe'],
            'subdepartamentos' => $data['subdepartamentosimhe'],
            'incluye' => $data['imheincluye'],
            'color' => $data['color_values_imhe'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductoimhepdnt($info);
    }
    function registraNuevoProductoinnpipdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvalueinnpi'],
            'id' => $data['idnuevoinnpi'],
            'nombre' => $data['nombreinnpi'],
            'unidad' => $data['unidadinnpi'],
            'pieza' => $data['piezainnpi'],
            'precio' => $data['precioinnpi'],
            'subtotal' => $data['subtotalinnpi'],
            'observaciones' => $data['observacionesinnpi'],
            'departamentos' => $data['departamentosinnpi'],
            'subdepartamentos' => $data['subdepartamentosinnpi'],
            'incluye' => $data['innpiincluye'],
            'color' => $data['color_values_innpi'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductoinnpipdnt($info);
    }
    function registraNuevoProductoinnpepdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvalueinnpe'],
            'id' => $data['idnuevoinnpe'],
            'nombre' => $data['nombreinnpe'],
            'unidad' => $data['unidadinnpe'],
            'pieza' => $data['piezainnpe'],
            'precio' => $data['precioinnpe'],
            'subtotal' => $data['subtotalinnpe'],
            'observaciones' => $data['observacionesinnpe'],
            'departamentos' => $data['departamentosinnpe'],
            'subdepartamentos' => $data['subdepartamentosinnpe'],
            'incluye' => $data['innpeincluye'],
            'color' => $data['color_values_innpe'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductoinnpepdnt($info);
    }
    function registraNuevoProductotnnbpipdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvaluetnnbpi'],
            'id' => $data['idnuevotnnbpi'],
            'nombre' => $data['nombretnnbpi'],
            'unidad' => $data['unidadtnnbpi'],
            'pieza' => $data['piezatnnbpi'],
            'precio' => $data['preciotnnbpi'],
            'subtotal' => $data['subtotaltnnbpi'],
            'observaciones' => $data['observacionestnnbpi'],
            'departamentos' => $data['departamentostnnbpi'],
            'subdepartamentos' => $data['subdepartamentostnnbpi'],
            'incluye' => $data['tnnbpiincluye'],
            'color' => $data['color_values_tnnbpi'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductotnnbpipdnt($info);
    }
    function registraNuevoProductotnnbpepdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvaluetnnbpe'],
            'id' => $data['idnuevotnnbpe'],
            'nombre' => $data['nombretnnbpe'],
            'unidad' => $data['unidadtnnbpe'],
            'pieza' => $data['piezatnnbpe'],
            'precio' => $data['preciotnnbpe'],
            'subtotal' => $data['subtotaltnnbpe'],
            'observaciones' => $data['observacionestnnbpe'],
            'departamentos' => $data['departamentostnnbpe'],
            'subdepartamentos' => $data['subdepartamentostnnbpe'],
            'incluye' => $data['tnnbpeincluye'],
            'color' => $data['color_values_tnnbpe'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductotnnbpepdnt($info);
    }
    function registraNuevoProductohernapdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvalueherna'],
            'id' => $data['idnuevoherna'],
            'nombre' => $data['nombreherna'],
            'unidad' => $data['unidadherna'],
            'pieza' => $data['piezaherna'],
            'precio' => $data['precioherna'],
            'subtotal' => $data['subtotalherna'],
            'observaciones' => $data['observacionesherna'],
            'departamentos' => $data['departamentosherna'],
            'subdepartamentos' => $data['subdepartamentosherna'],
            'incluye' => $data['hernaincluye'],
            'color' => $data['color_values_herna'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductohernapdnt($info);
    }
    function registraNuevoProductoprobmpipdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvalueprobmpi'],
            'id' => $data['idnuevoprobmpi'],
            'nombre' => $data['nombreprobmpi'],
            'unidad' => $data['unidadprobmpi'],
            'pieza' => $data['piezaprobmpi'],
            'precio' => $data['precioprobmpi'],
            'subtotal' => $data['subtotalprobmpi'],
            'observaciones' => $data['observacionesprobmpi'],
            'departamentos' => $data['departamentosprobmpi'],
            'subdepartamentos' => $data['subdepartamentosprobmpi'],
            'incluye' => $data['probmpiincluye'],
            'color' => $data['color_values_probmpi'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductoprobmpipdnt($info);
    }
    function registraNuevoProductopanmpipdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvaluepanmpi'],
            'id' => $data['idnuevopanmpi'],
            'nombre' => $data['nombrepanmpi'],
            'unidad' => $data['unidadpanmpi'],
            'pieza' => $data['piezapanmpi'],
            'precio' => $data['preciopanmpi'],
            'subtotal' => $data['subtotalpanmpi'],
            'observaciones' => $data['observacionespanmpi'],
            'departamentos' => $data['departamentospanmpi'],
            'subdepartamentos' => $data['subdepartamentospanmpi'],
            'incluye' => $data['panmpiincluye'],
            'color' => $data['color_values_panmpi'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductopanmpipdnt($info);
    }
    function registraNuevoProductoextmpipdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvalueextmpi'],
            'id' => $data['idnuevoextmpi'],
            'nombre' => $data['nombreextmpi'],
            'unidad' => $data['unidadextmpi'],
            'pieza' => $data['piezaextmpi'],
            'precio' => $data['precioextmpi'],
            'subtotal' => $data['subtotalextmpi'],
            'observaciones' => $data['observacionesextmpi'],
            'departamentos' => $data['departamentosextmpi'],
            'subdepartamentos' => $data['subdepartamentosextmpi'],
            'incluye' => $data['extmpiincluye'],
            'color' => $data['color_values_extmpi'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductoextmpipdnt($info);
    }
    function registraNuevoProductoimgppdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvalueimgp'],
            'id' => $data['idnuevoimgp'],
            'nombre' => $data['nombreimgp'],
            'unidad' => $data['unidadimgp'],
            'pieza' => $data['piezaimgp'],
            'precio' => $data['precioimgp'],
            'subtotal' => $data['subtotalimgp'],
            'observaciones' => $data['observacionesimgp'],
            'departamentos' => $data['departamentosimgp'],
            'subdepartamentos' => $data['subdepartamentosimgp'],
            'incluye' => $data['imgpincluye'],
            'color' => $data['color_values_imgp'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductoimgppdnt($info);
    }
    function registraNuevoProductoimgmpdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvalueimgm'],
            'id' => $data['idnuevoimgm'],
            'nombre' => $data['nombreimgm'],
            'unidad' => $data['unidadimgm'],
            'pieza' => $data['piezaimgm'],
            'precio' => $data['precioimgm'],
            'subtotal' => $data['subtotalimgm'],
            'observaciones' => $data['observacionesimgm'],
            'departamentos' => $data['departamentosimgm'],
            'subdepartamentos' => $data['subdepartamentosimgm'],
            'incluye' => $data['imgmincluye'],
            'color' => $data['color_values_imgm'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductoimgmpdnt($info);
    }
    function registraNuevoProductootspdnt()
    {
        $data = $this->input->post();
        $info = array(
            'ordenpendiente' => $data['ordenvalueots'],
            'id' => $data['idnuevoots'],
            'nombre' => $data['nombreots'],
            'unidad' => $data['unidadots'],
            'pieza' => $data['piezaots'],
            'precio' => $data['precioots'],
            'subtotal' => $data['subtotalots'],
            'observaciones' => $data['observacionesots'],
            'departamentos' => $data['departamentosots'],
            'subdepartamentos' => $data['subdepartamentosots'],
            'incluye' => $data['otsincluye'],
            'color' => $data['color_values_ots'],
            'sku' => $data['sku'],
        );
        echo $this->model->getregistraNuevoProductootspdnt($info);
    }






















    function guardarCambiosCompra()
    {
        $data = array(
            'id' => $_POST['id'],
            'precio' => $_POST['precio'],
            'pieza' => $_POST['pieza'],
            'subtotal' => $_POST['subtotal'],
            'observaciones' => $_POST['observaciones']
        );
        $this->model->getguardarCambiosCompra($data);
        redirect('Dashboard/productosEntrada');
    }


    /*TRAER PRODUCTOS INCIA*/
    function misProductos()
    {
        $usernamealtap = $this->input->post("usernamealtap");
        $data['usernamealtap'] = $this->model->verify_useraltap($usernamealtap);
        $data['productos'] = $this->model->getProductos();
        $this->loadViews("misproductos", $data);
    }
    function misProductosActualizar()
    {
        $user_data = $this->session->userdata('user_data');
        $username = $user_data['username'];
        //$usernamealtap = $this->input->post("usernamealtap2");
        $data['usernamealtap'] = $this->model->verify_useraltap($username);
        $data['productos'] = $this->model->getProductos();
        $data['departamentos'] = $this->model->getDepartamentos();
        $this->loadViews("misproductosactualizar", $data);
    }
    function ventaProductos()
    {
        $data['productos'] = $this->model->getVentaproductos();
        $this->loadViews("ventaproductos", $data);
    }
    function administrarproveedores()
    {
        $usernamegenc = $this->input->post("usernamegenc3");
        $data['usernamegenc'] = $this->model->verify_usergenc($usernamegenc);
        $data['proveedores2'] = $this->model->getProveedores();
        $this->loadViews("proveedores", $data);
    }
    function administrarnombresusuario()
    {
        $usernamegenc = $this->input->post("usernamegenc2");
        $data['usernamegenc'] = $this->model->verify_usergenc($usernamegenc);
        $data['nombresusuario2'] = $this->model->getNombresUsuario();
        $this->loadViews("nombresusuario", $data);
    }
    function administrartiendas()
    {
        $usernamegenc = $this->input->post("usernamegenc");
        $data['usernamegenc'] = $this->model->verify_usergenc($usernamegenc);
        $data['tiendas2'] = $this->model->getTiendas();
        $this->loadViews("tiendas", $data);
    }
    function productosEntrada()
    {
        $usernamegenc = $this->input->post("usernamegenc");
        $data['usernamegenc'] = $this->model->verify_usergenc($usernamegenc);

        $data['proveedores'] = $this->model->getProveedores();
        $data['nombresusuario'] = $this->model->getNombresUsuario();
        $data['tiendas'] = $this->model->getTiendasSelectBoxGenComp();

        //1. Total_Y_entrada_no_aplica
        $data['entrada'] = $this->model->getProductosEntrada();
        //$data['SumTotalEntrada'] = $this->model->getSumaTotalEntrada();

        //2. Total_Y_dama_y_caballero_mobiliario_de_piso
        $data['dcmpiso'] = $this->model->getProductosDamaYCaballeroPiso();
        //$data['SumaTotalDamaYCaballeroPiso'] = $this->model->getSumaTotalDamaYCaballeroPiso();
        //2. Total_Y_dama_y_caballero_mobiliario_perimetral
        $data['dcmperimetral'] = $this->model->getProductosDamaYCaballeroPerimetral();
        //$data['SumaTotalDamaYCaballeroPerimetral'] = $this->model->getSumaTotalDamaYCaballeroPerimetral();

        //3. mujer_hombre_jr_mobiliario_de_piso
        $data['mhjmpiso'] = $this->model->getProductosMujerHombreJrPiso();
        //3. mujer_hombre_jr_mobiliario_perimetral
        $data['mhjmperimetral'] = $this->model->getProductosMujerHombreJrPerimetral();
        //3. mujer_hombre_jr_mobiliario_perimetro_jeans
        $data['mhjmpjeans'] = $this->model->getProductosMujerHombreJrJeans();
        //3. mujer_hombre_jr_mobiliario_perimetro_licencias
        $data['mhjmplicencias'] = $this->model->getProductosMujerHombreJrLicencias();

        //4. interior_mujer_mobiliario_de_piso
        $data['impiso'] = $this->model->getProductosInteriorMujerPiso();
        //4. interior_mujer_mobiliario_perimetral
        $data['imperimetral'] = $this->model->getProductosInteriorMujerPerimetral();
        //4. interior_mujer_herraje
        $data['imherraje'] = $this->model->getProductosInteriorMujerHerraje();

        //5. infantil_niño_y_niña_piso
        $data['innpiso'] = $this->model->getProductosInfantilNiñoYNiñaPiso();
        //5. infantil_niño_y_niña_perimetral
        $data['innperimetral'] = $this->model->getProductosInfantilNiñoYNiñaPerimetral();

        //6. toddler_niña_niña_y_bebes_piso
        $data['tnnbpiso'] = $this->model->getProductosToddlerNiñoNiñaYBebesPiso();
        //6. toddler_niña_niña_y_bebes_perimetral
        $data['tnnbperimetral'] = $this->model->getProductosToddlerNiñoNiñaYBebesPerimetral();

        //7. herraje
        $data['hernoaplica'] = $this->model->getProductosHerrajeNoAplica();

        //8. probadores
        $data['probmpiso'] = $this->model->getProductosProbadoresPiso();

        //9. paneles
        $data['panmpiso'] = $this->model->getProductosPanelesPiso();

        //10. extras
        $data['extmpiso'] = $this->model->getProductosExtrasPiso();

        //11. imagen_pop
        $data['imgpop'] = $this->model->getProductosImagenPop();
        //11. imagen_maniquis
        $data['imgmaniquis'] = $this->model->getProductosImagenManiquis();
        //12. otros
        $data['otros'] = $this->model->getProductosOtros();

        $this->loadViews("generarcompra", $data);
    }

    function getm2tienda()
    {
        $tiendas = $this->model->getM2Tiendas($_POST['nombre']);
        $data['tienda'] = $tiendas;
        //print_r($subdepartamentos);
        $this->load->view("ajax/subdepartamentos", $data);
    }

    function GuardarPrecioCantidadFila()
    {
        $data = array(
            'id' => $_POST['id'],
            'precio' => $_POST['precio'],
            'pieza' => $_POST['pieza'],
            'subtotal' => $_POST['subtotal'],
            'observaciones' => $_POST['observaciones']
        );
        $this->model->updatePrecioCantidadSubtotalFila($data);
        redirect('Dashboard/productosEntrada');
    }


    function verPapelera()
    {
        $usernamegenc = $this->input->post("usernamegenc4");
        $data['usernamegenc'] = $this->model->verify_usergenc($usernamegenc);
        $data['productos'] = $this->model->contenidoPapelera();
        $this->loadViews("papelera", $data);
    }
    function verPapelera2()
    {
        $usernamepapdetalle = $this->input->post("usernamepapdetalle");
        $data['usernamepapdetalle'] = $this->model->verify_user_papelera_detalle($usernamepapdetalle);
        $data['productos'] = $this->model->contenidoPapelera2();
        $this->loadViews("papelera2", $data);
    }
    function verPapeleraProv()
    {
        $data['productosprov'] = $this->model->contenidoPapeleraProv();
        $this->loadViews("papeleraprov", $data);
    }
    function verPapeleraOrdePdnt()
    {
        $usernamepapordpdnt = $this->input->post("usernamepapordpdnt");
        $data['usernamepapordpdnt'] = $this->model->verify_user_papelera_ord_pdnt($usernamepapordpdnt);
        $data['ordenesborradas'] = $this->model->contenidoPapeleraOrdPdnt();
        $this->loadViews("papeleraordenpendiente", $data);
    }
    //eliminar compra permanente inicia
    function eliminarcomprapermanente()
    {
        $id_orden_pedido_delete_val = $this->input->post('id_orden_pedido_delete_val');
        $tienda_status_val = $this->input->post('tienda_status_val');
        $this->model->geteliminarnumerocomprapermanente($id_orden_pedido_delete_val);
        $this->model->geteliminarprodsdetallecompraprapermanente($id_orden_pedido_delete_val);

        $this->model->geteliminar_centrocostos_permanente($id_orden_pedido_delete_val);
        $this->model->geteliminar_centrocostosfinal_permanente($id_orden_pedido_delete_val);
        $this->model->geteliminar_centrocostosprov_permanente($id_orden_pedido_delete_val);
        $this->model->geteliminar_centrocostosfinalprov_permanente($id_orden_pedido_delete_val);
        $this->model->geteliminar_subtotales_permanente($id_orden_pedido_delete_val);

        $this->model->get_actualiza_status_tienda_orden_eliminada($tienda_status_val);
    }
    function eliminar_compra_permanente_regresa_temporales($numordencompra)
    {
        $id_orden_pedido_delete_val = $numordencompra;
        //$tienda_status_val = $this->input->post('tienda_status_val');
        $this->model->geteliminarnumerocomprapermanente($id_orden_pedido_delete_val);
        $this->model->geteliminarprodsdetallecompraprapermanente($id_orden_pedido_delete_val);

        $this->model->geteliminar_centrocostos_permanente($id_orden_pedido_delete_val);
        $this->model->geteliminar_centrocostosfinal_permanente($id_orden_pedido_delete_val);
        $this->model->geteliminar_centrocostosprov_permanente($id_orden_pedido_delete_val);
        $this->model->geteliminar_centrocostosfinalprov_permanente($id_orden_pedido_delete_val);
        $this->model->geteliminar_subtotales_permanente($id_orden_pedido_delete_val);

        //$this->model->get_actualiza_status_tienda_orden_eliminada($tienda_status_val);
    }
    //eliminar compra permanente termina
    //eliminar orden pdnt permanente inicia
    function eliminarcomprapdntpermanente()
    {
        $id_orden_pedido_delete_val = $this->input->post('id_orden_pedido_delete_val');
        $tienda_status_val = $this->input->post('tienda_status_val');
        $this->model->geteliminarnumerocomprapdntpermanente($id_orden_pedido_delete_val);
        $this->model->geteliminarprodsdetallecomprapdntpermanente($id_orden_pedido_delete_val);
        $this->model->geteliminarcabecerosdetallecomprapdntpermanente($id_orden_pedido_delete_val);

        $this->model->get_actualiza_status_tienda_pdnt_orden_eliminada($tienda_status_val);
    }
    //eliminar orden pdnt permanente termina









    function user_delete_access_control()
    {
        $user_id_val = $this->input->post('user_id_val');
        $this->model->get_user_delete_access_control($user_id_val);
    }





    function verCarrito()
    {
        $usernamecons = $this->input->post("usernamecons");
        $data['usernamecons'] = $this->model->verify_userconsu($usernamecons);
        $data['productos'] = $this->model->contenidoCarrito();
        $this->loadViews("vercarrito", $data);
    }




    /*
    function subloginmob()
    {
        $this->loadViews('logincontrolaccessmob');
    }
    function validateaccessmob()
    {
        $nombreusuario = $this->input->post('nombreusuario');
        if ($this->model->verify_sublogin_mob($nombreusuario)) {
            $data['nombreusuario'] = $this->model->verify_sublogin_mob($nombreusuario);
            $data['departamentos'] = $this->model->getDepartamentos();
            $data['tiendas'] = $this->model->getTiendas();
            $data['mobiliarioproductosentrada'] = $this->model->productosMobiliarioEntrada();
            $data['mobiliarioproductosdamaycaballero'] = $this->model->productosMobiliarioDamaYCaballero();
            $data['mobiliarioproductosmujerhombrejr'] = $this->model->productosMobiliarioMujerHombreJR();
            $data['mobiliarioproductosinteriormujer'] = $this->model->productosMobiliarioInteriorMujer();
            $data['mobiliarioproductosinfantilniñoyniña'] = $this->model->productosMobiliarioInfantilNiñoYNiña();
            $data['mobiliarioproductostoddlerniñoniñaybebes'] = $this->model->productosMobiliarioToddlerNiñoNiñaYBebes();
            $data['mobiliarioproductosherrajes'] = $this->model->productosMobiliarioHerrajes();
            $data['mobiliarioproductosprobadores'] = $this->model->productosMobiliarioProbadores();
            $data['mobiliarioproductospaneles'] = $this->model->productosMobiliarioPaneles();
            $data['mobiliarioproductosextras'] = $this->model->productosMobiliarioExtras();
            $data['mobiliarioproductosimagen'] = $this->model->productosMobiliarioImagen();
            $data['mobiliarioproductosotros'] = $this->model->productosMobiliarioOtros();

            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('mobiliario', $data);
            $this->load->view('includes/footer');
        } else {

            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('logincontrolaccessmob');
            $this->load->view('includes/footer');
        }
    }*/

    function verMobiliario()
    {
        $usernamemobi = $this->input->post("usernamemobi");
        $data['usernamemobi'] = $this->model->verify_usermobi($usernamemobi);
        $data['departamentos'] = $this->model->getDepartamentos();
        $data['tiendas'] = $this->model->getTiendas();
        $data['mobiliarioproductosentrada'] = $this->model->productosMobiliarioEntrada();
        $data['mobiliarioproductosdamaycaballero'] = $this->model->productosMobiliarioDamaYCaballero();
        $data['mobiliarioproductosmujerhombrejr'] = $this->model->productosMobiliarioMujerHombreJR();
        $data['mobiliarioproductosinteriormujer'] = $this->model->productosMobiliarioInteriorMujer();
        $data['mobiliarioproductosinfantilniñoyniña'] = $this->model->productosMobiliarioInfantilNiñoYNiña();
        $data['mobiliarioproductostoddlerniñoniñaybebes'] = $this->model->productosMobiliarioToddlerNiñoNiñaYBebes();
        $data['mobiliarioproductosherrajes'] = $this->model->productosMobiliarioHerrajes();
        $data['mobiliarioproductosprobadores'] = $this->model->productosMobiliarioProbadores();
        $data['mobiliarioproductospaneles'] = $this->model->productosMobiliarioPaneles();
        $data['mobiliarioproductosextras'] = $this->model->productosMobiliarioExtras();
        $data['mobiliarioproductosimagen'] = $this->model->productosMobiliarioImagen();
        $data['mobiliarioproductosotros'] = $this->model->productosMobiliarioOtros();
        $data['sumasprod'] = $this->model->calculasumaprods();
        $this->loadViews("mobiliario", $data);
    }
    function verMobiliarioAct()
    {
        $usernamemobi = $this->input->post("usernamemobi");
        $data['usernamemobi'] = $this->model->verify_usermobi($usernamemobi);
        $data['tiendasid'] = $this->model->getTiendasId();
        $this->loadViews("mobiliario2", $data);
    }
    function verTablaMobi2()
    {
        $input_values = $this->input->post('input_values');
        $data['sumasprod'] = $this->model->calculasumaprods($input_values);
        $data['mobiliarioproductosentrada'] = $this->model->productosMobiliarioEntrada();
        $data['mobiliarioproductosdamaycaballero'] = $this->model->productosMobiliarioDamaYCaballero();
        $data['mobiliarioproductosmujerhombrejr'] = $this->model->productosMobiliarioMujerHombreJR();
        $data['mobiliarioproductosinteriormujer'] = $this->model->productosMobiliarioInteriorMujer();
        $data['mobiliarioproductosinfantilniñoyniña'] = $this->model->productosMobiliarioInfantilNiñoYNiña();
        $data['mobiliarioproductostoddlerniñoniñaybebes'] = $this->model->productosMobiliarioToddlerNiñoNiñaYBebes();
        $data['mobiliarioproductosherrajes'] = $this->model->productosMobiliarioHerrajes();
        $data['mobiliarioproductosprobadores'] = $this->model->productosMobiliarioProbadores();
        $data['mobiliarioproductospaneles'] = $this->model->productosMobiliarioPaneles();
        $data['mobiliarioproductosextras'] = $this->model->productosMobiliarioExtras();
        $data['mobiliarioproductosimagen'] = $this->model->productosMobiliarioImagen();
        $data['mobiliarioproductosotros'] = $this->model->productosMobiliarioOtros();
        $tableHtml = $this->load->view('ajax/tablasmobiliario', $data, true);

        echo json_encode(['tableHtml' => $tableHtml]);
    }
    function consultaMobiliario()
    {
        $usernamemobi = $this->input->post("usernamemobi");
        $data['usernamemobi'] = $this->model->verify_usermobi($usernamemobi);
        $data['tiendas'] = $this->model->getTiendasConsultaMobiliario();
        $data['años'] = $this->model->getAñoTiendasConsultaMobiliario();
        $data['productos'] = $this->model->get_consulta_Mobiliario_Productos_Cabeceros();
        $data['mobiliariofull'] = $this->model->productosMobiliarioFull();
        $data['mobiliarioproductosentrada'] = $this->model->productosMobiliarioEntrada();
        $data['mobiliarioproductosdamaycaballero'] = $this->model->productosMobiliarioDamaYCaballero();
        $data['mobiliarioproductosmujerhombrejr'] = $this->model->productosMobiliarioMujerHombreJR();
        $data['mobiliarioproductosinteriormujer'] = $this->model->productosMobiliarioInteriorMujer();
        $data['mobiliarioproductosinfantilniñoyniña'] = $this->model->productosMobiliarioInfantilNiñoYNiña();
        $data['mobiliarioproductostoddlerniñoniñaybebes'] = $this->model->productosMobiliarioToddlerNiñoNiñaYBebes();
        $data['mobiliarioproductosherrajes'] = $this->model->productosMobiliarioHerrajes();
        $data['mobiliarioproductosprobadores'] = $this->model->productosMobiliarioProbadores();
        $data['mobiliarioproductospaneles'] = $this->model->productosMobiliarioPaneles();
        $data['mobiliarioproductosextras'] = $this->model->productosMobiliarioExtras();
        $data['mobiliarioproductosimagen'] = $this->model->productosMobiliarioImagen();
        $data['mobiliarioproductosotros'] = $this->model->productosMobiliarioOtros();
        $this->loadViews("mobiliario3", $data);
    }
    function consulta_Mobiliario_Por_Id_Tienda()
    {
        $id_tienda = $this->input->post('id_tienda');
        $data['resultados'] = $this->model->get_consulta_Mobiliario_Por_Id_Tienda($id_tienda);
        $data['tiendas'] = $this->model->get_consulta_Mobiliario_Por_Id_Tienda_Cabecero($id_tienda);
        $this->load->view('mobiliario/tbl_mob_id_tnd', $data);
    }
    function consulta_Mobiliario_Por_Id_Tienda_editable()
    {
        $id_tienda = $this->input->post('id_tienda');
        $data['resultados'] = $this->model->get_consulta_Mobiliario_Por_Id_Tienda_editable($id_tienda);
        $data['tiendas'] = $this->model->get_consulta_Mobiliario_Por_Id_Tienda_Cabecero($id_tienda);
        $this->load->view('mobiliario/tbl_mob_id_tnd_edit', $data);
    }
    function actualiza_datos_consulta_Mobiliario_Por_Id_Tienda()
    {
        $id_producto_upt = $this->input->post('id_producto_upt');
        $valor_producto_upt = $this->input->post('valor_producto_upt');
        $this->model->get_actualiza_datos_consulta_Mobiliario_Por_Id_Tienda($id_producto_upt, $valor_producto_upt);
    }
    function consulta_Mobiliario_Por_Anio_Tienda()
    {
        $anio = $this->input->post('anio');
        $results = $this->model->get_consulta_Mobiliario_Por_Anio_Tienda($anio);
        $ids = array();
        foreach ($results as $row) {
            $ids[] = $row->id;
        }
        $idString = implode(',', $ids);
        header('Content-Type: application/json');
        echo json_encode($idString);
    }
    function consulta_Mobiliario_Por_Anio_Tienda_info()
    {
        $resultadoInput = $this->input->post('resultadoInput');
        $data['resultados'] = $this->model->get_consulta_Mobiliario_Por_Anio_Tienda_info($resultadoInput);
        $data['tiendas'] = $this->model->get_consulta_Mobiliario_Por_Id_Tienda_Cabecero_info($resultadoInput);
        $this->load->view('mobiliario/tbl_mob_anio_tnd_info', $data);
    }
    function consulta_Mobiliario_Por_Anio_And_Id_Tienda()
    {
        $id_tienda = $this->input->post('id_tienda');
        $anio = $this->input->post('anio');
        $data['resultados'] = $this->model->get_consulta_Mobiliario_Por_Anio_And_Id_Tienda($id_tienda, $anio);
        $data['tiendas'] = $this->model->get_consulta_Mobiliario_Por_Anio_And_Id_Tienda_Cabecero($id_tienda, $anio);
        $this->load->view('mobiliario/tbl_mob_anio_and_id_tnd', $data);
    }
    function consulta_Tiendas_Por_anio_Select_Box()
    {
        $anio = $this->input->post('anio');
        $data['tiendas'] = $this->model->get_consulta_Tiendas_Por_anio_Select_Box($anio);
        $this->load->view('mobiliario/tnd_x_anios', $data);
    }

    function consulta_verificar_ordenes_existentes()
    {
        $response = $this->model->get_consulta_verificar_ordenes_existentes();
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function consulta_imprime_ordenes_existentes()
    {
        //$input_array_ordenes = $this->input->post('input_array_ordenes');

        //obtenemos los registros de la consulta
        $response_ordenes_existentes = $this->model->get_consulta_verificar_ordenes_existentes();
        if ($response_ordenes_existentes) {
            //los guardamos en un arreglo separado por comas: ejemplo (564,765,653); en la variable $input_array_ordenes
            $ids = array();
            foreach ($response_ordenes_existentes as $registro) {
                $ids[] = $registro['idtienda'];
            }
            $input_array_ordenes = implode(',', $ids);
            $data['resultados'] = $this->model->get_consulta_imprime_ordenes_existentes($input_array_ordenes);
            $data['products_length'] = $this->model->productosMobiliarioFull();
            $this->load->view('mobiliario/tbl_ordenes_existentes', $data);
        } else {
            $input_array_ordenes = 0;
            $data['resultados'] = $this->model->get_consulta_imprime_ordenes_existentes($input_array_ordenes);
            $data['products_length'] = $this->model->productosMobiliarioFull();
            $this->load->view('mobiliario/tbl_ordenes_existentes', $data);
        }
    }
    function consulta_piezas_rel_prod_tnd()
    {
        $data_id_prod = $this->input->post('data_id_prod');
        $data_name_tnd = $this->input->post('data_name_tnd');
        $response = $this->model->get_consulta_piezas_rel_prod_tnd($data_id_prod, $data_name_tnd);
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    /*1.0 MUESTRA TOTAL PIEZAS ENTRADA POR TIENDA*/
    function imprimesumatotalent()
    {
        $data2 = $this->input->post();
        $data = array(
            'nombre' => $data2['nombreent'],
            'tienda' => $data2['tiendaent'],
        );
        $resultado = $this->model->getimprimesumatotalv2($data);
        echo $resultado[0]->pieza;
    }
    /*2.0 MUESTRA TOTAL PIEZAS DAMA Y CABALLERO POR TIENDA*/
    function imprimesumatotalmpdc()
    {
        $data2 = $this->input->post();
        $data = array(
            'nombre' => $data2['nombrempdc'],
            'tienda' => $data2['tiendampdc'],
        );
        $resultado = $this->model->getimprimesumatotalv2($data);
        echo $resultado[0]->pieza;
    }
    /*3.0 MUESTRA TOTAL PIEZAS MUJER HOMBRE JR POR TIENDA*/
    function imprimesumatotalmpmhj()
    {
        $data2 = $this->input->post();
        $data = array(
            'nombre' => $data2['nombrempmhj'],
            'tienda' => $data2['tiendampmhj'],
        );
        $resultado = $this->model->getimprimesumatotalv2($data);
        echo $resultado[0]->pieza;
    }
    /*4.0 MUESTRA TOTAL PIEZAS INTERIOR MUJER POR TIENDA*/
    function imprimesumatotalmpim()
    {
        $data2 = $this->input->post();
        $data = array(
            'nombre' => $data2['nombrempim'],
            'tienda' => $data2['tiendampim'],
        );
        $resultado = $this->model->getimprimesumatotalv2($data);
        echo $resultado[0]->pieza;
    }
    /*5.0 MUESTRA TOTAL PIEZAS INFANTIL NIÑO Y NIÑA POR TIENDA*/
    function imprimesumatotalmpinn()
    {
        $data2 = $this->input->post();
        $data = array(
            'nombre' => $data2['nombrempinn'],
            'tienda' => $data2['tiendampinn'],
        );
        $resultado = $this->model->getimprimesumatotalv2($data);
        echo $resultado[0]->pieza;
    }
    /*6.0 MUESTRA TOTAL PIEZAS TODDLER NIÑO NIÑA Y BEBES POR TIENDA*/
    function imprimesumatotalmptnnb()
    {
        $data2 = $this->input->post();
        $data = array(
            'nombre' => $data2['nombremptnnb'],
            'tienda' => $data2['tiendamptnnb'],
        );
        $resultado = $this->model->getimprimesumatotalv2($data);
        echo $resultado[0]->pieza;
    }
    /*7.0 MUESTRA TOTAL PIEZAS HERRAJES POR TIENDA*/
    function imprimesumatotalmph()
    {
        $data2 = $this->input->post();
        $data = array(
            'nombre' => $data2['nombremph'],
            'tienda' => $data2['tiendamph'],
        );
        $resultado = $this->model->getimprimesumatotalv2($data);
        echo $resultado[0]->pieza;
    }
    /*8.0 MUESTRA TOTAL PIEZAS PROBADORES POR TIENDA*/
    function imprimesumatotalmppr()
    {
        $data2 = $this->input->post();
        $data = array(
            'nombre' => $data2['nombremppr'],
            'tienda' => $data2['tiendamppr'],
        );
        $resultado = $this->model->getimprimesumatotalv2($data);
        echo $resultado[0]->pieza;
    }
    /*9.0 MUESTRA TOTAL PIEZAS PANELES POR TIENDA*/
    function imprimesumatotalmppn()
    {
        $data2 = $this->input->post();
        $data = array(
            'nombre' => $data2['nombremppn'],
            'tienda' => $data2['tiendamppn'],
        );
        $resultado = $this->model->getimprimesumatotalv2($data);
        echo $resultado[0]->pieza;
    }
    /*10.0 MUESTRA TOTAL PIEZAS EXTRAS POR TIENDA*/
    function imprimesumatotalmpex()
    {
        $data2 = $this->input->post();
        $data = array(
            'nombre' => $data2['nombrempex'],
            'tienda' => $data2['tiendampex'],
        );
        $resultado = $this->model->getimprimesumatotalv2($data);
        echo $resultado[0]->pieza;
    }
    /*11.0 MUESTRA TOTAL PIEZAS IMAGEN POR TIENDA*/
    function imprimesumatotalmpin()
    {
        $data2 = $this->input->post();
        $data = array(
            'nombre' => $data2['nombrempin'],
            'tienda' => $data2['tiendampin'],
        );
        $resultado = $this->model->getimprimesumatotalv2($data);
        echo $resultado[0]->pieza;
    }
    /*12.0 MUESTRA TOTAL PIEZAS OTROS POR TIENDA*/
    function imprimesumatotalmpo()
    {
        $data2 = $this->input->post();
        $data = array(
            'nombre' => $data2['nombrempo'],
            'tienda' => $data2['tiendampo'],
        );
        $resultado = $this->model->getimprimesumatotalv2($data);
        echo $resultado[0]->pieza;
    }







    function consultaCompraYRestableceInventario()
    {
        $this->model->reiniciaInventario($_POST['idproducto']);
    }



    /*TRAER PRODUCTOS FINALIZA*/



    function Carrito()
    {
        $data['productos'] = $this->model->getVentaroductos($_SESSION['curso']);
        $this->loadViews("carrito", $data);
    }
    function eliminarAlumno()
    {
        if ($_POST['idalumno']) {
            $this->model->deleteAlumno($_POST['idalumno']);
        }
    }
    function eliminarProducto()
    {
        if ($_POST['idproducto']) {
            $this->model->deleteProducto($_POST['idproducto']);
            $this->model->deleteProductoSkus($_POST['idproducto']);
        }
    }
    function eliminarProveedor()
    {
        $this->model->deleteProveedor($_POST['idproveedor']);
        //redirect('Dashboard/administrarproveedores');
    }
    function eliminarNombre()
    {
        $this->model->deleteNombre($_POST['idnombre']);
        //redirect('Dashboard/administrarnombresusuario');
    }
    function eliminarTiendas()
    {
        $this->model->deleteTiendas($_POST['idtiendas']);
        //redirect('Dashboard/administrartiendas');
    }
    function enviarPapelera()
    {
        $this->model->moverPapelera($_POST['idproducto']);
    }
    function enviarPapelera2()
    {
        $this->model->moverPapelera2($_POST['id_orden_pedido']);
    }
    function enviarPapeleraProv()
    {
        $this->model->moverPapeleraProv($_POST['idproducto']);
    }
    function enviarPapeleraPorOrdenCompra()
    {
        $this->model->moverPapeleraPorOrdenCompra($_POST['idproducto']);
    }
    function enviarPapeleraPorOrdenCompraPdnt()
    {
        $this->model->moverPapeleraPorOrdenCompraPdnt($_POST['id_orden_pedido_pdnt']);
    }
    function recuperarPapelera()
    {
        $this->model->traerPapelera($_POST['idproducto']);
    }
    function recuperarPapelera2()
    {
        $this->model->traerPapelera2($_POST['idproducto']);
    }
    function recuperarPapeleraProv()
    {
        $this->model->traerPapeleraProv($_POST['idproducto']);
    }
    function recuperarPapeleraPorOrdenCompraPdnt()
    {
        $this->model->traerPapeleraPorOrdenCompraPdnt($_POST['id_orden_pedido_pdnt']);
    }
    function agregarCarro()
    {
        $this->model->agregarCarrito($_POST['idproducto']);
    }

    function generameCompra()
    {
        $this->model->MuestrameCompra();
    }

    function regresar_a_pendientes()
    {
        $numordencompra = $this->input->post('numordencompra');
        $ordenpendiente = $this->input->post('ordenpendiente');
        $tienda = $this->input->post('tienda');
        $data = array(
            "numordencompra" => $numordencompra,
            "ordenpendiente" => $ordenpendiente,
            "tienda" => $tienda
        );
        $success_prods = $this->model->get_regresa_productos_a_temporales($data);
        $success_cabs = $this->model->get_regresa_cabeceros_a_temporales($data);
        $success_detalle = $this->model->get_regresa_detalle_a_temporales($data);
        $success_tienda_status = $this->model->get_regresa_status_tienda($data);
        try {
            if ($success_prods && $success_cabs && $success_detalle && $success_tienda_status) {
                $this->eliminar_compra_permanente_regresa_temporales($numordencompra);
                echo ('eliminado correctamente');
            } else {
                echo ('no se pudo eliminar de detalle compras');
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function actualizarProductoActivo()
    {
        if ($_POST['idproducto']) {
            $this->session->set_flashdata('statusOn', 'El Status del producto ha cambiado a ACTIVO');
            $this->model->updateProductoActivo($_POST['idproducto']);
            redirect(base_url() . "Dashboard", "location");
        }
    }
    function actualizarProductoInactivo()
    {
        if ($_POST['idproducto']) {
            $this->session->set_flashdata('statusOff', 'El Status del producto ha cambiado a INACTIVO');
            $this->model->updateProductoInactivo($_POST['idproducto']);
            redirect(base_url() . "Dashboard", "location");
        }
    }
    function detallemisproductos()
    {
        if (isset($_POST['updateactivo'])) {
            if (!empty($this->input->post('checkbox_value'))) {
                $checkedActivo = $this->input->post('checkbox_value');
                $checked_id1 = [];
                foreach ($checkedActivo as $row) {
                    array_push($checked_id1, $row);
                }
                $this->model->updateProductoActivo2($checked_id1);
                redirect('Dashboard/misProductos');
            } else {
                $this->session->set_flashdata('statusWithOut', 'Seleccione al menos una fila');
                redirect('Dashboard/misProductos');
            }
        }
    }
    function actualizarCantidad()
    {
        if ($_POST['idproducto']) {
            $this->session->set_flashdata('Carrito', ' Producto agregado Al carrito!');
            $this->model->asigarCantidad($_POST['idproducto']);
            redirect(base_url() . "Dashboard", "location");
        }
    }
    function gestionAlumnos()
    {
        $data['alumnos'] = $this->model->getAlumnos();
        $this->loadViews("gestionalumnos", $data);
    }

    function actualizarSubtotales()
    {

        //actualiza entrada
        $data4 = array(
            //recibe y guarda en una variable nueva los arreglos previamente definidos en la vista medinte el post siempre y cuando esten posteados
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['ident'],
            'precio' => $_POST['precioent'],
            'pieza' => $_POST['piezaent'],
            'subtotal' => $_POST['subtotalent'],
            'observaciones' => $_POST['observacionesent'],
            'color' => $_POST['color_ent_'],
            'statusreproceso' => $_POST['reprocesstatusent'],
            'sku' => $_POST['sku_ent'],
        );
        $this->model->getguardarCambiosCompraEntrada($data4);
        //actualiza dama y caballero piso
        $data5 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['iddcmpi'],
            'precio' => $_POST['preciodcmpi'],
            'pieza' => $_POST['piezadcmpi'],
            'subtotal' => $_POST['subtotaldcmpi'],
            'observaciones' => $_POST['observacionesdcmpi'],
            'color' => $_POST['color_dcmpi_'],
            'statusreproceso' => $_POST['reprocesstatusdcmpi'],
            'sku' => $_POST['sku_dcmpi'],
        );
        $this->model->getguardarCambiosCompraDamaYCaballeroPiso($data5);
        //actualiza dama y caballero perimetral
        $data6 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['iddcmpe'],
            'precio' => $_POST['preciodcmpe'],
            'pieza' => $_POST['piezadcmpe'],
            'subtotal' => $_POST['subtotaldcmpe'],
            'observaciones' => $_POST['observacionesdcmpe'],
            'color' => $_POST['color_dcmpe_'],
            'statusreproceso' => $_POST['reprocesstatusdcmpe'],
            'sku' => $_POST['sku_dcmpe'],
        );
        $this->model->getguardarCambiosCompraDamaYCaballeroPerimetral($data6);
        //actualiza mujer hombre jr piso
        $data7 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idmhjmpi'],
            'precio' => $_POST['preciomhjmpi'],
            'pieza' => $_POST['piezamhjmpi'],
            'subtotal' => $_POST['subtotalmhjmpi'],
            'observaciones' => $_POST['observacionesmhjmpi'],
            'color' => $_POST['color_mhjmpi_'],
            'statusreproceso' => $_POST['reprocesstatusmhjmpi'],
            'sku' => $_POST['sku_mhjmpi'],
        );
        $this->model->getguardarCambiosCompraMujerHombreJrPiso($data7);
        //actualiza mujer hombre jr perimetral
        $data8 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idmhjmpe'],
            'precio' => $_POST['preciomhjmpe'],
            'pieza' => $_POST['piezamhjmpe'],
            'subtotal' => $_POST['subtotalmhjmpe'],
            'observaciones' => $_POST['observacionesmhjmpe'],
            'color' => $_POST['color_mhjmpe_'],
            'statusreproceso' => $_POST['reprocesstatusmhjmpe'],
            'sku' => $_POST['sku_mhjmpe'],
        );
        $this->model->getguardarCambiosCompraMujerHombreJrPerimetral($data8);
        //actualiza mujer hombre jr jeans
        $data9 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idmhjmpje'],
            'precio' => $_POST['preciomhjmpje'],
            'pieza' => $_POST['piezamhjmpje'],
            'subtotal' => $_POST['subtotalmhjmpje'],
            'observaciones' => $_POST['observacionesmhjmpje'],
            'color' => $_POST['color_mhjmpje_'],
            'statusreproceso' => $_POST['reprocesstatusmhjmpje'],
            'sku' => $_POST['sku_mhjmpje'],
        );
        $this->model->getguardarCambiosCompraMujerHombreJrJeans($data9);
        //actualiza mujer hombre jr licencias
        $data10 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idmhjmpli'],
            'precio' => $_POST['preciomhjmpli'],
            'pieza' => $_POST['piezamhjmpli'],
            'subtotal' => $_POST['subtotalmhjmpli'],
            'observaciones' => $_POST['observacionesmhjmpli'],
            'color' => $_POST['color_mhjmpli_'],
            'statusreproceso' => $_POST['reprocesstatusmhjmpli'],
            'sku' => $_POST['sku_mhjmpli'],
        );
        $this->model->getguardarCambiosCompraMujerHombreJrLicencias($data10);
        //actualiza interior mujer piso
        $data11 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idimpi'],
            'precio' => $_POST['precioimpi'],
            'pieza' => $_POST['piezaimpi'],
            'subtotal' => $_POST['subtotalimpi'],
            'observaciones' => $_POST['observacionesimpi'],
            'color' => $_POST['color_impi_'],
            'statusreproceso' => $_POST['reprocesstatusimpi'],
            'sku' => $_POST['sku_impi'],
        );
        $this->model->getguardarCambiosCompraInteriorMujerPiso($data11);
        //actualiza interior mujer perimetral
        $data12 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idimpe'],
            'precio' => $_POST['precioimpe'],
            'pieza' => $_POST['piezaimpe'],
            'subtotal' => $_POST['subtotalimpe'],
            'observaciones' => $_POST['observacionesimpe'],
            'color' => $_POST['color_impe_'],
            'statusreproceso' => $_POST['reprocesstatusimpe'],
            'sku' => $_POST['sku_impe'],
        );
        $this->model->getguardarCambiosCompraInteriorMujerPerimetral($data12);
        //actualiza interior mujer herraje
        $data13 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idimhe'],
            'precio' => $_POST['precioimhe'],
            'pieza' => $_POST['piezaimhe'],
            'subtotal' => $_POST['subtotalimhe'],
            'observaciones' => $_POST['observacionesimhe'],
            'color' => $_POST['color_imhe_'],
            'statusreproceso' => $_POST['reprocesstatusimhe'],
            'sku' => $_POST['sku_imhe'],
        );
        $this->model->getguardarCambiosCompraInteriorMujerHerraje($data13);
        //actualiza infantil niño y niña piso
        $data14 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idinnpi'],
            'precio' => $_POST['precioinnpi'],
            'pieza' => $_POST['piezainnpi'],
            'subtotal' => $_POST['subtotalinnpi'],
            'observaciones' => $_POST['observacionesinnpi'],
            'color' => $_POST['color_innpi_'],
            'statusreproceso' => $_POST['reprocesstatusinnpi'],
            'sku' => $_POST['sku_innpi'],
        );
        $this->model->getguardarCambiosCompraInfantilNiñoYNiñaPiso($data14);
        //actualiza infantil niño y niña perimetral
        $data15 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idinnpe'],
            'precio' => $_POST['precioinnpe'],
            'pieza' => $_POST['piezainnpe'],
            'subtotal' => $_POST['subtotalinnpe'],
            'observaciones' => $_POST['observacionesinnpe'],
            'color' => $_POST['color_innpe_'],
            'statusreproceso' => $_POST['reprocesstatusinnpe'],
            'sku' => $_POST['sku_innpe'],
        );
        $this->model->getguardarCambiosCompraInfantilNiñoYNiñaPerimetral($data15);
        //actualiza toddler niño niña y bebes piso
        $data16 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idtnnbpi'],
            'precio' => $_POST['preciotnnbpi'],
            'pieza' => $_POST['piezatnnbpi'],
            'subtotal' => $_POST['subtotaltnnbpi'],
            'observaciones' => $_POST['observacionestnnbpi'],
            'color' => $_POST['color_tnnbpi_'],
            'statusreproceso' => $_POST['reprocesstatustnnbpi'],
            'sku' => $_POST['sku_tnnbpi'],
        );
        $this->model->getguardarCambiosCompraToddlerNiñoNiñaYBebesPiso($data16);
        //actualiza toddler niño niña y bebes perimetral
        $data17 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idtnnbpe'],
            'precio' => $_POST['preciotnnbpe'],
            'pieza' => $_POST['piezatnnbpe'],
            'subtotal' => $_POST['subtotaltnnbpe'],
            'observaciones' => $_POST['observacionestnnbpe'],
            'color' => $_POST['color_tnnbpe_'],
            'statusreproceso' => $_POST['reprocesstatustnnbpe'],
            'sku' => $_POST['sku_tnnbpe'],
        );
        $this->model->getguardarCambiosCompraToddlerNiñoNiñaYBebesPerimetral($data17);
        //actualiza herrajes
        $data18 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idherna'],
            'precio' => $_POST['precioherna'],
            'pieza' => $_POST['piezaherna'],
            'subtotal' => $_POST['subtotalherna'],
            'observaciones' => $_POST['observacionesherna'],
            'color' => $_POST['color_herna_'],
            'statusreproceso' => $_POST['reprocesstatusherna'],
            'sku' => $_POST['sku_herna'],
        );
        $this->model->getguardarCambiosCompraHerraje($data18);
        //actualiza proadores piso
        $data19 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idprobmpi'],
            'precio' => $_POST['precioprobmpi'],
            'pieza' => $_POST['piezaprobmpi'],
            'subtotal' => $_POST['subtotalprobmpi'],
            'observaciones' => $_POST['observacionesprobmpi'],
            'color' => $_POST['color_probmpi_'],
            'statusreproceso' => $_POST['reprocesstatusprobmpi'],
            'sku' => $_POST['sku_probmpi'],
        );
        $this->model->getguardarCambiosCompraProbadoresPiso($data19);
        //actualiza paneles piso
        $data20 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idpanmpi'],
            'precio' => $_POST['preciopanmpi'],
            'pieza' => $_POST['piezapanmpi'],
            'subtotal' => $_POST['subtotalpanmpi'],
            'observaciones' => $_POST['observacionespanmpi'],
            'color' => $_POST['color_panmpi_'],
            'statusreproceso' => $_POST['reprocesstatuspanmpi'],
            'sku' => $_POST['sku_panmpi'],
        );
        $this->model->getguardarCambiosCompraPanelesPiso($data20);
        //actualiza extras piso
        $data21 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idextmpi'],
            'precio' => $_POST['precioextmpi'],
            'pieza' => $_POST['piezaextmpi'],
            'subtotal' => $_POST['subtotalextmpi'],
            'observaciones' => $_POST['observacionesextmpi'],
            'color' => $_POST['color_extmpi_'],
            'statusreproceso' => $_POST['reprocesstatusextmpi'],
            'sku' => $_POST['sku_extmpi'],
        );
        $this->model->getguardarCambiosCompraExtrasPiso($data21);
        //actualiza imagen pop
        $data22 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idimgp'],
            'precio' => $_POST['precioimgp'],
            'pieza' => $_POST['piezaimgp'],
            'subtotal' => $_POST['subtotalimgp'],
            'observaciones' => $_POST['observacionesimgp'],
            'color' => $_POST['color_imgp_'],
            'statusreproceso' => $_POST['reprocesstatusimgp'],
            'sku' => $_POST['sku_imgp'],
        );
        $this->model->getguardarCambiosCompraImagenPop($data22);
        //actualiza imagen maniquis
        $data23 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idimgm'],
            'precio' => $_POST['precioimgm'],
            'pieza' => $_POST['piezaimgm'],
            'subtotal' => $_POST['subtotalimgm'],
            'observaciones' => $_POST['observacionesimgm'],
            'color' => $_POST['color_imgm_'],
            'statusreproceso' => $_POST['reprocesstatusimgm'],
            'sku' => $_POST['sku_imgm'],
        );
        $this->model->getguardarCambiosCompraImagenManiquis($data23);
        //actualiza otros no aplica
        $data24 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idots'],
            'precio' => $_POST['precioots'],
            'pieza' => $_POST['piezaots'],
            'subtotal' => $_POST['subtotalots'],
            'observaciones' => $_POST['observacionesots'],
            'color' => $_POST['color_ots_'],
            'statusreproceso' => $_POST['reprocesstatusots'],
            'sku' => $_POST['sku_ots'],
        );
        $this->model->getguardarCambiosCompraOtrosNoAplica($data24);




        $data = array(
            'numordencompra' => $_POST['numordenfinal'],
            'finalent' => $_POST['finalent'],
            'finaldcmpi' => $_POST['finaldcmpi'],
            'finaldcmpe' => $_POST['finaldcmpe'],
            'finalmhjmpi' => $_POST['finalmhjmpi'],
            'finalmhjmpe' => $_POST['finalmhjmpe'],
            'finalmhjmpje' => $_POST['finalmhjmpje'],
            'finalmhjmpli' => $_POST['finalmhjmpli'],
            'finalimpi' => $_POST['finalimpi'],
            'finalimpe' => $_POST['finalimpe'],
            'finalimhe' => $_POST['finalimhe'],
            'finalinnpi' => $_POST['finalinnpi'],
            'finalinnpe' => $_POST['finalinnpe'],
            'finaltnnbpi' => $_POST['finaltnnbpi'],
            'finaltnnbpe' => $_POST['finaltnnbpe'],
            'finalherna' => $_POST['finalherna'],
            'finalprobmpi' => $_POST['finalprobmpi'],
            'finalpanmpi' => $_POST['finalpanmpi'],
            'finalextmpi' => $_POST['finalextmpi'],
            'finalimgp' => $_POST['finalimgp'],
            'finalimgm' => $_POST['finalimgm'],
            'finalots' => $_POST['finalots'],
        );
        $this->model->getActualizaSubtotales($data);
        $data2 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'totalmuebles' => $_POST['totalmuebles'],
            'totalherrajes' => $_POST['totalherrajes'],
            'totalextras' => $_POST['totalextras'],
            'totalpop' => $_POST['totalpop'],
            'totalmaniquis' => $_POST['totalmaniquis'],
            'totalotros' => $_POST['totalotros'],
            'totalmueblesherrajesextrasinstalacionytransportepopmaniquis' => $_POST['totalmueblesherrajesextrasinstalacionytransportepopmaniquis'],
            'totalmueblesherrajesextras' => $_POST['totalmueblesherrajesextras'],
            'totalentrevalorantespreciototalv1' => $_POST['totalentrevalorantespreciototalv1'],
            'totalentrevalorantespreciototal2v2' => $_POST['totalentrevalorantespreciototal2v2'],
            'porcentajemuebles' => $_POST['porcentajemuebles'],
            'porcentajeherrajes' => $_POST['porcentajeherrajes'],
            'porcentajextras' => $_POST['porcentajextras'],
            'porcentajeinstalacionytransporte' => $_POST['porcentajeinstalacionytransporte'],
            'porcentajepop' => $_POST['porcentajepop'],
            'porcentajemaniquis' => $_POST['porcentajemaniquis'],
            'porcentajeotros' => $_POST['porcentajeotros'],
            'm2' => $_POST['valorantespreciototal'],
            'fecha_entrega' => $_POST['fecha_entrega'],
        );
        $this->model->getActualizaCentrocostos($data2);
        $data3 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'totalmueblesherrajesextrasinstalacionytransportepopmaniquis3' => $_POST['totalmueblesherrajesextrasinstalacionytransportepopmaniquis3'],
            'anticipo' => $_POST['anticipo'],
            'totalconiva' => $_POST['totalconiva'],
            'anticipoconiva' => $_POST['anticipoconiva'],
            'totaltiendav2' => $_POST['totaltiendav2'],
            'totaltiendaanticipov2' => $_POST['totaltiendaanticipov2'],
            'm2tiendafinalv2' => $_POST['m2tiendafinalv2'],
            'finiquitov2' => $_POST['finiquitov2'],
            'm2' => $_POST['mismom2inicio'],
            'preciofinal' => $_POST['totalmueblesherrajesextrasinstalacionytransportepopmaniquis2'],
        );
        $this->model->getActualizaCentrocostosFinal($data3);

        $numordenfinal = $this->input->post("numordenfinal");
        $usernamecons = $this->input->post("usernamecons");
        $tienda_name_updt = $this->input->post("tienda_name_updt");
        $dataredirect['numordenfinal'] = $numordenfinal;
        $dataredirect['usernamecons'] = $usernamecons;
        $dataredirect['tienda_name_updt'] = $tienda_name_updt;

        $this->loadViews("regresadetalleupdatecte", $dataredirect);
    }

    function actualizarSubtotales2()
    {
        $data4 = array(
            //recibe y guarda en una variable nueva los arreglos previamente definidos en la vista medinte el post siempre y cuando esten posteados
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['ident'],
            'precio' => $_POST['precioent'],
            'pieza' => $_POST['piezaent'],
            'subtotal' => $_POST['subtotalent'],
            'observaciones' => $_POST['observacionesent'],
            'color' => $_POST['color_ent_'],
            'statusreproceso' => $_POST['reprocesstatusent'],
            'sku' => $_POST['sku_ent'],
        );
        $this->model->getguardarCambiosCompraEntrada2($data4);
        $data5 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['iddcmpi'],
            'precio' => $_POST['preciodcmpi'],
            'pieza' => $_POST['piezadcmpi'],
            'subtotal' => $_POST['subtotaldcmpi'],
            'observaciones' => $_POST['observacionesdcmpi'],
            'color' => $_POST['color_dcmpi_'],
            'statusreproceso' => $_POST['reprocesstatusdcmpi'],
            'sku' => $_POST['sku_dcmpi'],
        );
        $this->model->getguardarCambiosCompraDamaYCaballeroPiso2($data5);
        //actualiza dama y caballero perimetral
        $data6 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['iddcmpe'],
            'precio' => $_POST['preciodcmpe'],
            'pieza' => $_POST['piezadcmpe'],
            'subtotal' => $_POST['subtotaldcmpe'],
            'observaciones' => $_POST['observacionesdcmpe'],
            'color' => $_POST['color_dcmpe_'],
            'statusreproceso' => $_POST['reprocesstatusdcmpe'],
            'sku' => $_POST['sku_dcmpe'],
        );
        $this->model->getguardarCambiosCompraDamaYCaballeroPerimetral2($data6);
        //actualiza mujer hombre jr piso
        $data7 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idmhjmpi'],
            'precio' => $_POST['preciomhjmpi'],
            'pieza' => $_POST['piezamhjmpi'],
            'subtotal' => $_POST['subtotalmhjmpi'],
            'observaciones' => $_POST['observacionesmhjmpi'],
            'color' => $_POST['color_mhjmpi_'],
            'statusreproceso' => $_POST['reprocesstatusmhjmpi'],
            'sku' => $_POST['sku_mhjmpi'],
        );
        $this->model->getguardarCambiosCompraMujerHombreJrPiso2($data7);
        //actualiza mujer hombre jr perimetral
        $data8 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idmhjmpe'],
            'precio' => $_POST['preciomhjmpe'],
            'pieza' => $_POST['piezamhjmpe'],
            'subtotal' => $_POST['subtotalmhjmpe'],
            'observaciones' => $_POST['observacionesmhjmpe'],
            'color' => $_POST['color_mhjmpe_'],
            'statusreproceso' => $_POST['reprocesstatusmhjmpe'],
            'sku' => $_POST['sku_mhjmpe'],
        );
        $this->model->getguardarCambiosCompraMujerHombreJrPerimetral2($data8);
        //actualiza mujer hombre jr jeans
        $data9 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idmhjmpje'],
            'precio' => $_POST['preciomhjmpje'],
            'pieza' => $_POST['piezamhjmpje'],
            'subtotal' => $_POST['subtotalmhjmpje'],
            'observaciones' => $_POST['observacionesmhjmpje'],
            'color' => $_POST['color_mhjmpje_'],
            'statusreproceso' => $_POST['reprocesstatusmhjmpje'],
            'sku' => $_POST['sku_mhjmpje'],
        );
        $this->model->getguardarCambiosCompraMujerHombreJrJeans2($data9);
        //actualiza mujer hombre jr licencias
        $data10 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idmhjmpli'],
            'precio' => $_POST['preciomhjmpli'],
            'pieza' => $_POST['piezamhjmpli'],
            'subtotal' => $_POST['subtotalmhjmpli'],
            'observaciones' => $_POST['observacionesmhjmpli'],
            'color' => $_POST['color_mhjmpli_'],
            'statusreproceso' => $_POST['reprocesstatusmhjmpli'],
            'sku' => $_POST['sku_mhjmpli'],
        );
        $this->model->getguardarCambiosCompraMujerHombreJrLicencias2($data10);
        //actualiza interior mujer piso
        $data11 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idimpi'],
            'precio' => $_POST['precioimpi'],
            'pieza' => $_POST['piezaimpi'],
            'subtotal' => $_POST['subtotalimpi'],
            'observaciones' => $_POST['observacionesimpi'],
            'color' => $_POST['color_impi_'],
            'statusreproceso' => $_POST['reprocesstatusimpi'],
            'sku' => $_POST['sku_impi'],
        );
        $this->model->getguardarCambiosCompraInteriorMujerPiso2($data11);
        //actualiza interior mujer perimetral
        $data12 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idimpe'],
            'precio' => $_POST['precioimpe'],
            'pieza' => $_POST['piezaimpe'],
            'subtotal' => $_POST['subtotalimpe'],
            'observaciones' => $_POST['observacionesimpe'],
            'color' => $_POST['color_impe_'],
            'statusreproceso' => $_POST['reprocesstatusimpe'],
            'sku' => $_POST['sku_impe'],
        );
        $this->model->getguardarCambiosCompraInteriorMujerPerimetral2($data12);
        //actualiza interior mujer herraje
        $data13 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idimhe'],
            'precio' => $_POST['precioimhe'],
            'pieza' => $_POST['piezaimhe'],
            'subtotal' => $_POST['subtotalimhe'],
            'observaciones' => $_POST['observacionesimhe'],
            'color' => $_POST['color_imhe_'],
            'statusreproceso' => $_POST['reprocesstatusimhe'],
            'sku' => $_POST['sku_imhe'],
        );
        $this->model->getguardarCambiosCompraInteriorMujerHerraje2($data13);
        //actualiza infantil niño y niña piso
        $data14 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idinnpi'],
            'precio' => $_POST['precioinnpi'],
            'pieza' => $_POST['piezainnpi'],
            'subtotal' => $_POST['subtotalinnpi'],
            'observaciones' => $_POST['observacionesinnpi'],
            'color' => $_POST['color_innpi_'],
            'statusreproceso' => $_POST['reprocesstatusinnpi'],
            'sku' => $_POST['sku_innpi'],
        );
        $this->model->getguardarCambiosCompraInfantilNiñoYNiñaPiso2($data14);
        //actualiza infantil niño y niña perimetral
        $data15 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idinnpe'],
            'precio' => $_POST['precioinnpe'],
            'pieza' => $_POST['piezainnpe'],
            'subtotal' => $_POST['subtotalinnpe'],
            'observaciones' => $_POST['observacionesinnpe'],
            'color' => $_POST['color_innpe_'],
            'statusreproceso' => $_POST['reprocesstatusinnpe'],
            'sku' => $_POST['sku_innpe'],
        );
        $this->model->getguardarCambiosCompraInfantilNiñoYNiñaPerimetral2($data15);
        //actualiza toddler niño niña y bebes piso
        $data16 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idtnnbpi'],
            'precio' => $_POST['preciotnnbpi'],
            'pieza' => $_POST['piezatnnbpi'],
            'subtotal' => $_POST['subtotaltnnbpi'],
            'observaciones' => $_POST['observacionestnnbpi'],
            'color' => $_POST['color_tnnbpi_'],
            'statusreproceso' => $_POST['reprocesstatustnnbpi'],
            'sku' => $_POST['sku_tnnbpi'],
        );
        $this->model->getguardarCambiosCompraToddlerNiñoNiñaYBebesPiso2($data16);
        //actualiza toddler niño niña y bebes perimetral
        $data17 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idtnnbpe'],
            'precio' => $_POST['preciotnnbpe'],
            'pieza' => $_POST['piezatnnbpe'],
            'subtotal' => $_POST['subtotaltnnbpe'],
            'observaciones' => $_POST['observacionestnnbpe'],
            'color' => $_POST['color_tnnbpe_'],
            'statusreproceso' => $_POST['reprocesstatustnnbpe'],
            'sku' => $_POST['sku_tnnbpe'],
        );
        $this->model->getguardarCambiosCompraToddlerNiñoNiñaYBebesPerimetral2($data17);
        //actualiza herrajes
        $data18 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idherna'],
            'precio' => $_POST['precioherna'],
            'pieza' => $_POST['piezaherna'],
            'subtotal' => $_POST['subtotalherna'],
            'observaciones' => $_POST['observacionesherna'],
            'color' => $_POST['color_herna_'],
            'statusreproceso' => $_POST['reprocesstatusherna'],
            'sku' => $_POST['sku_herna'],
        );
        $this->model->getguardarCambiosCompraHerraje2($data18);
        //actualiza proadores piso
        $data19 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idprobmpi'],
            'precio' => $_POST['precioprobmpi'],
            'pieza' => $_POST['piezaprobmpi'],
            'subtotal' => $_POST['subtotalprobmpi'],
            'observaciones' => $_POST['observacionesprobmpi'],
            'color' => $_POST['color_probmpi_'],
            'statusreproceso' => $_POST['reprocesstatusprobmpi'],
            'sku' => $_POST['sku_probmpi'],
        );
        $this->model->getguardarCambiosCompraProbadoresPiso2($data19);
        //actualiza paneles piso
        $data20 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idpanmpi'],
            'precio' => $_POST['preciopanmpi'],
            'pieza' => $_POST['piezapanmpi'],
            'subtotal' => $_POST['subtotalpanmpi'],
            'observaciones' => $_POST['observacionespanmpi'],
            'color' => $_POST['color_panmpi_'],
            'statusreproceso' => $_POST['reprocesstatuspanmpi'],
            'sku' => $_POST['sku_panmpi'],
        );
        $this->model->getguardarCambiosCompraPanelesPiso2($data20);
        //actualiza extras piso
        /*$data21 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'id' => $_POST['idextmpi'],
            'precio' => $_POST['precioextmpi'],
            'pieza' => $_POST['piezaextmpi'],
            'subtotal' => $_POST['subtotalextmpi'],
            'observaciones' => $_POST['observacionesextmpi'],
        );
        $this->model->getguardarCambiosCompraExtrasPiso2($data21);*/
        $data1000 = array(
            'numerocompra' => $this->input->post('numordenfinal')
        );
        $data = array(
            'numordencompra' => $_POST['numordenfinal'],
            'finalent' => $_POST['finalent'],
            'finaldcmpi' => $_POST['finaldcmpi'],
            'finaldcmpe' => $_POST['finaldcmpe'],
            'finalmhjmpi' => $_POST['finalmhjmpi'],
            'finalmhjmpe' => $_POST['finalmhjmpe'],
            'finalmhjmpje' => $_POST['finalmhjmpje'],
            'finalmhjmpli' => $_POST['finalmhjmpli'],
            'finalimpi' => $_POST['finalimpi'],
            'finalimpe' => $_POST['finalimpe'],
            'finalimhe' => $_POST['finalimhe'],
            'finalinnpi' => $_POST['finalinnpi'],
            'finalinnpe' => $_POST['finalinnpe'],
            'finaltnnbpi' => $_POST['finaltnnbpi'],
            'finaltnnbpe' => $_POST['finaltnnbpe'],
            'finalherna' => $_POST['finalherna'],
            'finalprobmpi' => $_POST['finalprobmpi'],
            'finalpanmpi' => $_POST['finalpanmpi'],
            //'finalextmpi' => $_POST['finalextmpi'],
            //'finalextmpiprov' => $_POST['finalextmpiprov']
        );
        $this->model->getActualizaSubtotales2($data);
        $data2 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'totalmueblesprov' => $_POST['totalmuebles'],
            'porcentajemueblesprov' => $_POST['porcentajemuebles'],
            'totalherrajesprov' => $_POST['totalherrajes'],
            'porcentajeherrajesprov' => $_POST['porcentajeherrajes'],
            //'totalextrasprov' => $_POST['totalextras'],
            //'porcentajextrasprov' => $_POST['porcentajextras'],
            'totalmueblesherrajesextrasinstalacionytransportepopmaniquisprov' => $_POST['totalmueblesherrajesextrasinstalacionytransportepopmaniquis'],
            'totalmueblesherrajesextrasprov' => $_POST['totalmueblesherrajesextras'],
            'totalentrevalorantespreciototalv1prov' => $_POST['totalentrevalorantespreciototalv1'],
            'totalentrevalorantespreciototal2v2prov' => $_POST['totalentrevalorantespreciototal2v2'],
            'm2prov' => $_POST['valorantespreciototal'],
            'fecha_entregaprov' => $_POST['fecha_entregaprov'],
        );
        $this->model->getActualizaCentrocostos2_2($data2);
        $data3 = array(
            'numordencompra' => $_POST['numordenfinal'],
            'totalmueblesherrajesextrasinstalacionytransportepopmaniquis3prov' => $_POST['totalmueblesherrajesextrasinstalacionytransportepopmaniquis3'],
            'anticipoprov' => $_POST['anticipo'],
            'totalconivaprov' => $_POST['totalconiva'],
            'anticipoconivaprov' => $_POST['anticipoconiva'],
            'totaltiendav2prov' => $_POST['totaltiendav2'],
            'totaltiendaanticipov2prov' => $_POST['totaltiendaanticipov2'],
            'm2tiendafinalv2prov' => $_POST['m2tiendafinalv2'],
            'finiquitov2prov' => $_POST['finiquitov2'],
            'm2prov' => $_POST['mismom2inicio'],
        );
        $this->model->getActualizaCentrocostosFinal2_2($data3);

        $numordenfinal = $this->input->post("numordenfinal");
        $usernamecons = $this->input->post("usernamecons");
        $tienda_name_updt = $this->input->post("tienda_name_updt");
        $dataredirectprov['numordenfinal'] = $numordenfinal;
        $dataredirectprov['usernamecons'] = $usernamecons;
        $dataredirectprov['tienda_name_updt'] = $tienda_name_updt;
        $this->loadViews("regresadetalleupdateprov", $dataredirectprov);
    }













    function setinsertarantesgenerarcompra()
    {

        $this->model->actualiza_status_tienda_1($_POST);
        $this->model->uploadOrdenPendiente($_POST);
        $this->model->uploadOrdenPendienteCabeceros($_POST);
        $this->model->getinsertarantesgenerarcompraent($_POST);
        $this->model->getinsertarantesgenerarcompradcmpi($_POST);
        $this->model->getinsertarantesgenerarcompradcmpe($_POST);
        $this->model->getinsertarantesgenerarcompramhjmpi($_POST);
        $this->model->getinsertarantesgenerarcompramhjmpe($_POST);
        $this->model->getinsertarantesgenerarcompramhjmpje($_POST);
        $this->model->getinsertarantesgenerarcompramhjmpli($_POST);
        $this->model->getinsertarantesgenerarcompraimpi($_POST);
        $this->model->getinsertarantesgenerarcompraimpe($_POST);
        $this->model->getinsertarantesgenerarcompraimhe($_POST);
        $this->model->getinsertarantesgenerarcomprainnpi($_POST);
        $this->model->getinsertarantesgenerarcomprainnpe($_POST);
        $this->model->getinsertarantesgenerarcompratnnbpi($_POST);
        $this->model->getinsertarantesgenerarcompratnnbpe($_POST);
        $this->model->getinsertarantesgenerarcompraherna($_POST);
        $this->model->getinsertarantesgenerarcompraprobmpi($_POST);
        $this->model->getinsertarantesgenerarcomprapanmpi($_POST);
        $this->model->getinsertarantesgenerarcompraextmpi($_POST);
        $this->model->getinsertarantesgenerarcompraimgp($_POST);
        $this->model->getinsertarantesgenerarcompraimgm($_POST);
        $this->model->getinsertarantesgenerarcompraots($_POST);
    }

    function verPendientes()
    {
        $usernamepdnt = $this->input->post("usernamepdnt");
        $data['usernamepdnt'] = $this->model->verify_userpdnt($usernamepdnt);
        $data['productospdts'] = $this->model->contenidoPendientes();
        $this->loadViews("ordenpendientedetalle", $data);
    }
    function enviarPapeleraPendiente()
    {
        $this->model->moverPapeleraPendientes($_POST['idproducto']);
    }
    function regresa_papelera_orden_pendiente()
    {
        $ordenpendiente = $this->input->post("ordenpendiente");
        $usernamepdnt = $this->input->post("usernamepdnt");
        $data['ordenpendiente'] = $ordenpendiente;
        $data['usernamepdnt'] = $usernamepdnt;
        $this->loadViews("regresapapelerapendiente", $data);
    }
    function verPapeleraPendiente()
    {
        $ordenpendiente = $this->input->post("ordenpendiente");
        $usernamepdnt = $this->input->post("usernamepdnt");
        $data['ordenpendiente'] = $ordenpendiente;
        $data['usernamepdnt'] = $usernamepdnt;

        $data['productos'] = $this->model->contenidoPapeleraPendientes($ordenpendiente);
        $this->loadViews("papelerapendientes", $data);
    }
    function recuperarPapeleraPendientes()
    {
        $this->model->traerPapeleraPendientes($_POST['idproducto']);
    }
    function verDetallePendientes()
    {
        $data['proveedores'] = $this->model->getProveedoresPendientes();
        $data['nombresusuario'] = $this->model->getNombresUsuarioPendientes();
        $data['tiendas'] = $this->model->getTiendasPendientes();
        $data['cabeceros'] = $this->model->getCabecerosPendientes($_POST['ordenpendiente']);

        $data['entrada'] = $this->model->getProductosEntradaPendientes($_POST['ordenpendiente']);

        $data['dcmpiso'] = $this->model->getProductosDamaYCaballeroPisoPendientes($_POST['ordenpendiente']);
        $data['dcmperimetral'] = $this->model->getProductosDamaYCaballeroPerimetralPendientes($_POST['ordenpendiente']);

        $data['mhjmpiso'] = $this->model->getProductosMujerHombreJrPisoPendientes($_POST['ordenpendiente']);
        $data['mhjmperimetral'] = $this->model->getProductosMujerHombreJrPerimetralPendientes($_POST['ordenpendiente']);
        $data['mhjmpjeans'] = $this->model->getProductosMujerHombreJrJeansPendientes($_POST['ordenpendiente']);
        $data['mhjmplicencias'] = $this->model->getProductosMujerHombreJrLicenciasPendientes($_POST['ordenpendiente']);

        $data['impiso'] = $this->model->getProductosInteriorMujerPisoPendientes($_POST['ordenpendiente']);
        $data['imperimetral'] = $this->model->getProductosInteriorMujerPerimetralPendientes($_POST['ordenpendiente']);
        $data['imherraje'] = $this->model->getProductosInteriorMujerHerrajePendientes($_POST['ordenpendiente']);

        $data['innpiso'] = $this->model->getProductosInfantilNiñoYNiñaPisoPendientes($_POST['ordenpendiente']);
        $data['innperimetral'] = $this->model->getProductosInfantilNiñoYNiñaPerimetralPendientes($_POST['ordenpendiente']);

        $data['tnnbpiso'] = $this->model->getProductosToddlerNiñoNiñaYBebesPisoPendientes($_POST['ordenpendiente']);
        $data['tnnbperimetral'] = $this->model->getProductosToddlerNiñoNiñaYBebesPerimetralPendientes($_POST['ordenpendiente']);

        $data['hernoaplica'] = $this->model->getProductosHerrajeNoAplicaPendientes($_POST['ordenpendiente']);

        $data['probmpiso'] = $this->model->getProductosProbadoresPisoPendientes($_POST['ordenpendiente']);

        $data['panmpiso'] = $this->model->getProductosPanelesPisoPendientes($_POST['ordenpendiente']);

        $data['extmpiso'] = $this->model->getProductosExtrasPisoPendientes($_POST['ordenpendiente']);

        $data['imgpop'] = $this->model->getProductosImagenPopPendientes($_POST['ordenpendiente']);

        $data['imgmaniquis'] = $this->model->getProductosImagenManiquisPendientes($_POST['ordenpendiente']);

        $data['otros'] = $this->model->getProductosOtrosPendientes($_POST['ordenpendiente']);

        $usernamepdnt = $this->input->post("usernamepdnt");
        $data['usernamepdnt'] = $this->model->verify_userpdnt($usernamepdnt);
        $ordenpendiente = $this->input->post("ordenpendiente");
        $data['ordenpendiente'] = $this->model->orden_pendiente($ordenpendiente);


        $this->loadViews("ordenpendiente", $data);
    }

    function setguardarantesgenerarcompra()
    {

        $ordenpendiente = $this->input->post("ordenpendiente");
        $datacabeceros = array(
            'fecha_entrega' => $_POST['fecha_entrega'],
            'tienda' => $_POST['nombretienda'],
            'nombre' => $_POST['nombreusuario'],
            'proveedor' => $_POST['proveedor'],
            'cuentacliente' => $_POST['ccstatus'],
            'tipotienda' => $_POST['tipo_tienda'],
            'ubicacion' => $_POST['ubicacion_tienda'],
        );
        $this->model->getguardarantesgenerarcompracabeceros($ordenpendiente, $datacabeceros);

        $data1 = array(
            'id' => $_POST['idnuevoent'],
            'pieza' => $_POST['piezaent'],
            'precio' => $_POST['precioent'],
            'subtotal' => $_POST['subtotalent'],
            'observaciones' => $_POST['observacionesent'],
            'color' => $_POST['color_ent_'],
            'statusreproceso' => $_POST['reprocesstatusent'],
            'sku' => $_POST['sku_ent'],
        );
        $this->model->getguardarantesgenerarcompraent($data1);

        $data2 = array(
            'id' => $_POST['idnuevodcmpi'],
            'pieza' => $_POST['piezadcmpi'],
            'precio' => $_POST['preciodcmpi'],
            'subtotal' => $_POST['subtotaldcmpi'],
            'observaciones' => $_POST['observacionesdcmpi'],
            'color' => $_POST['color_dcmpi_'],
            'statusreproceso' => $_POST['reprocesstatusdcmpi'],
            'sku' => $_POST['sku_dcmpi'],
        );
        $this->model->getguardarantesgenerarcompradcmpi($data2);

        $data3 = array(
            'id' => $_POST['idnuevodcmpe'],
            'pieza' => $_POST['piezadcmpe'],
            'precio' => $_POST['preciodcmpe'],
            'subtotal' => $_POST['subtotaldcmpe'],
            'observaciones' => $_POST['observacionesdcmpe'],
            'color' => $_POST['color_dcmpe_'],
            'statusreproceso' => $_POST['reprocesstatusdcmpe'],
            'sku' => $_POST['sku_dcmpe'],
        );
        $this->model->getguardarantesgenerarcompradcmpe($data3);

        $data4 = array(
            'id' => $_POST['idnuevomhjmpi'],
            'pieza' => $_POST['piezamhjmpi'],
            'precio' => $_POST['preciomhjmpi'],
            'subtotal' => $_POST['subtotalmhjmpi'],
            'observaciones' => $_POST['observacionesmhjmpi'],
            'color' => $_POST['color_mhjmpi_'],
            'statusreproceso' => $_POST['reprocesstatusmhjmpi'],
            'sku' => $_POST['sku_mhjmpi'],
        );
        $this->model->getguardarantesgenerarcompramhjmpi($data4);

        $data5 = array(
            'id' => $_POST['idnuevomhjmpe'],
            'pieza' => $_POST['piezamhjmpe'],
            'precio' => $_POST['preciomhjmpe'],
            'subtotal' => $_POST['subtotalmhjmpe'],
            'observaciones' => $_POST['observacionesmhjmpe'],
            'color' => $_POST['color_mhjmpe_'],
            'statusreproceso' => $_POST['reprocesstatusmhjmpe'],
            'sku' => $_POST['sku_mhjmpe'],
        );
        $this->model->getguardarantesgenerarcompramhjmpe($data5);

        $data6 = array(
            'id' => $_POST['idnuevomhjmpje'],
            'pieza' => $_POST['piezamhjmpje'],
            'precio' => $_POST['preciomhjmpje'],
            'subtotal' => $_POST['subtotalmhjmpje'],
            'observaciones' => $_POST['observacionesmhjmpje'],
            'color' => $_POST['color_mhjmpje_'],
            'statusreproceso' => $_POST['reprocesstatusmhjmpje'],
            'sku' => $_POST['sku_mhjmpje'],
        );
        $this->model->getguardarantesgenerarcompramhjmpje($data6);

        $data7 = array(
            'id' => $_POST['idnuevomhjmpli'],
            'pieza' => $_POST['piezamhjmpli'],
            'precio' => $_POST['preciomhjmpli'],
            'subtotal' => $_POST['subtotalmhjmpli'],
            'observaciones' => $_POST['observacionesmhjmpli'],
            'color' => $_POST['color_mhjmpli_'],
            'statusreproceso' => $_POST['reprocesstatusmhjmpli'],
            'sku' => $_POST['sku_mhjmpli'],
        );
        $this->model->getguardarantesgenerarcompramhjmpli($data7);

        $data8 = array(
            'id' => $_POST['idnuevoimpi'],
            'pieza' => $_POST['piezaimpi'],
            'precio' => $_POST['precioimpi'],
            'subtotal' => $_POST['subtotalimpi'],
            'observaciones' => $_POST['observacionesimpi'],
            'color' => $_POST['color_impi_'],
            'statusreproceso' => $_POST['reprocesstatusimpi'],
            'sku' => $_POST['sku_impi'],
        );
        $this->model->getguardarantesgenerarcompraimpi($data8);

        $data9 = array(
            'id' => $_POST['idnuevoimpe'],
            'pieza' => $_POST['piezaimpe'],
            'precio' => $_POST['precioimpe'],
            'subtotal' => $_POST['subtotalimpe'],
            'observaciones' => $_POST['observacionesimpe'],
            'color' => $_POST['color_impe_'],
            'statusreproceso' => $_POST['reprocesstatusimpe'],
            'sku' => $_POST['sku_impe'],
        );
        $this->model->getguardarantesgenerarcompraimpe($data9);

        $data10 = array(
            'id' => $_POST['idnuevoimhe'],
            'pieza' => $_POST['piezaimhe'],
            'precio' => $_POST['precioimhe'],
            'subtotal' => $_POST['subtotalimhe'],
            'observaciones' => $_POST['observacionesimhe'],
            'color' => $_POST['color_imhe_'],
            'statusreproceso' => $_POST['reprocesstatusimhe'],
            'sku' => $_POST['sku_imhe'],
        );
        $this->model->getguardarantesgenerarcompraimhe($data10);

        $data11 = array(
            'id' => $_POST['idnuevoinnpi'],
            'pieza' => $_POST['piezainnpi'],
            'precio' => $_POST['precioinnpi'],
            'subtotal' => $_POST['subtotalinnpi'],
            'observaciones' => $_POST['observacionesinnpi'],
            'color' => $_POST['color_innpi_'],
            'statusreproceso' => $_POST['reprocesstatusinnpi'],
            'sku' => $_POST['sku_innpi'],
        );
        $this->model->getguardarantesgenerarcomprainnpi($data11);

        $data12 = array(
            'id' => $_POST['idnuevoinnpe'],
            'pieza' => $_POST['piezainnpe'],
            'precio' => $_POST['precioinnpe'],
            'subtotal' => $_POST['subtotalinnpe'],
            'observaciones' => $_POST['observacionesinnpe'],
            'color' => $_POST['color_innpe_'],
            'statusreproceso' => $_POST['reprocesstatusinnpe'],
            'sku' => $_POST['sku_innpe'],
        );
        $this->model->getguardarantesgenerarcomprainnpe($data12);

        $data13 = array(
            'id' => $_POST['idnuevotnnbpi'],
            'pieza' => $_POST['piezatnnbpi'],
            'precio' => $_POST['preciotnnbpi'],
            'subtotal' => $_POST['subtotaltnnbpi'],
            'observaciones' => $_POST['observacionestnnbpi'],
            'color' => $_POST['color_tnnbpi_'],
            'statusreproceso' => $_POST['reprocesstatustnnbpi'],
            'sku' => $_POST['sku_tnnbpi'],
        );
        $this->model->getguardarantesgenerarcompratnnbpi($data13);

        $data14 = array(
            'id' => $_POST['idnuevotnnbpe'],
            'pieza' => $_POST['piezatnnbpe'],
            'precio' => $_POST['preciotnnbpe'],
            'subtotal' => $_POST['subtotaltnnbpe'],
            'observaciones' => $_POST['observacionestnnbpe'],
            'color' => $_POST['color_tnnbpe_'],
            'statusreproceso' => $_POST['reprocesstatustnnbpe'],
            'sku' => $_POST['sku_tnnbpe'],
        );
        $this->model->getguardarantesgenerarcompratnnbpe($data14);

        $data15 = array(
            'id' => $_POST['idnuevoherna'],
            'pieza' => $_POST['piezaherna'],
            'precio' => $_POST['precioherna'],
            'subtotal' => $_POST['subtotalherna'],
            'observaciones' => $_POST['observacionesherna'],
            'color' => $_POST['color_herna_'],
            'statusreproceso' => $_POST['reprocesstatusherna'],
            'sku' => $_POST['sku_herna'],
        );
        $this->model->getguardarantesgenerarcompraherna($data15);

        $data16 = array(
            'id' => $_POST['idnuevoprobmpi'],
            'pieza' => $_POST['piezaprobmpi'],
            'precio' => $_POST['precioprobmpi'],
            'subtotal' => $_POST['subtotalprobmpi'],
            'observaciones' => $_POST['observacionesprobmpi'],
            'color' => $_POST['color_probmpi_'],
            'statusreproceso' => $_POST['reprocesstatusprobmpi'],
            'sku' => $_POST['sku_probmpi'],
        );
        $this->model->getguardarantesgenerarcompraprobmpi($data16);

        $data17 = array(
            'id' => $_POST['idnuevopanmpi'],
            'pieza' => $_POST['piezapanmpi'],
            'precio' => $_POST['preciopanmpi'],
            'subtotal' => $_POST['subtotalpanmpi'],
            'observaciones' => $_POST['observacionespanmpi'],
            'color' => $_POST['color_panmpi_'],
            'statusreproceso' => $_POST['reprocesstatuspanmpi'],
            'sku' => $_POST['sku_panmpi'],
        );
        $this->model->getguardarantesgenerarcomprapanmpi($data17);

        $data18 = array(
            'id' => $_POST['idnuevoextmpi'],
            'pieza' => $_POST['piezaextmpi'],
            'precio' => $_POST['precioextmpi'],
            'subtotal' => $_POST['subtotalextmpi'],
            'observaciones' => $_POST['observacionesextmpi'],
            'color' => $_POST['color_extmpi_'],
            'statusreproceso' => $_POST['reprocesstatusextmpi'],
            'sku' => $_POST['sku_extmpi'],
        );
        $this->model->getguardarantesgenerarcompraextmpi($data18);

        $data19 = array(
            'id' => $_POST['idnuevoimgp'],
            'pieza' => $_POST['piezaimgp'],
            'precio' => $_POST['precioimgp'],
            'subtotal' => $_POST['subtotalimgp'],
            'observaciones' => $_POST['observacionesimgp'],
            'color' => $_POST['color_imgp_'],
            'statusreproceso' => $_POST['reprocesstatusimgp'],
            'sku' => $_POST['sku_imgp'],
        );
        $this->model->getguardarantesgenerarcompraimgp($data19);

        $data20 = array(
            'id' => $_POST['idnuevoimgm'],
            'pieza' => $_POST['piezaimgm'],
            'precio' => $_POST['precioimgm'],
            'subtotal' => $_POST['subtotalimgm'],
            'observaciones' => $_POST['observacionesimgm'],
            'color' => $_POST['color_imgm_'],
            'statusreproceso' => $_POST['reprocesstatusimgm'],
            'sku' => $_POST['sku_imgm'],
        );
        $this->model->getguardarantesgenerarcompraimgm($data20);

        $data21 = array(
            'id' => $_POST['idnuevoots'],
            'pieza' => $_POST['piezaots'],
            'precio' => $_POST['precioots'],
            'subtotal' => $_POST['subtotalots'],
            'observaciones' => $_POST['observacionesots'],
            'color' => $_POST['color_ots_'],
            'statusreproceso' => $_POST['reprocesstatusots'],
            'sku' => $_POST['sku_ots'],
        );
        $this->model->getguardarantesgenerarcompraots($data21);
    }











    function actualizaProveedores()
    {
        $data = array(
            'id' => $_POST['idproveedor'],
            'proveedor' => $_POST['nombreproveedor'],
        );
        $this->model->getactualizaProveedores($data);
        $usernamegenc = $this->input->post("usernamegenc3");
        $data['usernamegenc'] = $this->model->verify_usergenc($usernamegenc);
        $data['proveedores2'] = $this->model->getProveedores();
        $this->loadViews("proveedores", $data);
    }
    function actualizaNombres()
    {
        $data = array(
            'id' => $_POST['idnombres'],
            'nombre' => $_POST['nombrenombres'],
        );
        $this->model->getactualizaNombres($data);
        $usernamegenc = $this->input->post("usernamegenc3");
        $data['usernamegenc'] = $this->model->verify_usergenc($usernamegenc);
        $data['nombresusuario2'] = $this->model->getNombresUsuario();
        $this->loadViews("nombresusuario", $data);
    }
    function actualizaTiendas()
    {
        $data = array(
            'id' => $_POST['idtiendas'],
            'numerodetienda' => $_POST['numerodetiendas'],
            'nombre' => $_POST['nombretiendas'],
            'año' => $_POST['añotiendas'],
            'local' => $_POST['localtiendas'],
            'construccion' => $_POST['construcciontiendas'],
            //'escaparates' => $_POST['escaparatestiendas'],
            //'banners' => $_POST['bannerstiendas'],
            'deptos' => $_POST['deptostiendas'],
            //'interiordamas' => $_POST['interiordamastiendas'],
            //'comentariosdeinteriordamas' => $_POST['comentariosdeinteriordamastiendas'],
            //'m2interiormujer' => $_POST['m2interiormujertiendas'],
            'm2pisoventa' => $_POST['m2pisoventatiendas'],
            'm2bodega' => $_POST['m2bodegatiendas'],
            'centro_costos' => $_POST['centro_costos'],
            'ubicacion_td' => $_POST['ubicacion_td'],
        );
        $this->model->getactualizaTiendas($data);
        $usernamegenc = $this->input->post("usernamegenc2");
        $data['usernamegenc'] = $this->model->verify_usergenc($usernamegenc);
        $data['tiendas2'] = $this->model->getTiendas();
        $this->loadViews("tiendas", $data);
    }
    function actualizaTiendasObs()
    {
        $data = array(
            'id' => $_POST['idtiendas'],
            'color' => $_POST['valorcolortiendas'],
            'observaciones' => $_POST['obstiendas']
        );
        $this->model->getactualizaTiendasObs($data);
        $usernamemobi = $this->input->post('usernamemobi');
        $data['usernamemobi'] = $this->model->verify_usermobi($usernamemobi);
        $data['departamentos'] = $this->model->getDepartamentos();
        $data['tiendas'] = $this->model->getTiendas();
        $data['mobiliarioproductosentrada'] = $this->model->productosMobiliarioEntrada();
        $data['mobiliarioproductosdamaycaballero'] = $this->model->productosMobiliarioDamaYCaballero();
        $data['mobiliarioproductosmujerhombrejr'] = $this->model->productosMobiliarioMujerHombreJR();
        $data['mobiliarioproductosinteriormujer'] = $this->model->productosMobiliarioInteriorMujer();
        $data['mobiliarioproductosinfantilniñoyniña'] = $this->model->productosMobiliarioInfantilNiñoYNiña();
        $data['mobiliarioproductostoddlerniñoniñaybebes'] = $this->model->productosMobiliarioToddlerNiñoNiñaYBebes();
        $data['mobiliarioproductosherrajes'] = $this->model->productosMobiliarioHerrajes();
        $data['mobiliarioproductosprobadores'] = $this->model->productosMobiliarioProbadores();
        $data['mobiliarioproductospaneles'] = $this->model->productosMobiliarioPaneles();
        $data['mobiliarioproductosextras'] = $this->model->productosMobiliarioExtras();
        $data['mobiliarioproductosimagen'] = $this->model->productosMobiliarioImagen();
        $data['mobiliarioproductosotros'] = $this->model->productosMobiliarioOtros();
        $this->loadViews('mobiliario', $data);
        //redirect('Dashboard/verMobiliario');
    }




    function editarPrecio()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'precio' => $this->input->post('precio')
        );
        $this->loadViews("actualizarprecio", $data);
    }
    function actualizarPrecio()
    {
        $data = array(
            'id' => $_POST['id'],
            'precio' => $_POST['precio']
        );
        $this->model->updatePrecio($data);
        $this->session->set_flashdata('Precio', 'Precio del producto Actualizado!');
        redirect('Dashboard/ventaProductos');
    }
    function editarPieza()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'pieza' => $this->input->post('pieza')
        );
        $this->loadViews("actualizarpieza", $data);
    }
    function actualizarPieza()
    {
        $data = array(
            'id' => $_POST['id'],
            'pieza' => $_POST['pieza']
        );
        $this->model->updatePieza($data);
        $this->session->set_flashdata('Pieza', 'Cantidad de productos Actualizada!');
        redirect('Dashboard/ventaProductos');
    }
    function actualizarPrecio2()
    {
        $data = array(
            'id' => $_POST['id'],
            'precio' => $_POST['precio']
        );
        $this->model->updatePrecio($data);
        redirect('Dashboard/productosEntrada');
    }
    function actualizarPiezaYSubtotal()
    {
        $data = array(
            'id' => $_POST['id'],
            'pieza' => $_POST['pieza'],
            'subtotal' => $_POST['subtotal']
        );
        $this->model->updatePieza($data);
        $this->model->quitarCarrito($data);
        redirect('Dashboard/productosEntrada');
    }
    function actualizarObservaciones()
    {
        $data = array(
            'id' => $_POST['id'],
            'observaciones' => $_POST['observaciones']
        );
        $this->model->updateObservaciones($data);
        redirect('Dashboard/productosEntrada');
    }




    function agregarCarrito()
    {
        /*print_r($_POST);*/
        $data = array(
            'id' => $this->input->post('id'),
            'precio' => $this->input->post('precio'),
            'departamentos' => $this->input->post('departamentos'),
            'subdepartamentos' => $this->input->post('subdepartamentos'),
            'pieza' => $this->input->post('pieza')
        );
        $this->cart->insert($data);
        redirect('Dashboard/carrito');
    }
    function mostrarCarrito()
    {
        $data['productos'] = $this->model->getProductos();
        $this->session->set_flashdata('Carrito', ' Producto agregado Al carrito!');
        $this->loadViews("carrito", $data);
    }


    function editarCarrito()
    {
        $this->loadViews("editarcarrito");
    }
    function generarCompra()
    {
        $this->loadViews("generarcompra");
    }
    function cargaVistaProvMismaOrden()
    {
        $numerocompraparaprov = $this->input->post("numerocompraparaprov");
        $usernameconsred = $this->input->post("usernameconsred");
        $tienda_name = $this->input->post('tienda_name');
        $data['numerocompraparaprov'] = $numerocompraparaprov;
        $data['usernameconsred'] = $usernameconsred;
        $data['tienda_name'] = $tienda_name;
        $this->loadViews("regresadetalleredirectprov", $data);
    }
    function cargaVistaCteMismaOrden()
    {
        $numerocompraparacte = $this->input->post("numerocompraparacte");
        $usernameconsred = $this->input->post("usernameconsred");
        $tienda_name = $this->input->post('tienda_name_2');
        $data['numerocompraparacte'] = $numerocompraparacte;
        $data['usernameconsred'] = $usernameconsred;
        $data['tienda_name'] = $tienda_name;
        $this->loadViews("regresadetalleredirectcte", $data);
    }





    function pruebamodal()
    {
        $this->load->view('A1modal');
    }
    function savequestions()
    {
        $this->model->getsavequestion($_POST);
    }
    function buscarUsuario()
    {
        $usuario = $this->input->post('usuario');
        $existeUsuario = $this->model->getbuscarUsuario($usuario);
        header('Content-Type: application/json');
        echo json_encode(['existe' => $existeUsuario]);
    }


    function delete_all_from_ent()
    {
        $this->model->get_delete_all_from_ent();
    }
    function delete_all_from_dcmpi()
    {
        $this->model->get_delete_all_from_dcmpi();
    }
    function delete_all_from_dcmpe()
    {
        $this->model->get_delete_all_from_dcmpe();
    }
    function delete_all_from_mhjmpi()
    {
        $this->model->get_delete_all_from_mhjmpi();
    }
    function delete_all_from_mhjmpe()
    {
        $this->model->get_delete_all_from_mhjmpe();
    }
    function delete_all_from_mhjmpje()
    {
        $this->model->get_delete_all_from_mhjmpje();
    }
    function delete_all_from_mhjmpli()
    {
        $this->model->get_delete_all_from_mhjmpli();
    }
    function delete_all_from_impi()
    {
        $this->model->get_delete_all_from_impi();
    }
    function delete_all_from_impe()
    {
        $this->model->get_delete_all_from_impe();
    }
    function delete_all_from_imhe()
    {
        $this->model->get_delete_all_from_imhe();
    }
    function delete_all_from_innpi()
    {
        $this->model->get_delete_all_from_innpi();
    }
    function delete_all_from_innpe()
    {
        $this->model->get_delete_all_from_innpe();
    }
    function delete_all_from_tnnbpi()
    {
        $this->model->get_delete_all_from_tnnbpi();
    }
    function delete_all_from_tnnbpe()
    {
        $this->model->get_delete_all_from_tnnbpe();
    }
    function delete_all_from_herna()
    {
        $this->model->get_delete_all_from_herna();
    }
    function delete_all_from_probmpi()
    {
        $this->model->get_delete_all_from_probmpi();
    }
    function delete_all_from_panmpi()
    {
        $this->model->get_delete_all_from_panmpi();
    }
    function delete_all_from_extmpi()
    {
        $this->model->get_delete_all_from_extmpi();
    }
    function delete_all_from_imgp()
    {
        $this->model->get_delete_all_from_imgp();
    }
    function delete_all_from_imgm()
    {
        $this->model->get_delete_all_from_imgm();
    }
    function delete_all_from_ots()
    {
        $this->model->get_delete_all_from_ots();
    }



    function delete_all_from_ent_pdnt()
    {
        $this->model->get_delete_all_from_ent_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_dcmpi_pdnt()
    {
        $this->model->get_delete_all_from_dcmpi_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_dcmpe_pdnt()
    {
        $this->model->get_delete_all_from_dcmpe_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_mhjmpi_pdnt()
    {
        $this->model->get_delete_all_from_mhjmpi_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_mhjmpe_pdnt()
    {
        $this->model->get_delete_all_from_mhjmpe_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_mhjmpje_pdnt()
    {
        $this->model->get_delete_all_from_mhjmpje_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_mhjmpli_pdnt()
    {
        $this->model->get_delete_all_from_mhjmpli_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_impi_pdnt()
    {
        $this->model->get_delete_all_from_impi_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_impe_pdnt()
    {
        $this->model->get_delete_all_from_impe_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_imhe_pdnt()
    {
        $this->model->get_delete_all_from_imhe_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_innpi_pdnt()
    {
        $this->model->get_delete_all_from_innpi_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_innpe_pdnt()
    {
        $this->model->get_delete_all_from_innpe_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_tnnbpi_pdnt()
    {
        $this->model->get_delete_all_from_tnnbpi_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_tnnbpe_pdnt()
    {
        $this->model->get_delete_all_from_tnnbpe_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_herna_pdnt()
    {
        $this->model->get_delete_all_from_herna_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_probmpi_pdnt()
    {
        $this->model->get_delete_all_from_probmpi_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_panmpi_pdnt()
    {
        $this->model->get_delete_all_from_panmpi_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_extmpi_pdnt()
    {
        $this->model->get_delete_all_from_extmpi_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_imgp_pdnt()
    {
        $this->model->get_delete_all_from_imgp_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_imgm_pdnt()
    {
        $this->model->get_delete_all_from_imgm_pdnt($_POST['ordenpendiente']);
    }
    function delete_all_from_ots_pdnt()
    {
        $this->model->get_delete_all_from_ots_pdnt($_POST['ordenpendiente']);
    }





    function recover_all_from_trash()
    {
        $this->model->get_recover_all_from_trash();
    }
    function recover_all_from_trash_pdnt()
    {
        $this->model->get_recover_all_from_trash_pdnt($_POST['ordenpendiente']);
    }
}
