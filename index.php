<?php
session_start();
require_once "means/routes.php";
require_once "means/structure.php";
require_once "means/connection.php";
if(isset($_GET["controller"]) && isset($_GET["action"])){
    $controller=$_GET["controller"];
    $action =$_GET["action"] ; 
}
else{
    $controller= "home";
    $action = "index";
}
rutas::cargarContenido($controller,$action);