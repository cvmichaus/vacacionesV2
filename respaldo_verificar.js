function verificar(){

			var p1 = document.getElementById("p1").value;
			var p2 = document.getElementById("p2").value;
			var p3 = document.getElementById("p3").value;
			var p4 = document.getElementById("p4").value;
			var p5 = document.getElementById("p5").value;
			var p6 = document.getElementById("p6").value;

			var p7 = document.getElementById("p7").value;
			var p8 = document.getElementById("p8").value;

			var p9 = document.getElementById("p9").value;
			var p10 = document.getElementById("p10").value;
			var p11 = document.getElementById("p11").value;
			var p12 = document.getElementById("p12").value;
			var p13 = document.getElementById("p13").value;
			var p14 = document.getElementById("p14").value;
			var p15 = document.getElementById("p15").value;

			var p16 = document.getElementById("p16").value;
			var p17 = document.getElementById("p17").value;
			var p18 = document.getElementById("p18").value;
			var p19 = document.getElementById("p19").value;
			var p20 = document.getElementById("p20").value;

			var p21 = document.getElementById("p21").value;
			var p22 = document.getElementById("p22").value;
			var p23 = document.getElementById("p23").value;
			var p24 = document.getElementById("p24").value;
			var p25 = document.getElementById("p25").value;
			var p26 = document.getElementById("p26").value;

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


				document.getElementById("p21").disabled = true;
				document.getElementById("p22").disabled = true;
				document.getElementById("p23").disabled = true;
				document.getElementById("p24").disabled = true;
				document.getElementById("p25").disabled = true;
				document.getElementById("p26").disabled = true;

				document.getElementById("IIRecuerdos").style.visibility = "visible";
				document.getElementById("continuar").value="no";


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

				document.getElementById("p21").disabled = false;
				document.getElementById("p22").disabled = false;
				document.getElementById("p23").disabled = false;
				document.getElementById("p24").disabled = false;
				document.getElementById("p25").disabled = false;
				document.getElementById("p26").disabled = false;

				document.getElementById("IIRecuerdos").style.visibility = "visible";
				document.getElementById("continuar").value="si";

					//document.getElementById("alerta").style.visibility = "visible";
				
			}
