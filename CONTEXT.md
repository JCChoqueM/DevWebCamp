# 📋 Contexto del Proyecto - DevWebCamp

> Auto-generado para preservar contexto entre sesiones.  
> Última actualización: 2026-10-11

## 📍 Estado actual
- **Proyecto:** DevWebCamp (PHP + Vite + SCSS + MySQL + Docker)
- **Entorno:** Desarrollo (`ENVIRONMENT=development`)
- **Última tarea completada:** Corrección de animaciones AOS (`data-aos="fade-up"`)

---

## 🗺️ Estructura completa del proyecto

```
DevWebCamp/
├── composer.json          # 23 líneas — dependencias PHP
├── docker-compose.yml     # Orquestación Docker (Apache, MySQL)
├── docker/
│   ├── Dockerfile         # Imagen Apache + PHP
│   └── apache.conf        # Config del vhost
├── Router.php             # 61 líneas — enrutador principal
├── .env                   # Variables de entorno (DB, EMAIL, APP_URL)
│
├── classes/               # Utilidades generales
│   ├── Email.php          # 82 líneas — envío de emails (PHPMailer)
│   └── Paginacion.php     # 126 líneas — paginación de resultados
│
├── controllers/           # Controladores (MVC)
│   ├── APIEventos.php     # API REST de eventos
│   ├── APIPonentes.php    # API REST de ponentes
│   ├── AuthController.php # 262 líneas — autenticación/login/registro
│   ├── DashboardController.php
│   ├── EventosController.php  # CRUD de eventos
│   ├── PaginasController.php   # Paginas públicas (index, conferencias, etc.)
│   ├── PonentesController.php  # CRUD de ponentes
│   ├── RegalosController.php
│   └── RegistradosController.php
│
├── models/                # Modelos (ActiveRecord)
│   ├── ActiveRecord.php   # 307 líneas — ORM base
│   ├── Categoria.php
│   ├── Dia.php
│   ├── Evento.php
│   ├── EventoHorario.php
│   ├── Hora.php
│   ├── Ponente.php
│   └── Usuario.php
│
├── includes/
│   ├── app.php            # 18 líneas — bootstrap/app init
│   ├── database.php       # Conexión MySQL (PDO)
│   └── funciones.php      # 54 líneas — helpers globales
│
├── views/                 # Plantillas PHP
│   ├── layout.php         # ✅ Layout principal (corregido AOS)
│   ├── admin-layout.php   # Layout para admin
│   ├── paginas/           # Vistas públicas
│   │   ├── index.php      # ✅ Página inicio (usa data-aos="fade-up")
│   │   ├── conferencias.php
│   │   ├── devwebcamp.php
│   │   └── paquetes.php
│   ├── templates/         # Componentes reutilizables
│   │   ├── header.php
│   │   ├── footer.php
│   │   ├── alertas.php
│   │   ├── evento.php
│   │   ├── admin-header.php
│   │   └── admin-sidebar.php
│   ├── admin/             # Panel de administración
│   │   ├── dashboard/, eventos/, ponentes/, regalos/, registrados/
│   └── auth/              # Vistas de autenticación
│       ├── login.php, registro.php, olvidé.php, etc.
│
├── src/                   # Código fuente frontend
│   ├── js/
│   │   ├── app.js         # Entry point — carga módulos con import.meta.glob
│   │   └── modules/
│   │       ├── horas.js   # 97 líneas — gestión de horas en formularios
│   │       ├── mapa.js    # 56 líneas — mapa Leaflet.js
│   │       ├── ponentes.js # 104 líneas — búsqueda/tags de ponentes
│   │       ├── slider.js  # 40 líneas — Swiper slider
│   │       └── tags.js    # 56 líneas — manejo de tags
│   ├── img/               # Imágenes (fondos, speakers, etc.)
│   └── scss/              # Estilos SCSS (40 archivos)
│       ├── app.scss       # Entry point SCSS
│       ├── base/          # Variables, globals, normalize, mixins, tipografía
│       ├── ui/            # Componentes: header, footer, social, formulario, alertas
│       └── paginas/       # Estilos por página: inicio, conferencias, devwebcamp, paquetes, auth, admin
│
├── public/                # Archivos públicos web
│   ├── index.php          # Entry point
│   ├── build/             # 🏗️ Build de Vite (producción)
│   └── img/               # Imágenes públicas (speaker images, bg, etc.)
│
├── vite.config.js         # 62 líneas — Vite (dev:5174, build→public/build)
└── vite-plugins/
    └── scss-auto-index.js # Plugin custom: auto-index de partials SCSS
```

---

## 🐛 Última corrección aplicada: AOS (Animate On Scroll)

### Problema
`data-aos="fade-up"` no animaba porque `AOS.init()` se llamaba desde el `<head>`, antes de que `<body>` existiera. La biblioteca AOS v2.3.1 llama internamente `document.querySelector("body")`, que devolvía `null`.

### Solución en `views/layout.php`
1. **Envolver `AOS.init()` en `DOMContentLoaded`** (líneas ~65-73)
2. **Agregar `aos.css` en el branch de producción** (línea ~50)

---

## 🔧 Comandos útiles

| Acción | Comando |
|--------|---------|
| Iniciar dev server | `npm run start` |
| Build producción | `npm run prod` |
| Procesar imágenes | `npm run imagen` |
| PHP syntax check | `php -l views/layout.php` |
| Ver estructura | `tree -L 3 -I 'node_modules|.git|vendor|public/build'` |

## 📦 Stacks tecnológicos

| Capa | Tecnología |
|------|-----------|
| Backend | PHP 8+, Composer (ActiveRecord pattern) |
| Frontend | Vite 5, SCSS/Sass, JavaScript ES6+ (ES modules) |
| Base de datos | MySQL (PDO), Docker |
| Frontend libs | Swiper 14, Leaflet.js (mapas), AOS 2.3.1 (CDN) |
| Estilos | SCSS modular, 40+ archivos parciales |
| Email | PHPMailer (SMTP Mailtrap) |

---

## 📌 Tareas pendientes / por hacer
- (Ninguna actualmente — contexto iniciado después de corrección AOS)
