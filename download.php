<?php
session_start();


header('Content-disposition: attachment; filename=' . $_SESSION['routename'] . '.kml');
readfile("KMLFiles/" . $_SESSION['routename'] . ".kml");

session_destroy();
session_unset();

//$_SESSION['routename']
?>