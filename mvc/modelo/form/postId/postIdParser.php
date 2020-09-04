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
                    $autor = Api::getUsers($datos['userId']);

                    if ($datos) {
                        $str .= "<div class='container-fluid mx-4 mb-4'>                        
                        <h1 class='display-3'> " . $datos['title'] . "</h1>
                        <br><h3> <a href='?pagina=users?userId=" . $autor['id'] . "'>" . $autor['name'] . "<a></h3><hr>
                        <p'>" . $datos['body'] . "</p>
                        </div>";
                    }
                    break;


                case 'comments':

                    $id = getGet('post');
                    $datos = Api::getComments($id);

                    if ($datos) {
                        $str .= "<div class='container'><h3> Comentarios: </h3><hr>";

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
