<?php
require_once "lib/nusoap.php";
require_once "class/Database.php";
require_once "class/Tarea.php";

class food
{

    public function getFood($type) 
    {
        switch ($type) {
            case 'starter':
                return 'Soup';
                break;
            case 'Main':
                return 'Curry';
                break;
            case 'Desert':
                return 'Ice Cream';
                break;
            default:
                break;
        }
    }
}

$server = new soap_server();
$server->configureWSDL("psi", "urn:psi");

$server->wsdl->addComplexType('return_array_php', 'complexType', 'array', 'all', 'SOAP-ENC:Array', array(), array( array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:array_php[]') ), 'tns:array_php' );

$server->register(
    "Tarea.select",
    array("id" => "xsd:string"),
    //array("return" => "xsd:string"),
    array('return' => 'tns:return_array_php'),
    "urn:psi",
    "urn:psie#select",
    "rpc",
    "encoded",
    "Get food by type"
);

@$server->service($HTTP_RAW_POST_DATA);