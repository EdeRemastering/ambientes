
    function mensajeDeExito(mensaje) {
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: mensaje,
            confirmButtonColor: '#00FA66',
            confirmButtonText: 'Aceptar',
        });
    }

    function mensajeDeError(mensaje) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: mensaje,
            confirmButtonColor: '#00FA66',
            confirmButtonText: 'Aceptar',
        });
    }

    function mensajeDeAdvertencia(mensaje) {
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: mensaje,
            confirmButtonColor: '#00FA66',
            confirmButtonText: 'Aceptar',
        });
    }


    function mensajeDeEliminacion(event, idElemento, nombreElemento, seccionElemento) {
        event.preventDefault(); // Evita el envío inmediato del formulario
        
        let mensaje = `¿Seguro que desea eliminar el elemento: ${nombreElemento}, con id: ${idElemento}, de la sección de: ${seccionElemento}?`;
        
        Swal.fire({
            icon: 'question',
            title: 'Advertencia',
            text: mensaje,
            showCancelButton: true, // Muestra el botón de cancelar
            confirmButtonColor: '#00FA66',
            confirmButtonText: 'Aceptar',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if(result.isConfirmed) {
                // Si el usuario confirma, se envía el formulario
                document.getElementById(`formularioEliminar-${idElemento}`).submit();
            }
        });
    }



