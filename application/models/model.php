<?php
class model extends CI_Model
{
    public function loginUser($username, $password)
    {
        $this->db->select("*");
        $this->db->from("useravante");
        $this->db->where("username", $username);
        $this->db->where("password", $password);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 'Error:1 Usuario y Contraseña no son correctas.';
        }
    }
    public function loginAvante($username, $password)
    {

        $dn = "DC=corporativo,DC=avantetextil,DC=com,DC=mx";
        $attributes = array("displayname", "Department", "title", "mail", "initials", "Manager", "directReports");
        $filter = "mailNickname=$username";


        $ad = @ldap_connect("ldap://srv07dc.corporativo.avantetextil.com.mx") or die("Couldn't connect to AD!");
        ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
        ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);

        if ($bd = @ldap_bind($ad, 'corporativo\\' . $username, $password)) {

            $result = ldap_search($ad, $dn, $filter, $attributes);
            $entries = ldap_get_entries($ad, $result);

            for ($i = 0; $i < $entries["count"]; $i++) {


                $usuario_data = array(
                    'username'  => $username,
                    'nombre'  => $entries[$i]["displayname"][0],
                    'departmento'  => $entries[$i]["department"][0],
                    'email'  => $entries[$i]["mail"][0],
                    'empleado'  => $entries[$i]["initials"][0],
                    'puesto' => $entries[$i]["title"][0]
                );
            }

            $data['usuario'] = $usuario_data;



            // print_r($subordinados_data);


            return $usuario_data;
        } else {
            return "Error:1 Usuario y Contraseña no son correctas.";
        }
    }






    public function verify_sublogin($nombreusuario)
    {
        $this->db->select('*');
        $this->db->where('nombreusuario', $nombreusuario);
        $this->db->from('usuarioscontrol');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function verificarolusuarios()
    {
        $this->db->select('*');
        $this->db->from('usuarioscontrol');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getupdatestatuscos($data)
    {
        $id = $data['id'];
        $nombre = $data['nombre'];
        $nombreusuario = $data['nombreusuario'];
        $uploadprod = $data['uploadprod'];
        $altapaccess = $data['altapaccess'];
        $gencaccess = $data['gencaccess'];
        $pdntaccess = $data['pdntaccess'];
        $consultas = $data['consultas'];
        $mobi = $data['mobi'];
        $rolusuario = $data['rolusuario'];
        if (
            is_array($id) &&
            is_array($nombre) &&
            is_array($nombreusuario) &&
            is_array($uploadprod) &&
            is_array($altapaccess) &&
            is_array($gencaccess) &&
            is_array($pdntaccess) &&
            is_array($consultas) &&
            is_array($mobi) &&
            is_array($rolusuario)
        ) {
            $size = sizeof($id);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "nombre" => $nombre[$i],
                    "nombreusuario" => $nombreusuario[$i],
                    "uploadprod" => $uploadprod[$i],
                    "altapaccess" => $altapaccess[$i],
                    "gencaccess" => $gencaccess[$i],
                    "pdntaccess" => $pdntaccess[$i],
                    "consultas" => $consultas[$i],
                    "mobi" => $mobi[$i],
                    "rolusuario" => $rolusuario[$i],
                );
                $this->db->where('id', $id[$i]);
                $this->db->update("usuarioscontrol", $array);
            }
        }
    }
    public function verify_sublogin_mob($nombreusuario)
    {
        $this->db->select('*');
        $this->db->where('nombreusuario', $nombreusuario);
        $this->db->from('usuarioscontrol');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    public function verify_userupload($usernameupload)
    {
        $this->db->select('*');
        $this->db->where('nombreusuario', $usernameupload);
        $this->db->from('usuarioscontrol');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    public function verify_useraltap($usernamealtap)
    {
        $this->db->select('*');
        $this->db->where('nombreusuario', $usernamealtap);
        $this->db->from('usuarioscontrol');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    public function verify_useraltap2($usernamealtap2)
    {
        $this->db->select('*');
        $this->db->where('nombreusuario', $usernamealtap2);
        $this->db->from('usuarioscontrol');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    public function verify_usergenc($usernamegenc)
    {
        $this->db->select('*');
        $this->db->where('nombreusuario', $usernamegenc);
        $this->db->from('usuarioscontrol');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    public function verify_userpdnt($usernamepdnt)
    {
        $this->db->select('*');
        $this->db->where('nombreusuario', $usernamepdnt);
        $this->db->from('usuarioscontrol');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    public function verify_userconsu($usernamecons)
    {
        $this->db->select('*');
        $this->db->where('nombreusuario', $usernamecons);
        $this->db->from('usuarioscontrol');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function verify_user_papelera_detalle($usernamepapdetalle)
    {
        $this->db->select('*');
        $this->db->where('nombreusuario', $usernamepapdetalle);
        $this->db->from('usuarioscontrol');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function verify_user_papelera_ord_pdnt($usernamepapordpdnt)
    {
        $this->db->select('*');
        $this->db->where('nombreusuario', $usernamepapordpdnt);
        $this->db->from('usuarioscontrol');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    public function verify_usermobi($usernamepdnt)
    {
        $this->db->select('*');
        $this->db->where('nombreusuario', $usernamepdnt);
        $this->db->from('usuarioscontrol');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    public function verify_userctrlaccess($usernameaccess)
    {
        $this->db->select('*');
        $this->db->where('nombreusuario', $usernameaccess);
        $this->db->from('usuarioscontrol');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    public function orden_pendiente($ordenpendiente)
    {
        $this->db->select('*');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->from('temporalesdetalle');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }











    function upload_login_access_users($data)
    {
        $array = array(
            "nombre" => $data['nombre'],
            "nombreusuario" => $data['nombreusuario'],
        );
        $this->db->insert("usuarioscontrol", $array);
    }
    public function insertProf()
    {
        $array = array(
            "Nombre" => "Marco",
            "Apellido" => "Morales",
            "status" => 2
        );
        $this->db->insert("useravante", $array);
    }
    public function getProf()
    {
        $this->db->select("*");
        $this->db->from("useravante");
        /*$this->db->where("id=1");*/
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    public function updateProf()
    {
        $array = array(
            "Nombre" => "Marco",
            "Apellido" => "Martinez",
            "status" => 5
        );
        $this->db->where("id", 1);
        $this->db->update("useravante", $array);

        $this->db->select("*");
        $this->db->from("useravante");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getAlumnos($curso)
    {
        $this->db->select("*");
        $this->db->from("useravante2");
        //$this->db->where("curso",$curso);
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        //print_r($this->db->last_query());
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    function deleteAlumno($id)
    {

        $this->db->where("id", $id);
        $this->db->delete("useravante2");
    }
    function deleteProducto($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("productos");
    }
    function deleteProductoSkus($id)
    {
        $this->db->where("id_producto", $id);
        $this->db->delete("rel_sku_prod");
    }
    function deleteProveedor($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("proveedores");
    }
    function deleteNombre($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("nombreusuario");
    }
    function deleteTiendas($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("tienda");
    }
    function moverPapelera($id)
    {
        $array = array(
            "deleted" => 1
        );
        $this->db->where("id", $id);
        $this->db->update("productos", $array);
    }
    function moverPapelera2($id_orden_pedido)
    {
        $array = array(
            "eliminado" => 1
        );
        $this->db->where("id", $id_orden_pedido);
        $this->db->update("numerocompra2", $array);
    }
    function moverPapeleraProv($id)
    {
        $array = array(
            "deleted2" => 1
        );
        $this->db->where("id", $id);
        $this->db->update("detallecompras", $array);
    }
    function moverPapeleraPorOrdenCompra($id)
    {
        $array = array(
            "deleted2" => 1
        );
        $this->db->where("id", $id);
        $this->db->update("detallecompras", $array);
    }
    function moverPapeleraPendientes($id)
    {
        $array = array(
            "deleted" => 1
        );
        $this->db->where("id_nuevo", $id);
        $this->db->update("temporales", $array);
    }
    function moverPapeleraPorOrdenCompraPdnt($id_orden_pedido_pdnt)
    {
        $array = array(
            "deleted" => 1
        );
        $this->db->where("id", $id_orden_pedido_pdnt);
        $this->db->update("temporalesdetalle", $array);
    }
    function traerPapelera($id)
    {
        $array = array(
            "deleted" => 0,
            //"pieza" => 0,
            "subtotal" => 0,

        );
        $this->db->where("id", $id);
        $this->db->update("productos", $array);
    }
    function traerPapelera2($id)
    {
        $array = array(
            "eliminado" => 0
        );
        $this->db->where("id", $id);
        $this->db->update("numerocompra2", $array);
    }
    function traerPapeleraProv($id)
    {
        $array = array(
            "deleted2" => 0
        );
        $this->db->where("id", $id);
        $this->db->update("detallecompras", $array);
    }
    function traerPapeleraPendientes($id)
    {
        $array = array(
            "deleted" => 0,
        );
        $this->db->where("id_nuevo", $id);
        $this->db->update("temporales", $array);
    }
    function traerPapeleraPorOrdenCompraPdnt($id_orden_pedido_pdnt)
    {
        $array = array(
            "deleted" => 0
        );
        $this->db->where("id", $id_orden_pedido_pdnt);
        $this->db->update("temporalesdetalle", $array);
    }
    function geteliminarnumerocomprapermanente($id_orden_pedido_delete_val)
    {
        $this->db->where("numordencompra", $id_orden_pedido_delete_val);
        $this->db->delete("numerocompra2");
    }
    function geteliminarprodsdetallecompraprapermanente($id_orden_pedido_delete_val)
    {
        $this->db->where("numordencompra", $id_orden_pedido_delete_val);
        $this->db->delete("detallecompras");
    }

    /////***************pendientes*****************

    function geteliminarnumerocomprapdntpermanente($id_orden_pedido_delete_val)
    {
        $this->db->where("ordenpendiente", $id_orden_pedido_delete_val);
        $this->db->delete("temporalesdetalle");
    }
    function geteliminarprodsdetallecomprapdntpermanente($id_orden_pedido_delete_val)
    {
        $this->db->where("ordenpendiente", $id_orden_pedido_delete_val);
        $this->db->delete("temporales");
    }
    function geteliminarcabecerosdetallecomprapdntpermanente($id_orden_pedido_delete_val)
    {
        $this->db->where("ordenpendiente", $id_orden_pedido_delete_val);
        $this->db->delete("temporalescabeceros");
    }
    function get_actualiza_status_tienda_pdnt_orden_eliminada($tienda_status_val)
    {
        $array = array(
            "status" => 0
        );
        $this->db->where('nombre', $tienda_status_val);
        $this->db->update("tienda", $array);
    }
    /////***************pendientes*****************

    function get_regresa_productos_a_temporales($data)
    {
        $numordencompra = $data['numordencompra'];
        $ordenpendiente = $data['ordenpendiente'];
        $sql = "INSERT INTO temporales (ordenpendiente, id, nombre, pieza, precio, subtotal, departamentos, subdepartamentos, archivo, status, deleted, carrito, unidad, observaciones, incluye, tienda, color, statusreproceso, sku)
                SELECT ? as ordenpendiente, idprincipalproducto2 as id, nombre, pieza, precio, subtotal, departamentos, subdepartamentos, '' as archivo, '' as status, 0 as deleted, 0 as carrito, unidad, observaciones, incluye, tienda, color, statusreproceso, sku
                FROM detallecompras 
                WHERE numordencompra = ?";
        $result = $this->db->query($sql, array($ordenpendiente, $numordencompra));
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function get_regresa_cabeceros_a_temporales($data)
    {
        $numordencompra = $data['numordencompra'];
        $ordenpendiente = $data['ordenpendiente'];
        $sql = "INSERT INTO temporalescabeceros (ordenpendiente, fecha_entrega, tienda, nombre, proveedor, cuentacliente, tipotienda, ubicacion)
                SELECT ? as ordenpendiente, b.fecha_entrega, a.tienda, a.nombre, a.proveedor, a.cuentacliente, a.tipotienda, a.ubicacion 
                FROM numerocompra2 a 
                LEFT JOIN centrocostos b ON b.numordencompra = a.numordencompra 
                WHERE a.numordencompra = ?";
        $result = $this->db->query($sql, array($ordenpendiente, $numordencompra));
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function get_regresa_detalle_a_temporales($data)
    {
        $numordencompra = $data['numordencompra'];
        $ordenpendiente = $data['ordenpendiente'];
        $sql = "INSERT INTO temporalesdetalle(ordenpendiente, tienda, deleted)
                SELECT ? AS ordenpendiente, tienda, 0 AS deleted 
                FROM numerocompra2 
                WHERE numordencompra = ?";
        $result = $this->db->query($sql, array($ordenpendiente, $numordencompra));
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function get_regresa_status_tienda($data)
    {
        $tienda = $data['tienda'];

        $array = array(
            "status" => 2
        );
        $this->db->where('nombre', $tienda);
        $this->db->update('tienda', $array);
        
        if ($this->db->affected_rows() > 0) {
            return true; // Si hubo al menos una fila afectada, retornamos true
        } else {
            return false; // No hubo filas afectadas, retornamos false
        }
    }



    function get_user_delete_access_control($user_id_val)
    {
        $this->db->where("id", $user_id_val);
        $this->db->delete("usuarioscontrol");
    }



    function geteliminar_centrocostos_permanente($id_orden_pedido_delete_val)
    {
        $this->db->where("numordencompra", $id_orden_pedido_delete_val);
        $this->db->delete("centrocostos");
    }
    function geteliminar_centrocostosfinal_permanente($id_orden_pedido_delete_val)
    {
        $this->db->where("numordencompra", $id_orden_pedido_delete_val);
        $this->db->delete("centrocostosfinal");
    }
    function geteliminar_centrocostosprov_permanente($id_orden_pedido_delete_val)
    {
        $this->db->where("numordencompra", $id_orden_pedido_delete_val);
        $this->db->delete("centrocostosprov");
    }
    function geteliminar_centrocostosfinalprov_permanente($id_orden_pedido_delete_val)
    {
        $this->db->where("numordencompra", $id_orden_pedido_delete_val);
        $this->db->delete("centrocostosfinalprov");
    }
    function geteliminar_subtotales_permanente($id_orden_pedido_delete_val)
    {
        $this->db->where("numordencompra", $id_orden_pedido_delete_val);
        $this->db->delete("subtotales");
    }
    function get_actualiza_status_tienda_orden_eliminada($tienda_status_val)
    {
        $array = array(
            "status" => 0
        );
        $this->db->where('nombre', $tienda_status_val);
        $this->db->update("tienda", $array);
    }
    function reiniciaInventario()
    {
        $array = array(
            "deleted" => 0,
            //"pieza" => 0,
        );
        $this->db->update("productos", $array);
    }
    function agregarCarrito($id)
    {
        $array = array(
            "carrito" => 1
        );
        $this->db->where("id", $id);
        $this->db->where("pieza >", 0);
        $this->db->update("productos", $array);
    }
    function quitarCarrito($data)
    {
        $array = array(
            "carrito" => 0
        );
        $this->db->where("id", $data['id']);
        $this->db->where("pieza", 0);
        $this->db->update("productos", $array);
    }


    function updateProductoActivo($id)
    {
        $array = array(
            "status" => "Activo",
        );
        $this->db->where("id", $id);
        $this->db->update("productos", $array);
    }
    function updateProductoActivo2($checked_id1)
    {
        $array = array(
            "status" => "Activo",
        );
        $this->db->where("id", $checked_id1);
        $this->db->update("productos", $array);
    }
    function updateProductoInactivo($id)
    {
        $array = array(
            "status" => "Inactivo",
        );
        $this->db->where("id", $id);
        $this->db->update("productos", $array);
    }
    function getActualizaStatus($data)
    {
        $ids = $data['id'];
        $statusgrupo = $data['status'];
        if (
            is_array($ids) &&
            is_array($statusgrupo)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "id" => $ids[$i],
                    "status" => $statusgrupo[$i]
                );
                $this->db->where('id', $ids[$i]);
                $this->db->update("productos", $array);
            }
        }
    }
    function getactualizarprods($id, $datos)
    {
        $this->db->where('id', $id);
        $this->db->update('productos', $datos);
    }
    /*
    function getactualizarprods($data2, $data){
        $this->db->update('productos', $data2, $data);

        return TRUE;
    }
    */
    function capturaimagen($id)
    {
        $this->db->select('archivo');
        $this->db->where('id', $id);
        $this->db->from('productos');

        $resultado = $this->db->get();
        return $resultado->row();
    }
    function get_searchImgCat($id_img)
    {
        $this->db->select('archivo');
        $this->db->where('id', $id_img);
        $this->db->from('productos');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function get_updateImgCat($id_img, $data)
    {
        $this->db->where('id', $id_img);
        $this->db->update('productos', $data);
    }

    function get_subdepas($departamento)
    {
        $this->db->select('nombre');
        $this->db->where('nombre_departamento', $departamento);
        $query = $this->db->get('subdepartamentos');
        return $query->result_array();
    }
    function get_actualizarCatalogo($data)
    {
        $id = $data['id'];
        $nombre = $data['nombre'];
        $precio = $data['precio'];
        $reproceso = $data['reproceso'];
        $unidad = $data['unidad'];
        $departamentos = $data['departamentos'];
        $subdepartamentos = $data['subdepartamentos'];
        $incluye = $data['incluye'];
        $status = $data['status'];
        //$sku = $data['sku'];
        $pieza = $data['pieza'];
        if (
            is_array($id) &&
            is_array($nombre) &&
            is_array($precio) &&
            is_array($reproceso) &&
            is_array($unidad) &&
            is_array($departamentos) &&
            is_array($subdepartamentos) &&
            is_array($incluye) &&
            is_array($status) &&
            //is_array($sku) &&
            is_array($pieza)
        ) {
            $size = sizeof($id);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "nombre" => $nombre[$i],
                    "precio" => $precio[$i],
                    "reproceso" => $reproceso[$i],
                    "unidad" => $unidad[$i],
                    "departamentos" => $departamentos[$i],
                    "subdepartamentos" => $subdepartamentos[$i],
                    "incluye" => $incluye[$i],
                    "status" => $status[$i],
                    //"sku" => $sku[$i],
                    "pieza" => $pieza[$i],
                );
                $this->db->where('id', $id[$i]);
                $this->db->update("productos", $array);
            }
        }
    }
    function get_actulizaSkus($data2)
    {
        $id = $data2['id'];
        $cc31 = $data2['cc31'];
        $cc33 = $data2['cc33'];
        $cc34 = $data2['cc34'];
        $cc31r = $data2['cc31r'];
        $cc33r = $data2['cc33r'];
        $cc34r = $data2['cc34r'];
        $activof = $data2['activof'];
        if (
            is_array($id) &&
            is_array($cc31) &&
            is_array($cc33) &&
            is_array($cc34) &&
            is_array($cc31r) &&
            is_array($cc33r) &&
            is_array($cc34r) &&
            is_array($activof)
        ) {
            $size = sizeof($id);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "cc31" => $cc31[$i],
                    "cc33" => $cc33[$i],
                    "cc34" => $cc34[$i],
                    "cc31r" => $cc31r[$i],
                    "cc33r" => $cc33r[$i],
                    "cc34r" => $cc34r[$i],
                    "activof" => $activof[$i]
                );
                $this->db->where('id_producto', $id[$i]);
                $this->db->update("rel_sku_prod", $array);
            }
        }
    }




    function updatePrecio($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('productos', $data);
    }
    function updatePieza($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('productos', $data);
    }
    function updateObservaciones($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('productos', $data);
    }
    function updatePrecioCantidadSubtotalFila($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('productos', $data);
    }









    function asigarCantidad($data, $id)
    {
        $this->db->select($id);
        $this->db->from('productos');
        $this->db->get("id", $id);
        $array = array(
            "pieza" => $data['pieza']
        );
        $this->db->insert("productos", $array);
        $this->db->where("id", $id);
        $this->db->update("productos", $array);
    }

    function sumCantidad($data, $id)
    {
        $array = array(
            "cantidad" => $data['cantidad']
        );
        $this->db->select('SUM(pieza*precio) as cantidad', false);
        $this->db->from('productos');
        $this->db->where('id', 57);
        $this->db->update("productos", $array);
    }

    function getSumaTotalEntrada2()
    {
        $this->db->select_sum("subtotal");
        $this->db->from("productos");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getSumaTotalEntrada()
    {
        $sql = "select sum(subtotal) as subtotal from productos where departamentos = 'entrada'";
        $result = $this->db->query($sql);
        return $result->row()->subtotal;
    }
    function getSumaTotalDamaYCaballeroPiso()
    {
        $sql = "select sum(subtotal) as subtotal from productos where departamentos = 'dama y caballero' and subdepartamentos = 'mobiliario de piso'";
        $result = $this->db->query($sql);
        return $result->row()->subtotal;
    }
    function getSumaTotalDamaYCaballeroPerimetral()
    {
        $sql = "select sum(subtotal) as subtotal from productos where departamentos = 'dama y caballero' and subdepartamentos = 'mobiliario perimetral'";
        $result = $this->db->query($sql);
        return $result->row()->subtotal;
    }






    function uploadProducto($data, $archivo = null)
    {
        if ($archivo) {
            $array = array(
                "nombre" => $data['nombre'],
                //"pieza"=>$data['pieza'],
                "precio" => $data['precio'],
                "reproceso" => $data['reproceso'],
                "unidad" => $data['unidad'],
                "archivo" => $archivo,
                "status" => $data['status'],
                "departamentos" => $data['departamentos'],
                "subdepartamentos" => $data['subdepartamentos'],
                //"observaciones"=>$data['observaciones'],
                "sku" => $data['sku']
            );
        } else {
            $array = array(
                "nombre" => $data['nombre'],
                //"pieza"=>$data['pieza'],
                "precio" => $data['precio'],
                "reproceso" => $data['reproceso'],
                "unidad" => $data['unidad'],
                "archivo" => "",
                "status" => $data['status'],
                "departamentos" => $data['departamentos'],
                "subdepartamentos" => $data['subdepartamentos'],
                //"observaciones"=>$data['observaciones'],
                "sku" => $data['sku']
            );
        }
        $this->db->insert("productos", $array);
        //si el formulario manda un array vacio no funciona el insert
        //es por eso que (pieza) esta comentado, porque en el formulario
        //no se le esta mandando nada
    }
    function uploadProducto2($data, $archivo)
    {
        $array = array(
            "nombre" => $data['nombre'],
            "pieza" => 0,
            "precio" => $data['precio'],
            "reproceso" => $data['reproceso'],
            "unidad" => $data['unidad'],
            "archivo" => $archivo,
            "status" => $data['status'],
            "departamentos" => $data['departamentos'],
            "subdepartamentos" => $data['subdepartamentos'],
            //"observaciones"=>$data['observaciones'],
            //"sku" => $data['sku']
        );
        $this->db->insert("productos", $array);
        return $this->db->insert_id();
        //si el formulario manda un array vacio no funciona el insert
        //es por eso que (observaciones) esta comentado, porque en el formulario
        //no se le esta mandando nada
    }
    function get_insertskusdirect($data){
        $info = array(
            "cc31" => $data['cc31'],
            "cc33" => $data['cc33'],
            "cc34" => $data['cc34'],
            "cc31r" => $data['cc31r'],
            "cc33r" => $data['cc33r'],
            "cc34r" => $data['cc34r'],
            "activof" => $data['activof'],
            "id_producto" => $data['id_nuevo_reg']
        );
        $this->db->insert('rel_sku_prod', $info);
    }

    function get_productos_ids()
    {
        $this->db->select('id');
        $this->db->from('productos');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    function get_skus_ids()
    {
        $this->db->select('id_producto');
        $this->db->from('rel_sku_prod');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function get_insertar_ids_skus_faltantes($data)
    {
        $ids = $data['diferencias'];
        if (
            is_array($ids)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id_producto" => $ids[$i],
                );
                $this->db->insert("rel_sku_prod", $array);
            }
        }
    }

    function getRegistraProveedor($data)
    {
        $array = array(
            "proveedor" => $data['proveedor']
        );
        $this->db->insert("proveedores", $array);
    }
    function getRegistraNombre($data)
    {
        $array = array(
            "nombre" => $data['nombre']
        );
        $this->db->insert("nombreusuario", $array);
    }
    function getRegistraTienda($data)
    {
        $array = array(
            "numerodetienda" => $data['numerodetienda'],
            "nombre" => $data['nombre'],
            "año" => $data['año'],
            "local" => $data['local'],
            "construccion" => $data['construccion'],
            //"escaparates"=>$data['escaparates'],
            //"banners"=>$data['banners'],
            "deptos" => $data['deptos'],
            //"interiordamas"=>$data['interiordamas'],
            //"comentariosdeinteriordamas"=>$data['comentariosdeinteriordamas'],
            //"m2interiormujer"=>$data['m2interiormujer'],
            "m2pisoventa" => $data['m2pisoventa'],
            "m2bodega" => $data['m2bodega'],
            "centro_costos" => $data['centro_costos'],
            "ubicacion_td" => $data['ubicacion_t'],
        );
        $this->db->insert("tienda", $array);
    }





    //****************************INSERTAR DATOS EN PENDIENTES SECCION PENDIENTES****************************
    //*******************************************************************************************************


    function contenidoPendientes()
    {
        $this->db->select("*");
        $this->db->from("temporalesdetalle");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function actualiza_status_tienda_1($data)
    {
        $tienda = $data['nombretienda'];
        $array = array(
            "status" => 1
        );
        $this->db->where('nombre', $tienda);
        $this->db->update("tienda", $array);
    }
    function uploadOrdenPendiente($data)
    {
        $array = array(
            "ordenpendiente" => $data['ordenpendiente'],
            "tienda" => $data['nombretienda'],
        );
        $this->db->insert("temporalesdetalle", $array);
    }
    function uploadOrdenPendienteCabeceros($data)
    {
        $array = array(
            "ordenpendiente" => $data['ordenpendiente'],
            "fecha_entrega" => $data['fecha_entrega'],
            "tienda" => $data['nombretienda'],
            "nombre" => $data['nombreusuario'],
            "proveedor" => $data['proveedor'],
            "cuentacliente" => $data['ccstatus'],
            "tipotienda" => $data['tipo_tienda'],
            "ubicacion" => $data['ubicacion_tienda']
        );
        $this->db->insert("temporalescabeceros", $array);
    }
    function getinsertarantesgenerarcompraent($data)
    {
        $ids = $data['ident'];
        $nombres = $data['nombreent'];
        $precios = $data['precioent'];
        $piezas = $data['piezaent'];
        $unidades = $data['unidadent'];
        $subtotales = $data['subtotalent'];
        $observacionesgrupo = $data['observacionesent'];
        $depertamentosgrupo = $data['departamentosent'];
        $subdepertamentosgrupo = $data['subdepartamentosent'];
        $incluyes = $data['entincluye'];
        $colores = $data['color_ent_'];
        $statusreproceso = $data['reprocesstatusent'];
        $skus = $data['sku_ent'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompradcmpi($data)
    {
        $ids = $data['iddcmpi'];
        $nombres = $data['nombredcmpi'];
        $precios = $data['preciodcmpi'];
        $piezas = $data['piezadcmpi'];
        $unidades = $data['unidaddcmpi'];
        $subtotales = $data['subtotaldcmpi'];
        $observacionesgrupo = $data['observacionesdcmpi'];
        $depertamentosgrupo = $data['departamentosdcmpi'];
        $subdepertamentosgrupo = $data['subdepartamentosdcmpi'];
        $incluyes = $data['dcmpiincluye'];
        $colores = $data['color_dcmpi_'];
        $statusreproceso = $data['reprocesstatusdcmpi'];
        $skus = $data['sku_dcmpi'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompradcmpe($data)
    {
        $ids = $data['iddcmpe'];
        $nombres = $data['nombredcmpe'];
        $precios = $data['preciodcmpe'];
        $piezas = $data['piezadcmpe'];
        $unidades = $data['unidaddcmpe'];
        $subtotales = $data['subtotaldcmpe'];
        $observacionesgrupo = $data['observacionesdcmpe'];
        $depertamentosgrupo = $data['departamentosdcmpe'];
        $subdepertamentosgrupo = $data['subdepartamentosdcmpe'];
        $incluyes = $data['dcmpeincluye'];
        $colores = $data['color_dcmpe_'];
        $statusreproceso = $data['reprocesstatusdcmpe'];
        $skus = $data['sku_dcmpe'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompramhjmpi($data)
    {
        $ids = $data['idmhjmpi'];
        $nombres = $data['nombremhjmpi'];
        $precios = $data['preciomhjmpi'];
        $piezas = $data['piezamhjmpi'];
        $unidades = $data['unidadmhjmpi'];
        $subtotales = $data['subtotalmhjmpi'];
        $observacionesgrupo = $data['observacionesmhjmpi'];
        $depertamentosgrupo = $data['departamentosmhjmpi'];
        $subdepertamentosgrupo = $data['subdepartamentosmhjmpi'];
        $incluyes = $data['mhjmpiincluye'];
        $colores = $data['color_mhjmpi_'];
        $statusreproceso = $data['reprocesstatusmhjmpi'];
        $skus = $data['sku_mhjmpi'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompramhjmpe($data)
    {
        $ids = $data['idmhjmpe'];
        $nombres = $data['nombremhjmpe'];
        $precios = $data['preciomhjmpe'];
        $piezas = $data['piezamhjmpe'];
        $unidades = $data['unidadmhjmpe'];
        $subtotales = $data['subtotalmhjmpe'];
        $observacionesgrupo = $data['observacionesmhjmpe'];
        $depertamentosgrupo = $data['departamentosmhjmpe'];
        $subdepertamentosgrupo = $data['subdepartamentosmhjmpe'];
        $incluyes = $data['mhjmpeincluye'];
        $colores = $data['color_mhjmpe_'];
        $statusreproceso = $data['reprocesstatusmhjmpe'];
        $skus = $data['sku_mhjmpe'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompramhjmpje($data)
    {
        $ids = $data['idmhjmpje'];
        $nombres = $data['nombremhjmpje'];
        $precios = $data['preciomhjmpje'];
        $piezas = $data['piezamhjmpje'];
        $unidades = $data['unidadmhjmpje'];
        $subtotales = $data['subtotalmhjmpje'];
        $observacionesgrupo = $data['observacionesmhjmpje'];
        $depertamentosgrupo = $data['departamentosmhjmpje'];
        $subdepertamentosgrupo = $data['subdepartamentosmhjmpje'];
        $incluyes = $data['mhjmpjeincluye'];
        $colores = $data['color_mhjmpje_'];
        $statusreproceso = $data['reprocesstatusmhjmpje'];
        $skus = $data['sku_mhjmpje'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompramhjmpli($data)
    {
        $ids = $data['idmhjmpli'];
        $nombres = $data['nombremhjmpli'];
        $precios = $data['preciomhjmpli'];
        $piezas = $data['piezamhjmpli'];
        $unidades = $data['unidadmhjmpli'];
        $subtotales = $data['subtotalmhjmpli'];
        $observacionesgrupo = $data['observacionesmhjmpli'];
        $depertamentosgrupo = $data['departamentosmhjmpli'];
        $subdepertamentosgrupo = $data['subdepartamentosmhjmpli'];
        $incluyes = $data['mhjmpliincluye'];
        $colores = $data['color_mhjmpli_'];
        $statusreproceso = $data['reprocesstatusmhjmpli'];
        $skus = $data['sku_mhjmpli'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompraimpi($data)
    {
        $ids = $data['idimpi'];
        $nombres = $data['nombreimpi'];
        $precios = $data['precioimpi'];
        $piezas = $data['piezaimpi'];
        $unidades = $data['unidadimpi'];
        $subtotales = $data['subtotalimpi'];
        $observacionesgrupo = $data['observacionesimpi'];
        $depertamentosgrupo = $data['departamentosimpi'];
        $subdepertamentosgrupo = $data['subdepartamentosimpi'];
        $incluyes = $data['impiincluye'];
        $colores = $data['color_impi_'];
        $statusreproceso = $data['reprocesstatusimpi'];
        $skus = $data['sku_impi'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompraimpe($data)
    {
        $ids = $data['idimpe'];
        $nombres = $data['nombreimpe'];
        $precios = $data['precioimpe'];
        $piezas = $data['piezaimpe'];
        $unidades = $data['unidadimpe'];
        $subtotales = $data['subtotalimpe'];
        $observacionesgrupo = $data['observacionesimpe'];
        $depertamentosgrupo = $data['departamentosimpe'];
        $subdepertamentosgrupo = $data['subdepartamentosimpe'];
        $incluyes = $data['impeincluye'];
        $colores = $data['color_impe_'];
        $statusreproceso = $data['reprocesstatusimpe'];
        $skus = $data['sku_impe'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompraimhe($data)
    {
        $ids = $data['idimhe'];
        $nombres = $data['nombreimhe'];
        $precios = $data['precioimhe'];
        $piezas = $data['piezaimhe'];
        $unidades = $data['unidadimhe'];
        $subtotales = $data['subtotalimhe'];
        $observacionesgrupo = $data['observacionesimhe'];
        $depertamentosgrupo = $data['departamentosimhe'];
        $subdepertamentosgrupo = $data['subdepartamentosimhe'];
        $incluyes = $data['imheincluye'];
        $colores = $data['color_imhe_'];
        $statusreproceso = $data['reprocesstatusimhe'];
        $skus = $data['sku_imhe'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcomprainnpi($data)
    {
        $ids = $data['idinnpi'];
        $nombres = $data['nombreinnpi'];
        $precios = $data['precioinnpi'];
        $piezas = $data['piezainnpi'];
        $unidades = $data['unidadinnpi'];
        $subtotales = $data['subtotalinnpi'];
        $observacionesgrupo = $data['observacionesinnpi'];
        $depertamentosgrupo = $data['departamentosinnpi'];
        $subdepertamentosgrupo = $data['subdepartamentosinnpi'];
        $incluyes = $data['innpiincluye'];
        $colores = $data['color_innpi_'];
        $statusreproceso = $data['reprocesstatusinnpi'];
        $skus = $data['sku_innpi'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcomprainnpe($data)
    {
        $ids = $data['idinnpe'];
        $nombres = $data['nombreinnpe'];
        $precios = $data['precioinnpe'];
        $piezas = $data['piezainnpe'];
        $unidades = $data['unidadinnpe'];
        $subtotales = $data['subtotalinnpe'];
        $observacionesgrupo = $data['observacionesinnpe'];
        $depertamentosgrupo = $data['departamentosinnpe'];
        $subdepertamentosgrupo = $data['subdepartamentosinnpe'];
        $incluyes = $data['innpeincluye'];
        $colores = $data['color_innpe_'];
        $statusreproceso = $data['reprocesstatusinnpe'];
        $skus = $data['sku_innpe'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompratnnbpi($data)
    {
        $ids = $data['idtnnbpi'];
        $nombres = $data['nombretnnbpi'];
        $precios = $data['preciotnnbpi'];
        $piezas = $data['piezatnnbpi'];
        $unidades = $data['unidadtnnbpi'];
        $subtotales = $data['subtotaltnnbpi'];
        $observacionesgrupo = $data['observacionestnnbpi'];
        $depertamentosgrupo = $data['departamentostnnbpi'];
        $subdepertamentosgrupo = $data['subdepartamentostnnbpi'];
        $incluyes = $data['tnnbpiincluye'];
        $colores = $data['color_tnnbpi_'];
        $statusreproceso = $data['reprocesstatustnnbpi'];
        $skus = $data['sku_tnnbpi'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompratnnbpe($data)
    {
        $ids = $data['idtnnbpe'];
        $nombres = $data['nombretnnbpe'];
        $precios = $data['preciotnnbpe'];
        $piezas = $data['piezatnnbpe'];
        $unidades = $data['unidadtnnbpe'];
        $subtotales = $data['subtotaltnnbpe'];
        $observacionesgrupo = $data['observacionestnnbpe'];
        $depertamentosgrupo = $data['departamentostnnbpe'];
        $subdepertamentosgrupo = $data['subdepartamentostnnbpe'];
        $incluyes = $data['tnnbpeincluye'];
        $colores = $data['color_tnnbpe_'];
        $statusreproceso = $data['reprocesstatustnnbpe'];
        $skus = $data['sku_tnnbpe'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompraherna($data)
    {
        $ids = $data['idherna'];
        $nombres = $data['nombreherna'];
        $precios = $data['precioherna'];
        $piezas = $data['piezaherna'];
        $unidades = $data['unidadherna'];
        $subtotales = $data['subtotalherna'];
        $observacionesgrupo = $data['observacionesherna'];
        $depertamentosgrupo = $data['departamentosherna'];
        $subdepertamentosgrupo = $data['subdepartamentosherna'];
        $incluyes = $data['hernaincluye'];
        $colores = $data['color_herna_'];
        $statusreproceso = $data['reprocesstatusherna'];
        $skus = $data['sku_herna'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompraprobmpi($data)
    {
        $ids = $data['idprobmpi'];
        $nombres = $data['nombreprobmpi'];
        $precios = $data['precioprobmpi'];
        $piezas = $data['piezaprobmpi'];
        $unidades = $data['unidadprobmpi'];
        $subtotales = $data['subtotalprobmpi'];
        $observacionesgrupo = $data['observacionesprobmpi'];
        $depertamentosgrupo = $data['departamentosprobmpi'];
        $subdepertamentosgrupo = $data['subdepartamentosprobmpi'];
        $incluyes = $data['probmpiincluye'];
        $colores = $data['color_probmpi_'];
        $statusreproceso = $data['reprocesstatusprobmpi'];
        $skus = $data['sku_probmpi'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcomprapanmpi($data)
    {
        $ids = $data['idpanmpi'];
        $nombres = $data['nombrepanmpi'];
        $precios = $data['preciopanmpi'];
        $piezas = $data['piezapanmpi'];
        $unidades = $data['unidadpanmpi'];
        $subtotales = $data['subtotalpanmpi'];
        $observacionesgrupo = $data['observacionespanmpi'];
        $depertamentosgrupo = $data['departamentospanmpi'];
        $subdepertamentosgrupo = $data['subdepartamentospanmpi'];
        $incluyes = $data['panmpiincluye'];
        $colores = $data['color_panmpi_'];
        $statusreproceso = $data['reprocesstatuspanmpi'];
        $skus = $data['sku_panmpi'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompraextmpi($data)
    {
        $ids = $data['idextmpi'];
        $nombres = $data['nombreextmpi'];
        $precios = $data['precioextmpi'];
        $piezas = $data['piezaextmpi'];
        $unidades = $data['unidadextmpi'];
        $subtotales = $data['subtotalextmpi'];
        $observacionesgrupo = $data['observacionesextmpi'];
        $depertamentosgrupo = $data['departamentosextmpi'];
        $subdepertamentosgrupo = $data['subdepartamentosextmpi'];
        $incluyes = $data['extmpiincluye'];
        $colores = $data['color_extmpi_'];
        $statusreproceso = $data['reprocesstatusextmpi'];
        $skus = $data['sku_extmpi'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompraimgp($data)
    {
        $ids = $data['idimgp'];
        $nombres = $data['nombreimgp'];
        $precios = $data['precioimgp'];
        $piezas = $data['piezaimgp'];
        $unidades = $data['unidadimgp'];
        $subtotales = $data['subtotalimgp'];
        $observacionesgrupo = $data['observacionesimgp'];
        $depertamentosgrupo = $data['departamentosimgp'];
        $subdepertamentosgrupo = $data['subdepartamentosimgp'];
        $incluyes = $data['imgpincluye'];
        $colores = $data['color_imgp_'];
        $statusreproceso = $data['reprocesstatusimgp'];
        $skus = $data['sku_imgp'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompraimgm($data)
    {
        $ids = $data['idimgm'];
        $nombres = $data['nombreimgm'];
        $precios = $data['precioimgm'];
        $piezas = $data['piezaimgm'];
        $unidades = $data['unidadimgm'];
        $subtotales = $data['subtotalimgm'];
        $observacionesgrupo = $data['observacionesimgm'];
        $depertamentosgrupo = $data['departamentosimgm'];
        $subdepertamentosgrupo = $data['subdepartamentosimgm'];
        $incluyes = $data['imgmincluye'];
        $colores = $data['color_imgm_'];
        $statusreproceso = $data['reprocesstatusimgm'];
        $skus = $data['sku_imgm'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }
    function getinsertarantesgenerarcompraots($data)
    {
        $ids = $data['idots'];
        $nombres = $data['nombreots'];
        $precios = $data['precioots'];
        $piezas = $data['piezaots'];
        $unidades = $data['unidadots'];
        $subtotales = $data['subtotalots'];
        $observacionesgrupo = $data['observacionesots'];
        $depertamentosgrupo = $data['departamentosots'];
        $subdepertamentosgrupo = $data['subdepartamentosots'];
        $incluyes = $data['otsincluye'];
        $colores = $data['color_ots_'];
        $statusreproceso = $data['reprocesstatusots'];
        $skus = $data['sku_ots'];

        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyes) &&
            is_array($colores) &&
            is_array($statusreproceso) &&
            is_array($skus)
        ) {

            $size = sizeof($ids);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyes[$i],
                    "color" => $colores[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $skus[$i],
                    "ordenpendiente" => $data['ordenpendiente'],
                    "tienda" => $data['nombretienda'],
                );
                $this->db->insert("temporales", $array);
            }
        }
    }






    //******************ACTUALIZAR DATOS EN PENDIENTES SECCION PENDIENTES POR ORDEN*******************



    function getguardarantesgenerarcompracabeceros($ordenpendiente, $datacabeceros)
    {
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->update("temporalescabeceros", $datacabeceros);
    }
    function getguardarantesgenerarcompraent($data1)
    {
        $ids = $data1['id'];
        $piezas = $data1['pieza'];
        $precios = $data1['precio'];
        $subtotalesgrupo = $data1['subtotal'];
        $observacionesgrupo = $data1['observaciones'];
        $colors = $data1['color'];
        $statusreproceso = $data1['statusreproceso'];
        $sku = $data1['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompradcmpi($data2)
    {
        $ids = $data2['id'];
        $piezas = $data2['pieza'];
        $precios = $data2['precio'];
        $subtotalesgrupo = $data2['subtotal'];
        $observacionesgrupo = $data2['observaciones'];
        $colors = $data2['color'];
        $statusreproceso = $data2['statusreproceso'];
        $sku = $data2['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompradcmpe($data3)
    {
        $ids = $data3['id'];
        $piezas = $data3['pieza'];
        $precios = $data3['precio'];
        $subtotalesgrupo = $data3['subtotal'];
        $observacionesgrupo = $data3['observaciones'];
        $colors = $data3['color'];
        $statusreproceso = $data3['statusreproceso'];
        $sku = $data3['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompramhjmpi($data4)
    {
        $ids = $data4['id'];
        $piezas = $data4['pieza'];
        $precios = $data4['precio'];
        $subtotalesgrupo = $data4['subtotal'];
        $observacionesgrupo = $data4['observaciones'];
        $colors = $data4['color'];
        $statusreproceso = $data4['statusreproceso'];
        $sku = $data4['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompramhjmpe($data5)
    {
        $ids = $data5['id'];
        $piezas = $data5['pieza'];
        $precios = $data5['precio'];
        $subtotalesgrupo = $data5['subtotal'];
        $observacionesgrupo = $data5['observaciones'];
        $colors = $data5['color'];
        $statusreproceso = $data5['statusreproceso'];
        $sku = $data5['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompramhjmpje($data6)
    {
        $ids = $data6['id'];
        $piezas = $data6['pieza'];
        $precios = $data6['precio'];
        $subtotalesgrupo = $data6['subtotal'];
        $observacionesgrupo = $data6['observaciones'];
        $colors = $data6['color'];
        $statusreproceso = $data6['statusreproceso'];
        $sku = $data6['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompramhjmpli($data7)
    {
        $ids = $data7['id'];
        $piezas = $data7['pieza'];
        $precios = $data7['precio'];
        $subtotalesgrupo = $data7['subtotal'];
        $observacionesgrupo = $data7['observaciones'];
        $colors = $data7['color'];
        $statusreproceso = $data7['statusreproceso'];
        $sku = $data7['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompraimpi($data8)
    {
        $ids = $data8['id'];
        $piezas = $data8['pieza'];
        $precios = $data8['precio'];
        $subtotalesgrupo = $data8['subtotal'];
        $observacionesgrupo = $data8['observaciones'];
        $colors = $data8['color'];
        $statusreproceso = $data8['statusreproceso'];
        $sku = $data8['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompraimpe($data9)
    {
        $ids = $data9['id'];
        $piezas = $data9['pieza'];
        $precios = $data9['precio'];
        $subtotalesgrupo = $data9['subtotal'];
        $observacionesgrupo = $data9['observaciones'];
        $colors = $data9['color'];
        $statusreproceso = $data9['statusreproceso'];
        $sku = $data9['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompraimhe($data10)
    {
        $ids = $data10['id'];
        $piezas = $data10['pieza'];
        $precios = $data10['precio'];
        $subtotalesgrupo = $data10['subtotal'];
        $observacionesgrupo = $data10['observaciones'];
        $colors = $data10['color'];
        $statusreproceso = $data10['statusreproceso'];
        $sku = $data10['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcomprainnpi($data11)
    {
        $ids = $data11['id'];
        $piezas = $data11['pieza'];
        $precios = $data11['precio'];
        $subtotalesgrupo = $data11['subtotal'];
        $observacionesgrupo = $data11['observaciones'];
        $colors = $data11['color'];
        $statusreproceso = $data11['statusreproceso'];
        $sku = $data11['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcomprainnpe($data12)
    {
        $ids = $data12['id'];
        $piezas = $data12['pieza'];
        $precios = $data12['precio'];
        $subtotalesgrupo = $data12['subtotal'];
        $observacionesgrupo = $data12['observaciones'];
        $colors = $data12['color'];
        $statusreproceso = $data12['statusreproceso'];
        $sku = $data12['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompratnnbpi($data13)
    {
        $ids = $data13['id'];
        $piezas = $data13['pieza'];
        $precios = $data13['precio'];
        $subtotalesgrupo = $data13['subtotal'];
        $observacionesgrupo = $data13['observaciones'];
        $colors = $data13['color'];
        $statusreproceso = $data13['statusreproceso'];
        $sku = $data13['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompratnnbpe($data14)
    {
        $ids = $data14['id'];
        $piezas = $data14['pieza'];
        $precios = $data14['precio'];
        $subtotalesgrupo = $data14['subtotal'];
        $observacionesgrupo = $data14['observaciones'];
        $colors = $data14['color'];
        $statusreproceso = $data14['statusreproceso'];
        $sku = $data14['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompraherna($data15)
    {
        $ids = $data15['id'];
        $piezas = $data15['pieza'];
        $precios = $data15['precio'];
        $subtotalesgrupo = $data15['subtotal'];
        $observacionesgrupo = $data15['observaciones'];
        $colors = $data15['color'];
        $statusreproceso = $data15['statusreproceso'];
        $sku = $data15['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompraprobmpi($data16)
    {
        $ids = $data16['id'];
        $piezas = $data16['pieza'];
        $precios = $data16['precio'];
        $subtotalesgrupo = $data16['subtotal'];
        $observacionesgrupo = $data16['observaciones'];
        $colors = $data16['color'];
        $statusreproceso = $data16['statusreproceso'];
        $sku = $data16['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcomprapanmpi($data17)
    {
        $ids = $data17['id'];
        $piezas = $data17['pieza'];
        $precios = $data17['precio'];
        $subtotalesgrupo = $data17['subtotal'];
        $observacionesgrupo = $data17['observaciones'];
        $colors = $data17['color'];
        $statusreproceso = $data17['statusreproceso'];
        $sku = $data17['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompraextmpi($data18)
    {
        $ids = $data18['id'];
        $piezas = $data18['pieza'];
        $precios = $data18['precio'];
        $subtotalesgrupo = $data18['subtotal'];
        $observacionesgrupo = $data18['observaciones'];
        $colors = $data18['color'];
        $statusreproceso = $data18['statusreproceso'];
        $sku = $data18['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompraimgp($data19)
    {
        $ids = $data19['id'];
        $piezas = $data19['pieza'];
        $precios = $data19['precio'];
        $subtotalesgrupo = $data19['subtotal'];
        $observacionesgrupo = $data19['observaciones'];
        $colors = $data19['color'];
        $statusreproceso = $data19['statusreproceso'];
        $sku = $data19['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompraimgm($data20)
    {
        $ids = $data20['id'];
        $piezas = $data20['pieza'];
        $precios = $data20['precio'];
        $subtotalesgrupo = $data20['subtotal'];
        $observacionesgrupo = $data20['observaciones'];
        $colors = $data20['color'];
        $statusreproceso = $data20['statusreproceso'];
        $sku = $data20['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }
    function getguardarantesgenerarcompraots($data21)
    {
        $ids = $data21['id'];
        $piezas = $data21['pieza'];
        $precios = $data21['precio'];
        $subtotalesgrupo = $data21['subtotal'];
        $observacionesgrupo = $data21['observaciones'];
        $colors = $data21['color'];
        $statusreproceso = $data21['statusreproceso'];
        $sku = $data21['sku'];
        if (
            is_array($ids) &&
            is_array($piezas) &&
            is_array($precios) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "pieza" => $piezas[$i],
                    "precio" => $precios[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i]
                );
                $this->db->where('id_nuevo', $ids[$i]);
                $this->db->update("temporales", $array);
            }
        }
    }






    //******************TRAE DATOS EN PENDIENTES SECCION PENDIENTES POR ORDEN*******************




    //traer Proveedores
    function getProveedoresPendientes()
    {
        $this->db->select("*");
        $this->db->from("proveedores");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //traer Usuarios
    function getNombresUsuarioPendientes()
    {
        $this->db->select("*");
        $this->db->from("nombreusuario");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //traer Tiendas
    function getTiendasPendientes()
    {
        $this->db->select("*");
        $this->db->from("tienda");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //traer cabeceros
    function getCabecerosPendientes($ordenpendiente)
    {
        $this->db->select("*");
        $this->db->from("temporalescabeceros");
        $this->db->where("ordenpendiente", $ordenpendiente);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //1. TRAER PROD ENTRADA
    function getProductosEntradaPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "entrada");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //2. TRAER PROD DAMA Y CABALLERO
    function getProductosDamaYCaballeroPisoPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "dama y caballero");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosDamaYCaballeroPerimetralPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "dama y caballero");
        $this->db->where("a.subdepartamentos", "mobiliario perimetral");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //3. TRAER PROD MUJER HOMBRE JR
    function getProductosMujerHombreJrPisoPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "mujer hombre jr");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosMujerHombreJrPerimetralPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "mujer hombre jr");
        $this->db->where("a.subdepartamentos", "mobiliario perimetral");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosMujerHombreJrJeansPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "mujer hombre jr");
        $this->db->where("a.subdepartamentos", "mobiliario perimetro jeans");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosMujerHombreJrLicenciasPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "mujer hombre jr");
        $this->db->where("a.subdepartamentos", "mobiliario perimetro licencias");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //4. TRAER PROD INTERIOR MUJER
    function getProductosInteriorMujerPisoPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "interior mujer");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosInteriorMujerPerimetralPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "interior mujer");
        $this->db->where("a.subdepartamentos", "mobiliario perimetral");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosInteriorMujerHerrajePendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "interior mujer");
        $this->db->where("a.subdepartamentos", "herraje");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //5. TRAER PROD INFANTIL NIÑO Y NIÑA
    function getProductosInfantilNiñoYNiñaPisoPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "infantil niño y niña");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosInfantilNiñoYNiñaPerimetralPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "infantil niño y niña");
        $this->db->where("a.subdepartamentos", "mobiliario perimetral");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //6. TRAER PROD TODDLER NIÑO NIÑA Y BEBES
    function getProductosToddlerNiñoNiñaYBebesPisoPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "toddler niño niña y bebes");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosToddlerNiñoNiñaYBebesPerimetralPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "toddler niño niña y bebes");
        $this->db->where("a.subdepartamentos", "mobiliario perimetral");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //7. TRAER PROD HERRAJE
    function getProductosHerrajeNoAplicaPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "herrajes");
        $this->db->where("a.subdepartamentos", "no aplica");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //8. TRAER PROD PROBADORES
    function getProductosProbadoresPisoPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "probadores");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //9. TRAER PROD PANELES
    function getProductosPanelesPisoPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "paneles");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //10. TRAER PROD EXTRAS
    function getProductosExtrasPisoPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "extras");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //11. TRAER PROD IMAGEN
    function getProductosImagenPopPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "imagen");
        $this->db->where("a.subdepartamentos", "pop");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosImagenManiquisPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "imagen");
        $this->db->where("a.subdepartamentos", "maniquis");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //12. TRAER PROD OTROS
    function getProductosOtrosPendientes($ordenpendiente)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("temporales a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("ordenpendiente", $ordenpendiente);
        $this->db->where("a.departamentos", "otros");
        $this->db->where("a.subdepartamentos", "no aplica");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }







    //*******************************************************************************************************
    //*******************************************************************************************************








    function getregistraNuevosSkus($data)
    {
        $this->db->insert("rel_sku_prod", $data);
    }
    function getregistraNuevoProductoEntrada($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductodcmpi($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductodcmpe($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductomhjmpi($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductomhjmpe($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductomhjmpje($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductomhjmpli($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoimpi($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoimpe($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoimhe($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoinnpi($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoinnpe($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductotnnbpi($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductotnnbpe($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoherna($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoprobmpi($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductopanmpi($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoextmpi($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoimgp($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoimgm($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoots($data)
    {
        $this->db->insert("productos", $data);
        return $this->db->insert_id();
    }





    function getregistraNuevoProductoentpdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductodcmpipdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductodcmpepdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductomhjmpipdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductomhjmpepdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductomhjmpjepdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductomhjmplipdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoimpipdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoimpepdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoimhepdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoinnpipdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoinnpepdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductotnnbpipdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductotnnbpepdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductohernapdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoprobmpipdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductopanmpipdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoextmpipdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoimgppdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductoimgmpdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }
    function getregistraNuevoProductootspdnt($data)
    {
        $this->db->insert("temporales", $data);
        return $this->db->insert_id();
    }










    function get_busca_prods_catalogo($dato)
    {
        // Realiza una consulta en la base de datos para buscar nombres que coincidan con $nombre
        $this->db->select('nombre'); // Ajusta esto según tus necesidades
        $this->db->from('productos');
        $this->db->like('nombre', $dato, 'after');
        $query = $this->db->get(); // Cambia 'productos' al nombre de tu tabla

        if ($query->num_rows() > 0) {
            $results = $query->result_array();
            $suggestions = [];
            foreach ($results as $row) {
                $suggestions[] = $row['nombre'];
            }

            return $suggestions;
        } else {
            return [];
        }
    }
    function get_busca_prods_catalogo_precio($dato)
    {
        // Realiza una consulta en la base de datos para buscar nombres que coincidan con $nombre
        $this->db->select('precio'); // Ajusta esto según tus necesidades
        $this->db->from('productos');
        $this->db->like('nombre', $dato);
        $this->db->limit(1);
        $query = $this->db->get(); // Cambia 'productos' al nombre de tu tabla

        if ($query->num_rows() > 0) {
            return $query->row()->precio;
        } else {
            return null; // Producto no encontrado
        }
    }
    function get_busca_prods_catalogo_reproceso($dato)
    {
        // Realiza una consulta en la base de datos para buscar nombres que coincidan con $nombre
        $this->db->select('reproceso'); // Ajusta esto según tus necesidades
        $this->db->from('productos');
        $this->db->like('nombre', $dato);
        $this->db->limit(1);
        $query = $this->db->get(); // Cambia 'productos' al nombre de tu tabla

        if ($query->num_rows() > 0) {
            return $query->row()->reproceso;
        } else {
            return null; // Producto no encontrado
        }
    }
    function get_busca_prods_catalogo_no_piezas($dato)
    {
        // Realiza una consulta en la base de datos para buscar nombres que coincidan con $nombre
        $this->db->select('pieza'); // Ajusta esto según tus necesidades
        $this->db->from('productos');
        $this->db->like('nombre', $dato);
        $this->db->limit(1);
        $query = $this->db->get(); // Cambia 'productos' al nombre de tu tabla

        if ($query->num_rows() > 0) {
            return $query->row()->pieza;
        } else {
            return null; // Producto no encontrado
        }
    }
    function get_busca_prods_catalogo_unidad($dato)
    {
        // Realiza una consulta en la base de datos para buscar nombres que coincidan con $nombre
        $this->db->select('unidad'); // Ajusta esto según tus necesidades
        $this->db->from('productos');
        $this->db->like('nombre', $dato);
        $this->db->limit(1);
        $query = $this->db->get(); // Cambia 'productos' al nombre de tu tabla

        if ($query->num_rows() > 0) {
            return $query->row()->unidad;
        } else {
            return null; // Producto no encontrado
        }
    }
    function get_busca_obs_catalogo($dato)
    {
        $this->db->select('observaciones');
        $this->db->from('productos');
        $this->db->like('observaciones', $dato, 'after');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $results = $query->result_array();
            $suggestions = [];
            foreach ($results as $row) {
                $suggestions[] = $row['observaciones'];
            }
            return $suggestions;
        } else {
            return [];
        }
    }
    function get_busca_reprocesado($dato)
    {
        $this->db->select('reproceso');
        $this->db->from('productos');
        $this->db->where('id', $dato);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function get_busca_precionormal($dato)
    {
        $this->db->select('precio');
        $this->db->from('productos');
        $this->db->where('id', $dato);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function get_busca_reprocesado_en_compra($dato)
    {
        $this->db->select('reproceso');
        $this->db->from('productos');
        $this->db->where('id', $dato);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function get_busca_precionormal_en_compra($dato)
    {
        $this->db->select('precio');
        $this->db->from('detallecompras');
        $this->db->where('id', $dato);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }











    function reemplaza_ultima_orden_de_tienda_prods($data)
    {
        $tienda = $data['resultadotiendainput'];
        $this->db->where('tienda', $tienda);
        $this->db->delete('detallecompras');
    }
    function reemplaza_ultima_orden_de_tienda_numerocompra($data)
    {
        $tienda = $data['resultadotiendainput'];
        $this->db->where('tienda', $tienda);
        $this->db->delete('numerocompra2');
    }
    function actualiza_status_tienda($data)
    {
        $tienda = $data['resultadotiendainput'];
        $array = array(
            "status" => 2
        );
        $this->db->where('nombre', $tienda);
        $this->db->update("tienda", $array);
    }
    function remueve_orden_temporal_en_base_a_tienda_orden_creada($data)
    {
        $tienda = $data['resultadotiendainput'];
        $this->db->where('tienda', $tienda);
        $this->db->delete('temporalesdetalle');
    }
    function remueve_cabeceros_temporales_en_base_a_tienda_orden_creada($data)
    {
        $tienda = $data['resultadotiendainput'];
        $this->db->where('tienda', $tienda);
        $this->db->delete('temporalescabeceros');
    }
    function remueve_productos_temporales_en_base_a_tienda_orden_creada($data)
    {
        $tienda = $data['resultadotiendainput'];
        $this->db->where('tienda', $tienda);
        $this->db->delete('temporales');
    }
    //************************** 1. insertar arreglo de entrada no aplica **************************
    function uploadProductosCompraEntrada($data)
    {
        $ids = $data['ident'];
        $nombres = $data['nombreent'];
        $precios = $data['precioent'];
        $piezas = $data['piezaent'];
        $unidades = $data['unidadent'];
        $subtotales = $data['subtotalent'];
        $observacionesgrupo = $data['observacionesent'];
        $depertamentosgrupo = $data['departamentosent'];
        $subdepertamentosgrupo = $data['subdepartamentosent'];
        $incluyegrupo = $data['entincluye'];
        $colors = $data['color_ent_'];
        $statusreproceso = $data['reprocesstatusent'];
        $sku = $data['sku_ent'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 2. insertar arreglo de dama y caballero piso **************************

    function uploadProductosCompraDamaCaballeroPiso($data)
    {
        $ids = $data['iddcmpi'];
        $nombres = $data['nombredcmpi'];
        $precios = $data['preciodcmpi'];
        $piezas = $data['piezadcmpi'];
        $unidades = $data['unidaddcmpi'];
        $subtotales = $data['subtotaldcmpi'];
        $observacionesgrupo = $data['observacionesdcmpi'];
        $depertamentosgrupo = $data['departamentosdcmpi'];
        $subdepertamentosgrupo = $data['subdepartamentosdcmpi'];
        $incluyegrupo = $data['dcmpiincluye'];
        $colors = $data['color_dcmpi_'];
        $statusreproceso = $data['reprocesstatusdcmpi'];
        $sku = $data['sku_dcmpi'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 2. insertar arreglo de dama y caballero perimetral **************************

    function uploadProductosCompraDamaCaballeroPerimetral($data)
    {
        $ids = $data['iddcmpe'];
        $nombres = $data['nombredcmpe'];
        $precios = $data['preciodcmpe'];
        $piezas = $data['piezadcmpe'];
        $unidades = $data['unidaddcmpe'];
        $subtotales = $data['subtotaldcmpe'];
        $observacionesgrupo = $data['observacionesdcmpe'];
        $depertamentosgrupo = $data['departamentosdcmpe'];
        $subdepertamentosgrupo = $data['subdepartamentosdcmpe'];
        $incluyegrupo = $data['dcmpeincluye'];
        $colors = $data['color_dcmpe_'];
        $statusreproceso = $data['reprocesstatusdcmpe'];
        $sku = $data['sku_dcmpe'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 3. insertar arreglo de Mujer Hombre JR Piso **************************

    function uploadProductosCompraMujerHombreJrPiso($data)
    {
        $ids = $data['idmhjmpi'];
        $nombres = $data['nombremhjmpi'];
        $precios = $data['preciomhjmpi'];
        $piezas = $data['piezamhjmpi'];
        $unidades = $data['unidadmhjmpi'];
        $subtotales = $data['subtotalmhjmpi'];
        $observacionesgrupo = $data['observacionesmhjmpi'];
        $depertamentosgrupo = $data['departamentosmhjmpi'];
        $subdepertamentosgrupo = $data['subdepartamentosmhjmpi'];
        $incluyegrupo = $data['mhjmpiincluye'];
        $colors = $data['color_mhjmpi_'];
        $statusreproceso = $data['reprocesstatusmhjmpi'];
        $sku = $data['sku_mhjmpi'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 3. insertar arreglo de Mujer Hombre JR Perimetral **************************

    function uploadProductosCompraMujerHombreJrPerimetral($data)
    {
        $ids = $data['idmhjmpe'];
        $nombres = $data['nombremhjmpe'];
        $precios = $data['preciomhjmpe'];
        $piezas = $data['piezamhjmpe'];
        $unidades = $data['unidadmhjmpe'];
        $subtotales = $data['subtotalmhjmpe'];
        $observacionesgrupo = $data['observacionesmhjmpe'];
        $depertamentosgrupo = $data['departamentosmhjmpe'];
        $subdepertamentosgrupo = $data['subdepartamentosmhjmpe'];
        $incluyegrupo = $data['mhjmpeincluye'];
        $colors = $data['color_mhjmpe_'];
        $statusreproceso = $data['reprocesstatusmhjmpe'];
        $sku = $data['sku_mhjmpe'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 3. insertar arreglo de Mujer Hombre JR Jeans **************************

    function uploadProductosCompraMujerHombreJrJeans($data)
    {
        $ids = $data['idmhjmpje'];
        $nombres = $data['nombremhjmpje'];
        $precios = $data['preciomhjmpje'];
        $piezas = $data['piezamhjmpje'];
        $unidades = $data['unidadmhjmpje'];
        $subtotales = $data['subtotalmhjmpje'];
        $observacionesgrupo = $data['observacionesmhjmpje'];
        $depertamentosgrupo = $data['departamentosmhjmpje'];
        $subdepertamentosgrupo = $data['subdepartamentosmhjmpje'];
        $incluyegrupo = $data['mhjmpjeincluye'];
        $colors = $data['color_mhjmpje_'];
        $statusreproceso = $data['reprocesstatusmhjmpje'];
        $sku = $data['sku_mhjmpje'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 3. insertar arreglo de Mujer Hombre JR Licencias **************************

    function uploadProductosCompraMujerHombreJrLicencias($data)
    {
        $ids = $data['idmhjmpli'];
        $nombres = $data['nombremhjmpli'];
        $precios = $data['preciomhjmpli'];
        $piezas = $data['piezamhjmpli'];
        $unidades = $data['unidadmhjmpli'];
        $subtotales = $data['subtotalmhjmpli'];
        $observacionesgrupo = $data['observacionesmhjmpli'];
        $depertamentosgrupo = $data['departamentosmhjmpli'];
        $subdepertamentosgrupo = $data['subdepartamentosmhjmpli'];
        $incluyegrupo = $data['mhjmpliincluye'];
        $colors = $data['color_mhjmpli_'];
        $statusreproceso = $data['reprocesstatusmhjmpli'];
        $sku = $data['sku_mhjmpli'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 4. insertar arreglo de Interior Mujer Piso **************************

    function uploadProductosCompraInteriorMujerPiso($data)
    {
        $ids = $data['idimpi'];
        $nombres = $data['nombreimpi'];
        $precios = $data['precioimpi'];
        $piezas = $data['piezaimpi'];
        $unidades = $data['unidadimpi'];
        $subtotales = $data['subtotalimpi'];
        $observacionesgrupo = $data['observacionesimpi'];
        $depertamentosgrupo = $data['departamentosimpi'];
        $subdepertamentosgrupo = $data['subdepartamentosimpi'];
        $incluyegrupo = $data['impiincluye'];
        $colors = $data['color_impi_'];
        $statusreproceso = $data['reprocesstatusimpi'];
        $sku = $data['sku_impi'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 4. insertar arreglo de Interior Mujer Perimetral **************************

    function uploadProductosCompraInteriorMujerPerimetral($data)
    {
        $ids = $data['idimpe'];
        $nombres = $data['nombreimpe'];
        $precios = $data['precioimpe'];
        $piezas = $data['piezaimpe'];
        $unidades = $data['unidadimpe'];
        $subtotales = $data['subtotalimpe'];
        $observacionesgrupo = $data['observacionesimpe'];
        $depertamentosgrupo = $data['departamentosimpe'];
        $subdepertamentosgrupo = $data['subdepartamentosimpe'];
        $incluyegrupo = $data['impeincluye'];
        $colors = $data['color_impe_'];
        $statusreproceso = $data['reprocesstatusimpe'];
        $sku = $data['sku_impe'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 4. insertar arreglo de Interior Mujer Herrajes **************************

    function uploadProductosCompraInteriorMujerHerraje($data)
    {
        $ids = $data['idimhe'];
        $nombres = $data['nombreimhe'];
        $precios = $data['precioimhe'];
        $piezas = $data['piezaimhe'];
        $unidades = $data['unidadimhe'];
        $subtotales = $data['subtotalimhe'];
        $observacionesgrupo = $data['observacionesimhe'];
        $depertamentosgrupo = $data['departamentosimhe'];
        $subdepertamentosgrupo = $data['subdepartamentosimhe'];
        $incluyegrupo = $data['imheincluye'];
        $colors = $data['color_imhe_'];
        $statusreproceso = $data['reprocesstatusimhe'];
        $sku = $data['sku_imhe'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 5. insertar arreglo de Infantil Niño Y Niña Piso **************************

    function uploadProductosCompraInfantilNiñoYNiñaPiso($data)
    {
        $ids = $data['idinnpi'];
        $nombres = $data['nombreinnpi'];
        $precios = $data['precioinnpi'];
        $piezas = $data['piezainnpi'];
        $unidades = $data['unidadinnpi'];
        $subtotales = $data['subtotalinnpi'];
        $observacionesgrupo = $data['observacionesinnpi'];
        $depertamentosgrupo = $data['departamentosinnpi'];
        $subdepertamentosgrupo = $data['subdepartamentosinnpi'];
        $incluyegrupo = $data['innpiincluye'];
        $colors = $data['color_innpi_'];
        $statusreproceso = $data['reprocesstatusinnpi'];
        $sku = $data['sku_innpi'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 5. insertar arreglo de Infantil Niño Y Niña Perimetral **************************

    function uploadProductosCompraInfantilNiñoYNiñaPerimetral($data)
    {
        $ids = $data['idinnpe'];
        $nombres = $data['nombreinnpe'];
        $precios = $data['precioinnpe'];
        $piezas = $data['piezainnpe'];
        $unidades = $data['unidadinnpe'];
        $subtotales = $data['subtotalinnpe'];
        $observacionesgrupo = $data['observacionesinnpe'];
        $depertamentosgrupo = $data['departamentosinnpe'];
        $subdepertamentosgrupo = $data['subdepartamentosinnpe'];
        $incluyegrupo = $data['innpeincluye'];
        $colors = $data['color_innpe_'];
        $statusreproceso = $data['reprocesstatusinnpe'];
        $sku = $data['sku_innpe'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 6. insertar arreglo de Toddler Niño Niña Y Bebes Piso **************************

    function uploadProductosCompraToddlerNiñoNiñaYBebesPiso($data)
    {
        $ids = $data['idtnnbpi'];
        $nombres = $data['nombretnnbpi'];
        $precios = $data['preciotnnbpi'];
        $piezas = $data['piezatnnbpi'];
        $unidades = $data['unidadtnnbpi'];
        $subtotales = $data['subtotaltnnbpi'];
        $observacionesgrupo = $data['observacionestnnbpi'];
        $depertamentosgrupo = $data['departamentostnnbpi'];
        $subdepertamentosgrupo = $data['subdepartamentostnnbpi'];
        $incluyegrupo = $data['tnnbpiincluye'];
        $colors = $data['color_tnnbpi_'];
        $statusreproceso = $data['reprocesstatustnnbpi'];
        $sku = $data['sku_tnnbpi'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 6. insertar arreglo de Toddler Niño Niña Y Bebes Perimetral **************************

    function uploadProductosCompraToddlerNiñoNiñaYBebesPerimetral($data)
    {
        $ids = $data['idtnnbpe'];
        $nombres = $data['nombretnnbpe'];
        $precios = $data['preciotnnbpe'];
        $piezas = $data['piezatnnbpe'];
        $unidades = $data['unidadtnnbpe'];
        $subtotales = $data['subtotaltnnbpe'];
        $observacionesgrupo = $data['observacionestnnbpe'];
        $depertamentosgrupo = $data['departamentostnnbpe'];
        $subdepertamentosgrupo = $data['subdepartamentostnnbpe'];
        $incluyegrupo = $data['tnnbpeincluye'];
        $colors = $data['color_tnnbpe_'];
        $statusreproceso = $data['reprocesstatustnnbpe'];
        $sku = $data['sku_tnnbpe'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 7. insertar arreglo de Probadores Perimetral **************************

    function uploadProductosCompraHerrajes($data)
    {
        $ids = $data['idherna'];
        $nombres = $data['nombreherna'];
        $precios = $data['precioherna'];
        $piezas = $data['piezaherna'];
        $unidades = $data['unidadherna'];
        $subtotales = $data['subtotalherna'];
        $observacionesgrupo = $data['observacionesherna'];
        $depertamentosgrupo = $data['departamentosherna'];
        $subdepertamentosgrupo = $data['subdepartamentosherna'];
        $incluyegrupo = $data['hernaincluye'];
        $colors = $data['color_herna_'];
        $statusreproceso = $data['reprocesstatusherna'];
        $sku = $data['sku_herna'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 8. insertar arreglo de Probadores Piso **************************

    function uploadProductosCompraProbadoresPiso($data)
    {
        $ids = $data['idprobmpi'];
        $nombres = $data['nombreprobmpi'];
        $precios = $data['precioprobmpi'];
        $piezas = $data['piezaprobmpi'];
        $unidades = $data['unidadprobmpi'];
        $subtotales = $data['subtotalprobmpi'];
        $observacionesgrupo = $data['observacionesprobmpi'];
        $depertamentosgrupo = $data['departamentosprobmpi'];
        $subdepertamentosgrupo = $data['subdepartamentosprobmpi'];
        $incluyegrupo = $data['probmpiincluye'];
        $colors = $data['color_probmpi_'];
        $statusreproceso = $data['reprocesstatusprobmpi'];
        $sku = $data['sku_probmpi'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 9. insertar arreglo de Paneles Piso **************************

    function uploadProductosCompraPanelesPiso($data)
    {
        $ids = $data['idpanmpi'];
        $nombres = $data['nombrepanmpi'];
        $precios = $data['preciopanmpi'];
        $piezas = $data['piezapanmpi'];
        $unidades = $data['unidadpanmpi'];
        $subtotales = $data['subtotalpanmpi'];
        $observacionesgrupo = $data['observacionespanmpi'];
        $depertamentosgrupo = $data['departamentospanmpi'];
        $subdepertamentosgrupo = $data['subdepartamentospanmpi'];
        $incluyegrupo = $data['panmpiincluye'];
        $colors = $data['color_panmpi_'];
        $statusreproceso = $data['reprocesstatuspanmpi'];
        $sku = $data['sku_panmpi'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 10. insertar arreglo de extras piso **************************

    function uploadProductosCompraExtrasPiso($data)
    {
        $ids = $data['idextmpi'];
        $nombres = $data['nombreextmpi'];
        $precios = $data['precioextmpi'];
        $piezas = $data['piezaextmpi'];
        $unidades = $data['unidadextmpi'];
        $subtotales = $data['subtotalextmpi'];
        $observacionesgrupo = $data['observacionesextmpi'];
        $depertamentosgrupo = $data['departamentosextmpi'];
        $subdepertamentosgrupo = $data['subdepartamentosextmpi'];
        $incluyegrupo = $data['extmpiincluye'];
        $colors = $data['color_extmpi_'];
        $statusreproceso = $data['reprocesstatusextmpi'];
        $sku = $data['sku_extmpi'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 11. insertar arreglo de imagen pop **************************

    function uploadProductosCompraImagenPop($data)
    {
        $ids = $data['idimgp'];
        $nombres = $data['nombreimgp'];
        $precios = $data['precioimgp'];
        $piezas = $data['piezaimgp'];
        $unidades = $data['unidadimgp'];
        $subtotales = $data['subtotalimgp'];
        $observacionesgrupo = $data['observacionesimgp'];
        $depertamentosgrupo = $data['departamentosimgp'];
        $subdepertamentosgrupo = $data['subdepartamentosimgp'];
        $incluyegrupo = $data['imgpincluye'];
        $colors = $data['color_imgp_'];
        $statusreproceso = $data['reprocesstatusimgp'];
        $sku = $data['sku_imgp'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    //************************** 11. insertar arreglo de imagen maniquis **************************

    function uploadProductosCompraImagenManiquis($data)
    {
        $ids = $data['idimgm'];
        $nombres = $data['nombreimgm'];
        $precios = $data['precioimgm'];
        $piezas = $data['piezaimgm'];
        $unidades = $data['unidadimgm'];
        $subtotales = $data['subtotalimgm'];
        $observacionesgrupo = $data['observacionesimgm'];
        $depertamentosgrupo = $data['departamentosimgm'];
        $subdepertamentosgrupo = $data['subdepartamentosimgm'];
        $incluyegrupo = $data['imgmincluye'];
        $colors = $data['color_imgm_'];
        $statusreproceso = $data['reprocesstatusimgm'];
        $sku = $data['sku_imgm'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }
    //************************** 12. insertar arreglo otros **************************

    function uploadProductosCompraOtros($data)
    {
        $ids = $data['idots'];
        $nombres = $data['nombreots'];
        $precios = $data['precioots'];
        $piezas = $data['piezaots'];
        $unidades = $data['unidadots'];
        $subtotales = $data['subtotalots'];
        $observacionesgrupo = $data['observacionesots'];
        $depertamentosgrupo = $data['departamentosots'];
        $subdepertamentosgrupo = $data['subdepartamentosots'];
        $incluyegrupo = $data['otsincluye'];
        $colors = $data['color_ots_'];
        $statusreproceso = $data['reprocesstatusots'];
        $sku = $data['sku_ots'];
        if (
            is_array($ids) &&
            is_array($nombres) &&
            is_array($precios) &&
            is_array($piezas) &&
            is_array($unidades) &&
            is_array($subtotales) &&
            is_array($observacionesgrupo) &&
            is_array($depertamentosgrupo) &&
            is_array($subdepertamentosgrupo) &&
            is_array($incluyegrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($sku)
        ) {

            $size = sizeof($nombres);
            for ($i = 0; $i < $size; $i++) {

                $array = array(
                    "idprincipalproducto2" => $ids[$i],
                    "nombre" => $nombres[$i],
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "unidad" => $unidades[$i],
                    "subtotal" => $subtotales[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "departamentos" => $depertamentosgrupo[$i],
                    "subdepartamentos" => $subdepertamentosgrupo[$i],
                    "incluye" => $incluyegrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                    "numordencompra" => $data['numordencompra'],
                    "tienda" => $data['resultadotiendainput'],
                    "idtienda" => $data['idunicotiendas'],
                );
                $this->db->insert("detallecompras", $array);
            }
        }
    }

    function uploadOrdenCompra($data)
    {
        $array = array(
            "numordencompra" => $data['numordencompra'],
            "numordencompra2" => $data['numordencompra1000'],
            "tienda" => $data['resultadotiendainput'],
            "numerotienda" => $data['resultadonumerodelatiendainput'],
            "nombre" => $data['resultadonombreinput'],
            "proveedor" => $data['resultadoproveedorinput'],
            "cuentacliente" => $data['replicacuentacontable'],
            "tipotienda" => $data['replicatipotienda'],
            "ubicacion" => $data['replicaubicacion'],
        );
        $this->db->insert("numerocompra2", $array);
    }
    function uploadCentroCostos($data)
    {
        $array = array(
            "numordencompra" => $data['numordencompra'],
            "tienda" => $data['resultadotiendainput'],
            "totalmuebles" => $data['totalmuebles'],
            "porcentajemuebles" => $data['porcentajemuebles'],
            "totalherrajes" => $data['totalherrajes'],
            "porcentajeherrajes" => $data['porcentajeherrajes'],
            "totalextras" => $data['totalextras'],
            "porcentajextras" => $data['porcentajextras'],
            "totalinstalacionytransporte" => $data['totalinstalacionytransporte'],
            "porcentajeinstalacionytransporte" => $data['porcentajeinstalacionytransporte'],
            "totalpop" => $data['totalpop'],
            "porcentajepop" => $data['porcentajepop'],
            "totalmaniquis" => $data['totalmaniquis'],
            "porcentajemaniquis" => $data['porcentajemaniquis'],
            "totalotros" => $data['totalotros'],
            "porcentajeotros" => $data['porcentajeotros'],
            "totalmueblesherrajesextrasinstalacionytransportepopmaniquis" => $data['totalmueblesherrajesextrasinstalacionytransportepopmaniquis'],
            "totalmueblesherrajesextras" => $data['totalmueblesherrajesextras'],
            "m2" => $data['valorantespreciototal'],
            "fecha" => $data['fecha'],
            "fecha_entrega" => $data['fecha_entrega'],
            "totalentrevalorantespreciototalv1" => $data['totalentrevalorantespreciototalv1'],
            "totalentrevalorantespreciototal2v2" => $data['totalentrevalorantespreciototal2v2']
        );
        $this->db->insert("centrocostos", $array);
    }
    function uploadCentroCostosProveedor($data)
    {
        $array = array(
            "numordencompra" => $data['numordencompra'],
            "tienda" => $data['resultadotiendainput'],
            "totalmueblesprov" => $data['Tmuebprov'],
            "porcentajemueblesprov" => $data['Tmuebprovprc'],
            "totalherrajesprov" => $data['THerrprov'],
            "porcentajeherrajesprov" => $data['THerrprovprc'],
            "totalextrasprov" => $data['TExttotm2'],
            "porcentajextrasprov" => $data['TExtprovprc'],
            "totalmueblesherrajesextrasinstalacionytransportepopmaniquisprov" => $data['Tprovtot'],
            "totalmueblesherrajesextrasprov" => $data['Tprovtotmhe'],
            "totalentrevalorantespreciototalv1prov" => $data['Tprovtotm2'],
            "totalentrevalorantespreciototal2v2prov" => $data['Tprovtotmhem2'],
            "m2prov" => $data['valorantespreciototal'],
            "fechaprov" => $data['fecha'],
            "fecha_entregaprov" => $data['fecha_entrega'],
        );
        $this->db->insert("centrocostosprov", $array);
    }
    function uploadCentroCostosFinal($data)
    {
        $array = array(
            "numordencompra" => $data['numordencompra'],
            "tienda" => $data['resultadotiendainput'],
            "totalmueblesherrajesextrasinstalacionytransportepopmaniquis3" => $data['totalmueblesherrajesextrasinstalacionytransportepopmaniquis3'],
            "anticipo" => $data['anticipo'],
            "totalconiva" => $data['totalconiva'],
            //"m2" => $data['mismom2inicio'],
            "m2" => $data['valorantespreciototal'],
            "anticipoconiva" => $data['anticipoconiva'],
            "totaltiendav2" => $data['totaltiendav2'],
            "totaltiendaanticipov2" => $data['totaltiendaanticipov2'],
            "m2tiendafinalv2" => $data['m2tiendafinalv2'],
            "finiquitov2" => $data['finiquitov2']
        );
        $this->db->insert("centrocostosfinal", $array);
    }
    function uploadCentroCostosFinalProveedor($data)
    {
        $array = array(
            "numordencompra" => $data['numordencompra'],
            "tienda" => $data['resultadotiendainput'],
            "totalmueblesherrajesextrasinstalacionytransportepopmaniquis3prov" => $data['Tprovfin'],
            "anticipoprov" => $data['Tprovfin30prc'],
            "totalconivaprov" => $data['Tprovfin16prc'],
            "anticipoconivaprov" => $data['Tprovfin16prc30prc'],
            "m2prov" => $data['valorantespreciototal'],
            "totaltiendav2prov" => $data['Tprovtotfin'],
            "totaltiendaanticipov2prov" => $data['Tprovtotfin30prc'],
            "m2tiendafinalv2prov" => $data['m2tiendafinalv2prov'],
            "finiquitov2prov" => $data['Tprovfiniquito']
        );
        $this->db->insert("centrocostosfinalprov", $array);
    }
    function uploadSubtotalesFinal($data)
    {
        $array = array(
            "numordencompra" => $data['numordencompra'],
            "tienda" => $data['resultadotiendainput'],
            "finalent" => $data['finalent'],
            "finaldcmpi" => $data['finaldcmpi'],
            "finaldcmpe" => $data['finaldcmpe'],
            "finalmhjmpi" => $data['finalmhjmpi'],
            "finalmhjmpe" => $data['finalmhjmpe'],
            "finalmhjmpje" => $data['finalmhjmpje'],
            "finalmhjmpli" => $data['finalmhjmpli'],
            "finalimpi" => $data['finalimpi'],
            "finalimpe" => $data['finalimpe'],
            "finalimhe" => $data['finalimhe'],
            "finalinnpi" => $data['finalinnpi'],
            "finalinnpe" => $data['finalinnpe'],
            "finaltnnbpi" => $data['finaltnnbpi'],
            "finaltnnbpe" => $data['finaltnnbpe'],
            "finalherna" => $data['finalherna'],
            "finalprobmpi" => $data['finalprobmpi'],
            "finalpanmpi" => $data['finalpanmpi'],
            "finalextmpi" => $data['finalextmpi'],
            "finalextmpiprov" => $data['finalextmpiprov'],
            "finalimgp" => $data['finalimgp'],
            "finalimgm" => $data['finalimgm'],
            "finalots" => $data['finalots'],
        );
        $this->db->insert("subtotales", $array);
    }

    function getNumeroDeCompraPorId($numordencompra)
    {
        $this->db->select("*");
        $this->db->from("numerocompra2");
        $this->db->where("numordencompra", $numordencompra);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //VISTA DETALLECOMPRA 1 COMPLETO
    function getActualizaSubtotales($data)
    {
        $this->db->where('numordencompra', $data['numordencompra']);
        $this->db->update('subtotales', $data);
    }
    function getActualizaCentrocostos($data2)
    {
        $this->db->where('numordencompra', $data2['numordencompra']);
        $this->db->update('centrocostos', $data2);
    }
    function getActualizaCentrocostosFinal($data3)
    {
        $this->db->where('numordencompra', $data3['numordencompra']);
        $this->db->update('centrocostosfinal', $data3);
    }


    //PENDIENTE
    function getActualizaCentrocostos2($data2)
    {
        $this->db->where('numordencompra', $data2['numordencompra']);
        $this->db->update('centrocostos', $data2);
    }
    function getActualizaCentrocostosFinal2($data3)
    {
        $this->db->where('numordencompra', $data3['numordencompra']);
        $this->db->update('centrocostosfinal', $data3);
    }


    //VISTA DETALLECOMPRA 2 SOLO PROVEEDOR
    function getActualizaSubtotales2($data)
    {
        $this->db->where('numordencompra', $data['numordencompra']);
        $this->db->update('subtotales', $data);
    }
    function getActualizaCentrocostos2_2($data2)
    {
        $this->db->where('numordencompra', $data2['numordencompra']);
        $this->db->update('centrocostosprov', $data2);
    }
    function getActualizaCentrocostosFinal2_2($data3)
    {
        $this->db->where('numordencompra', $data3['numordencompra']);
        $this->db->update('centrocostosfinalprov', $data3);
    }


    //************************** actualizar arreglo de entrada no aplica **************************
    function getguardarCambiosCompraEntrada($data4)
    {
        //recibe los arreglos en este caso de la funcion actualizarSubtotales(){} y los convierte a variables iterables
        //se recorren mediante un for para medir su tamaño
        //finamente se actualizan con la variable que contiene los ids convertidos tambien en un arreglo iterable
        $ids = $data4['id'];
        $precios = $data4['precio'];
        $piezas = $data4['pieza'];
        $subtotalesgrupo = $data4['subtotal'];
        $observacionesgrupo = $data4['observaciones'];
        $colors = $data4['color'];
        $statusreproceso = $data4['statusreproceso'];
        $sku = $data4['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data4['numordencompra']);
                $this->db->where('id', $ids[$i]); //variable con ids iterables
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero piso **************************
    function getguardarCambiosCompraDamaYCaballeroPiso($data5)
    {
        $ids = $data5['id'];
        $precios = $data5['precio'];
        $piezas = $data5['pieza'];
        $subtotalesgrupo = $data5['subtotal'];
        $observacionesgrupo = $data5['observaciones'];
        $colors = $data5['color'];
        $statusreproceso = $data5['statusreproceso'];
        $sku = $data5['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data5['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraDamaYCaballeroPerimetral($data6)
    {
        $ids = $data6['id'];
        $precios = $data6['precio'];
        $piezas = $data6['pieza'];
        $subtotalesgrupo = $data6['subtotal'];
        $observacionesgrupo = $data6['observaciones'];
        $colors = $data6['color'];
        $statusreproceso = $data6['statusreproceso'];
        $sku = $data6['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data6['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraMujerHombreJrPiso($data7)
    {
        $ids = $data7['id'];
        $precios = $data7['precio'];
        $piezas = $data7['pieza'];
        $subtotalesgrupo = $data7['subtotal'];
        $observacionesgrupo = $data7['observaciones'];
        $colors = $data7['color'];
        $statusreproceso = $data7['statusreproceso'];
        $sku = $data7['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data7['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraMujerHombreJrPerimetral($data8)
    {
        $ids = $data8['id'];
        $precios = $data8['precio'];
        $piezas = $data8['pieza'];
        $subtotalesgrupo = $data8['subtotal'];
        $observacionesgrupo = $data8['observaciones'];
        $colors = $data8['color'];
        $statusreproceso = $data8['statusreproceso'];
        $sku = $data8['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data8['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraMujerHombreJrJeans($data9)
    {
        $ids = $data9['id'];
        $precios = $data9['precio'];
        $piezas = $data9['pieza'];
        $subtotalesgrupo = $data9['subtotal'];
        $observacionesgrupo = $data9['observaciones'];
        $colors = $data9['color'];
        $statusreproceso = $data9['statusreproceso'];
        $sku = $data9['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data9['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraMujerHombreJrLicencias($data10)
    {
        $ids = $data10['id'];
        $precios = $data10['precio'];
        $piezas = $data10['pieza'];
        $subtotalesgrupo = $data10['subtotal'];
        $observacionesgrupo = $data10['observaciones'];
        $colors = $data10['color'];
        $statusreproceso = $data10['statusreproceso'];
        $sku = $data10['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data10['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraInteriorMujerPiso($data11)
    {
        $ids = $data11['id'];
        $precios = $data11['precio'];
        $piezas = $data11['pieza'];
        $subtotalesgrupo = $data11['subtotal'];
        $observacionesgrupo = $data11['observaciones'];
        $colors = $data11['color'];
        $statusreproceso = $data11['statusreproceso'];
        $sku = $data11['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data11['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraInteriorMujerPerimetral($data12)
    {
        $ids = $data12['id'];
        $precios = $data12['precio'];
        $piezas = $data12['pieza'];
        $subtotalesgrupo = $data12['subtotal'];
        $observacionesgrupo = $data12['observaciones'];
        $colors = $data12['color'];
        $statusreproceso = $data12['statusreproceso'];
        $sku = $data12['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data12['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraInteriorMujerHerraje($data13)
    {
        $ids = $data13['id'];
        $precios = $data13['precio'];
        $piezas = $data13['pieza'];
        $subtotalesgrupo = $data13['subtotal'];
        $observacionesgrupo = $data13['observaciones'];
        $colors = $data13['color'];
        $statusreproceso = $data13['statusreproceso'];
        $sku = $data13['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data13['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraInfantilNiñoYNiñaPiso($data14)
    {
        $ids = $data14['id'];
        $precios = $data14['precio'];
        $piezas = $data14['pieza'];
        $subtotalesgrupo = $data14['subtotal'];
        $observacionesgrupo = $data14['observaciones'];
        $colors = $data14['color'];
        $statusreproceso = $data14['statusreproceso'];
        $sku = $data14['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data14['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraInfantilNiñoYNiñaPerimetral($data15)
    {
        $ids = $data15['id'];
        $precios = $data15['precio'];
        $piezas = $data15['pieza'];
        $subtotalesgrupo = $data15['subtotal'];
        $observacionesgrupo = $data15['observaciones'];
        $colors = $data15['color'];
        $statusreproceso = $data15['statusreproceso'];
        $sku = $data15['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data15['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraToddlerNiñoNiñaYBebesPiso($data16)
    {
        $ids = $data16['id'];
        $precios = $data16['precio'];
        $piezas = $data16['pieza'];
        $subtotalesgrupo = $data16['subtotal'];
        $observacionesgrupo = $data16['observaciones'];
        $colors = $data16['color'];
        $statusreproceso = $data16['statusreproceso'];
        $sku = $data16['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data16['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraToddlerNiñoNiñaYBebesPerimetral($data17)
    {
        $ids = $data17['id'];
        $precios = $data17['precio'];
        $piezas = $data17['pieza'];
        $subtotalesgrupo = $data17['subtotal'];
        $observacionesgrupo = $data17['observaciones'];
        $colors = $data17['color'];
        $statusreproceso = $data17['statusreproceso'];
        $sku = $data17['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data17['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraHerraje($data18)
    {
        $ids = $data18['id'];
        $precios = $data18['precio'];
        $piezas = $data18['pieza'];
        $subtotalesgrupo = $data18['subtotal'];
        $observacionesgrupo = $data18['observaciones'];
        $colors = $data18['color'];
        $statusreproceso = $data18['statusreproceso'];
        $sku = $data18['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data18['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraProbadoresPiso($data19)
    {
        $ids = $data19['id'];
        $precios = $data19['precio'];
        $piezas = $data19['pieza'];
        $subtotalesgrupo = $data19['subtotal'];
        $observacionesgrupo = $data19['observaciones'];
        $colors = $data19['color'];
        $statusreproceso = $data19['statusreproceso'];
        $sku = $data19['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data19['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraPanelesPiso($data20)
    {
        $ids = $data20['id'];
        $precios = $data20['precio'];
        $piezas = $data20['pieza'];
        $subtotalesgrupo = $data20['subtotal'];
        $observacionesgrupo = $data20['observaciones'];
        $colors = $data20['color'];
        $statusreproceso = $data20['statusreproceso'];
        $sku = $data20['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data20['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraExtrasPiso($data21)
    {
        $ids = $data21['id'];
        $precios = $data21['precio'];
        $piezas = $data21['pieza'];
        $subtotalesgrupo = $data21['subtotal'];
        $observacionesgrupo = $data21['observaciones'];
        $colors = $data21['color'];
        $statusreproceso = $data21['statusreproceso'];
        $sku = $data21['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data21['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraImagenPop($data22)
    {
        $ids = $data22['id'];
        $precios = $data22['precio'];
        $piezas = $data22['pieza'];
        $subtotalesgrupo = $data22['subtotal'];
        $observacionesgrupo = $data22['observaciones'];
        $colors = $data22['color'];
        $statusreproceso = $data22['statusreproceso'];
        $sku = $data22['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data22['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraImagenManiquis($data23)
    {
        $ids = $data23['id'];
        $precios = $data23['precio'];
        $piezas = $data23['pieza'];
        $subtotalesgrupo = $data23['subtotal'];
        $observacionesgrupo = $data23['observaciones'];
        $colors = $data23['color'];
        $statusreproceso = $data23['statusreproceso'];
        $sku = $data23['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data23['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraOtrosNoAplica($data24)
    {
        $ids = $data24['id'];
        $precios = $data24['precio'];
        $piezas = $data24['pieza'];
        $subtotalesgrupo = $data24['subtotal'];
        $observacionesgrupo = $data24['observaciones'];
        $colors = $data24['color'];
        $statusreproceso = $data24['statusreproceso'];
        $sku = $data24['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data24['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }


    function getactualizaProveedores($data)
    {
        $ids = $data['id'];
        $proveedores = $data['proveedor'];
        if (
            is_array($ids) &&
            is_array($proveedores)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "id" => $ids[$i],
                    "proveedor" => $proveedores[$i]
                );
                $this->db->where('id', $ids[$i]);
                $this->db->update("proveedores", $array);
            }
        }
    }
    function getactualizaNombres($data)
    {
        $ids = $data['id'];
        $nombresgrupo = $data['nombre'];
        if (
            is_array($ids) &&
            is_array($nombresgrupo)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "id" => $ids[$i],
                    "nombre" => $nombresgrupo[$i]
                );
                $this->db->where('id', $ids[$i]);
                $this->db->update("nombreusuario", $array);
            }
        }
    }
    function getactualizaTiendas($data)
    {
        $ids = $data['id'];
        $numerogrupo = $data['numerodetienda'];
        $nombregrupo = $data['nombre'];
        $añogrupo = $data['año'];
        $construcciongrupo = $data['construccion'];
        $localgrupo = $data['local'];
        //$escaparatesgrupo = $data['escaparates'];
        //$bannersgrupo = $data['banners'];
        $deptosgrupo = $data['deptos'];
        //$interiordamasgrupo = $data['interiordamas'];
        //$comentariosdeinteriordamasgrupo = $data['comentariosdeinteriordamas'];
        //$m2interiormujergrupo = $data['m2interiormujer'];
        $m2pisoventagrupo = $data['m2pisoventa'];
        $m2bodegagrupo = $data['m2bodega'];
        $centro_costos = $data['centro_costos'];
        $ubicacion_td = $data['ubicacion_td'];
        if (
            is_array($ids) &&
            is_array($numerogrupo) &&
            is_array($nombregrupo) &&
            is_array($añogrupo) &&
            is_array($construcciongrupo) &&
            is_array($localgrupo) &&
            //is_array($escaparatesgrupo) &&
            //is_array($bannersgrupo) &&
            is_array($deptosgrupo) &&
            //is_array($interiordamasgrupo) &&
            //is_array($comentariosdeinteriordamasgrupo) &&
            //is_array($m2interiormujergrupo) &&
            is_array($m2pisoventagrupo) &&
            is_array($m2bodegagrupo) &&
            is_array($centro_costos) &&
            is_array($ubicacion_td)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "id" => $ids[$i],
                    "numerodetienda" => $numerogrupo[$i],
                    "nombre" => $nombregrupo[$i],
                    "año" => $añogrupo[$i],
                    "construccion" => $construcciongrupo[$i],
                    "local" => $localgrupo[$i],
                    //"escaparates"=>$escaparatesgrupo[$i],
                    //"banners"=>$bannersgrupo[$i],
                    "deptos" => $deptosgrupo[$i],
                    //"interiordamas"=>$interiordamasgrupo[$i],
                    //"comentariosdeinteriordamas"=>$comentariosdeinteriordamasgrupo[$i],
                    //"m2interiormujer"=>$m2interiormujergrupo[$i],
                    "m2pisoventa" => $m2pisoventagrupo[$i],
                    "m2bodega" => $m2bodegagrupo[$i],
                    "centro_costos" => $centro_costos[$i],
                    "ubicacion_td" => $ubicacion_td[$i]
                );
                $this->db->where('id', $ids[$i]);
                $this->db->update("tienda", $array);
            }
        }
    }
    function getactualizaTiendasObs($data)
    {
        $ids = $data['id'];
        $colors = $data['color'];
        $observacionesg = $data['observaciones'];
        if (
            is_array($ids) &&
            is_array($colors) &&
            is_array($observacionesg)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "id" => $ids[$i],
                    "color" => $colors[$i],
                    "observaciones" => $observacionesg[$i],
                );
                $this->db->where('id', $ids[$i]);
                $this->db->update("tienda", $array);
            }
        }
    }











    function getguardarCambiosCompraEntrada2($data4)
    {
        $ids = $data4['id'];
        $precios = $data4['precio'];
        $piezas = $data4['pieza'];
        $subtotalesgrupo = $data4['subtotal'];
        $observacionesgrupo = $data4['observaciones'];
        $colors = $data4['color'];
        $statusreproceso = $data4['statusreproceso'];
        $sku = $data4['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data4['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    function getguardarCambiosCompraDamaYCaballeroPiso2($data5)
    {
        $ids = $data5['id'];
        $precios = $data5['precio'];
        $piezas = $data5['pieza'];
        $subtotalesgrupo = $data5['subtotal'];
        $observacionesgrupo = $data5['observaciones'];
        $colors = $data5['color'];
        $statusreproceso = $data5['statusreproceso'];
        $sku = $data5['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data5['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraDamaYCaballeroPerimetral2($data6)
    {
        $ids = $data6['id'];
        $precios = $data6['precio'];
        $piezas = $data6['pieza'];
        $subtotalesgrupo = $data6['subtotal'];
        $observacionesgrupo = $data6['observaciones'];
        $colors = $data6['color'];
        $statusreproceso = $data6['statusreproceso'];
        $sku = $data6['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data6['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraMujerHombreJrPiso2($data7)
    {
        $ids = $data7['id'];
        $precios = $data7['precio'];
        $piezas = $data7['pieza'];
        $subtotalesgrupo = $data7['subtotal'];
        $observacionesgrupo = $data7['observaciones'];
        $colors = $data7['color'];
        $statusreproceso = $data7['statusreproceso'];
        $sku = $data7['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data7['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraMujerHombreJrPerimetral2($data8)
    {
        $ids = $data8['id'];
        $precios = $data8['precio'];
        $piezas = $data8['pieza'];
        $subtotalesgrupo = $data8['subtotal'];
        $observacionesgrupo = $data8['observaciones'];
        $colors = $data8['color'];
        $statusreproceso = $data8['statusreproceso'];
        $sku = $data8['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data8['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraMujerHombreJrJeans2($data9)
    {
        $ids = $data9['id'];
        $precios = $data9['precio'];
        $piezas = $data9['pieza'];
        $subtotalesgrupo = $data9['subtotal'];
        $observacionesgrupo = $data9['observaciones'];
        $colors = $data9['color'];
        $statusreproceso = $data9['statusreproceso'];
        $sku = $data9['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data9['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraMujerHombreJrLicencias2($data10)
    {
        $ids = $data10['id'];
        $precios = $data10['precio'];
        $piezas = $data10['pieza'];
        $subtotalesgrupo = $data10['subtotal'];
        $observacionesgrupo = $data10['observaciones'];
        $colors = $data10['color'];
        $statusreproceso = $data10['statusreproceso'];
        $sku = $data10['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data10['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraInteriorMujerPiso2($data11)
    {
        $ids = $data11['id'];
        $precios = $data11['precio'];
        $piezas = $data11['pieza'];
        $subtotalesgrupo = $data11['subtotal'];
        $observacionesgrupo = $data11['observaciones'];
        $colors = $data11['color'];
        $statusreproceso = $data11['statusreproceso'];
        $sku = $data11['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data11['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraInteriorMujerPerimetral2($data12)
    {
        $ids = $data12['id'];
        $precios = $data12['precio'];
        $piezas = $data12['pieza'];
        $subtotalesgrupo = $data12['subtotal'];
        $observacionesgrupo = $data12['observaciones'];
        $colors = $data12['color'];
        $statusreproceso = $data12['statusreproceso'];
        $sku = $data12['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data12['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraInteriorMujerHerraje2($data13)
    {
        $ids = $data13['id'];
        $precios = $data13['precio'];
        $piezas = $data13['pieza'];
        $subtotalesgrupo = $data13['subtotal'];
        $observacionesgrupo = $data13['observaciones'];
        $colors = $data13['color'];
        $statusreproceso = $data13['statusreproceso'];
        $sku = $data13['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data13['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraInfantilNiñoYNiñaPiso2($data14)
    {
        $ids = $data14['id'];
        $precios = $data14['precio'];
        $piezas = $data14['pieza'];
        $subtotalesgrupo = $data14['subtotal'];
        $observacionesgrupo = $data14['observaciones'];
        $colors = $data14['color'];
        $statusreproceso = $data14['statusreproceso'];
        $sku = $data14['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data14['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraInfantilNiñoYNiñaPerimetral2($data15)
    {
        $ids = $data15['id'];
        $precios = $data15['precio'];
        $piezas = $data15['pieza'];
        $subtotalesgrupo = $data15['subtotal'];
        $observacionesgrupo = $data15['observaciones'];
        $colors = $data15['color'];
        $statusreproceso = $data15['statusreproceso'];
        $sku = $data15['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data15['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraToddlerNiñoNiñaYBebesPiso2($data16)
    {
        $ids = $data16['id'];
        $precios = $data16['precio'];
        $piezas = $data16['pieza'];
        $subtotalesgrupo = $data16['subtotal'];
        $observacionesgrupo = $data16['observaciones'];
        $colors = $data16['color'];
        $statusreproceso = $data16['statusreproceso'];
        $sku = $data16['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data16['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraToddlerNiñoNiñaYBebesPerimetral2($data17)
    {
        $ids = $data17['id'];
        $precios = $data17['precio'];
        $piezas = $data17['pieza'];
        $subtotalesgrupo = $data17['subtotal'];
        $observacionesgrupo = $data17['observaciones'];
        $colors = $data17['color'];
        $statusreproceso = $data17['statusreproceso'];
        $sku = $data17['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data17['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraHerraje2($data18)
    {
        $ids = $data18['id'];
        $precios = $data18['precio'];
        $piezas = $data18['pieza'];
        $subtotalesgrupo = $data18['subtotal'];
        $observacionesgrupo = $data18['observaciones'];
        $colors = $data18['color'];
        $statusreproceso = $data18['statusreproceso'];
        $sku = $data18['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data18['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraProbadoresPiso2($data19)
    {
        $ids = $data19['id'];
        $precios = $data19['precio'];
        $piezas = $data19['pieza'];
        $subtotalesgrupo = $data19['subtotal'];
        $observacionesgrupo = $data19['observaciones'];
        $colors = $data19['color'];
        $statusreproceso = $data19['statusreproceso'];
        $sku = $data19['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data19['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    //************************** actualizar arreglo de dama y caballero perimetral **************************
    function getguardarCambiosCompraPanelesPiso2($data20)
    {
        $ids = $data20['id'];
        $precios = $data20['precio'];
        $piezas = $data20['pieza'];
        $subtotalesgrupo = $data20['subtotal'];
        $observacionesgrupo = $data20['observaciones'];
        $colors = $data20['color'];
        $statusreproceso = $data20['statusreproceso'];
        $sku = $data20['sku'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($statusreproceso) &&
            is_array($ids) &&
            is_array($sku)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "statusreproceso" => $statusreproceso[$i],
                    "color" => $colors[$i],
                    "sku" => $sku[$i],
                );
                $this->db->where('numordencompra', $data20['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }
    /*
    function getguardarCambiosCompraExtrasPiso2($data21)
    {
        $ids = $data21['id'];
        $precios = $data21['precio'];
        $piezas = $data21['pieza'];
        $subtotalesgrupo = $data21['subtotal'];
        $observacionesgrupo = $data21['observaciones'];
        $colors = $data21['color'];
        if (
            is_array($precios) &&
            is_array($piezas) &&
            is_array($subtotalesgrupo) &&
            is_array($observacionesgrupo) &&
            is_array($colors) &&
            is_array($ids)
        ) {
            $size = sizeof($ids);

            for ($i = 0; $i < $size; $i++) {
                $array = array(
                    "precio" => $precios[$i],
                    "pieza" => $piezas[$i],
                    "subtotal" => $subtotalesgrupo[$i],
                    "observaciones" => $observacionesgrupo[$i],
                    "color" => $colors[$i],
                );
                $this->db->where('numordencompra', $data21['numordencompra']);
                $this->db->where('id', $ids[$i]);
                $this->db->update("detallecompras", $array);
            }
        }
    }*/









    /*TRAER PRODUCTOS INCIA*/
    function getProductos()
    {
        $this->db->select("a.*, COALESCE(b.id, '') as id2, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof, COALESCE(b.id_producto, '') as id_producto");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto = a.id", "left");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function contenidoPapelera()
    {
        $this->db->select("*");
        $this->db->from("productos");
        $this->db->where("deleted", 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function contenidoPapelera2()
    {
        $this->db->select("*");
        $this->db->from("numerocompra2");
        $this->db->where("eliminado", 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function contenidoPapeleraProv()
    {
        $this->db->select("*");
        $this->db->from("detallecompras");
        $this->db->where("deleted2", 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function contenidoPapeleraPendientes($ordenpendiente)
    {
        $this->db->select("*");
        $this->db->from("temporales");
        $this->db->where("deleted", 1);
        $this->db->where("ordenpendiente", $ordenpendiente);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function contenidoPapeleraOrdPdnt()
    {
        $this->db->select("*");
        $this->db->from("temporalesdetalle");
        $this->db->where("deleted", 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function MuestrameCompra()
    {
        $this->db->select("*");
        $this->db->from("productos");
        $this->db->where("status", "Activo");
        $this->db->where("deleted", 0);
        $this->db->where("carrito", 1);


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function contenidoCarrito()
    {
        $this->db->select("*");
        $this->db->from("numerocompra2");
        $this->db->where("eliminado", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getVentaproductos($status)
    {
        $this->db->select("*");
        $this->db->from("productos");
        $this->db->where("status", "Activo");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //1. TRAER PROD ENTRADA
    function getProductosEntrada()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "entrada");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //2. TRAER PROD DAMA Y CABALLERO
    function getProductosDamaYCaballeroPiso()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "dama y caballero");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosDamaYCaballeroPerimetral()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "dama y caballero");
        $this->db->where("a.subdepartamentos", "mobiliario perimetral");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //3. TRAER PROD MUJER HOMBRE JR
    function getProductosMujerHombreJrPiso()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "mujer hombre jr");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosMujerHombreJrPerimetral()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "mujer hombre jr");
        $this->db->where("a.subdepartamentos", "mobiliario perimetral");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosMujerHombreJrJeans()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "mujer hombre jr");
        $this->db->where("a.subdepartamentos", "mobiliario perimetro jeans");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosMujerHombreJrLicencias()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "mujer hombre jr");
        $this->db->where("a.subdepartamentos", "mobiliario perimetro licencias");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //4. TRAER PROD INTERIOR MUJER
    function getProductosInteriorMujerPiso()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "interior mujer");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosInteriorMujerPerimetral()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "interior mujer");
        $this->db->where("a.subdepartamentos", "mobiliario perimetral");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosInteriorMujerHerraje()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "interior mujer");
        $this->db->where("a.subdepartamentos", "herraje");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //5. TRAER PROD INFANTIL NIÑO Y NIÑA
    function getProductosInfantilNiñoYNiñaPiso()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "infantil niño y niña");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosInfantilNiñoYNiñaPerimetral()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "infantil niño y niña");
        $this->db->where("a.subdepartamentos", "mobiliario perimetral");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //6. TRAER PROD TODDLER NIÑO NIÑA Y BEBES
    function getProductosToddlerNiñoNiñaYBebesPiso()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "toddler niño niña y bebes");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosToddlerNiñoNiñaYBebesPerimetral()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "toddler niño niña y bebes");
        $this->db->where("a.subdepartamentos", "mobiliario perimetral");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //7. TRAER PROD HERRAJE
    function getProductosHerrajeNoAplica()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "herrajes");
        $this->db->where("a.subdepartamentos", "no aplica");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //8. TRAER PROD PROBADORES
    function getProductosProbadoresPiso()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "probadores");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //9. TRAER PROD PANELES
    function getProductosPanelesPiso()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "paneles");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //10. TRAER PROD EXTRAS
    function getProductosExtrasPiso()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "extras");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //11. TRAER PROD IMAGEN
    function getProductosImagenPop()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "imagen");
        $this->db->where("a.subdepartamentos", "pop");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosImagenManiquis()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "imagen");
        $this->db->where("a.subdepartamentos", "maniquis");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //12. TRAER PROD OTROS
    function getProductosOtros()
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("productos a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.id", "left");
        $this->db->where("a.departamentos", "otros");
        $this->db->where("a.subdepartamentos", "no aplica");
        $this->db->where("a.status", "Activo");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }




    function getOrdenDeCompra($numordencompra)
    {
        $this->db->select($numordencompra);
        $this->db->from("detallecompras");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getDepartamentos()
    {
        $this->db->select("*");
        $this->db->from("departamentos");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getSubdepartamentos($nombre)
    {
        $this->db->select("*");
        $this->db->from("subdepartamentos");
        $this->db->where("nombre_departamento", $nombre);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getNumerodetienda($nombre)
    {
        $this->db->select("*");
        $this->db->from("tienda");
        $this->db->where("nombre", $nombre);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getm2detienda($nombre)
    {
        $this->db->select("*");
        $this->db->from("tienda");
        $this->db->where("nombre", $nombre);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getnumdetienda($nombre)
    {
        $this->db->select("*");
        $this->db->from("tienda");
        $this->db->where("nombre", $nombre);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getcentrocostos_after($tienda)
    {
        $this->db->select("*");
        $this->db->from("tienda");
        $this->db->where("nombre", $tienda);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function gettraerubicacion($tienda)
    {
        $this->db->select("*");
        $this->db->from("tienda");
        $this->db->where("nombre", $tienda);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getM2Tiendas($nombre)
    {
        $this->db->select("m2pisoventa");
        $this->db->from("tienda");
        $this->db->where("nombre", $nombre);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function verdetallecomprapororden($numordencompra)
    {
        $this->db->select("*");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "entrada");



        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    /*TRAER PRODUCTOS FINALIZA*/


    function get_centrocostos_by_tienda($tienda_name)
    {
        $this->db->select("*");
        $this->db->where("nombre", $tienda_name);
        $this->db->from("tienda");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //1. TRAER PROD ENTRADA
    function getProductosEntrada2($numordencompra)
    {
        /*
        $this->db->select("*");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "entrada");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }*/

        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "entrada");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //2. TRAER PROD DAMA Y CABALLERO
    function getProductosDamaYCaballeroPiso2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "dama y caballero");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosDamaYCaballeroPerimetral2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "dama y caballero");
        $this->db->where("a.subdepartamentos", "mobiliario perimetral");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //3. TRAER PROD MUJER HOMBRE JR
    function getProductosMujerHombreJrPiso2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "mujer hombre jr");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosMujerHombreJrPerimetral2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "mujer hombre jr");
        $this->db->where("a.subdepartamentos", "mobiliario perimetral");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosMujerHombreJrJeans2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "mujer hombre jr");
        $this->db->where("a.subdepartamentos", "mobiliario perimetro jeans");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosMujerHombreJrLicencias2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "mujer hombre jr");
        $this->db->where("a.subdepartamentos", "mobiliario perimetro licencias");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //4. TRAER PROD INTERIOR MUJER
    function getProductosInteriorMujerPiso2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "interior mujer");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosInteriorMujerPerimetral2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "interior mujer");
        $this->db->where("a.subdepartamentos", "mobiliario perimetral");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosInteriorMujerHerraje2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "interior mujer");
        $this->db->where("a.subdepartamentos", "herraje");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //5. TRAER PROD INFANTIL NIÑO Y NIÑA
    function getProductosInfantilNiñoYNiñaPiso2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "infantil niño y niña");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosInfantilNiñoYNiñaPerimetral2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "infantil niño y niña");
        $this->db->where("a.subdepartamentos", "mobiliario perimetral");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //6. TRAER PROD TODDLER NIÑO NIÑA Y BEBES
    function getProductosToddlerNiñoNiñaYBebesPiso2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "toddler niño niña y bebes");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosToddlerNiñoNiñaYBebesPerimetral2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "toddler niño niña y bebes");
        $this->db->where("a.subdepartamentos", "mobiliario perimetral");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //7. TRAER PROD HERRAJE
    function getProductosHerrajeNoAplica2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "herrajes");
        $this->db->where("a.subdepartamentos", "no aplica");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //8. TRAER PROD PROBADORES
    function getProductosProbadoresPiso2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "probadores");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //9. TRAER PROD PANELES
    function getProductosPanelesPiso2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "paneles");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //10. TRAER PROD EXTRAS
    function getProductosExtrasPiso2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "extras");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    function getProductosExtrasPiso2_2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "extras");
        $this->db->where("a.subdepartamentos", "mobiliario de piso");
        $this->db->where("a.deleted", 0);
        $this->db->where("a.deleted2", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //11. TRAER PROD IMAGEN
    function getProductosImagenPop2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "imagen");
        $this->db->where("a.subdepartamentos", "pop");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosImagenManiquis2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "imagen");
        $this->db->where("a.subdepartamentos", "maniquis");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //12. TRAER PROD OTROS
    function getProductosOtrosNoAplica2($numordencompra)
    {
        $this->db->select("a.*, COALESCE(b.cc31, '') as cc31, COALESCE(b.cc33, '') as cc33, COALESCE(b.cc34, '') as cc34, COALESCE(b.cc31r, '') as cc31r, COALESCE(b.cc33r, '') as cc33r, COALESCE(b.cc34r, '') as cc34r, COALESCE(b.activof, '') as activof");
        $this->db->from("detallecompras a");
        $this->db->join("rel_sku_prod b", "b.id_producto=a.idprincipalproducto2", "left");
        $this->db->where("a.numordencompra", $numordencompra);
        $this->db->where("a.departamentos", "otros");
        $this->db->where("a.subdepartamentos", "no aplica");
        $this->db->where("a.deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


















    //1. TRAER PROD ENTRADA
    function getProductosEntrada2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "entrada");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //2. TRAER PROD DAMA Y CABALLERO
    function getProductosDamaYCaballeroPiso2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "dama y caballero");
        $this->db->where("subdepartamentos", "mobiliario de piso");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosDamaYCaballeroPerimetral2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "dama y caballero");
        $this->db->where("subdepartamentos", "mobiliario perimetral");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //3. TRAER PROD MUJER HOMBRE JR
    function getProductosMujerHombreJrPiso2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "mujer hombre jr");
        $this->db->where("subdepartamentos", "mobiliario de piso");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosMujerHombreJrPerimetral2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "mujer hombre jr");
        $this->db->where("subdepartamentos", "mobiliario perimetral");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosMujerHombreJrJeans2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "mujer hombre jr");
        $this->db->where("subdepartamentos", "mobiliario perimetro jeans");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosMujerHombreJrLicencias2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "mujer hombre jr");
        $this->db->where("subdepartamentos", "mobiliario perimetro licencias");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //4. TRAER PROD INTERIOR MUJER
    function getProductosInteriorMujerPiso2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "interior mujer");
        $this->db->where("subdepartamentos", "mobiliario de piso");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosInteriorMujerPerimetral2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "interior mujer");
        $this->db->where("subdepartamentos", "mobiliario perimetral");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosInteriorMujerHerraje2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "interior mujer");
        $this->db->where("subdepartamentos", "herraje");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //5. TRAER PROD INFANTIL NIÑO Y NIÑA
    function getProductosInfantilNiñoYNiñaPiso2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "infantil niño y niña");
        $this->db->where("subdepartamentos", "mobiliario de piso");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosInfantilNiñoYNiñaPerimetral2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "infantil niño y niña");
        $this->db->where("subdepartamentos", "mobiliario perimetral");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //6. TRAER PROD TODDLER NIÑO NIÑA Y BEBES
    function getProductosToddlerNiñoNiñaYBebesPiso2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "toddler niño niña y bebes");
        $this->db->where("subdepartamentos", "mobiliario de piso");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosToddlerNiñoNiñaYBebesPerimetral2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "toddler niño niña y bebes");
        $this->db->where("subdepartamentos", "mobiliario perimetral");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //7. TRAER PROD HERRAJE
    function getProductosHerrajeNoAplica2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "herrajes");
        $this->db->where("subdepartamentos", "no aplica");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //8. TRAER PROD PROBADORES
    function getProductosProbadoresPiso2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "probadores");
        $this->db->where("subdepartamentos", "mobiliario de piso");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //9. TRAER PROD PANELES
    function getProductosPanelesPiso2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "paneles");
        $this->db->where("subdepartamentos", "mobiliario de piso");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //10. TRAER PROD EXTRAS
    function getProductosExtrasPiso2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "extras");
        $this->db->where("subdepartamentos", "mobiliario de piso");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    function getProductosExtrasPiso2_2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "extras");
        $this->db->where("subdepartamentos", "mobiliario de piso");
        $this->db->where("deleted", 0);
        $this->db->where("deleted2", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //11. TRAER PROD IMAGEN
    function getProductosImagenPop2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "imagen");
        $this->db->where("subdepartamentos", "pop");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getProductosImagenManiquis2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "imagen");
        $this->db->where("subdepartamentos", "maniquis");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //12. TRAER PROD OTROS
    function getProductosOtrosNoAplica2format($numordencompra)
    {
        $this->db->select("id,nombre,pieza,precio,FORMAT(subtotal, 2) as subtotal,departamentos,subdepartamentos,archivo,status,deleted,deleted2,carrito,unidad,proveedor,observaciones,incluye,numordencompra,tienda,idprincipalproducto2,idtienda,color,sku");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", $numordencompra);
        $this->db->where("departamentos", "otros");
        $this->db->where("subdepartamentos", "no aplica");
        $this->db->where("deleted", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }






















    //11. TRAER TABLA PRINCIPAL POR NUMERO DE COMPRA
    function getCentroCostos($numordencompra)
    {
        $this->db->select("*");
        $this->db->from("centrocostos");
        $this->db->where("numordencompra", $numordencompra);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getCentroCostos2($numordencompra)
    {
        $this->db->select("id,numordencompra,tienda,FORMAT(totalmuebles, 2) as totalmuebles,porcentajemuebles,FORMAT(totalherrajes, 2) as totalherrajes,porcentajeherrajes,FORMAT(totalextras, 2) as totalextras,porcentajextras,FORMAT(totalinstalacionytransporte, 2) as totalinstalacionytransporte,porcentajeinstalacionytransporte,FORMAT(totalpop, 2) as totalpop,porcentajepop,FORMAT(totalmaniquis, 2) as totalmaniquis,porcentajemaniquis,FORMAT(totalotros, 2) as totalotros,porcentajeotros,FORMAT(totalmueblesherrajesextrasinstalacionytransportepopmaniquis, 2) as totalmueblesherrajesextrasinstalacionytransportepopmaniquis,FORMAT(totalmueblesherrajesextras, 2) as totalmueblesherrajesextras,FORMAT(totalentrevalorantespreciototalv1, 2) as totalentrevalorantespreciototalv1,FORMAT(totalentrevalorantespreciototal2v2, 2) as totalentrevalorantespreciototal2v2,m2,fecha,fecha_entrega");
        $this->db->from("centrocostos");
        $this->db->where("numordencompra", $numordencompra);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getCentroCostosProv($numordencompra)
    {
        $this->db->select("*");
        //$this->db->select("FORMAT(totalmueblesprov, 'C', 'es-MX') as totalmueblesprov, FORMAT(totalherrajesprov, 'C', 'es-MX') as totalherrajesprov,FORMAT(totalextrasprov, 'C', 'es-MX') as totalextrasprov,FORMAT(totalmueblesherrajesextrasinstalacionytransportepopmaniquisprov, 'C', 'es-MX') as totalmueblesherrajesextrasinstalacionytransportepopmaniquisprov, FORMAT(totalmueblesherrajesextrasprov, 'C', 'es-MX') as totalmueblesherrajesextrasprov, FORMAT(totalentrevalorantespreciototalv1prov, 'C', 'es-MX') as totalentrevalorantespreciototalv1prov, FORMAT(totalentrevalorantespreciototal2v2prov, 'C', 'es-MX') as totalentrevalorantespreciototal2v2prov");
        $this->db->from("centrocostosprov");
        $this->db->where("numordencompra", $numordencompra);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getCentroCostosProv2($numordencompra)
    {
        //$this->db->select("*");
        $this->db->select("FORMAT(totalmueblesprov, 2) as totalmueblesprov, porcentajemueblesprov,FORMAT(totalherrajesprov, 2) as totalherrajesprov, porcentajeherrajesprov,FORMAT(totalextrasprov, 2) as totalextrasprov, porcentajextrasprov, FORMAT(totalmueblesherrajesextrasinstalacionytransportepopmaniquisprov, 2) as totalmueblesherrajesextrasinstalacionytransportepopmaniquisprov, FORMAT(totalmueblesherrajesextrasprov, 2) as totalmueblesherrajesextrasprov, FORMAT(totalentrevalorantespreciototalv1prov, 2) as totalentrevalorantespreciototalv1prov, FORMAT(totalentrevalorantespreciototal2v2prov, 2) as totalentrevalorantespreciototal2v2prov, m2prov, fechaprov, fecha_entregaprov");
        $this->db->from("centrocostosprov");
        $this->db->where("numordencompra", $numordencompra);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //12. TRAER TABLA FINAL POR NUMERO DE COMPRA
    function getCentroCostosFinal($numordencompra)
    {
        $this->db->select("*");
        $this->db->from("centrocostosfinal");
        $this->db->where("numordencompra", $numordencompra);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getCentroCostosFinal2($numordencompra)
    {
        $this->db->select("id,numordencompra,tienda,FORMAT(preciofinal, 2) as preciofinal,FORMAT(totalmueblesherrajesextrasinstalacionytransportepopmaniquis3, 2) as totalmueblesherrajesextrasinstalacionytransportepopmaniquis3,FORMAT(anticipo, 2) as anticipo,FORMAT(totalconiva, 2) as totalconiva,FORMAT(anticipoconiva, 2) as anticipoconiva,m2,FORMAT(totaltiendav2, 2) as totaltiendav2,FORMAT(totaltiendaanticipov2, 2) as totaltiendaanticipov2,FORMAT(m2tiendafinalv2, 2) as m2tiendafinalv2,FORMAT(finiquitov2, 2) as finiquitov2");
        $this->db->from("centrocostosfinal");
        $this->db->where("numordencompra", $numordencompra);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getCentroCostosFinalProv($numordencompra)
    {
        $this->db->select("*");
        $this->db->from("centrocostosfinalprov");
        $this->db->where("numordencompra", $numordencompra);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getCentroCostosFinalProv2($numordencompra)
    {
        $this->db->select("id,numordencompra,tienda,FORMAT(totalmueblesherrajesextrasinstalacionytransportepopmaniquis3prov, 2) as totalmueblesherrajesextrasinstalacionytransportepopmaniquis3prov,FORMAT(anticipoprov, 2) as anticipoprov,FORMAT(totalconivaprov, 2) as totalconivaprov,FORMAT(anticipoconivaprov, 2) as anticipoconivaprov, m2prov, FORMAT(totaltiendav2prov, 2) as totaltiendav2prov, FORMAT(totaltiendaanticipov2prov, 2) as totaltiendaanticipov2prov,FORMAT(m2tiendafinalv2prov, 2) as m2tiendafinalv2prov,FORMAT(finiquitov2prov, 2) as finiquitov2prov");
        $this->db->from("centrocostosfinalprov");
        $this->db->where("numordencompra", $numordencompra);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    //12. TRAER SUBTOTALES DE CADA DEPARTAMENTO POR NUMERO DE COMPRA
    function getSubtotalesDepartamentos($numordencompra)
    {
        $this->db->select("*");
        $this->db->from("subtotales");
        $this->db->where("numordencompra", $numordencompra);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getSubtotalesDepartamentosformat($numordencompra)
    {
        $this->db->select("id,numordencompra,tienda,FORMAT(finalent, 2) as finalent,FORMAT(finaldcmpi, 2) as finaldcmpi,FORMAT(finaldcmpe, 2) as finaldcmpe,FORMAT(finalmhjmpi, 2) as finalmhjmpi,FORMAT(finalmhjmpe, 2) as finalmhjmpe,FORMAT(finalmhjmpje, 2) as finalmhjmpje,FORMAT(finalmhjmpli, 2) as finalmhjmpli,FORMAT(finalimpi, 2) as finalimpi,FORMAT(finalimpe, 2) as finalimpe,FORMAT(finalimhe, 2) as finalimhe,FORMAT(finalinnpi, 2) as finalinnpi,FORMAT(finalinnpe, 2) as finalinnpe,FORMAT(finaltnnbpi, 2) as finaltnnbpi,FORMAT(finaltnnbpe, 2) as finaltnnbpe,FORMAT(finalherna, 2) as finalherna,FORMAT(finalprobmpi, 2) as finalprobmpi,FORMAT(finalpanmpi, 2) as finalpanmpi,FORMAT(finalextmpi, 2) as finalextmpi,FORMAT(finalextmpiprov, 2) as finalextmpiprov,FORMAT(finalimgp, 2) as finalimgp,FORMAT(finalimgm, 2) as finalimgm,FORMAT(finalots, 2) as finalots");
        $this->db->from("subtotales");
        $this->db->where("numordencompra", $numordencompra);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getSubtotalesDepartamentos2($numordencompra)
    {
        $this->db->select("FORMAT(finalent, 2) as finalent,FORMAT(finaldcmpi, 2) as finaldcmpi,FORMAT(finaldcmpe, 2) as finaldcmpe,FORMAT(finalmhjmpi, 2) as finalmhjmpi,FORMAT(finalmhjmpe, 2) as finalmhjmpe,FORMAT(finalmhjmpje, 2) as finalmhjmpje,FORMAT(finalmhjmpli, 2) as finalmhjmpli,FORMAT(finalimpi, 2) as finalimpi,FORMAT(finalimpe, 2) as finalimpe,FORMAT(finalimhe, 2) as finalimhe,FORMAT(finalinnpi, 2) as finalinnpi,FORMAT(finalinnpe, 2) as finalinnpe,FORMAT(finaltnnbpi, 2) as finaltnnbpi,FORMAT(finaltnnbpe, 2) as finaltnnbpe,FORMAT(finalherna, 2) as finalherna,FORMAT(finalprobmpi, 2) as finalprobmpi,FORMAT(finalpanmpi, 2) as finalpanmpi");
        $this->db->from("subtotales");
        $this->db->where("numordencompra", $numordencompra);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    function getExcel()
    {
        $this->db->select("*");
        $this->db->from("detallecompras");
        $this->db->where("numordencompra", 1009);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //traer Proveedores
    function getProveedores()
    {
        $this->db->select("*");
        $this->db->from("proveedores");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //traer Usuarios
    function getNombresUsuario()
    {
        $this->db->select("*");
        $this->db->from("nombreusuario");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //traer Tiendas
    function getTiendas()
    {
        $this->db->select("*");
        $this->db->from("tienda");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getTiendasSelectBoxGenComp()
    {
        $this->db->select("*");
        $this->db->from("tienda");
        $this->db->where("status", 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //**********************TRAER PRODUCTOS MOBILIARIO************************
    //**********************TRAER TODO************************
    function productosMobiliarioFull()
    {
        $this->db->select("*");
        $this->db->from("productos");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //**********************1.0 TRAER MOB ENTRADA************************
    function productosMobiliarioEntrada()
    {
        $this->db->select("*");
        $this->db->from("productos");
        $this->db->where("departamentos", "entrada");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //**********************2.0 TRAER MOB DAMA Y CABALLERO************************
    function productosMobiliarioDamaYCaballero()
    {
        $this->db->select("*");
        $this->db->from("productos");
        $this->db->where("departamentos", "dama y caballero");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //**********************3.0 TRAER MOB DAMA Y CABALLERO************************
    function productosMobiliarioMujerHombreJR()
    {
        $this->db->select("*");
        $this->db->from("productos");
        $this->db->where("departamentos", "mujer hombre jr");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //**********************4.0 TRAER MOB INTERIOR MUJER************************
    function productosMobiliarioInteriorMujer()
    {
        $this->db->select("*");
        $this->db->from("productos");
        $this->db->where("departamentos", "interior mujer");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //**********************5.0 TRAER MOB INFANTIL NIÑO Y NIÑA************************
    function productosMobiliarioInfantilNiñoYNiña()
    {
        $this->db->select("*");
        $this->db->from("productos");
        $this->db->where("departamentos", "infantil niño y niña");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //**********************6.0 TRAER MOB TODDLER NIÑO NIÑA Y BEBES************************
    function productosMobiliarioToddlerNiñoNiñaYBebes()
    {
        $this->db->select("*");
        $this->db->from("productos");
        $this->db->where("departamentos", "toddler niño niña y bebes");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //**********************7.0 TRAER MOB HERRAJES************************
    function productosMobiliarioHerrajes()
    {
        $this->db->select("*");
        $this->db->from("productos");
        $this->db->where("departamentos", "herrajes");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //**********************8.0 TRAER MOB PROBADORES************************
    function productosMobiliarioProbadores()
    {
        $this->db->select("*");
        $this->db->from("productos");
        $this->db->where("departamentos", "probadores");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //**********************9.0 TRAER MOB PANELES************************
    function productosMobiliarioPaneles()
    {
        $this->db->select("*");
        $this->db->from("productos");
        $this->db->where("departamentos", "paneles");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //**********************10.0 TRAER MOB EXTRAS************************
    function productosMobiliarioExtras()
    {
        $this->db->select("*");
        $this->db->from("productos");
        $this->db->where("departamentos", "extras");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //**********************11.0 TRAER MOB IMAGEN************************
    function productosMobiliarioImagen()
    {
        $this->db->select("*");
        $this->db->from("productos");
        $this->db->where("departamentos", "imagen");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    //**********************12.0 TRAER MOB OTROS************************
    function productosMobiliarioOtros()
    {
        $this->db->select("*");
        $this->db->from("productos");
        $this->db->where("departamentos", "otros");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    function getTiendasId()
    {
        $this->db->select("id");
        $this->db->from("tienda");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getAñoTiendas()
    {
        $this->db->select("id");
        $this->db->from("tienda");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function calculasumaprods($input_values)
    {
        $input_values = $this->db->escape_str($input_values);
        $sql = "SELECT a.numerodetienda,
                       a.id AS id_tienda,
                       a.nombre AS nombre_tienda,
                       a.año,
                       a.construccion,
                       a.local,
                       a.deptos,
                       a.m2pisoventa,
                       a.m2bodega,
                       b.id AS id_producto,
                       b.nombre AS nombre_producto,
                       CASE
                       WHEN COALESCE(b.archivo, '') = '' THEN 'sin vista previa'
                       ELSE b.archivo
                       END AS archivo_producto,
                       b.departamentos AS depas,
                       b.subdepartamentos AS subdepas,
                       COALESCE(
                         CASE 
                           WHEN SUM(dc.pieza) - FLOOR(SUM(dc.pieza)) = 0 
                           THEN TRIM(TRAILING '.00' FROM CAST(SUM(dc.pieza) AS DECIMAL(10,2)))
                           ELSE ROUND(SUM(dc.pieza), 2) 
                         END,
                         '0'
                       ) AS suma_piezas
                FROM tienda a
                CROSS JOIN productos b
                LEFT JOIN detallecompras dc ON b.id = dc.idprincipalproducto2 AND a.id = dc.idtienda
                WHERE a.id IN ($input_values)
                /*WHERE a.id IN (1, 2, 3, 4, 473, 474, 475, 476, 477, 478)*/
                GROUP BY a.nombre, b.nombre, b.departamentos, b.subdepartamentos
                ORDER BY a.id, 
                  CASE b.departamentos
                    WHEN 'entrada' THEN 1
                    WHEN 'dama y caballero' THEN 2
                    WHEN 'mujer hombre jr' THEN 3
                    WHEN 'interior mujer' THEN 4
                    WHEN 'infantil niño y niña' THEN 5
                    WHEN 'toddler niño niña y bebes' THEN 6
                    WHEN 'herrajes' THEN 7
                    WHEN 'probadores' THEN 8
                    WHEN 'paneles' THEN 9
                    WHEN 'extras' THEN 10
                    WHEN 'imagen' THEN 11
                    WHEN 'otros' THEN 12
                    ELSE 13
                  END,
                  CASE b.subdepartamentos
                  WHEN 'no aplica' THEN 1
                    WHEN 'mobiliario de piso' THEN 2
                    WHEN 'mobiliario perimetral' THEN 3
                    WHEN 'mobiliario perimetro jeans' THEN 4
                    WHEN 'mobiliario perimetro licencias' THEN 5
                    WHEN 'herraje' THEN 6
                    WHEN 'pop' THEN 7
                    WHEN 'maniquis' THEN 8
                    ELSE 9
                  END,
                  b.id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }
    function getTiendasConsultaMobiliario()
    {
        $this->db->select("*");
        $this->db->from("tienda");
        $this->db->order_by('nombre', 'ASC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function getAñoTiendasConsultaMobiliario()
    {
        $this->db->distinct();
        $this->db->select('año');
        $this->db->from('tienda');
        $this->db->order_by('año', 'ASC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function get_consulta_Mobiliario_Productos_Cabeceros()
    {
        $this->db->select('*');
        $this->db->from('productos');
        $this->db->order_by('
            FIELD(departamentos, "entrada", "dama y caballero", "mujer hombre jr", "interior mujer", "infantil niño y niña", "toddler niño niña y bebes", "herrajes", "probadores", "paneles", "extras", "imagen", "otros"),
            FIELD(subdepartamentos, "no aplica", "mobiliario de piso", "mobiliario perimetral", "mobiliario perimetro jeans", "mobiliario perimetro licencias", "herraje", "pop", "maniquis"),
            id
        ');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function get_consulta_Mobiliario_Por_Id_Tienda($id_tienda)
    {

        $id_tienda = $this->db->escape_str($id_tienda);
        $sql = "SELECT a.numerodetienda,
                       a.id AS id_tienda,
                       a.nombre AS nombre_tienda,
                       a.año,
                       a.construccion,
                       a.local,
                       a.deptos,
                       a.m2pisoventa,
                       a.m2bodega,
                       b.id AS id_producto,
                       b.nombre AS nombre_producto,
                       CASE
                       WHEN COALESCE(b.archivo, '') = '' THEN 'sin vista previa'
                       ELSE b.archivo
                       END AS archivo_producto,
                       b.departamentos AS depas,
                       b.subdepartamentos AS subdepas,
                       COALESCE(
                         CASE 
                           WHEN SUM(dc.pieza) - FLOOR(SUM(dc.pieza)) = 0 
                           THEN TRIM(TRAILING '.00' FROM CAST(SUM(dc.pieza) AS DECIMAL(10,2)))
                           ELSE ROUND(SUM(dc.pieza), 2) 
                         END,
                         '0'
                       ) AS suma_piezas
                FROM tienda a
                CROSS JOIN productos b
                LEFT JOIN detallecompras dc ON b.id = dc.idprincipalproducto2 AND a.id = dc.idtienda
                WHERE a.id IN ($id_tienda)
                GROUP BY a.nombre, b.nombre, b.departamentos, b.subdepartamentos
                ORDER BY a.id, 
                  CASE b.departamentos
                    WHEN 'entrada' THEN 1
                    WHEN 'dama y caballero' THEN 2
                    WHEN 'mujer hombre jr' THEN 3
                    WHEN 'interior mujer' THEN 4
                    WHEN 'infantil niño y niña' THEN 5
                    WHEN 'toddler niño niña y bebes' THEN 6
                    WHEN 'herrajes' THEN 7
                    WHEN 'probadores' THEN 8
                    WHEN 'paneles' THEN 9
                    WHEN 'extras' THEN 10
                    WHEN 'imagen' THEN 11
                    WHEN 'otros' THEN 12
                    ELSE 13
                  END,
                  CASE b.subdepartamentos
                  WHEN 'no aplica' THEN 1
                    WHEN 'mobiliario de piso ' THEN 2
                    WHEN 'mobiliario perimetral' THEN 3
                    WHEN 'mobiliario perimetro jeans' THEN 4
                    WHEN 'mobiliario perimetro licencias' THEN 5
                    WHEN 'herraje' THEN 6
                    WHEN 'pop' THEN 7
                    WHEN 'maniquis' THEN 8
                    ELSE 9
                  END,
                  b.id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
        /*$id_tienda = $this->db->escape_str($id_tienda);
        $sql = "SELECT a.numerodetienda,
                       a.id AS id_tienda,
                       a.nombre AS nombre_tienda,
                       a.año,
                       a.construccion,
                       a.local,
                       a.deptos,
                       a.m2pisoventa,
                       a.m2bodega,
                       COALESCE(dc.idprincipalproducto2, '') AS id_dt,
                       b.id AS id_producto,
                       b.nombre AS nombre_producto,
                       CASE
                       WHEN COALESCE(b.archivo, '') = '' THEN 'sin vista previa'
                       ELSE b.archivo
                       END AS archivo_producto,
                       b.departamentos AS depas,
                       b.subdepartamentos AS subdepas,
                       COALESCE(
                         CASE 
                           WHEN dc.pieza - FLOOR(dc.pieza) = 0 
                           THEN TRIM(TRAILING '.00' FROM CAST(dc.pieza AS DECIMAL(10,2)))
                           ELSE ROUND(dc.pieza, 2) 
                         END,
                         '0'
                       ) AS suma_piezas
                FROM tienda a
                CROSS JOIN productos b
                LEFT JOIN detallecompras dc ON b.id = dc.idprincipalproducto2 AND a.id = dc.idtienda
                WHERE a.id IN ($id_tienda)
                ORDER BY a.id, 
                  CASE b.departamentos
                    WHEN 'entrada' THEN 1
                    WHEN 'dama y caballero' THEN 2
                    WHEN 'mujer hombre jr' THEN 3
                    WHEN 'interior mujer' THEN 4
                    WHEN 'infantil niño y niña' THEN 5
                    WHEN 'toddler niño niña y bebes' THEN 6
                    WHEN 'herrajes' THEN 7
                    WHEN 'probadores' THEN 8
                    WHEN 'paneles' THEN 9
                    WHEN 'extras' THEN 10
                    WHEN 'imagen' THEN 11
                    WHEN 'otros' THEN 12
                    ELSE 13
                  END,
                  CASE b.subdepartamentos
                  WHEN 'no aplica' THEN 1
                    WHEN 'mobiliario de piso ' THEN 2
                    WHEN 'mobiliario perimetral' THEN 3
                    WHEN 'mobiliario perimetro jeans' THEN 4
                    WHEN 'mobiliario perimetro licencias' THEN 5
                    WHEN 'herraje' THEN 6
                    WHEN 'pop' THEN 7
                    WHEN 'maniquis' THEN 8
                    ELSE 9
                  END,
                  b.id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }*/
    }
    function get_consulta_Mobiliario_Por_Id_Tienda_editable($id_tienda)
    {
        $id_tienda = $this->db->escape_str($id_tienda);
        $sql = "SELECT a.numerodetienda,
                       a.id AS id_tienda,
                       a.nombre AS nombre_tienda,
                       a.año,
                       a.construccion,
                       a.local,
                       a.deptos,
                       a.m2pisoventa,
                       a.m2bodega,
                       COALESCE(dc.idprincipalproducto2, '') AS id_dt,
                       dc.id AS id_dt_comp,
                       b.id AS id_producto,
                       b.nombre AS nombre_producto,
                       CASE
                       WHEN COALESCE(b.archivo, '') = '' THEN 'sin vista previa'
                       ELSE b.archivo
                       END AS archivo_producto,
                       b.departamentos AS depas,
                       b.subdepartamentos AS subdepas,
                       COALESCE(
                         CASE 
                           WHEN dc.pieza - FLOOR(dc.pieza) = 0 
                           THEN TRIM(TRAILING '.00' FROM CAST(dc.pieza AS DECIMAL(10,2)))
                           ELSE ROUND(dc.pieza, 2) 
                         END,
                         '0'
                       ) AS suma_piezas
                FROM tienda a
                CROSS JOIN productos b
                LEFT JOIN detallecompras dc ON b.id = dc.idprincipalproducto2 AND a.id = dc.idtienda
                WHERE a.id IN ($id_tienda)
                ORDER BY a.id, 
                  CASE b.departamentos
                    WHEN 'entrada' THEN 1
                    WHEN 'dama y caballero' THEN 2
                    WHEN 'mujer hombre jr' THEN 3
                    WHEN 'interior mujer' THEN 4
                    WHEN 'infantil niño y niña' THEN 5
                    WHEN 'toddler niño niña y bebes' THEN 6
                    WHEN 'herrajes' THEN 7
                    WHEN 'probadores' THEN 8
                    WHEN 'paneles' THEN 9
                    WHEN 'extras' THEN 10
                    WHEN 'imagen' THEN 11
                    WHEN 'otros' THEN 12
                    ELSE 13
                  END,
                  CASE b.subdepartamentos
                  WHEN 'no aplica' THEN 1
                    WHEN 'mobiliario de piso ' THEN 2
                    WHEN 'mobiliario perimetral' THEN 3
                    WHEN 'mobiliario perimetro jeans' THEN 4
                    WHEN 'mobiliario perimetro licencias' THEN 5
                    WHEN 'herraje' THEN 6
                    WHEN 'pop' THEN 7
                    WHEN 'maniquis' THEN 8
                    ELSE 9
                  END,
                  b.id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }
    function get_consulta_Mobiliario_Por_Id_Tienda_Cabecero($id_tienda)
    {
        $this->db->select("*");
        $this->db->from("tienda");
        $this->db->where('id', $id_tienda);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function get_actualiza_datos_consulta_Mobiliario_Por_Id_Tienda($id_producto_upt, $valor_producto_upt)
    {
        $array = array(
            'pieza' => $valor_producto_upt
        );
        $this->db->where('id', $id_producto_upt);
        $this->db->update('detallecompras', $array);
    }
    function get_consulta_Mobiliario_Por_Anio_Tienda($anio)
    {
        $this->db->select("*");
        $this->db->from("tienda");
        $this->db->where('año', $anio);
        $this->db->order_by('id', 'ASC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function get_consulta_Mobiliario_Por_Anio_Tienda_info($resultadoInput)
    {
        $resultadoInput = $this->db->escape_str($resultadoInput);
        $sql = "SELECT a.numerodetienda,
                       a.id AS id_tienda,
                       a.nombre AS nombre_tienda,
                       a.año,
                       a.construccion,
                       a.local,
                       a.deptos,
                       a.m2pisoventa,
                       a.m2bodega,
                       b.id AS id_producto,
                       b.nombre AS nombre_producto,
                       CASE
                       WHEN COALESCE(b.archivo, '') = '' THEN 'sin vista previa'
                       ELSE b.archivo
                       END AS archivo_producto,
                       b.departamentos AS depas,
                       b.subdepartamentos AS subdepas,
                       COALESCE(
                         CASE 
                           WHEN SUM(dc.pieza) - FLOOR(SUM(dc.pieza)) = 0 
                           THEN TRIM(TRAILING '.00' FROM CAST(SUM(dc.pieza) AS DECIMAL(10,2)))
                           ELSE ROUND(SUM(dc.pieza), 2) 
                         END,
                         '0'
                       ) AS suma_piezas
                FROM tienda a
                CROSS JOIN productos b
                LEFT JOIN detallecompras dc ON b.id = dc.idprincipalproducto2 AND a.id = dc.idtienda
                WHERE a.id IN ($resultadoInput)
                GROUP BY a.nombre, b.nombre, b.departamentos, b.subdepartamentos
                ORDER BY a.id, 
                  CASE b.departamentos
                    WHEN 'entrada' THEN 1
                    WHEN 'dama y caballero' THEN 2
                    WHEN 'mujer hombre jr' THEN 3
                    WHEN 'interior mujer' THEN 4
                    WHEN 'infantil niño y niña' THEN 5
                    WHEN 'toddler niño niña y bebes' THEN 6
                    WHEN 'herrajes' THEN 7
                    WHEN 'probadores' THEN 8
                    WHEN 'paneles' THEN 9
                    WHEN 'extras' THEN 10
                    WHEN 'imagen' THEN 11
                    WHEN 'otros' THEN 12
                    ELSE 13
                  END,
                  CASE b.subdepartamentos
                  WHEN 'no aplica' THEN 1
                    WHEN 'mobiliario de piso' THEN 2
                    WHEN 'mobiliario perimetral' THEN 3
                    WHEN 'mobiliario perimetro jeans' THEN 4
                    WHEN 'mobiliario perimetro licencias' THEN 5
                    WHEN 'herraje' THEN 6
                    WHEN 'pop' THEN 7
                    WHEN 'maniquis' THEN 8
                    ELSE 9
                  END,
                  b.id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }
    function get_consulta_Mobiliario_Por_Id_Tienda_Cabecero_info($resultadoInput)
    {
        $resultadoInputVal = $this->db->escape_str($resultadoInput);
        $sql = "SELECT id,numerodetienda,nombre,año,construccion,local,deptos,m2pisoventa,m2bodega FROM tienda WHERE id IN ($resultadoInputVal) ORDER BY id";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }



    function get_consulta_Mobiliario_Por_Anio_And_Id_Tienda($id_tienda, $anio)
    {
        $id_tienda = $this->db->escape_str($id_tienda);
        $anio = $this->db->escape_str($anio);
        $sql = "SELECT a.numerodetienda,
                       a.id AS id_tienda,
                       a.nombre AS nombre_tienda,
                       a.año,
                       a.construccion,
                       a.local,
                       a.deptos,
                       a.m2pisoventa,
                       a.m2bodega,
                       b.id AS id_producto,
                       b.nombre AS nombre_producto,
                       CASE
                       WHEN COALESCE(b.archivo, '') = '' THEN 'sin vista previa'
                       ELSE b.archivo
                       END AS archivo_producto,
                       b.departamentos AS depas,
                       b.subdepartamentos AS subdepas,
                       COALESCE(
                         CASE 
                           WHEN SUM(dc.pieza) - FLOOR(SUM(dc.pieza)) = 0 
                           THEN TRIM(TRAILING '.00' FROM CAST(SUM(dc.pieza) AS DECIMAL(10,2)))
                           ELSE ROUND(SUM(dc.pieza), 2) 
                         END,
                         '0'
                       ) AS suma_piezas
                FROM tienda a
                CROSS JOIN productos b
                LEFT JOIN detallecompras dc ON b.id = dc.idprincipalproducto2 AND a.id = dc.idtienda
                WHERE a.id IN ($id_tienda)
                AND a.año = '$anio'
                /*WHERE a.id IN (1, 2, 3, 4, 473, 474, 475, 476, 477, 478)*/
                GROUP BY a.nombre, b.nombre, b.departamentos, b.subdepartamentos
                ORDER BY a.id, 
                  CASE b.departamentos
                    WHEN 'entrada' THEN 1
                    WHEN 'dama y caballero' THEN 2
                    WHEN 'mujer hombre jr' THEN 3
                    WHEN 'interior mujer' THEN 4
                    WHEN 'infantil niño y niña' THEN 5
                    WHEN 'toddler niño niña y bebes' THEN 6
                    WHEN 'herrajes' THEN 7
                    WHEN 'probadores' THEN 8
                    WHEN 'paneles' THEN 9
                    WHEN 'extras' THEN 10
                    WHEN 'imagen' THEN 11
                    WHEN 'otros' THEN 12
                    ELSE 13
                  END,
                  CASE b.subdepartamentos
                  WHEN 'no aplica' THEN 1
                    WHEN 'mobiliario de piso' THEN 2
                    WHEN 'mobiliario perimetral' THEN 3
                    WHEN 'mobiliario perimetro jeans' THEN 4
                    WHEN 'mobiliario perimetro licencias' THEN 5
                    WHEN 'herraje' THEN 6
                    WHEN 'pop' THEN 7
                    WHEN 'maniquis' THEN 8
                    ELSE 9
                  END,
                  b.id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function get_consulta_Mobiliario_Por_Anio_And_Id_Tienda_Cabecero($id_tienda, $anio)
    {
        $this->db->select("*");
        $this->db->from("tienda");
        $this->db->where('id', $id_tienda);
        $this->db->where('año', $anio);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function get_consulta_Tiendas_Por_anio_Select_Box($anio)
    {
        $this->db->select("*");
        $this->db->from("tienda");
        $this->db->where('año', $anio);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
    function get_consulta_verificar_ordenes_existentes()
    {
        $query = $this->db->query("SELECT DISTINCT idtienda FROM detallecompras");
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    function get_consulta_imprime_ordenes_existentes($input_array_ordenes)
    {
        //$input_array_ordenes = $this->db->escape_str($input_array_ordenes);
        $sql = "SELECT
                    a.id as id_prod,
                    a.nombre as nom_prod,
                    b.nombre as nom_tnd,
                    COALESCE(
                        CASE
                            WHEN SUM(c.pieza) - FLOOR(SUM(c.pieza)) = 0 THEN TRIM(
                                TRAILING '.00'
                                FROM
                                    CAST(SUM(c.pieza) AS DECIMAL(10, 2))
                            )
                            ELSE ROUND(SUM(c.pieza), 2)
                        END,
                        '0'
                    ) AS suma_piezas,
                    COALESCE(c.tienda, '') as nom_tnd_dt
                FROM productos a
                cross join tienda b
                left join detallecompras c on a.id = c.idprincipalproducto2 and b.id = c.idtienda
                where
                    b.id in ($input_array_ordenes)
                    /*b.id in (1, 614, 594, 592, 605, 597)*/
                GROUP BY
                    b.nombre,
                    a.nombre,
                    a.departamentos,
                    a.subdepartamentos
                order by
                    b.id,
                    CASE
                        a.departamentos
                        WHEN 'entrada' THEN 1
                        WHEN 'dama y caballero' THEN 2
                        WHEN 'mujer hombre jr' THEN 3
                        WHEN 'interior mujer' THEN 4
                        WHEN 'infantil niño y niña' THEN 5
                        WHEN 'toddler niño niña y bebes' THEN 6
                        WHEN 'herrajes' THEN 7
                        WHEN 'probadores' THEN 8
                        WHEN 'paneles' THEN 9
                        WHEN 'extras' THEN 10
                        WHEN 'imagen' THEN 11
                        WHEN 'otros' THEN 12
                        ELSE 13
                    END,
                    CASE
                        a.subdepartamentos
                        WHEN 'no aplica' THEN 1
                        WHEN 'mobiliario de piso' THEN 2
                        WHEN 'mobiliario perimetral' THEN 3
                        WHEN 'mobiliario perimetro jeans' THEN 4
                        WHEN 'mobiliario perimetro licencias' THEN 5
                        WHEN 'herraje' THEN 6
                        WHEN 'pop' THEN 7
                        WHEN 'maniquis' THEN 8
                        ELSE 9
                    END,
                    a.id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }
    function get_consulta_piezas_rel_prod_tnd($data_id_prod, $data_name_tnd)
    {
        $query = $this->db->query("SELECT id, pieza FROM detallecompras WHERE tienda = ? AND idprincipalproducto2 = ?", array($data_name_tnd, $data_id_prod));

        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }












    function getimprimesumatotalv2($data)
    {
        $nombre = $data['nombre'];
        $tienda = $data['tienda'];

        $this->db->select_sum('pieza');
        $this->db->from('detallecompras');
        $this->db->where('idprincipalproducto2', $nombre);
        $this->db->where('idtienda', $tienda);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }





    function getsavequestion($data)
    {
        $array = array(
            "usuario" => $data['usuario'],
            "nombre" => $data['nombre'],
            "P1" => $data['Res1'],
            "P2" => $data['Res2'],
            "P3" => $data['Res3'],
            "P4" => $data['Res4'],
            "P5" => $data['Res5'],
            "P6" => $data['Res6'],
            "P7" => $data['Res7'],
            "fecha_apl" => $data['date_hour_form'],
        );
        $this->db->insert("encuesta", $array);
    }
    public function getbuscarUsuario($usuario)
    {
        $this->db->where('usuario', $usuario);
        $query = $this->db->get('encuesta');
        return $query->num_rows() > 0;
    }






    function get_delete_all_from_ent()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'entrada');
        $this->db->where('subdepartamentos', 'no aplica');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_dcmpi()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'dama y caballero');
        $this->db->where('subdepartamentos', 'mobiliario de piso');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_dcmpe()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'dama y caballero');
        $this->db->where('subdepartamentos', 'mobiliario perimetral');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_mhjmpi()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'mujer hombre jr');
        $this->db->where('subdepartamentos', 'mobiliario de piso');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_mhjmpe()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'mujer hombre jr');
        $this->db->where('subdepartamentos', 'mobiliario perimetral');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_mhjmpje()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'mujer hombre jr');
        $this->db->where('subdepartamentos', 'mobiliario perimetro jeans');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_mhjmpli()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'mujer hombre jr');
        $this->db->where('subdepartamentos', 'mobiliario perimetro licencias');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_impi()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'interior mujer');
        $this->db->where('subdepartamentos', 'mobiliario de piso');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_impe()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'interior mujer');
        $this->db->where('subdepartamentos', 'mobiliario perimetral');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_imhe()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'interior mujer');
        $this->db->where('subdepartamentos', 'herraje');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_innpi()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'infantil niño y niña');
        $this->db->where('subdepartamentos', 'mobiliario de piso');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_innpe()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'infantil niño y niña');
        $this->db->where('subdepartamentos', 'mobiliario perimetral');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_tnnbpi()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'toddler niño niña y bebes');
        $this->db->where('subdepartamentos', 'mobiliario de piso');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_tnnbpe()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'toddler niño niña y bebes');
        $this->db->where('subdepartamentos', 'mobiliario perimetral');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_herna()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'herrajes');
        $this->db->where('subdepartamentos', 'no aplica');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_probmpi()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'probadores');
        $this->db->where('subdepartamentos', 'mobiliario de piso');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_panmpi()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'paneles');
        $this->db->where('subdepartamentos', 'mobiliario de piso');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_extmpi()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'extras');
        $this->db->where('subdepartamentos', 'mobiliario de piso');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_imgp()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'imagen');
        $this->db->where('subdepartamentos', 'pop');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_imgm()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'imagen');
        $this->db->where('subdepartamentos', 'maniquis');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }
    function get_delete_all_from_ots()
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'otros');
        $this->db->where('subdepartamentos', 'no aplica');
        $this->db->where('status', 'Activo');
        $this->db->update('productos', $data);
    }





    function get_delete_all_from_ent_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'entrada');
        $this->db->where('subdepartamentos', 'no aplica');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_dcmpi_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'dama y caballero');
        $this->db->where('subdepartamentos', 'mobiliario de piso');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_dcmpe_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'dama y caballero');
        $this->db->where('subdepartamentos', 'mobiliario perimetral');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_mhjmpi_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'mujer hombre jr');
        $this->db->where('subdepartamentos', 'mobiliario de piso');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_mhjmpe_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'mujer hombre jr');
        $this->db->where('subdepartamentos', 'mobiliario perimetral');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_mhjmpje_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'mujer hombre jr');
        $this->db->where('subdepartamentos', 'mobiliario perimetro jeans');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_mhjmpli_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'mujer hombre jr');
        $this->db->where('subdepartamentos', 'mobiliario perimetro licencias');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_impi_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'interior mujer');
        $this->db->where('subdepartamentos', 'mobiliario de piso');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_impe_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'interior mujer');
        $this->db->where('subdepartamentos', 'mobiliario perimetral');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_imhe_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'interior mujer');
        $this->db->where('subdepartamentos', 'herraje');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_innpi_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'infantil niño y niña');
        $this->db->where('subdepartamentos', 'mobiliario de piso');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_innpe_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'infantil niño y niña');
        $this->db->where('subdepartamentos', 'mobiliario perimetral');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_tnnbpi_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'toddler niño niña y bebes');
        $this->db->where('subdepartamentos', 'mobiliario de piso');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_tnnbpe_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'toddler niño niña y bebes');
        $this->db->where('subdepartamentos', 'mobiliario perimetral');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_herna_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'herrajes');
        $this->db->where('subdepartamentos', 'no aplica');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_probmpi_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'probadores');
        $this->db->where('subdepartamentos', 'mobiliario de piso');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_panmpi_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'paneles');
        $this->db->where('subdepartamentos', 'mobiliario de piso');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_extmpi_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'extras');
        $this->db->where('subdepartamentos', 'mobiliario de piso');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_imgp_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'imagen');
        $this->db->where('subdepartamentos', 'pop');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_imgm_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'imagen');
        $this->db->where('subdepartamentos', 'maniquis');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
    function get_delete_all_from_ots_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 1);
        $this->db->where('departamentos', 'otros');
        $this->db->where('subdepartamentos', 'no aplica');
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }




    function get_recover_all_from_trash()
    {
        $data = array('deleted' => 0);
        $this->db->where('deleted', 1);
        $this->db->update('productos', $data);
    }
    function get_recover_all_from_trash_pdnt($ordenpendiente)
    {
        $data = array('deleted' => 0);
        $this->db->where('deleted', 1);
        $this->db->where('ordenpendiente', $ordenpendiente);
        $this->db->update('temporales', $data);
    }
}
