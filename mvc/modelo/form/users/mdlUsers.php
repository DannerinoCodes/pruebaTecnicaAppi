<?php
class mdlUsers extends Singleton
{
    const PAGE = 'users';
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
        echo UsersParser::loadContent($vista);
    }
}
