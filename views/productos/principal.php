<section class="py-5 mb-5">
            <div class="container px-4 px-lg-5 mt-5">
                <h1>Productos</h1>
                <a href="?controlador=inicio&accion=addProduct" class="btn btn-primary">Registrar</a>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php 
                    if (count($this->products) > 0) {
                        foreach($this->products as $producto) {
                            $uid = $producto['PRODUCT_UID'];
                            echo("
                        <article class='col mb-5'>
                            <div class='card h-100'>
                                <!-- Product image-->
                                <img class='card-img-top' src='public/img/".$producto['PRODUCT_IMAGE']. "' alt='...' />
                                <!-- Product details-->
                                <div class='card-body p-4'>
                                    <div class='text-center'>
                                        <!-- Product name-->
                                        <h5 class='fw-bolder'>".$producto['PRODUCT_NAME']."</h5>
                                        <!-- Product price-->
                                        Precio: $ ".$producto['PRODUCT_PRICE']."
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class='card-footer p-4 pt-0 border-top-0 bg-transparent d-flex justify-content-center align-items-center gap-2'>
                                    <div class='text-center'><a class='btn btn-primary mt-auto' href='?controlador=inicio&accion=editar'>Editar</a></div>
                                    <div class='text-center'><button type='button' onclick='eliminarProductoConfirm(\"$uid\", this)' class='btn btn-danger'>Eliminar</button></div>
                                </div>
                            </div>
                        </article>");
                        }
                    } else {
                        echo('<h5 class="text-primary w-100 text-center">Los productos que añadas apareceran aquí.</h5>');
                    }
                    ?>
                </div>
            </div>
        </section>