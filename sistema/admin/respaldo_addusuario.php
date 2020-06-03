<?php
/*DATOS USUARIO*/
ob_start();

    require("../../class/cnmysql.php");
	date_default_timezone_set('America/Mexico_City');
	$fecha_del_dia=date('Y-m-d');//fecha actual

	//echo '<script language="javascript">alert(" Fecha del dia '.$fecha_del_dia.' ");</script>'; 

	setlocale(LC_TIME,"es_ES");
	$hora_actual= strftime("%H:%M:%S"); 

		//DATOS USUARIO 

		$UsuarioPHP = $_POST["usuario"];    
		$PassPHP = $_POST["passwd"];          

				function encrypt($string, $key) 
				{
				$result = '';
				for($i=0; $i<strlen($string); $i++) {
				$char = substr($string, $i, 1);
				$keychar = substr($key, ($i % strlen($key))-1, 1);
				$char = chr(ord($char)+ord($keychar));
				$result.=$char;
				}
				return base64_encode($result);
				}

		$PassEncriptadoPHP = encrypt($PassPHP,"wrimexico2019");  
		$CorreoPHP = $_POST["correo"];  
		$PerfilPHP = $_POST["perfil"];   

		//DAtos EMPLEADO

	 $nombrePHP = $_POST["nombre"];   
	 $appaternoPHP = $_POST["appaterno"];   
	 $apmaternoPHP = $_POST["apmaterno"];   
	 $PosicionPHP = $_POST["Posicion"];   
	 $areaPHP = $_POST["area"]; 

	 $archivo = $_FILES['imagen']['name']; 
	 $Jefe1PHP = $_POST["jefe1"];   
	 $jefe2PHP = $_POST["jefe2"];   
	 $fecha_altaPHP = $_POST["fecha_ingreso"];//FECHA  DE INGRESO  

	//echo '<script language="javascript">alert(" Fecha de Ingreso '.$fecha_altaPHP.' ");</script>'; 

	 	//vacaciones x usuario
	$ant_aniosPHP = $_POST["ant_anios"];   
	$ant_mesPHP = $_POST["ant_mes"];   
	$ant_diasPHP = $_POST["ant_dias"];   
	$diasvacacionesPHP = $_POST["diasvacaciones"];   
	$diasUtilizadosPHP = $_POST["diasutilizados"]; 
	$diasTotalesPHP = $_POST["diastotales2"];  
	$DiasPeriodoAnterior= $_POST['DiasVacPeriodoAnt'];

	 //echo '<script language="javascript">alert(" DiAS Anteriores  '.$ChkDiasPeriodoAnterior.' ");</script>';

	// CALCULO PARA SABER EL PERIODO ACTUAL

	$porciones55 = explode("-", $fecha_altaPHP);
$Anio_PHP33=$porciones55[0];
$Mes_PHP33=$porciones55[1];
$Dia_PHP33=$porciones55[2];

$Anio_PHP33;//AÑO DE LA FECHA DE INGRESO
$anioactual = date('Y'); // AÑO DE LA FECHA ACTUAL 
$esp3="/";
$FechaPeriodoActual = $anioactual.$esp3.$Mes_PHP33.$esp3.$Dia_PHP33; //FORMAMOS EL PERIODO ACTUAL

//echo '<script language="javascript">alert(" comparamos fechas '.$fecha_del_dia.' vs '.$FechaPeriodoActual.' ");</script>'; 

if( $fecha_del_dia >= $FechaPeriodoActual ){
  // "SI YA EMPEZO "
	// echo '<script language="javascript">alert("ye comenzo el periodo actual ");</script>';
	$FechaPeriodoActual;//fecha alta  

	$date_future6 = strtotime('+ 12 month', strtotime($FechaPeriodoActual));
	$FechaFinRealPeriodoActual = date('Y-m-d', $date_future6);

	$date_future66 = strtotime('- 1 day', strtotime($FechaFinRealPeriodoActual));
	$FechaFinPeriodoActual = date('Y-m-d', $date_future66);  
	//NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final 

	$date_future5 = strtotime('+ 18 month', strtotime($FechaPeriodoActual));
	$VigenciaPeriodoActual = date('Y-m-d', $date_future5);  
	// NoTA: se le suman 18 meses 

		//VERIFICAMOS SI SE INTRODUCIERON DIAS ANTERIORES	
			if($DiasPeriodoAnterior <> 0){
				// echo '<script language="javascript">alert("Si tiene dias anteriores el periodo actual ");</script>';

				$date_future0 = strtotime('- 1 year', strtotime($FechaPeriodoActual));
				$FechaPeriodoAnterior = date('Y-m-d', $date_future0);


				$date_future01 = strtotime('+ 12 month', strtotime($FechaPeriodoAnterior));
				$FechaFinPeriodoAnterior2 = date('Y-m-d', $date_future01);
				//NO LO TOMAMOS EN CUENTA

				$date_future666 = strtotime('- 1 day', strtotime($FechaFinPeriodoAnterior2));
				$FechaFinPeriodoAnteriorx = date('Y-m-d', $date_future666);
				 //NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final ";
				

				$date_future55 = strtotime('+ 6 month', strtotime($FechaFinPeriodoAnteriorx));
				$VigenciaPeriodoAnterior = date('Y-m-d', $date_future55); 
				//NoTA: se le suman 6 meses ";


			}



}else{
//SI NO HA COMENZADO
			// echo '<script language="javascript">alert("no ha comenzado el periodo actual, calculamos el periodo anterior que sera el periodo actual ");</script>';
		
		$anioactual = date('Y')-1; //date('Y'); //'2019';//
	   	
		$esp3="/";
		$FechaPeriodoActual = $anioactual.$esp3.$Mes_PHP33.$esp3.$Dia_PHP33; 
		//$Dia_PHP33.$esp3.$Mes_PHP33.$esp3.$anioactual;
		

		$date_future6 = strtotime('+ 12 month', strtotime($FechaPeriodoActual));
		$FechaFinRealPeriodoActual = date('Y-m-d', $date_future6);
		
		$date_future66 = strtotime('- 1 day', strtotime($FechaFinRealPeriodoActual));
		$FechaFinPeriodoActual = date('Y-m-d', $date_future66); 
		 //NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final ";
		
		$date_future5 = strtotime('+ 18 month', strtotime($FechaPeriodoActual));
		$VigenciaPeriodoActual = date('Y-m-d', $date_future5);  
		//" NoTA: se le suman 18 meses ";
		

		//VERIFICAMOS SI SE INTRODUCIERON DIAS ANTERIORES	
				if($DiasPeriodoAnterior <> 0){
					// echo '<script language="javascript">alert("Si tiene dias anteriores el periodo actual ");</script>';
				//SI SI HAY DIAS ANTERIORES
				$date_future0 = strtotime('- 1 year', strtotime($FechaPeriodoActual));
				$FechaPeriodoAnterior = date('Y-m-d', $date_future0);

				$date_future01 = strtotime('+ 12 month', strtotime($FechaPeriodoAnterior));
				$FechaFinPeriodoAnterior2 = date('Y-m-d', $date_future01);
				//NO LO TOMAMOS EN CUENTA 

				$date_future666 = strtotime('- 1 day', strtotime($FechaFinPeriodoAnterior2));
				$FechaFinPeriodoAnteriorx = date('Y-m-d', $date_future666);  
				// NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final ";


				$date_future55 = strtotime('+ 6 month', strtotime($FechaFinPeriodoAnteriorx));
				$VigenciaPeriodoAnterior = date('Y-m-d', $date_future55); 
				// " NoTA: se le suman 6 meses ";




			}


}

$esp99="-";
$FechaPeriodoActualIF = $anioactual.$esp99.$Mes_PHP33.$esp99.$Dia_PHP33; //para el if
//AQUI HAY QUE REVISARLO 
if( $fecha_del_dia >= $FechaPeriodoActualIF ){
 // echo  "SI HOY VENCE ";
   //echo '<script language="javascript">alert("hoy se vence el  periodo actual ");</script>';
	// header("Location: index.php?error=10");
	
	 $FechaPeriodoActual2;//fecha alta  

	$date_future6 = strtotime('+ 12 month', strtotime($FechaPeriodoActual2));
	 $FechaFinRealPeriodoActual2 = date('Y-m-d', $date_future6);

	$date_future66 = strtotime('- 1 day', strtotime($FechaFinRealPeriodoActual2));
	  $FechaFinPeriodoActual2 = date('Y-m-d', $date_future66);  
	   //NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final 

	$date_future5 = strtotime('+ 18 month', strtotime($FechaPeriodoActual2));
	 $VigenciaPeriodoActual2 = date('Y-m-d', $date_future5);   
	  // NoTA: se le suman 18 meses 


}else{
     
			
   		//IMAGEN DEL USUARIO 	
		$target_dir = "../fotos/usuarios/";
		$target_file = $target_dir . basename($_FILES["imagen"]["name"]);

		if(empty($archivo)){
		$archivo = "avatar.png";
		}else{
		$info = new SplFileInfo($archivo);
		$extension= $info->getExtension();

		if($extension  == 'png' OR $extension  == 'jpg' OR $extension  == 'JPG' ){

				if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {

				}else{
				//echo '<script language="javascript">alert("No se movio la imagen que deseas subir, intentalo de nuevo");</script>';
				//header("Location: index.php?error=1");  
				?>
														<script type="text/javascript">
														window.location.href='index.php?error=1';
														</script>
														<?php
				}

		}else{
		//echo '<script language="javascript">alert(" Solo se permite imagenes JPG y PNG , El archivo que intentas subir es:  '.$extension.' ");</script>';
		//header("Location: index.php?error=2"); 
		?>
														<script type="text/javascript">
														window.location.href='index.php?error=2';
														</script>
														<?php 
		}

		}

		//IMAGEN DEL USUARIO 	

		//insertamos el usuario en la tabla usuario v2 	

			$consulta1 = "INSERT INTO `tbl_usuarios` (`CodUsuario`, `Usuario`, `Clave`, `Correo`, `Estatus`, `Perfil`, `Fecha_Alta`, `Hora_Alta`,`Imagen`) VALUES (NULL,'".$UsuarioPHP."', '".$PassEncriptadoPHP."', '".$CorreoPHP."', '1', '".$PerfilPHP."','".$fecha_del_dia."', '".$hora_actual."','".$archivo."' )";

					if($resultado1 = $mysqli->query($consulta1)) {
					//echo '<script language="javascript">alert("si se Guardo el usuario ver tabla usuarios ");</script>';

					$traerid = "SELECT CodUsuario FROM `tbl_usuarios` WHERE Usuario= '".$UsuarioPHP."' AND Perfil = '".$PerfilPHP."' AND  Clave = '".$PassEncriptadoPHP."' ";

							if($resid = $mysqli->query($traerid)) {
							$data = $resid->fetch_array();
							$UsuarioCod =  $data["CodUsuario"];


										$consulta2 = "INSERT INTO `tbl_empleados` (`CodE`,`CodUsu`,`Nombres`,`ApellidoPaterno`,`ApellidoMaterno`,`Posicion`, `Area`, `Jefe1`, `Jefe2`, `fecha_ingreso`) VALUES (NULL,'".$UsuarioCod."','".$_POST["nombre"]."','".$_POST["appaterno"]."','".$_POST["apmaterno"]."','".$_POST["Posicion"]."', '".$_POST['area']."', '".$_POST['jefe1']."', '".$_POST['jefe2']."', '".$_POST['fecha_ingreso']."' )";

										if($resultado2 = $mysqli->query($consulta2)) {

											//echo '<script language="javascript">alert("si se Guardo el usuario ver tabla empleados ");</script>';

												 $estatusc3 = 1;
	$consulta3 = "INSERT INTO `tbl_vacacionesxusuarios` (`CodVacaciones`,`CodEmpleado`,`AnioPActual`,`Anio`,`Mes`,`Dias`, `DiasTomados`, `DiasVac`, `DiasTotales`, `Estatus`) VALUES (NULL,'".$UsuarioCod."','".$anioactual."','".$ant_aniosPHP."','".$ant_mesPHP."','".$ant_diasPHP."','".$diasUtilizadosPHP."','".$diasvacacionesPHP."','".$diasTotalesPHP."','".$estatusc3."')";

									                  if($resultado3 = $mysqli->query($consulta3)) {

										                 //echo '<script language="javascript">alert("si se Guardo  ver tabla tbl_vacacionesxusuarios ");</script>';



										         $estatusc4 = 1;
												 $consulta4 = "INSERT INTO `periodoactual` (`CodPeriodoActual`,`CodEmpleado`,`AnioPeriodoActual`,`FechaInicioPActual`,`FechaFinPActual`,`VigenciaPActual`, `EstatusPActual`, `FechaGPActual`, `HoraGPActual`) VALUES (NULL,'".$UsuarioCod."','".$anioactual."','".$FechaPeriodoActual."','".$FechaFinPeriodoActual."','".$VigenciaPeriodoActual."','".$estatusc4."','".$fecha_del_dia."','".$hora_actual."')";

									                  if($resultado4 = $mysqli->query($consulta4)) {

										                 //echo '<script language="javascript">alert("si se Guardo  ver tabla periodoactual ");</script>';
										                 		//si tiene dias del periodo anterior lo insertamos en la base 
															
															

																if($DiasPeriodoAnterior >= 1){

																
															//echo '<script language="javascript">alert("SI tiene periodo anterior ");</script>';		

																	$estatusc5 = 1;														    
																	$AnioPAntPHP = $anioactual - 1;

																	$consulta5 = "INSERT INTO `periodoanterior` (`CodPeriodoAnt`,`CodEmpleado`,`DiasPAnt`,`AnioPAnt`,`FechaInicioPAnt`,`FechaFinPAnt`,`VigenciaPAnt`, `Estatus`, `FechaGPant`, `HoraGPant`) VALUES (NULL,'".$UsuarioCod."','".$DiasPeriodoAnterior."','".$AnioPAntPHP."','".$FechaPeriodoAnterior."','".$FechaFinPeriodoAnteriorx."','".$VigenciaPeriodoAnterior."','".$estatusc5."','".$fecha_del_dia."','".$hora_actual."')";
																	if($resultado5 = $mysqli->query($consulta5)) {

																	//echo '<script language="javascript">alert("si se Guardo  ver tabla periodoanterior ");</script>';

																	}else{}	

															}else{}

													


														//aqui va insertado el historial
														$estatusc6 = 1;
														$consulta6 = "INSERT INTO `tbl_histo_vacaciones` (`CodVacacionesH`,`CodEmpleado`,`AnioPActual`,`CodSol`,`DiasTotalesH`,`DiasSolH`) VALUES (NULL,'".$UsuarioCod."','".$anioactual."',0,'".$diasTotalesPHP."',0)";

														if($resultado6 = $mysqli->query($consulta6)) {

															/*

																require("../PHPMailer-master/src/PHPMailer.php");
																	require("../PHPMailer-master/src/SMTP.php");
																	require("../PHPMailer-master/src/Exception.php");


																		$mail3 = new PHPMailer\PHPMailer\PHPMailer();
																		$mail3->IsSMTP(); 

																		$mail3->CharSet="UTF-8";
																		//$mail3->Host = "smtp.gmail.com";
																		$mail3->Host = "smtp.office365.com";
																	    //$mail3->SMTPDebug = 2; 
																		$mail3->Port = 587; //465 or 587

																		$mail3->SMTPSecure = 'tls';  
																		$mail3->SMTPAuth = true; 
																		$mail3->IsHTML(true);

																		//Authentication
																		//$mail3->Username = "vacacioneswrimexico@gmail.com";
																		//$mail3->Password = "Rueville10!";
																		$mail3->Username = "recursos.humanos@wri.org";
																		 $mail3->Password = "WRIm3x1c086!";

																$mail3->SetFrom("recursos.humanos@wri.org");
																//$mail3->AddAddress($CorreoEmpleado2);
																$mail3->AddAddress($CorreoPHP);
																//$mail3->AddBCC('michusvalentin@gmail.com');



																$mail3->Subject = "Alta en el Sistema de Solicitud de Vacaciones WRI";
																$mail3->Body = '
																<html>
																<head>
																<title>Bienvenido Usuario '.$nombrePHP.'  </title>
																</head>
																<body>
																<h1>
																Notificacion de Alta en Sistema de Solicitud de Vacaciones WRI:
																</h1>
																<p>

																Hola estimado Usuario '.$nombrePHP.' se te ha dado de alta en el sistema de Vacaciones WRI <br>
																Tus Datos son los Siguientes:
																<br>
																Usuario: '.$UsuarioPHP.'
																<br>
																Clave: '.$PassPHP.'
																<br>
																Puedes entrar a tu perfil a solicitar vacaciones  desde 
																<a href="www.vacacioneswrimexico.org"> aqui</a>
																</p>
																</body>
																</html>
																';


																if(!$mail3->Send()) {
																// echo "Mailer Error: " . $mail->ErrorInfo;
																 //header("Location: index.php?error=9");
																 ?>
														<script type="text/javascript">
														window.location.href='index.php?errornoseenviocorreo';
														</script>
														<?php
																} else {

																//header("Location: index.php");  
																//echo "se mando mail"; 
																?>
														<script type="text/javascript">
														window.location.href='index.php';
														</script>
														<?php

																}

																*/

													$to = "alejandro.lopez@wri.org";
													$subject = "Alta en el Sistema de Solicitud de Vacaciones WRI";
													$headers = "MIME-Version: 1.0" . "\r\n";
													$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

													$message = "
													<html>
													<head>
													<title>Bienvenido Usuario ".$nombrePHP." </title>
													</head>
													<body>
													<h1>Notificacion de Alta en Sistema de Solicitud de Vacaciones WRI:</h1>
													<p> Hola estimado Usuario ".$nombrePHP." se te ha dado de alta en el sistema de Vacaciones WRI <br>
													Tus Datos se han enviado al correo ".$CorreoPHP." y son los Siguientes:
													<br>
													Usuario: ".$UsuarioPHP."
													<br>
													Clave: ".$PassPHP."
													<br>
													Puedes entrar a tu perfil a solicitar vacaciones  desde www.vacacioneswrimexico.org
													</p>
													</body>
													</html>";

													mail($to, $subject, $message, $headers);

													?>
													<script type="text/javascript">
														window.location.href='index.php';
														</script>														
													<?php

															}else{ //header("Location: index.php?error=8");  
																?>
														<script type="text/javascript">
														window.location.href='index.php?error=8';
														</script>
														<?php
														}


									                     }else{ #header("Location: index.php?error=7");  
									                     	?>
														<script type="text/javascript">
														window.location.href='index.php?error=7';
														</script>
														<?php
									                 }	

									            }else{ //header("Location: index.php?error=6");  
														?>
														<script type="text/javascript">
														window.location.href='index.php?error=6';
														</script>
														<?php
									        	}         				
	
										}else{ //header("Location: index.php?error=5");  
										?>
														<script type="text/javascript">
														window.location.href='index.php?error=5';
														</script>
														<?php
									}

							}else{ //header("Location: index.php?error=4");  
									?>
														<script type="text/javascript">
														window.location.href='index.php?error=4';
														</script>
														<?php
						}

					}else{ //header("Location: index.php?error=3");  

							?>
														<script type="text/javascript">
														window.location.href='index.php?error=3';
														</script>
														<?php

				}
			
}


   
ob_end_flush();
?>