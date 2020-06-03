function verificar(){

			/*I.- Acontecimiento traumático severo*/
			var p1 = document.getElementById("p1").value;
			var p2 = document.getElementById("p2").value;
			var p3 = document.getElementById("p3").value;
			var p4 = document.getElementById("p4").value;
			var p5 = document.getElementById("p5").value;
			var p6 = document.getElementById("p6").value;
			/*II.- Recuerdos persistentes sobre el acontecimiento (durante el último mes):*/
			var p7 = document.getElementById("p7").value;
			var p8 = document.getElementById("p8").value;
			/*III.- Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento (durante el último mes):*/
			var p9 = document.getElementById("p9").value;
			var p10 = document.getElementById("p10").value;
			var p11 = document.getElementById("p11").value;
			var p12 = document.getElementById("p12").value;
			var p13 = document.getElementById("p13").value;
			var p14 = document.getElementById("p14").value;
			var p15 = document.getElementById("p15").value;
			/*IV Afectación (durante el último mes):*/
			var p16 = document.getElementById("p16").value;
			var p17 = document.getElementById("p17").value;
			var p18 = document.getElementById("p18").value;
			var p19 = document.getElementById("p19").value;
			var p20 = document.getElementById("p20").value;

			if( p1 == "NO" && p2 == "NO" && p3 == "NO" && p4 == "NO" && p5 == "NO" && p6 == "NO" ){

				document.getElementById("p7").disabled = true;
				document.getElementById("p8").disabled = true;

				document.getElementById("p9").disabled = true;
				document.getElementById("p10").disabled = true;
				document.getElementById("p11").disabled = true;
				document.getElementById("p12").disabled = true;
				document.getElementById("p13").disabled = true;
				document.getElementById("p14").disabled = true;
				document.getElementById("p15").disabled = true;

				document.getElementById("p16").disabled = true;
				document.getElementById("p17").disabled = true;
				document.getElementById("p18").disabled = true;
				document.getElementById("p19").disabled = true;
				document.getElementById("p20").disabled = true;
				document.getElementById("continuar").value="no";

				document.getElementById("Recuerdos").style.display = "none";
			    document.getElementById("Afectacion").style.display = "none";

				//document.getElementById("Recuerdos").style.visibility = "visible";
				//document.getElementById("Afectacion").style.visibility = "visible";
				
				document.getElementById("btncont").style.display = "block";
				document.getElementById("btncont2").style.display = "none";
				

		
			}else if( p1 == "SI" || p2 == "SI" || p3 == "SI" || p4 == "SI" || p5 == "SI" || p6 == "SI" ){
				document.getElementById("p7").disabled = false;
				document.getElementById("p8").disabled = false;

				document.getElementById("p9").disabled = false;
				document.getElementById("p10").disabled = false;
				document.getElementById("p11").disabled = false;
				document.getElementById("p12").disabled = false;
				document.getElementById("p13").disabled = false;
				document.getElementById("p14").disabled = false;
				document.getElementById("p15").disabled = false;

				document.getElementById("p16").disabled = false;
				document.getElementById("p17").disabled = false;
				document.getElementById("p18").disabled = false;
				document.getElementById("p19").disabled = false;
				document.getElementById("p20").disabled = false;
				document.getElementById("continuar").value="si";
					
				document.getElementById("Recuerdos").style.display = "block";
				document.getElementById("Afectacion").style.display = "block";

				document.getElementById("btncont2").style.display = "block";
				document.getElementById("btncont").style.display = "none";
					
			
			}


			if( p7 == "SI" || p8 == "SI" ){
				
				document.getElementById("atencionclinica").value="si";

			}
			else if( p9 == "SI" || p10 == "SI" || p11 == "SI"  || p12 == "SI" || p13 == "SI" ){
				
				document.getElementById("atencionclinica").value="si";

			}
			else if( p16 == "SI" || p17 == "SI" || p18 == "SI"  || p19 == "SI" || p20 == "SI" ){
				
				document.getElementById("atencionclinica").value="si";

			}







		
				

	}


