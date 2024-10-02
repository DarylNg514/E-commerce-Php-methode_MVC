<main>
  <section>
    <h1>Panier</h1>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Image</th>
          <th scope="col">Nom et marque</th>
          <th scope="col">Prix</th>
          <th scope="col">Quantite</th>
          <th scope="col">caracteristique</th>
          <th scope="col" class="bg-transparent">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($prd as $id=>$id_produit) {
          ?>
          <tr>
            <form method="post">
              <th scope="row"><input type="hidden" name="id_produit" value="<?php echo $id_produit->id; ?>"></th>
              <td>
                <img src="<?php echo $id_produit->chemin; ?>" height="100" width="100">
              </td>
              <td>
                <?php echo $id_produit->Nom_et_marque; ?>
              </td>
              <td>
                <?php echo $id_produit->prix; ?>
              </td>

              <td><input name='quantiterDemander' type="number" min='1' max='<?php echo $id_produit->quantite; ?>'
                  value="<?php echo $quantite[$id]; ?>"></td>
              <td>
                <?php echo $id_produit->caracteristique; ?>
              </td>
              <td class="row bg-transparent">

                <div class="col-3">
                  <button name="modifier" type="submit" class="btn btn-block btn-secondary"><i
                      class="bi bi-pencil-square"></i>
                  </button>
                </div>
                <div class="col-3">
                  <button name="supprimer" type="submit" class="btn btn-block btn-secondary"><i class="bi bi-trash"></i>
                  </button>
                </div>
                <div class="my-2">
                  <button name="payer" type="submit" class="btn btn-secondary"><i class="bi bi-credit-card"> Payer
                      Maintenant </i>
                  </button>
                </div>
              </td>
            </form>
            </div>
          </tr>

        <?php } ?>
      </tbody>
    </table>
    <div>
      <h4>Prix Totals =
        <?php echo $totals; ?>
      </h4>
    </div>
  </section>
</main><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
  <p>Tous droits réservés &copy; 2023</p>
</footer>
</body>

</html>