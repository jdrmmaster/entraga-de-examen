<?php
if (!isset($_SESSION)) {
    session_start();
}
require('./conector.php');

$con = new ConectorBD('localhost', 'root', '', 'nextu_examen');

$data["codigo"] = isset($_REQUEST["id"]) == true ? $_REQUEST["id"] : "";
$data["start"] = isset($_REQUEST["start_date"]) == true ? $_REQUEST["start_date"] : "";
$data["end"] = isset($_REQUEST["end_date"]) == true ? $_REQUEST["end_date"] : $_REQUEST["start_date"];
$usuario = $_SESSION['user'];
 
 
$stm = $con->actualizarRegistro("callendar",$data," codigo = '".$data["codigo"]."' and usuario = '".$usuario."' ");
$stm->execute();

if ($stm) {
    $response['msg'] = "OK";
} else{
    $response['msg'] = "rechazado";

}
echo json_encode($response);
?>
 