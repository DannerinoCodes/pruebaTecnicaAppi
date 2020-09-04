<?php
class UserIdParser
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
                    $id = "?userId=" . getGet('user');
                    $datos = Api::getPosts($id);

                    if ($datos) {
                        $str .= "
                        <ul class='list-group list-group-flush'> 
                        <li class='list-group-item list-group-item-success'>Posts</li>";
                        foreach ($datos as $posts) {
                            $str .= "<li class='list-group-item'><a href='?pagina=postId&post=" . $posts['id'] . "'>" . $posts['title'] . "</a></li>";
                        }
                    }
                    break;

                case 'name':

                    $id = getGet('user');
                    $datos = Api::getUsers($id);

                    if ($datos) {
                        $str .= " <hr>
                            <h1 class='display-2 text-center'>" . $datos["name"] . "</h1>
                            <hr>";
                    }
                    break;

                case 'user':

                    $id = getGet('user');
                    $datos = Api::getUsers($id);

                    if ($datos) {
                        $str .= "<ul class='list-group list-group-flush'> 
                                    <li class='list-group-item list-group-item-success'>
                                <div class='font-weight-light'>Username</div><div class='text-center'>" . $datos["username"] . "</div></li>
                                    <li class='list-group-item'>
                                <div class='font-weight-light'>Email</div><div class='text-center'>" . $datos["email"] . "</div></li>
                                    <li class='list-group-item'>
                                <div class='font-weight-light'>Teléfono</div><div class='text-center'>" . $datos["phone"] . "</div></li>
                                     <li class='list-group-item'>
                                <div class='font-weight-light'>Sitio web</div><div class='text-center'> " . $datos["website"] . "</div></li>
                                     <li class='list-group-item'>
                                <div class='font-weight-light'>Dirección</div><div class='text-center'> "
                            . $datos["address"]["street"] . "  - "  . $datos["address"]["suite"] . "<br>"
                            . $datos["address"]["city"] . "  (" . $datos["address"]["zipcode"] . ") <br>
                            Geolocalización " . $datos["address"]["geo"]["lat"] . ", " . $datos["address"]["geo"]["lng"] . "</div></li>
                            <li class='list-group-item'>
                            <div class='font-weight-light'>Compañía</div><div class='text-center'><strong> "
                            . $datos["company"]["name"] . " </strong> <br> "  . $datos["company"]["catchPhrase"] . "<br>"
                            . $datos["company"]["bs"] . " </div></li></ul>";
                    }
                    break;
            }
            $vista = str_replace('{{' . $tag . '}}', $str, $vista);
        }
        return $vista;
    }
}
