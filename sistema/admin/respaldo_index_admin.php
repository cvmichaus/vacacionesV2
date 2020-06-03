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

                    <li><a onclick="ejecuta_ajax('formusuario.php','','ventana');"  data-toggle="modal" data-target="#exampleModal" class="waves-effect"> <span class="hide-menu">Alta de Usuario <span class="fa arrow"></span></span></a>
                       
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
                    <li><a href="logout.php" class="waves-effect"><span class="hide-menu">Salir</span></a></li>
                </ul>
            </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
             <div class="container-fluid" id="contenidos">
                <!-- /.row -->
                <div class="row">
                    <h2><?php echo $user; ?> </h2>
                    
                   
                    <div class="col-md-12">
                        <div class="white-box"><!-- style="width:100%; height:450px; overflow: scroll;"-->
                           
 						<table id="example2" cellspacing="1" class="display nowrap table  table-bordered" style="width: 100%;">
    <thead>
         <tr style="text-align: center;vertical-align: middle;font-size: .8em; background-color:#85b4d0; color:black;">
          <th>Nombre</th>
          <th>Posicion</th>
          <th>Area</th>
          <th>Perfil</th>
          <th>Jefe 1</th>
          <th>Jefe 2</th>
          <th>Fecha Ingreso</th>
          <th>Antiguedad</th>
          <th>Dias Vacaciones Anteriores</th>
          <th>Dias Vacaciones</th>
          <th>Dias Aceptados</th>
          <th>Dias Restantes</th>
          <th>Opciones</th>
          </tr>
    </thead>
    <tbody>
      <?php

        $ConsultaPrincipal = "SELECT e.CodUsu,e.Nombres,e.ApellidoPaterno,e.ApellidoMaterno,e.Posicion,e.Area,e.Jefe1,e.Jefe2,e.fecha_ingreso,u.Perfil,v.Anio,v.Mes,v.Dias,v.DiasTomados,v.DiasVac,v.DiasTotales FROM tbl_empleados as e 
        INNER JOIN tbl_vacacionesxusuarios as v ON v.CodEmpleado =  e.CodUsu 
        INNER JOIN tbl_usuarios as u ON u.CodUsuario = e.CodUsu 
        ";

     if($resqryUsuario = $mysqli->query($ConsultaPrincipal)) {
                                while($data = mysqli_fetch_assoc($resqryUsuario)){      
      ?>
      <tr style="text-align: center; vertical-align: middle; font-size: .7em; ">
          <td><?php echo $data['Nombres'];  echo " "; echo $data['ApellidoPaterno']; echo " "; echo $data['ApellidoMaterno']; ?></td>
          <td><?php echo $data['Posicion']; ?>
          <td><?php echo $data['Area']; ?></td>
          <td><?php 
                 $PerfilPHP = $data['Perfil']; 
              if($PerfilPHP == 2){ echo "EMPLEADO";}
                else if($PerfilPHP == 3 ){ echo "GERENTE"; } 
          ?></td>
          <td><?php 
              
              if(isset($data['Jefe1'])){

                   $sqlObtenerU = "SELECT * FROM `tbl_empleados` as e WHERE  e.CodUsu = ".$data['Jefe1']."  ";
                if($resqry = $mysqli->query($sqlObtenerU)) {
                while($rowEmp = mysqli_fetch_assoc($resqry)){  
                echo $rowEmp['Nombres']; echo " "; echo $rowEmp['ApellidoPaterno']; echo " "; echo $rowEmp['ApellidoMaterno'];
                  }
                }


              }if(empty($data['Jefe1'])){
                  echo "sin informacion";
              }

            
          ?></td>
          <td><?php 
          echo $data['Jefe2']; echo "<br>";
               if(isset($data['Jefe2'])){

                   $sqlObtenerU2 = "SELECT * FROM `tbl_empleados` as e WHERE  e.CodUsu = ".$data['Jefe2']."  ";
                if($resqry2 = $mysqli->query($sqlObtenerU2)) {
                while($rowEmp2 = mysqli_fetch_assoc($resqry2)){  
                echo $rowEmp2['Nombres']; echo " "; echo $rowEmp2['ApellidoPaterno']; echo " "; echo $rowEmp2['ApellidoMaterno'];
                  }
                }

               }
               if(empty($data['Jefe2'])){
                     echo "sin informacion";
               }


                
          ?></td>
          <td><?php echo $data['fecha_ingreso']; ?></td>
          <td><?php echo $data['Anio']; echo " Años"; echo " - "; echo $data['Mes']; echo " Meses"; echo " - "; echo $data['Dias']; echo " Dias"; ?></td>
          <td><?php 
               $qryConsulta01 = "SELECT DiasPAnt FROM periodoanterior where CodEmpleado = ".$data['CodUsu']." ";
     if($resQryConsulta01 = $mysqli->query($qryConsulta01)) {
                                $dataCons01 = mysqli_fetch_assoc($resQryConsulta01);   
                                    if(isset($dataCons01['DiasPAnt'])){
                                        echo $DiasPeriodoAnt =$dataCons01['DiasPAnt'];
                                    }else{
                                        echo $DiasPeriodoAnt = 0;
                                    }
                            

                        }

           ?></td>
          <td><?php echo $data['DiasVac']; ?></td>
          <td>
             <?php 

            

               $sqlSol = "SELECT * FROM `solicitud` as u  
                        WHERE  u.CodEmpleado = ".$data['CodUsu']." AND EstatusSol = 1 ";

                        if($resqrySol = $mysqli->query($sqlSol)) {
                        while($rowSol = mysqli_fetch_assoc($resqrySol)){ 

                            $DiasSolPHP = $rowSol['DiasSol']; 
                                          if(isset($DiasSolPHP)){
                                             echo $DiasSolPHP = $rowSol['DiasSol']; echo ",";
                                          }else{
                                              echo "aun no se han aceptado dias";
                                          }

                             
                        }

                        }
              //echo $data['DiasVac']; 
              ?>
          </td>

          <td>
             <?php
            //SELECT SUM(DiasSol) as total FROM solicitud WHERE EstatusSol = 1 and CodEmpleado = 8
            $sqlSolAceptados = "SELECT SUM(DiasSol) as total FROM solicitud WHERE EstatusSol = 1 and CodEmpleado =  ".$data['CodUsu']." ";

                        if($resqryAceptados = $mysqli->query($sqlSolAceptados)) {
                        while($rowSolAceptados = mysqli_fetch_assoc($resqryAceptados)){ 
                              $DiasSolAceptadosPHP = $rowSolAceptados['total']; 
                              echo $data['DiasTotales'] - $DiasSolAceptadosPHP;
                        }

                        }

          ?>
          </td>
          <td>
              <form class="form-inline">
            <div class="form-group mb-2">

            <div class="btn-group btn-group-toggle" data-toggle="buttons">

            <button type="button" class="btn btn-round btn-warning btn-sm" onclick="ejecuta_ajax('detalles.php','cod=<?php echo $data['CodUsu']; ?>','ventana');"  class="btn btn-link" data-toggle="modal" data-target="#exampleModal" >Detalles </button>
             &nbsp;&nbsp;
            <button type="button" class="btn btn-round btn-warning btn-sm" onclick="ejecuta_ajax('detalles2.php','cod=<?php echo $data['CodUsu']; ?>','ventana');"  class="btn btn-link" data-toggle="modal" data-target="#exampleModal" > Contraseña </button>  &nbsp;&nbsp;
          
            </div>

                        </div>
        </form>
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
<!--SMALL MODAL-->

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
            heading: 'Bienvenido, Admin  ',
            text: '<?php echo  $user; ?>',
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







 <script>

  function validarPasswd(){


    var p1 = document.getElementById("passwd").value;
    var p2 = document.getElementById("passwd2").value;

        var espacios = false;
    var cont = 0;
     
    while (!espacios && (cont < p1.length)) {
      if (p1.charAt(cont) == " ")
        espacios = true;
      cont++;
    }
     
    if (espacios) {
      alert ("La contraseña no puede contener espacios en blanco");
      return false;
    }

        if (p1.length == 0 || p2.length == 0) {
      alert("Los campos de la password no pueden quedar vacios");
      return false;
    }

        if (p1 != p2) {
      alert("Las passwords deben de coincidir");
      return false;
    } else {
      //alert("Todo esta correcto");
      return true; 
    }

}

</script>

  <script>
    /*PRECARGAR DATOS EN SELCT */
    function CargaAntiguedad(str)
    {
    if (str=="")
    {
    document.getElementById("resultado").innerHTML="";
    return;
    }
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
    document.getElementById("resultado").innerHTML=xmlhttp.responseText;
    }
    }
    xmlhttp.open("GET","obtener_antiguedad.php?y="+str,true);
    xmlhttp.send();
    }  

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
    $('#example2').DataTable( {
        "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]]
    },
     );
} );
</script>

<script >

   window.addEventListener("load", function() {
    formulario.diasutilizados.addEventListener("keypress", function(){ 
        return soloNumeros(event);
        }, false);
    });

 function soloNumeros(e){
    var key = window.event ? e.which : e.keyCode;
    if (key < 48 || key > 57) {
        //Usando la definición del DOM level 2, "return" NO funciona.
        e.preventDefault();
    }
}  
</script>


<script>

 function CalDiasTotales(){

    var diasvacaciones = document.getElementById('diasvacaciones2').value;
    var DiasVacPeriodoAnt = document.getElementById('DiasVacPeriodoAnt').value;
    var diasutilizados = document.getElementById('diasutilizados').value;

   if(DiasVacPeriodoAnt >= 1){
       var rest = parseInt(diasvacaciones) + parseInt(DiasVacPeriodoAnt) - parseInt(diasutilizados);
       

   }else if(DiasVacPeriodoAnt == null){
      document.getElementById("DiasVacPeriodoAnt").value = 0;
      DiasVacPeriodoAnt = 0;

       var rest = parseInt(diasvacaciones) + parseInt(DiasVacPeriodoAnt) - parseInt(diasutilizados);
       
   } 
   else if(DiasVacPeriodoAnt == 0){
      document.getElementById("DiasVacPeriodoAnt").value = 0;
      DiasVacPeriodoAnt = 0;

       var rest = parseInt(diasvacaciones) + parseInt(DiasVacPeriodoAnt) - parseInt(diasutilizados);
        
   }

 

    document.getElementById("diastotales").value = rest;
    document.getElementById("diastotales2").value = rest;

 } 

</script>

              <script>
     
  function validaCheckbox(){
        var isChecked = document.getElementById('diaspanterior').checked;
          if(isChecked){
           //  alert('checkbox esta seleccionado');
           document.getElementById("periodo_anterior").style.display = "inline"; 
           document.getElementById("diasutilizados").value=0;
          
           }else{
             document.getElementById("periodo_anterior").style.display = "none"; 
            
           }

    }
  
  
   
  </script>

    <script >
     function ocultardiv(){
       document.getElementById("periodo_anterior").style.display = "none"; 
       document.getElementById("PeriodoAnt").value='2019'
        document.getElementById("DiasVacPeriodoAnt").value='0'
    }  
  </script>


   <script >
     function mostrardiv(){
       document.getElementById("periodo_anterior").style.display = "inline"; 
    }  
  </script>

  <script>
    function divperiodoant(){
       document.getElementById("periodo_anterior").style.display = "none"; 
       document.getElementById("PeriodoAnt").value='2019'
        document.getElementById("DiasVacPeriodoAnt").value='0'
    }
  </script>


</body>

</html>
  <?php
  } else {
    header("Location: ../../index.php");
  }
 
 ?>
