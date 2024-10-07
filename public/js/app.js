
    function mensajeDeExito(mensaje) {
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: mensaje,
            confirmButtonColor: '#00AF66',
            confirmButtonText: 'Aceptar',
        });
    }

    function mensajeDeError(mensaje) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: mensaje,
            confirmButtonColor: '#00AF66',
            confirmButtonText: 'Aceptar',
        });
    }

    function mensajeDeAdvertencia(mensaje) {
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: mensaje,
            confirmButtonColor: '#00AF66',
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
            confirmButtonColor: '#00AF66',
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

    function mensajeDetalleError(errores) {
        let errorMessage = "";
    
        // Iterar sobre el array de errores en JavaScript
        errores.forEach(error => {
            errorMessage += error + "\n";
        });
    
        // Mostrar la alerta con los errores
        Swal.fire({
            icon: 'error',
            title: 'Por favor corrija los siguientes errores:',
            text: errorMessage,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        });
    }
    
// Aquí una función que se encarga de buscar el estado del elemento que se clickea
document.addEventListener('DOMContentLoaded', function() {
    // Obtener la ruta actual y dividirla
    let partesRuta = window.location.pathname.split('/').filter(part => part);

    // Seleccionar la parte específica de la ruta (asumiendo que la tabla se llama 'ambientesTable')
    let parteEspecifica = partesRuta.slice(3).join('/');
    console.log('Parte específica:', parteEspecifica);

    // Generar el ID de la tabla dinámicamente basado en la ruta
    let tablaID = '#' + parteEspecifica + 'Table';
    console.log('Tabla ID:', tablaID);

    // Inicializar la tabla si no está ya inicializada
    let tabla;
    if (!$.fn.DataTable.isDataTable(tablaID)) {
        // Si no está inicializada, inicialízala
        tabla = $(tablaID).DataTable({
            paging: true,
            searching: true,
            ordering: true,
            lengthChange: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/2.1.7/i18n/es-MX.json'
            }
        });
    } else {
        // Si ya está inicializada, obtener la instancia existente
        tabla = $(tablaID).DataTable();
    }

    // Seleccionar los botones
    let botonesEstados = document.querySelectorAll('.botonEstado');
    // Añadir un evento a cada botón
    botonesEstados.forEach(function(boton) {
        boton.addEventListener('click', function() {
            console.log('Comenzó la función');
            // Obtener el texto del botón
            let elementosPorEstado = this.textContent;
            console.log('Texto del botón:', elementosPorEstado);

            // Separar el texto del botón en dos partes (nombre y valor)
            let textoBotonSeparado = elementosPorEstado.split(':');
            console.log('Texto separado:', textoBotonSeparado);

            // Obtener solo el nombre del estado (la primera parte)
            let nombreEstado = textoBotonSeparado[0].trim();
            console.log('Nombre del estado:', nombreEstado);

            // Ejecutar la búsqueda en la tabla con el estado seleccionado
            tabla.search(nombreEstado).draw();
        });
    });

    let botonesEstadoTotal = this.querySelectorAll('.botonEstadoTotal');
    console.log(botonesEstadoTotal);
    
    botonesEstadoTotal.forEach( (boton) => {
        boton.addEventListener('click', () => {
            console.log('Comenzó la segunda función');
            tabla.search('').draw();
        });
    });
});
 