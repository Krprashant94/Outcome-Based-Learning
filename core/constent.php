<?php

session_name('__RCCIIT__');
session_start();

$_ENV["CSS_PATH"] = HOME_PAGE."assets/css/";
$_ENV["JS_PATH"] = HOME_PAGE."assets/js/";
$_ENV["BOOTSTRAP_PATH"] = HOME_PAGE."bootstrap/";
$_ENV["SWEETALERT_PATH"] = HOME_PAGE."sweetalert/";
$_ENV["JQ_PATH"] = HOME_PAGE."assets/";

?>