<?php

namespace App\Controllers;

use App\Models\ModelProduit;

/**
 * Regle: pas de SQL dans les controlleurs
 * Separation entre le model et le controlleur
 */
class ProduitController extends Controller{

 public function index(){

    $produit  = new ModelProduit;

    $Produits = $produit->getAllProduit();

        $this->render('produits/index', compact('Produits'));

 }

}