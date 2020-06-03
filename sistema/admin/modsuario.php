<?php
/*DATOS USUARIO*/
    require("../../class/cnmysql.php");
	date_default_timezone_set('America/Mexico_City');
	$fecha_del_dia=date('Y-m-d');//fecha actual
	setlocale(LC_TIME,"es_ES");
	$hora_actual= strftime("%H:%M:%S");  

	$CodUsuarioPHP= $_POST["CodU"];

	$UsuarioPHP = $_POST["usuario"];

	
	$CorreoPHP = $_POST["correo"];  
	$PerfilPHP = $_POST["perfil"];        

/* DAtos EMPLEADO*/

	 $nombrePHP = $_POST["nombre"];   
	 $appaternoPHP = $_POST["appaterno"];   
	 $apmaternoPHP = $_POST["apmaterno"];   
	 $PosicionPHP = $_POST["Posicion"];   
	 $areaPHP = $_POST["area"];   
	 $archivo1 = $_FILES['ImagenPHP']['name']; 

	 if(empty($archivo)){
	 	$archivo = $_POST['fotoactual']; 
	 }else{
	 	$archivo = $_FILES['ImagenPHP']['name']; 
	 }
	 
	 $reportaPHP = $_POST["jefe1"];   
	 $jefePHP = $_POST["jefe2"];   
	



//IMAGEN DEL USUARIO 	
		$target_dir = "../fotos/usuarios/";
		$target_file = $target_dir . basename($_FILES["imagen"]["name"]);

		if(empty($archivo)){
		$archivo = $_POST['fotoactual']; 
		}else{
		$info = new SplFileInfo($archivo);
		$extension= $info->getExtension();

		if($extension  == 'png' OR $extension  == 'jpg' OR $extension  == 'JPG' ){
				if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
				}else{	?>
														<script type="text/javascript">
														window.location.href='index.php?error=1';
														</script>
														<?php
									}

		}else{		
		?>
														<script type="text/javascript">
														window.location.href='index.php?error=2';
														</script>
														<?php 
		}

		}

		//IMAGEN DEL USUARIO 	

$consulta1 = "UPDATE  `tbl_usuarios` SET Usuario='".$UsuarioPHP."'  , Correo = '".$CorreoPHP."' , Perfil = '".$PerfilPHP."',Imagen = '".$archivo."' WHERE  CodUsuario = '".$CodUsuarioPHP."'  ";
	if($resultado1 = $mysqli->query($consulta1)) {

				$consulta2 = "UPDATE  `tbl_empleados` SET Nombres='".$nombrePHP."'  , ApellidoPaterno = '".$appaternoPHP."' , ApellidoMaterno = '".$apmaternoPHP."', Posicion ='".$PosicionPHP."' , Area ='".$areaPHP."' , Jefe1 ='".$reportaPHP."' , Jefe2 ='".$jefePHP."'  WHERE  CodE = '".$CodUsuarioPHP."'  ";
				if($resultado2 = $mysqli->query($consulta2)) {

					$consulta3 = "UPDATE  `tbl_vacacionesxusuarios` 
					SET AnioPActual='".$anioactual."'  , 
					Anio = '".$ant_aniosPHP."' , 
					Mes = '".$ant_mesPHP."', 
					Dias ='".$ant_diasPHP."' , 
					DiasTomados ='".$diasUtilizadosPHP."' , 
					DiasVac ='".$diasvacacionesPHP."' , 
					DiasTotales ='".$diasTotalesPHP."'  
					WHERE  CodEmpleado = '".$CodUsuarioPHP."' AND Estatus = 1  ";

								if($resultado3 = $mysqli->query($consulta3)) {

								?>
								<script type="text/javascript">
								window.location.href='index.php';
								</script>
								<?php

								}else{

								?>
								<script type="text/javascript">
								window.location.href='index.php?error=0';
								</script>
								<?php
								}
				}else{
				?>
				<script type="text/javascript">
				window.location.href='index.php?error=1';
				</script>
				<?php
				}


	}else{
										?>
                  <script type="text/javascript">
                  window.location.href='index.php?error=2';
                  </script>
          <?php
											}


?>