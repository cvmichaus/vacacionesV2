     <?php
                              if(empty($Jefe2PHP)){
                                ?>
                                <option value="">Ninguno</option>
                                
                                    <?php 
                                  
                                   $sqlUsuario2 = "SELECT * FROM `tbl_usuarios` as u  
                                   INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodUsu
                                    WHERE u.Estatus = 1 
                                    AND  u.Perfil = 3 
                                    and u.CodUsuario = '".$Jefe2PHP."' ";

                            $resqryUsuario2 = $mysqli->query($sqlUsuario2);
                            $dataEmpleado2 = mysqli_fetch_assoc($resqryUsuario2);
                                 echo $dataEmpleado2['CodUsuario']; ?>-<?php echo $dataEmpleado2['Nombres']; ?> <?php echo $dataEmpleado2['ApellidoPaterno']; ?> <?php echo $dataEmpleado2['ApellidoMaterno'];  ?>
                            </option>
                            <?php

                              }else{
                                  ?>
                                   <option value='<?php echo $Jefe2PHP; ?>'><?php echo $Jefe2PHP; ?></option>
                                  <?php
                              }
                            ?>
                         
                           
                            <?php

                            $sqlUsuario = "SELECT * FROM `tbl_usuarios` as u  
                            INNER JOIN `tbl_empleados` as e ON u.CodUsuario = e.CodUsu
                            WHERE u.Estatus = 1 
                            AND   u.Perfil = 3 ";

                            if($resqryUsuario = $mysqli->query($sqlUsuario)) {
                            while($dataEmpleado = mysqli_fetch_assoc($resqryUsuario)){  
                            ?>
                            <option value="<?php echo $dataEmpleado['CodUsuario']; ?>"><?php echo $dataEmpleado['CodUsuario']; ?>-<?php echo $dataEmpleado['Nombres']; ?> <?php echo $dataEmpleado['ApellidoPaterno']; ?> <?php echo $dataEmpleado['ApellidoMaterno']; ?></option>
                            <?php
                            }
                            }
                            ?>