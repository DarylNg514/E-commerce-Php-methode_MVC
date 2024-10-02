<?php


namespace App\Controllers;
use App\Models\ModelPanier;

class PanierController extends Controller{

    public function index(/*array $params*/) {
      $pan=new ModelPanier;
      $tabPanier = $pan->getProduitsPanier();
      $prixUnitaire = 0;
      $totals = 0;

if (isset($_POST['supprimer'])) {
  $id = $_POST['id_produit'];
  $pan->deleteElementPanier($id);
}
if (isset($_POST['modifier'])) {
  $id = $_POST['id_produit'];
  $quantiterDemander = $_POST['quantiterDemander'];
  $pan->ajouterPanier($id, $quantiterDemander);

}
if (isset($_POST['payer'])) {
  if (isset($_SESSION['utilisateur'])) {
    $id_utilisateur = $_SESSION['utilisateur']->id;
    $pan->ajouterCommande($totals, $id_utilisateur);
  } else {
    echo "<script> window.location.href = 'http://localhost/projet_final/public/Authentification' </script>";
  }
}
foreach ($tabPanier as $id_produit => $quantiterDemander) {
  $quantite[]=$quantiterDemander;
  $product = $pan->getAllProduitById($id_produit);
    $prd[]=$product[0];
    foreach ($prd as $id_produit) {
    $totals += $id_produit->prix;
    $prixUnitaire = $id_produit->prix;
    }
}
if(count($_SESSION['panier'])>0){
  $this->render('panier/index', compact('tabPanier', 'prd','totals', 'prixUnitaire','quantite'));
}
else
{
  $this->render('panier/index', compact('tabPanier','totals', 'prixUnitaire','quantite'));
}

}
}