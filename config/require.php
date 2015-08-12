<?php

if ( $_SERVER['SERVER_NAME']=='10.226.44.223' ) {
    require_once "global.php";
} else {
    require_once "global_dev.php";
}

require_once "/../lib/nusoap.php";
require_once "/../class/class.Database.php";
require_once "/../class/class.Tarea.php";