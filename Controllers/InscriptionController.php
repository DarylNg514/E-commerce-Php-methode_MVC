<?php

namespace App\Controllers;

use App\Models\ModelInscription;

/**
 * Regle: pas de SQL dans les controlleurs
 * Separation entre le model et le controlleur
 */
class InscriptionController extends Controller{

 public function index(){

    $inscrip  = new ModelInscription ;

    if (isset($_POST['envoyer'])) {
      // Recuperation des donnee de mon formulaire
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $email = $_POST['email'];
      $mot_de_passe = $_POST['password'];
      $c_mot_de_passe = $_POST['c-password'];
      $date_de_naissance = $_POST['date_naissance'];
      $telephone = $_POST['telephone'];
      $sexe = $_POST['sexe'];
    
      // Verification de mot de passe
    
      if (
        !empty($email)
        && !empty($nom)
        && !empty($prenom)
        && !empty($mot_de_passe)
        && !empty($c_mot_de_passe)
        && !empty($telephone)
        && !empty($sexe)
        && !empty($date_de_naissance)
      ) {
        if ($mot_de_passe === $c_mot_de_passe) {
          $inscrip->inscription($email, $nom, $prenom, $mot_de_passe, $telephone, $date_de_naissance, $sexe);
        } else {
          echo "Mot de passe incorect";
        }
      } else {
        echo "Remplir les champs vide";
      }
    
    }
    $this->render('inscription/index', compact('inscrip'));    
  }
}