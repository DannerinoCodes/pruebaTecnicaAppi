<?php

// useful functions 


// returns the post element or the value that the user 
function getPost($name, $else = null)
{
    return (isset($_POST[$name])) ? $_POST[$name] : $else;
}

function getGet($name, $else = null)
{
    return (isset($_GET[$name])) ? $_GET[$name] : $else;
}
function getTagsVista($vista)
{
    preg_match_all('/\{{(.*?)\}}/', $vista, $tags);
    return $tags[1];
}


// returns the index value of the array or if not exists the one that the user wants
function getArray($arr, $index, $else = null)
{
    return (isset($arr[$index])) ? $arr[$index] : $else;
}

function getCookie($name, $else = null)
{
    return (isset($_COOKIE[$name])) ? $_COOKIE[$name] : $else;
}

function addCookie($nombre, $valor, $tiempoDias)
{
    return setcookie($nombre, $valor, time() + ($tiempoDias * 24 * 60 * 60));
}

function redirectTo($url)
{
    header("Location: $url");
    exit;
}
function contains($needle, $haystack)
{
    return strpos($haystack, $needle) !== false;
}
