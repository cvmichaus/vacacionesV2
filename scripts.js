		function verificar(){

	 	select1 = document.getElementById("p1").value;
	 	select2 = document.getElementById("p2").value;
	 	select3 = document.getElementById("p3").value;
	 	select4 = document.getElementById("p4").value;
	 	select5 = document.getElementById("p5").value;
	 	select6 = document.getElementById("p6").value;
	 	select7 = document.getElementById("p7").value;
	 	select8 = document.getElementById("p8").value;
	 	select9 = document.getElementById("p9").value;

	 	select10 = document.getElementById("p10").value;
	 	select11 = document.getElementById("p11").value;
	 	select12 = document.getElementById("p12").value;
	 	select13 = document.getElementById("p13").value;

	 	select14 = document.getElementById("p14").value;
	 	select15 = document.getElementById("p15").value;
	 	select16 = document.getElementById("p16").value;
	 	select17 = document.getElementById("p17").value;

	 	select18 = document.getElementById("p18").value;
	 	select19 = document.getElementById("p19").value;
	 	select20 = document.getElementById("p20").value;
	 	select21 = document.getElementById("p21").value;
	 	select22 = document.getElementById("p22").value;

	 	select23 = document.getElementById("p23").value;
	 	select24 = document.getElementById("p24").value;
	 	select25 = document.getElementById("p25").value;
	 	select26 = document.getElementById("p26").value;
	 	select27 = document.getElementById("p27").value;

	 	select28 = document.getElementById("p28").value;
	 	select29 = document.getElementById("p29").value;
	 	select30 = document.getElementById("p30").value;
	 	select31 = document.getElementById("p31").value;
	 	select32 = document.getElementById("p32").value;
	 	select33 = document.getElementById("p33").value;
	 	select34 = document.getElementById("p34").value;
	 	select35 = document.getElementById("p35").value;
	 	select36 = document.getElementById("p36").value;
	 	select37 = document.getElementById("p37").value;
	 	select38 = document.getElementById("p38").value;
	 	select39 = document.getElementById("p39").value;
	 	select40 = document.getElementById("p40").value;

	 	select41 = document.getElementById("p41").value;
	 	select42 = document.getElementById("p42").value;
	 	select43 = document.getElementById("p43").value;

	 	select44 = document.getElementById("p44").value;
	 	select45 = document.getElementById("p45").value;
	 	select46 = document.getElementById("p46").value;

	 	

	 	/*CALIFICACION DE DOMINIO*/
		CalCond =  parseInt(select2) + parseInt(select1) + parseInt(select3);
		
		CalCarga =  parseInt(select4) + parseInt(select9) + parseInt(select5) + parseInt(select6) + parseInt(select7) + parseInt(select8) + parseInt(select41) + parseInt(select42) + parseInt(select43);
		CalFAltaControl = parseInt(select4) + parseInt(select9) + parseInt(select5) + parseInt(select6) + parseInt(select7) + parseInt(select8) + parseInt(select41) + parseInt(select42) + parseInt(select43);
		CalJornada = parseInt(select14) + parseInt(select15);
		CalInterferencia = parseInt(select16) + parseInt(select17);
		CalLiderazgo = parseInt(select23) + parseInt(select24) + parseInt(select25)+ parseInt(select26)+ parseInt(select27);
		CalRelaciones =  parseInt(select30) + parseInt(select31) + parseInt(select32) + parseInt(select44) + parseInt(select45) + parseInt(select46);
		CalViolencia = parseInt(select33) + parseInt(select34) + parseInt(select35) + parseInt(select36) + parseInt(select37) + parseInt(select38) + parseInt(select39) + parseInt(select40);
/**/
		TotalDom = 	 parseInt(CalCond) + parseInt(CalCarga)  + parseInt(CalFAltaControl)  + parseInt(CalJornada)  + parseInt(CalInterferencia)  + parseInt(CalLiderazgo)  + parseInt(CalRelaciones)  + parseInt(CalViolencia); 
	 	
	 	document.getElementById("Cdom").value = TotalDom;


	 	/*CALIFICACION CATEGORIA*/	
	 	CalAmbiente =  parseInt(select2) + parseInt(select1) + parseInt(select3);
	 	CalFactores =  parseInt(select4) + parseInt(select9) + parseInt(select5) + parseInt(select6) + parseInt(select7) + parseInt(select8) + parseInt(select41) + parseInt(select42) + parseInt(select43);
		CalOrganizacion =  parseInt(select14) + parseInt(select15) +  parseInt(select16) + parseInt(select17);
		CalLidereazgo = parseInt(select23) + parseInt(select24) + parseInt(select25)+ parseInt(select26)+ parseInt(select27) + parseInt(select28) + parseInt(select29) + parseInt(select30) + parseInt(select31) + parseInt(select32) + parseInt(select44) + parseInt(select45) + parseInt(select46) + parseInt(select33) + parseInt(select34) + parseInt(select35) + parseInt(select36) + parseInt(select37) + parseInt(select38) + parseInt(select39) + parseInt(select40);
		
		TotalCategoria =  parseInt(CalAmbiente) + parseInt(CalFactores)  + parseInt(CalOrganizacion)  + parseInt(CalLidereazgo);

		document.getElementById("Ccat").value = TotalCategoria;


      /* TOTAL */	
	 	total =  parseInt(TotalDom) + parseInt(TotalCategoria);
		
		document.getElementById("Cfinal").value = total;

				if( total < 20){
					document.getElementById("CRes").value = "NULO";
				}
				else if( total <= 25  && total < 45){
					document.getElementById("CRes").value = "BAJO";
				}
				else if( total <= 45  && total < 70){
					document.getElementById("CRes").value = "MEDIO";
				}
				else if( total <= 70  && total < 90){
					document.getElementById("CRes").value = "ALTO";
				}
				else if( total > 90){
					document.getElementById("CRes").value = "MUY ALTO";
				}

		}


	 function verificar2(){

	 	select1 = document.getElementById("p1").value;
	 	select2 = document.getElementById("p2").value;
	 	select3 = document.getElementById("p3").value;
	 	select4 = document.getElementById("p4").value;
	 	select5 = document.getElementById("p5").value;
	 	select6 = document.getElementById("p6").value;
	 	select7 = document.getElementById("p7").value;
	 	select8 = document.getElementById("p8").value;
	 	select9 = document.getElementById("p9").value;

	 	select10 = document.getElementById("p10").value;
	 	select11 = document.getElementById("p11").value;
	 	select12 = document.getElementById("p12").value;
	 	select13 = document.getElementById("p13").value;

	 	select14 = document.getElementById("p14").value;
	 	select15 = document.getElementById("p15").value;
	 	select16 = document.getElementById("p16").value;
	 	select17 = document.getElementById("p17").value;

	 	select18 = document.getElementById("p18").value;
	 	select19 = document.getElementById("p19").value;
	 	select20 = document.getElementById("p20").value;
	 	select21 = document.getElementById("p21").value;
	 	select22 = document.getElementById("p22").value;

	 	select23 = document.getElementById("p23").value;
	 	select24 = document.getElementById("p24").value;
	 	select25 = document.getElementById("p25").value;
	 	select26 = document.getElementById("p26").value;
	 	select27 = document.getElementById("p27").value;

	 	select28 = document.getElementById("p28").value;
	 	select29 = document.getElementById("p29").value;
	 	select30 = document.getElementById("p30").value;
	 	select31 = document.getElementById("p31").value;
	 	select32 = document.getElementById("p32").value;
	 	select33 = document.getElementById("p33").value;
	 	select34 = document.getElementById("p34").value;
	 	select35 = document.getElementById("p35").value;
	 	select36 = document.getElementById("p36").value;
	 	select37 = document.getElementById("p37").value;
	 	select38 = document.getElementById("p38").value;
	 	select39 = document.getElementById("p39").value;
	 	select40 = document.getElementById("p40").value;

	 	select41 = document.getElementById("p41").value;
	 	select42 = document.getElementById("p42").value;
	 	select43 = document.getElementById("p43").value;

	 	select44 = document.getElementById("p44").value;
	 	select45 = document.getElementById("p45").value;
	 	select46 = document.getElementById("p46").value;


	 		

	

}


	



  