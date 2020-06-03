<?php
ob_start();
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



         $consulta1 = "SELECT COUNT(*) as SiHayDatos01  FROM `tbl_usuarios` WHERE  CodUsuario = ".$IDUsuarioPHP." ";
                  $RES01 = $mysqli->query($consulta1);
                  $DATA01 = mysqli_fetch_assoc($RES01);


        $SIHAYDATOS01 = $DATA01["SiHayDatos01"];

          if($SIHAYDATOS01 == 1 ){                


                $sqlDelete1 = "DELETE FROM  `tbl_usuarios` WHERE  CodUsuario = ".$IDUsuarioPHP." ";
                if($resdelete1 = $mysqli->query($sqlDelete1)) {
              //  echo "Se eliminaron los datos del usuario";
                }

          }



           $consulta2 = "SELECT COUNT(*) as SiHayDatos02   FROM `tbl_empleados` WHERE  CodUsu = ".$IDUsuarioPHP." ";
                  $RES02 = $mysqli->query($consulta2);
                  $DATA02 = mysqli_fetch_assoc($RES02);


        $SIHAYDATOS02 = $DATA02["SiHayDatos02"];

          if($SIHAYDATOS02 == 1 ){                


                $sqlDelete2 = "DELETE FROM  `tbl_empleados` WHERE  CodUsu = ".$IDUsuarioPHP."  ";
                if($resdelete2 = $mysqli->query($sqlDelete2)) {
               // echo "Se eliminaron los datos del empleado";
                }

          }


           $consulta3 = "SELECT COUNT(*) as SiHayDatos03   FROM `solicitud` WHERE  CodEmpleado = ".$IDUsuarioPHP." ";
                  $RES03 = $mysqli->query($consulta3);
                  $DATA03 = mysqli_fetch_assoc($RES03);


        $SIHAYDATOS03 = $DATA03["SiHayDatos03"];

          if($SIHAYDATOS03 >= 1 ){                


                $sqlDelete3 = "DELETE FROM  `solicitud` WHERE  CodEmpleado = ".$IDUsuarioPHP." ";
                if($resdelete3 = $mysqli->query($sqlDelete3)) {
              //  echo "Se eliminaron los datos de solicitud";
                }

          }


           $consulta4 = "SELECT COUNT(*) as SiHayDatos04   FROM `tbl_rasolicitud` WHERE  CodUsuario = ".$IDUsuarioPHP." ";
                  $RES04 = $mysqli->query($consulta4);
                  $DATA04 = mysqli_fetch_assoc($RES04);


        $SIHAYDATOS04 = $DATA04["SiHayDatos04"];

          if($SIHAYDATOS04 >= 1 ){                


                $sqlDelete4 = "DELETE FROM `tbl_rasolicitud` WHERE  CodUsuario = ".$IDUsuarioPHP." ";
                if($resdelete3 = $mysqli->query($sqlDelete4)) {
               // echo "Se eliminaron los datos de las solicitudes aceptadas y rechazadas";
                }

          }


           $consulta5 = "SELECT COUNT(*) as SiHayDatos05   FROM `tbl_vacacionesxusuarios` WHERE  CodEmpleado = ".$IDUsuarioPHP." ";
                  $RES05 = $mysqli->query($consulta5);
                  $DATA05 = mysqli_fetch_assoc($RES05);


        $SIHAYDATOS05 = $DATA05["SiHayDatos05"];

          if($SIHAYDATOS05 == 1 ){                


                $sqlDelete5 = "DELETE FROM `tbl_vacacionesxusuarios` WHERE  CodEmpleado = ".$IDUsuarioPHP." ";
                if($resdelete3 = $mysqli->query($sqlDelete5)) {
               // echo "Se eliminaron los datos de las vacaciones";
                }

          }


            $consulta6 = "SELECT COUNT(*) as SiHayDatos06   FROM `periodoanterior` WHERE  CodEmpleado = ".$IDUsuarioPHP." ";
                  $RES06 = $mysqli->query($consulta6);
                  $DATA06 = mysqli_fetch_assoc($RES06);


        $SIHAYDATOS06 = $DATA06["SiHayDatos06"];

          if($SIHAYDATOS06 == 1 ){                


                $sqlDelete6 = "DELETE FROM `periodoanterior` WHERE  CodEmpleado = ".$IDUsuarioPHP." ";
                if($resdelete3 = $mysqli->query($sqlDelete6)) {
               // echo "Se eliminaron los datos del periodo anterior";
                }

          }



           $consulta7 = "SELECT COUNT(*) as SiHayDatos07   FROM `periodoactual` WHERE  CodEmpleado = ".$IDUsuarioPHP." ";
                  $RES07 = $mysqli->query($consulta7);
                  $DATA07 = mysqli_fetch_assoc($RES07);


        $SIHAYDATOS07 = $DATA07["SiHayDatos07"];

          if($SIHAYDATOS07 == 1 ){                


                $sqlDelete6 = "DELETE FROM `periodoactual` WHERE  CodEmpleado = ".$IDUsuarioPHP." ";
                if($resdelete3 = $mysqli->query($sqlDelete6)) {
               // echo "Se eliminaron los datos del periodo actual";
                }

          }




           $consulta8 = "SELECT COUNT(*) as SiHayDatos08   FROM `tbl_histo_vacaciones` WHERE  CodEmpleado = ".$IDUsuarioPHP." ";
                  $RES08 = $mysqli->query($consulta8);
                  $DATA08 = mysqli_fetch_assoc($RES08);


        $SIHAYDATOS08 = $DATA08["SiHayDatos08"];

          if($SIHAYDATOS08 >= 1 ){                


                $sqlDelete7 = "DELETE FROM `tbl_histo_vacaciones` WHERE  CodEmpleado = ".$IDUsuarioPHP."  ";
                if($resdelete3 = $mysqli->query($sqlDelete7)) {
                      //echo "Se eliminaron los datos del historial";
                 //header("Location: index.php");  
                }

          }
          
          ?>
                  <script type="text/javascript">
                  window.location.href='index.php';
                  </script>
          <?php
           exit;




 } else {
    header("Location: ../index.php");
  }
ob_end_flush();
?>