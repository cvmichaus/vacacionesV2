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

 

    <h2>Modificar Datos Usuario <strong><?php echo $dataDU["Nombres"]; echo " "; echo $dataDU["ApellidoPaterno"];  echo " "; echo $dataDU["ApellidoMaterno"]; ?></strong></h2>


 <div class="row">
  <form  class="form-horizontal form-label-left" action="modsuario.php" method="post" accept-charset="utf-8" >
  <div class="col-sm-4">
       <h4>Datos Usuario</h4>


       <div class="form-group">
<label for="nombre" style="font-size: .8em;">Usuario</label>
<input  class="form-control input-sm" type="text" id="usuario" name="usuario" placeholder="Nombre" value='<?php echo $Usuariophp; ?>' required>
</div>

<div class="form-group">
<label for="nombre" style="font-size: .8em;">Correo</label>
<input  class="form-control input-sm" type="text" id="correo" name="correo" placeholder="Correo" value='<?php echo $CorreoPHP; ?>' required>
</div>


             <div class="form-group">
                        <label style="font-size: .8em;">Perfil</label>
                       
                          
             <select  id="perfil" name="perfil"  class="form-control-sm" >
              
              <option value="<?php echo $PerfilPHP; ?>">
                <?php 
                if($PerfilPHP == 1){
                  echo "Administrador";
                }else if ($PerfilPHP == 2){
                  echo "Empleado";
                }else if ($PerfilPHP == 3){
                  echo "Gerente";
                }

                  ?>
                  
                </option>
              <option value="1">Administrador</option>
              <option value="2">Empleado</option>
              <option value="3">Gerente</option>
              </select>
                      </div>


<div class="form-group">
<label for="nombre" style="font-size: .8em;">Nombre</label>
<input  class="form-control input-sm" type="text" id="nombre" name="nombre" placeholder="Nombre" value='<?php echo $NombresPHP; ?>' required>
</div>


<div class="form-group">
<label for="nombre" style="font-size: .8em;">Apellido Paterno</label>
<input  class="form-control input-sm" type="text" id="appaterno" name="appaterno" placeholder="Apellido Paterno" value='<?php echo $ApPaternoPHP ; ?>' >
</div>

<div class="form-group">
<label for="nombre" style="font-size: .8em;">Apellido Materno</label>
<input  class="form-control input-sm" type="text" id="apmaterno" name="apmaterno" placeholder="Apellido Materno" value='<?php echo $ApMaternoPHP ; ?>' >
</div>







</div>
  <div class="col-sm-3">

 <h4>Datos Empleado</h4>

 <div class="form-group">
<label for="nombre" style="font-size: .8em;">Posición</label>
<input  class="form-control input-sm" type="text" id="Posicion" name="Posicion" placeholder="Posición" value='<?php echo $PosicionPHP; ?>' >
</div>

 <div class="form-group">
<label for="nombre" style="font-size: .8em;">Area</label>
<input  class="form-control input-sm" type="text" id="area" name="area" placeholder="Área" value='<?php echo $AreaPHP; ?>' >
</div>

     <div class="form-group">
<label for="nombre" style="font-size: .8em;">Foto Actual</label>
 <img src="../fotos/usuarios/<?php echo $ImagenPHP;  ?>" width="100px;" title=" avatar ">
 <input type="hidden" name="fotoactual" id="fotoactual" value="<?php echo $ImagenPHP; ?>" >
</div>

 <div class="form-group">
<label for="nombre" style="font-size: .8em;">Foto</label>
<input  type="file" id="imagen" name="imagen" placeholder="Imagen">
</div>
    
     <div class="form-group">
<label for="nombre" style="font-size: .8em;">Jefe 1</label>
<select id="jefe1" name="jefe1" >
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
</div>


 <div class="form-group">
<label for="nombre" style="font-size: .8em;">Jefe 2 </label>
      <select   type="text" id="jefe2" name="jefe2" placeholder="Jefe2" >
            <?php
            if(empty($Jefe2PHP)){

              echo  '<option value="">Ninguno</option>';

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
            }
            if(isset($Jefe2PHP)){

               $sqlUsuario2 = "SELECT * FROM `tbl_usuarios` as u  
                                   INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodUsu
                                    WHERE u.Estatus = 1 
                                    AND  u.Perfil = 3 
                                    and u.CodUsuario = '".$Jefe2PHP."' ";

                                    $resqryUsuario2 = $mysqli->query($sqlUsuario2);
                                    $dataEmpleado2 = mysqli_fetch_assoc($resqryUsuario2);
                                
             ?>
              <option value='<?php echo $Jefe2PHP; ?>'> <?php echo $Jefe2PHP; ?>-<?php echo $dataEmpleado2['Nombres']; ?> <?php echo $dataEmpleado2['ApellidoPaterno']; ?> <?php echo $dataEmpleado2['ApellidoMaterno'];  ?></option>

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
                            
             <?php
            }
            ?>                              
      </select>
</div>



<!--value="<?php //echo $FechaIngresoPHP; ?> onfocus="CargaAntiguedad(this.value)" "-->
 <div class="form-group">
<label for="nombre" style="font-size: .8em;">Fecha  Ingreso</label>
 <input  type="date" id="fecha_ingreso" name="fecha_ingreso" placeholder="Fecha Alta"   value="<?php echo  $FechaIngresoPHP; ?>" >
</div>


<!--<div id="resultado"></div>


 <h4>Periodo Anterior</h4>

 <div style="text-align: justify; font-size: .9em;font-style: italic;" id="resp"></div>           

  <div class="form-group">
<label for="nombre" style="font-size: .8em;">Dias utilizados</label>
  <input  type="text" id="diasutilizados" name="diasutilizados" onblur="CalDiasTotales();" placeholder="" value='<?php //echo $DiasTomadosPHP ?>'>
</div>


  <div class="form-group">
<label for="nombre" style="font-size: .8em;">Dias Totales</label>
  <input  type="text" id="diastotales" name="diastotales" placeholder="Dias Totales" readonly="readonly">
                      <input  type="hidden" id="diastotales2" name="diastotales2" placeholder="Dias Totales" value='<?php //echo $DiasTotalesPHP ?>'>
</div>
-->

  <input type="hidden" name="CodUsuario" id="CodUsuario" value="<?php echo $CodUsuarioPHP; ?>" >
         <input type="hidden" name="CodU" id="CodU" value="<?php echo $CodEPHP; ?>" >


         <input type="submit" value="GUARDAR MODIFICACIONES" class="btn btn-primary">  
 <a style="font-size: 1.2em;" class="btn btn-round btn-danger btn-xs" href="delateusuario.php?codUsuario=<?php echo $ClaveUsuario; ?>">Eliminar Usuario</a>


  </div>


  </form>


   <div class="col-sm-3">

     <h4>Cambiar Password</h4>
<?php
$sqlDAtosPass = "SELECT * FROM `tbl_usuarios` as u INNER JOIN tbl_empleados as e ON u.CodUsuario = e.CodUsu INNER JOIN tbl_vacacionesxusuarios as v ON v.CodEmpleado = e.CodUsu WHERE u.CodUsuario = '".$ClaveUsuario."' ";
if($resqryPass = $mysqli->query($sqlDAtosPass)) {
      $dataPass = mysqli_fetch_assoc($resqryPass);
     
      $CodUsuarioPHP2 = $dataPass['CodUsuario']; 
      $FechaAltaPHP = $dataPass['Fecha_Alta']; 

      $Usuariophp =   $dataPass['Usuario']; 
      $ClavePHP =    $dataPass['Clave']; 
      $CorreoPHP2 =  $dataPass['Correo']; 
 
    }
?>
            <form  class="form-horizontal form-label-left" action="modpass.php" method="post" accept-charset="utf-8" >

            <div class="form-group">
            <label >Password</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
            <input  type="password" id="passwd" size="20" name="passwd" placeholder="Pass" required >

            </div>
            </div>


            <div class="form-group">
            <label >Confirmar Password</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
            <input  type="password" id="passwd2" size="20" name="passwd2" placeholder="PassV" required onblur="validarPasswd();">
            </div>
            </div>


            <input  type="hidden" id="correo" name="correo" placeholder="Correo" value='<?php echo $CorreoPHP2; ?>'>
            <input type="hidden" name="CodUsuario" id="CodUsuario" value="<?php echo $CodUsuarioPHP2; ?>" >


            <div class="form-group">
            <div class="col-md-9 col-md-offset-3">

            <input type="submit" value="Cambiar Clave" class="btn btn-success">  


            </div>
            </div>

            </form>

   </div>
</div> 


     




  <?php
  } else {
    header("Location: ../index.php");
  }
 
 ?>