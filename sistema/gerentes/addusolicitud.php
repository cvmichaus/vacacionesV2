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


$consulta1 = "INSERT INTO `solicitud` (`CodSol`, `CodEmpleado`,  `FechaInicio`, `FechaFin`, `DiasSol`, `EstatusSol`,`FechaGSol`, `HoraGSol`) VALUES (NULL,'".$_POST["CodEmpleado"]."',  '".$_POST['dateini']."', '".$_POST['datefin']."', '".$_POST['diassol']."','2','".$fecha_del_dia."','".$hora_actual."')";					   
	if($resultado1 = $mysqli->query($consulta1)) {
		
		
		$sqlUsuario = "SELECT * FROM `tbl_usuarios` as u  INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodUsuario WHERE u.Estatus = 1 AND  u.CodUsuario = ".$_POST["CodEmpleado"]." ";
                           if($resqryUsuario = $mysqli->query($sqlUsuario)) {
                                while($data = mysqli_fetch_assoc($resqryUsuario)){  
									$data['Jefe1'];
									
									  $sqlReportaa = " SELECT * FROM `tbl_usuarios` as u  INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodUsuario WHERE u.Estatus = 1 AND  u.CodUsuario = ".$data['Jefe1']." ";
                           if($resqryReporta = $mysqli->query($sqlReportaa)) {
                                while($rowReporta = mysqli_fetch_assoc($resqryReporta)){
								$espacio= " ";	

								$CorreoEmpleado = $_POST["CorreoEmpleado"];
								$CorreoReporta = $_POST["CorreoReporta"];
                $NombreReporta = $rowReporta['Nombres'].$espacio.$rowReporta['ApellidoPaterno'].$espacio.$rowReporta['ApellidoMaterno'];
							
                  
            require("../PHPMailer-master/src/PHPMailer.php");
            require("../PHPMailer-master/src/SMTP.php");
            require("../PHPMailer-master/src/Exception.php");


            $mail3 = new PHPMailer\PHPMailer\PHPMailer();
            $mail3->IsSMTP(); 

            $mail3->CharSet="UTF-8";
            $mail3->Host = "smtp.office365.com";
            $mail3->Port = 587; //465 or 587

            $mail3->SMTPSecure = 'tls';  
            $mail3->SMTPAuth = true; 
            $mail3->IsHTML(true);

            //Authentication
          
            $mail3->Username = "recursos.humanos@wri.org";
           $mail3->Password = "WRIm3x1c086!";

            //Set Params
            $mail3->SetFrom("recursos.humanos@wri.org");

              $mail3->AddAddress($CorreoEmpleado);
              $mail3->AddAddress($CorreoReporta);
             
       


            $mail3->Subject = "Solicitud de Vacaciones";
            $mail3->Body = '
              <html>
              <head>
              <title>Bienvenido</title>
              </head>
              <body>
              <h1>
              Notificación de Solicitud de Vacaciones:
              </h1>
              <p>

              Hola estimado '.$NombreReporta.'  el empleado '.$_POST['NombreEmpleado'].' ha solicitado vacaciones '.$_POST['dateini'].' al '.$_POST['datefin'].' <br>
              Para aprobar o rechazar las vacaciones favor de seguir el siguiente link
              <br>
              <a href="www.vacacioneswrimexico.org"> www.vacacioneswrimexico.org</a>
              <br>

              </p>
              </body>
              </html>
            ';


            if(!$mail3->Send()) {
            // echo "Mailer Error: " . $mail->ErrorInfo;  '".$_POST['dateini']."', '".$_POST['datefin']."',
            ?>
            <script type="text/javascript">
            window.location.href='index.php?error=1';
            </script>
            <?php
            } else {

            //header("Location: index.php");  
            ?>
            <script type="text/javascript">
            window.location.href='index.php';
            </script>
            <?php

            }
						
						  
						  
				  }
						
				   }
							
			}
	   }
						  
				?>
            <script type="text/javascript">
            window.location.href='index.php';
            </script>
            <?php
					
			 }  else{
					//echo "error al guardar 1";
      ?>
            <script type="text/javascript">
            window.location.href='index.php?error=2';
            </script>
            <?php
				}
				/*aqui se cierra*/
 }

?>