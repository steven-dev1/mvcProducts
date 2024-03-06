<h1 class="m-5">Añadir producto</h1>
<form method="POST" action="?controlador=usuario&accion=registrar" onsubmit="return false" id="formReg" class="m-5" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6 my-3">
                    <label for="exampleInputPassword1" class="form-label">Codigo</label>
                    <input name="codigoProducto" type="text" class="form-control" id="codigoProducto">
                </div>
                <div class="col-lg-6 my-3">
                    <label for="exampleInputPassword1" class="form-label">Nombre</label>
                    <input name="nombreProducto" type="text" class="form-control" id="nombreProducto">
                </div>
                <div class="col-lg-6 my-3">
                    <label for="exampleInputEmail1" class="form-label">Precio</label>
                    <input name="precioProducto" type="text" class="form-control" id="precioProducto" aria-describedby="emailHelp">
                </div>
                <div class="col-lg-6 my-3">
                    <label for="exampleInputPassword1" class="form-label">Imagen</label>
                    <input name="imagenProducto" type="file" class="form-control" id="imagenProducto">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4" onclick="addProducto()">Añadir</button>
        </form>