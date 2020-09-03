<?php
class mdlMenu extends Singleton
{
    const PAGE = 'menu';
    public function onGestionPagina()
    {
        if (self::PAGE != getGet('pagina', 'menu')) return;
    }
    public function onCargarVista($path)
    {
        if (self::PAGE != getGet('pagina', 'menu')) return;
        ob_start();
        include $path;
        $vista = ob_get_contents();
        ob_end_clean();
        echo $vista;
    }
}
