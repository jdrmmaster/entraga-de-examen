<?php
if (!isset($_SESSION)) {
    session_start();
}
require('./conector.php');

$con = new ConectorBD('localhost', 'root', '', 'nextu_examen');
 
$stm = $con->consultar(['callendar'], ['codigo as id','title','start', 'allDay', 'end','editable'], "WHERE usuario= '" . $_SESSION['user'] . "' ");
$stm->execute();
$resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
$response["eventos"] = $resultado;
if (count($resultado) > 0) { 
    $response['msg'] = 'OK';
} else {
    $response['msg'] = 'rechazado';

}
echo json_encode($response);
?>
