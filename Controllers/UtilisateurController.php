<?php

namespace App\Controllers;

use App\Models\ModelUtilisateur;

/**
 * Regle: pas de SQL dans les controlleurs
 * Separation entre le model et le controlleur
 */
class UtilisateurController extends Controller{

 public function index(){

    $user  = new ModelUtilisateur;

    $utilisateurs = $user->getAllUtilisateurs();

        $this->render('utilisateur/index', compact('utilisateurs'));

 }

}