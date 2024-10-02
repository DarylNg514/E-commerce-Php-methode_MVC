<main>
    <section>
        <h1>Gestion des Commandes</h1>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom Utilisateur</th>
                    <th scope="col">Produit Commande</th>
                    <th scope="col">Quantite</th>
                    <th scope="col">Date Commande</th>
                    <th scope="col">Total</th>
                    <th scope="col" class="bg-transparent">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandes as $key => $commande) {?>
                    <tr>
                        <th scope="row">
                            <?php echo $i++; ?>
                        </th>
                        <td>
                            <?php echo $users[$key]->nom; ?>
                        </td>
                        <td>
                            <?php echo $commande->Nom_et_marque; ?>
                        </td>
                        <td>
                            <?php echo $commande->quantite_demander; ?>
                        </td>
                        <td>
                            <?php echo $commande->date_commande; ?>
                        </td>
                        <td>
                            <?php echo $commande->total; ?>
                        </td>
                        <td class="row bg-transparent">
                            <div class="col-4">
                                <a href="supprimercommande.php?id=<?php echo $commande->id_commande; ?>"
                                    class="btn btn-block btn-secondary"><i class="bi bi-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>
