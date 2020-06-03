    <?php

        $CorreoPHP="Alejandro.lopez@wri.org";
        $nombrePHP="Prueba Localhost";
        $UsuarioPHP="Demo";
        $PassPHP="123";


        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from = "recursoshumanos@vacacioneswrimexico.org";
        $to = "alejandro.lopez@wri.org";
        $subject = "Alta en el Sistema de Solicitud de Vacaciones WRI";
        $message = "
                Hola estimado Usuario  se te ha dado de alta en el sistema de Vacaciones WRI <br>
            Tus Datos son los Siguientes:
            <br>
            Usuario: 
            <br>
            Clave: 
            <br>
            Puedes entrar a tu perfil a solicitar vacaciones  desde  www.vacacioneswrimexico.org

         ";
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
        echo "EL Mensaje se ha enviado con exito.";
    );
    
    ?>