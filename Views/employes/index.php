<p> Page d'accueil des employes </p>

<h1>Liste des employes</h1>

<?php foreach ($employes as $employe): ?>
    <section>
        <h2> <?php //$employe['name']  */?>
            <?php 
                #on prefererait ecrire  $employe->name en POO
                # il faut changer le fetch de ConnectBd dans Core en mettant
                # fetchObj() 
            ?>
           <a href="/employe/consulter/<?= $employe->id ?>"><?= $employe->name ?></a> 
        </h2>
        <div> <?= $employe->salaire ?> </div>
        <div><?= $employe->adresse ?> </div>

    </section>
<?php endforeach; ?>