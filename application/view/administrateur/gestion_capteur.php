<div class="dashboard-content">
    <div class="spacer-large">
        <h1>Gestion dynamique des capteurs et roles</h1>
    </div>
    <form action="<?php echo URL; ?>administrateur/save_capteurs" method="post" enctype="multipart/form-data">

        <select name="type_capteurs">
            <option disabled selected>Type de capteur</option>
            <?php foreach ($capteurs as $capteur): ?>
                <option id="type_de_capteur" value="<?php echo $capteur->id; ?>"><?php echo $capteur->type; ?></option>
            <?php endforeach ?>

        </select>


        <input style="display: none;" type="submit" id="bouton_capteur" value="Supprimer" name="delete_capteur"><br><br>


        <label for="add_capteur">Ajouter un capteur</label><br><br>
        <input type="text" name="nom_du_capteur" placeholder="Nom du capteur"> <br><br>
        <input type="submit" id="ajouter_capteur" value="Ajouter" name="add_capteur"><br><br>


        <select name="type_role">
            <option disabled selected>roles</option>
            <?php foreach ($roles as $role): ?>
                <option id="type_de_role" value="<?php echo $role->id; ?>"><?php echo $role->role; ?></option>
            <?php endforeach ?>

        </select>


        <input style="display: none;" type="submit" id="bouton_role" value="Supprimer" name="delete_role"><br><br>


        <label for="add_role">Ajouter un role</label><br><br>
        <input type="text" name="nom_du_role" placeholder="Nom du role"> <br><br>
        <input type="submit" id="ajouter_role" value="Ajouter" name="add_role">

    </form>

</div>