let addProducto = async() => {
    let nombreProducto = document.getElementById('nombreProducto').value;
    let codigoProducto = document.getElementById('codigoProducto').value;
    let precioProducto = document.getElementById('precioProducto').value;
    let imagenProducto = document.getElementById('imagenProducto').files[0];
    if(nombreProducto.trim() == "" || codigoProducto.trim() == "" || precioProducto.trim() == ""){
        return alert("Todos los campos son obligatorios")
    }
    let url = '?controlador=inicio&accion=add';
    let fd = new FormData();
    fd.append("nombreProducto", nombreProducto);
    fd.append("codigoProducto", codigoProducto);
    fd.append("precioProducto", precioProducto);
    fd.append("imagenProducto", imagenProducto);
    let respuesta = await fetch(url, {
        method: "post",
        body: fd
    });
    let info = await respuesta.json();
    if(info.estado = "success") {
        document.getElementById('nombreProducto').value = "";
        document.getElementById('codigoProducto').value = "";
        document.getElementById('precioProducto').value = "";
    }
    Swal.fire({
        position: "center",
        icon: info.icono,
        title: info.mensaje,
        showConfirmButton: false,
        timer: 1500
      });

      setTimeout(() => {
        window.location.href = "?controlador=inicio&accion=principal";
      }, 1600);
}

let eliminarProductoConfirm = async (uid,elem) => {
    Swal.fire({
        title: "Estas seguro que deseas eliminar?",
        text: "Esta accion no se puede revertir!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            eliminarProducto(uid, elem)
        }
    });
}

let eliminarProducto = async (uid, elem) => {
    let url = `?controlador=inicio&accion=eliminar&uid=${uid}`;
    let respuesta = await fetch(url)
    let info = respuesta.json();
    Swal.fire({
        title:"Informacion",
        text: "Se eliminó el producto correctamente",
        icon: info.icono
    });
    $(elem).closest('article').remove();  
}


// console.log("hola")