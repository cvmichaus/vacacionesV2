<?php

$CorreoPHP="alejandro.lopez@wri.org";
$nombrePHP="Prueba";
$UsuarioPHP="Demo";
$PassPHP="123";


			require("../PHPMailer-master/src/PHPMailer.php");
			require("../PHPMailer-master/src/SMTP.php");
			require("../PHPMailer-master/src/Exception.php");


			$mail3 = new PHPMailer\PHPMailer\PHPMailer();
			$mail3->IsSMTP(); 

			$mail3->CharSet="UTF-8";
			$mail3->Host = "mail.vacacioneswrimexico.org";

			$mail3->Port = 587; //465 or 587

			$mail3->SMTPSecure = 'tls';  
			$mail3->SMTPAuth = true; 
			$mail3->IsHTML(true);

			//Authentication
			$mail3->Username = "recursoshumanos@vacacioneswrimexico.org";
			$mail3->Password = "WRIm3x1c0";

			//Set Params
			//$mail3->SetFrom("recursos.humanos@wri.org");
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
			 echo "Mailer Error: " . $mail3->ErrorInfo;
			//header("Location: index.php?error=9");
			} else {
			//header("Location: index.php");  
			echo "se mando mail"; 
			}
?>