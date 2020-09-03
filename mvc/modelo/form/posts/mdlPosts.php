<?php
class mdlPosts extends Singleton
{
    const PAGE = 'posts';
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
        echo postsParser::loadContent($vista);
    }
}
