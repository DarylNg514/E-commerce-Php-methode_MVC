<?php

namespace App\Models;

session_start();
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

use App\Core\ConnectBd;
use Exception;

class Model extends ConnectBd
{
    public $table;

    public $conn;

    public function requete(string $sql, array $attributs = null)
    {
        $this->conn  = ConnectBd::getInstance();
        if($attributs !== null){
            //on prepare la requete
            $requete = $this->conn->prepare($sql);
            $requete->execute($attributs);
            return $requete;          
        }else{
        
            return $this->conn->query($sql);
        }

    }
     

public function authentification($email, $mot_de_passe)
{
   
    // Use parameterized query to prevent SQL injection
    $sql = 'SELECT u.*, r.titre FROM utilisateur u 
            JOIN roleutilisateur ru ON ru.id_utilisateur = u.id 
            JOIN role r ON ru.id_role = r.id 
            WHERE email = :email';

    $resultatU = $this->requete($sql, [':email' => $email])->fetchAll();

    if ($resultatU && password_verify($mot_de_passe, $resultatU[0]->mot_de_passe)) {
        // Remove sensitive data before storing in the session
        unset($resultatU[0]->mot_de_passe);
        
        // Store minimal information in the session
        // Store minimal information in the session
        $_SESSION['utilisateur'] = $resultatU[0];
         header('Location: http://localhost/projet_final/public/Acceuil');
    } else {
        echo "l'utilisateur n'existe pas";
        
    }
}
    public function saveRole($id)
{
        $sql = "INSERT INTO roleutilisateur(id_role,id_utilisateur) values(:id_role, :id_utilisateur)";
        $id_role = 1;    
        $stmt =$this->requete($sql, [':id_role'=>$id_role,':id_utilisateur'=>$id]);
        $stmt->execute();
    }

public function inscription($email, $nom, $prenom, $mot_de_passe, $telephone, $date_de_naissance, $sexe)
{
        $sql = $sql = "INSERT INTO Utilisateur(nom,prenom,sexe,email,mot_de_passe,telephone,date_de_naissance) 
        VALUES(:nom, :prenom, :sexe, :email, :mot_de_passe, :telephone, :date_de_naissance)";
$mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
$resultatU = $this->requete($sql, [':nom'=>$nom,':prenom'=>$prenom, ':sexe'=>$sexe,':email'=>$email,':mot_de_passe'=>$mot_de_passe,':telephone'=>$telephone, ':date_de_naissance'=>$date_de_naissance])->fetchAll();
        if ($resultatU) {
            echo "Utilisateur non enregistre";
        } else {
       $id =$this->conn->lastInsertId();
       $this->saveRole($id);
       echo "Utilisateur enregistré avec succès. ID: " . $id;
       header('Location: http://localhost/projet_final/public/Authentification');
        }
    }



    public function selectTout(){
        $sql = 'SELECT * FROM ' .$this->table;
        
        return $this->requete($sql)->fetchAll();
    }
   public function getAllUtilisateurs()
{
    $sql = 'select u.*,r.titre from utilisateur u join roleutilisateur ru on ru.id_utilisateur=u.id join role r on ru.id_role=r.id ';
    $resultats =  $this->requete($sql)->fetchAll();
    $utilisateurs = array();
    foreach ($resultats as $utilisateur) {
        $utilisateurs[] = $utilisateur;
    }
    return $utilisateurs;
}
public function getUtilisateurById($id)
{
    $sql = "select u.*,r.titre,ru.id_role from utilisateur u join roleutilisateur ru on ru.id_utilisateur=u.id join role r on ru.id_role=r.id  where u.id = $id";
return $this->requete($sql)->fetch();
}

public function getProduitById($id)
{
    $sql = "SELECT * FROM produits where id = =$id";
    return $this->requete($sql)->fetchAll();
}

    function getAllProduit()
{
    $sql = "SELECT p.id,p.nomProduit,p.Nom_et_marque,p.caracteristique,p.prix,p.quantite,p.date_Entree,i.chemin from produits p join image i on i.id_produit=p.id";
    $resultats =  $this->requete($sql)->fetchAll();
    $produits = array();
    foreach ($resultats as $produit) {
        $produits[] = $produit;
    }
    return ($produits);
}
public function getAllProduitById($id)
{
    $sql = "SELECT p.id,p.nomProduit,p.Nom_et_marque,p.caracteristique,p.prix,p.quantite,p.date_Entree,i.chemin from produits p join image i on i.id_produit=p.id where p.id =$id";
    return $this->requete($sql)->fetchAll();
}

public function getDateAc()
{
    return $date_commande = date(("Y-m-d h:m:s"));
}

public function ajouterCommande($total, $id_utilisateur)
{
    $sql = "INSERT INTO commande (total, date_commande, id_user) VALUES (:total, :date_commande, :id_user)";
    $date_commande = $this->getDateAc();
    $resultatU = $this->requete($sql, [':total' => $total, ':date_commande' => $date_commande, ':id_user' => $id_utilisateur]);
    if ($resultatU) {
        $id_commande = $this->conn->lastInsertId();
        $monpanier = $this->getProduitsPanier();

        foreach ($monpanier as $id_produit => $qte) {
            $this->ajouterCommandeProduit($id_commande, $id_produit, $qte);
        }
        echo "<script> window.location.href = 'http://localhost/projet_final/public/payement' </script>";
        exit();
    } else {
    }
}
public function ajouterCommandeDirect($total, $id_utilisateur,$quantite)
{
    $sql = "INSERT INTO commande (total, date_commande, id_user) VALUES (:total, :date_commande, :id_user)";
    $date_commande = $this->getDateAc();
    $resultatU = $this->requete($sql, [':total' => $total, ':date_commande' => $date_commande, ':id_user' => $id_utilisateur]);
    if ($resultatU) {
        $id_commande = $this->conn->lastInsertId();
        $monpanier = $this->getProduitsPanier();

        foreach ($monpanier as $id_produit => $qte) {
            $this->ajouterCommandeProduit($id_commande, $id_produit, $quantite);
        }
        echo "<script> window.location.href = 'http://localhost/projet_final/public/payement' </script>";
        exit();
    } else {
    }
}
public function ajouterCommandeProduitDirect($id_commande, $id_produit, $quantite)
{
        $sql = "INSERT INTO commandeproduit (id_commande, id_produit, quantite_demander) VALUES (:id_commande, :id_produit, :quantite_demander)";
    $this->requete($sql, [':id_commande' => $id_commande, ':id_produit' => $id_produit, ':quantite_demander' => $quantite]);
}

public function ajouterCommandeProduit($id_commande, $id_produit, $qte)
{
        $sql = "INSERT INTO commandeproduit (id_commande, id_produit, quantite_demander) VALUES (:id_commande, :id_produit, :quantite_demander)";
    $this->requete($sql, [':id_commande' => $id_commande, ':id_produit' => $id_produit, ':quantite_demander' => $qte]);
}

public function ajouterPanier($id, $quantiteDemander)
{
    $_SESSION['panier'][$id] = $quantiteDemander;
    echo "<br> Ajouter avec success dans le panier";
}
public function getProduitsPanier()
{
    return $_SESSION['panier'];
}
function deleteElementPanier($id)
{
    unset($_SESSION['panier'][$id]);
    header('Location: http://localhost/projet_final/public/Panier');
}

public function updateProduit($id, $nomProduit, $marque, $caracteristique, $prix, $date, $quantite)
{
    $sql = 'UPDATE Produits set nomProduit = :nomProduit, Nom_et_marque = :Nom_et_marque, caracteristique = :caracteristique, prix = :prix , date_Entree = :date_Entree , quantite = :quantite where id = :id ';
    $resultat = $this->requete($sql,[':nomProduit'=>$nomProduit, ':Nom_et_marque'=>$marque, ':caracteristique'=>$caracteristique, ':prix'=>$prix, ':date_Entree'=>$date, ':quantite'=>$quantite, ':id'=>$id]);
    if (!$resultat) {
        echo"Success";
        //header('Location: ./gestionProduit.php');
    }

}
public function updateAllProduit($id, $nomProduit, $marque, $caracteristique, $prix, $date, $quantite, $chemin)
{
    $sql = 'UPDATE Produits set nomProduit = :nomProduit, Nom_et_marque = :Nom_et_marque, caracteristique = :caracteristique, prix = :prix , date_Entree = :date_Entree , quantite = :quantite where id = :id';
    $resultat = $this->requete($sql,[':nomProduit'=>$nomProduit, ':Nom_et_marque'=>$marque, ':caracteristique'=>$caracteristique, ':prix'=>$prix, ':date_Entree'=>$date, ':quantite'=>$quantite, ':id'=>$id]);
    if ($resultat) {
        $this->UpdatesaveImage($chemin, $id);
        echo "success";
        //header('Location: ./gestionProduit.php');
    }

}
function UpdatesaveImage($chemin, $id_produit)
{
    // Préparer la requête SQL avec une instruction préparée
    $sql = 'UPDATE  image set  chemin = :chemin where id_produit=:id_produit';
    $stmt = $this->requete($sql,[':chemin'=>$chemin,':id_produit'=>$id_produit,]);
    // Exécuter la requête
    if ($stmt->execute()) {
        echo "success";
        //header('Location: ./gestionProduit.php');
    }

}

public function getAllCommandes()
{
    $sql = 'select c.*,p.*,cp.quantite_demander from commande c join commandeproduit cp on cp.id_commande=c.id_commande join produits p on cp.id_produit=p.id';
     $resultat = $this->requete($sql)->fetchAll();
    $commandes = array();
    foreach ($resultat as $commande) {
        $commandes[] = $commande;
    }
    return $commandes;
}

    public function selectParCriteres(array $criteres){
        // ["salaire" => 50000, "age" => 20];
        // select * from $table where salaire = ? AND Adresse = ?
        // bindvalue(1, valeur)
        // on scinde le tableau de criteres en 2
         //: champs[] et valeurs

         $champs = [];
         $valeurs = [];
         foreach($criteres as $key => $value){
            $champs[] = "$key = ?";
            $valeurs [] = $value;
         }
         //var_dump($champs);
         //var_dump($valeurs);
       
        // on transforme le tableau en chaine de caractere
        $listChamps = implode(' AND ', $champs);
        //var_dump($listChamps);

        // On execute la requete

        return $this->requete("SELECT * FROM " . $this->table . " WHERE " . $listChamps , $valeurs )->fetchAll();

    }

    public function selectParId(int $id){

        return $this->requete("SELECT * FROM {$this->table} WHERE id = $id ")->fetch();

    }

    public function create(Model $model){
        // INSERT INTO maTable ('salaire', 'name') VALUES (?, ?)

        foreach($model as $champ => $valeur){
         if($champ !=="table" && $valeur !== null
         && $champ !== 'dbhost' && $champ !== 'dbname'
         && $champ !== 'dbpass' && $champ !== 'dbuser'){
            $champs[] = $champ;
            $valeurs[] = $valeur;
            $myQMarks [] = '?';
         }

         }

        $listKeys = implode(' , ', $champs);
        $listQmarks = implode(' , ', $myQMarks);
       return $this->requete('INSERT INTO ' .$this->table. '('. $listKeys .')'. ' VALUES('.$listQmarks. ')', $valeurs);

    }

    public function insertionHydrate(array $donnees){

        foreach($donnees as $key => $valeur){
            // on recupere le setter
            // name --> setName
            $setter = 'set'. ucfirst($key);
            if (method_exists($this, $setter)){
                // on appelle le setter
                $this->$setter($valeur);
            }
        }
        return $this;

    } 

    public function update(int $id, Model $model ){
        foreach($model as $key => $valeur){
            if($valeur != null && $key != "conn" && $key !="table" ){
                $myKeys[] = "$key = ?";
                $myValues[] = $valeur;
            }
         }

        $myValues[] = $id ;
        $listKeys = implode(' , ', $myKeys);
        return $this->requete('UPDATE ' .$this->table. ' SET '. $listKeys .' WHERE id = ? ', $myValues) ;
    }
    public function delete($id){
          return $this->requete("DELETE FROM $this->table WHERE id = ?", [$id]);
    }


    

}