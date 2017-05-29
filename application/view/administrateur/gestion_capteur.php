<div class="dashboard-content">
    <form action="<?php echo URL; ?>administrateur/save_capteurs" method="post" enctype="multipart/form-data">

        <select name="type_capteurs">
            <option disabled selected>Type de capteur</option>
            <?php foreach ($capteurs as $capteur):
                ?>


                <option id="type_de_capteur" value="<?php echo $capteur->id; ?>"><?php echo $capteur->type; ?></option>
            <?php endforeach ?>

        </select>


        <input style="display: none;" type="submit" id="bouton_capteur" value="Supprimer" name="delete_capteur"><br><br>


        <label for="add_capteur">Ajouter un capteur</label><br><br>
        <input type="text" name="nom_du_capteur" placeholder="Nom du capteur"> <br><br>
        <input type="submit" id="ajouter_capteur" value="Ajouter" name="add_capteur">


    </form>



</div>