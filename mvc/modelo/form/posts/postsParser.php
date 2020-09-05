<?php
class PostsParser
{
    public static function loadContent($vista, $page)
    {
        $vista = self::_pasoSiguiente($vista, $page);
        return $vista;
    }

    private static function _pasoSiguiente($vista, $page)
    {
        foreach (getTagsVista($vista) as $tag) {
            // to replace the tags in the form with the content of the forms elements
            $str = '';
            switch ($tag) {
                case 'posts':
                    $datos = Api::getPostsPage($page);


                    if ($datos["body"]) {
                        $str = "<div class='container'>";
                        foreach ($datos["body"] as $posts) {
                            $str .= "
                        <div class='card m-3 p-2'>
                        <h5 class='card-title'> <a href='?pagina=postId&post=" . $posts['id'] . "'>" . $posts['title'] . "</a></h5>
                        <p class='card-text'>" . $posts['body'] . "</p>
                        </div>
                        ";
                        }

                        $str .= "</div>";
                        if (contains("prev", $datos["link"])) {
                            $str .= "<a href='?pagina=posts&page=" . --$page . "'>Anteriors</a>";
                        }
                        if (contains("next", $datos["link"])) {
                            $str .= "<a href='?pagina=posts&page=" . ++$page . "'>Siguiente</a>";
                        }
                    }
                    break;
            }
            $vista = str_replace('{{' . $tag . '}}', $str, $vista);
        }
        return $vista;
    }
}
