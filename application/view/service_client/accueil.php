<div class="dashboard-content">

    <div class="detail" style="display: none;">

        <h4 class="spacer-large">Détail de la panne</h4>

        <div class="textHolder" > </div>
        <div id="arrayCheckbox" style="display: none" ></div>
        <p> <?php foreach ($pannes_select as $panne_select) : ?>
            <?php echo $panne_select->contenu ?> </br>
            <?php endforeach ?>
        </p>


    <h4 class="spacer-large">Dernières pannes signalées</h4>
    <div class="spacer-small"></div>
    <button name="detail" class="detail_btn">Détailler la panne</button>
    <table class="table spacer-small">

        <thead>
        <tr class="first">
            <td><input type="checkbox" id="selectAllBoxes"></td>
            <th>Titre</th>
            <th>Client</th>
        </tr>
        </thead>

        <form class="form" method="POST" action="<?php echo URL; ?>service_client/index">
            <tbody>
            <?php foreach ($pannes as $panne): ?>
                <tr>
                    <td><input type="checkbox" class="checkBoxes" value='<?php echo $panne->id ?>' name='checkBoxArray[]'>
                    <td id="titre"><?php echo $panne->titre ?></td>
                    <td id="client"><?php echo $panne->nom. " " . $panne->prenom?></td>
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
            <th>Titre</th>
            <th>Client</th>
            <th>Contenu</th>
        </tr>
        </thead>

        <form class="form" method="POST" action="<?php echo URL; ?>service_client/gestion_client">
            <tbody>
            <?php foreach ($notifications as $notification): ?>
                <tr>
                    <td id="titre"><?php echo $notification->titre ?></td>
                    <td id="client"><?php echo $notification->nom . " " . $notification->prenom ?></td>
                    <td id="contenu"><?php echo $notification->contenu ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </form>

    </table>