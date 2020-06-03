<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>

	

</head>
<body>
	  <form  id="formuploadajax" method="post"  enctype="multipart/form-data" >
		<div class="form-group" >
		<input type="date" name="fechainicio" id="fechainicio">
		<input type="date" name="fechafinal" id="fechafinal" onblur="obtenerfechas();">
		 <!--<input type="submit" class="btn btn-primary mb-2" value="Guardar"/>-->
		</div>
	</form>
 <div id="mensaje" ></div>
</body>
  <script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
  <script type="text/javascript">


function obtenerfechas(){
	var f1 = document.getElementById('fechainicio').value;
	var f2 = document.getElementById('fechafinal').value;
	
 var aFecha1 = f1.split('/'); 
 var aFecha2 = f2.split('/'); 
 var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]); 
 var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]); 
 var dif = fFecha2 - fFecha1;
 var dias = Math.floor(dif / (1000 * 60 * 60 * 24)); 
//return dias;


	document.getElementById("mensaje").innerHTML = fFecha1;
}

/*
    $(function(){
        $("#formuploadajax").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formuploadajax"));
            formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                url: "res_fechas.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
       processData: false
            })
                .done(function(res){
                    $("#mensaje").html("Respuesta: " + res);
                });
        });
    });
    */
</script>
</html>