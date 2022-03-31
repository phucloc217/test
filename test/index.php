<?php
session_start();
include "config.php";
$control = "Subject";
$func = "index";
if (isset($_REQUEST['ctrl']))
    $control = $_REQUEST['ctrl'];
if (isset($_REQUEST['func']) && !empty($_REQUEST['func']))
    $func = $_REQUEST['func'];

include "App/Controllers/" . $control . "Controller.php";
$name = ucwords($control) . 'Controller';
$obj = new $name();

if (isset($_REQUEST['id']))
    $obj->$func($_REQUEST['id']);
else if (isset($_REQUEST['message']))
    $obj->$func($_REQUEST['message']);
else
    $obj->$func();
?>


<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>