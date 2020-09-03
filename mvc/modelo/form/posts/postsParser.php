<?php
class postsParser
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
                    $datos = Api::getAllPosts();
                    if ($datos) {
                        $str = "<div class='container'>";
                        foreach ($datos as $posts) {
                            $str .= "
                        <div class='card m-3 p-2'>
                        <h5 class='card-title'>" . $posts['title'] . "</h5>
                        <p class='card-text'>" . $posts['body'] . "</p>
                        </div>
                        ";
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
