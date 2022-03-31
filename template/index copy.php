<?php
session_start();
include "config.php";
$control = "User";
if (isset($_REQUEST['ctrl']))
    $control = $_REQUEST['ctrl'];

include "Controllers/" . $control . "Controller.php";
if (isset($_SESSION['user']))
    $func = "logged";
else
    $func = "index";
if (isset($_REQUEST['func']) && !empty($_REQUEST['func']))
    $func = $_REQUEST['func'];
$name = ucwords($control) . 'Controller';
$obj = new $name();

if (isset($_REQUEST['id']))
    $obj->$func($_REQUEST['id']);
if(isset($_REQUEST['message']))
$obj->$func($_REQUEST['message']);
else
    $obj->$func();
?>


<script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>