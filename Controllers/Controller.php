<?php


namespace App\Controllers;
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

class Controller {

    public function render (string $fichier, array $donnees=null){
        
        //var_dump($donnees);
        //var_dump($employes);

        // on extrait les donnees
        extract($donnees);

        //var_dump($donnees);
        //var_dump($employes);
        //var_dump($fichier);


        /* outpu buffer en sortie de vue */

        ob_start();

        //echo"Bonjour" ;
        //$contenu = ob_get_clean();
        //echo '<br>' . $contenu;

        require_once ROOT. '/Views/'. $fichier.'.php';
        $contenu = ob_get_clean();
        //var_dump($contenu);

        require_once ROOT. '/Views/mainTemplate.php';

    }


}