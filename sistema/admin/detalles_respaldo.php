  <?php
session_start();
  if($_SESSION["logueado"] == TRUE) {

      set_time_limit(0);
      require("../../class/cnmysql.php");
      date_default_timezone_set('America/Mexico_City');
      $fecha_del_dia=date('Y-m-d');//fecha actual

      $user = $_SESSION['UsuarioNombre'];
      $iduser = $_SESSION['CodUsuario'];
      $ClaveUsuario = $_GET['cod']; 

      $sqlDAtosU = "SELECT * FROM `tbl_usuarios` as u 
      INNER JOIN tbl_empleados as e ON u.CodUsuario = e.CodUsu 
      INNER JOIN tbl_vacacionesxusuarios as v ON v.CodEmpleado = e.CodUsu 
      WHERE u.CodUsuario = '".$ClaveUsuario."' ";
     
      if($resqryDU = $mysqli->query($sqlDAtosU)) {
      $dataDU = mysqli_fetch_assoc($resqryDU);
     
      $CodUsuarioPHP = $dataDU['CodUsuario']; 
      $CodEPHP = $dataDU['CodE'];
      $FechaAltaPHP = $dataDU['Fecha_Alta']; 

      $Usuariophp =   $dataDU['Usuario']; 
      $CorreoPHP =    $dataDU['Correo']; 
      $PerfilPHP =    $dataDU['Perfil']; 

      $NombresPHP =   $dataDU['Nombres']; 
      $ApPaternoPHP =   $dataDU['ApellidoPaterno']; 
      $ApMaternoPHP =   $dataDU['ApellidoMaterno']; 
      $PosicionPHP =   $dataDU['Posicion']; 
      $AreaPHP =   $dataDU['Area']; 
      $ReportaPHP =    $dataDU['Jefe1']; 
      $Jefe2PHP =   $dataDU['Jefe2']; 
      $FechaIngresoPHP =   $dataDU['fecha_ingreso']; 

      $ImagenPHP =   $dataDU['Imagen']; 

      $DiasTomadosPHP =$dataDU['DiasTomados']; 
      $DiasTotalesPHP =$dataDU['DiasTotales']; 

    }
?>
 <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>

  <form  class="form-horizontal form-label-left" action="modsuario.php" method="post" accept-charset="utf-8" >

    <h2>Modificar Datos Usuario <?php echo $dataDU["Nombres"]; echo " "; echo $dataDU["ApellidoPaterno"];  echo " "; echo $dataDU["ApellidoMaterno"]; ?></h2>

    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Usuario</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                        <input  type="text" id="usuario" name="usuario" placeholder="Usuario" required value='<?php echo $Usuariophp; ?>'>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        </div>



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Correo</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                         <input  type="text" id="correo" name="correo" placeholder="Correo" value='<?php echo $CorreoPHP; ?>'>
                          <span class="fa fa-exclamation form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>


                            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Perfil</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          
             <select  id="perfil" name="perfil"  class="form-control" data-inputmask="">
              <option value="<?php echo $PerfilPHP; ?>">
                <?php 
                if($PerfilPHP == 1){
                  echo "Administrador";
                } else if($PerfilPHP == 2){
                  echo "Empleado";
                } else if($PerfilPHP == 3){
                  echo "Gerente";
                } 

                ?>
              </option>
              <option value="1">Administrador</option>
              <option value="2">Empleado</option>
              <option value="3">Gerente</option>
              </select>
                          <span class="fa fa-group form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

    
  
   
              

    <h2>Datos Empleado</h2>

     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nombre</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                        <input  type="text" id="nombre" name="nombre" placeholder="Nombre" value='<?php echo $NombresPHP; ?>' required>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        </div>

                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Apellido Paterno</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                        <input  type="text" id="appaterno" name="appaterno" placeholder="Apellido Paterno" value='<?php echo $ApPaternoPHP ; ?>'>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        </div>

                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Apellido Materno</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                       <input  type="text" id="apmaterno" name="apmaterno" placeholder="Apellido Materno" value='<?php echo $ApMaternoPHP; ?>'>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        </div>

  
     

                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Posición</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                       <input  type="text" id="Posicion" name="Posicion" placeholder="Posición" value='<?php echo $PosicionPHP; ?>'>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        </div>



                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Área</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                        <input  type="text" id="area" name="area" placeholder="Área" value='<?php echo $AreaPHP; ?>'>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        </div>



                          <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Foto Actual</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                        <img src="../fotos/usuarios/<?php echo $ImagenPHP;  ?>" width="100px;" title=" avatar ">
                        
                        </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Foto</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                        <input  type="file" id="imagen" name="imagen" placeholder="Imagen">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        </div>



                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jefe 1</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <select id="jefe1" name="jefe1" class="form-control" data-inputmask="" >
                            <option value='<?php echo $ReportaPHP; ?>'>
                                    <?php 
                                  
                                   $sqlUsuario2 = "SELECT * FROM `tbl_usuarios` as u  
                                   INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodUsu
                                    WHERE u.Estatus = 1 
                                    AND  u.Perfil = 3 
                                    and u.CodUsuario = '".$ReportaPHP."' ";

                            if($resqryUsuario2 = $mysqli->query($sqlUsuario2)) {
                            while($dataEmpleado2 = mysqli_fetch_assoc($resqryUsuario2)){ 
                                 echo $dataEmpleado2['CodUsuario']; ?>-<?php echo $dataEmpleado2['Nombres']; ?> <?php echo $dataEmpleado2['ApellidoPaterno']; ?> <?php echo $dataEmpleado2['ApellidoMaterno']; 
                            }

                          }

                                    ?>
                            </option>
                            <option value="">Ninguno</option>
                            <?php

                            $sqlUsuario = "SELECT * FROM `tbl_usuarios` as u  
                            INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodUsu
                            WHERE u.Estatus = 1 
                            AND   u.Perfil = 3 ";

                            if($resqryUsuario = $mysqli->query($sqlUsuario)) {
                            while($dataEmpleado = mysqli_fetch_assoc($resqryUsuario)){  
                            ?>
                            <option value="<?php echo $dataEmpleado['CodUsuario']; ?>"><?php echo $dataEmpleado['CodUsuario']; ?>-<?php echo $dataEmpleado['Nombres']; ?> <?php echo $dataEmpleado['ApellidoPaterno']; ?> <?php echo $dataEmpleado['ApellidoMaterno']; ?></option>
                            <?php
                            }
                            }
                            ?>
                            </select>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        </div>



                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jefe 2</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                       <select   type="text" id="jefe" name="jefe2" placeholder="Jefe2" class="form-control" data-inputmask="">
                            <option value="">Ninguno</option>
                            <?php
                              if(empty($Jefe2PHP)){
                                ?>
                                <option value='<?php echo $Jefe2PHP; ?>'>
                                    <?php 
                                  
                                   $sqlUsuario2 = "SELECT * FROM `tbl_usuarios` as u  
                                   INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodUsu
                                    WHERE u.Estatus = 1 
                                    AND  u.Perfil = 3 
                                    and u.CodUsuario = '".$Jefe2PHP."' ";

                            $resqryUsuario2 = $mysqli->query($sqlUsuario2);
                            $dataEmpleado2 = mysqli_fetch_assoc($resqryUsuario2);
                                 echo $dataEmpleado2['CodUsuario']; ?>-<?php echo $dataEmpleado2['Nombres']; ?> <?php echo $dataEmpleado2['ApellidoPaterno']; ?> <?php echo $dataEmpleado2['ApellidoMaterno'];  ?>
                            </option>
                            <?php

                              }else{
                                  ?>
                                   <option value="">Ninguno</option>
                                  <?php
                              }
                            ?>
                         
                           
                            <?php

                            $sqlUsuario = "SELECT * FROM `tbl_usuarios` as u  
                            INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodUsu
                            WHERE u.Estatus = 1 
                            AND   u.Perfil = 3 ";

                            if($resqryUsuario = $mysqli->query($sqlUsuario)) {
                            while($dataEmpleado = mysqli_fetch_assoc($resqryUsuario)){  
                            ?>
                            <option value="<?php echo $dataEmpleado['CodUsuario']; ?>"><?php echo $dataEmpleado['CodUsuario']; ?>-<?php echo $dataEmpleado['Nombres']; ?> <?php echo $dataEmpleado['ApellidoPaterno']; ?> <?php echo $dataEmpleado['ApellidoMaterno']; ?></option>
                            <?php
                            }
                            }
                            ?>
                       </select>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        </div>

                          <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Fecha  Ingreso</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
   <input  type="date" id="fecha_ingreso" name="fecha_ingreso" placeholder="Fecha Alta" onblur="CargaAntiguedad(this.value)" required  value="<?php echo $FechaIngresoPHP; ?> ">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        </div>
    
  
    
    <div id="resultado"></div>

           <h2>Periodo Anterior</h2>
                        

                  <div style="text-align: justify; font-size: .9em;font-style: italic;" id="resp"></div>               


                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-3">Dias utilizados</label>
                      <div class="col-md-9 col-sm-9 col-xs-9">
                      <input  type="text" id="diasutilizados" name="diasutilizados" onblur="CalDiasTotales();" placeholder="" value='<?php echo $DiasTomadosPHP ?>'>
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      </div>


                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-3">Dias Totales</label>
                      <div class="col-md-9 col-sm-9 col-xs-9">
                      <input  type="text" id="diastotales" name="diastotales" placeholder="Dias Totales" readonly="readonly">
                      <input  type="hidden" id="diastotales2" name="diastotales2" placeholder="Dias Totales" value='<?php echo $DiasTotalesPHP ?>'>
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      </div>

        <input type="hidden" name="CodUsuario" id="CodUsuario" value="<?php echo $CodUsuarioPHP; ?>" >
         <input type="hidden" name="CodU" id="CodU" value="<?php echo $CodEPHP; ?>" >
       

                 <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                        
 <input type="submit" value="GUARDAR MODIFICACIONES" class="btn btn-primary">  


                        </div>
                      </div>

  
    
  </form>

      <a  class="btn btn-round btn-danger btn-xs" href="delateusuario.php?codUsuario=<?php echo $ClaveUsuario; ?>">Eliminar Usuario</a>


  <?php
  } else {
    header("Location: ../index.php");
  }
 
 ?>