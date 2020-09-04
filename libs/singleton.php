<?php
class Singleton
{
    private static $instances = array(); // to store instances of different classes
    private function __construct()
    {
    }
    public function __clone()
    {
        trigger_error("No puedes clonar un objeto de la clase " . get_called_class(), E_USER_ERROR);
    }
    public function __wakeup()
    {
        trigger_error("No puedes deserializar una instancia de " . get_called_class(), E_USER_ERROR);
    }
    public static function getInstance()
    {
        $cls = get_called_class(); // returns the class name that has called the method
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static; // instances the class that has called the method
        }
        return self::$instances[$cls];
    }
}
