<?php
class PostIdParser
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

                case 'posts':

                    $id = "/" . getGet('post');
                    $datos = Api::getPosts($id);

                    if ($datos) {
                        $str .= "<div class='container'>                        
                        <h5> " . $datos['title'] . "</h5>
                        <p'>" . $datos['body'] . "</p>
                        <div>
                        </div>";
                    }
                    break;


                case 'comments':

                    $id = getGet('post');
                    $datos = Api::getComments($id);

                    if ($datos) {
                        $str .= "<div class='container'><h1> Comentarios: </h1><hr>";

                        foreach ($datos as $comments) {
                            $str .= "<h5> " . $comments['email'] . "</h5>
                        <p>" . $comments['body'] . "</p>
                        <div>";
                        }

                        $str .= "</div>";
                    }
                    break;
            }
            $vista = str_replace('{{' . $tag . '}}', $str, $vista);
        }
        return $vista;
    }
}
