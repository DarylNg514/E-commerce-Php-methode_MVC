<main>
    <section>
        <h1>Gestion des Utilisateurs</h1>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nom</th>
                    <th scope="col">prenom</th>
                    <th scope="col">email</th>
                    <th scope="col">sexe</th>
                    <th scope="col">Date de Naissance</th>
                    <th scope="col">telephone</th>
                    <th scope="col">role</th>
                    <th scope="col" class="bg-transparent">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurs as $utilisateur) {
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo $utilisateur->id; ?>
                        </th>
                        <td>
                            <?php echo $utilisateur->nom; ?>
                        </td>
                        <td>
                            <?php echo $utilisateur->prenom; ?>
                        </td>
                        <td>
                            <?php echo $utilisateur->email; ?>
                        </td>
                        <td>
                            <?php echo $utilisateur->sexe; ?>
                        </td>
                        <td>
                            <?php echo $utilisateur->date_de_naissance; ?>
                        </td>
                        <td>
                            <?php echo $utilisateur->telephone; ?>
                        </td>
                        <td>
                            <?php echo $utilisateur->titre; ?>
                        </td>
                        <td class=" row bg-transparent">
                            <div class="col-4">
                                <a href="modifierUtilisateur.php?id=<?php echo $utilisateur->id; ?>"
                                    class="btn btn-block btn-secondary"><i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-4 ">
                                <a href="supprimerUtilisateur.php?id=<?php echo $utilisateur->id; ?>"
                                    class="btn btn-block btn-secondary"><i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </section>
</main>