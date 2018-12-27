<?php
if (!isset($_SESSION)) {
    session_start();
}
require('./conector.php');

$con = new ConectorBD('localhost', 'root', '', 'nextu_examen');

$stm = $con->consultar(['usuarios'], ['codigo','email', 'psw'], 'WHERE email="' . $_REQUEST['username'] . '" AND psw="' . $_REQUEST['password'] . '"');
$stm->execute();
$resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
if (count($resultado) > 0) {
    foreach ($resultado as $value) {
        $_SESSION['user'] = $value["codigo"];
    }
    $response['msg'] = 'OK';
} else {
    $response['msg'] = 'rechazado';
}

echo json_encode($response);
?>
