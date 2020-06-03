<?php
date_default_timezone_set('America/Mexico_City');
 setlocale(LC_TIME,"es_ES");

 $fecha1 = $_POST['fechainicio'];
 $fecha2 = $_POST['fechafinal'];
/*
$date1 = new DateTime($fecha1);
$date2 = new DateTime($fecha2);

$diff = $date1->diff($date2);
// will output 2 days
echo $dias=$diff->days . ' days ';
*/

/*
for($fecha1;$fecha1<=$fecha2;$fecha1=strtotime('+1 day ' . date('Y-m-d',$fecha1))){ 
    if((strcmp(date('D',$fecha1),'Sun')!=0) || (strcmp(date('D',$fecha1),'Sat')!=0)){
        echo date('Y-m-d D',$fecha1) . '<br />'; 
    }
}  
*/

?>
