<?php
class rutas{
    public static function cargarContenido($cnt, $acc){
            $archivo="controller/".$cnt."_controller.php";
           
            if (file_exists($archivo)){
                require_once $archivo;
                $clase=$cnt."_controller";
                $o=new $clase;
                if(method_exists($o, $acc)){
                    $o->$acc();
                }
                else{
                    echo "<br> el archivo no existe";
                }
            }else{
                echo "<br>no existe controlador";
            }
            
    }
}