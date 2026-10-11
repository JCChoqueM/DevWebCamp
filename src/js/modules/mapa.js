// src/js/modules/mapa.js
// Inicializa el mapa de Leaflet dentro del <div id="mapa"> de la página de inicio.
//
// Leaflet se carga desde el CDN declarado en views/layout.php y queda disponible
// como variable global `L` (no se importa vía npm: `leaflet` no está en node_modules
// de este proyecto). Este módulo es importado automáticamente por src/js/app.js
// mediante `import.meta.glob('./modules/**/*.js', { eager: true })`.
//
// NOTA sobre la URL de tiles: se usa `https://{s}.tile.openstreetmap.org`
// (subdominios a/b/c) y NO `https://tile.openstreetmap.org` (dominio sin subdominio),
// porque el CSP del proyecto (`img-src https://*.tile.openstreetmap.org`) solo
// permite los tiles con subdominio; el dominio "limpio" quedaría bloqueado.

(() => {
  const mapa = document.querySelector('#mapa');

  // Sólo inicializa el mapa cuando el contenedor está presente en el
  // documento (la home es la única página con el <div id="mapa">).
  if (!mapa) {
    return;
  }

  // Coordenadas del recinto del DevWebCamp (Centro de Convenciones de Los Ángeles)
  const coordenadas = [34.0403207, -118.2695624];
  const zoom = 16;

  // Crear el mapa centrado en las coordenadas con el nivel de zoom inicial.
  const map = L.map('mapa').setView(coordenadas, zoom);

  // Capa base de OpenStreetMap (subdominios a/b/c -> cumple con el CSP).
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    crossOrigin: true,
    attribution:
      '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  }).addTo(map);

  // Marcador con un popup informativo del evento.
  L.marker(coordenadas)
    .addTo(map)
    .bindPopup(
      '<div class="mapa__popup">' +
        '<h2 class="mapa__heading">DevWebCamp</h2>' +
        '<p class="mapa__texto">Centro de Convenciones de Los Ángeles</p>' +
        '</div>'
    )
    .openPopup();
})();
