<?php
session_start();
  if($_SESSION["logueado"] == TRUE) {

      set_time_limit(0);
      require("../../class/cnmysql.php");
      date_default_timezone_set('America/Mexico_City');
      $fecha_del_dia=date('Y-m-d');//fecha actual

      $user = $_SESSION['UsuarioNombre'];
      $iduser = $_SESSION['CodUsuario'];
      $avatar = $_SESSION['ImagenAvatar'];
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

div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
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
  <?php
    $DatosGerentes = "SELECT * FROM `tbl_usuarios` as u  
    INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodUsu 
    WHERE u.Estatus = 1 AND  u.CodUsuario = ".$iduser." ";
    if($resDatosGerenetes = $mysqli->query($DatosGerentes)) {
    $dataGerentes = mysqli_fetch_assoc($resDatosGerenetes);  
  }
  ?>
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
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../fotos/usuarios/<?php echo $avatar; ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">
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
                        <a href="#" class="waves-effect"><img  src="../fotos/usuarios/<?php echo $avatar; ?>" alt="user-img" class="img-circle"> <span class="hide-menu"> <?php echo $user; ?> <span class="fa arrow"></span></span>
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
             
                <!-- /.row -->
                <div class="row">
                    <h2>GERENTES  </h2>
                    
                   
                    <div class="col-md-12">
                        <div class="white-box">
                           
                 <table id="example2" cellspacing="0" class="display nowrap table  table-bordered" style="width: 100%;" >
    <thead>
          <tr style="text-align: center;vertical-align: middle;font-size: .8em; background-color:#85b4d0; color:black;">
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

          $ConsultaPrincipal = "SELECT * FROM `solicitud` s 
          INNER JOIN `tbl_empleados` e ON e.CodUsu = s.CodEmpleado 
          INNER JOIN `tbl_vacacionesxusuarios` v ON v.CodEmpleado = s.CodEmpleado 
          WHERE e.Jefe1 = ".$iduser." ORDER BY s.CodSol DESC";

         $resqryUsuario = $mysqli->query($ConsultaPrincipal);
           while($dataUsuarios = mysqli_fetch_assoc($resqryUsuario)){   
                   $EstatusPHP = $dataUsuarios['EstatusSol'];

             if($EstatusPHP == 0 )
                  { $estilo = 'text-align: center;vertical-align: middle;font-size: .7em; background-color: red; color:black;';  }
                  else if($EstatusPHP == 1){ 
                  $estilo = 'text-align: center;vertical-align: middle;font-size: .7em; background-color: green; color:black;';
                  }
                  else if($EstatusPHP == 2){ 
                  $estilo = 'text-align: center;vertical-align: middle;font-size: .7em; background-color: yellow; color:black;';
                  }
                  else { $estilo = 'text-align: center;vertical-align: middle;font-size: .7em;';  }

        ?>
       <tr style="text-align: center; vertical-align: middle; font-size: .7em; ">
              <td><?php echo $dataUsuarios['Nombres'];  echo " "; echo $dataUsuarios['ApellidoPaterno']; echo " "; echo $dataUsuarios['ApellidoMaterno']; ?></td>
              <td><?php echo $dataUsuarios['Posicion']; ?></td>
                  <td><?php echo $dataUsuarios['Area']; ?></td>
                  <td><?php
                  $sqlObtenerU = "SELECT * FROM `tbl_empleados` as e WHERE  e.CodUsu = ".$dataUsuarios['Jefe1']."  ";
                  if($resqry = $mysqli->query($sqlObtenerU)) {
                  while($rowEmp = mysqli_fetch_assoc($resqry)){  
                  echo $rowEmp['Nombres']; echo " "; echo $rowEmp['ApellidoPaterno']; echo " "; echo $rowEmp['ApellidoMaterno'];
                  }
                  }
                  ?></td>
                  <td>
                  <?php

                  if(isset($data['Jefe2'])){
                        $sqlObtenerU2 = "SELECT * FROM `tbl_empleados` as e WHERE  e.CodUsu = ".$dataUsuarios['Jefe2']."  ";
                  if($resqry2 = $mysqli->query($sqlObtenerU2)) {
                  while($rowEmp2 = mysqli_fetch_assoc($resqry2)){  
                  echo $rowEmp2['Nombres']; echo " "; echo $rowEmp2['ApellidoPaterno']; echo " "; echo $rowEmp2['ApellidoMaterno'];
                  }
                  }

                  }if(empty($data['Jefe2'])){
                     echo "sin informacion";
               }


                
                  ?>
                  </td>
                  <td><?php echo $dataUsuarios['fecha_ingreso']; ?></td>

              <td>
                <?php 
                echo $dataUsuarios['Anio']; echo " Años"; echo " - "; echo $dataUsuarios['Mes']; echo " Meses"; echo " - "; echo $dataUsuarios['Dias']; echo " Dias"; 
                ?>
                </td>

               <td>
              <?php
             

                        $qryConsulta04 = "SELECT * FROM `periodoanterior` WHERE CodEmpleado =  ".$dataUsuarios['CodEmpleado']." ";
                                            if($resQryConsulta04 = $mysqli->query($qryConsulta04)) {
                                              $dataCons04 = mysqli_fetch_assoc($resQryConsulta04);   
                                                  
                                          echo  $DiasVacAntPHP = isset($dataCons04['DiasPAnt']) ? $dataCons04['DiasPAnt'] : null ;
                                            }   

                                            ?>            
             </td>
             <td><?php echo $dataUsuarios['DiasVac']; ?></td>
              <td>
              <?php 
                echo $dataUsuarios['DiasTomados'];  
             ?>
               </td>
             <td>
              <?php
               echo $dataUsuarios['DiasTotales'];              
              ?>
              </td>
               <td><?php echo $dataUsuarios['DiasSol']; ?></td>
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
               <button type="button" class="btn btn-round btn-success btn-sm" onclick="ejecuta_ajax('formaceptar.php','cods=<?php echo $dataUsuarios['CodSol']; ?>&codUsuario=<?php echo $dataUsuarios['CodEmpleado']; ?>','ventana');"  data-toggle="modal" data-target="#exampleModal"  > Aceptar </button>
               &nbsp;&nbsp;
               <button type="button" class="btn btn-round btn-danger btn-sm" onclick="ejecuta_ajax('formrechazar.php','cods=<?php echo $dataUsuarios['CodSol']; ?>&codUsuario=<?php echo $dataUsuarios['CodEmpleado']; ?>','ventana');"  data-toggle="modal" data-target="#exampleModal"  > Rechazar </button>
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
              $sqlUsuarioS = "SELECT * FROM `solicitud` u WHERE  u.CodEmpleado = ".$iduser." ";
              if($resqryUsuarios = $mysqli->query($sqlUsuarioS)) {
              while($row = mysqli_fetch_assoc($resqryUsuarios)){  
                  $EstatusPHP = $row['EstatusSol'];
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

          $sqlU = "SELECT * FROM `tbl_usuarios` as u 
          INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodE  
          WHERE  u.CodUsuario = ".$row['CodEmpleado']."  ";

                if($resqryU = $mysqli->query($sqlU)) {
                while($dataU = mysqli_fetch_assoc($resqryU)){  
                echo $dataU['Nombres']; echo " "; echo $dataU['ApellidoPaterno']; echo " "; echo $dataU['ApellidoMaterno'];
                  }
                }

                           ?></td>
                          <td><?php echo $row['FechaInicio']; ?></td>
                          <td><?php echo $row['FechaFin']; ?></td>
                           <td><?php echo $row['DiasSol']; ?></td>
                         
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

    <hr>
  <!--TABLA DE SOLICITUDES DE VACACIONES-->

 <h2>Historial de Solicitudes de Vacaciones </h2>
<table id="example5"  cellspacing="0" class="display nowrap table  table-bordered" style="width: 100%;">
                      <thead>
                        <tr>
                         <th>#</th>
                          <th>Cod Solicitud</th>
                          <th>Año Periodo Actual</th>
                          <th>Dias Totales</th>
                          <th>Dias Solicitados</th>                                   
                        </tr>
                      </thead>
          <tbody>
              <?php
     $sqlHistorico = "SELECT CodEmpleado,CodVacacionesH,AnioPActual,CodSol,DiasTotalesH,DiasSolH  FROM `tbl_histo_vacaciones` WHERE  CodEmpleado = ".$iduser." ORDER BY CodVacacionesH ";
              if($resqryHistorico = $mysqli->query($sqlHistorico)) {
              while($rowH = mysqli_fetch_assoc($resqryHistorico)){  
                 
                   ?>
                        <tr>
                         <td><?php echo $rowH['CodVacacionesH']; ?></td>
                          <td><?php echo $rowH['CodSol']; ?></td>
                          <td><?php echo $rowH['AnioPActual']; ?></td>
                          <td><?php echo $rowH['DiasTotalesH']; ?></td>
                          <td><?php echo $rowH['DiasSolH']; ?></td>
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

$qry01 = "SELECT DiasVac,DiasTotales,AnioPActual FROM `tbl_usuarios` as u  
            INNER JOIN  `tbl_vacacionesxusuarios` as x on  x.CodEmpleado = u.CodUsuario
               WHERE u.Estatus = 1 AND  u.CodUsuario = ".$iduser." ";
      $resQry01 = $mysqli->query($qry01);
      $datos01 = mysqli_fetch_assoc($resQry01); 

        $DiasVacPHP=$datos01['DiasVac'];  
        $AnioPActualPHP=$datos01['AnioPActual'];
        $DiasTotalesPHP=$datos01['DiasTotales'];


      $qry02 = "SELECT AnioPeriodoActual,FechaInicioPActual,FechafinPActual,VigenciaPActual FROM `periodoactual` as p 
      WHERE p.EstatusPActual = 1  AND  p.CodEmpleado = ".$iduser." ";
      $resQry02 = $mysqli->query($qry02);
      $datos02 = mysqli_fetch_assoc($resQry02); 
      $FechaInicioPActualPHP=$datos02['FechaInicioPActual'];
       $FechafinPActualPHP=$datos02['FechafinPActual'];
      $VigenciaPActualPHP=$datos02['VigenciaPActual'];


          $FechaInicioVacAct=$FechaInicioPActualPHP;
          $porciones1 = explode("-", $FechaInicioVacAct);
          $Anio_PHP1=$porciones1[0];
          $Mes_PHP1=$porciones1[1];
          $Dia_PHP1=$porciones1[2];
          $esp2="-";
          $FechaInicioVacAct2 = $Dia_PHP1.$esp2.$Mes_PHP1.$esp2.$Anio_PHP1; 


          $FechafinPActualPHP2=$FechafinPActualPHP;
          $porciones2 = explode("-", $FechafinPActualPHP2);
          $Anio_PHP2=$porciones2[0];
          $Mes_PHP2=$porciones2[1];
          $Dia_PHP2=$porciones2[2];
          $esp2="-";
          $FechafinPActual_PHP = $Dia_PHP2.$esp2.$Mes_PHP2.$esp2.$Anio_PHP2; 


          $VigenciaPActualPHP22=$VigenciaPActualPHP;
          $porciones3 = explode("-", $VigenciaPActualPHP22);
          $Anio_PHP3=$porciones3[0];
          $Mes_PHP3=$porciones3[1];
          $Dia_PHP3=$porciones3[2];
          $esp2="-";
          $VigenciaPActualPHP2 = $Dia_PHP3.$esp2.$Mes_PHP3.$esp2.$Anio_PHP3;   



 ?>
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Avisos</h3>
     </div>
         <div class="modal-body">
            <h6>Bienvenido <?PHP echo $dataGerentes['Nombres']; echo " "; echo $dataGerentes['ApellidoPaterno']; echo " ";  echo $dataGerentes['ApellidoMaterno'];  ?></h6>
            Tienes <span style="color: green;font-weight: bolder;"> <?php echo $DiasTotalesPHP; ?>  Dias de Vacaciones  del Periodo <?php echo $AnioPActualPHP; ?> que inicia  <?php echo $FechaInicioVacAct2; ?>  al <?php echo $FechafinPActual_PHP; ?>   y vencen el <?php echo $VigenciaPActualPHP2;?> 
             </span>
             <hr>
             <?php
                  $qryPeriodoAnterior = "SELECT COUNT(*) as SiHayDias FROM `periodoanterior` WHERE CodEmpleado=  ".$iduser." ";
                  $resQryPeriodoAnterior = $mysqli->query($qryPeriodoAnterior);
                  $dataPA = mysqli_fetch_assoc($resQryPeriodoAnterior);

                   $SIHAYDIASPANTERIOR = $dataPA["SiHayDias"];

                   if($SIHAYDIASPANTERIOR == 1 ){                   

                      $qryDatosPeriodoAnterior = "SELECT * FROM `periodoanterior` WHERE CodEmpleado =  ".$iduser." and Estatus = 1 ";
                                            if($resQryDatosPeriodoAnterior = $mysqli->query($qryDatosPeriodoAnterior)) {
                                                  $DataPAnt = mysqli_fetch_assoc($resQryDatosPeriodoAnterior);   
                                                  $DiasPAntPHP =  $DataPAnt['DiasPAnt'];
                                                  $AnioPAntPHP =  $DataPAnt['AnioPAnt'];
                                                  $FechaInicioPAntPHP =  $DataPAnt['FechaInicioPAnt'];
                                                  $FechaFinPAntPHP =  $DataPAnt['FechaFinPAnt'];
                                                  $VigenciaPAntPHP =  $DataPAnt['VigenciaPAnt'];


                                                   /* Reconstrimos las Fechas */
                                                     $porcionesPA1 = explode("-", $FechaInicioPAntPHP);
                                                     $Anio_PHP=$porcionesPA1[0];
                                                     $Mes_PHP=$porcionesPA1[1];
                                                     $Dia_PHP=$porcionesPA1[2];
                                                     $esp="-";
                                                     $FechaInicioPAntPHP2 = $Dia_PHP.$esp.$Mes_PHP.$esp.$Anio_PHP; 


                                                      $porcionesPA2 = explode("-", $FechaFinPAntPHP);
                                                     $Anio_PHPPA2=$porcionesPA2[0];
                                                     $Mes_PHPPA2=$porcionesPA2[1];
                                                     $Dia_PHPPA2=$porcionesPA2[2];
                                                     $esp="-";
                                                     $FechaFinPAntPHP2 = $Dia_PHPPA2.$esp.$Mes_PHPPA2.$esp.$Anio_PHPPA2; 

                                                      $porcionesPA3 = explode("-", $VigenciaPAntPHP);
                                                     $Anio_PHPPA3=$porcionesPA3[0];
                                                     $Mes_PHPPA3=$porcionesPA3[1];
                                                     $Dia_PHPPA3=$porcionesPA2[2];
                                                     $esp="-";
                                                     $VigenciaPAntPHP2 = $Dia_PHPPA3.$esp.$Mes_PHPPA3.$esp.$Anio_PHPPA3; 

                                                  echo '<span style="color: red;font-weight: bolder;">';                                    

                                                  echo " , y tienes  ".$DiasPAntPHP." Dias del Periodo ".$AnioPAntPHP."  que inicio ".$FechaInicioPAntPHP2." al ".$FechaFinPAntPHP2."  y vencen el  ".$VigenciaPAntPHP2." ."; 
                                                  echo '</span>';        
                                                                              
                                                   }
                                                 
            
           

                   }else{ }

              ?>
              <hr>
              <?php
              
                $qryConsSol = "SELECT COUNT(*) as SiHaySol FROM `solicitud` s 
                         INNER JOIN `tbl_empleados` e ON e.CodUsu = s.CodEmpleado 
                         WHERE e.Jefe1 = ".$iduser." AND s.EstatusSol = '2' ORDER BY s.CodSol DESC   ";
                         $resQryConsSol = $mysqli->query($qryConsSol);
                         $dataConSol = mysqli_fetch_assoc($resQryConsSol);
                                        
                                if($dataConSol["SiHaySol"] >= 1 ){

                                       echo "Tienes las siguientes solicitudes de Vacaciones por los Usuarios :<br>";
                                        echo '<span style="text-align: center;vertical-align: middle;font-size: 1.2em; color:black;">';  
                                              $sqlS001 = "SELECT s.CodEmpleado FROM `solicitud` s 
                                              INNER JOIN `tbl_empleados` e ON e.CodE = s.CodEmpleado
                                              WHERE s.EstatusSol = '2' AND e.Jefe1 = ".$iduser."  GROUP BY s.CodEmpleado  ";

                                              if($resQRY001 = $mysqli->query($sqlS001)) {

                                                 while($row2 = mysqli_fetch_assoc($resQRY001)){

                                                          $ConsultaPrincipal2 = "SELECT * FROM `tbl_usuarios` as u  INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodUsu WHERE u.Estatus = 1 AND  u.CodUsuario = ".$row2['CodEmpleado']." ";
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

                                     echo "</span>";     

                                      if($DiasTotalesPHP == 0){
                      echo '<hr><label style="style="color: green;font-weight: bolder;">';
                              echo " Ya no tienes vacaciones disponibles del periodo actual ".$AnioPActualPHP." , por lo que no puedes pedir mas vacaciones hasta tu siguiente periodo que inicia ".$FechafinPActual_PHP."  ";
                      echo "</label>";
                    }else{ }



                    /*AQUI VAMOS A VALIDAR LA VIGENCIA DEL PERIODO ACTUAL */
                        

                        $ConsVigPeriodoActual = "SELECT * FROM `periodoactual`  WHERE  CodEmpleado =  ".$iduser." ";
                        if($resqlVigPeriodoActual = $mysqli->query($ConsVigPeriodoActual)) {
                        $dataVigPeriodoActual = mysqli_fetch_assoc($resqlVigPeriodoActual);

                              $CodEmpleadoPeriodoActual_Anterior = $dataVigPeriodoActual['CodEmpleado'];
                              $AnioPeriodoActual_Anterior = $dataVigPeriodoActual['AnioPeriodoActual'];
                              $FechaInicioPActual_Anterior = $dataVigPeriodoActual['FechaInicioPActual'];
                              $FechaFinPActual_Anterior = $dataVigPeriodoActual['FechaFinPActual'];
                              $VigenciaPActual_Anterior = $dataVigPeriodoActual['VigenciaPActual'];
                              $EstatusPActual_Anterior = $dataVigPeriodoActual['EstatusPActual'];

                              $FechaPeriodoActual=$dataVigPeriodoActual['VigenciaPActual'];
                              $FechaFinPeriodoActual=$dataVigPeriodoActual['FechaFinPActual'];

                              $ConsDiasPerActual = "SELECT * FROM `tbl_vacacionesxusuarios`  WHERE  CodEmpleado =  ".$iduser." ";
                              if($resqlDiasPerActual = $mysqli->query($ConsDiasPerActual)) {
                              $dataDiasPerActual = mysqli_fetch_assoc($resqlDiasPerActual);

                              $DiasPerActual_Anterior = $dataDiasPerActual['DiasTotales'];

                              }


                            
                            echo '<hr><label style="style="color:black;font-weight: bolder;">';

                            if($fecha_del_dia >= $FechaPeriodoActual  ){
                                echo "... ha finalizado tu Periodo Actual , espera un momento se esta realizando el calculo de tu periodo actual...";

                                        $ConsDatosFechaIngreos = "SELECT * FROM `tbl_empleados`  WHERE  CodE =  ".$iduser." ";
                                        if($resqlFechaIngreso = $mysqli->query($ConsDatosFechaIngreos)) {
                                         $dataFechaIngreso = mysqli_fetch_assoc($resqlFechaIngreso);
                                           $FechaIngreso= $dataFechaIngreso['fecha_ingreso'];

                                           

                                          $FechaFinPActual_Anterior;

                                          $date_future66 = strtotime('+ 1 day', strtotime($FechaFinPeriodoActual));
                                          $FechaFinPeriodoActual2 = date('Y-m-d', $date_future66); 

                                                $date_future6 = strtotime('+ 12 month', strtotime($FechaFinPeriodoActual2));
                                                $FechaFinRealPeriodoActual = date('Y-m-d', $date_future6);

                                                $date_future66 = strtotime('- 1 day', strtotime($FechaFinPeriodoActual2));
                                                $FechaFinPeriodoActual3 = date('Y-m-d', $date_future66);  //NoTA: se le suman 12 meses y se decuenta un dia para que no llegue al tope de su fecha final 

                                                $date_future5 = strtotime('+ 18 month', strtotime($FechaFinPeriodoActual2));
                                               $VigenciaPeriodoActual = date('Y-m-d', $date_future5);  // NoTA: se le suman 18 meses 

                                          $fecha1 = new DateTime($FechaIngreso);
                                          $fecha2 = new DateTime($fecha_del_dia);
                                          $fecha = $fecha1->diff($fecha2);

                                          $fecha->y;
                                          $fecha->m;
                                          $fecha->d;

                                          $antiguedad = $fecha->y;

                                          $sqlDiasVacaciones = "SELECT * from tbl_cat_vacaciones where Anios = ".$antiguedad."  ";
                                          if($qryDiasVacaciones = $mysqli->query($sqlDiasVacaciones)) {
                                          $DataDiasVacaciones = mysqli_fetch_assoc($qryDiasVacaciones);  
                                          $Dias_VacacionesxAntiguedad = $DataDiasVacaciones['Dias'];

                                          $Dias_VacacionesxAntiguedad;

                                          $anioactual = date('Y');
                                          
                                            $CodEmpleadoPeriodoActual_Anterior;
                                            $AnioPeriodoActual_Anterior;
                                            $FechaInicioPActual_Anterior;
                                            $FechaFinPActual_Anterior;
                                            $VigenciaPActual_Anterior;
                                            $EstatusPActual_Anterior;
                                            $DiasPerActual_Anterior;

                                          
                                            /*realiza updates e insercciones*/
                                          if($DiasPerActual_Anterior == 0){
                                             //echo  "<br> Se eliminara de la base de datos";

                                              $ActualizaPeriodoActual = "UPDATE `periodoactual` SET `AnioPeriodoActual` = '".$anioactual."',`FechaFinPActual` = '".$FechaFinPeriodoActual3."',`VigenciaPActual` = '".$VigenciaPeriodoActual."',`EstatusPActual` = '1',`FechaGPActual` = '".$fecha_del_dia."',`HoraGPActual` = '".$hora_actual."'  WHERE  `CodEmpleado` = '".$iduser."' ";
                                                     if($resActualiza01= $mysqli->query($ActualizaPeriodoActual)) {

                                                            $InsertarPerActH = "INSERT INTO `tbl_histo_vacaciones` (`CodVacacionesH`,`CodEmpleado`,`AnioPActual`,`CodSol`,`DiasTotalesH`,`DiasSolH`) VALUES (NULL,'".$iduser."','".$anioactual."',0,'".$Dias_VacacionesxAntiguedad."',0)";
                                                            if($resInserta04= $mysqli->query($InsertarPerActH)) {

                                                                      $ActualizaVacaciones = "UPDATE `tbl_vacacionesxusuarios` SET `AnioPActual` = '".$anioactual."',`Anio` = '".$antiguedad."',`Mes` = '".$fecha->m."',`Dias` = '".$fecha->d."',`DiasTomados` = '0',`DiasVac` = '".$Dias_VacacionesxAntiguedad."',`DiasTotales` = '".$Dias_VacacionesxAntiguedad."',`Estatus` = '1'  WHERE  `CodEmpleado` = '".$iduser."' ";
                                                                      if($resActualiza02= $mysqli->query($ActualizaVacaciones)) {

                                                                            echo "...Listo tu informacion ha sido actualizada, Gracias por la Espera";

                                                                      }else{ 
                                                                        //echo "no se actualizo tbl_vacacionesxusuarios "; 
                                                                      }

                                                            }else{ 
                                                              //echo "no se actualizo tbl_histo_vacaciones "; 
                                                            }

                                                      
                                                     }else{ 
                                                     // echo "<br> no se actualizo periodoactual 1 <br> ";  echo $ActualizaPeriodoActual;  echo mysql_error(); 
                                                    }

                                          }else{ 
                                           
                                             $InsertaPerANTERIOR = "INSERT INTO `periodoanterior` (`CodPeriodoAnt`,`CodEmpleado`,`DiasPAnt`,`AnioPAnt`,`FechaInicioPAnt`,`FechaFinPAnt`,`VigenciaPAnt`, `Estatus`, `FechaGPant`, `HoraGPant`) VALUES (NULL,'".$iduser."','".$DiasPerActual_Anterior."','".$AnioPAntPHP."','".$FechaInicioPActual_Anterior."','".$FechaFinPActual_Anterior."','".$VigenciaPActual_Anterior."',1,'".$fecha_del_dia."','".$hora_actual."')";

                                                     if($resInsPerAnt01= $mysqli->query($InsertaPerANTERIOR)) {

                                                                    $ActualizaPeriodoActual2 = "UPDATE `periodoactual` SET `AnioPeriodoActual` = '".$anioactual."',`FechaInicioPActual` = '".$FechaFinRealPeriodoActual."',`FechaFinPActual` = '".$FechaFinPeriodoActual3."',`VigenciaPActual` = '".$VigenciaPeriodoActual."',`EstatusPActual` = '1',`FechaGPActual` = '".$fecha_del_dia."',`HoraGPActual` = '".$hora_actual."'  WHERE  `CodEmpleado` = '".$iduser."' ";
                                                                              if($resActualiza011= $mysqli->query($ActualizaPeriodoActual2)) {

                                                                              $InsertarPerActH2 = "INSERT INTO `tbl_histo_vacaciones` (`CodVacacionesH`,`CodEmpleado`,`AnioPActual`,`CodSol`,`DiasTotalesH`,`DiasSolH`) VALUES (NULL,'".$iduser."','".$anioactual."',0,'".$Dias_VacacionesxAntiguedad."',0)";
                                                                                        if($resInserta042= $mysqli->query($InsertarPerActH2)) {

                                                                                        $ActualizaVacaciones2 = "UPDATE `tbl_vacacionesxusuarios`  SET `AnioPActual` = '".$anioactual."',`Anio` = '".$antiguedad."',`Mes` = '".$fecha->m."',`Dias` = '".$fecha->d."',`DiasTomados` = '0',`DiasVac` = '".$Dias_VacacionesxAntiguedad."',`DiasTotales` = '".$Dias_VacacionesxAntiguedad."', `Estatus` = '1'  WHERE  `CodEmpleado` = '".$iduser."' ";
                                                                                                if($resActualiza022= $mysqli->query($ActualizaVacaciones2)) {

                                                                                                echo "...Listo tu informacion ha sido actualizada, Gracias por la Espera";

                                                                                                }else{ 
                                                                                                //echo "no se actualizo tbl_vacacionesxusuarios "; 
                                                                                                }

                                                                                        }else{ 
                                                                                        //echo "no se actualizo tbl_histo_vacaciones "; 
                                                                                        }


                                                                              }else{ 
                                                                              //echo "no se actualizo periodoactual 2 "; 
                                                                              }

                                                    
                                                     }else{ 
                                                      //echo "<br> no se inserto periodoanterior "; 
                                                    }


                                          }

                                    

                                                     //echo "...Listo tu informacion ha sido actualizada, Gracias por la Espera";
                                          

                                        }

 
                                        }else{ echo mysqli_error(); }




                            }else{ //echo "aun no vence tu periodo actual"; 
                               }

                             echo "</label>";
                        }

                    /* TERMNINA VALIDACION Y CALCULO */

    
                                }else{
                                       echo " No hay Solicitudes de Vacaciones por el momento."; 
                                }

              ?>
                              
            <hr>
           
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
           "scrollX": true,
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


  <script>
      function ejecuta_ajax(archivo, parametros, capa){
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById(capa).innerHTML=xmlhttp.responseText;
        }
        }

        x = Math.random()*99999999;
        xmlhttp.open("GET",archivo+"?"+parametros+"&x="+x, true);
        xmlhttp.send();
        }

   </script>

   <script type="text/javascript" language="javascript" class="init">
 $(document).ready(function() {
        var selected = [];

        $('#example5').DataTable( {
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
