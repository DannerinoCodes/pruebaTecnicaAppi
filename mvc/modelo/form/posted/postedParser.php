<?php
class PostedParser
{
    public static function loadContent($vista)
    {
        $vista = self::_pasoSiguiente($vista);
        return $vista;
    }
    private static function _pasoSiguiente($vista)
    {
        foreach (getTagsVista($vista) as $tag) {
            // sustituimos en el formulario los tags por el contenido de los elementos del formulario
            $str = '';
            switch ($tag) {
                case 'mensaje':
                    if (Session::get('create')) {
                        $datos = json_decode($_SESSION["data"], true);
                        $str = "<div class='container'>
                        <h1>Post creado</h1><hr><br>                        
                        <h5> " . $datos['title'] . "</h5>
                        <p'>" . $datos['body'] . "</p>
                        <div>
                        </div>";
                    } else
                        $str = '<p> <b>No se ha podido salvar los datos</b></p>';
                    break;
            }
            $vista = str_replace('{{' . $tag . '}}', $str, $vista);
        }
        return $vista;
    }
}
