<?php
session_start();
  if($_SESSION["logueado"] == TRUE) {

      set_time_limit(0);
      require("../../class/cnmysql.php");
      date_default_timezone_set('America/Mexico_City');
      $fecha_del_dia=date('Y-m-d');//fecha actual

      $user = $_SESSION['UsuarioNombre'];
      $iduser = $_SESSION['CodUsuario'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title> Sistema para Control de Vacaciones </title>
    <!-- Bootstrap Core CSS -->
    <link href="../pixel-html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    
    <!-- animation CSS -->
    <link href="../pixel-html/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../pixel-html/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="../pixel-html/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
 <style>
        

.count-title {
    font-size: 40px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
}

.count-text {
    font-size: 30px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
}

.fa-2x {
    margin: 0 auto;
    float: none;
    display: table;
    color: #4ad1e5;
}

/*
Full screen Modal 
*/
.fullscreen-modal .modal-dialog {
  margin: 0;
  margin-right: auto;
  margin-left: auto;
  width: 100%;
}
@media (min-width: 768px) {
  .fullscreen-modal .modal-dialog {
    width: 750px;
  }
}
@media (min-width: 992px) {
  .fullscreen-modal .modal-dialog {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .fullscreen-modal .modal-dialog {
     width: 1170px;
  }
}

      </style>

<body>
    <!-- Preloader -->
  
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="index.php"><b>
                    <img src="../plugins/images/pixeladmin-logo-dark.png" alt="home" />
                </b><span class="hidden-xs"><img src="../plugins/images/pixeladmin-tex_darkt.png" alt="home" /></span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                   
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
          </a>
                       
                        <!-- /.dropdown-messages -->
                    </li>
                  
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">
                           Bienvenido <?php echo $user; ?> 

                        </b> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Salir</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
        
                    <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                
                    <li class="user-pro">
                        <a href="#" class="waves-effect"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span class="hide-menu"> <?php echo $user; ?> <span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                           
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Salir</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap m-t-10">-Menu Principal</li>
                    <li><a href="index.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu">Inicio</span></a></li>
                    
                    <li><a href="inbox.html" class="waves-effect"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Vacaciones <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a onclick="ejecuta_ajax('formsolicitud.php','','ventana');"  class="btn btn-link" data-toggle="modal" data-target="#exampleModal"  >Solicitar Vacaciones</a></li>
                           
                           
                        </ul>
                    </li>
                </ul>
            </div>
           
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid" id="contenidos">
              <?php
                      $DatosGerentes = "SELECT * FROM `tbl_usuarios` as u  INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodUsu WHERE u.Estatus = 1 AND  u.CodUsuario = ".$iduser." ";
                      if($resDatosGerenetes = $mysqli->query($DatosGerentes)) {
                      $dataGerentes = mysqli_fetch_assoc($resDatosGerenetes);  

                      }
              ?>
                <!-- /.row -->
                <div class="row">
                    <h2>GERENTES</h2>
                    
                   
                    <div class="col-md-12">
                        <div class="white-box">
                           
             <table id="example2" cellspacing="0" class="display nowrap table  table-bordered" style="width: 100%;" >
    <thead>
          <tr style="text-align: center;vertical-align: middle;font-size: .9em; background-color:#85b4d0; color:black;">
          <th>Nombre</th>
          <th>Posicion</th>
          <th>Area</th>
          <th>Jefe 1 </th>
          <th>Jefe 2 </th>
          <th>Fecha Ingreso</th>
          <th>Antiguedad</th>
          <th>Dias Vacaciones Periodo Anterior</th>
          <th>Dias Vacaciones</th>
          <th>Dias Tomados</th>
          <th>Dias Vacaciones x Disfrutar</th>
          <th>Dias Solicitados</th>
          <th>Estatus Solicitud</th>
          <th>Opciones</th>
          </tr>
    </thead>
    <tbody>
        <?php
        $ConsultaPrincipal = "SELECT * FROM `tbl_solicitud` s INNER JOIN `tbl_empleados` e ON e.CodUsu = s.CodUsuario WHERE e.Reporta = ".$iduser." ORDER BY s.CodSol DESC";
         $resqryUsuario = $mysqli->query($ConsultaPrincipal);
           while($dataUsuarios = mysqli_fetch_assoc($resqryUsuario)){   
                   $EstatusPHP = $dataUsuarios['Estatus'];

             if($EstatusPHP == 0 )
                  { $estilo = 'text-align: center;vertical-align: middle;font-size: .9em; background-color: red; color:black;';  }
                  else if($EstatusPHP == 1){ 
                  $estilo = 'text-align: center;vertical-align: middle;font-size: .9em; background-color: green; color:white;';
                  }
                  else if($EstatusPHP == 2){ 
                  $estilo = 'text-align: center;vertical-align: middle;font-size: .9em; background-color: yellow; color:white;';
                  }
                  else { $estilo = 'text-align: center;vertical-align: middle;font-size: .9em;';  }
        ?>
            <tr>
                  <td><?php echo $dataUsuarios['Nombres'];  echo " "; echo $dataUsuarios['ApellidoPaterno']; echo " "; echo $dataUsuarios['ApellidoMaterno']; ?></td>
                  <td><?php echo $dataUsuarios['Posicion']; ?></td>
                  <td><?php echo $dataUsuarios['Area']; ?></td>
                  <td><?php
                  $sqlObtenerU = "SELECT * FROM `tbl_empleados` as e WHERE  e.CodUsu = ".$dataUsuarios['Reporta']."  ";
                  if($resqry = $mysqli->query($sqlObtenerU)) {
                  while($rowEmp = mysqli_fetch_assoc($resqry)){  
                  echo $rowEmp['Nombres']; echo " "; echo $rowEmp['ApellidoPaterno']; echo " "; echo $rowEmp['ApellidoMaterno'];
                  }
                  }
                  ?></td>
                  <td>
                  <?php
                  $sqlObtenerU2 = "SELECT * FROM `tbl_empleados` as e WHERE  e.CodUsu = ".$dataUsuarios['Jefe2']."  ";
                  if($resqry2 = $mysqli->query($sqlObtenerU2)) {
                  while($rowEmp2 = mysqli_fetch_assoc($resqry2)){  
                  echo $rowEmp2['Nombres']; echo " "; echo $rowEmp2['ApellidoPaterno']; echo " "; echo $rowEmp2['ApellidoMaterno'];
                  }
                  }
                  ?>
                  </td>
                  <td><?php echo $dataUsuarios['fecha_ingreso']; ?></td>
                  <td><?php echo $dataUsuarios['aniosA']; echo " Años"; echo " - "; echo $dataUsuarios['mesesA']; echo " Meses"; echo " - "; echo $dataUsuarios['diasA']; echo " Dias"; ?></td>
                 <td>
              <?php
             

                        $qryConsulta04 = "SELECT * FROM `tbl_periodoanterior` WHERE CodUsuario =  ".$dataUsuarios['CodUsuario']." ";
                                            if($resQryConsulta04 = $mysqli->query($qryConsulta04)) {
                                              $dataCons04 = mysqli_fetch_assoc($resQryConsulta04);   
                                                  
                                                  echo  $DiasVacAntPHP = isset($dataCons04['DiasVacAnt']) ? $dataCons04['DiasVacAnt'] : null ;
                                            }   

                     

               

                                            ?>            
             </td>
            <td><?php echo $dataUsuarios['DiasVac']; ?></td>

             <td>
              <?php 

              $qryConsulta022 = "SELECT DiasTomados,DiasTotales FROM tbl_vacaciones_usuarioxanio WHERE CodEmpleado = ".$dataUsuarios['CodUsuario']." ";
                  if($resQryConsulta022 = $mysqli->query($qryConsulta022)) {
                      $dataCons022 = mysqli_fetch_assoc($resQryConsulta022);  
                      echo $dataCons022['DiasTomados'] ;                   
                  }

              
             ?>
               
             </td>
            
              <td>
              <?php
              $qryConsulta02 = "SELECT DiasVac as DiasVacDisponibles,Anio,Fecha_iniciov,Fecha_finv,fecha_inicio_diasant,fecha_fin_dias_ant,DiasTomados,DiasTotales FROM tbl_vacaciones_usuarioxanio WHERE CodEmpleado = ".$dataUsuarios['CodUsuario']." ";
                  if($resQryConsulta02 = $mysqli->query($qryConsulta02)) {
                      $dataCons02 = mysqli_fetch_assoc($resQryConsulta02);  
                      echo $dataCons02['DiasTotales'];                   
                  }

              ?>
              </td>

               <td><?php echo $dataUsuarios['DiasSolicitados']; ?></td>
                <td  style="<?php echo $estilo; ?>">
              <?php 
               
                if($EstatusPHP == 0 )
                { echo "Rechazado ";}
                else if($EstatusPHP == 1){ 
                echo "APROBADO";}
                else if($EstatusPHP == 2){ 
                echo "PROCESO";}
                else {echo "NA";}
              ?>
              </td>
              <td>
                 <div class="btn-group btn-group-toggle" data-toggle="buttons">
               <?php
               if($EstatusPHP == 2  ){             
               ?>
               <button type="button" class="btn btn-round btn-success btn-sm" onclick="ejecuta_ajax('formaceptar.php','cods=<?php echo $dataUsuarios['CodSol']; ?>&codUsuario=<?php echo $dataUsuarios['CodUsuario']; ?>','ventana');"  data-toggle="modal" data-target="#exampleModal"  > Aceptar </button>
               &nbsp;&nbsp;
               <button type="button" class="btn btn-round btn-danger btn-sm" onclick="ejecuta_ajax('formrechazar.php','cods=<?php echo $dataUsuarios['CodSol']; ?>&codUsuario=<?php echo $dataUsuarios['CodUsuario']; ?>','ventana');"  data-toggle="modal" data-target="#exampleModal"  > Rechazar </button>
                  <?php
                          }
                       ?>
            
                  </div>
              </td>
            </tr>
        <?php
        }
        ?>
  </tbody>
</table>


 <!--TABLA DE SOLICITUDES DE VACACIONES-->

 <h2>Solicitud de Vacaciones </h2>
<table id="example3"  cellspacing="0" class="display nowrap table  table-bordered" style="width: 100%;">
                      <thead>
                         <tr style="text-align: center;vertical-align: middle;font-size: .9em; background-color:#85b4d0; color:black;">
                         <th>Cod Solicitud</th>
                          <th>Usuario</th>
                          <th>Fecha Inicio</th>
                          <th>Fecha Fin</th>
                          <th>Dias Solicitados</th>
                          <th>Estatus</th>
                           <th>Opciones</th>             
                        </tr>
                      </thead>
          <tbody>
              <?php
              $sqlUsuarioS = "SELECT * FROM `tbl_solicitud` u WHERE  u.CodUsuario = ".$iduser." ";
              if($resqryUsuarios = $mysqli->query($sqlUsuarioS)) {
              while($row = mysqli_fetch_assoc($resqryUsuarios)){  
                  $EstatusPHP = $row['Estatus'];
                  if($EstatusPHP == 0 )
                  { $estilo = 'text-align: center;vertical-align: middle;font-size: .8em; background-color: red; color:black;';  }
                  else if($EstatusPHP == 1){ 
                  $estilo = 'text-align: center;vertical-align: middle;font-size: .8em; background-color: green; color:black;';
                  }
                  else if($EstatusPHP == 2){ 
                  $estilo = 'text-align: center;vertical-align: middle;font-size: .8em; background-color: yellow; color:black;';
                  }
                  else { $estilo = 'text-align: center;vertical-align: middle;font-size: .8em;';  }

                   ?>
                        <tr >
                         
                          <td><?php echo $row['CodSol']; ?></td>
                          <td><?php //echo $row['CodUsuario'];

          $sqlU = "SELECT * FROM `tbl_usuarios` as u INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodE  WHERE  u.CodUsuario = ".$row['CodUsuario']."  ";
                if($resqryU = $mysqli->query($sqlU)) {
                while($dataU = mysqli_fetch_assoc($resqryU)){  
                echo $dataU['Nombres']; echo " "; echo $dataU['ApellidoPaterno']; echo " "; echo $dataU['ApellidoMaterno'];
                  }
                }

                           ?></td>
                          <td><?php echo $row['FechaInicio']; ?></td>
                          <td><?php echo $row['FechaFin']; ?></td>
                           <td><?php echo $row['DiasSolicitados']; ?></td>
                         
              <td style="<?php echo $estilo; ?>">
              <?php 
            
                if($EstatusPHP == 0 )
                { echo "Rechazado ";}
                else if($EstatusPHP == 1){ 
                echo "APROBADO";}
                else if($EstatusPHP == 2){ 
                echo "PROCESO";}
                else {echo "NA";}
              ?>
              </td>

               <td>
              <?php 
            
                if($EstatusPHP == 2 ){

              ?>
                   <button type="button" class="btn btn-round btn-success" onclick="ejecuta_ajax('formsolicitud2.php','codsol=<?php echo $row['CodSol']; ?>','ventana');"   data-toggle="modal" data-target="#exampleModal"  > Editar Solicitud </button>


              <?php
                }               
              ?>
              </td>



                        </tr>
                       <?php  


                } 
              } 
              ?>
              </tbody>
   </table>


                  

                                </div>
                            </div>
                        </div>


                    <!--TOTALTES COUNTER-->


                    </div>
                </div>



                  <!--SMALL MODAL-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          <div id="ventana"></div>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                   
                </div>


<!--SMALL MODAL AVISOS-->
<?php

       $qryConsulta0101 = "SELECT COUNT(*) as SiHayDias FROM `tbl_periodoanterior` WHERE CodUsuario =  ".$iduser." ";
               $resQryConsulta0101 = $mysqli->query($qryConsulta0101);
                 $dataCons0101 = mysqli_fetch_assoc($resQryConsulta0101);
                     if($dataCons0101["SiHayDias"] == 1 ){

                        $qryConsulta0202 = "SELECT * FROM `tbl_periodoanterior` WHERE CodUsuario =  ".$iduser." ";
                                            if($resQryConsulta0202 = $mysqli->query($qryConsulta0202)) {
                                              $dataCons022 = mysqli_fetch_assoc($resQryConsulta0202);   
                                                    $DiasVacAntPHP2 =  $dataCons022['DiasVacAnt'];
                                                     
                                                     }

                                                   }

 $qry01 = "SELECT * FROM `tbl_usuarios` as u  
            INNER JOIN  `tbl_vacaciones_usuarioxanio` as x on  x.Codempleado = u.CodUsuario
               WHERE u.Estatus = 1 AND  u.CodUsuario = ".$iduser." ";

     $resQry01 = $mysqli->query($qry01);

          $datos01 = mysqli_fetch_assoc($resQry01);   

            $FechaInicioVacAct=$datos01['Fecha_iniciov'];
            $porciones2 = explode("-", $FechaInicioVacAct);
            $Anio_PHP2=$porciones2[0];
            $Mes_PHP2=$porciones2[1];
            $Dia_PHP2=$porciones2[2];
            $esp2="-";
            $FechaInicioVacAct2 = $Dia_PHP2.$esp2.$Mes_PHP2.$esp2.$Anio_PHP2; 

            $FechaFinVacAct=$datos01['Fecha_finv'];
            $porciones3 = explode("-", $FechaFinVacAct);
            $Anio_PHP3=$porciones3[0];
            $Mes_PHP3=$porciones3[1];
            $Dia_PHP3=$porciones3[2];
            $esp3="-";
            $FechaFinVacAct2 = $Dia_PHP3.$esp3.$Mes_PHP3.$esp3.$Anio_PHP3; 


            $VigenciaPeriodoActual=$datos01['VigPeriodoActual'];
            $porciones66 = explode("-", $FechaFinVacAct);
            $Anio_PHP55=$porciones66[0];
            $Mes_PHP55=$porciones66[1];
            $Dia_PHP55=$porciones66[2];
            $esp5="-";
            $VigenciaPeriodoActual2 = $Dia_PHP55.$esp5.$Mes_PHP55.$esp5.$Anio_PHP55; 


          $FechaInicioDiasAnt=$datos01['fecha_inicio_diasant'];
          $porciones44 = explode("-", $FechaInicioDiasAnt);
          $Anio_PHP44=$porciones44[0];
          $Mes_PHP44=$porciones44[1];
          $Dia_PHP44=$porciones44[2];
          $esp2="-";
          $FechaInicioVacAnt2 = $Dia_PHP44.$esp2.$Mes_PHP44.$esp2.$Anio_PHP44; 

          $FechaFinDiasAnt=$datos01['fecha_fin_dias_ant'];
          $porciones55 = explode("-", $FechaFinDiasAnt);
          $Anio_PHP33=$porciones55[0];
          $Mes_PHP33=$porciones55[1];
          $Dia_PHP33=$porciones55[2];
          $esp3="-";
          $FechaFinVacAnt2 = $Dia_PHP33.$esp3.$Mes_PHP33.$esp3.$Anio_PHP33; 


                

?>
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Avisos</h3>
     </div>
         <div class="modal-body">
            <h6>Bienvenido <?php echo $dataGerentes['Nombres'];  echo " "; echo $dataGerentes['ApellidoPaterno']; echo " "; echo $dataGerentes['ApellidoMaterno']; ?></h6>
            Tienes <span style="color: green;font-weight: bolder;"> <?php  echo $datos01['DiasTotales']; ?> Dias de Vacaciones  del Periodo  <?php echo $FechaInicioVacAct2; ?>  al <?php echo $FechaFinVacAct2; ?> y vencen el <?php echo $VigenciaPeriodoActual2; ?>
             </span>
              <span style="color: red;font-weight: bolder;">

             <?php
               $qryConsulta01 = "SELECT COUNT(*) as SiHayDias FROM `tbl_periodoanterior` WHERE CodUsuario =  ".$iduser." ";
               $resQryConsulta01 = $mysqli->query($qryConsulta01);
                 $dataCons01 = mysqli_fetch_assoc($resQryConsulta01);
                     if($dataCons01["SiHayDias"] == 1 ){

                        $qryConsulta02 = "SELECT * FROM `tbl_periodoanterior` WHERE CodUsuario =  ".$iduser." ";
                                            if($resQryConsulta02 = $mysqli->query($qryConsulta02)) {
                                              $dataCons02 = mysqli_fetch_assoc($resQryConsulta02);   
                                                    $DiasVacAntPHP3 =  $dataCons02['DiasVacAnt'];
                                                     $FechaterminoPHP =  $dataCons02['VigPeriodoAnt'];

                                                    


                                                     /* Reconstrimos las Fechas */
                                                     $porciones = explode("-", $FechaterminoPHP);
                                                     $Anio_PHP=$porciones[0];
                                                     $Mes_PHP=$porciones[1];
                                                     $Dia_PHP=$porciones[2];
                                                     $esp="-";
                                                     $fecha2 = $Dia_PHP.$esp.$Mes_PHP.$esp.$Anio_PHP; 




                                                     $PeriodoAntPHP =  $dataCons02['PeriodoAnt'];

                           echo " , y tienes  ".$DiasVacAntPHP3." Dias del Periododel Periodo ".$FechaInicioVacAnt2." al ".$FechaFinVacAnt2.",  , y vencen el  ".$FechaFinVacAnt2." .";
                                            }

                     }

             ?>
          </span>
            <hr>
            <?php
                 $qryConsSol = "SELECT COUNT(*) as SiHaySol FROM `tbl_solicitud` s 
                         INNER JOIN `tbl_empleados` e ON e.CodUsu = s.CodUsuario 
                         WHERE e.Reporta = ".$iduser." AND s.Estatus = '2' ORDER BY s.CodSol DESC   ";
                         $resQryConsSol = $mysqli->query($qryConsSol);
                         $dataConSol = mysqli_fetch_assoc($resQryConsSol);
                                        
                                if($dataConSol["SiHaySol"] >= 1 ){
                                     echo "Tienes las siguientes solicitudes:<br>";
                                $sqlUsuarioS2 = "SELECT s.CodUsuario FROM `tbl_solicitud` s 
                                INNER JOIN `tbl_empleados` e ON e.CodUsu = s.CodUsuario
                                WHERE s.Estatus = '2' AND e.Reporta = ".$iduser."  GROUP BY s.CodUsuario  ";
                                if($resqryUsuarios2 = $mysqli->query($sqlUsuarioS2)) {
                                      while($row2 = mysqli_fetch_assoc($resqryUsuarios2)){

                                                 $ConsultaPrincipal2 = "SELECT * FROM `tbl_usuarios` as u  INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodUsu WHERE u.Estatus = 1 AND  u.CodUsuario = ".$row2['CodUsuario']." ";
                                                              if($resqryUsuario2 = $mysqli->query($ConsultaPrincipal2)) {

                                                              $data22 = mysqli_fetch_assoc($resqryUsuario2);   
                                                              $sqlObtenerU = "SELECT * FROM `tbl_empleados` as e WHERE  e.CodUsu = ".$data22['CodUsu']."  ";
                                                                    if($resqry22 = $mysqli->query($sqlObtenerU)) {

                                                                        while($rowEmp2 = mysqli_fetch_assoc($resqry22)){  
                                                                        echo $rowEmp2['Nombres']; echo " "; echo $rowEmp2['ApellidoPaterno']; echo " "; echo $rowEmp2['ApellidoMaterno']; echo "<br>";
                                                                        }
                                                                    }

                                                              }
                                      }
                                    }

                                }else{
                                     echo " No hay Solicitudes por el momento."; 
                                }


            ?>
     </div>
         <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
     </div>
      </div>
   </div>
</div>



                <!--row -->
                <!-- /.row -->
               
                <!-- .right-sidebar -->
      
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
          <?php include("footer.php"); ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../pixel-html/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="../pixel-html/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../pixel-html/js/waves.js"></script>
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../pixel-html/js/custom.min.js"></script>
    <script src="../pixel-html/js/dashboard1.js"></script>
    <!-- Sparkline chart JavaScript -->






    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $.toast({
            heading: 'Bienvenido, Admin   ',
            text: '<?php echo  $NombreUsuario; ?>',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3500,
            stack: 6
        })
    });
    </script>
    <!--Style Switcher -->
    
<script type="text/javascript" language="javascript" src="../datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="../datatables/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="../datatables/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="../datatables/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="../datatables/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="../datatables/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="../datatables/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="../datatables/buttons.print.min.js"></script>

<link rel="stylesheet" type="text/css" href="../datatables/query.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../datatables/buttons.dataTables.min.css">





<script type="text/javascript" language="javascript" class="init">
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>

 <script type="text/javascript" language="javascript" src="funciones.js"></script>

<script type="text/javascript" language="javascript" class="init">

 $(document).ready(function() {
        var selected = [];

        $('#example2').DataTable( {
            stateSave: true,
            "order": [[ 1, "desc" ]],
        } );

        $('#example tbody').on('click', 'tr', function () {
            var id = this.id;
            var index = $.inArray(id, selected);

            if ( index === -1 ) {
                selected.push( id );
            } else {
                selected.splice( index, 1 );
            }

            $(this).toggleClass('selected');
        } );

    } )


</script>



<script type="text/javascript" language="javascript" class="init">
 $(document).ready(function() {
        var selected = [];

        $('#example3').DataTable( {
            stateSave: true,
            "order": [[ 1, "desc" ]],
        } );

        $('#example tbody').on('click', 'tr', function () {
            var id = this.id;
            var index = $.inArray(id, selected);

            if ( index === -1 ) {
                selected.push( id );
            } else {
                selected.splice( index, 1 );
            }

            $(this).toggleClass('selected');
        } );

    } )


</script>


</body>

</html>
  <?php
  } else {
    header("Location: ../index.php");
  }
 
 ?>
