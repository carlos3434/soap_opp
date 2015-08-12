<?php
require_once "lib/nusoap.php";


$client = new nusoap_client("http://test/soap_opp/server.php?wsdl", true);
$error  = $client->getError();

if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}
//$result2 = $client->call("Tarea.test", array("par" => '1'));

$result = $client->call("Tarea.select", array("id" => '811'));
echo "<pre>";
var_dump($result);

/*
if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
} else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    } else {
        echo "<h2>Main</h2>";
        print_r($result);
        foreach ($result as $usuarios) {
            echo $usuarios['nombre'] . ' , ' .
                 $usuarios['apellido'] . " , " .
                 $usuarios['usuario'] . " , " .
                 $usuarios['dni']. " , " .
                 $usuarios['sexo']. " , " .
                 $usuarios['imagen'];
            echo "<br /><br />";
        }
    }
}
*/
// show soap request and response
echo "<h2>Request</h2>";
echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
echo "<h2>Response</h2>";
echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";


/*
$db = Database::getInstance();
$db =$db->getConnection();

$rs= $db->query("SELECT * FROM `usuarios`");
*/
/*
$tarea = new Tarea();
$rs=$tarea->select();

foreach ($rs as $usuarios) {
    echo $usuarios['nombre'] . ' , ' .
         $usuarios['apellido'] . " , " .
         $usuarios['usuario'] . " , " .
         $usuarios['dni']. " , " .
         $usuarios['sexo']. " , " .
         $usuarios['imagen'];
    echo "<br /><br />";
}
*/