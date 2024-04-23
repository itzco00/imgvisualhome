<?php
$host = "localhost";
$user = "root";
$pass = "";
$base = "escuela";
$conexion = mysqli_connect($host, $user, $pass, $base);

$columnanueva = $_POST['columnanueva'];
if(isset($_POST['enviar'])){
    $nuevaCol = $conexion->query("ALTER TABLE tienda ADD(".$columnanueva." VARCHAR(100))");
}
?>