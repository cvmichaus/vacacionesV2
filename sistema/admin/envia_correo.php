<?php

$CorreoPHP = 'michusvalentin@gmail.com';

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

																		//Set Params
																		$mail3->SetFrom("recursos.humanos@wri.org");
																		//$mail3->AddAddress($CorreoEmpleado2);
																		$mail3->AddAddress($CorreoPHP);
																		$mail3->AddBCC('michusvalentin@gmail.com');
																		//$mail3->AddCC("recursos.humanos@wri.org");
																		$mail3->AddAddress("Alejandro.lopez@wri.org");
																		//$mail3->AddAddress("Alejandro.lopez@wri.org");


																		$mail3->Subject = "Demo Alta en el Sistema de Solicitud de Vacaciones WRI";
																		$mail3->Body = '
																		<html>
																	<head>
																	<title>Bienvenido Usuario   </title>
																	</head>
																	<body>
																	<h1>
																	Notificacion de Alta en Sistema de Solicitud de Vacaciones WRI:
																	</h1>
																	<p>

																	Hola estimado , este es un mensaje de prueba del sistema de Vacaciones WRI 
																	<br>
																	Puedes entrar a tu perfil a solicitar vacaciones  desde 
																	  <a href="www.vacacioneswrimexico.org"> www.vacacioneswrimexico.org</a>
						
																	</p>
																	</body>
																	</html>
																		';


																		if(!$mail3->Send()) {
																		 echo "Mailer Error: " . $mail->ErrorInfo;
																		echo "Error al enviar Mensaje";
																		} else {

																		//header("Location: index.php");  
																		echo "se mando mail"; 

																		}


?>