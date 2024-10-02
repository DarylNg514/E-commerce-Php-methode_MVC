<section class="search-bar">
  <form>
    <input type="text" placeholder="Rechercher...">
    <button type="submit">Rechercher</button>
  </form>
</section>
<section class="signup">
  <h2>Inscription</h2>
  <form method="post">
    <div class="container">

      <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" id="nom">
      </div>
      <div class="mb-3">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" name="prenom" class="form-control" id="prenom">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Courriel</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1">
      </div>
      <div class="mb-3">
        <label for="sexe" class="form-label">Sexe</label>
        <select name="sexe" id="sexe" class="form-select" aria-label="Default select example">
          <option value="femme">Femme</option>
          <option value="homme">Homme</option>
          <option value="autre">Autres</option>
        </select>

      </div>
      <div class="mb-3">
        <label for="telephone" class="form-label">Numero de telephone</label>
        <input type="tel" name="telephone" class="form-control" id="telephone">
      </div>
      <div class="mb-3">
        <label for="date_naissance" class="form-label">Date de Naissance</label>
        <input type="date" name="date_naissance" class="form-control" id="date_naissance">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirmer Mot de passe</label>
        <input type="password" name="c-password" class="form-control" id="exampleInputPassword1">
      </div>
      <br>
      <div class="d-grid gap-2">
        <button type="submit" name="envoyer" class="btn btn-primary">Inscription</button>
      </div>

    </div>
  </form>
</section>
<footer>
  <p>Tous droits réservés &copy; 2023</p>
</footer>
</body>

</html>