<?php

namespace App\Controllers;

use App\Models\ModelPayement;

/**
 * Regle: pas de SQL dans les controlleurs
 * Separation entre le model et le controlleur
 */
class PayementController extends Controller{

 public function index(){

    $paye  = new ModelPayement;

    $payement = $paye->getAllUtilisateurs();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $Produit = $paye->getProduitById($id);
        $prix = $Produit[0]->prix;
    }
        $this->render('payement/index', compact('payement'));
 }

}