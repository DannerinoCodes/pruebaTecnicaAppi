<?php
class Session
{


    public static function startSession()
    {
        // returns null if sessions are not available or started
        if (session_status() != PHP_SESSION_NONE)
            return;
        session_start();
    }


    public static function closeSession()
    {
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), "", time() - 3600, "/");
        }
        session_unset();
        session_destroy();
    }


    public static function get($index, $else = null)
    {
        return (isset($_SESSION[$index])) ? $_SESSION[$index] : $else;
    }

    public static function del($index)
    {
        if (array_key_exists($index, $_SESSION)) unset($_SESSION[$index]);
    }
}
