<?php

include('app/config.php');

    session_start();
    if(isset($_SESSION['usuario_sesion'])){
      
        ?>
            <a href="<?php echo $URL;?>/login/cerrar_sesion.php">Cerrar Session</a>
        <?php
          
          echo "existe sesion";
    }else{
        echo "Para ingresar a esta plataforma debe de iniciar sesion";
    }

?>