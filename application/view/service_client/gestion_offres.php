<div class="dashboard-content">
    <h3>Gestion des offres</h3>

    <div class="paramOffre" style="display: none;">

        <h4 class="spacer-large">Modifier l'offre selectionnée</h4>

        <div class="textHolder" > </div>

        <form method="POST" action="<?php echo URL; ?>service_client/offres" class="form spacer-small">
            <div id="arrayCheckbox" style="display: none" ></div>

            <label>Nouveau titre</label>
            <input type="text" name="titre" placeholder="Titre"> </br>

            <label>Nouveau prix</label>
            <input type="number" name="prix" placeholder="Prix"> </br>
            <br>
            <label>Nouveau contenu</label> </br>
            <textarea name="contenu" placeholder="Contenu"> </textarea>

            </br>
            <input type="submit" name="paramOffre" >

        </form>
    </div>

    <div class="addOffre" style="display: none">

        <h4 class="spacer-large">Ajouter une offre</h4>

        <div class="textHolder" > </div>

        <form method="POST" action="<?php echo URL; ?>service_client/offres" class="form spacer-small">

            <label>Titre de l'offre</label>
            <input type="text" name="titre" placeholder="Titre">

            <label>Prix de l'offre</label>
            <input type="number" name="prix" placeholder="Prix">

            <label>Contenu de l'offre</label>
            <textarea name="contenu" placeholder="Contenu">  </textarea>

            <br/>
            <input type="submit" name="addOffre" >

        </form>



        </form>
    </div>

    <h4 class="spacer-large">Liste des offres</h4>
    <div class="spacer-small"></div>
    <button name="paramOffre" class="paramOffre_btn">Modifier l'offre</button>
    <button name="addOffre" class="addOffre_btn">Ajouter une offre</button>
    <table class="table spacer-small">

        <thead>
        <tr class="first">
            <td><input type="checkbox" id="selectAllBoxes"></td>
            <th>Titre</th>
            <th>Date</th>
            <th>Prix</th>
            <th>Contenu</th>
        </tr>
        </thead>

        <form class="form" method="POST" action="<?php echo URL; ?>service_client/gestion_offres">
            <tbody>
            <?php foreach ($offres as $offre): ?>
                <tr>
                    <td><input type="checkbox" class="checkBoxes" value='<?php echo $offre->id ?>' name='checkBoxArray[]'>
                    <td class="colonne"><?php echo $offre->titre ?></td>
                    <td class="colonne"><?php echo $offre->date ?></td>
                    <td class="colonne"><?php echo $offre->prix ?></td>
                    <td class="colonne"><?php echo $offre->detail ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
            <input type="submit" name="deleteOffre" id="submitgestionoffre" value="Supprimer" >
        </form>

    </table>
</div>
