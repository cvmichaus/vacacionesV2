<?php
session_start();
  if($_SESSION["logueado"] == TRUE) {

      set_time_limit(0);
      require("../../class/cnmysql.php");
      date_default_timezone_set('America/Mexico_City');
      $fecha_del_dia=date('Y-m-d');//fecha actual

      $user = $_SESSION['UsuarioNombre'];
      $iduser = $_SESSION['CodUsuario'];
   
    $CodSolicitud = $_GET['codsol'];

     $sqlSolicitud = "SELECT * FROM `solicitud` u WHERE  u.CodEmpleado = ".$iduser." ";
                             $resqrySolicitud = $mysqli->query($sqlSolicitud);
                              $rowSolicitud = mysqli_fetch_assoc($resqrySolicitud);

                              $FechaInicioPHP= $rowSolicitud['FechaInicio'];
                              $FechaFinPHP = $rowSolicitud['FechaFin'];

                            
?>

<h2>EDITAR SOLICITUD # <?php echo $CodSolicitud; ?> </h2>

<form class="form-horizontal form-label-left" action="updatesolicitud.php" method="post" name="formulario">
     <input id="CodEmpleado" name="CodEmpleado" type="hidden" value="<?php echo $iduser; ?>">
                        
        

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Fecha Inicio</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                        <input id="dateini" name="dateini" type="date" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" class="form-control" data-inputmask=""  value="<?php echo  $FechaInicioPHP; ?>">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Fecha Final</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                        <input id="datefin" name="datefin" type="date" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" class="form-control" data-inputmask=""  value="<?php echo  $FechaFinPHP; ?>" onblur="valFechas();">
              
                        <!--onblur="obtenerfechas();-->
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        </div>


                           <!--onmousemove="enviarDatos();"-->
                        <div  id="resdata" name="resdata">
                        
                        
                        </div>

                        
              
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Dias Solicitados </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">

                    <input id="diassol" name="diassol" type="text" class="form-control" data-inputmask="" readonly="readonly" onblur="restadias();">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        </div>
            
            <?php
               /*OBTENEMOS LOS DATOS PARA ENVIAR EL CORREO*/
      $sqlUsuario = "SELECT * FROM `tbl_usuarios` as u  
      INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodUsu 
      WHERE u.Estatus = 1 AND  u.CodUsuario = ".$iduser." ";
      
                           if($resqryUsuario = $mysqli->query($sqlUsuario)) {
                                while($row = mysqli_fetch_assoc($resqryUsuario)){ 
                $esp = " ";
                 $CorreoPHP = $row['Correo'];

                        $sqlUsuarioDV = "SELECT * FROM `tbl_vacacionesxusuarios` as u  
                        WHERE  u.CodEmpleado = ".$iduser." ";

                        if($resqryUsuarioDV = $mysqli->query($sqlUsuarioDV)) {
                        while($rowDV = mysqli_fetch_assoc($resqryUsuarioDV)){ 
                             $DiasVacPHP = $rowDV['DiasVac'];
                        }

                        }
                


                  $NombrePHP = $row['Nombres'].$esp.$row['ApellidoPaterno'].$esp.$row['ApellidoMaterno'];
                ?>
        <input  id="NombreEmpleado" name="NombreEmpleado" type="hidden" class="form-control" data-inputmask="" value='<?php echo $NombrePHP; ?>'>
        <input  id="CorreoEmpleado" name="CorreoEmpleado" type="hidden" class="form-control" data-inputmask="" value='<?php echo $CorreoPHP; ?>'>
        <input  id="CodSolicitud" name="CodSolicitud" type="hidden" class="form-control" data-inputmask="" value='<?php echo $CodSolicitud; ?>'>
                <?php
                
                
                 $ReportaPHP = $row['Jefe1'];
                      $sqlUsuarioR = "SELECT * FROM `tbl_usuarios` as u  
                      INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodUsu 
                      WHERE u.Estatus = 1 AND  u.CodUsuario = ".$ReportaPHP." ";

                      if($resqryUsuarioR = $mysqli->query($sqlUsuarioR)) {
                      while($rowR = mysqli_fetch_assoc($resqryUsuarioR)){ 
                        $CorreoReportaPHP = $rowR['Correo'];
                      ?>
      <input  id="CorreoReporta" name="CorreoReporta" type="hidden" class="form-control" data-inputmask="" value='<?php echo $CorreoReportaPHP; ?>'>
                <?php
                      
                      }
                      }
                }
               }
    /*OBTENEMOS LOS DATOS PARA ENVIAR EL CORREO*/
            ?>
                          
                  <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-3">Dias Vacaciones </label>
                  <div class="col-md-9 col-sm-9 col-xs-9">
      <input  id="totaldias" name="totaldias" type="text" class="form-control" data-inputmask="" readonly="readonly" value='<?php echo $DiasVacPHP; ?>'>
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                  </div>
                  </div>

                                          <?php

                        $qryConsulta98 = "SELECT COUNT(*) as SiHayDias FROM `periodoanterior` WHERE CodEmpleado =  ".$iduser." and Estatus =0 ";
                        if($resQryConsulta98 = $mysqli->query($qryConsulta98)) {
                                                 $dataCons98 = mysqli_fetch_assoc($resQryConsulta98);
                                                
                                                if($dataCons98['SiHayDias'] == 1 ){

                                                  $qryConsulta97 = "SELECT * FROM `periodoanterior` WHERE CodEmpleado =  ".$iduser." ";
                                                        if($resQryConsulta97 = $mysqli->query($qryConsulta97)) {
                                                          $dataCons97 = mysqli_fetch_assoc($resQryConsulta97);   
                                                                $DiasVacAntPHP =  $dataCons97['DiasPAnt'];

                                                        }
                                                        ?>
                                                       <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Dias Vacaciones Periodo Anterior </label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
  <input  id="diasperiodoant" name="diasperiodoant" type="text" readonly="readonly" class="form-control" data-inputmask="" value='<?php echo $DiasVacAntPHP; ?>'>
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    </div>

                                    <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Dias Totales </label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input  id="diastotales" name="diastotales" readonly="readonly"  type="text" class="form-control" data-inputmask="" value='<?php echo $DiasVacPHP +  $DiasVacAntPHP; ?>'>
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    </div>
                                    
                                                        <?php
                                                                                            
                                                }else{
                                                   ?>
                                     <input  id="diasperiodoant" name="diasperiodoant" type="hidden" class="form-control" data-inputmask="" value=''>
                                                  <?php 
                                                }
                                        

                                    }
                        ?>

                       

              
                          <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Dias Restantes</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                        <input id="diasres" name="diasres" type="text" class="form-control" readonly="readonly" data-inputmask="">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                        
 <input id="btnsol" type="submit" value="MODIFICAR SOLICITUD" class="btn btn-primary">  
                        </div>
                      </div>



</form>



<?php
  } else {
    header("Location: ../index.php");
  }
 
 ?>