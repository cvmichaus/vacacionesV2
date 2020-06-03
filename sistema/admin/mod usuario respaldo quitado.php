	/*
	$fecha_altaPHP = $_POST["fecha_ingreso"];   
			
	$ant_aniosPHP = $_POST["ant_anios"];   
	$ant_mesPHP = $_POST["ant_mes"];   
	$ant_diasPHP = $_POST["ant_dias"];   
	$diasvacacionesPHP = $_POST["diasvacaciones"];   
	$diasUtilizadosPHP = $_POST["diasutilizados"]; 
	$diasTotalesPHP = $_POST["diastotales2"];  
	
	$DiasPeriodoAnterior= $_POST['DiasVacPeriodoAnt'];
*/
	
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
	$FechaFinPeriodoActual = date('Y-m-d', $date_future66);  //NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final 

	$date_future5 = strtotime('+ 18 month', strtotime($FechaPeriodoActual));
	$VigenciaPeriodoActual = date('Y-m-d', $date_future5);  // NoTA: se le suman 18 meses 

		//VERIFICAMOS SI SE INTRODUCIERON DIAS ANTERIORES	
			if($DiasPeriodoAnterior <> 0){
				// echo '<script language="javascript">alert("Si tiene dias anteriores el periodo actual ");</script>';

				$date_future0 = strtotime('- 1 year', strtotime($FechaPeriodoActual));
				$FechaPeriodoAnterior = date('Y-m-d', $date_future0);

				$date_future01 = strtotime('+ 12 month', strtotime($FechaPeriodoAnterior));
				$FechaFinPeriodoAnterior2 = date('Y-m-d', $date_future01);


				$date_future666 = strtotime('- 1 day', strtotime($FechaFinPeriodoAnterior2));
				$FechaFinPeriodoAnteriorx = date('Y-m-d', $date_future666); //NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final ";
				
				$date_future55 = strtotime('+ 6 month', strtotime($FechaFinPeriodoAnteriorx));
				$VigenciaPeriodoAnterior = date('Y-m-d', $date_future55); //NoTA: se le suman 6 meses ";


					$estatusc5 = 1;														    
					$AnioPAntPHP = $anioactual - 1;

					$consulta5 = "INSERT INTO `periodoanterior` (`CodPeriodoAnt`,`CodEmpleado`,`DiasPAnt`,`AnioPAnt`,`FechaInicioPAnt`,`FechaFinPAnt`,`VigenciaPAnt`, `Estatus`, `FechaGPant`, `HoraGPant`) VALUES (NULL,'".$CodUsuarioPHP."','".$DiasPeriodoAnterior."','".$AnioPAntPHP."','".$FechaPeriodoAnterior."','".$FechaFinPeriodoAnteriorx."','".$VigenciaPeriodoAnterior."','".$estatusc5."','".$fecha_del_dia."','".$hora_actual."')";
					if($resultado5 = $mysqli->query($consulta5)) {

					}

			}


}else{//SI NO HA COMENZADO

		$anioactual = date('Y')-1; //date('Y'); //'2019';//
	   	
		$esp3="/";
		$FechaPeriodoActual = $anioactual.$esp3.$Mes_PHP33.$esp3.$Dia_PHP33; //$Dia_PHP33.$esp3.$Mes_PHP33.$esp3.$anioactual;
		

		$date_future6 = strtotime('+ 12 month', strtotime($FechaPeriodoActual));
		$FechaFinRealPeriodoActual = date('Y-m-d', $date_future6);
		
		$date_future66 = strtotime('- 1 day', strtotime($FechaFinRealPeriodoActual));
		$FechaFinPeriodoActual = date('Y-m-d', $date_future66);  //NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final ";
		
		$date_future5 = strtotime('+ 18 month', strtotime($FechaPeriodoActual));
		$VigenciaPeriodoActual = date('Y-m-d', $date_future5);  //" NoTA: se le suman 18 meses ";

		//VERIFICAMOS SI SE INTRODUCIERON DIAS ANTERIORES	
				if($DiasPeriodoAnterior <> 0){
					// echo '<script language="javascript">alert("Si tiene dias anteriores el periodo actual ");</script>';
				//SI SI HAY DIAS ANTERIORES
				$date_future0 = strtotime('- 1 year', strtotime($FechaPeriodoActual));
				$FechaPeriodoAnterior = date('Y-m-d', $date_future0);

				$date_future01 = strtotime('+ 12 month', strtotime($FechaPeriodoAnterior));
				$FechaFinPeriodoAnterior2 = date('Y-m-d', $date_future01);

				$date_future666 = strtotime('- 1 day', strtotime($FechaFinPeriodoAnterior2));
				$FechaFinPeriodoAnteriorx = date('Y-m-d', $date_future666);  // NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final ";


				$date_future55 = strtotime('+ 6 month', strtotime($FechaFinPeriodoAnteriorx));
				$VigenciaPeriodoAnterior = date('Y-m-d', $date_future55); // " NoTA: se le suman 6 meses ";

			}

}