<?php
if (!isset($_SESSION)) {
    session_start();
}
require('./conector.php');

$con = new ConectorBD('localhost', 'root', '', 'nextu_examen');

$data["title"] = isset($_REQUEST["titulo"]) == true ? $_REQUEST["titulo"] : "";
$data["start"] = isset($_REQUEST["start_date"]) == true ? $_REQUEST["start_date"] : "";
$start_hour = isset($_REQUEST["start_hour"]) == true ? $_REQUEST["start_hour"] : "";
$data["allDay"] = isset($_REQUEST["allDay"]) == true ? $_REQUEST["allDay"] : "";
$data["end"] = isset($_REQUEST["end_date"]) == true ? $_REQUEST["end_date"] : "";
$end_hour = isset($_REQUEST["end_hour"]) == true ? $_REQUEST["end_hour"] : "";
$data["usuario"] = $_SESSION['user'];

if ($data["allDay"] == false) {
    $data["start"] = $data["start"] . " " . $start_hour;
    $$data["end"] = $data["end"] . " " . $end_hour;
 
    
} else {
    
} 
//$query = "INSERT INTO callendar(title,start,allDay,end,usuario)values('".$title."','".$start."','".$allDay."','".$end."','".$usuario."')";
//echo $query;
$stm = $con->insertData("callendar",$data);
$stm->execute();

if ($stm) {
    $response['msg'] = "OK";
} else{
    $response['msg'] = "rechazado";

}
echo json_encode($response);
?>
