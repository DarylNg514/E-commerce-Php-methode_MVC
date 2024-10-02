<?php

namespace App\Controllers;

use App\Models\ModelCommande;

class CommandeController extends Controller {

    public function index() {
        $cmd = new ModelCommande;

        $commandes = $cmd->getAllCommandes();
        $users = []; 
        $i = 1;

        foreach ($commandes as $key => $commande) {
            $id_user = $commande->id_user;
            $user = $cmd->getUtilisateurById($id_user);
            $users[$key] = $user;
        }

        $this->render('commande/index', compact('commandes', 'users', 'i'));
    }

}
