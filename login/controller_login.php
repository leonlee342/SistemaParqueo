<?php
    include('../app/config.php');

     //con esto estoy diciendo que voy a iniciar secion en el contorlador;
    session_start();

    $usuario_user = $_POST['usuario'];
    $password_user = $_POST['password_user'];

    //echo $usuario." - ".$password_user;
    $email_table = ''; $password_tabla ='';

    $query_login = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$usuario_user' AND password_user = '$password_user' AND estado = '1'");
    $query_login->execute();
    $usuarios = $query_login->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario){
        $email_table = $usuario ['email'];
        $password_tabla = $usuario['password_user'];
    }

    if(($usuario_user == $email_table) && ($password_user ==  $password_tabla)){
        ?>
        <div class="alert alert-success" role="alert">
                Usuario Correcto
        </div>
        <script>location.href= "principal.php";</script>
        <?php
        
        //en eta variable se esta almacennado el usuario que va a ingresar al sistema
        $_SESSION['usuario_sesion'] = $email_table;
    }else{
        ?>
        <div class="alert alert-danger" role="alert">
                Error al introducir sus datos
        </div>
         <!-- jquery password que la propiedad sea nulo si se equivoca en su contraseña -->
        <script>$('#password').val("");$('#password').focus();</script>
    <?php
    }


/*     if($usuario == "eddy"){
        ?>
            <div class="alert alert-success" role="alert">
                    Usuario Correcto
            </div>
        <?php
    }else{
        ?>
            <div class="alert alert-danger" role="alert">
                    Usuario Incorrecto
            </div>
        <?php

    }
 */

?>  

