
	<?php

	  require("../../class/cnmysql.php");

       date_default_timezone_set('America/Mexico_City');
      $fecha_del_dia=date('Y-m-d');//fecha actual 
	   $resultado = $_GET['y'] ;

			$fecha1 = new DateTime($resultado);
			$fecha2 = new DateTime($fecha_del_dia);
			$fecha = $fecha1->diff($fecha2);
			//printf('%d años, %d meses, %d días', $fecha->y, $fecha->m, $fecha->d);
		?>



  <div class="form-group">
<label for="nombre" style="font-size: .8em;">Antiguedad Años</label>
  <input  type="text" id="ant_anios2" name="ant_anio2s" readonly="readonly" placeholder="Antiguedad" value='<?php echo $fecha->y; ; ?>'>Años
  <input  type="hidden" id="ant_anios" name="ant_anios" placeholder="Antiguedad" value='<?php echo $fecha->y; ; ?>'>
</div>


<label for="nombre" style="font-size: .8em;">Antiguedad Meses</label>
 <input  type="text" id="ant_mes2" name="ant_mes2" readonly="readonly" placeholder="Antiguedad" value='<?php echo  $fecha->m; ;?>'>Meses 
<input  type="hidden" id="ant_mes" name="ant_mes" placeholder="Antiguedad" value='<?php echo  $fecha->m; ;?>'>
</div>

<label for="nombre" style="font-size: .8em;">Antiguedad Dias</label>
<input  type="text" id="ant_dias2" name="ant_dias2" readonly="readonly" placeholder="Antiguedad" value='<?php echo  $fecha->d; ;?>'>Dias
<input  type="hidden" id="ant_dias" name="ant_dias" placeholder="Antiguedad" value='<?php echo  $fecha->d; ;?>'>
</div>


<label for="nombre" style="font-size: .8em;">Dias Vacaciones</label>


<?php
   $antiguedad = $fecha->y;

    if($antiguedad == NULL OR $antiguedad == 0){

         ?>
                  <input  type="text" id="diasvacaciones" name="diasvacaciones" readonly="readonly" placeholder="Dias Vacaciones" value="0"> Dias
                  <input  type="hidden" id="diasvacaciones2" name="diasvacaciones2" placeholder="Dias Vacaciones" value="0">
                  <br>
                    <?php

    }else{

       $sql01 = "SELECT * from tbl_cat_vacaciones where Anios = ".$antiguedad."  ";
                           if($qry01 = $mysqli->query($sql01)) {
                                while($data01 = mysqli_fetch_assoc($qry01)){  
                  $diasant = $data01['Dias'];
                  ?>
                  <input  type="text" id="diasvacaciones" name="diasvacaciones" readonly="readonly" placeholder="Dias Vacaciones" value="<?php echo $diasant; ?>" onmouseout="ejecuta_ajax('getPeriodoAnterior.php','fecha='+fecha_ingreso.value+'','resp');"> Dias
                  <input  type="hidden" id="diasvacaciones2" name="diasvacaciones2" placeholder="Dias Vacaciones" value="<?php echo $diasant; ?>">
                  <br>

                  <script>
                   
                  </script>

                    <?php
                }

    }


     
               }

?>
</div>

                      
                            

 