<?php 
    class inicio_modelo {

        public static function add($info) {
            $i = new connection();
            $con = $i->getConexion();
            $sql = "INSERT INTO tabla_productos(PRODUCT_UID, PRODUCT_NAME, PRODUCT_CODE, PRODUCT_PRICE, PRODUCT_IMAGE) VALUES (?,?,?,?,?)";
            $uid = uniqid();
            $st = $con->prepare($sql);
            $v = array(
                $uid,
                $info["nombreProducto"], 
                $info["codigoProducto"], 
                $info["precioProducto"], 
                $info["imagenProducto"], 
            );
            return $st->execute($v);
        }
        public static function eliminar($UID){
            $i = new connection();
            $con = $i -> getConexion();
            $sql = "DELETE FROM tabla_productos WHERE PRODUCT_UID = ?";
            $st = $con -> prepare($sql);
            $v = array($UID);
            return  $st -> execute($v);
        }

        // public static function validar($usuario, $password) {
        //     $i = new connection();
        //     $con = $i->getConexion();
        //     $sql = "SELECT USU_ID, USU_ROL, USU_NOMBRES, USU_APELLIDOS, USU_UID FROM t_usuario WHERE USU_EMAIL = ? AND USU_PASSWORD = ?";
        //     $resultado = $con->prepare($sql);
        //     $v = array($usuario, sha1($password));
        //     $resultado->execute($v);
        //     return $resultado->fetch();
        // }

        public static function listarProductos($condicion = ""){
            $i = new connection();
            $con = $i->getConexion();
            $sql = "SELECT * FROM tabla_productos $condicion";
            $st = $con->prepare($sql);
            $st->execute();
            return $st->fetchAll();
        }

        public static function buscarcodigo($codigo){
            $i = new connection();
            $con = $i->getConexion();
            $sql = "SELECT PRODUCT_CODE FROM tabla_productos WHERE PRODUCT_CODE = ?";
            $st = $con->prepare($sql);
            $v = array($codigo);
            $st->execute($v);
            return $st->fetch();
        }
    }

?>
