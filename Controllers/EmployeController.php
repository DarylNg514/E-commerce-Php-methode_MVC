<?php

namespace App\Controllers;

use App\Models\ModelEmploye;
/**
 * Regle: pas de SQL dans les controlleurs
 * Separation entre le model et le controlleur
 */
class EmployeController extends Controller{

 public function index()
 {/*
   *cette methode affichera la page listant les employes
   */

    //echo " ceci est le controleur des employes ";
   //$donnes = ['a','b', 'c'];
    //include_once ROOT.'/Views/employes/index.php';

    $employeModel = new ModelEmploye;

    // on va chercher tous les employes

    //$annonces = $employeModel->selectTout();

    // les employes qui traivaillent ce matin
    $employes = $employeModel->selectParCriteres(['occupé' => 1]);
    //var_dump($employes);


    // On genere la vue ici
    $this->render('employes/index', compact('employes'));
    // ou bien ) $this->render('employes/index', ['employes' => $employes]);;


 }

 /**
  * methode affiche un employe
  */
 public function consulter(int $id){

   //echo $id; //echo $texte;
   $employeModel= new  ModelEmploye;

   //on va cherher l'employe
   $employe = $employeModel->selectParId($id);

   // On l'envoie a la vue: consulter
   $this->render('employes/consulter', compact('employe'));

 }

}