    <?php
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from = "recursos.humanos@wri.org";
        $to = "alejandro.lopez@wri.org";
        $subject = "Alta en el Sistema de Solicitud de Vacaciones WRI 2";
        $message = "PHP mail works just fine";
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
        echo "The email message was sent.";
    );

    ?>