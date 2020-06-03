<?php
session_start();
  if($_SESSION["logueado"] == TRUE) {
  	set_time_limit(0);
      require("../../class/cnmysql.php");
      date_default_timezone_set('America/Mexico_City');
      $iduser = $_SESSION['CodUsuario'];
  
 $f1 = $_POST['dateini'];
$f2 = $_POST['datefin'];


	

		$total=0;
	
/*


if($fecha1 == $fecha2){

 		 }else{

				
				for($fecha1;$fecha1<=$fecha2;$fecha1=strtotime('+1 day ' . date('Y-m-d',$fecha1))){
				   if((strcmp(date('D',$fecha1),'Sun')!=0) AND (strcmp(date('D',$fecha1),'Sat')!=0)){
				        date('Y-m-d D',$fecha1) . '<br />';
				$total++;
				   }
				}

				
				if($total == 0 ){
					echo "";	
				}else{
					echo $total;
					
				}


 		 }
 		 */

 		 //The function returns the no. of business days between two dates and it skips the holidays
function getWorkingDays($startDate,$endDate,$holidays){
    // do strtotime calculations just once
    $endDate = strtotime($endDate);
    $startDate = strtotime($startDate);


    //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
    //We add one to inlude both dates in the interval.
    $days = ($endDate - $startDate) / 86400 + 1;

    $no_full_weeks = floor($days / 7);
    $no_remaining_days = fmod($days, 7);

    //It will return 1 if it's Monday,.. ,7 for Sunday
    $the_first_day_of_week = date('N', $startDate);
    $the_last_day_of_week = date('N', $endDate);

    //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
    //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
    if ($the_first_day_of_week <= $the_last_day_of_week) {
        if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
        if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
    }
    else {
        // (edit by Tokes to fix an Edge case where the start day was a Sunday
        // and the end day was NOT a Saturday)

        // the day of the week for start is later than the day of the week for end
        if ($the_first_day_of_week == 7) {
            // if the start date is a Sunday, then we definitely subtract 1 day
            $no_remaining_days--;

            if ($the_last_day_of_week == 6) {
                // if the end date is a Saturday, then we subtract another day
                $no_remaining_days--;
            }
        }
        else {
            // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
            // so we skip an entire weekend and subtract 2 days
            $no_remaining_days -= 2;
        }
    }

    //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
//---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
   $workingDays = $no_full_weeks * 5;
    if ($no_remaining_days > 0 )
    {
      $workingDays += $no_remaining_days;
    }

    //We subtract the holidays
    foreach($holidays as $holiday){
        $time_stamp=strtotime($holiday);
        //If the holiday doesn't fall in weekend
        if ($startDate <= $time_stamp && $time_stamp <= $endDate && date('N',$time_stamp) != 6 && date('N',$time_stamp) != 7)
            $workingDays--;
    }

    return $workingDays;
}

//Example:

$holidays=array('2020-01-04','2020-02-03','2020-03-16','2020-05-01','2020-09-16','2020-11-02','2020-11-20','2020-12-18','2020-12-19','2020-12-20','2020-12-21','2020-12-22','2020-12-23','2020-12-24','2020-12-25','2020-12-26','2020-12-27','2020-12-28','2020-12-29','2020-12-30','2020-12-31','2021-01-04','2021-01-02','2021-01-03','2021-01-04');

//echo $total=getWorkingDays($fecha1,$fecha2,$holidays);
$comillas="";
echo $total=getWorkingDays($f1,$f2,$holidays);


} else {
    header("Location: ../index.php");
  }
?>

