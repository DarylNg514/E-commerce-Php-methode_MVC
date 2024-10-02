<?php

namespace App\Controllers;

use App\Models\ModelAuthentification;
/**
 * Regle: pas de SQL dans les controlleurs
 * Separation entre le model et le controlleur
 */
class AuthentificationController extends Controller{

 public function index(){

    $auth  = new ModelAuthentification;

    if (isset($_POST['connexion'])) {

        $email = $_POST['email'];
        $mot_de_passe = $_POST['password'];
    
        if (!empty($email) && !empty($mot_de_passe)) {
          $auth->authentification($email, $mot_de_passe);
          
        }
        
        }
        $this->render('authentification/index', compact('auth'));
 }

}