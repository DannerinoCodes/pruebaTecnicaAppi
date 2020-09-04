<?php
require_once "include.php";
Session::startSession();
// Data is always deleted when initializing 
if (is_null(getGet('pagina')))
    Session::closeSession();
Controlador::init();
