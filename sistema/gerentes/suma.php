<?php

session_start();
  if($_SESSION["logueado"] == TRUE) {

    set_time_limit(0);
    require("../../class/cnmysql.php");
    date_default_timezone_set('America/Mexico_City');
    $fecha_del_dia=date('Y-m-d');//fecha actual

    setlocale(LC_TIME,"es_ES");
    $hora_actual= strftime("%H:%M:%S");  

    $user = isset($_SESSION['UsuarioNombre']) ? $_SESSION['UsuarioNombre'] : null ;
    $iduser= isset($_SESSION['CodUsuario']) ? $_SESSION['CodUsuario'] : null ;

    $CodEmpleado ='3';
    $CodSolicitud ='1';


     $qryConsulta02 = "SELECT DiasVac,DiasTomados,DiasTotales,AnioPActual FROM tbl_vacacionesxusuarios WHERE CodEmpleado = ".$CodEmpleado." " ;
                  if($resQryConsulta02 = $mysqli->query($qryConsulta02)) {
                      $dataCons02 = mysqli_fetch_assoc($resQryConsulta02);  
                       echo "Dias Totales: "; echo $DiastotalesPHP = '19';    echo "<br>"; //$dataCons02['DiasTotales'];
                       echo "Dias Vacaciones: "; echo $DiasVacPHP2 = $dataCons02['DiasVac'];			echo "<br>";
                       echo "Año Periodo Actual: "; echo $AnioPActualPHP = $dataCons02['AnioPActual'];    	echo "<br>";
                       echo "<hr>";

                   }

           $sqlsol = "SELECT * FROM  `solicitud`  WHERE  CodEmpleado  = ".$CodEmpleado." and CodSol = ".$CodSolicitud." ";
                                      if($qrysol = $mysqli->query($sqlsol)) {
                                      $datasol = mysqli_fetch_assoc($qrysol);
                                      echo "Dias Solicitados: "; echo $DiasSolPHP = '19';  echo "<br>"; //$datasol['DiasSol']
                                      }

         $qryConsulta98 = "SELECT COUNT(*) as SiHayDias FROM `periodoanterior` WHERE CodEmpleado =  ".$CodEmpleado." and Estatus = 2 ";
						if($resQryConsulta98 = $mysqli->query($qryConsulta98)) {
						$dataCons98 = mysqli_fetch_assoc($resQryConsulta98);

								if($dataCons98['SiHayDias'] == 1 ){
								echo '<script language="javascript">alert("SI HAY DIAS DEL PERIODO ANTERIOR ");</script>';
										$qryConsulta97 = "SELECT * FROM `periodoanterior` WHERE CodEmpleado =  ".$CodEmpleado." ";

												if($resQryConsulta97 = $mysqli->query($qryConsulta97)) {
												$dataCons97 = mysqli_fetch_assoc($resQryConsulta97);   
												echo "CodPeriodoAnterior: "; echo $CodPeriodoAntPHP =  $dataCons97['CodPeriodoAnt'];  echo "<br>";
												echo "Dias Periodo Anterior: "; echo $DiasPeriodoAnt_PHP =  '5';  echo "<br>";// $dataCons97['DiasPAnt']
                        echo "<hr>";

														
                                      /*DIAS SOLICITADOS  ES MAYOR DIAS PANTANT  0*/
                                      if($DiasSolPHP > $DiasPeriodoAnt_PHP ){

                                            echo '<script language="javascript">alert(" ES MAYOR DiasSolPHP > DiasPeriodoAnt_PHP ");</script>';  
                                            echo '<script language="javascript">alert(" DIAS PERIODO ANTERIOR ES IGUAL A  0 AUN QUEDAN DIAS POR DESCONTAR ");</script>';  
                                            $subtotal =  $DiasSolPHP - $DiasPeriodoAnt_PHP; 
                                            $DiasPant2 = 0;
                                            echo '<script language="javascript">alert("Dias Restantes '.abs($subtotal).' a descontar a DiasVac '.$DiasVacPHP2.' ");</script>';
                                            echo '<script language="javascript">alert(" Actualizamos DiasPAnt a '.$DiasPant2.' y estatus 3 ");</script>'; 

                                              $total = abs($subtotal) - $DiasVacPHP2;

                                               echo '<script language="javascript">alert(" Actualizamos DIASTotales a '.$total.' ");</script>'; 




                                      }
                                      else  if($DiasSolPHP < $DiasPeriodoAnt_PHP ){
                                  /*DIAS PERIODO ANTERIOR ES MENOR , AUN QUEDAN DIAS A DESCONTAR DE LOS DIAS DE VAC DEL PERIODO  ANTERIOR*/

                                      echo '<script language="javascript">alert(" ES MENOR  DiasSolPHP < DiasPeriodoAnt_PHP  ");</script>';  
                                      echo '<script language="javascript">alert(" DIAS PERIODO ANTERIOR ES MENOR  A  DIAS SOL Y QUEDA AUN DIAS DE PERIODO ANTERIOR ");</script>';  
                                      $subtotal =  $DiasSolPHP - $DiasPeriodoAnt_PHP; 
                                      echo '<script language="javascript">alert("Sub_Resultado   '.$subtotal.'");</script>';  
                                      echo '<script language="javascript">alert(" Actualizamos DiasPAnt a '.abs($subtotal).' y estatus 2");</script>';
                                      }
                                      else if($DiasSolPHP == $DiasPeriodoAnt_PHP ){
                                         /* DIAS SOL = DIAS PERIODO ANTERIOR  0 */

                                              echo '<script language="javascript">alert(" ES IGUAL  DiasSolPHP > DiasPeriodoAnt_PHP ");</script>';  
                                              echo '<script language="javascript">alert(" DIAS PERIODO ANTERIOR ES IGUAL A  0 YA QUE LA CONTIDAD ES IGUAL AL DIA DE PERIODO ANTERIOR Y LOS DIAS SOLICITADOS ASI QUE ES 0");</script>';  
                                               $DiasPant3 = 0;
                                              echo '<script language="javascript">alert(" Actualizamos DiasPAnt a '.$DiasPant3.' y estatus 3 ");</script>';
                                              $subtotal =  $DiasSolPHP - $DiasPeriodoAnt_PHP; 
                                              echo '<script language="javascript">alert("Sub_Resultado   '.$subtotal.' ");</script>';  

                                            
 
                                      }
                                      /**/
												}

								}else{
                       echo '<script language="javascript">alert(" NO Hay dias Peridoo Anterior");</script>';

                       echo "RESULTADO: "; echo $resultado = abs($DiasSolPHP - $DiastotalesPHP);

                       echo '<script language="javascript">alert("Resultado   '.abs($resultado).'");</script>';
                        echo '<script language="javascript">alert("Actualizamos DiasTotales a '.abs($resultado).' ");</script>';


                }
					}


  } else {
    header("Location: ../index.php");
  }
 
 ?>
