<?php
namespace App\Controllers;
use App\Models\ModelAcceuil;

class AcceuilController extends Controller{
    public function index(/*array $params*/) {
        $acc=new ModelAcceuil;
        $Produits = $acc->getAllProduit();
if (isset($_POST['ajouterPanier'])) {
  $id = $_POST['id'];
  $quantiteDemander = $_POST['quantiteDemander'];
  if (empty($quantiteDemander)) {
    $quantiteDemander = 1;
  }
  $acc->ajouterPanier($id, $quantiteDemander);
    }

if (isset($_POST['payer'])) {
    $id = $_POST['id'];
    $quantiteDemander = $_POST['quantiteDemander'];
    if (empty($quantiteDemander)) {
      $quantiteDemander = 1;
    }
    if (isset($_SESSION['utilisateur'])) {
      $id_utilisateur = $_SESSION['utilisateur']->id;
      $Produit = $acc->getAllProduitById($id);
      $p=$Produit[0];
      $totals = $Produit[0]->prix;
      $acc->ajouterCommandeDirect($totals, $id_utilisateur, $quantiteDemander);
    } else {
      echo "<script> window.location.href = 'http://localhost/projet_final/public/Authentification' </script>";
    }
  }

$this->render('acceuil/index', compact('Produits'));
}
}