<?php
session_start();


header('Content-disposition: attachment; filename=' . $_SESSION['routename'] . '.kml');
readfile("KMLFiles/" . $_SESSION['routename'] . ".kml");




//$_SESSION['routename']
?>