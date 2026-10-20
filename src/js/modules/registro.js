(function () {
  let eventos = [];
  const eventosBoton = document.querySelectorAll('.evento__agregar');
  eventosBoton.forEach((boton) => boton.addEventListener('click', seleccionarEvento));

  function seleccionarEvento({ target }) {
    //Deshabilitar el boton

    target.disabled = true;
    eventos = [
      ...eventos,
      {
        id: target.dataset.id,
        nombre: target.parentElement.querySelector('.evento__nombre').textContent.trim(),
      },
    ];
    console.log(eventos);
  }
})();
