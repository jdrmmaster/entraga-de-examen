<?php
if (!isset($_SESSION)) {
    session_start();
}
require('./conector.php');

$con = new ConectorBD('localhost', 'root', '', 'nextu_examen');

$codigo = isset($_REQUEST["id"]) == true ? $_REQUEST["id"] : "";
 
$usuario = $_SESSION['user'];
 
 
$stm = $con->eliminarRegistro("callendar"," codigo = '".$codigo."' and usuario = '".$usuario."' ");
$stm->execute();

if ($stm) {
    $response['msg'] = "OK";
} else{
    $response['msg'] = "rechazado";

}
echo json_encode($response);
?>
 