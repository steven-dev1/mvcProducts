<?php
class ruta  {
    public static function cargarContenido($controlador, $accion) {
        if(file_exists("controllers/$controlador"."_controlador.php")) {
            require_once "controllers/$controlador"."_controlador.php";
            $contrl = $controlador."_controlador";
            $obj = new $contrl();
            if (method_exists($obj, $accion)) {
                $obj->$accion();
            } else {
                echo "<br>Ese servicio no existe";
            }
        } else {
            echo "<br>Ese controlador no existe";
        }
    }
}
?>