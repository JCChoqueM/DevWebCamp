<?php
namespace Classes;
class Paginacion
{
    public $pagina_actual;
    public $registros_por_pagina;
    public $total_registros;

    public function __construct($pagina_actual = 1, $registros_por_pagina = 10, $total_registros = 0)
    {
        $this->pagina_actual = (int) $pagina_actual;
        $this->registros_por_pagina = (int) $registros_por_pagina;
        $this->total_registros = (int) $total_registros;
    }

    public function offset()
    {
        // Calcula cuántos registros hay que "saltarse" antes de empezar a mostrar la página actual
        // Fórmula: registros por página × (página actual - 1)
        return $this->registros_por_pagina * ($this->pagina_actual - 1);
    }
    public function total_paginas()
    {
        // Calcula cuántas páginas hay en total.
        // Ej: 47 registros / 10 por página = 4.7 → ceil() lo redondea hacia arriba → 5 páginas
        return ceil($this->total_registros / $this->registros_por_pagina);
    }

    public function pagina_anterior()
    {
        // Resta 1 a la página actual
        // Ej: si estás en la página 3 → $anterior = 2
        $anterior = $this->pagina_actual - 1;

        // Si el resultado es mayor a 0, existe una página anterior válida, la devuelve
        // Si no (estás en la página 1 → $anterior = 0), devuelve false (no hay anterior)
        return ($anterior > 0) ? $anterior : false;
    }

    public function pagina_siguiente()
    {
        // Suma 1 a la página actual
        // Ej: si estás en la página 3 → $siguiente = 4
        $siguiente = $this->pagina_actual + 1;

        // Si esa página siguiente no se pasa del total de páginas, la devuelve
        // Ej: si hay 5 páginas totales y $siguiente = 4 → es válida, devuelve 4
        // Si $siguiente = 6 (ya no existe) → devuelve false
        return ($siguiente <= $this->total_paginas()) ? $siguiente : false;
    }


    public function enlace_anterior()
    {
        $html = '';
        if ($this->pagina_anterior()) {
            $html .=
                "
            <a class=\"paginacion__encale paginacion__enlace--texto\" 
            href=\"?page={$this->pagina_anterior()}\"
            >&laquo Anterior</a>
            ";
        }
        return $html;
    }

    public function enlace_siguiente()
    {
        $html = '';
        if ($this->pagina_siguiente()) {
            $html .=
                "
            <a class=\"paginacion__encale paginacion__enlace--texto\" 
            href=\"?page={$this->pagina_siguiente()}\"
            >siguiente &raquo</a>
            ";
        }
        return $html;
    }

    public function paginacion()
    {
        $html = '';
        if ($this->total_registros > 1) {
            $html .= '<div class="paginacion">';

            $html .= $this->enlace_anterior();
            $html .= $this->enlace_siguiente();

            $html .= '</div>';
        }
        return $html;
    }
}