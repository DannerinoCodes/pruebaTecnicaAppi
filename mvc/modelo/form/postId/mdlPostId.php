<?php
class mdlPostId extends Singleton
{
    const PAGE = 'postId';

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
        echo PostIdParser::loadContent($vista);
    }
}
