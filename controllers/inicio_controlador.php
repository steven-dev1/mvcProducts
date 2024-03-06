<?php
require_once 'models/inicio_modelo.php';
    class inicio_controlador {
        public function __construct(){
            $this->obj = new Plantilla();
        }
        public function principal(){
            // if(!$_SESSION['USU_UID']){
            //     header('Location: ?controlador=inicio&accion=frmLogin');
            // }
            $this->obj->products = inicio_modelo::listarProductos();
            $this->obj->plantilla("productos/principal");
        }

        public function addProduct(){
            $this->obj->plantilla("productos/addProduct");
        }

        public function add(){
            if(isset($_POST["nombreProducto"]) && isset($_POST["codigoProducto"]) && isset($_POST["precioProducto"]) && isset($_FILES["imagenProducto"])){
                extract($_POST);
                $imagen = $_FILES['imagenProducto'];
                move_uploaded_file($imagen['tmp_name'], "public/img/".$imagen['name']);
                if(trim($nombreProducto) == "" || trim($codigoProducto) == "" || trim($precioProducto) == ""){
                    echo json_encode(array("estado"=> 2, "mensaje"=>"Todos los campos son obligatorios"));
                } else {
                    $datos['codigoProducto'] = $codigoProducto;
                    $datos['nombreProducto'] = $nombreProducto;
                    $datos['precioProducto'] = $precioProducto;
                    $datos['imagenProducto'] = $imagen['name'];
                    $res = inicio_modelo::buscarcodigo($codigoProducto);
                    if(is_array($res)){
                        echo json_encode(array("estado"=> 2,"mensaje"=>"Ese correo ya existe", "icono"=>"error"));
                    } else {
                        $res = inicio_modelo::add($datos);
                        if($res){
                            echo json_encode(array('estado'=> 1, "mensaje"=> "Registro exitoso", "icono"=> "success"));
                        }else{
                            echo json_encode(array('estado'=> 2, "mensaje"=> "Error al registrar", "icono"=> "error"));
                        }
                    }
                }
            }else{
                echo json_encode(array("estado"=>3, "mensaje"=>"Faltan parametros", "icono"=>"Error"));
            }
        }

        public function eliminar(){
            if(isset($_GET['uid'])){
                $uid = $_GET['uid'];
                $r = inicio_modelo::eliminar($uid);
               
                if($r){
                    echo json_encode(array('estado'=> 1, "mensaje"=> "Se elimino exitosamente", "icono"=> "success"));
                }else{
                    echo json_encode(array('estado'=> 2, "mensaje"=> "Error al eliminar", "icono"=> "error"));
                }
            }
        }
    }
?>