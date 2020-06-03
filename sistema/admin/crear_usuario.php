<?php
date_default_timezone_set('America/Mexico_City');
 echo "Fecha del dia: "; echo $fecha_del_dia=date('Y-m-d');  echo "<br>"; //fecha actual 

 echo "Fecha de Ingreso:  "; echo $fecha_altaPHP = "2013-04-01";//FECHA  DE INGRESO 
 echo "<br>";

$DiasPeriodoAnterior=1;

$porciones55 = explode("-", $fecha_altaPHP);
$Anio_PHP33=$porciones55[0];
$Mes_PHP33=$porciones55[1];
$Dia_PHP33=$porciones55[2]; 

echo "Año Fecha Ingresada: "; echo $Anio_PHP33;  echo "<br>"; //AÑO DE LA FECHA DE INGRESO   
echo "Año Fecha Actual: "; echo $anioactual = date('Y');  echo "<br>"; // AÑO DE LA FECHA ACTUAL 
$esp3="/"; /* Separador */
echo "Fecha Periodo Actual: "; echo $FechaPeriodoActual = $anioactual.$esp3.$Mes_PHP33.$esp3.$Dia_PHP33;  echo "<br>"; //FORMAMOS EL PERIODO ACTUAL

$esp99="-";
$FechaPeriodoActualIF = $anioactual.$esp99.$Mes_PHP33.$esp99.$Dia_PHP33; //para el if

if( $fecha_del_dia >= $FechaPeriodoActualIF ){
  // "SI YA EMPEZO a correr el periodo actual "
	echo "<hr>";

echo "<h2>YA EMPEZO A CORRER EL PERIODO ACTUAL</h2>"; 

	$FechaPeriodoActual;//fecha alta  

	$date_future6 = strtotime('+ 12 month', strtotime($FechaPeriodoActual));
	echo "Fecha Fin Real Periodo Actual: (Se le suman 12 meses ) "; echo $FechaFinRealPeriodoActual = date('Y-m-d', $date_future6); echo "<br>";

	$date_future66 = strtotime('- 1 day', strtotime($FechaFinRealPeriodoActual));
	echo "Fecha de Antes de que caduque: (Se le quita 1 dia )"; echo $FechaFinPeriodoActual = date('Y-m-d', $date_future66); echo "<br>";  //NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final 


	$date_future5 = strtotime('+ 18 month', strtotime($FechaPeriodoActual));
	echo "Fecha de Vigencia del Periodo Actual ( Se le Suman 18 Meses ) : "; echo $VigenciaPeriodoActual = date('Y-m-d', $date_future5); echo "<br>"; // NoTA: se le suman 18 meses


	 echo "<hr>";

	if($DiasPeriodoAnterior <> 0){//SI TENEMOS DIAS DE PERIODO ANTERIOR

echo "<h2>SI TENEMOS DIAS DE PERIODO ANTERIOR</h2>"; 

		$date_future0 = strtotime('- 1 year', strtotime($FechaPeriodoActual));
		echo "Fecha de Periodo Anterior menos 1 año: "; echo  $FechaPeriodoAnterior = date('Y-m-d', $date_future0); echo "<br>";


		$date_future01 = strtotime('+ 12 month', strtotime($FechaPeriodoAnterior));
		 echo "Fecha de Periodo Anterior mas 12 meses: "; echo $FechaFinPeriodoAnterior2 = date('Y-m-d', $date_future01); echo "<br>";


		$date_future666 = strtotime('- 1 day', strtotime($FechaPeriodoAnterior));
		 echo "Fecha de Vigencia del Periodo Anterior menos 1 dia : "; echo  $FechaFinPeriodoAnteriorx = date('Y-m-d', $date_future666); echo "<br>"; //NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final ";


		$date_future55 = strtotime('+ 6 month', strtotime($FechaFinPeriodoAnteriorx));
		 echo "Fecha de Vigencia del Periodo anterior mas 6 mese : "; echo $VigenciaPeriodoAnterior = date('Y-m-d', $date_future55);  echo "<br>";//NoTA: se le suman 6 meses ";

 

 }

}else{
echo "<hr>";

echo "<h2>AUN NO COMIENZA A CORRER EL PERIODO ACTUAL GENERAMOS LOS DATOS DEL PERIODO ACTUAL</h2>"; 

echo "Año Actual: "; echo $anioactual = date('Y'); echo "<br>"; //date('Y'); //'2019';//
	   	
		$esp3="/";
		echo "Fecha Periodo Actual "; echo $FechaPeriodoActual = $anioactual.$esp3.$Mes_PHP33.$esp3.$Dia_PHP33; echo "<br>";//$Dia_PHP33.$esp3.$Mes_PHP33.$esp3.$anioactual;
		

		$date_future6 = strtotime('+ 12 month', strtotime($FechaPeriodoActual));
		echo "Fecha Fin Real Periodo Actual (mas 12 meses) : "; echo $FechaFinRealPeriodoActual = date('Y-m-d', $date_future6); echo "<br>";
		
		$date_future66 = strtotime('- 1 day', strtotime($FechaFinRealPeriodoActual));
		echo "Fecha Fin Periodo Actual (Menos 1 dia ya sumado los 12 Meses ) : "; echo $FechaFinPeriodoActual = date('Y-m-d', $date_future66);  echo "<br>"; //NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final ";
		
		$date_future5 = strtotime('+ 18 month', strtotime($FechaPeriodoActual));
		echo "Vigencia Periodo Actual ( mas 18 meses para la vigencia) : " ; echo $VigenciaPeriodoActual = date('Y-m-d', $date_future5);  echo "<br>"; //" NoTA: se le suman 18 meses ";

//VERIFICAMOS SI SE INTRODUCIERON DIAS ANTERIORES	
				if($DiasPeriodoAnterior <> 0){

					echo "<hr>";
						echo "<h2>SI TENEMOS DIAS DE PERIODO ANTERIOR GENERAMOS LA FECHA DEL PERIODO ANTERIOR</h2>"; ;

					// echo '<script language="javascript">alert("Si tiene dias anteriores el periodo actual ");</script>';
				//SI SI HAY DIAS ANTERIORES
				$date_future0 = strtotime('- 1 year', strtotime($FechaPeriodoActual));
				echo "Fecha del Periodo Anterior: "; echo $FechaPeriodoAnterior = date('Y-m-d', $date_future0); echo "<br>";

				$date_future01 = strtotime('+ 12 month', strtotime($FechaPeriodoAnterior));
				echo "Fecha Fin Real del Periodo Anterior (mas 12 meses) : ";  echo $FechaFinPeriodoAnterior2 = date('Y-m-d', $date_future01);echo "<br>";

				$date_future666 = strtotime('- 1 day', strtotime($FechaPeriodoAnterior));
				 echo "Fecha del Periodo Anterior (Mas los 12 meses  menos 1 dia ): "; echo $FechaFinPeriodoAnteriorx = date('Y-m-d', $date_future666); echo "<br>"; // NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final ";


				$date_future55 = strtotime('+ 6 month', strtotime($FechaFinPeriodoAnteriorx));
				echo "Fecha de vigencia del  Periodo Anterior ( le sumamos 6 meses) : ";  echo $VigenciaPeriodoAnterior = date('Y-m-d', $date_future55);echo "<br>"; // " NoTA: se le suman 6 meses ";




			}

	}

?>