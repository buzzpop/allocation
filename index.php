<?php
define("BASE_URL","http://localhost/ROOM_MANAGEMENT");

require_once "libs/Router.php";
$router = new Router();
$router->route();
