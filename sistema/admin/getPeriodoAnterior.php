

<?php
	date_default_timezone_set('America/Mexico_City');
	$fecha_del_dia=date('Y-m-d');//fecha actual

	$fecha_altaPHP = $_GET["fecha"]; //FECHA  DE INGRESO  
	$ChkDiasPeriodoAnterior ="SI";

	$porciones55 = explode("-", $fecha_altaPHP);
	$Anio_PHP33=$porciones55[0];
	$Mes_PHP33=$porciones55[1];
	$Dia_PHP33=$porciones55[2];

$Anio_PHP33;//AÑO DE LA FECHA DE INGRESO
$anioactual = date('Y'); // AÑO DE LA FECHA ACTUAL 
$esp3="/";
 $FechaPeriodoActual = $anioactual.$esp3.$Mes_PHP33.$esp3.$Dia_PHP33; //FORMAMOS EL PERIODO ACTUAL

//echo '<script language="javascript">alert(" comparamos fechas '.$fecha_del_dia.' vs '.$FechaPeriodoActual.' ");</script>'; 

$esp99="-";
$FechaPeriodoActualIF = $anioactual.$esp99.$Mes_PHP33.$esp99.$Dia_PHP33; //para el if


if( $fecha_del_dia >= $FechaPeriodoActualIF ){
  // "SI YA EMPEZO "
	 //echo "<STRONG> ye comenzo el periodo actual </STRONG>"; echo "<br>";	 

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
			if($ChkDiasPeriodoAnterior == 'SI'){
				// echo '<script language="javascript">alert("Si tiene dias anteriores el periodo actual ");</script>';

				$date_future0 = strtotime('- 1 year', strtotime($FechaPeriodoActual));
				 $FechaPeriodoAnterior = date('Y-m-d', $date_future0); 


				$date_future01 = strtotime('+ 12 month', strtotime($FechaPeriodoAnterior));
				  $FechaFinPeriodoAnterior2 = date('Y-m-d', $date_future01); 
				  //nO TOMAR EN CUENTA 


				$date_future666 = strtotime('- 1 day', strtotime($FechaFinPeriodoAnterior2));
				  $FechaFinPeriodoAnteriorx = date('Y-m-d', $date_future666); 
				//NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final ";
				

				$date_future55 = strtotime('+ 6 month', strtotime($FechaFinPeriodoAnteriorx));
				 $VigenciaPeriodoAnterior = date('Y-m-d', $date_future55); 
			 //NoTA: se le suman 6 meses ";

				 	 $anioperiodoanterior = date('Y')-1;
			}


}else{
//SI NO HA COMENZADO
	
	//echo "no ha comenzado el periodo actual, calculamos el periodo anterior que sera el periodo actual ";
		
		$anioactual = date('Y')-1; //date('Y'); //'2019';//
	   	
		$esp3="/";
		$FechaPeriodoActual = $anioactual.$esp3.$Mes_PHP33.$esp3.$Dia_PHP33; //$Dia_PHP33.$esp3.$Mes_PHP33.$esp3.$anioactual;
		

		$date_future6 = strtotime('+ 12 month', strtotime($FechaPeriodoActual));
		$FechaFinRealPeriodoActual = date('Y-m-d', $date_future6);
		
		$date_future66 = strtotime('- 1 day', strtotime($FechaFinRealPeriodoActual));
		$FechaFinPeriodoActual = date('Y-m-d', $date_future66); 
		 //NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final ";
		
		$date_future5 = strtotime('+ 18 month', strtotime($FechaPeriodoActual));
		$VigenciaPeriodoActual = date('Y-m-d', $date_future5);  //" NoTA: se le suman 18 meses ";
		
}
		//VERIFICAMOS SI SE INTRODUCIERON DIAS ANTERIORES	
				if($ChkDiasPeriodoAnterior == 'SI'){
					// echo '<script language="javascript">alert("Si tiene dias anteriores el periodo actual ");</script>';
				//SI SI HAY DIAS ANTERIORES
				$date_future0 = strtotime('- 1 year', strtotime($FechaPeriodoActual));
				$FechaPeriodoAnterior = date('Y-m-d', $date_future0); 

				$date_future01 = strtotime('+ 12 month', strtotime($FechaPeriodoAnterior));
				$FechaFinPeriodoAnterior2 = date('Y-m-d', $date_future01);
				//NOP SE TOMA EN CUENTA

				$date_future666 = strtotime('- 1 day', strtotime($FechaFinPeriodoAnterior2));
				$FechaFinPeriodoAnteriorx = date('Y-m-d', $date_future666); 

				 // NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final ";


				$date_future55 = strtotime('+ 6 month', strtotime($FechaFinPeriodoAnteriorx));
				$VigenciaPeriodoAnterior = date('Y-m-d', $date_future55); // " NoTA: se le suman 6 meses ";

				if( $fecha_del_dia >= $VigenciaPeriodoAnterior ){
					echo 'ya vencio la vigencia ('.$VigenciaPeriodoAnterior.') del periodo anterior por lo tanto no puedes poner dias del periodo anterior. ** ';
					echo "<br>";
					?>
						

						 <div id="periodo_anterior" >
                        
                     
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-3">Periodo Anterior **</label>
                      <div class="col-md-9 col-sm-9 col-xs-9">
                      <input  type="text" id="PeriodoAnt2" name="PeriodoAnt2" value='<?php echo date('Y')-1?>' readonly >
                       <input  type="hidden" id="PeriodoAnt" name="PeriodoAnt" value='<?php echo date('Y')-1?>'>
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      </div>


                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-3">Dias Vacaciones Periodo Anterior **</label>
                      <div class="col-md-9 col-sm-9 col-xs-9">
                      	<input  type="text" id="DiasVacPeriodoAnt2" name="DiasVacPeriodoAnt2" value='0' readonly>
                      <input  type="hidden" id="DiasVacPeriodoAnt" name="DiasVacPeriodoAnt" value='0'>
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      </div>

                  </div>    


					<?php						

				}else{

					$fechaMostrar = explode("-", $VigenciaPeriodoAnterior);
						$Anio_FM=$fechaMostrar[0];
						$Mes_FM=$fechaMostrar[1];
						$Dia_FM=$fechaMostrar[2]; 
						$separador="-";

						$VigenciaPeriodoAnteriorM = $Dia_FM.$separador.$Mes_FM.$separador.$Anio_FM; 
echo "<br>";
					echo 'Aun no  vencio (**  Vence el: '.$VigenciaPeriodoAnteriorM.') el periodo anterior por lo tanto  puedes poner dias del periodo anterior.<br> ';
					?>
						

						 <div id="periodo_anterior" >
                        
                     
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-3">Periodo Anterior ***</label>
                      <div class="col-md-9 col-sm-9 col-xs-9">
                      <input  type="text" id="PeriodoAnt" name="PeriodoAnt" value='<?php echo date('Y')-1?>'>
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      </div>


                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-3">Dias Vacaciones Periodo Anterior ***</label>
                      <div class="col-md-9 col-sm-9 col-xs-9">
                      <input  type="text" id="DiasVacPeriodoAnt" name="DiasVacPeriodoAnt" placeholder="2,5,6,8,9,10,etc">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      </div>

                  </div>    


					<?php
				}


			}



?>


  

