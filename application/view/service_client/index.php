<div class="dashboard-content">

    <div class="spacer-large"></div>    
    <h1>Acceuil Service Client</h1>
    <div class="spacer-large"></div>

    <h4 class="spacer-large">Dernières pannes signalées</h4>
    <div class="spacer-small"></div>
    <table class="table spacer-small">

        <form class="form" method="POST" action="<?php echo URL; ?>service_client/index">
<!--            <input type="submit" name="detail" class="detail_btn" value="Détailler la panne">-->
            <thead>
            <tr class="first">
<!--                <td><input type="checkbox" id="selectAllBoxes"></td>-->
                <th>Titre</th>
                <th>Client</th>
                <th>Contenu</th>
            </tr>
            </thead>


            <tbody>
            <?php foreach ($pannes as $panne): ?>
                <tr>
<!--                    <td><input type="checkbox" class="checkBoxes" value='--><?php //echo $panne->id ?><!--' name='checkBoxArray[]'>-->
                    <td id="titre"><?php echo $panne->titre ?></td>
                    <td id="client"><?php echo $panne->nom. " " . $panne->prenom?></td>
                    <td id="contenu"><?php echo $panne->contenu ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </form>

    </table>

    <h4 class="spacer-large">Dernières missions</h4>
    <div class="spacer-small"></div>

    <table class="table spacer-small">

        <thead>
        <tr class="first">
            <th>Motif</th>
            <th>Client</th>
            <th>Technicien</th>

        </tr>
        </thead>

        <form class="form" method="POST" action="<?php echo URL; ?>service_client/index">
            <tbody>
            <?php foreach ($missions as $mission): ?>
                <tr>
                    <td id="motif"><?php echo $mission->motif ?></td>
                    <td id="client"><?php echo $mission->nom_client . " " . $mission->prenom_client ?></td>
                    <td id="technicien"><?php echo $mission->nom_technicien . " " . $mission->prenom_technicien ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </form>

    </table>