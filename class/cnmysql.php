<?php


$mysqli = new mysqli("localhost", "ciudade3_rootvacaciones", "k*UV5IMs%zvt", "ciudade3_vacaciones");
if($mysqli->connect_errno) {
	echo "<b>Fallo al conectar a la BD: </b>" . $mysqli->connect_errno . "---" . $mysqli->connect_error;
}
return $mysqli;

?>
