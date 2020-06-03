<?php
session_start();
  if($_SESSION["logueado"] == TRUE) {

      set_time_limit(0);
      require("../../class/cnmysql.php");
      date_default_timezone_set('America/Mexico_City');
      $fecha_del_dia=date('Y-m-d');//fecha actual


	date_default_timezone_set('America/Mexico_City');
	$fecha_del_dia=date('Y-m-d');//fecha actual
	setlocale(LC_TIME,"es_ES");
	$hora_actual= strftime("%H:%M:%S");  

  $IDUsuarioPHP = $_GET["codUsuario"];    


 $sqlDelete1 = "DELETE FROM  `tbl_usuarios` WHERE  CodUsuario = ".$IDUsuarioPHP." ";
        if($resdelete1 = $mysqli->query($sqlDelete1)) {
      			
        				$sqldelete2 = "DELETE FROM  `tbl_empleados` WHERE  CodUsu = ".$IDUsuarioPHP." ";
        				if($resdelete2 = $mysqli->query($sqldelete2)) {

                        $sqldelete3 = "DELETE FROM  `solicitud` WHERE  CodEmpleado = ".$IDUsuarioPHP." ";
                        if($resdelete3 = $mysqli->query($sqldelete3)) {

                              $sqldelete4 = "DELETE FROM `tbl_rasolicitud` WHERE  CodUsuario = ".$IDUsuarioPHP." ";
                              if($resdelete4 = $mysqli->query($sqldelete4)) {

                                        $sqldelete5 = "DELETE FROM `tbl_vacacionesxusuarios` WHERE  CodEmpleado = ".$IDUsuarioPHP." ";
                                        if($resdelete5 = $mysqli->query($sqldelete5)) {

                                                $sqldelete6 = "DELETE FROM `periodoanterior` WHERE  CodEmpleado = ".$IDUsuarioPHP." ";
                                                if($resdelete6 = $mysqli->query($sqldelete6)) {

                                                    $sqldelete7 = "DELETE FROM `periodoactual` WHERE  CodEmpleado = ".$IDUsuarioPHP." ";
                                                                if($resdelete7 = $mysqli->query($sqldelete7)) {

                                                                          $sqldelete8 = "DELETE FROM `tbl_histo_vacaciones` WHERE  CodEmpleado = ".$IDUsuarioPHP." ";
                                                                          if($resdelete8 = $mysqli->query($sqldelete8)) {

                                                                               header("Location: index.php");

                                                                          }else{echo "error delete 8";}

                                                                }else{echo "error delete 7";}

                                                }else{echo "error delete 6";}

                                        }else{echo "error delete 5";}

                              }else{echo "error delete 4";}

                        }else{echo "error delete 3";}

        				}else{echo "error delete 2";}

        }else{echo "error delete1";}
        
/**se elimina de usuarios y trabajadores y se regresa el limit */


 } else {
    header("Location: ../index.php");
  }

?>