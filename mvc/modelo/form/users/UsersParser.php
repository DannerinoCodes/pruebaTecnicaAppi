<?php
class UsersParser
{
    public static function loadContent($vista)
    {
        $vista = self::_pasoSiguiente($vista);
        return $vista;
    }

    private static function _pasoSiguiente($vista)
    {
        foreach (getTagsVista($vista) as $tag) {
            // to replace the tags in the form with the content of the forms elements
            $str = '';
            switch ($tag) {
                case 'users':
                    $id = "/";
                    $datos = Api::getUsers($id);
                    if ($datos) {
                        $str = "<div class='container'>";
                        foreach ($datos as $users) {
                            $str .= "
                        <div class='card m-3 p-2'>
                        <h5 class='card-title'> <a href='?pagina=userId&user=" . $users['id'] . "'>" . $users['name'] . "</a></h5>
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
