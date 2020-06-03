<?php

$FechaPeriodoActual = "05-03-2018";;//fecha alta 
$DiasPeriodoAnterior = "1"; 

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
				 echo "FEcha Periodo Actual:"; echo $FechaPeriodoAnterior = date('Y-m-d', $date_future0); echo "<br>";


				$date_future01 = strtotime('+ 12 month', strtotime($FechaPeriodoAnterior));
				echo "FECHA  FIN PERIODO: "; echo $FechaFinPeriodoAnterior2 = date('Y-m-d', $date_future01); echo "<br>";


				$date_future666 = strtotime('- 1 day', strtotime($FechaFinPeriodoAnterior2));
				echo "FECHA FINAL: "; echo $FechaFinPeriodoAnteriorx = date('Y-m-d', $date_future666); echo "<br>"; //NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final "; echo "<br>";
				

				$date_future55 = strtotime('+ 6 month', strtotime($FechaFinPeriodoAnteriorx));
				echo "VIgencia Periodo Anterior"; echo $VigenciaPeriodoAnterior = date('Y-m-d', $date_future55); //NoTA: se le suman 6 meses "; 
}

?>