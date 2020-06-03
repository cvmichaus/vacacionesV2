
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
<title>Sistema de Vacaciones WRI Mexico </title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="style.css" rel="stylesheet">
<!-- color CSS -->
<link href="colors_blue.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
    <div class="white-box">
<br><br><br><br><br><br>
      <form class="form-horizontal form-material" method="POST"  action="session_init.php" autocomplete="off">

        <a href="javascript:void(0)" class="text-center db">SISTEMA DE VACACIONES
          <br/>
           <img src="logo.png"  width="100%"/>
        
        <div class="form-group m-t-40">
          <div class="col-xs-12">
           
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
           <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Username">
            <input type="hidden" id="inicias" name="inicias" value="1">
          </div>
        </div>
		
		
		  <div class="form-group">
          <div class="col-xs-12">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            
          </div>
        </div>
		
      
       
		
		 <div class="form-group">
                <?php
                if(isset($_GET["error"])) {
                //echo "<div class='error'>Usuario y / o Contraseña erroneos. Intentelo de nuevo.</div>";

                  echo '
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong> ERROR ! </strong>Usuario y / o Contraseña erroneos. Intentelo de nuevo.
                          </div>
                   ';

                }
                ?>
                 <input type="submit" value="Accesar" name="enviar" class="btn btn-primary btn-lg btn-block" />
                </div>
		
				
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
            Todos los derechos reservados &copy; wri mexico,<br> <strong> Sistema de Vacaciones</strong>
          </div>
        </div>
       
      </form>
      
    </div>
  </div>
</section>
<!-- jQuery -->
<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="custom.min.js"></script>
<!--Style Switcher -->
<script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
