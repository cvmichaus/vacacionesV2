<?php
date_default_timezone_set('America/Mexico_City');

$diaanterior="NO";


echo "Fecha Alta: ";    echo  $fecha_altaPHP = '03/02/2017';//fecha alta  
echo '<br>';


$fecha_del_dia=date('Y-m-d');//fecha actual 
$resultado = $fecha_altaPHP;

$fecha1 = new DateTime($resultado);
$fecha2 = new DateTime($fecha_del_dia);
$fecha = $fecha1->diff($fecha2);

echo $fecha->y; echo " Años en la Empresa ";
echo '<br>';

$porciones55 = explode("/", $fecha_altaPHP);
$Dia_PHP33=$porciones55[0];
$Mes_PHP33=$porciones55[1];
$Anio_PHP33=$porciones55[2];

echo "Año Fecha Alta: "; echo $Anio_PHP33;
echo '<br>';

echo "Año Actual: ";echo $anioactual = date('Y'); //date('Y'); //'2019';//
echo '<br>';
$esp3="/";
$FechaPeriodoActual = $anioactual.$esp3.$Mes_PHP33.$esp3.$Dia_PHP33; //$Dia_PHP33.$esp3.$Mes_PHP33.$esp3.$anioactual; 




echo '<br>';

if( $fecha_del_dia >= $FechaPeriodoActual ){
  echo  "SI YA EMPEZO ";

  echo "Fecha Periodo Actual: ";    echo  $FechaPeriodoActual;//fecha alta  
echo '<br>';

$date_future6 = strtotime('+ 12 month', strtotime($FechaPeriodoActual));
$FechaFinRealPeriodoActual = date('Y-m-d', $date_future6);

$date_future66 = strtotime('- 1 day', strtotime($FechaFinRealPeriodoActual));
echo "Fecha Fin Periodo Actual: "; echo $FechaFinPeriodoActual = date('Y-m-d', $date_future66);  echo " NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final ";
echo '<br>';    

$date_future5 = strtotime('+ 18 month', strtotime($FechaPeriodoActual));
echo "Vigencia Periodo Actual: "; echo $VigenciaPeriodoActual = date('Y-m-d', $date_future5);  echo " NoTA: se le suman 18 meses ";

echo '<br>';   



if( $fecha_del_dia >= $VigenciaPeriodoActual ){
  echo  "SI HOY VENCE ";
}else{
   echo "NO AUN NO VENCE EL PERIODO ACTUAL";
}

if($diaanterior == 'SI'){

echo "SI SE TIENE DIAS ANTERIORES";  


echo '<br>';  

echo '<br>';    

$date_future0 = strtotime('- 1 year', strtotime($FechaPeriodoActual));
echo "Fecha Periodo Anterior: ";  echo $FechaPeriodoAnterior = date('Y-m-d', $date_future0);
echo '<br>';    

$date_future01 = strtotime('+ 12 month', strtotime($FechaPeriodoAnterior));
$FechaFinPeriodoAnterior2 = date('Y-m-d', $date_future01);


$date_future666 = strtotime('- 1 day', strtotime($FechaFinPeriodoAnterior2));
echo "Fecha Fin Periodo Acnterior: "; echo $FechaFinPeriodoAnteriorx = date('Y-m-d', $date_future666);  echo " NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final ";
echo '<br>';    

$date_future55 = strtotime('+ 6 month', strtotime($FechaFinPeriodoAnteriorx));
echo "Vigencia Periodo Actual: "; echo $VigenciaPeriodoAnterior = date('Y-m-d', $date_future55);  echo " NoTA: se le suman 6 meses ";

echo '<br>';    

echo '<br>';    



}else{
echo "NO SE TIENE DIAS ANTERIORES";  
}



}else{
   echo "NO AUN NO COMIENZA EL  PERIODO ACTUAL CALCULAR EL PERIODO ANTERIOR QUE SERIA EL ACTUAL ";
 echo '<br>';
  echo '<br>';

        echo "Año Periodo Actual: ";echo $anioactual = date('Y')-1; //date('Y'); //'2019';//
        echo '<br>';
        $esp3="/";
        $FechaPeriodoActual = $anioactual.$esp3.$Mes_PHP33.$esp3.$Dia_PHP33; //$Dia_PHP33.$esp3.$Mes_PHP33.$esp3.$anioactual; 

        echo "Fecha Periodo Actual: ";    echo  $FechaPeriodoActual;//fecha alta  
        echo '<br>';

        $date_future6 = strtotime('+ 12 month', strtotime($FechaPeriodoActual));
$FechaFinRealPeriodoActual = date('Y-m-d', $date_future6);

$date_future66 = strtotime('- 1 day', strtotime($FechaFinRealPeriodoActual));
echo "Fecha Fin Periodo Actual: "; echo $FechaFinPeriodoActual = date('Y-m-d', $date_future66);  echo " NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final ";
echo '<br>';    

$date_future5 = strtotime('+ 18 month', strtotime($FechaPeriodoActual));
echo "Vigencia Periodo Actual: "; echo $VigenciaPeriodoActual = date('Y-m-d', $date_future5);  echo " NoTA: se le suman 18 meses ";

echo '<br>';    
echo '<br>';

if($diaanterior == 'SI'){

echo "SI SE TIENE DIAS ANTERIORES";  


echo '<br>';  

echo '<br>';    

$date_future0 = strtotime('- 1 year', strtotime($FechaPeriodoActual));
echo "Fecha Periodo Anterior: ";  echo $FechaPeriodoAnterior = date('Y-m-d', $date_future0);
echo '<br>';    

$date_future01 = strtotime('+ 12 month', strtotime($FechaPeriodoAnterior));
$FechaFinPeriodoAnterior2 = date('Y-m-d', $date_future01);


$date_future666 = strtotime('- 1 day', strtotime($FechaFinPeriodoAnterior2));
echo "Fecha Fin Periodo Acnterior: "; echo $FechaFinPeriodoAnteriorx = date('Y-m-d', $date_future666);  echo " NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final ";
echo '<br>';    

$date_future55 = strtotime('+ 6 month', strtotime($FechaFinPeriodoAnteriorx));
echo "Vigencia Periodo Actual: "; echo $VigenciaPeriodoAnterior = date('Y-m-d', $date_future55);  echo " NoTA: se le suman 6 meses ";

echo '<br>';    

echo '<br>';    



}else{
echo "NO SE TIENE DIAS ANTERIORES";  
echo '<br>';
}




if( $fecha_del_dia >= $VigenciaPeriodoActual ){
  echo  "SI HOY VENCE ";
}else{
   echo "NO AUN NO VENCE EL PERIODO ACTUAL"; echo '<br>';

   echo $VigenciaPeriodoActual; echo '<br>';
}


}
echo '<br>';echo '<br>';











?>