document.addEventListener("DOMContentLoaded", function() {
    var overlay = document.getElementById("overlay");
    var entendidoButton = document.getElementById("entendido");

    entendidoButton.addEventListener("click", function() {
        overlay.style.display = "none";
    });


    
});

const carrito = [];
const carritoLista = document.getElementById("carrito-lista");
const carritoTotal = document.getElementById("carrito-total");

function agregarAlCarrito(nombre, puntoCoccion, guarnicion, precio) {
carrito.push({ nombre, puntoCoccion, guarnicion, precio });
actualizarCarrito();}


function actualizarCarrito() {
    carritoLista.innerHTML = ""; // Limpiar la lista

    let total = 0;
    carrito.forEach((producto, index) => {
        const item = document.createElement("li");
        item.textContent = `${producto.nombre} (${producto.puntoCoccion}) (${producto.guarnicion}) - Precio: ${producto.precio}€`;

        // Agregar un botón de eliminación con la clase "boton-eliminar"
        const botonEliminar = document.createElement("button");
        botonEliminar.textContent = "Eliminar";
        botonEliminar.classList.add("boton-eliminar"); // Agrega la clase CSS

        // Asocia el índice del producto con el botón de eliminación
        botonEliminar.dataset.index = index;

        botonEliminar.addEventListener("click", () => eliminarDelCarrito(index));

        item.appendChild(botonEliminar);

        carritoLista.appendChild(item);
        total += producto.precio;
    });

    carritoTotal.textContent = total.toFixed(2) + "€";
}
function eliminarDelCarrito(index) {
    carrito.splice(index, 1); // Elimina el artículo del carrito
    actualizarCarrito(); // Actualiza la vista del carrito
}


function validarCarrito() {
    // Obtén la longitud del carrito
    const cantidadProductos = carrito.length;

    // Verifica si el carrito está vacío
    if (cantidadProductos === 0) {
        alert("El carrito está vacío. Debes agregar productos antes de enviar pedido.");
        // Evita el envío del formulario
        event.preventDefault();
    } else {
        // Crea un campo de formulario oculto para enviar el carrito
        const carritoInput = document.createElement("input");
        carritoInput.type = "hidden";
        carritoInput.name = "carrito";
        carritoInput.value = JSON.stringify(carrito);
        document.querySelector("form").appendChild(carritoInput);

        // Envía el formulario
        document.querySelector("form").submit();
    }
}

    // Función para validar la hora
    function validarHora() {
        var horaSeleccionada = document.getElementById("hora").value;
        var horaActual = new Date();
        var horaSeleccionadaParts = horaSeleccionada.split(":");
        var horaActualParts = [horaActual.getHours(), horaActual.getMinutes()];

        // Convierte las partes de la hora en números enteros
        horaSeleccionadaParts = horaSeleccionadaParts.map(function (part) {
            return parseInt(part);
        });

        // Compara la hora seleccionada con la hora actual
        if (
            horaSeleccionadaParts[0] < horaActualParts[0] ||
            (horaSeleccionadaParts[0] === horaActualParts[0] &&
                horaSeleccionadaParts[1] < horaActualParts[1])
        ) {
            alert("La hora seleccionada no puede ser anterior a la hora actual.");
            document.getElementById("hora").value = ""; // Limpia el campo de hora
        }
    }

  
 









