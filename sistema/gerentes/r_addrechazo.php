<?php
session_start();
  if($_SESSION["logueado"] == TRUE) {

    set_time_limit(0);
    require("../../class/cnmysql.php");
    date_default_timezone_set('America/Mexico_City');
    $fecha_del_dia=date('Y-m-d');//fecha actual

    setlocale(LC_TIME,"es_ES");
    $hora_actual= strftime("%H:%M:%S");

    $user = isset($_SESSION['UsuarioNombre']) ? $_SESSION['UsuarioNombre'] : null ;
    $iduser= isset($_SESSION['CodUsuario']) ? $_SESSION['CodUsuario'] : null ;

        $EstatusSolicitud = $_POST['EstatusSol'];
        $CodEmpleado = $_POST["CodEmpleado"];
        $CodSolicitud= $_POST["CodS"];


        /*para mamndar el correo al usuario*/
        $sqlUsuario = "SELECT * FROM `tbl_usuarios` as u INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodE WHERE u.estatus = 1 AND u.CodUsuario = ".$_POST["CodEmpleado"]." ";
        $resqryUsuario = $mysqli->query($sqlUsuario);
        $data = mysqli_fetch_assoc($resqryUsuario);
        $CorreoEmpleado = $data['Correo'];
        $CodReportaPHP = $data['Jefe1'];


         $sqlEmpleadoG = "SELECT Correo FROM  `tbl_usuarios`  as u  WHERE u.CodUsuario =  ".$CodReportaPHP." " ;
                  $resqryEmpleadoG = $mysqli->query($sqlEmpleadoG);
                      $dataG = mysqli_fetch_assoc($resqryEmpleadoG);
                      $CorreoEmpleadoG = $dataG['Correo'];




              if($EstatusSolicitud == 0){


              //echo '<script language="javascript">alert("peticion rechazada, jajaja");</script>';

    $consulta1 = "INSERT INTO `tbl_rasolicitud` (`CodRAS`, `CodSol`,`CodEmpleado`,`Motivo`, `FechaAR`, `HoraAR`, `EstatusSolicitud`, `Tipo`,`TipoSol`) VALUES (NULL,'".$_POST["CodS"]."', '".$_POST["CodEmpleado"]."', '".$_POST['observaciones']."', '".$fecha_del_dia."', '".$hora_actual."','".$_POST['EstatusSol']."','1','0')";
                      if($resultado1 = $mysqli->query($consulta1)) {


                      $consulta2 = "UPDATE `solicitud` SET `EstatusSol` = '".$_POST['EstatusSol']."' WHERE  CodSol = '".$_POST["CodS"]."' ";
                      if($resultado2 = $mysqli->query($consulta2)) {



                                require("../PHPMailer-master/src/PHPMailer.php");
                                require("../PHPMailer-master/src/SMTP.php");
                                require("../PHPMailer-master/src/Exception.php");


                                $mail4 = new PHPMailer\PHPMailer\PHPMailer();
                                $mail4->IsSMTP();

                                $mail4->CharSet="UTF-8";
                                $mail4->Host = "smtp.office365.com";
                                //$mail4->SMTPDebug = 2;
                                $mail4->Port = 587; //465 or 587

                                $mail4->SMTPSecure = 'tls';
                                $mail4->SMTPAuth = true;
                                $mail4->IsHTML(true);

                                //Authentication

                                $mail4->Username = "recursos.humanos@wri.org";
                                $mail4->Password = "WRIm3x1c086!";

                                //Set Params
                                $mail4->SetFrom("recursos.humanos@wri.org");
                                //$mail4->AddAddress($CorreoEmpleado2);
                                 $mail4->AddAddress($CorreoEmpleado);




                                $mail4->Subject = "Solicitud de Vacaciones Rechazada";
                                $mail4->Body = '
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


                                if(!$mail4->Send()) {
                                // echo "Mailer Error: " . $mail->ErrorInfo;

                                 //header("Location: index.php?accion=rechazado");


                                                            ?>
                                                            <script type="text/javascript">
                                                            window.location.href='index.php?accion=rechazado';
                                                            </script>
                                                            <?php

                                } else {

                                                      ?>
                                                      <script type="text/javascript">
                                                      window.location.href='index.php?accion=rechazado';
                                                      </script>
                                                      <?php

                                }

                                               ?>
                                              <script type="text/javascript">
                                              window.location.href='index.php?accion=rechazado';
                                              </script>
                                              <?php
                       }else{ }
                    }else{  }

            }
            else  if($EstatusSolicitud == 1 ){//ACEPTADO

             //  echo '<script language="javascript">alert(" es una peticion aceptada");</script>';//ACEPTADA

               $qryConsulta02 = "SELECT DiasVac,DiasTomados,DiasTotales,AnioPActual FROM tbl_vacacionesxusuarios WHERE CodEmpleado = ".$_POST["CodEmpleado"]." " ;
                  if($resQryConsulta02 = $mysqli->query($qryConsulta02)) {
                      $dataCons02 = mysqli_fetch_assoc($resQryConsulta02);
                      $DiastotalesPHP = $dataCons02['DiasTotales'];
                       $DiasVacPHP2 = $dataCons02['DiasVac'];
                       $AnioPActualPHP = $dataCons02['AnioPActual'];

                      // echo '<script language="javascript">alert(" Dias Totales  '.$DiastotalesPHP.'");</script>';

                                      $sqlsol = "SELECT * FROM  `solicitud`  WHERE  CodEmpleado  = ".$_POST["CodEmpleado"]." and CodSol = ".$CodSolicitud." ";
                                      if($qrysol = $mysqli->query($sqlsol)) {
                                      $datasol = mysqli_fetch_assoc($qrysol);
                                      $DiasSolPHP = $datasol['DiasSol'];
                                      }
                     //  echo '<script language="javascript">alert(" Dias Sol  '.$DiasSolPHP.'");</script>';


                            $qryConsulta98 = "SELECT COUNT(*) as SiHayDias FROM `periodoanterior` WHERE CodEmpleado =  ".$CodEmpleado." and Estatus = 1 ";
                            if($resQryConsulta98 = $mysqli->query($qryConsulta98)) {
                            $dataCons98 = mysqli_fetch_assoc($resQryConsulta98);

                                if($dataCons98['SiHayDias'] == 1 ){
                                  // echo '<script language="javascript">alert(" SI hay dias anteriores ");</script>';

                                          $qryConsulta97 = "SELECT * FROM `periodoanterior` WHERE CodEmpleado =  ".$CodEmpleado." ";
                                          if($resQryConsulta97 = $mysqli->query($qryConsulta97)) {
                                          $dataCons97 = mysqli_fetch_assoc($resQryConsulta97);
                                            $CodPeriodoAntPHP =  $dataCons97['CodPeriodoAnt'];
                                            $DiasPeriodoAnt_PHP =  $dataCons97['DiasPAnt'];

                                          // echo '<script language="javascript">alert("DiasAnteriores   '.$DiasPeriodoAnt_PHP.'");</script>';

                                      /*es aqui */
                                          $resultado1 =  $DiasSolPHP -$DiasPeriodoAnt_PHP;

                                          if($resultado1 == 0){

                                             $consultaAp15 = "UPDATE `periodoanterior` SET `DiasPAnt` = '".$resultado1."'   WHERE  CodPeriodoAnt = '".$CodPeriodoAntPHP."' AND CodEmpleado = '".$_POST["CodEmpleado"]."' ";

                                                                        if($res15= $mysqli->query($consultaAp15)) {
                                                                            echo "";
                                                                        }else{
                                                                          echo"";
                                                                        }


                                          }else if( $resultado1 >= 1){

                                            $consultaAp16 = "UPDATE `periodoanterior` SET `DiasPAnt` = '".$resultado1."'   WHERE  CodPeriodoAnt = '".$CodPeriodoAntPHP."' AND CodEmpleado = '".$_POST["CodEmpleado"]."' ";

                                                                        if($res16= $mysqli->query($consultaAp16)) {
                                                                            echo "";
                                                                        }else{
                                                                          echo"";
                                                                        }


                                          }

                                          // echo '<script language="javascript">alert("Resultado1   '.$resultado1.'");</script>';

                                          $resultado = abs($resultado1 - $DiasVacPHP2);

                                           //echo '<script language="javascript">alert("Resultado   '.abs($resultado).'");</script>';

                                              $consAprobada = "INSERT INTO `tbl_rasolicitud` (`CodRAS`, `CodSol`,  `CodEmpleado`,`Motivo`, `FechaAR`, `HoraAR`, `EstatusSolicitud`, `Tipo`, `TipoSol`) VALUES (NULL,'".$_POST["CodS"]."', '".$_POST["CodEmpleado"]."', '".$_POST['observaciones']."', '".$fecha_del_dia."', '".$hora_actual."','".$_POST['EstatusSol']."','2','2')";

                                                if($resuAprovada = $mysqli->query($consAprobada)) {

                                            $consultaAp2 = "UPDATE `solicitud` SET `EstatusSol` = '1' WHERE  CodSol = '".$_POST["CodS"]."' ";

                                                     if($res02= $mysqli->query($consultaAp2)) {

                                                           $consultaAp3 = "UPDATE `tbl_vacacionesxusuarios` SET `DiasTotales` = '".$resultado."' WHERE  CodEmpleado = '".$_POST["CodEmpleado"]."' ";

                                                             if($res03= $mysqli->query($consultaAp3)) {

                                                                    $consultaAp4 = "UPDATE `periodoanterior` SET `Estatus` = 3   WHERE  CodPeriodoAnt = '".$CodPeriodoAntPHP."' AND CodEmpleado = '".$_POST["CodEmpleado"]."' ";

                                                                     if($res04= $mysqli->query($consultaAp4)) {

                                                                      /**/

                                                                       $consultaAp7 = "INSERT INTO `tbl_histo_vacaciones` (`CodVacacionesH`, `CodEmpleado`,  `AnioPActual`,`CodSol`, `DiasTotalesH`, `DiasSolH`)
                                                                       VALUES (NULL,'".$_POST["CodEmpleado"]."', '".$AnioPActualPHP."', '".$_POST['CodS']."', '".$resultado."', '".$DiasSolPHP."')";

                                                                        if($res07= $mysqli->query($consultaAp7)) {



                                require("../PHPMailer-master/src/PHPMailer.php");
                                require("../PHPMailer-master/src/SMTP.php");
                                require("../PHPMailer-master/src/Exception.php");


                                $mail5 = new PHPMailer\PHPMailer\PHPMailer();
                                $mail5->IsSMTP();

                                $mail5->CharSet="UTF-8";
                                $mail5->Host = "smtp.office365.com";
                                //$mail5->SMTPDebug = 2;
                                $mail5->Port = 587; //465 or 587

                                $mail5->SMTPSecure = 'tls';
                                $mail5->SMTPAuth = true;
                                $mail5->IsHTML(true);

                                //Authentication
                                $mail5->Username = "recursos.humanos@wri.org";
                                $mail5->Password = "WRIm3x1c086!";


                                //Set Params
                                $mail5->SetFrom("recursos.humanos@wri.org");
                                //$mail5->AddAddress($CorreoEmpleado2);
                                 $mail5->AddAddress($CorreoEmpleado);
                                 $mail5->AddAddress($CorreoEmpleadoG);
                                 //$mail5->AddAddress("rh@wri.org");



                                $mail5->Subject = "Solicitud de Vacaciones Aprobada";
                                $mail5->Body = '
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


                                if(!$mail5->Send()) {
                                // echo "Mailer Error: " . $mail->ErrorInfo;
                                echo "Error al enviar Mensaje";
                               // header("Location: index.php?accion=aceptado");

                                      ?>
                                      <script type="text/javascript">
                                      window.location.href='index.php?accion=aceptadoM';
                                      </script>
                                      <?php

                                } else {

                                        ?>
                                        <script type="text/javascript">
                                        window.location.href='index.php?accion=aceptadoF';
                                        </script>
                                        <?php

                                }


                                                                            //header("Location: index.php?accion=aceptado");

                                                                        }else{ //echo "res07";
                                                                      }

                                                                     }else{ //echo $consultaAp4;
                                                                      }

                                                             }else{ //echo "res03";
                                                           }

                                                     }else{ //echo "res02";
                                                   }

                                                }else{ //echo "resuAprovada";
                                              }


                                          }


                                }else{
                                   //echo '<script language="javascript">alert(" NO hay dias anteriores ");</script>';

                                        $resultado =  abs($DiastotalesPHP - $DiasSolPHP);
                                          //echo '<script language="javascript">alert("Resultado   '.$resultado.'");</script>';

                                            $consAprobada2 = "INSERT INTO `tbl_rasolicitud` (`CodRAS`, `CodSol`,  `CodEmpleado`,`Motivo`, `FechaAR`, `HoraAR`, `EstatusSolicitud`, `Tipo`, `TipoSol`) VALUES (NULL,'".$_POST["CodS"]."', '".$_POST["CodEmpleado"]."', '".$_POST['observaciones']."', '".$fecha_del_dia."', '".$hora_actual."','".$_POST['EstatusSol']."','2','2')";

                                              if($resuAprovada2 = $mysqli->query($consAprobada2)) {

                                                          $consultaAp5 = "UPDATE `solicitud` SET `EstatusSol` = '1' WHERE  CodSol = '".$_POST["CodS"]."' ";

                                                          if($res05= $mysqli->query($consultaAp5)) {

                                                             $consultaAp6 = "UPDATE `tbl_vacacionesxusuarios` SET `DiasTotales` = '".$resultado."' WHERE  CodEmpleado = '".$_POST["CodEmpleado"]."' ";

                                                               if($res06= $mysqli->query($consultaAp6)) {

                                                                 $consultaAp8 = "INSERT INTO `tbl_histo_vacaciones` (`CodVacacionesH`, `CodEmpleado`,  `AnioPActual`,`CodSol`, `DiasTotalesH`, `DiasSolH`)
                                                                       VALUES (NULL,'".$_POST["CodEmpleado"]."', '".$AnioPActualPHP."', '".$_POST['CodS']."', '".$resultado."', '".$DiasSolPHP."')";

                                                                        if($res08= $mysqli->query($consultaAp8)) {



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
                                                                             //$mail6->AddAddress("rh@wri.org");
                                                                           


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
                                                                            // echo "Mailer Error: " . $mail->ErrorInfo;
                                                                            echo "Error al enviar Mensaje";
                                                                            //header("Location: index.php?accion=aceptado");

                                                                            ?>
                                                                            <script type="text/javascript">
                                                                            window.location.href='index.php?accion=aceptadoEM2';
                                                                            </script>
                                                                            <?php

                                                                            } else {


                                                                            ?>
                                                                            <script type="text/javascript">
                                                                            window.location.href='index.php?accion=aceptadoM3';
                                                                            </script>
                                                                            <?php

                                                                            }



                                                                            ?>
                                                                            <script type="text/javascript">
                                                                            window.location.href='index.php?accion=aceptadoExito';
                                                                            </script>
                                                                            <?php

                                                                          }

                                                                        }else{ //echo "res06";
                                                                      }


                                                          }else{ //echo "res07";
                                                        }


                                              }else{ //echo "resuAprovada2";  echo $consAprobada2;
                                            }

                                 }

                            }

                  }


                }

}else {
    //header("Location: ../index.php");

          ?>
          <script type="text/javascript">
          window.location.href='../index.php';
          </script>
          <?php
}
