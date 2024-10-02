<?php
  namespace App\Core;

use App\Controllers\AcceuilController;
use App\Controllers\AuthentificationController;
use App\Controllers\MainController;

class Main {

    public function start(){

        //echo "je suis le routeur";

        // http://modelmvc/controleur/methode/parametres
        // http://modelmvc/public/p=employes/salaire/id 

        //var_dump($_GET);//donne le parametre de l'url

        //On retire le dernier /
       $uri = $_SERVER['REQUEST_URI'];

        //var_dump($uri);
        if (!empty($uri) && $uri != '/' && $uri[-1] == '/'){
            $uri = substr($uri, 0, -1);
        }

        // on redirige vers lurl sans le /
        // code de redirection permanente
        http_response_code(301);

        header('Location: ', $uri);

        //on gere les parametres
        //p = controleur/methode/parametre
        // on separe ls parametres dans un tableau

        $params = explode('/', $_GET['p']);

        //var_dump($params);

        //on verfie sil ya des parametres
        if ($params[0] != ''){
            //minimum un parametre
            //var_dump($params);

            // on recup le nom du controller a instancier
            // on met une maj en 1er lettre
            // et on ajoute le namespace puis le contronller
            $controller = '\\App\\Controllers\\'.ucfirst(array_shift($params)).'Controller';
            //var_dump($controller); die;

            //on instancie le controller
            $controller = new $controller();

            $action = (isset($params[0])) ? array_shift($params): 'index';
            //var_dump($action); 
            //var_dump($controller); die;
            if(method_exists($controller, $action)){
                // si les prametres existe
                //echo "true"; die;
                (isset($params[0]))? call_user_func_array([$controller, $action], $params): $controller->$action();
                // call_user: prend un tableau qui contient une classe et une 
                // methode et passe les parametres a la methode de la dite classe
                // cette methode nous permettra de creer la methode consulter dans EmployeController

                //(isset($params[0]))? $controller->$action($params): $controller->$action();
            
               
            }else{
                http_response_code(404);
                
                echo " la page rechercher nexiste pas";
            }
        }else{
            //pas de parametre, direction page daccueil
           $controller = new AuthentificationController;
           
           $controller->index();
           
        }



    } 
}