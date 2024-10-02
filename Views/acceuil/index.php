<section class="search-bar">
  <form>
    <input type="text" placeholder="Rechercher...">
    <button type="submit">Rechercher</button>
  </form>
</section>
<section class="home">
  <div class="banner">
    <h2>Bienvenue dans notre Boutique d'Ordinateurs en Ligne</h2>
    <p>Nous offrons une large sélection d'ordinateurs de bureau, d'ordinateurs portables, de tablettes et
      d'accessoires informatiques de haute qualité provenant de marques renommées.</p>
  </div>
</section>
<section class="categories">
  <h1>Nos Catégories</h1><br><br>
  <div class="container-fluid">
    <div class="row align-items-cente">
      <div class="col-sm-6 col-centered">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="true">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="./img/ordinateur11.jpg" width="85%" height="100%" class="d-block w-75" alt="...">
              <h1 class="p-3 mb-2 bg-transparent text-body rounded-pill border border-primary-subtle rounded-3">
                Ordinateurs
                Portables</h1>
            </div>
            <div class="carousel-item">
              <img src="./img/16233592.jpg" width="85%" height="100%" class="d-block w-75" alt="...">
              <h1 class="p-3 mb-2 bg-transparent text-body rounded-pill border border-primary-subtle rounded-3">
                Ordinateurs
                de Bureau</h1>
            </div>
            <div class="carousel-item">
              <img src="./img/tablette1.jpg" width="85%" height="100%" class="d-block w-75" alt="...">
              <h1 class="p-3 mb-2 bg-transparent text-body rounded-pill border border-primary-subtle rounded-3">
                Tablettes
              </h1>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
 
  <div class="category">

    <!-- Ajoutez d'autres catégories ici -->
</section>
<br><br><br>
<section class="featured-products">
  <h2>Nos Produits en Vedette</h2>
  <div class="row row-cols-5 row-cols-md-5 g-4">
  <?php foreach ($Produits as $valuer) {
   
   ?>
      <input type="hidden" name="id_produit" value="<?php echo $valuer->id; ?>">
      <div class="col">
        <div class="card h-100">
          <img src="<?php echo $valuer->chemin;?>" width="100%" height="100%" class="card-img-top" alt="...">
          
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $valuer->Nom_et_marque;
              ?>
            </h5>
            <p class="card-text">
              <?php echo $valuer->caracteristique; ?>
            </p>
            <p>
              Prix:
              <?php echo $valuer->prix; ?>$
            </p>
          </div>
          <div class="card-footer">
            <form method="post">
              <small class="text-body-secondary">
                <label for="quantite" class="form-label">Qty:</label>
                <input type="number" min='1' max='<?php echo $valuer->quantite;?>' name="quantiteDemander"
                  class="form-control">
                <div class="d-grid gap-2">
                  <input type="hidden" name="id" value="<?php echo $valuer->id; ?>">
                  <button class="btn btn-secondary" name='ajouterPanier' type="submit">Ajouter Panier <i
                      class="bi bi-cart-plus"></i></button>
                  <button name="payer" value="<?php echo $valuer->id; ?>" type="submit" class="btn btn-secondary"><i
                      class="bi bi-credit-card"> Payer
                      Maintenant </i>
                  </button>
            </form>
          </div>
          </small>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
  <!-- Ajoutez d'autres produits ici -->
</section><br><br><br><br><br><br><br><br><br><br>

<footer>
  <p>Tous droits réservés &copy; 2023</p>
</footer>
</body>

</html>
