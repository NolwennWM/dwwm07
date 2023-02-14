<?php 
class Autoloader
{
    public static function register()
    {
        // Cette fonction est appelé à chaque fois que l'on instancie une nouvelle classe.
        spl_autoload_register(function($class)
        {
            $file = str_replace("\\", DIRECTORY_SEPARATOR, $class).".php";
            if(file_exists($file))
            {
                require $file;
                return true;
            }
            return false;
        });
    }
}
// new Bidule\Truc\SuperClass();
// Bidule/Truc/SuperClass.php
?>