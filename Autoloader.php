<?php

    namespace App;

    class Autoloader {


        public static function register(){

            spl_autoload_register([
                __CLASS__,
                'autoload'
            ]);

        }

        public static function autoload($class){

            $classe = str_replace(__NAMESPACE__.'\\', '', $class);

            $classe = str_replace('\\', '/', $classe);

            $file = __DIR__ . '/'.$classe . '.php';

            if (file_exists($file))
            {
                require_once $file;
            }else {
                echo " le fichier nexiste pas";
            }

        }









    }