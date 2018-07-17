<?php

$dbc = mysqli_connect("localhost","root", "", "SafetyFirst");

if(!$dbc) {
	die("Connection failed: ".mysqli_connect_error());
}

?>