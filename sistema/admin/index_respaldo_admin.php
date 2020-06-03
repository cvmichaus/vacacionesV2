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
                        <a href="#" class="waves-effect"><img src="../fotos/usuarios/<?php echo $avatar; ?>" alt="user-img" class="img-circle"> <span class="hide-menu"> <?php echo $user; ?> <span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                           
                            <li><a href="index.php?op=logout"><i class="fa fa-power-off"></i> Salir</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap m-t-10">-Menu Principal</li>
                    <li><a href="index.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu">Inicio</span></a></li>
                    
                    <li><a href="inbox.html" class="waves-effect"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Usuarios <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a onclick="ejecuta_ajax('formusuario.php','','ventana');"  class="btn btn-link" data-toggle="modal" data-target="#exampleModal"  >Alta de Usuarios</a></li>
                           
                           
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
                    <h2>ADMIN</h2>
                    
                   
                    <div class="col-md-12">
                        <div class="white-box" style="width:100%; height:450px; overflow: scroll;">
                           
 						<table id="example2" cellspacing="0" class="display nowrap table  table-bordered" style="width: 100%;">
    <thead>
         <tr style="text-align: center;vertical-align: middle;font-size: .9em; background-color:#85b4d0; color:black;">
          <th>Nombre</th>
          <th>Posicion</th>
          <th>Area</th>
          <th>Perfil</th>
          <th>Jefe 1</th>
          <th>Jefe 2</th>
           <th>Fecha Alta</th>
          <th>Fecha Ingreso</th>
          <th width="20%">Antiguedad</th>
          <th width="20%">Dias Vac</th>
          <th width="20%">Dias Solicitados</th>
          <th width="20%">Dias Tomados</th>
          <th width="20%">Dias Restantes</th>
          <th>Opciones</th>
          </tr>
    </thead>
    <tbody>
      <?php

        $ConsultaPrincipal = "SELECT u.CodUsuario,E.Nombres,E.ApellidoPaterno,
        E.ApellidoMaterno,E.Posicion,E.Area,E.Reporta,E.Jefe2,E.fecha_ingreso,
        E.diasA,E.mesesA,E.aniosA,E.DiasVac,u.Perfil,u.Fecha_Alta  FROM `tbl_usuarios` as u 
        INNER JOIN tbl_empleados as E ON u.CodUsuario = E.CodUsu 
        WHERE u.Estatus = 1 AND u.CodUsuario <> 1
        ORDER BY u.CodUsuario DESC ";

     if($resqryUsuario = $mysqli->query($ConsultaPrincipal)) {
                                while($data = mysqli_fetch_assoc($resqryUsuario)){      
      ?>
          <tr style="text-align: center; vertical-align: middle; font-size: .7em; ">
          <td><?php echo $data['Nombres'];  echo " "; echo $data['ApellidoPaterno']; echo " "; echo $data['ApellidoMaterno']; ?></td>
          <td><?php echo $data['Posicion']; ?></td>
          <td><?php echo $data['Area']; ?></td>
           <td><?php 
           $PerfilPHP = $data['Perfil']; 
              if($PerfilPHP == 2){ echo "EMPLEADO";}
                else if($PerfilPHP == 3 ){ echo "GERENTE"; } 
           ?></td>
          <td><?php
                $sqlObtenerU = "SELECT * FROM `tbl_empleados` as e WHERE  e.CodUsu = ".$data['Reporta']."  ";
                if($resqry = $mysqli->query($sqlObtenerU)) {
                while($rowEmp = mysqli_fetch_assoc($resqry)){  
                echo $rowEmp['Nombres']; echo " "; echo $rowEmp['ApellidoPaterno']; echo " "; echo $rowEmp['ApellidoMaterno'];
                  }
                }
          ?></td>
            <td>
              <?php
                $sqlObtenerU2 = "SELECT * FROM `tbl_empleados` as e WHERE  e.CodUsu = ".$data['Jefe2']."  ";
                if($resqry2 = $mysqli->query($sqlObtenerU2)) {
                while($rowEmp2 = mysqli_fetch_assoc($resqry2)){  
                echo $rowEmp2['Nombres']; echo " "; echo $rowEmp2['ApellidoPaterno']; echo " "; echo $rowEmp2['ApellidoMaterno'];
                  }
                }
          ?>
            </td>
              <td><?php 

                echo  $fecha_Alta = $data['Fecha_Alta']; echo "<br>";

                  //$fecha_del_dia2= $fecha_del_dia;
                 
             

               ?></td> 
            <td><?php echo $data['fecha_ingreso']; ?></td>            
            <td width="20%"><?php echo $data['aniosA']; echo " Años"; echo " - "; echo $data['mesesA']; echo " Meses"; echo " - "; echo $data['diasA']; echo " Dias"; ?></td>
            
                  <?php

        $qryConsulta01 = "SELECT DiasVacAnt FROM tbl_periodoanterior where CodUsuario = ".$data['CodUsuario']." ";
     if($resQryConsulta01 = $mysqli->query($qryConsulta01)) {
                                $dataCons01 = mysqli_fetch_assoc($resQryConsulta01);   
                                    //echo $dataCons01['DiasVacAnt'];
                            

                        }
              ?>    
            
             <td>

              <?php 

               $sqlUsuarioDV2 = "SELECT * FROM `tbl_empleados` as u  
                        WHERE  u.CodUsu = ".$data['CodUsuario']."  ";

                        if($resqryUsuarioDV2 = $mysqli->query($sqlUsuarioDV2)) {
                        while($rowDV2 = mysqli_fetch_assoc($resqryUsuarioDV2)){ 
                             echo $TotalDiasVacPHP = $rowDV2['DiasVac'];
                        }

                        }
              //echo $data['DiasVac']; 
              ?></td>

               <td>
                    <?php 

               $sqlUsuarioDVD = "SELECT * FROM `tbl_solicitud` as u  
                        WHERE  u.CodUsuario = ".$data['CodUsuario']." AND Estatus = 1 ";

                        if($resqryUsuarioDVD = $mysqli->query($sqlUsuarioDVD)) {
                        while($rowDVDVD = mysqli_fetch_assoc($resqryUsuarioDVD)){ 
                             echo $DiasVacPHP = $rowDVDVD['DiasSolicitados']; echo ",";
                        }

                        }
              //echo $data['DiasVac']; 
              ?>
            </td>


             <td>

              <?php 

               $sqlUsuarioDV2 = "SELECT * FROM `tbl_vacaciones_usuarioxanio` as u  
                        WHERE  u.CodEmpleado = ".$data['CodUsuario']." ";

                        if($resqryUsuarioDV2 = $mysqli->query($sqlUsuarioDV2)) {
                        while($rowDV2 = mysqli_fetch_assoc($resqryUsuarioDV2)){ 
                              $DiasVacPHP2 = $rowDV2['DiasTomados'] ;
                              echo abs($DiasVacPHP2);
                        }

                        }
              //echo $data['DiasVac']; 
              ?></td>

            <td>

              <?php 

               $sqlUsuarioDV = "SELECT * FROM `tbl_vacaciones_usuarioxanio` as u  
                        WHERE  u.CodEmpleado = ".$data['CodUsuario']." ";

                        if($resqryUsuarioDV = $mysqli->query($sqlUsuarioDV)) {
                        while($rowDV = mysqli_fetch_assoc($resqryUsuarioDV)){ 
                              $DiasVacPHP = $rowDV['DiasVac'] + $dataCons01['DiasVacAnt'] - $DiasVacPHP2;
                              echo abs($DiasVacPHP);
                        }

                        }
              //echo $data['DiasVac']; 
              ?></td>

           

            <td>
				<form class="form-inline">
						<div class="form-group mb-2">

            <div class="btn-group btn-group-toggle" data-toggle="buttons">

            <button type="button" class="btn btn-round btn-warning btn-sm" onclick="ejecuta_ajax('detalles.php','cod=<?php echo $data['CodUsuario']; ?>','ventana');"  class="btn btn-link" data-toggle="modal" data-target="#exampleModal" >Detalles </button>
             &nbsp;&nbsp;
            <button type="button" class="btn btn-round btn-warning btn-sm" onclick="ejecuta_ajax('detalles2.php','cod=<?php echo $data['CodUsuario']; ?>','ventana');"  class="btn btn-link" data-toggle="modal" data-target="#exampleModal" > Contraseña </button>  &nbsp;&nbsp;
					
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
        var selected = [];

        $('#example2').DataTable( {
          dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
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

<script src="/javascripts/application.js" type="text/javascript" charset="utf-8" >

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
   }
   else{
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
           }else{
             document.getElementById("periodo_anterior").style.display = "none"; 
           }

    }

  </script>


</body>

</html>
  <?php
  } else {
    header("Location: ../../index.php");
  }
 
 ?>
