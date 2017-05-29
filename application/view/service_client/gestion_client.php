<div class="dashboard-content">
    <h3>Gestion des clients</h3>

    <div class="paramClient" style="display: none;">

        <h4 class="spacer-large">Modifier l'offre d'un client</h4>

        <div class="textHolder" > </div>

        <form method="POST" action="<?php echo URL; ?>service_client/gestion_client" class="form spacer-small">
            <div id="arrayCheckbox" style="display: none" ></div>
            <label>Changer d'offre</label>
            <select name="offre">
                <option disabled selected>Offres</option>
                <?php foreach ($offres as $offre): ?>
                    <option value=<?php echo $offre->id; ?> ><?php echo $offre->titre; ?></option>
                <?php endforeach ?>
            </select><br/>

            <br/>
            <input type="submit" name="paramClient" >

        </form>
    </div>

    <div class="notificationClient" style="display: none;">

        <h4 class="spacer-large">Envoyer une notification</h4>

        <form method="POST" action="<?php echo URL; ?>service_client/gestion_client" class="form spacer-small">
            <div id="arrayCheckbox" style="display: none" ></div>
            <input type="text" name="titre" placeholder="Titre">

            <textarea name="contenu" placeholder="Message">  </textarea>
            <br/>

            <input type="submit" name="notificationClient">

        </form>
    </div>

    <h4 class="spacer-large">Liste des clients</h4>
    <div class="spacer-small"></div>
    <button name="paramClient" class="paramClient_btn">Modifier l'offre</button>
    <button name="notificationClient" class="notificationClient_btn">Notification</button>
    <table class="table spacer-small">

        <thead>
        <tr class="first">
            <th>Identifiant</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Offre</th>
            <th>Statut</th>
        </tr>
        </thead>

        <form class="form" method="POST" action="<?php echo URL; ?>service_client/gestion_client">
            <tbody>
            <?php foreach ($clients as $utilisateur): ?>
                <tr>
                    <td><input type="checkbox" class="checkBoxes" value='<?php echo $utilisateur->id ?>' name='checkBoxArray[]'>
                    <td id="identifiant"><?php echo $utilisateur->id ?></td>
                    <td id="nom"><?php echo $utilisateur->nom ?></td>
                    <td id="prenom"><?php echo $utilisateur->prenom ?></td>
                    <td id="offre"><?php echo $utilisateur->id_offre ?></td>
                    <td id="statut"> <?php echo $utilisateur->statut ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
            <input type="submit" name="acceptClient" value="Accepter">
            <input type="submit" name="deleteClient" id="submitgestionclient" value="Supprimer" >
        </form>

    </table>

    <h4 class="spacer-large">Dernières notifications</h4>
    <div class="spacer-small"></div>

    <table class="table spacer-small">

        <thead>
        <tr class="first">
            <th>Titre</th>
            <th>Client</th>
        </tr>
        </thead>

        <form class="form" method="POST" action="<?php echo URL; ?>service_client/gestion_client">
            <tbody>
            <?php foreach ($notifications as $notification): ?>
                <tr>
                    <td id="titre"><?php echo $notification->titre ?></td>
                    <td id="id_client"><?php echo $notification->id_client ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </form>

    </table>