<?php
    function usuario_autentiticado(){
        if (!revisar_usuario()) {
            header('Location:login.php');
            exit();
        }
    };
    
    function revisar_usuario(){
        return isset($_SESSION['correo']);
    };
    session_start();
    usuario_autentiticado();

