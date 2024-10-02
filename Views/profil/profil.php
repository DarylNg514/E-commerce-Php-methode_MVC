<?php 
session_start();
$compteur = 0;
if (isset($_SESSION['panier'])) {
    $compteur = count($_SESSION['panier']);
}
?>
<head>
    <meta charset="UTF-8">
    <title>OrdiShop</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<header>
        <h1>Ma Boutique d'Ordinateurs en Ligne</h1>
        <nav>
            <ul>
                <li class=" cols p-2 mb-1 bg-body-secondary rounded-pill border border-primary-subtle rounded-3"><a
                        href="http://localhost/projet_final/public/Acceuil" class="text-body-secondary">Accueil</a></li>
                <?php if (isset($_SESSION['utilisateur'])) { ?>
                    <li class=" cols p-2 mb-1 bg-body-secondary rounded-pill border border-primary-subtle rounded-3"><a
                            href="http://localhost/projet_final/Views/profil/profil.php" class="text-body-secondary">profil de
                            <?php echo $_SESSION['utilisateur']->nom ?>
                        </a></li>
                    <?php if ($_SESSION['utilisateur']->titre === "admin") { ?>
                        <li class=" cols p-2 mb-1 bg-body-secondary rounded-pill border border-primary-subtle rounded-3"><a
                                href="http://localhost/projet_final/public/Produit" class="text-body-secondary">Gestion Produit</a></li>
                        <li class=" cols p-2 mb-1 bg-body-secondary rounded-pill border border-primary-subtle rounded-3"><a
                                href="http://localhost/projet_final/public/Utilisateur" class="text-body-secondary">Gestion Utilisateurs</a></li>
                        <li class=" cols p-2 mb-1 bg-body-secondary rounded-pill border border-primary-subtle rounded-3"><a
                                href="http://localhost/projet_final/public/Commande" class="text-body-secondary">Gestion Commandes</a></li>
                    <?php }
                    ?>
                    <li class=" cols p-2 mb-1 bg-body-secondary rounded-pill border border-primary-subtle rounded-3"><a
                            href="./deconnexion.php" class="text-body-secondary">Deconnexion</a></li>
                <?php } else { ?>
                    <li class=" cols p-2 mb-1 bg-body-secondary rounded-pill border border-primary-subtle rounded-3"><a
                            href="http://localhost/projet_final/public/Authentification" class="text-body-secondary">Connexion</a></li>
                    <li class=" cols p-2 mb-1 bg-body-secondary rounded-pill border border-primary-subtle rounded-3"><a
                            href="http://localhost/projet_final/public/Inscription" 
                            class="text-body-secondary">Inscription</a></li>
                <?php }
                ?>

            </ul>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="http://localhost/projet_final/public/Panier" class="btn btn-secondary rounded-pill  justify-content-md-end"><i
                        class="bi bi-cart justify-content-md-end"><small>
                            <?php echo $compteur; ?>
                        </small></i></a>
            </div>
        </nav>
    </header>
<section class="search-bar">
  <form>
    <input type="text" placeholder="Rechercher...">
    <button type="submit">Rechercher</button>
  </form>
</section>
<section class="profile">
  <div class="container">
    <h2>Mon Profil</h2>
    <div class=" profile-info" style="width: 18rem ; height: 20rem">
      <i class="fa-solid fa-user fa-2xl"></i></i><br><br>
      <h1 class="fs-1">
        <?php echo $_SESSION['utilisateur']->nom?>
      </h1>
      <p class="fs-1">
        <?php echo $_SESSION['utilisateur']->email?>
      </p><br><br>
      <button>Modifier le Profil</button>
    </div>
  </div>
</section><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
  <p>Tous droits réservés &copy; 2023</p>
</footer>
</body>
</html>