<?php
session_start();
if($_SESSION["logueado"] == TRUE) {
set_time_limit(0);
require("../../class/cnmysql.php");
/*fecha actual*/
date_default_timezone_set('America/Mexico_City');
$fecha_del_dia=date('Y-m-d');//fecha actual
/*hora actual*/
setlocale(LC_TIME,"es_ES");
$hora_actual= strftime("%H:%M:%S");
/*variables de session*/
$user = isset($_SESSION['UsuarioNombre']) ? $_SESSION['UsuarioNombre'] : null ;
$iduser= isset($_SESSION['CodUsuario']) ? $_SESSION['CodUsuario'] : null ;
/*paramatros formulario*/
$EstatusSolicitud = $_POST['EstatusSol'];
$CodEmpleado = $_POST["CodEmpleado"];
$CodSolicitud= $_POST["CodS"];
/*para mamndar el correo al usuario*/
$sqlUsuario = "SELECT * FROM `tbl_usuarios` as u INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodE WHERE u.estatus = 1 AND u.CodUsuario = ".$_POST["CodEmpleado"]." ";
$resqryUsuario = $mysqli->query($sqlUsuario);
$data = mysqli_fetch_assoc($resqryUsuario);
$CorreoEmpleado = $data['Correo'];
$CodReportaPHP = $data['Jefe1'];
/*para enviar correo a Gerente 1*/
$sqlEmpleadoG = "SELECT Correo FROM  `tbl_usuarios`  as u  WHERE u.CodUsuario =  ".$CodReportaPHP." " ;
$resqryEmpleadoG = $mysqli->query($sqlEmpleadoG);
$dataG = mysqli_fetch_assoc($resqryEmpleadoG);
$CorreoEmpleadoG = $dataG['Correo'];
                    /*SI LA SOLICITUD ES RECHAZADA*/
                    if($EstatusSolicitud == 0){
                       /* LA INSERTAMOS EN LA TABLA TBL_RASOLICITUD */ 
                       $consulta1 = "INSERT INTO `tbl_rasolicitud` (`CodRAS`, `CodSol`,`CodEmpleado`,`Motivo`, `FechaAR`, `HoraAR`, `EstatusSolicitud`, `Tipo`,`TipoSol`) VALUES (NULL,'".$_POST["CodS"]."', '".$_POST["CodEmpleado"]."', '".$_POST['observaciones']."', '".$fecha_del_dia."', '".$hora_actual."','".$_POST['EstatusSol']."','1','0')";
                            if($resultado1 = $mysqli->query($consulta1)) {
                                /*SI SE EJECUTO LA CONSULTA EN LA BD CON EXITO REALIZAMOS UN UPDATE EN LA TABLA DE SOLICITUD*/
                            $consulta2 = "UPDATE `solicitud` SET `EstatusSol` = '".$_POST['EstatusSol']."' WHERE  CodSol = '".$_POST["CodS"]."' ";
                              if($resultado2 = $mysqli->query($consulta2)) {
                                  /*SI SE EJECUTO LA CONSULTA EN LA BD CON EXITO LO REDIRECCIONAMOS AL INDEX FINALIZA EL PROCESO DE RECHAZO*/
                                          
                                                  require("../PHPMailer-master/src/PHPMailer.php");
                                                  require("../PHPMailer-master/src/SMTP.php");
                                                  require("../PHPMailer-master/src/Exception.php");


                                                  $mail1 = new PHPMailer\PHPMailer\PHPMailer();
                                                  $mail1->IsSMTP();

                                                  $mail1->CharSet="UTF-8";
                                                  $mail1->Host = "smtp.office365.com";
                                                  //$mail1->SMTPDebug = 2;
                                                  $mail1->Port = 587; //465 or 587

                                                  $mail1->SMTPSecure = 'tls';
                                                  $mail1->SMTPAuth = true;
                                                  $mail1->IsHTML(true);
                                                  //Authentication
                                                  $mail1->Username = "recursos.humanos@wri.org";
                                                  $mail1->Password = "WRIm3x1c086!";
                                                  //Set Params
                                                  $mail1->SetFrom("recursos.humanos@wri.org");
                                                  //$mail1->AddAddress($CorreoEmpleado2);
                                                  $mail1->AddAddress($CorreoEmpleado);

                                                  $mail1->Subject = "Solicitud de Vacaciones Rechazada";
                                                  $mail1->Body = '
                                                  <html>
                                                  <head>
                                                  <title>Bienvenido</title>
                                                  </head>
                                                  <body>
                                                  <h1>
                                                  Notificación de Solicitud de Vacaciones Rechazada:
                                                  </h1>
                                                  <p>

                                                  Hola estimado Usuario tu solicitud ha sido Rechazada <br>
                                                  Para revisar tus dias o generar otra solicitud ingresar al siguiente link:

                                                  <br>
                                                  <a href="www.vacacioneswrimexico.org"> www.vacacioneswrimexico.org</a>
                                                  </p>

                                                  </body>
                                                  </html>
                                                  </html>
                                                  ';

                                                  if(!$mail1->Send()) {
                                                   ?>
                                                  <script type="text/javascript">
                                                  window.location.href='index.php?accion=rechazadonoenviar';
                                                  </script>
                                                  <?php
                                                  } else {
                                                  ?>
                                                  <script type="text/javascript">
                                                  window.location.href='index.php?accion=rechazadoenviado';
                                                  </script>
                                                  <?php
                                                  }


                               }/* IF consulta2 */
                            }/* IF consulta1*/

                    }else if($EstatusSolicitud == 1 ){/* SI LA SOLICITUD ES ACEPTADA*/

                              $qryConsulta02 = "SELECT DiasVac,DiasTomados,DiasTotales,AnioPActual FROM tbl_vacacionesxusuarios WHERE CodEmpleado = ".$_POST["CodEmpleado"]." " ;
                                if($resQryConsulta02 = $mysqli->query($qryConsulta02)) {/* CONSULTA PARA OBTENER DIASVAC,DIAS TOTALES*/
                                        $dataCons02 = mysqli_fetch_assoc($resQryConsulta02);
                                        $DiastotalesPHP = $dataCons02['DiasTotales'];
                                        $DiasVacPHP2 = $dataCons02['DiasVac'];
                                        $AnioPActualPHP = $dataCons02['AnioPActual'];


                                        $sqlsol = "SELECT * FROM  `solicitud`  WHERE  CodEmpleado  = ".$_POST["CodEmpleado"]." and CodSol = ".$CodSolicitud." ";
                                        if($qrysol = $mysqli->query($sqlsol)) {/* CONSULTA PARA OBTENER DATOS DE LA SOLICITUD A ACEPTAR */
                                        $datasol = mysqli_fetch_assoc($qrysol);
                                        $DiasSolPHP = $datasol['DiasSol'];


                                            $qryConsulta98 = "SELECT COUNT(*) as SiHayDias FROM `periodoanterior` WHERE CodEmpleado =  ".$CodEmpleado." and Estatus <> 3 ";
                                            if($resQryConsulta98 = $mysqli->query($qryConsulta98)) {//CONSULTAS PARA SABER SI HAY PERIODO ANTERIOR
                                            $dataCons98 = mysqli_fetch_assoc($resQryConsulta98);

                                             
                                                 if($dataCons98['SiHayDias'] == 1 ){//SI HAY DIAS DE PERIODO ANTERIOR

                                                                    $qryConsulta97 = "SELECT * FROM `periodoanterior` WHERE CodEmpleado =  ".$CodEmpleado." ";
                                                                    if($resQryConsulta97 = $mysqli->query($qryConsulta97)) {//DATOS DEL PERIODO ANTERIOR
                                                                    $dataCons97 = mysqli_fetch_assoc($resQryConsulta97);
                                                                    $CodPeriodoAntPHP =  $dataCons97['CodPeriodoAnt'];
                                                                    $DiasPeriodoAnt_PHP =   $dataCons97['DiasPAnt']; 

                                                                    
                                                                                        /*DIAS SOLICITADOS  ES MAYOR DIAS PANTANT  0*/
                                                                                        if($DiasSolPHP > $DiasPeriodoAnt_PHP ){/*ES MAYOR DIAS SOL A DIAS PANTERIOR AUN QUEDAN DIAS A DESCONTAR */
        
                                                                                        $subtotal =  $DiasSolPHP - $DiasPeriodoAnt_PHP; 
                                                                                        $DiasPant2 = 0;
                                                                                        
                                                                                              $consultaAp18 = "UPDATE `periodoanterior` SET `DiasPAnt` = '".$DiasPant2."', `Estatus` = 3    WHERE  CodPeriodoAnt = '".$CodPeriodoAntPHP."' AND CodEmpleado = '".$_POST["CodEmpleado"]."' ";
                                                                                              if($res18= $mysqli->query($consultaAp18)) {
                                                                                                 
                                                                                                     $resultado = abs($subtotal) - $DiasVacPHP2;  

                                                                                                            $consultaAp17 = "UPDATE `tbl_vacacionesxusuarios` SET `DiasTotales` = '".abs($resultado)."'  WHERE  CodEmpleado = '".$_POST["CodEmpleado"]."'  ";

                                                                                                            if($res17= $mysqli->query($consultaAp17)) {

                                                                                                                                $consAprobada = "INSERT INTO `tbl_rasolicitud` (`CodRAS`, `CodSol`,  `CodEmpleado`,`Motivo`, `FechaAR`, `HoraAR`, `EstatusSolicitud`, `Tipo`, `TipoSol`) VALUES (NULL,'".$_POST["CodS"]."', '".$_POST["CodEmpleado"]."', '".$_POST['observaciones']."', '".$fecha_del_dia."', '".$hora_actual."','".$_POST['EstatusSol']."','2','2')";
                                                                                                                                if($resuAprovada = $mysqli->query($consAprobada)) {

                                                                                                                                                  $consultaAp2 = "UPDATE `solicitud` SET `EstatusSol` = '1' WHERE  CodSol = '".$_POST["CodS"]."' ";
                                                                                                                                                  if($res02= $mysqli->query($consultaAp2)) {

                                                                                                                                                                          $consultaAp7 = "INSERT INTO `tbl_histo_vacaciones` (`CodVacacionesH`, `CodEmpleado`,  `AnioPActual`,`CodSol`, `DiasTotalesH`, `DiasSolH`)
                                                                                                                                                                          VALUES (NULL,'".$_POST["CodEmpleado"]."', '".$AnioPActualPHP."', '".$_POST['CodS']."', '".$resultado."', '".$DiasSolPHP."')";

                                                                                                                                                                          if($res07= $mysqli->query($consultaAp7)) {


                                                                                                                                                                                      echo " Hola estimado Usuario tu solicitud ha sido Aprobada <br>
                                                                                                                                                                                      Para revisar tus dias o generar otra solicitud ingresar al siguiente link  <a href='index.php'> ir al index</a>";

                                                                                                                                                                                      /*
                                                                                                                                                                                                                      require("../PHPMailer-master/src/PHPMailer.php");
                                                                                                                                                                                                  require("../PHPMailer-master/src/SMTP.php");
                                                                                                                                                                                                  require("../PHPMailer-master/src/Exception.php");


                                                                                                                                                                                                  $mail0 = new PHPMailer\PHPMailer\PHPMailer();
                                                                                                                                                                                                  $mail0->IsSMTP();

                                                                                                                                                                                                  $mail0->CharSet="UTF-8";
                                                                                                                                                                                                  $mail0->Host = "smtp.office365.com";
                                                                                                                                                                                                  //$mail0->Host = "smtp.office365.com";
                                                                                                                                                                                                  //$mail0->SMTPDebug = 2;
                                                                                                                                                                                                  $mail0->Port = 587; //465 or 587

                                                                                                                                                                                                  $mail0->SMTPSecure = 'tls';
                                                                                                                                                                                                  $mail0->SMTPAuth = true;
                                                                                                                                                                                                  $mail0->IsHTML(true);

                                                                                                                                                                                                  //Authentication
                                                                                                                                                                                                  $mail0->Username = "recursos.humanos@wri.org";
                                                                                                                                                                                                  $mail0->Password = "WRIm3x1c086!";


                                                                                                                                                                                                  //Set Params
                                                                                                                                                                                                  $mail0->SetFrom("recursos.humanos@wri.org");
                                                                                                                                                                                                  //$mail0->AddAddress($CorreoEmpleado2);
                                                                                                                                                                                                  $mail0->AddAddress($CorreoEmpleado);
                                                                                                                                                                                                  $mail0->AddAddress($CorreoEmpleadoG);
                                                                                                                                                                                                  $mail0->AddAddress("rh@wri.org");



                                                                                                                                                                                                  $mail0->Subject = "Solicitud de Vacaciones Aprobada";
                                                                                                                                                                                                  $mail0->Body = '
                                                                                                                                                                                                  <html>
                                                                                                                                                                                                  <head>
                                                                                                                                                                                                  <title>Bienvenido</title>
                                                                                                                                                                                                  </head>
                                                                                                                                                                                                  <body>
                                                                                                                                                                                                  <h1>
                                                                                                                                                                                                  Notificación de Solicitud de Vacaciones Aprobada:
                                                                                                                                                                                                  </h1>
                                                                                                                                                                                                  <p>

                                                                                                                                                                                                  Hola estimado Usuario tu solicitud ha sido Aprobada <br>
                                                                                                                                                                                                  Para revisar tus dias o generar otra solicitud ingresar al siguiente link:

                                                                                                                                                                                                  <br>
                                                                                                                                                                                                  <a href="www.vacacioneswrimexico.org"> www.vacacioneswrimexico.org</a>
                                                                                                                                                                                                  </p>
                                                                                                                                                                                                  </body>
                                                                                                                                                                                                  </html>
                                                                                                                                                                                                  </html>
                                                                                                                                                                                                  ';


                                                                                                                                                                                                  if(!$mail0->Send()) {
                                                                                                                                                                                                  ?>
                                                                                                                                                                                                  <script type="text/javascript">
                                                                                                                                                                                                  window.location.href='index.php?accion=aceptadoerror';
                                                                                                                                                                                                  </script>
                                                                                                                                                                                                  <?php

                                                                                                                                                                                                  }else {

                                                                                                                                                                                                  ?>
                                                                                                                                                                                                  <script type="text/javascript">
                                                                                                                                                                                                  window.location.href='index.php?accion=aceptadoexito';
                                                                                                                                                                                                  </script>
                                                                                                                                                                                                  <?php

                                                                                                                                                                                                  }                                        
                                                                                                                                                                                      */

                                                                                                                                                                                  ?>
                                                                                                                                                                                                  <script type="text/javascript">
                                                                                                                                                                                                  window.location.href='index.php?accion=aceptadoexito';
                                                                                                                                                                                                  </script>
                                                                                                                                                                                                  <?php

                                                                                                                                                                          }
                                                                                                                                                  }                                                                                                                     
                                                                                                                            }
                                                                                                            }
                                                                                              } 


                                                                                        }
                                                                                        else if($DiasSolPHP < $DiasPeriodoAnt_PHP ){/* DIAS SOL ES MENOR A DIAS P ANTERIOR AUN QUEDAN DIAS DEL PERIODO ANTERIOR */
                                
                                                                                        $subtotal =  $DiasSolPHP - $DiasPeriodoAnt_PHP; 

                                                                                                  $consultaAp19 = "UPDATE `periodoanterior` SET `DiasPAnt` = '".abs($subtotal)."', `Estatus` = 2    WHERE  CodPeriodoAnt = '".$CodPeriodoAntPHP."' AND CodEmpleado = '".$_POST["CodEmpleado"]."' ";
                                                                                              if($res19= $mysqli->query($consultaAp19)) {

                                                                                                            $consAprobada02 = "INSERT INTO `tbl_rasolicitud` (`CodRAS`, `CodSol`,  `CodEmpleado`,`Motivo`, `FechaAR`, `HoraAR`, `EstatusSolicitud`, `Tipo`, `TipoSol`) VALUES (NULL,'".$_POST["CodS"]."', '".$_POST["CodEmpleado"]."', '".$_POST['observaciones']."', '".$fecha_del_dia."', '".$hora_actual."','".$_POST['EstatusSol']."','2','2')";

                                                                                                            if($resuAprovada02 = $mysqli->query($consAprobada02)) {

                                                                                                                           $resultadox = $DiasSolPHP -  $DiastotalesPHP;


                                                                                                                                    $consultaAp29 = "UPDATE `tbl_vacacionesxusuarios` SET `DiasTotales` = '".abs($resultadox)."' WHERE  CodEmpleado = '".$_POST["CodEmpleado"]."' ";
                                                                                                                                    if($res29= $mysqli->query($consultaAp29)) {

                                                                                                                                    
                                                                                                                          $consultaAp30 = "INSERT INTO `tbl_histo_vacaciones` (`CodVacacionesH`, `CodEmpleado`,  `AnioPActual`,`CodSol`, `DiasTotalesH`, `DiasSolH`)
                                                                                                                          VALUES (NULL,'".$_POST["CodEmpleado"]."', '".$AnioPActualPHP."', '".$_POST['CodS']."', '".abs($resultadox)."', '".$DiasSolPHP."')";

                                                                                                                          if($res30= $mysqli->query($consultaAp30)) {

                                                                                                                             $consultaAp31 = "UPDATE `solicitud` SET `EstatusSol` = '1' WHERE  CodSol = '".$_POST["CodS"]."' ";

                                                                                                                                          if($res31= $mysqli->query($consultaAp31)) {


                                                                                                                                                /*
                                                                                                                                                                  require("../PHPMailer-master/src/PHPMailer.php");
                                                                                                                      require("../PHPMailer-master/src/SMTP.php");
                                                                                                                      require("../PHPMailer-master/src/Exception.php");


                                                                                                                      $mail2 = new PHPMailer\PHPMailer\PHPMailer();
                                                                                                                      $mail2->IsSMTP();

                                                                                                                      $mail2->CharSet="UTF-8";
                                                                                                                      $mail2->Host = "smtp.office365.com";
                                                                                                                      //$mail2->Host = "smtp.office365.com";
                                                                                                                      //$mail2->SMTPDebug = 2;
                                                                                                                      $mail2->Port = 587; //465 or 587

                                                                                                                      $mail2->SMTPSecure = 'tls';
                                                                                                                      $mail2->SMTPAuth = true;
                                                                                                                      $mail2->IsHTML(true);

                                                                                                                      //Authentication
                                                                                                                      $mail2->Username = "recursos.humanos@wri.org";
                                                                                                                      $mail2->Password = "WRIm3x1c086!";


                                                                                                                      //Set Params
                                                                                                                      $mail2->SetFrom("recursos.humanos@wri.org");
                                                                                                                      //$mail2->AddAddress($CorreoEmpleado2);
                                                                                                                      $mail2->AddAddress($CorreoEmpleado);
                                                                                                                      $mail2->AddAddress($CorreoEmpleadoG);
                                                                                                                      $mail2->AddAddress("rh@wri.org");



                                                                                                                      $mail2->Subject = "Solicitud de Vacaciones Aprobada";
                                                                                                                      $mail2->Body = '
                                                                                                                      <html>
                                                                                                                      <head>
                                                                                                                      <title>Bienvenido</title>
                                                                                                                      </head>
                                                                                                                      <body>
                                                                                                                      <h1>
                                                                                                                      Notificación de Solicitud de Vacaciones Aprobada:
                                                                                                                      </h1>
                                                                                                                      <p>

                                                                                                                      Hola estimado Usuario tu solicitud ha sido Aprobada <br>
                                                                                                                      Para revisar tus dias o generar otra solicitud ingresar al siguiente link:

                                                                                                                      <br>
                                                                                                                      <a href="www.vacacioneswrimexico.org"> www.vacacioneswrimexico.org</a>
                                                                                                                      </p>
                                                                                                                      </body>
                                                                                                                      </html>
                                                                                                                      </html>
                                                                                                                      ';


                                                                                                                      if(!$mail2->Send()) {
                                                                                                                      ?>
                                                                                                                      <script type="text/javascript">
                                                                                                                      window.location.href='index.php?accion=aceptadoerror';
                                                                                                                      </script>
                                                                                                                      <?php

                                                                                                                      }else {

                                                                                                                      ?>
                                                                                                                      <script type="text/javascript">
                                                                                                                      window.location.href='index.php?accion=aceptadoexito';
                                                                                                                      </script>
                                                                                                                      <?php

                                                                                                                      }     
                                                                                                                                                */

                                                                                                                      ?>
                                                                                                                      <script type="text/javascript">
                                                                                                                      window.location.href='index.php?accion=aceptadoexito';
                                                                                                                      </script>
                                                                                                                      <?php



                                                                                                                              }
                                                                                                                          }

                                                                                                                     }                                                                                                              

                                                                                                            }                                                                                                 

                                                                                              } 
                                                                                      
                                                                                        }
                                                                                        else if($DiasSolPHP == $DiasPeriodoAnt_PHP ){
                                                                                        /* DIAS SOL = DIAS PERIODO ANTERIOR  0 */

                                                                                        $subtotal =  $DiasSolPHP - $DiasPeriodoAnt_PHP; 
                                                                                        $DiasPant3 = $subtotal;                                                                                       

                                                                                              $consultaAp20 = "UPDATE `periodoanterior` SET `DiasPAnt` = '".$DiasPant3."', `Estatus` = 3    WHERE  CodPeriodoAnt = '".$CodPeriodoAntPHP."' AND CodEmpleado = '".$_POST["CodEmpleado"]."' ";
                                                                                              if($res20= $mysqli->query($consultaAp20)) {
                                                                                                    

                                                                                                      $consultaAp35 = "UPDATE `solicitud` SET `EstatusSol` = '1' WHERE  CodSol = '".$_POST["CodS"]."' ";

                                                                                                              if($res35= $mysqli->query($consultaAp35)) {

                                                                                                                                  $resultadox = $DiasSolPHP -  $DiastotalesPHP;

                                                                                                                          $consultaAp36 = "INSERT INTO `tbl_histo_vacaciones` (`CodVacacionesH`, `CodEmpleado`,  `AnioPActual`,`CodSol`, `DiasTotalesH`, `DiasSolH`)
                                                                                                                          VALUES (NULL,'".$_POST["CodEmpleado"]."', '".$AnioPActualPHP."', '".$_POST['CodS']."', '".abs($resultadox)."', '".$DiasSolPHP."')";

                                                                                                                          if($res36= $mysqli->query($consultaAp36)) {                                                                                                                            

                                                                                                                            $consultaAp37 = "UPDATE `tbl_vacacionesxusuarios` SET `DiasTotales` = '".abs($resultadox)."' WHERE  CodEmpleado = '".$_POST["CodEmpleado"]."' ";
                                                                                                                                    if($res37= $mysqli->query($consultaAp37)) {
                                                                                                                                            
                                                                                                                                             
                                                                                                                    /*
                                                                                                                            require("../PHPMailer-master/src/PHPMailer.php");
                                                                                                                      require("../PHPMailer-master/src/SMTP.php");
                                                                                                                      require("../PHPMailer-master/src/Exception.php");


                                                                                                                      $mail3 = new PHPMailer\PHPMailer\PHPMailer();
                                                                                                                      $mail3->IsSMTP();

                                                                                                                      $mail3->CharSet="UTF-8";
                                                                                                                      $mail3->Host = "smtp.office365.com";
                                                                                                                      //$mail3->Host = "smtp.office365.com";
                                                                                                                      //$mail3->SMTPDebug = 2;
                                                                                                                      $mail3->Port = 587; //465 or 587

                                                                                                                      $mail3->SMTPSecure = 'tls';
                                                                                                                      $mail3->SMTPAuth = true;
                                                                                                                      $mail3->IsHTML(true);

                                                                                                                      //Authentication
                                                                                                                      $mail3->Username = "recursos.humanos@wri.org";
                                                                                                                      $mail3->Password = "WRIm3x1c086!";


                                                                                                                      //Set Params
                                                                                                                      $mail3->SetFrom("recursos.humanos@wri.org");
                                                                                                                      //$mail3->AddAddress($CorreoEmpleado2);
                                                                                                                      $mail3->AddAddress($CorreoEmpleado);
                                                                                                                      $mail3->AddAddress($CorreoEmpleadoG);
                                                                                                                      $mail3->AddAddress("rh@wri.org");



                                                                                                                      $mail3->Subject = "Solicitud de Vacaciones Aprobada";
                                                                                                                      $mail3->Body = '
                                                                                                                      <html>
                                                                                                                      <head>
                                                                                                                      <title>Bienvenido</title>
                                                                                                                      </head>
                                                                                                                      <body>
                                                                                                                      <h1>
                                                                                                                      Notificación de Solicitud de Vacaciones Aprobada:
                                                                                                                      </h1>
                                                                                                                      <p>

                                                                                                                      Hola estimado Usuario tu solicitud ha sido Aprobada <br>
                                                                                                                      Para revisar tus dias o generar otra solicitud ingresar al siguiente link:

                                                                                                                      <br>
                                                                                                                      <a href="www.vacacioneswrimexico.org"> www.vacacioneswrimexico.org</a>
                                                                                                                      </p>
                                                                                                                      </body>
                                                                                                                      </html>
                                                                                                                      </html>
                                                                                                                      ';


                                                                                                                      if(!$mail3->Send()) {
                                                                                                                      ?>
                                                                                                                      <script type="text/javascript">
                                                                                                                      window.location.href='index.php?accion=aceptadoerror';
                                                                                                                      </script>
                                                                                                                      <?php

                                                                                                                      }else {

                                                                                                                      ?>
                                                                                                                      <script type="text/javascript">
                                                                                                                      window.location.href='index.php?accion=aceptadoexito';
                                                                                                                      </script>
                                                                                                                      <?php

                                                                                                                      }
                                                                                                                    */

                                                                                                                       ?>
                                                                                                                      <script type="text/javascript">
                                                                                                                      window.location.href='index.php?accion=aceptadoexito';
                                                                                                                      </script>
                                                                                                                      <?php
                                                                                                        

                                                                                                      }

                                                                                                    }

                                                                                                  }   

                                                                                              }                                                                                    
                                                                                       
                                                                                        }
                                                                                        /**/                                                                     
                                                                        
                                                                    }//DATOS DEL PERIODO ANTERIOR

                                                 }else{//NO HAY DIAS DE PERIODO ANTERIOR

                                                          $resultado = abs($DiasSolPHP - $DiastotalesPHP);

                                                              $consAprobadaok = "INSERT INTO `tbl_rasolicitud` (`CodRAS`, `CodSol`,  `CodEmpleado`,`Motivo`, `FechaAR`, `HoraAR`, `EstatusSolicitud`, `Tipo`, `TipoSol`) VALUES (NULL,'".$_POST["CodS"]."', '".$_POST["CodEmpleado"]."', '".$_POST['observaciones']."', '".$fecha_del_dia."', '".$hora_actual."','".$_POST['EstatusSol']."','2','2')";

                                                              if($resuAprovadaok = $mysqli->query($consAprobadaok)) {

                                                                      $consultaAp40 = "UPDATE `solicitud` SET `EstatusSol` = '1' WHERE  CodSol = '".$_POST["CodS"]."' ";

                                                                      if($res40= $mysqli->query($consultaAp40)) {

                                                                                $consultaAp41 = "UPDATE `tbl_vacacionesxusuarios` SET `DiasTotales` = '".$resultado."' WHERE  CodEmpleado = '".$_POST["CodEmpleado"]."' ";

                                                                                if($res41= $mysqli->query($consultaAp41)) {

                                                                                            $consultaAp42 = "INSERT INTO `tbl_histo_vacaciones` (`CodVacacionesH`, `CodEmpleado`,  `AnioPActual`,`CodSol`, `DiasTotalesH`, `DiasSolH`)
                                                                                            VALUES (NULL,'".$_POST["CodEmpleado"]."', '".$AnioPActualPHP."', '".$_POST['CodS']."', '".$resultado."', '".$DiasSolPHP."')";

                                                                                            if($res42= $mysqli->query($consultaAp42)) {



                                                                                                                    /*
                                                                                                                      require("../PHPMailer-master/src/PHPMailer.php");
                                                                                                                      require("../PHPMailer-master/src/SMTP.php");
                                                                                                                      require("../PHPMailer-master/src/Exception.php");


                                                                                                                      $mail6 = new PHPMailer\PHPMailer\PHPMailer();
                                                                                                                      $mail6->IsSMTP();

                                                                                                                      $mail6->CharSet="UTF-8";
                                                                                                                      $mail6->Host = "smtp.office365.com";
                                                                                                                      //$mail6->Host = "smtp.office365.com";
                                                                                                                      //$mail6->SMTPDebug = 2;
                                                                                                                      $mail6->Port = 587; //465 or 587

                                                                                                                      $mail6->SMTPSecure = 'tls';
                                                                                                                      $mail6->SMTPAuth = true;
                                                                                                                      $mail6->IsHTML(true);

                                                                                                                      //Authentication
                                                                                                                      $mail6->Username = "recursos.humanos@wri.org";
                                                                                                                      $mail6->Password = "WRIm3x1c086!";


                                                                                                                      //Set Params
                                                                                                                      $mail6->SetFrom("recursos.humanos@wri.org");
                                                                                                                      //$mail6->AddAddress($CorreoEmpleado2);
                                                                                                                      $mail6->AddAddress($CorreoEmpleado);
                                                                                                                      $mail6->AddAddress($CorreoEmpleadoG);
                                                                                                                      $mail6->AddAddress("rh@wri.org");



                                                                                                                      $mail6->Subject = "Solicitud de Vacaciones Aprobada";
                                                                                                                      $mail6->Body = '
                                                                                                                      <html>
                                                                                                                      <head>
                                                                                                                      <title>Bienvenido</title>
                                                                                                                      </head>
                                                                                                                      <body>
                                                                                                                      <h1>
                                                                                                                      Notificación de Solicitud de Vacaciones Aprobada:
                                                                                                                      </h1>
                                                                                                                      <p>

                                                                                                                      Hola estimado Usuario tu solicitud ha sido Aprobada <br>
                                                                                                                      Para revisar tus dias o generar otra solicitud ingresar al siguiente link:

                                                                                                                      <br>
                                                                                                                      <a href="www.vacacioneswrimexico.org"> www.vacacioneswrimexico.org</a>
                                                                                                                      </p>
                                                                                                                      </body>
                                                                                                                      </html>
                                                                                                                      </html>
                                                                                                                      ';


                                                                                                                      if(!$mail6->Send()) {
                                                                                                                      ?>
                                                                                                                      <script type="text/javascript">
                                                                                                                      window.location.href='index.php?accion=aceptadoerror';
                                                                                                                      </script>
                                                                                                                      <?php

                                                                                                                      }else {

                                                                                                                      ?>
                                                                                                                      <script type="text/javascript">
                                                                                                                      window.location.href='index.php?accion=aceptadoexito';
                                                                                                                      </script>
                                                                                                                      <?php

                                                                                                                      }
                                                                                                                    */

                                                                                                                      ?>
                                                                                                                      <script type="text/javascript">
                                                                                                                      window.location.href='index.php?accion=aceptadoexito';
                                                                                                                      </script>
                                                                                                                      <?php


                                                                                            }

                                                                                }

                                                                      }

                                                              }

                                                 }



                                            }//CONSULTAS PARA SABER SI HAY PERIODO ANTERIOR
                                       
                                        }/* CONSULTA PARA OBTENER DATOS DE LA SOLICITUD A ACEPTAR */


                                }/* CONSULTA PARA OBTENER DIASVAC,DIAS TOTALES*/


                    }/* IF SI LA SOLICITUD ES ACEPTADA*/
/*session sin logearse*/
}else {
?>
<script type="text/javascript">
window.location.href='../index.php';
</script>
<?php
}