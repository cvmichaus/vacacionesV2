<?php
session_start();
  if($_SESSION["logueado"] == TRUE) {

      set_time_limit(0);
      require("../../class/cnmysql.php");
      date_default_timezone_set('America/Mexico_City');
      $fecha_del_dia=date('Y-m-d');//fecha actual

      setlocale(LC_TIME,"es_ES");
  $hora_actual= strftime("%H:%M:%S"); 

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
                <div class="top-left-part"><a class="logo" href="index.html"><b>
                  <img src="../plugins/images/pixeladmin-logo-dark.png" alt="home" />
                </b><span class="hidden-xs"><img src="../plugins/images/pixeladmin-tex_darkt.png" alt="home"></span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <li class="in">
                      
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                  
                
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../fotos/usuarios/<?php echo $avatar; ?>" alt="user-img" class="img-circle" width="36"><b class="hidden-xs"> Bienvenido <?php echo $user; ?> </b> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                          </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                  
                
                  
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
<div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav in" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                    </li>
                            
                   <li><a href="index.php" class="waves-effect  active"> <span class="hide-menu">Inicio</span></a></li>

                    <li><a onclick="ejecuta_ajax('formsolicitud.php','','ventana');"  class="btn btn-link" data-toggle="modal" data-target="#exampleModal" class="waves-effect"><span class="hide-menu">Solicitar Vacaciones <span class="fa arrow"></span></span></a>
                       
                    </li>


                   <!-- 
                    <li> <a href="#" class="waves-effect"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">UI kit<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level two-li collapse">
                            <li><a href="panels-wells.html">Panels and Wells</a></li>
                            <li><a href="panel-ui-block.html">Panels With BlockUI</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="sweatalert.html">Sweat alert</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="grid.html">Grid</a></li>
                            <li><a href="tabs.html">Tabs</a></li>
                            <li><a href="tabs-stylish.html">Stylis Tabs</a></li>
                            <li><a href="modals.html">Modals</a></li>
                            <li><a href="progressbars.html">Progress Bars</a></li>
                            <li><a href="notification.html">Notifications</a></li>
                            <li><a href="carousel.html">Carousel</a></li>
                            <li><a href="list-style.html">List &amp; Media object</a></li>
                            <li><a href="user-cards.html">User Cards</a></li>
                            <li><a href="timeline.html">Timeline</a></li>
                            <li><a href="timeline-horizontal.html">Horizontal Timeline</a></li>
                            <li><a href="nestable.html">Nesteble</a></li>
                            <li><a href="range-slider.html">Range Slider</a></li>
                            <li><a href="bootstrap.html">Bootstrap UI</a></li>
                            <li><a href="tooltip-stylish.html">Stylis Tooltips</a></li>
                        </ul>
                    </li>
                    <li> <a href="forms.html" class="waves-effect"><i data-icon="" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Forms<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="form-basic.html">Basic Forms</a></li>
                            <li><a href="form-layout.html">Form Layout</a></li>
                            <li><a href="form-advanced.html">Form Addons</a></li>
                            <li><a href="form-material-elements.html">Form Material</a></li>
                            <li><a href="form-float-input.html">Form Float Input</a></li>
                            <li><a href="form-upload.html">File Upload</a></li>
                            <li><a href="form-mask.html">Form Mask</a></li>
                            <li><a href="form-img-cropper.html">Image Cropping</a></li>
                            <li><a href="form-validation.html">Form Validation</a></li>
                            <li><a href="form-dropzone.html">File Dropzone</a></li>
                            <li><a href="form-pickers.html">Form-pickers</a></li>
                            <li><a href="form-wizard.html">Form-wizards</a></li>
                            <li><a href="form-typehead.html">Typehead</a></li>
                            <li><a href="form-xeditable.html">X-editable</a></li>
                            <li><a href="form-summernote.html">Summernote</a></li>
                            <li><a href="form-bootstrap-wysihtml5.html">Bootstrap wysihtml5</a></li>
                            <li><a href="form-tinymce-wysihtml5.html">Tinymce wysihtml5</a></li>
                        </ul>
                    </li>
                    <li> <a href="tables.html" class="waves-effect"><i data-icon="O" class="linea-icon linea-software fa-fw"></i> <span class="hide-menu">Tables<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="basic-table.html">Basic Tables</a></li>
                            <li><a href="table-layouts.html">Table Layouts</a></li>
                            <li><a href="data-table.html">Data Table</a></li>
                            <li><a href="bootstrap-tables.html">Bootstrap Tables</a></li>
                            <li><a href="responsive-tables.html">Responsive Tables</a></li>
                            <li><a href="editable-tables.html">Editable Tables</a></li>
                            <li><a href="foo-tables.html">FooTables</a></li>
                            <li><a href="jsgrid.html">JsGrid Tables</a></li>
                        </ul>
                    </li>
                    <li> <a href="#" class="waves-effect"><i data-icon="" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Extra<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="starter-page.html">Starter Page</a></li>
                            <li><a href="blank.html">Blank Page</a></li>
                            <li><a href="javascript:void(0)" class="waves-effect">Email Templates<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li> <a href="../email-templates/basic.html">Basic</a></li>
                                    <li> <a href="../email-templates/alert.html">Alert</a></li>
                                    <li> <a href="../email-templates/billing.html">Billing</a></li>
                                    <li> <a href="../email-templates/password-reset.html">Reset Pwd</a></li>
                                </ul>
                            </li>
                            <li><a href="lightbox.html">Lightbox Popup</a></li>
                            <li><a href="treeview.html">Treeview</a></li>
                            <li><a href="search-result.html">Search Result</a></li>
                            <li><a href="utility-classes.html">Utility Classes</a></li>
                            <li><a href="custom-scroll.html">Custom Scrolls</a></li>
                            <li><a href="javascript:void(0)" class="waves-effect">User Profile<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li><a href="profile.html">Profile</a></li>
                                    <li><a href="login.html">Login Page</a></li>
                                    <li><a href="login2.html">Login v2</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="register2.html">Register v2</a></li>
                                    <li><a href="recoverpw.html">Recover Password</a></li>
                                    <li><a href="lock-screen.html">Lock Screen</a></li>
                                </ul>
                            </li>
                            <li><a href="animation.html">Animations</a></li>
                            <li><a href="javascript:void(0)" class="waves-effect">Error Pages<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li><a href="400.html">Error 400</a></li>
                                    <li><a href="403.html">Error 403</a></li>
                                    <li><a href="404.html">Error 404</a></li>
                                    <li><a href="500.html">Error 500</a></li>
                                    <li><a href="503.html">Error 503</a></li>
                                </ul>
                            </li>
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                        </ul>
                    </li>
                    <li> <a href="widgets.html" class="waves-effect"><i data-icon="P" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Widgets</span></a> </li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="F" class="linea-icon linea-software fa-fw"></i> <span class="hide-menu">Multi level<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li> <a href="javascript:void(0)">Second Level Item</a> </li>
                            <li> <a href="javascript:void(0)">Second Level Item</a> </li>
                            <li> <a href="javascript:void(0)" class="waves-effect">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li> <a href="javascript:void(0)">Third Level Item</a> </li>
                                    <li> <a href="javascript:void(0)">Third Level Item</a> </li>
                                    <li> <a href="javascript:void(0)">Third Level Item</a> </li>
                                    <li> <a href="javascript:void(0)">Third Level Item</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                  -->
                    <li><a href="logout.php" class="waves-effect"> <span class="hide-menu">Salir</span></a></li>
                </ul>
            </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid" id="contenidos">
              
                <!-- /.row -->
                <div class="row">
                    <h2>EMPLEADO</h2>
                    
                   
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
          <th>Dias Vacaciones x Disfrutar</th>
          
          </tr>
    </thead>
    <tbody>
      <?php

        $ConsultaPrincipal = "SELECT * FROM `tbl_usuarios` as u  INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodUsu WHERE u.Estatus = 1 AND  u.CodUsuario = ".$iduser." ";
     if($resqryUsuario = $mysqli->query($ConsultaPrincipal)) {
                                $data = mysqli_fetch_assoc($resqryUsuario);    
      ?>
          <tr style="text-align: center; vertical-align: middle;font-size: .7em;  ">
          <td><?php echo $data['Nombres'];  echo " "; echo $data['ApellidoPaterno']; echo " "; echo $data['ApellidoMaterno']; ?></td>
          <td><?php echo $data['Posicion']; ?></td>
          <td><?php echo $data['Area']; ?></td>
          <td><?php
                $sqlObtenerU = "SELECT * FROM `tbl_empleados` as e WHERE  e.CodUsu = ".$data['Jefe1']."  ";
                if($resqry = $mysqli->query($sqlObtenerU)) {
                while($rowEmp = mysqli_fetch_assoc($resqry)){  
                echo $rowEmp['Nombres']; echo " "; echo $rowEmp['ApellidoPaterno']; echo " "; echo $rowEmp['ApellidoMaterno'];
                  }
                }
          ?></td>
            <td>
              <?php

              if(isset($data['Jefe2'])){

                   $sqlObtenerU2 = "SELECT * FROM `tbl_empleados` as e WHERE  e.CodUsu = ".$data['Jefe2']."  ";
                if($resqry2 = $mysqli->query($sqlObtenerU2)) {
                while($rowEmp2 = mysqli_fetch_assoc($resqry2)){  
                echo $rowEmp2['Nombres']; echo " "; echo $rowEmp2['ApellidoPaterno']; echo " "; echo $rowEmp2['ApellidoMaterno'];
                  }
                }

              } if(empty($data['Jefe2'])){
                     echo "sin informacion";
               }

               
          ?>
            </td>
            <td><?php echo $data['fecha_ingreso']; ?></td>

    

            <td><?php

              $sqlObtenerDias = "SELECT * FROM `tbl_vacacionesxusuarios` as e WHERE  e.CodEmpleado = ".$iduser."  ";
                if($resqryDias = $mysqli->query($sqlObtenerDias)) {
                $rowDias = mysqli_fetch_assoc($resqryDias);
                echo $rowDias['Anio']; echo " Años"; echo " - "; echo $rowDias['Mes']; echo " Meses"; echo " - "; echo $rowDias['Dias']; echo " Dias"; 
                  
                }


            ?></td>
             <td>
              <?php
                 $qryConsulta04 = "SELECT * FROM `periodoanterior` WHERE CodEmpleado =  ".$iduser." AND Estatus <> 3 ";
                                            if($resQryConsulta04 = $mysqli->query($qryConsulta04)) {
                                              $dataCons04 = mysqli_fetch_assoc($resQryConsulta04);   
                                                   echo  $DiasVacAntPHP =  $dataCons04['DiasPAnt'];
                                                  
                                            }   

                                            ?>            
             </td>
            <td><?php echo $rowDias['DiasVac']; ?></td>
            
              <td>
              <?php
              $qryConsulta02 = "SELECT DiasVac,DiasTomados,DiasTotales FROM tbl_vacacionesxusuarios WHERE CodEmpleado = ".$iduser." ";
                  if($resQryConsulta02 = $mysqli->query($qryConsulta02)) {
                      $dataCons02 = mysqli_fetch_assoc($resQryConsulta02);  
                      echo $rowDias['DiasTotales'] ;                  
                  }


              

              ?>
              </td>
        

          </tr>
        <?php
            
          }
      ?>
  </tbody>
</table>

<hr>
  <!--TABLA DE SOLICITUDES DE VACACIONES-->

 <h2>Solicitud de Vacaciones </h2>
<table id="example3"  cellspacing="0" class="display nowrap table  table-bordered" style="width: 100%;">
                      <thead>
                        <tr style="text-align: center;vertical-align: middle;font-size: .8em; background-color:#85b4d0; color:black;">
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
                        <tr  >
                         
                          <td><?php echo $row['CodSol']; ?></td>
                          <td><?php //echo $row['CodUsuario'];

          $sqlU = "SELECT * FROM `tbl_usuarios` as u INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodE  WHERE  u.CodUsuario = ".$row['CodEmpleado']."  ";
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
                        <tr style="text-align: center;vertical-align: middle;font-size: .8em; background-color:#85b4d0; color:black;">
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
                          <tr style="text-align: center; vertical-align: middle; font-size: .7em; ">
                         <td><?php echo $rowH['CodVacacionesH']; ?></td>
                          <td><?php echo $rowH['CodSol']; ?></td>
                          <td><?php echo $rowH['AnioPActual']; ?></td>
                          <td><?php echo abs($rowH['DiasTotalesH']); ?></td>
                          <td><?php echo $rowH['DiasSolH']; ?></td>
                        </tr>
                       <?php 
                } 
              } 
              ?>
              </tbody>
   </table>
    <!--TABLA DE SOLICITUDES DE VACACIONES-->
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
           
     </div>
         <div class="modal-body">
             <h6>Bienvenido <?PHP echo $data['Nombres']; echo " "; echo $data['ApellidoPaterno']; echo " ";  echo $data['ApellidoMaterno'];  ?></h6>
            Tienes <span style="color: green;font-weight: bolder;"> <?php echo $DiasTotalesPHP; ?>  Dias de Vacaciones  del Periodo <?php echo $AnioPActualPHP; ?> que inicia  <?php echo $FechaInicioVacAct2; ?>  al <?php echo $FechafinPActual_PHP; ?>   y vencen el <?php echo $VigenciaPActualPHP2;?> 
             </span>
             <hr>
             <?php
                  $qryPeriodoAnterior = "SELECT COUNT(*) as SiHayDias FROM `periodoanterior` WHERE CodEmpleado=  ".$iduser." ";
                  $resQryPeriodoAnterior = $mysqli->query($qryPeriodoAnterior);
                  $dataPA = mysqli_fetch_assoc($resQryPeriodoAnterior);

                   $SIHAYDIASPANTERIOR = $dataPA["SiHayDias"];

                   if($SIHAYDIASPANTERIOR == 1 ){                   

                      $qryDatosPeriodoAnterior = "SELECT * FROM `periodoanterior` WHERE CodEmpleado =  ".$iduser."  ";
                                            if($resQryDatosPeriodoAnterior = $mysqli->query($qryDatosPeriodoAnterior)) {

                                                /**/
                                                  $DataPAnt = mysqli_fetch_assoc($resQryDatosPeriodoAnterior);  

                                                  if($DataPAnt['Estatus'] == 3){

                                                    echo "Ya no tienes dias del Periodo Anterior , se usaron para tu solicitud.";

                                                  }else{

                                                  

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

                                                  echo " , y tienes  ".$DiasPAntPHP." Dias del Periodo ".$AnioPAntPHP." ( que ya se sumo a tus Dias de Vacaciones del Periodo Actual ".$AnioPActualPHP.") que inicio ".$FechaInicioPAntPHP2." al ".$FechaFinPAntPHP2."  y vencen el  ".$VigenciaPAntPHP2." ."; 
                                                  echo '</span>'; 

                                                }
                                                  /**/      
                                                                              
                                                   }
                                                 
            
           

                   }else{ }

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

                                                                            echo "...Listo tu informacion ha sido actualizada, Gracias por la Espera,por favor sal del sistema y vulve a entrar";

                                                                      }else{ 
                                                                        //echo "no se actualizo tbl_vacacionesxusuarios "; 
                                                                      }

                                                            }else{ 
                                                              //echo "no se actualizo tbl_histo_vacaciones "; 
                                                            }

                                                      
                                                     }else{ 
                                                      //echo "<br> no se actualizo periodoactual 1 <br> ";  echo $ActualizaPeriodoActual;  echo mysql_error(); 
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
                                                                                               // echo "no se actualizo tbl_vacacionesxusuarios "; 
                                                                                                }

                                                                                        }else{ 
                                                                                        //echo "no se actualizo tbl_histo_vacaciones "; 
                                                                                        }


                                                                              }else{ 
                                                                             // echo "no se actualizo periodoactual 2 "; 
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


              ?>
          </span>
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

    <script src="funciones.js"></script>



</body>

</html>
  <?php
  } else {
    header("Location: ../index.php");
  }
 
 ?>
