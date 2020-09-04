<?php
class mdlUserId extends Singleton
{
    const PAGE = 'userId';

    public function onGestionPagina()
    {
        if (getGet('pagina') != self::PAGE) return;
    }

    public function onCargarVista($path)
    {
        if (getGet('pagina') != self::PAGE) return;
        ob_start();
        include $path;
        $vista = ob_get_contents();
        ob_end_clean();
        echo UserIdParser::loadContent($vista);
    }
}
