<?php
class mdlCreatePost extends Singleton
{
    const PAGE = 'createPost';
    public function onGestionPagina()
    {
        if (getGet('pagina') != self::PAGE) return;
        $val = Validacion::getInstance();
        // Validamos los elementos que hay en $_POST
        $toValidate = ($_POST);
        $rules = array(
            'users' => '',
            'title' => 'required|alpha_space',
            'body' => 'required|alpha_space'
        );

        $val->addRules($rules);
        $val->run($toValidate);
        if (!is_null(getPost(self::PAGE))) {
            if ($val->isValid()) {
                $_SESSION[self::PAGE] = $val->getOks();
                $datos = Api::createPost($_POST);
                ($datos) ?  $_SESSION['create'] = true && $_SESSION["data"] = $datos :  $_SESSION['create'] = false;
                redirectTo('index.php?pagina=posted');
            }
        }
    }
    public function onCargarVista($path)
    {
        if (getGet('pagina') != self::PAGE) return;
        ob_start();
        include $path;
        $vista = ob_get_contents();
        ob_end_clean();
        echo CreatePostParser::loadContent($vista);
    }
}
