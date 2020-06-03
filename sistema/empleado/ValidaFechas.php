
<?php
set_time_limit(0);
      require("../../class/cnmysql.php");
      date_default_timezone_set('America/Mexico_City');
    $dateiniPHP = $_POST['dateini'];
    $datefinPHP = $_POST['datefin'];
    $iduser = $_POST['CodEmpleado'];

 if($dateiniPHP == $datefinPHP){
 		// echo 'la Fecha Inicio ('.$dateiniPHP.') y la fecha Final ('.$datefinPHP.') no pueden ser iguales , favor de cambairla. ** ';
 }
 if($dateiniPHP !== $datefinPHP){
  //echo "no son iguales";
            $sql01 = "SELECT FechaInicio,CodSol,EstatusSol,FechaFin,CodEmpleado FROM `solicitud`  WHERE EstatusSol = '1' AND  FechaInicio = '".$dateiniPHP."' AND FechaFin= '".$datefinPHP."' AND CodEmpleado= '".$iduser."' ";
                      if($resqry01 = $mysqli->query($sql01)) {
                              while($data01 = mysqli_fetch_assoc($resqry01)){
                              $FechaInicioDB = $data01['FechaInicio'];
                              $NumSol1 = $data01['CodSol'];
                              echo 'La Fecha Inicio ('.$dateiniPHP.') y Fecha Fin  ('.$datefinPHP.')  es igual a la fecha de inicio de la solicitud #'.$NumSol1.', favor de cambairla. ** ';
                              echo "<br>";
                              //echo $sql01;
                              ?>
                           <input type="text" style="border:0px;" name="quitar" id="quitar" onmouseover="ocultaboton();" value="**">
                              <?php

                              }
                      }

                      ?>
                            <input type="text" style="border:0px;" name="oculto" id="oculto" onmouseover="enviarDatos();" value="mover el cursor **">
                      <?php
                       
   }

                      
?>