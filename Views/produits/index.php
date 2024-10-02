<main>
    <section>
        <h1>Gestion de Produits</h1>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">nomProduit</th>
                    <th scope="col">Nom et marque</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantite</th>
                    <th scope="col">Date</th>
                    <th scope="col">caracteristique</th>
                    <th scope="col" class="bg-transparent">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Produits as $Produit) {
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo $Produit->id; ?>
                        </th>
                        <td>
                            <img src="<?php echo $Produit->chemin; ?>" height="100" width="100">
                        </td>
                        <td>
                            <?php echo $Produit->nomProduit; ?>
                        </td>
                        <td>
                            <?php echo $Produit->Nom_et_marque; ?>
                        </td>
                        <td>
                            <?php echo $Produit->prix; ?>
                        </td>
                        <td>
                            <?php echo $Produit->quantite; ?>
                        </td>
                        <td>
                            <?php echo $Produit->date_Entree; ?>
                        </td>
                        <td>
                            <?php echo $Produit->caracteristique; ?>
                        </td>
                        <td class=" row bg-transparent">
                            <div class="col-4">
                                <a href="http://localhost/projet_final/public/ModifierProduit?id=<?php echo $Produit->id; ?>"
                                    class="btn btn-block btn-secondary"><i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-4 ">
                                <a href="supprimerproduit.php?id=<?php echo $Produit->id; ?>"
                                    class="btn btn-block btn-secondary"><i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
        <div class="d-grid gap-2 d-md-block">
            <a href="ajouterProduit.php" class="btn btn-secondary">Ajouter
                Produits</a>
        </div>
    </section>
</main>